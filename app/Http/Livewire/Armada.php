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
use App\Models\ArmadaTransaction as ArmadaTR ;
use App\Models\ArmadaDetail as ArmadaDT;


class Armada extends Component
{
    public $diskon = '0';
    public $armada_id , $unit;
    public $from, $to;
    public $sub_total, $total, $dibayar, $status, $tgl_brkt; 
    public $pengirim, $alamat_pengirim, $no_pengirim, $penerima, $alamat_penerima, $no_penerima;  

    public function render()
    {
        return view('livewire.armada');
    }
}
