<?php


namespace App\Modules\Library\Models;


use Illuminate\Database\Eloquent\Model;

class BookBorrow extends Model
{
    protected $table = 'books_borrow';
    protected $fillable = [
        'id',
        'member_id',
        'issue_date',
        'date_for_return',
        'returned_date',
        'is_returned',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at'
    ];

    public function bookBorrowDetails(){
        return $this->hasOne(BookBorrowDetails::class,'borrow_id','id');
    }
}
