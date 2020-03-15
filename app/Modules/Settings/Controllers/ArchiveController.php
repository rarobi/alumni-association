<?php
/**
 * Created by PhpStorm.
 * User: sajan
 * Date: 3/11/20
 * Time: 9:02 AM
 */

namespace App\Modules\Settings\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Settings\Models\ArchiveMember;
use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\Session;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $data['archive_members'] = ArchiveMember::orderBy('id', 'DESC')->get();
        return view("Settings::archive-members.index",$data);
    }

    public function create()
    {
        $data['batches'] = Batch::pluck('name','name');
        $data['sessions'] = Session::pluck('session', 'session');

        return view("Settings::archive-members.create",$data);
    }

    public function store(Request $request){

        $name          = $request->input('name');
        $designation   = $request->input('designation');
        $batch         = $request->input('batch');
        $session       = $request->input('session');
        $elected_years = $request->input('elected_years');
        $is_published  = $request->input('is_published');

        $archive = new ArchiveMember();
        $archive->name          = $name;
        $archive->designation   = $designation;
        $archive->batch         = $batch;
        $archive->session       = $session;
        $archive->elected_years = $elected_years;
        $archive->is_published  = isset($is_published) ? $is_published : 0;

        $prefix = date('Ymd_');
        $photo = $request->file('image');

        if ($request->file('image')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('/settings/alumni/archive')->with('flash_danger','Document image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/archive_elected_members/', $photoFile);
            $archive->image = $photoFile;
        }
        $archive->save();

        return redirect()->route('settings.alumni.archive.index')->withFlashSuccess('Archived created successfully');
    }

    public function show($id)
    {
        $data['archive'] = ArchiveMember::findOrFail($id);
        return view("Settings::archive-members.show",$data);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}