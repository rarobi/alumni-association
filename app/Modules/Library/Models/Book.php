<?php


namespace App\Modules\Library\Models;


use App\Modules\Settings\Models\Category;
use App\Modules\Settings\Models\Writer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
    	'id',
    	'writer_id',
    	'category_id',
    	'publisher_id',
    	'name',
    	'code',
    	'price',
    	'summary',
    	'photo',
    	'stock_quantity',
    	'status',
    	'created_by',
    	'updated_by',
    	'created_at',
    	'updated_at'
    ];


    public function category() {
        return $this->hasMany(Category::class);
    }

    public function writer() {
        return $this->hasMany(Writer::class);
    }

    public function bookBorrow(){
        return $this->hasMany(BookBorrow::class,'book_id','id');
    }

    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($book) {
            $book->created_by = Auth::user()->id;
            $book->updated_by = Auth::user()->id;
        });

        static::updating(function($book) {
            $book->updated_by = Auth::user()->id;
        });
    }
}
