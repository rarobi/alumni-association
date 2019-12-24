<?php

namespace App\Modules\Settings\Controllers;

use App\Modules\Settings\Models\Category;
use App\Modules\Settings\Models\Writer;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookWriterController extends Controller
{
    public function index()
    {
        $data['writers'] = Writer::all();
        return view("Settings::book.writer.index",$data);
    }

    public function edit($id)
    {
        $data['writer'] = Writer::findOrFail($id);
        return view("Settings::book.writer.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $name    = $request->name;
        $details = $request->details;

        $writer  = Writer::findOrFail($id);
        $writer->name           = $name;
        $writer->writer_details = $details;
        $writer->save();

        return redirect()->route('settings.book.writers.index')->withFlashSuccess('Book writer update successfully');
    }

    public function destroy($id)
    {
        $writer  = Writer::findOrFail($id);
        $writer->delete();
        return redirect()->route('settings.book.writers.index')->withFlashSuccess('Book writer delete successfully');
    }


    public function store(Request $request)
    {
        $writer_name    = $request->input('name');
        $writer_details = $request->input('details');

        if(!empty($writer_name) && !empty($writer_details)) {
            $writer = new Writer();
            $writer->name           = $writer_name;
            $writer->writer_details = $writer_details;
            $writer->save();
        }
        return redirect()->route('settings.book.writers.index')->withFlashSuccess('Book Writer created successfully');
    }
}
