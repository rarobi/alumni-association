<?php

namespace App\Modules\Announcement\Controllers;

use App\Modules\Announcement\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['announcements'] = Announcement::orderBy('id', 'DESC')->get();
        return view("Announcement::index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement = new Announcement();
        $announcement->title        = $request->input('title');
        $announcement->description  = $request->input('details');
        $announcement->save();

        return redirect()->route('announcement.index')->withFlashSuccess('Announcement create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['announcement']  = Announcement::find($id);
        return view("Announcement::edit", $data);
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
        $announcement = Announcement::find($id);
        $announcement->title        = $request->input('title');
        $announcement->description  = $request->input('details');
        $announcement->save();

        return redirect()->route('announcement.index')->withFlashSuccess('Announcement update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();

        return redirect()->route('announcement.index')->withFlashSuccess('Announcement deleted successfully');
    }
}
