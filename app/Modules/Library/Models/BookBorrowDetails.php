<?php


namespace App\Modules\Library\Models;


use Illuminate\Database\Eloquent\Model;

class BookBorrowDetails extends Model
{
    protected $table = 'books_borrow_details';
    protected $fillable = [
        'id',
        'borrow_id',
        'book_id',
        'book_quantity',
        'return_status',
        'remarks',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at'
    ];

    public function bookBorrow(){
        return $this->belongsTo(BookBorrow::class,'borrow_id','id');
    }

    public function book(){
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
