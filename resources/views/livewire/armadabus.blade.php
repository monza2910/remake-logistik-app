@section('title')
    Logistic
@endsection
@section('title-page')
    Add Transaction Armada Bus
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
        </div>    
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Tambah Paket </h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addItem">
                        @csrf
                        <div class="form-group select-box">
                            <label >Jenis Kendaraan</label>
                            <select class="form-control " wire:model="travel_id" >
                                {{-- @if (!empty($travels))
                                <option value="" >Pilih</option>

                                    @foreach ($travels as $index => $travel) 
                                    <option value="{{$travel->id}}">{{$travel->name.'( '.$travel->variant.'Rp. '.$travel->price.' )'}}</option>
                                    
                                    @endforeach
                                @else
                                    <option value="" >Not Found</option>
                                
                                @endif --}}
                            </select>
                            @error('travel_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fasilitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        {{-- @foreach ($facilitys as $index => $fasilitas) --}}
                                            
                                        <tr>
                                            <td>
                                                {{-- @foreach ($fasilitas->facilitys as $facility) --}}
                                                <ul>
                                                    <li></li>
                                                    {{-- <li>{{$facility->name}}</li> --}}
                                                </ul>
                                                {{-- @endforeach --}}
                                            </td>
                                        </tr>
                                        
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
  
                            <div class="form-group">
                                <label for="">Qty </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Unit</span>
                                    <input type="text" wire:model="qty"  readonly  class="form-control">
                                </div>
                                @error('sub_total')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Add</button>
                            <a href="#" wire:click="resetFields()" class="btn btn-info  mb-2"> Clear</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Paket</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Weight(Kg)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>    
                            {{-- @forelse($carts as $index=>$cart) --}}
                            <tr>
                                <td></td>
                                <td>
                                    <a wire:click="" class="btn btn-warning btn-sm" ><i class="fas fa-minus"></i></a>
                                   
                                    <a  wire:click="" class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i></i>
                                    </td> 
                                <td>
                                    <a wire:click="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>    
                                </td>
                            </tr>
                            {{-- @empty
                            <tr>
                                <td colspan="3">
                                    <h6 class="text-center">Empty Cart</h6>
                                </td>
                            </tr>
                            @endforelse --}}
                        
                        </tbody>
                        </table>
                    </div>

                    <div class="row">
                            
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Sub Total </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" wire:model="sub_total"  readonly  class="form-control">
                                </div>
                                @error('sub_total')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Diskon</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="number" min="0" wire:model="diskon"   class="form-control">
                                </div>
                                @error('diskon')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Total </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="number" wire:model="total" readonly  class="form-control">
                                </div>
                                @error('total')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Dibayar</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="number" wire:model="dibayar"   class="form-control">
                                </div>
                                @error('dibayar')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Tanggal Berangkat</label>
                                <div class="input-group-prepend">
                                    <input type="date" wire:model="tgl_berangkat"   class="form-control">
                                </div>
                                @error('tgl_berangkat')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Jam Berangkat</label>
                                <div class="input-group-prepend">
                                    <input type="time" wire:model="jam_berangkat"   class="form-control">
                                </div>
                                @error('jam_berangkat')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            
                            <div class="form-group">
                                <label for="">Status</label>
                                <select wire:model="status" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="paid">Full Paid</option>
                                    <option value="debit">Debit</option>
                                </select>
                                @error('status')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form wire:submit.prevent="submitHandle">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h3>Service Yang Dipilih</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group select-box">
                            <label >Dikirim Dari</label>
                            <select class="form-control " wire:model="from" >
                                <option value="" selected > Pilih </option>
                                {{-- @foreach ($origins as $index => $origin)
                                <option value="{{$origin->origin_id}}">{{$origin->origin->province.', '.$origin->origin->city.', '.$origin->origin->subdistrict}}</option>
                                @endforeach --}}
                            </select>
                            @error('from')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group select-box">
                            <label >Dikirim Ke</label>
                            <select class="form-control " wire:model="to" >
                            {{-- @if (!empty($destinations))
                            <option value="" >Pilih</option>
                                @foreach ($destinations as $index => $destination) 
                                <option value="{{$destination->destination_id}}">{{$destination->destination->province.', '.$destination->destination->city.', '.$destination->destination->subdistrict}}</option>
                                @endforeach
                            @else
                                <option value="" >Not Found</option>
                            
                            @endif --}}
                            </select>
                            @error('to')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header"><h3>Detail Order</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label>Nama Penyewa</label>
                                <input type="text" wire:model="nama_penumpang" value="{{old('nama_penumpang')}}" class="form-control">
                                @error('nama_penumpang')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Penyewa</label>
                                <textarea wire:model="alamat_penumpang" class="form-control" cols="30" rows="10"></textarea>
                                @error('alamat_penumpang')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Penyewa</label>
                                <input type="text" wire:model="no_penumpang" value="{{old('no_pengirim')}}"  class="form-control">
                                @error('no_penumpang')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
                        
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Submit</button>
                            <a href="{{route('transactiontravel.index')}}" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
      
    </div>
</div>
