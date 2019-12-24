<?php

namespace App\Modules\Settings\Controllers;

use App\Modules\Settings\Models\Category;
use App\Modules\Settings\Models\Writer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCategoryController extends Controller
{


    public function index()
    {
        $data['categories'] = Category::all();
        return view("Settings::book.category.index",$data);
    }

    public function store(Request $request)
    {
        $category_name   = $request->input('name');
        $category_status = $request->input('status');

        if(!empty($category_name) && !empty($category_status)) {
            $category = new  Category();
            $category->name     = $category_name;
            $category->status   = $category_status;
            $category->save();
        }
        return redirect()->route('settings.book.category.index')->withFlashSuccess('Book Category created successfully');
    }

    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view("Settings::book.category.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $name    = $request->name;
        $status  = $request->status;

        $category  = Category::findOrFail($id);
        $category->name   = $name;
        $category->status = $status;
        $category->save();

        return redirect()->route('settings.book.category.index')->withFlashSuccess('Book category update successfully');
    }

    public function destroy($id)
    {
        $category  = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('settings.book.category.index')->withFlashSuccess('Book category delete successfully');

    }
}
