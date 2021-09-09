<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;

//Model 
use App\Models\Origins ;
use App\Models\Destinations ;
use App\Models\Variantservices ;
use App\Models\Shippingrates as Rates;


class Logistic extends Component
{
    public $name , $weight;
    public $from, $to, $service, $sub_berat, $harga_kg, $sub_total, $diskon, $total;
    public function render()
    {


        $origins = Rates::distinct()->get(['origin_id']);

        //If from input was added
        if (!empty($this->from)) {
            $destinations = Rates::where('origin_id',$this->from)->distinct()->get(['destination_id']);
        }else {
            $destinations = [];
        }

        //if to input was added
        if (!empty($this->to) && !empty($this->from)) {
            $variants = Rates::where([['origin_id',$this->from],['destination_id', $this->to]])->get();
        } else {
            $variants = [];
        }
        
        //if variant input was added 
        if (!empty($this->service) &&!empty($this->to) && !empty($this->from)) {
            $prices = Rates::where([['origin_id',$this->from],['destination_id', $this->to],['variantservice_id',$this->service]])->get();

            foreach ($prices as $price ) {
                $aboveprice = $price['above_terms'];
                $underprice = $price['under_terms'];
            }

            if ($this->sub_berat < 50) {
                $this->harga_kg = $underprice;
            } else {
                $this->harga_kg = $aboveprice;
            }
            
        } else {
            $prices = [];
        }
        
        
        $items = \Cart::session('logisticsmall')->getContent()->sortBy(function($cart){
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
                ];
            }
            
            
            $cartData = collect($cart);
        }
        
        //display weight total
        $this->sub_berat =\Cart::session('logisticsmall')->getTotalQuantity();

        //display subtotal price
        if (!empty($this->sub_berat) && !empty($this->harga_kg)) {
            $this->sub_total = $this->harga_kg*$this->sub_berat;
        } else {
            $this->subtotal = '';
        }

        // Total with diskon

        if (!empty($this->diskon) && !empty($this->sub_total) ) {
            $this->total = $this->sub_total - $this->diskon ;
        } else {
            $this->total = $this->sub_total; 
        }
        
        
    
        // var_dump($origins);
        return view('livewire.logistic',
        [
         'carts' => $cartData,
         'origins'  => $origins,
         'destinations' => $destinations,
         'variants' => $variants,
        ]);
    }
    

    public function addItem(){
        $this->validate([
            'name'      => 'required|min:3',
            'weight'    => 'required|numeric',
        ]);

        $id = Str::slug($this->name);   
        $rowId = "Cart".$id;
        $cart = \Cart::session('logisticsmall')->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        if($cekItemId->isNotEmpty()){
            \Cart::session('logisticsmall')->update($rowId,[
                'quantity' =>[
                    'relative' =>true,
                    'value'  => $this->weight,
                ]
            ]);
            $this->resetFields();
            $this->resetFieldsService();
        }else{
            \Cart::session('logisticsmall')->add([
                'id'    => "Cart".Str::slug($this->name),
                'name'  => $this->name,
                'price' => "0",
                'quantity'  => $this->weight,
                'attributes'  => [
                    'added_at' =>Carbon::now()
                ],
            ]);
            $this->resetFields();
            $this->resetFieldsService();
        }
 
    }


    public function increaseItem($rowId){
        \Cart::session('logisticsmall')->update($rowId,[
            'quantity' =>[
                'relative' => true,
                'value'  =>1
            ]
        ]);
        $this->resetFieldsService();
    }


    public function minItem($rowId){
        $cart = \Cart::session('logisticsmall')->getContent();
        $checkItemId = $cart->whereIn('id',$rowId);

        if($checkItemId[$rowId]->quantity > 1){
            \Cart::session('logisticsmall')->update($rowId,[
                'quantity' =>[
                    'relative' => true,
                    'value' => -1
                ]
            ]);
            $this->resetFieldsService();

        }else{
            \Cart::session('logisticsmall')->remove($rowId);
            $this->resetFieldsService();
        }
    }


    public function removeItem($rowId){
        \Cart::session('logisticsmall')->remove($rowId);
        $this->resetFieldsService();
    }


    public function resetFields(){
        $this->name='' ;
        $this->weight=''; 
        $this->description='';
    }
    
    public function resetFieldsService(){
        $this->from='' ;
        $this->to=''; 
        $this->service='';
        $this->harga_kg='';
        $this->sub_total='';
        $this->diskon='';
    }
}
