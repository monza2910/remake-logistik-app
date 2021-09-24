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


class Armada extends Component
{
    public $diskon = '';
    public $armada_id, $armada_name, $armada_price , $qty;
    public $from, $to;
    public $sub_total, $total, $dibayar, $status, $tgl_brkt,$tgl_kembali; 
    public $penyewa, $alamat_penyewa, $no_penyewa;  

    public function render()
    {

        $origins = ArmadaModel::where('variant','pickup')->distinct()->get(['origin_id']);

        //If from input was added
        if (!empty($this->from)) {
            $destinations = ArmadaModel::where([['origin_id',$this->from],['variant','pickup']])->distinct()->get(['destination_id']);
        }else {
            $destinations = [];
        }

        //if to input was added
        if (!empty($this->to) && !empty($this->from)) {
            $armadas = ArmadaModel::where([['origin_id',$this->from],['destination_id', $this->to],['variant','pickup']])->get();
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

        $items = \Cart::session('armadacart')->getContent()->sortBy(function($cart){
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
        
        $sub_total = \Cart::session('armadacart')->getSubTotal();
        
        $this->sub_total = $sub_total;
        if (!empty($this->diskon)) {
            $this->total = $this->sub_total - $this->diskon;
        } else {
            $this->total= $sub_total;
        }
        
        
        return view('livewire.armada',[
            'origins'  => $origins,
            'destinations'  => $destinations,
            'armadas'  => $armadas,
            'facilitys'  => $facilitys,
            'carts'  => $cartData,
        ]);
    }

    public function addItem(){
        $this->validate([
            'armada_id' => 'required',
            'qty'    => 'required|numeric',
        ]);

        $rowId = "Cart".$this->armada_id;
        $cart = \Cart::session('armadacart')->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        if($cekItemId->isNotEmpty()){
            \Cart::session('logisticsmall')->update($rowId,[
                'quantity' =>[
                    'relative' =>true,
                    'value'  => $this->qty,
                ]
            ]);
            $this->resetFields();
        }else{
            \Cart::session('armadacart')->add([
                'id'    => "Cart".$this->armada_id,
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
        $cart = \Cart::session('armadacart')->getContent();
        $checkItemId = $cart->whereIn('id',$rowId);

        if($checkItemId[$rowId]->quantity > 1){
            \Cart::session('armadacart')->update($rowId,[
                'quantity' =>[
                    'relative' => true,
                    'value' => -1
                ]
            ]);
            $this->resetFieldsService();

        }else{
            \Cart::session('armadacart')->remove($rowId);
            $this->resetFieldsService();
            session()->flash('success','Package was Deleted');
        }
    }


    public function increaseItem($rowId){
        \Cart::session('armadacart')->update($rowId,[
            'quantity' =>[
                'relative' => true,
                'value'  =>1
            ]
        ]);
        $this->resetFieldsService();
    }

    public function removeItem($rowId){
        \Cart::session('armadacart')->remove($rowId);
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
}
