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
// use App\Models\Facilitys;

class Travel extends Component
{
    public $from, $to, $travel_id, $qty ;
    public $sub_total, $total, $dibayar, $status;
    public $diskon = '0';

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
            $this->price = $price;
        } else {
            $facilitys = [];
        }
        
        $items = \Cart::session('travel')->getContent()->sortBy(function($cart){
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
                    'price'            => $item->price,
                    'pricetotal'       => $item->getPriceSum(),
                ];
            }
            
            
            $cartData = collect($cart);
        }

        $this->sub_total = \Cart::session('travel')->getSubTotal();
        if (!empty($this->diskon)) {
            $this->total = $this->sub_total - $this->diskon;
        }else{
            $this->total = $this->sub_total;
        }

    


        
        return view('livewire.travel',[
            'origins'  => $origins,
            'destinations' => $destinations,
            'travels' => $travels,
            'facilitys' => $facilitys,
            'carts' => $cartData,
        ]);
    }

    // Add Item 
    public function addItem(){
        $this->validate([

            'travel_id'           => 'required',
            'qty'           => 'required',
            
        ]);


        $id = $this->travel_id;    
        $rowId = "Cart".$id;
        $cart = \Cart::session('travel')->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        if($cekItemId->isNotEmpty()){
            \Cart::session('travel')->update($rowId,[
                'quantity' =>[
                    'relative' =>true,
                    'value'  => $this->qty,
                ]
            ]);
            $this->resetFields();
        }else{
            $product = TravelModel::findOrfail($id);
            \Cart::session('travel')->add([
                'id'    => "Cart".$product->id,
                'name'  => $product->name,
                'quantity'  => $this->qty,
                'price'  => $product->price,
                'attributes'  => [
                    'added_at' =>Carbon::now()
                ],
            ]);
            $this->resetFields();
        }
    }

    public function minItem($rowId){
        $cart = \Cart::session('travel')->getContent();
        $checkItemId = $cart->whereIn('id',$rowId);

        if($checkItemId[$rowId]->quantity > 1){
            \Cart::session('travel')->update($rowId,[
                'quantity' =>[
                    'relative' => true,
                    'value' => -1
                ]
            ]);

        }else{
            \Cart::session('travel')->remove($rowId);
        }
    }

    public function increaseItem($rowId){
        \Cart::session('travel')->update($rowId,[
            'quantity' =>[
                'relative' => true,
                'value'  =>1
            ]
        ]);
    }

    public function removeItem($rowId){
        \Cart::session('travel')->remove($rowId);
        $this->resetFieldsService();
    }

    public function resetFields(){
        $this->to = '';
        $this->qty= '';
    }
}
