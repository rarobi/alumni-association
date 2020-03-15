<?php

namespace App\Modules\Payment\Controllers;

use App\Modules\Payment\Models\StorePaymentInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['payments'] = StorePaymentInfo::orderBy('id', 'DESC')->paginate(10);
        return view("Payment::index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Payment::create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules['paymemt_type'] = 'required';
        if($request->get('paymemt_type') == 'bank'){
            $rules['branch_name'] = 'required';
        } else {
            $rules['transaction_id'] = 'required';
            $rules['transaction_number'] = 'required';
        }

        $this->validate($request, $rules);

        $store_payment_info = new StorePaymentInfo();
//        $store_payment_info->user_mobile        = $request->input('mobile');
        $store_payment_info->payment_type   = $request->input('paymemt_type');
        $store_payment_info->transaction_id = $request->input('transaction_id');
        $store_payment_info->transaction_number = $request->input('transaction_number');
        $store_payment_info->branch_name    = $request->input('branch_name');
        $store_payment_info->payment_date   = Carbon::parse($request->input('payment_date'))->format('Y-m-d');
        $store_payment_info->created_by     = Auth::id();

        $prefix = date('Ymd_');
        $photo = $request->file('document');

        if ($request->file('document')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('/payment')->with('flash_danger','Document image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/store_payment_documents/', $photoFile);
            $store_payment_info->document = $photoFile;
        }
        $store_payment_info->save();

        return redirect()->route('payment.index')->withFlashSuccess('Payment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['payment'] = StorePaymentInfo::find($id);
        return view("Payment::show", $data);
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
        $store_payment = StorePaymentInfo::find($id);
        $store_payment->delete();

        return;
//        return redirect()->route('payment.index')->withFlashSuccess('Payment deleted successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        $tranxId = $request->input('tranxId');
        $data['payments'] = StorePaymentInfo::where('transaction_id', 'LIKE','%'.$tranxId.'%')->paginate(10);
        return view("Payment::index", $data);
    }
}
