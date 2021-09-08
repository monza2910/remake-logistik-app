<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;


class Logistic extends Component
{
    public $name , $weight;
    public function render()
    {
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
        $cartTotalQuantity =\Cart::session('logisticsmall')->getTotalQuantity();


        // var_dump($cartData);
        return view('livewire.logistic',
        [
         'carts' => $cartData,
         'qtyTotal' => $cartTotalQuantity
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

        }
 
    }


    public function increaseItem($rowId){
        \Cart::session('logisticsmall')->update($rowId,[
            'quantity' =>[
                'relative' => true,
                'value'  =>1
            ]
        ]);
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
        }else{
            \Cart::session('logisticsmall')->remove($rowId);
        }
    }


    public function removeItem($rowId){
        \Cart::session('logisticsmall')->remove($rowId);
    }


    public function resetFields(){
        $this->name='' ;
        $this->weight=''; 
        $this->description='';
    }
}
