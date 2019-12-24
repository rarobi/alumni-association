<?php


namespace App\Modules\Settings\Models;


use App\Modules\Library\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
//    use SoftDeletes;

//    protected $dates = ['deleted_at'];

    protected $table = 'book_categories';

//    protected $guarded = ['created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];

    public function book() {
        return $this->belongsToMany(Book::class,'books','category_id');
    }
}
