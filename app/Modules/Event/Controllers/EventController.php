<?php

namespace App\Modules\Event\Controllers;

use App\Modules\Event\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = Event::orderBy('id', 'DESC')->get();
        return view("Event::index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Event::create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title         = $request->input('title');
        $event->description   = $request->input('details');
        $event->date          = $request->input('date');

        $prefix = date('Ymd_');
        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/event_photo/', $photoFile);
            $event->image = $photoFile;
        }
        $event->save();

        return redirect()->route('event.index')->withFlashSuccess('Event created successfully');
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
        $data['event']  = Event::find($id);
        return view("Event::edit", $data);
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
        $event = Event::find($id);
        $event->title         = $request->input('title');
        $event->description   = $request->input('details');
        $event->date          = $request->input('date');

        if($request->has('photo')){

        $prefix = date('Ymd_');
        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/event_photo/', $photoFile);
            $event->image = $photoFile;
        }

       }
        $event->save();

        return redirect()->route('event.index')->withFlashSuccess('Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('event.index')->withFlashSuccess('Event deleted successfully');
    }
}
