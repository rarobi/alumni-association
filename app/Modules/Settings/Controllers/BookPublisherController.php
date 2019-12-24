<?php

namespace App\Modules\Settings\Controllers;

use App\Modules\Settings\Models\Publisher;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookPublisherController extends Controller
{
    public function index()
    {
        $data['publishers'] = Publisher::all();
        return view("Settings::book.publisher.index",$data);
    }

    public function store(Request $request)
    {
        $publisher_name   = $request->input('name');
        $publisher_status = $request->input('status');

        if(!empty($publisher_name) && !empty($publisher_status)) {
            $publisher = new  Publisher();
            $publisher->name     = $publisher_name;
            $publisher->status   = $publisher_status;
            $publisher->save();
        }
        return redirect()->route('settings.book.publisher.index')->withFlashSuccess('Book Publisher created successfully');
    }

    public function edit($id)
    {
        $data['publisher'] = Publisher::findOrFail($id);
        return view("Settings::book.publisher.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $name    = $request->name;
        $status  = $request->status;

        $publisher  = Publisher::findOrFail($id);
        $publisher->name   = $name;
        $publisher->status = $status;
        $publisher->save();

        return redirect()->route('settings.book.publisher.index')->withFlashSuccess('Book publisher update successfully');
    }

    public function destroy($id)
    {
        $publisher  = Publisher::findOrFail($id);
        $publisher->delete();
        return redirect()->route('settings.book.publisher.index')->withFlashSuccess('Book publisher delete successfully');

    }
}
