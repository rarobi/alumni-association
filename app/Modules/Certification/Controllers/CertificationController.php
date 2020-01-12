<?php

namespace App\Modules\Certification\Controllers;

use App\Modules\Certification\Models\Certification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['certifications'] = Certification::orderBy('id', 'DESC')->get();
        return view("Certification::index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Certification::create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $certification = new Certification();
        $certification->name         = $request->input('name');
        $certification->job_place    = $request->input('company');
        $certification->designation  = $request->input('designation');
        $certification->description  = $request->input('quote');

        $prefix = date('Ymd_');
        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/certification_photo/', $photoFile);
            $certification->image = $photoFile;
        }
        $certification->save();

        return redirect()->route('certification.index')->withFlashSuccess('Certification created successfully');
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
        $data['certification']  = Certification::find($id);
        return view("Certification::edit", $data);
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
        $certification = Certification::find($id);
        $certification->name         = $request->input('name');
        $certification->job_place    = $request->input('company');
        $certification->designation  = $request->input('designation');
        $certification->description  = $request->input('quote');

        if($request->has('photo')){

        $prefix = date('Ymd_');
        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/certification_photo/', $photoFile);
            $certification->image = $photoFile;
        }
      }
        $certification->save();

        return redirect()->route('certification.index')->withFlashSuccess('Certification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certification = Certification::find($id);
        $certification->delete();

        return redirect()->route('certification.index')->withFlashSuccess('Certification deleted successfully');


    }
}
