<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

//Model 
use App\Models\Origins ;
use App\Models\Destinations ;
use App\Models\Armada as ArmadaModel ;
use App\Models\ArmadaTransaction as ArmadaTR ;
use App\Models\ArmadaDetail as ArmadaDT;

class Armadabus extends Component
{
    public $diskon = '0';
    public $armada_id, $armada_name, $armada_price , $qty;
    public $from, $to;
    public $sub_total, $total, $dibayar, $status, $tgl_brkt,$tgl_kembali,$lama_sewa; 
    public $penyewa, $alamat_penyewa, $no_penyewa;  

    public function render()
    {
        $origins = ArmadaModel::where('variant','pickup')->distinct()->get(['origin_id']);

        //If from input was added
        if (!empty($this->from)) {
            $destinations = ArmadaModel::where([['origin_id',$this->from],['variant','bus']])->distinct()->get(['destination_id']);
        }else {
            $destinations = [];
        }

        //if to input was added
        if (!empty($this->to) && !empty($this->from)) {
            $armadas = ArmadaModel::where([['origin_id',$this->from],['destination_id', $this->to],['variant','bus']])->get();
        } else {
            $armadas = [];
        }

        if (!empty($this->armada_id)) {
            $facilitys = ArmadaModel::where('id',$this->armada_id)->get(); 
            
            foreach ($facilitys as $price ) {
                $this->armada_name = $price['name'];
                $this->armada_price = $price['price'];
            }

        } else {
            $facilitys = [];
        }

        $items = \Cart::session('armadabus')->getContent()->sortBy(function($cart){
            return $cart->attributes->get('added_at');
        });
        
        if(\Cart::isEmpty()){
            $cartData = [];
        }else{
            foreach($items as $item){
                $cart[] =[
                    'rowId'            => $item->id,
                    'name'             => $item->name,
                    'qty'              => $item->quantity,
                    'pricesingle'      => $item->price,
                    'price'      => $item->getPriceSum(),
                ];
            }
            
            
            $cartData = collect($cart);
        }


        $sub_total = \Cart::session('armadabus')->getSubTotal();

        if ($this->tgl_brkt != null && $this->tgl_kembali) {
            $brkt = strtotime($this->tgl_brkt);
            $kembali = strtotime($this->tgl_kembali);

            $total = $kembali - $brkt;
            $this->lama_sewa = $total /(60*60*24);

            $this->sub_total = $sub_total*$this->lama_sewa;
            if (!empty($this->diskon)) {
                $this->total = $this->sub_total - $this->diskon;
            } else {
                $this->total= $this->sub_total;
            }
        }
        
        
        
        
        
        
        return view('livewire.armadabus',[
            'origins'  => $origins,
            'destinations'  => $destinations,
            'armadas'  => $armadas,
            'facilitys'  => $facilitys,
            'carts'  => $cartData,
            'subtotal' => $sub_total
        ]);
    }

    public function addItem(){
        $this->validate([
            'armada_id' => 'required',
            'qty'    => 'required|numeric',
        ]);

        $rowId = $this->armada_id;
        $cart = \Cart::session('armadabus')->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        if($cekItemId->isNotEmpty()){
            \Cart::session('armadabus')->update($rowId,[
                'quantity' =>[
                    'relative' =>true,
                    'value'  => $this->qty,
                ]
            ]);
            $this->resetFields();
        }else{
            \Cart::session('armadabus')->add([
                'id'    => $this->armada_id,
                'name'  => $this->armada_name,
                'price' => $this->armada_price,
                'quantity'  => $this->qty,
                'attributes'  => [
                    'added_at' =>Carbon::now()
                ],
            ]);
            $this->resetFields();
        }
 
    }

    public function minItem($rowId){
        $cart = \Cart::session('armadabus')->getContent();
        $checkItemId = $cart->whereIn('id',$rowId);

        if($checkItemId[$rowId]->quantity > 1){
            \Cart::session('armadabus')->update($rowId,[
                'quantity' =>[
                    'relative' => true,
                    'value' => -1
                ]
            ]);
            $this->resetFieldsService();

        }else{
            \Cart::session('armadabus')->remove($rowId);
            $this->resetFieldsService();
            session()->flash('success','Package was Deleted');
        }
    }


