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
        $data['batches'] = Batch::pluck('name','id');
        $data['sessions'] = Session::pluck('session', 'session');

        return view("Settings::archive-members.create",$data);
    }

    public function store(Request $request){

    }

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