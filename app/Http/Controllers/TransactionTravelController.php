<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelTransactions as TravelTr;
use App\Models\Travel as TravelModel;


class TransactionTravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = TravelTr::orderBy('id','desc')->get();
        return view('dashboard-admin.travel_transaction.index',compact('transactions'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction    = TravelTr::findOrFail($id);
        return view('dashboard-admin.travel_transaction.show',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = TravelTr::findOrFail($id);
        return view('dashboard-admin.travel_transaction.edit',compact('transaction'));
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


        TravelTr::where('id',$id)->update([
            'status'   => $request->status,
            'dibayar'  => $request->total_bayar,

        ]);
        return redirect()->route('transactiontravel.index')->with('success','Transaction Was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = TravelTr::findorFail($id);
        $transaction->delete();
        return redirect()->route('transactiontravel.index')->with('success','transaction Was Deleted');
    }

    public function showTrash()
    {
        $transactions = TravelTr::onlyTrashed()->get();
        return view('dashboard-admin.travel_transaction.trash',compact('transactions'));
    }

    public function restore($id)
    {
        $transaction = TravelTr::withTrashed()->where('id',$id)->first();
        $transaction->restore();
        return redirect()->back()->with('success','Transaction Was Restored !!');
        
    }

    public function kill($id)
    {
        $transaction = TravelTr::withTrashed()->where('id',$id)->first();
        $transaction->forceDelete();
        return redirect()->back()->with('success','Transaction Was Deleted');
    
    }

    public function printPDFTravel($id){
        $transaction    = TravelTr::findOrFail($id);
        

        // $travel         = TravelModel::findorFail($travel_id); 
        // dd($travel);
        return view('blog.layout.invoicetravel',compact('transaction'));
    }
    
}
