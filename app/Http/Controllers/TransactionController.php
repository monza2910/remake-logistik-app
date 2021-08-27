<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Tracking;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions =  Transaction::orderBy('id','DESC')->get();
        return view('dashboard-admin.transaction.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard-admin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tn'        => 'required',
            'sender'    => 'required|max:50|min:3',
            'phone_sender' => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'a_sender' => 'required|min:5',
            'penerima'    => 'required|max:50|min:3',
            'phone_penerima' => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'a_penerima' => 'required|min:5',
        ]);


        Transaction::create([
            'tracking_number'   => $request->tn,
            'sender'            => $request->sender,
            'phone_sender'      => $request->phone_sender,
            'address_sender'      => $request->a_sender,
            'penerima'            => $request->penerima,
            'phone_penerima'      => $request->phone_penerima,
            'address_penerima'      => $request->a_penerima,

        ]);
        return redirect()->route('transaction.index')->with('success','Transaction Was Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $idtr        = $transaction['id'];
        $trackings    =  Tracking::where('transaction_id',$idtr)->orderBy('id','DESC')->get();

        return view('dashboard-admin.transaction.show',compact('transaction','trackings'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('dashboard-admin.transaction.edit',compact('transaction'));
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
        $request->validate([
            'tn'        => 'required',
            'sender'    => 'required|max:50|min:3',
            'phone_sender' => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'a_sender' => 'required|min:5',
            'penerima'    => 'required|max:50|min:3',
            'phone_penerima' => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'a_penerima' => 'required|min:5',
        ]);


        Transaction::where('id',$id)->update([
            'tracking_number'   => $request->tn,
            'sender'            => $request->sender,
            'phone_sender'      => $request->phone_sender,
            'address_sender'      => $request->a_sender,
            'penerima'            => $request->penerima,
            'phone_penerima'      => $request->phone_penerima,
            'address_penerima'      => $request->a_penerima,

        ]);
        return redirect()->route('transaction.index')->with('success','Transaction Was Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findorFail($id);
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success','transaction Was Deleted');

    }
    
    public function showTrash()
    {
        $transactions = Transaction::onlyTrashed()->get();
        return view('dashboard-admin.transaction.trash',compact('transactions'));
    }
    
    public function restore($id)
    {
        $transaction = Transaction::withTrashed()->where('id',$id)->first();
        $transaction->restore();
        return redirect()->back()->with('success','Transaction Was Restored !!');
        
    }
    
    public function kill($id)
    {
        $transaction = Transaction::withTrashed()->where('id',$id)->first();
        $transaction->forceDelete();
        return redirect()->back()->with('success','Transaction Was Deleted');
    
    }
    

    public function addTracking($id){
        $idtr = $id;
        return view('dashboard-admin.transaction.addtracking',compact('idtr'));
    }

    public function storeTracking(Request $request){
        $request->validate([
            'location'  => 'required',
            'status'  => 'required',
        ]);

        Tracking::create([
            'transaction_id' => $request->id_tr,
            'status' => $request->status,
            'location' => $request->location,
        ]);
        return redirect()->back()->with('success','Tracking Was Added');

    }

    public function killTracking($id)
    {
        $tracking = Tracking::findorFail($id);
        $tracking->delete();
        return redirect()->back()->with('success','Tracking Was Deleted');
    
    }
}
