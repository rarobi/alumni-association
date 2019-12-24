<?php


namespace App\Modules\Settings\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
//    use SoftDeletes;

//    protected $dates = ['deleted_at'];

    protected $table = 'book_publishers';

//    protected $guarded = ['created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];

}
