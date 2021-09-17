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
use App\Models\Variantservices ;
use App\Models\Shippingrates as Rates;
use App\Models\Transaction ;
use App\Models\Detaillogistics ;


class Logistic extends Component
{
    public $diskon = '0';
    public $name , $weight;
    public $from, $to, $service, $sub_berat, $harga_kg, $sub_total, $total, $dibayar, $status;
    public $pengirim, $alamat_pengirim, $no_pengirim, $penerima, $alamat_penerima, $no_penerima;  
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
        
        

        // var_dump($GenerateDate,$GenerateDate2);
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
            session()->flash('success','Package was Deleted');
        }
    }


    public function removeItem($rowId){
        \Cart::session('logisticsmall')->remove($rowId);
        $this->resetFieldsService();
        session()->flash('success','Package was Deleted');

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
        $this->diskon='0';
    }

    public function resetFieldsAll(){
        $this->name='' ;
        $this->weight=''; 
        $this->description='';
        $this->from='' ;
        $this->to=''; 
        $this->service='';
        $this->sub_berat='';
        $this->harga_kg='';
        $this->sub_total='';
        $this->diskon='0';
        $this->total='';
        $this->dibayar='';
        $this->status='';
        $this->pengirim='';
        $this->alamat_pengirim='';
        $this->no_pengirim='';
        $this->penerima=''; 
        $this->alamat_penerima='';
        $this->no_penerima='';  
    }

    public function submitHandle(){
        $userid = Auth()->id();
        // $order = TransactionModel::whereRaw('id = (select max(`id`) from transactions)')->get();
        // foreach ($order as $od) {
        //     $lastid = $od->id;
        // }
        $statement = DB::select("SHOW TABLE STATUS LIKE 'transactions'");
        $lastid = $statement[0]->Auto_increment;
        $this->validate([
            'penerima' => 'required',
            'alamat_penerima' => 'required',
            'no_penerima' => 'required|numeric',
            'pengirim' => 'required',
            'no_pengirim' => 'required|numeric',
            'alamat_pengirim' => 'required',
            'service' => 'required',
            'sub_berat' => 'required',
            'harga_kg' => 'required',
            'sub_total' => 'required',
            'total' => 'required',
            'status' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);


        $dateNow = Carbon::now();
        $date   = $dateNow->format('YmdH');
        $codeyear = $dateNow->format('Y');
        $codemonthday= $dateNow->format('md');
        //Generate Invoice
        $invoice = "INV/KMJ/00".$lastid."/".$codemonthday."/".$codeyear;
        $tracking_number = "KMJO-00".$lastid."-".$date;

        \QrCode::size(300)
            ->format('svg')
            ->generate($tracking_number, public_path('images/transaction/'.$tracking_number.'.svg'));
        $namaBarcode = $tracking_number.'.svg';
        try {
            $allcart = \Cart::session('logisticsmall')->getContent();
            
            $filterCart = $allcart->map(function($item){
                return[
                    'name'        => $item->name,
                    'quantity'  => $item->quantity,
                ];
            });
            //Action Save
            
            if (\Cart::isEmpty()) {
                session()->flash('danger','Data Keranjang Tidak Boleh Kosong');
            }else{
                $transaction = Transaction::create([
                    'invoice' => $invoice,
                    'tracking_number' => $tracking_number,
                    'qr_code' => $namaBarcode,
                    'penerima' => $this->penerima,
                    'alamat_penerima' => $this->alamat_penerima,
                    'no_penerima' => $this->no_penerima,
                    'pengirim' =>   $this->pengirim,
                    'no_pengirim' => $this->no_pengirim,
                    'alamat_pengirim' => $this->alamat_pengirim,
                    'origin_id' => $this->from,
                    'destination_id' => $this->to,
                    'variantservice_id' => $this->service,
                    'berat_total' => $this->sub_berat,
                    'harga_kg' => $this->harga_kg,
                    'sub_total' => $this->sub_total,
                    'diskon' => $this->diskon,
                    'total' =>$this->total,
                    'total_bayar' =>$this->dibayar,
                    'status' => $this->status,
                    'user_id' => Auth()->id(),
                ]);
                
                foreach ($filterCart as $fc ) {
                    Detaillogistics::create([
                        'transaction_id' => $transaction->id,
                        'nama_barang'     => $fc['name'],
                        'keterangan'      => null,
                        'berat'           => $fc['quantity']
                    ]);
                }
    
                \Cart::session('logisticsmall')->clear();
                $this->resetFieldsAll();
                session()->flash('success','Transaction Success');
                DB::commit();
                
            }
    
        } catch (\Throwable $th) {
            DB::rollback();
            return session()->flash('error',$th);
        }

    }
}
