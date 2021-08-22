<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shippingrates as Rates;
use App\Models\Origins ;
use App\Models\Destinations ;
use App\Models\Variantservices ;
class ShippingratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rates::OrderBy('id','DESC')->get();
        return view('dashboard-admin.shippingrate.index',compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variants = Variantservices::all();
        $origins = Origins::all();
        $destinations = Destinations::all();
        return view('dashboard-admin.shippingrate.create',compact('origins','destinations','variants'));
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
            'origin_id'  => 'required|integer',
            'destination_id'  => 'required|integer',
            'under_terms'  => 'required|integer',
            'above_terms'  => 'required|integer',
            'est_arrived'  => 'required',
            'variant_id'  => 'required',
        ]);

        Rates::create([
            'origin_id'  => $request->origin_id,
            'destination_id'  => $request->destination_id,
            'under_terms'  => $request->under_terms,
            'above_terms'  => $request->above_terms,
            'est_arrived'  => $request->est_arrived,
            'variantservice_id'  => $request->variant_id,
        ]);
        return redirect()->route('rate.index')->with('success','Shipping Rate Was Added');
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
        $rate = Rates::find($id);
        if ($rate == null) {

            return redirect('/rate')->with('danger','Shipping Rate Not Found');

        }else {

            $origin_id = $rate['origin_id'];
            $destination_id = $rate['destination_id'];
            $variant_id = $rate['variantservice_id'];

            $origins = Origins::where('id','!=',$origin_id)->get();
            $destinations = Destinations::where('id','!=',$destination_id)->get();
            $variants = Variantservices::where('id','!=',$variant_id)->get();

            return view('dashboard-admin.shippingrate.edit',compact('rate','origins','destinations','variants'));
        }
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
            'origin_id'  => 'required|integer',
            'destination_id'  => 'required|integer',
            'under_terms'  => 'required|integer',
            'above_terms'  => 'required|integer',
            'est_arrived'  => 'required',
            'variant_id'  => 'required',

        ]);

        Rates::where('id',$id)->update([
            'origin_id'  => $request->origin_id,
            'destination_id'  => $request->destination_id,
            'under_terms'  => $request->under_terms,
            'above_terms'  => $request->above_terms,
            'est_arrived'  => $request->est_arrived,
            'variantservice_id'  => $request->variant_id,
        ]);
        return redirect()->route('rate.index')->with('success','Shipping Rate Was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Rates::find($id);
        $rate->delete();
        return redirect()->route('rate.index')->with('success','Shipping Rate Was Deleted');

    }
}
