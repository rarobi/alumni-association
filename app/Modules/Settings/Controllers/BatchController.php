<?php

namespace App\Modules\Settings\Controllers;

use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{


    public function index()
    {
        $data['batches'] = Batch::all();
        return view("Settings::batch.index",$data);
    }

    public function store(Request $request)
    {
        $batch_name   = $request->input('name');

        if(!empty($batch_name)) {
            $batch = new  Batch();
            $batch->name   = $batch_name;
            $batch->save();
        }
        return redirect()->route('settings.alumni.batch.index')->withFlashSuccess('Batch created successfully');
    }

    public function edit($id)
    {
        $data['batch'] = Batch::findOrFail($id);
        return view("Settings::batch.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $name    = $request->name;

        $batch  = Batch::findOrFail($id);
        $batch->name   = $name;
        $batch->save();

        return redirect()->route('settings.alumni.batch.index')->withFlashSuccess('Batch update successfully');
    }

    public function destroy($id)
    {
        $batch  = Batch::findOrFail($id);
        $batch->delete();
        return redirect()->route('settings.alumni.batch.index')->withFlashSuccess('Batch delete successfully');

    }
}
