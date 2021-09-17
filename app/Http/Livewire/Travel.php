<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

// MODELS
use App\Models\Origins ;
use App\Models\Destinations ;
use App\Models\Travel as TravelModel;
use App\Models\TravelTransactions;

class Travel extends Component
{
    public $from, $to, $travel_id ;
    public $sub_total, $total, $dibayar, $status, $tgl_berangkat, $jam_berangkat;
    public $diskon = '0';
    public $nama_penumpang, $alamat_penumpang, $no_penumpang, $alamat_penjemputan, $alamat_pemberhentian;


    public function render()
    {

        $origins = TravelModel::distinct()->get(['origin_id']);
        
        //IF FROM MODEL NOT NULL AND NULL
        if (!empty($this->from)) {
            $destinations = TravelModel::where('origin_id',$this->from)->distinct()->get(['destination_id']);
        }else {
            $destinations = [];
            $facilitys = [];
            $this->price = '';
        }
        
        //IF FROM & TO MODEL NOT NULL AND NULL
        if (!empty($this->to) && !empty($this->from)) {
            $travels = TravelModel::where([['origin_id',$this->from],['destination_id', $this->to]])->get();
        } else {
            $travels = [];
            $facilitys = [];
            $this->price = '';
        }

        //IF TRAVEL ID MODEL NOT NULL AND NULL
        if (!empty($this->travel_id)) {
            $facilitys = TravelModel::where('id',$this->travel_id)->get(); 
            foreach ($facilitys as $fac) {
                $price = $fac['price'];
            }
            $this->sub_total = $price;
        } else {
            $facilitys = [];
        }
        
   

        if (!empty($this->diskon)) {
            $this->total = $this->sub_total - $this->diskon;
        }else{
            $this->total = $this->sub_total;
        }

    


        // dd($this->jam_berangkat);
        return view('livewire.travel',[
            'origins'  => $origins,
            'destinations' => $destinations,
            'travels' => $travels,
            'facilitys' => $facilitys,
        ]);
    }

    // Add Item 
    

    public function resetFields(){
        $this->to = '';
        $this->diskon = '0';
        $this->dibayar = '';
        $this->tgl_berangkat = '';
        $this->jam_berangkat = '';
    }
    public function resetFieldsAll(){
        $this->to = '';
        $this->diskon = '0';
        $this->dibayar = '';
        $this->tgl_berangkat = '';
        $this->jam_berangkat = '';
        $this->nama_penumpang = '';  
        $this->alamat_penumpang = '';
        $this->no_penumpang = '';
        $this->alamat_penjemputan = '';
        $this->alamat_pemberhentian = '';
    }

    public function submitHandle(){

        $this->validate([
            'nama_penumpang' => 'required',
            'alamat_penumpang' => 'required',
            'no_penumpang' => 'required|numeric',
            'alamat_penjemputan' => 'required',
            'alamat_pemberhentian' => 'required',
            'from' => 'required',
            'to' => 'required',
            'sub_total' => 'required',
            'total' => 'required', 
            'status' => 'required',
            'tgl_berangkat' => 'required',
            'jam_berangkat' => 'required',
            'dibayar' => 'required|numeric',
            'travel_id' => 'required', 
        ]);
        $statement = DB::select("SHOW TABLE STATUS LIKE 'travel_transactions'");
        $lastid = $statement[0]->Auto_increment;

        $dateNow = Carbon::now();
        $date   = $dateNow->format('YmdH');
        $codeyear = $dateNow->format('Y');
        $codemonthday= $dateNow->format('md');
        //Generate Invoice
        $invoice = "INV/KMJ/TRV/00".$lastid."/".$codemonthday."/".$codeyear;

        $namaBarcode =  "INV-KMJ-TRV-00".$lastid."-".$codemonthday."-".$codeyear.'.svg';
        \QrCode::size(300)
            ->format('svg')
            ->generate($invoice, public_path('images/trtravel/'.$namaBarcode));
        

        try {
            TravelTransactions::create([
                'invoice' => $invoice,
                'qrcode' => $namaBarcode,
                'nama_penumpang' => $this->nama_penumpang,
                'alamat_penumpang' => $this->alamat_penumpang,
                'no_penumpang' => $this->no_penumpang,
                'alamat_penjemputan' => $this->alamat_penjemputan,
                'alamat_pemberhentian' =>$this->alamat_pemberhentian,
                'origin_id' => $this->from,
                'destination_id' => $this->to,
                'subtotal' => $this->sub_total,
                'diskon' => $this->diskon,
                'total' => $this->total, 
                'status' => $this->status,
                'tgl_berangkat' => $this->tgl_berangkat,
                'jam_berangkat' => $this->jam_berangkat,
                'dibayar' => $this->dibayar,
                'travel_id' => $this->travel_id, 
                'user_id' => Auth()->id(),
            ]);
            
            $this->resetFieldsAll();
            session()->flash('success','Transaction Wa Added ');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return session()->flash('error',$th);
        }

    }
}
