<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Armadabus extends Component
{
    public $diskon = '0';
    public $armada_id , $qty;
    public $from, $to;
    public $sub_total, $total, $dibayar, $status, $tgl_brkt,$tgl_kembali; 
    public $penyewa, $alamat_penyewa, $no_penyewa;  
    
    public function render()
    {
        return view('livewire.armadabus');
    }
}