    public function increaseItem($rowId){
        \Cart::session('armadabus')->update($rowId,[
            'quantity' =>[
                'relative' => true,
                'value'  =>1
            ]
        ]);
        $this->resetFieldsService();
    }

    public function removeItem($rowId){
        \Cart::session('armadabus')->remove($rowId);
        session()->flash('success','Package was Deleted');

    }

    public function resetFields(){
        $this->to = '';
        $this->diskon = '0';
        $this->qty = '';
        $this->armada_id = '';
        $this->armada_price = '';
        $this->dibayar = '';
        $this->tgl_berangkat = '';
        $this->jam_berangkat = '';
    }

    public function resetFieldsService(){
        $this->to=''; 
        $this->qty = '';
        $this->armada_id = '';
        $this->armada_price = '';
    }

    public function resetFieldAll(){
        $this->to = '';
        $this->diskon = '0';
        $this->qty = '';
        $this->armada_id = '';
        $this->armada_price = '';
        $this->dibayar = '';
        $this->tgl_berangkat = '';
        $this->jam_berangkat = '';
        $this->penyewa = '';
        $this->alamat_penyewa = '';
        $this->no_penyewa = '';
    }

    public function submitHandle(){
        $userid = Auth()->id();
        // $order = TransactionModel::whereRaw('id = (select max(`id`) from transactions)')->get();
        // foreach ($order as $od) {
        //     $lastid = $od->id;
        // }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'armada_transactions'");
        $lastid = $statement[0]->Auto_increment;
        $this->validate([
            'penyewa' => 'required',
            'alamat_penyewa' => 'required',
            'no_penyewa' => 'required|numeric',
            'sub_total' => 'required',
            'diskon' => 'nullable|numeric',
            'total' => 'required|numeric',
            'status' => 'required',
            'dibayar' => 'required|numeric',
            'tgl_brkt' => 'required',
            'tgl_kembali' => 'required',
            'lama_sewa' => 'required',
        ]);


        $dateNow = Carbon::now();
        $date   = $dateNow->format('YmdH');
        $codeyear = $dateNow->format('Y');
        $codemonthday= $dateNow->format('md');
        //Generate Invoice
        $invoice = "INV/KMJ/ARM/00".$lastid."/".$codemonthday."/".$codeyear;
        $namaBarcode  = "INV-KMJ-ARM-00".$lastid."-".$codemonthday."-".$codeyear.".svg";
        \QrCode::size(300)
            ->format('svg')
            ->generate($invoice, public_path('images/trarmada/'.$namaBarcode));
       
        try {
            $allcart = \Cart::session('armadabus')->getContent();
            
            $filterCart = $allcart->map(function($item){
                return[
                    'id'            => $item->id,
                    'name'          => $item->name,
                    'quantity'      => $item->quantity,
                    'price'         => $item->price,
                ];
            });
            //Action Save
            
            if (\Cart::isEmpty()) {
                session()->flash('danger','Data Keranjang Tidak Boleh Kosong');
            }else{
                $transaction = ArmadaTR::create([
                    'invoice' => $invoice,
                    'qr_code' => $namaBarcode,
                    'penyewa' => $this->penyewa,
                    'alamat_penyewa' => $this->alamat_penyewa,
                    'no_penyewa' => $this->no_penyewa,
                    'tgl_berangkat' => $this->tgl_brkt,
                    'tgl_kembali' => $this->tgl_kembali,
                    'sub_total' => $this->sub_total,
                    'diskon' => $this->diskon,
                    'total' => $this->total,
                    'total_bayar' => $this->dibayar,
                    'status' => $this->status,
                    'lama_sewa' => $this->lama_sewa,
                    'user_id' => Auth()->id(),
                ]);
                
                foreach ($filterCart as $fc ) {
                    ArmadaDT::create([
                        'armada_transaction_id' => $transaction->id,
                        'armada_id'       => $fc['id'],
                        'qty'             => $fc['quantity'],
                        'harga'           => $fc['price'],
                        'keterangan'      => null,
                    ]);
                }
    
                \Cart::session('armadabus')->clear();
                $this->resetFieldAll();
                session()->flash('success','Transaction Success');
                DB::commit();
                
            }
    
        } catch (\Throwable $th) {
            DB::rollback();
            return session()->flash('error',$th);
        }

    }
}
