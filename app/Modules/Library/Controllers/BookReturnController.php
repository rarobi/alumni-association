<?php

namespace App\Modules\Library\Controllers;

use App\Models\Auth\User;
use App\Modules\Library\Models\BookBorrow;
use App\Modules\Library\Models\BookBorrowDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookReturnController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['members'] = User::pluck('name','id');
        if($request->has('member_id')){
            $memberId = $request->get('member_id');
            $bookBorrow = BookBorrow::leftJoin('books_borrow_details','books_borrow_details.borrow_id','=','books_borrow.id')
                ->leftJoin('books','books.id','=','books_borrow_details.book_id')
                ->leftJoin('book_categories','book_categories.id','=','books.category_id')
                ->leftJoin('book_publishers','book_publishers.id','=','books.publisher_id')
                ->leftJoin('book_writers','book_writers.id','=','books.writer_id')
                ->where('member_id',$memberId)
                ->where('is_returned',0)
                ->get([
                    'books_borrow_details.*',
                    'books_borrow.issue_date',
                    'books_borrow.is_returned',
                    'books_borrow.date_for_return',
                    'books_borrow.returned_date',
                    'books.name as book_name',
                    'books.code as book_code',
                    'books.code as book_code',
                    'book_categories.name as book_category',
                    'book_publishers.name as book_publisher',
                    'book_writers.name as book_writer'
                ]);

            if(count($bookBorrow) == 0){
                return redirect()->route('library.book.return.index')->withFlashInfo('This member has no books to return!');
            }

            $records = [];
            foreach($bookBorrow as $value){
                $records[$value->borrow_id]['issue_date']          = Carbon::parse($value->issue_date)->format('F d, Y');
                $records[$value->borrow_id]['is_returned']         = $value->is_returned;
                $records[$value->borrow_id]['date_for_return']     = $value->date_for_return;
                $records[$value->borrow_id]['returned_date']       = ($value->returned_date)?$value->returned_date:'N/A';
                $records[$value->borrow_id]['borrow_id'][]         = $value->borrow_id;
                $records[$value->borrow_id]['borrow_details_id'][] = $value->id;
                $records[$value->borrow_id]['book_name'][]         = $value->book_name;
                $records[$value->borrow_id]['book_category'][]     = $value->book_category;
                $records[$value->borrow_id]['book_publisher'][]    = $value->book_publisher;
                $records[$value->borrow_id]['book_quantity'][]     = $value->book_quantity;
                $records[$value->borrow_id]['return_status'][]     = $value->return_status;
            }
            $data['memberId'] = $memberId;
            $data['records'] = $records;
        }
        return view("Library::book.return.index",$data);
    }

    public function update(Request $request, $id)
    {
        $borrowIds = $request->get('borrow_id');
        $returnStatus = $request->get('return_status');
        $receivedBorrowDetailsIds = [];
        foreach($returnStatus as $borrowId => $borrowDetails){
            foreach($borrowDetails as $detailsId => $receiveStatus){
                if($receiveStatus == 1){
                    $receivedBorrowDetailsIds[] = $detailsId;
                }
            }
        }
        BookBorrowDetails::whereIn('id',$receivedBorrowDetailsIds)
                            ->update(['return_status'=>1]);

        foreach($borrowIds as $borrowId){
            $CountNotReturnedBook = BookBorrowDetails::where('borrow_id',$borrowId)
                                    ->where('return_status',0)->count();
            if($CountNotReturnedBook == 0){
                BookBorrow::where('id',$borrowId)->update([
                    'returned_date' => Carbon::now(),
                    'is_returned'   => 1
                ]);
            }
        }
        return redirect()->route('library.book.return.index')->withFlashSuccess('Book return recorded successfully');
    }

}
