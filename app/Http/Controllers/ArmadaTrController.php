<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArmadaTransaction as ArmadaTR;
use App\Models\ArmadaDetail as ArmadaDT;
use App\Models\Armada;

class ArmadaTrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = ArmadaTR::orderBy('id','desc')->get();
        return view('dashboard-admin.armada_transaction.index',compact('transactions'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction    = ArmadaTR::findOrFail($id);
        $details        = ArmadaDT::where('armada_transaction_id',$transaction['id'])->get();
        return view('dashboard-admin.armada_transaction.show',compact('transaction','details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction    = ArmadaTR::findOrFail($id);
        return view('dashboard-admin.armada_transaction.edit',compact('transaction'));

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
            'status'        => 'required',
            'total_bayar' => 'required|regex:/^[0-9]+$/|min:3|max:15',
        ]);


        ArmadaTR::where('id',$id)->update([
            'status'   => $request->status,
            'total_bayar'  => $request->total_bayar,

        ]);
        return redirect()->route('transactionarmada.index')->with('success','Transaction Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = ArmadaTr::findorFail($id);
        $transaction->delete();
        return redirect()->route('transactionarmada.index')->with('success','transaction Was Deleted');
    }

    public function showTrash()
    {
        $transactions = ArmadaTr::onlyTrashed()->get();
        return view('dashboard-admin.armada_transaction.trash',compact('transactions'));
    }

    public function restore($id)
    {
        $transaction = ArmadaTr::withTrashed()->where('id',$id)->first();
        $transaction->restore();
        return redirect()->back()->with('success','Transaction Was Restored !!');
        
    }

    public function kill($id)
    {
        $transaction = ArmadaTr::withTrashed()->where('id',$id)->first();
        $transaction->forceDelete();
        return redirect()->back()->with('success','Transaction Was Deleted');
    
    }

    public function printarmadaTruck($id){
        $transaction    = ArmadaTR::findOrFail($id);
        $details        = ArmadaDT::where('armada_transaction_id',$transaction['id'])->get();
        return view('blog.layout.invoicearmada',compact('transaction','details'));

    }
}
