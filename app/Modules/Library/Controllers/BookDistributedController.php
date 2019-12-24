<?php

namespace App\Modules\Library\Controllers;

use App\Models\Auth\User;
use App\Modules\Library\Models\BookBorrow;
use App\Modules\Library\Models\BookBorrowDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookDistributedController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['distributedBooks'] = BookBorrowDetails::leftJoin('books_borrow','books_borrow.id','=','books_borrow_details.borrow_id')
                ->leftJoin('users','users.id','=','books_borrow.member_id')
                ->leftJoin('books','books.id','=','books_borrow_details.book_id')
                ->leftJoin('book_categories','book_categories.id','=','books.category_id')
                ->leftJoin('book_publishers','book_publishers.id','=','books.publisher_id')
                ->leftJoin('book_writers','book_writers.id','=','books.writer_id')
                ->where('books_borrow_details.return_status',0)
                ->orderBy('books_borrow_details.created_at','desc')
                ->select([
                    'books_borrow_details.*',
                    'books_borrow.issue_date',
                    'books_borrow.date_for_return as expected_return_date',
                    'users.name as member_name',
                    'books.name as book_name',
                    'book_categories.name as category_name',
                    'book_publishers.name as publisher_name',
                    'book_writers.name as writer_name'
                ])->paginate(15);
        return view("Library::book.distributed.index",$data);
    }

}
