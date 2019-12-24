<?php

namespace App\Modules\Library\Controllers;

use App\Modules\Library\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LibraryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Library::index");
    }

    public function bookAutoSuggest(Request $request)
    {
        $term = $request->get('term');
        if ($request->get('term') == 'all') {
            $search_items = Book::where('books.status', 1)
                ->where('books.stock_quantity','>',0)
                ->get(['books.id', 'books.name', 'books.code']);
        } else {
            $search_items = Book::where('books.status', 1)
                ->where('books.stock_quantity','>',0)
                ->where(function ($query) use ($term) {
                    $query->where('books.name', 'LIKE', '%' . $term . '%')->orWhere('books.code', 'LIKE', '%' . $term . '%');
                })
                ->get(['books.id', 'books.name', 'books.code']);
        }

        return response()->json($search_items);
    }


    public function bookAddCart(Request $request){
        try {
            $bookId = $request->get('bookId');
            $data = Book::leftJoin('book_categories','book_categories.id','=','books.category_id')
                ->leftJoin('book_writers','book_writers.id','=','books.writer_id')
                ->leftJoin('book_publishers','book_publishers.id','=','books.writer_id')
                ->where('books.id', '=', $bookId)
                ->where('books.status', '=', 1)
                ->where('books.stock_quantity', '>', 0)
                ->first([
                    'books.*',
                    'book_categories.name as category_name',
                    'book_writers.name as writer_name',
                    'book_publishers.name as publisher_name'

                ]);
            
            if (!$data) {
                return redirect()->back()->with('flash_danger', "This book is not available");
            }

            $bookInfo = array();
            $bookInfo['id'] = $data->id;
            $bookInfo['name'] = $data->name;
            $bookInfo['code'] = $data->code;
            $bookInfo['publisher_name'] = $data->publisher_name;
            $bookInfo['category_name'] = $data->category_name;
            $bookInfo['writer_name'] = $data->writer_name;
            $bookInfo['quantity'] = 1;
            $bookInfo['remarks'] = $request->remarks;
            if (Session::get("borrow.books.$bookId")) {
                $bookInfo['quantity'] = Session::get("borrow.books.$bookId.quantity") + 1;
                $bookInfo['remarks'] = Session::get("borrow.books.$bookId.remarks");
            }
            Session::put("borrow.books.$bookId", $bookInfo);
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('flash_danger', $e->getMessage());
            return redirect()->back();
        }
    }

    public function bookCartEditDelete(Request $request){
        try {
            $getBookInfo = $request->all();
            $bookId = $getBookInfo['book_id'];

            if ($getBookInfo['edit_delete'] == 'edit') {
                $bookInfo = array();
                $bookInfo['id'] = $getBookInfo['book_id'];
                $bookInfo['name'] = Session::get("borrow.books.$bookId.name");
                $bookInfo['code'] = Session::get("borrow.books.$bookId.code");
                $bookInfo['publisher_name'] = Session::get("borrow.books.$bookId.publisher_name");
                $bookInfo['category_name'] = Session::get("borrow.books.$bookId.category_name");
                $bookInfo['writer_name'] = Session::get("borrow.books.$bookId.writer_name");
                $bookInfo['quantity'] = $getBookInfo['quantity'];
                $bookInfo['remarks'] = $getBookInfo['remarks'];
                if ($getBookInfo['quantity'] == 0)
                    $bookInfo['quantity'] = Session::get("borrow.books.$bookId.quantity");
                Session::put("borrow.books.$bookId", $bookInfo);
            } else {
                Session::forget("borrow.books.$bookId");
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('flash_danger', $e->getMessage());
            return redirect()->back();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
