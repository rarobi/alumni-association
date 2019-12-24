<?php

namespace App\Modules\Library\Controllers;

use App\Models\Auth\User;
use App\Modules\Library\Models\BookBorrow;
use App\Modules\Library\Models\BookBorrowDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookIssueController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bookIssues'] = BookBorrow::leftJoin('users','users.id','=','books_borrow.member_id')
                                ->where('books_borrow.is_returned',0)
                                ->get([
                                    'books_borrow.*',
                                    'users.name as member_name',
                                    'users.email as member_email'
                                ]);
        return view("Library::book.issue.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['members'] = User::pluck('name','id');
        return view("Library::book.issue.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'member_id'=>'required',
            'return_date'=>'required'
        ];
        $this->validate($request, $rules);

        $issueBooks = Session::get("borrow.books");

        try {
            DB::beginTransaction();
            $bookBorrow = new BookBorrow();
            $bookBorrow->member_id = $request->get('member_id');
            $bookBorrow->issue_date = Carbon::now();
            $bookBorrow->date_for_return = $request->get('return_date');
            $bookBorrow->save();

            foreach ($issueBooks as $key => $book) {
                $bookBorrowDetails = new bookBorrowDetails();
                $bookBorrowDetails->borrow_id = $bookBorrow->id;
                $bookBorrowDetails->book_id = $book['id'];
                $bookBorrowDetails->book_quantity = $book['quantity'];
                $bookBorrowDetails->remarks = $book['remarks'];
                $bookBorrowDetails->save();
            }

            Session::forget("borrow.books");
            DB::commit();

            Session::flash('flush_success', 'Books issued Successfully');

            return redirect('/library/book/issue/');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('flush_danger', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($borrowId)
    {
        $data['bookIssueDetails'] = BookBorrowDetails::leftJoin('books','books.id','=','books_borrow_details.book_id')
            ->leftJoin('book_categories','book_categories.id','=','books.category_id')
            ->leftJoin('book_publishers','book_publishers.id','=','books.publisher_id')
            ->leftJoin('book_writers','book_writers.id','=','books.writer_id')
            ->where('books_borrow_details.borrow_id',$borrowId)
            ->get([
                'books_borrow_details.*',
                'books.name as book_name',
                'books.code as book_code',
                'books.price as book_price',
                'book_categories.name as book_category',
                'book_publishers.name as book_publisher',
                'book_writers.name as book_writer'
            ]);
//        $data['bookIssue'] = BookBorrow::find($borrowId);
        $data['bookIssue'] = BookBorrow::leftJoin('users','users.id','=','books_borrow.member_id')
            ->where('books_borrow.id',$borrowId)
            ->first([
                'books_borrow.*',
                'users.name as member_name'
            ]);
        return view("Library::book.issue.show",$data);
    }
}
