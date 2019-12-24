<?php

namespace App\Modules\Library\Controllers;

use App\Modules\Library\Models\Book;
use App\Modules\Settings\Models\Category;
use App\Modules\Settings\Models\Writer;
use App\Modules\Settings\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookEntryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['books'] = Book::leftJoin('book_categories', 'book_categories.id', '=', 'books.category_id')
                            ->leftJoin('book_writers', 'book_writers.id', '=', 'books.writer_id')
                            ->get([
                                'books.*',
                                'book_categories.name as category_name',
                                'book_writers.name as writer_name'
                            ]);
        return view("Library::book.entry.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name','id');
        $data['writers']    = Writer::pluck('name','id');
        $data['publishers']    = Publisher::pluck('name','id');
        return view("Library::book.entry.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'writer_id'     => 'required',
            'category_id'   => 'required',
            'code'          => 'required',
            'price'         => 'required',
            'summery'       => 'required',
            'stock_quantity' => 'required',
            'status'        => 'required',
            'photo'         => 'required'
        ]);

        $book = Book::firstOrNew(['code'=>$request->get('code')]);
        $book->writer_id      = $request->get('writer_id');
        $book->category_id    = $request->get('category_id');
        $book->publisher_id   = $request->get('publisher_id');
        $book->name           = $request->get('name');
        $book->code           = $request->get('code');
        $book->price          = $request->get('price');
        $book->summary        = $request->get('summery');
        $book->stock_quantity += (integer) $request->get('stock_quantity');
        $book->status         = $request->get('status');

        $prefix = date('Ymd_');
        $photo = $request->file('photo');
        if ($request->hasFile('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('profile/edit')->with('flash_danger','Book image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/books/', $photoFile);
            $book->photo = $photoFile;
        }
        $book->save();
        return redirect()->route('library.book.entry.index')->withFlashSuccess('Book has stored successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['book'] = Book::leftJoin('book_categories', 'book_categories.id', '=', 'books.category_id')
            ->leftJoin('book_writers', 'book_writers.id', '=', 'books.writer_id')
            ->leftJoin('book_publishers', 'book_publishers.id', '=', 'books.publisher_id')
            ->where('books.id', $id)
            ->first([
                'books.*',
                'book_categories.name as category_name',
                'book_publishers.name as publisher_name',
                'book_writers.name as writer_name'
            ]);
        return view("Library::book.entry.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['book'] = Book::leftJoin('book_categories', 'book_categories.id', '=', 'books.category_id')
            ->leftJoin('book_writers', 'book_writers.id', '=', 'books.writer_id')
            ->where('books.id', $id)
            ->first([
                'books.*',
                'book_categories.name as category_name',
                'book_writers.name as writer_name'
            ]);
        $data['categories'] = Category::pluck('name','id');
        $data['writers']    = Writer::pluck('name','id');
        return view("Library::book.entry.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {
        $this->validate($request,[
            'name'          => 'required',
            'writer_id'     => 'required',
            'category_id'   => 'required',
            'code'          => 'required',
            'price'         => 'required',
            'summery'       => 'required',
            'stock_quantity' => 'required',
            'status'        => 'required',
            'photo'         =>'required'

        ]);

        $book = Book::find($bookId);
        $book->writer_id      = $request->get('writer_id');
        $book->category_id    = $request->get('category_id');
        $book->publisher_id   = $request->get('publisher_id');
        $book->name           = $request->get('name');
        $book->code          = $request->get('code');
        $book->price          = $request->get('price');
        $book->summary        = $request->get('summery');
        $book->stock_quantity        = $request->get('stock_quantity');
        $book->status         = $request->get('status');
        $book->photo = $request->get('photo');

        $prefix = date('Ymd_');
        $photo = $request->file('photo');
        if ($request->hasFile('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('profile/edit')->with('flash_danger','Book image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/books/', $photoFile);
            $book->photo = $photoFile;
        }
        $book->save();
        return redirect()->route('library.book.entry.index')->withFlashSuccess('Book has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId)
    {
       Book::where('id',$bookId)->delete();
        return redirect()->route('library.book.entry.index')->withFlashSuccess('Book has deleted successfully.');
    }
}
