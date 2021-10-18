@section('title')
    Logistic
@endsection
@section('title-page')
    Add Transaction Armada Pickup
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
                            <label >Dikirim Dari</label>
                            <select class="form-control " wire:model="from" >
                                <option value="" selected > Pilih </option>
                                @foreach ($origins as $index => $origin)
                                <option value="{{$origin->origin_id}}">{{$origin->origin->province.', '.$origin->origin->city.', '.$origin->origin->subdistrict}}</option>
                                @endforeach
                            </select>
                            @error('from')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group select-box">
                            <label >Dikirim Ke</label>
                            <select class="form-control " wire:model="to" >
                            @if (!empty($destinations))
                            <option value="" >Pilih</option>
                                @foreach ($destinations as $index => $destination) 
                                <option value="{{$destination->destination_id}}">{{$destination->destination->province.', '.$destination->destination->city.', '.$destination->destination->subdistrict}}</option>
                                @endforeach
                            @else
                                <option value="" >Not Found</option>
                            
                            @endif
                            </select>
                            @error('to')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    
                        <div class="form-group select-box">
                            <label >Jenis Kendaraan</label>
                            <select class="form-control " wire:model="armada_id" >
                                @if (!empty($armadas))
                                <option value="" >Pilih</option>

                                    @foreach ($armadas as $index => $armada) 
                                    <option value="{{$armada->id}}">{{$armada->name.'( '.$armada->variant.'Rp. '.$armada->price.' )'}}</option>
                                    
                                    @endforeach
                                @else
                                    <option value="" >Not Found</option>
                                
                                @endif
                            </select>
                            @error('armada_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                            
                            @if (empty($armadas))

                            @else
                                @if (empty($facilitys))
                                    
                                @else
                                <div class="form-group">
                                    <label for="">Armada Name </label>
                                    <input type="text"  wire:model="armada_name" readonly class="form-control">
                                    @error('armada_name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Armada Price </label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text"  wire:model="armada_price" readonly class="form-control">
                                    </div>
                                    @error('armada_price')
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
                                            @foreach ($facilitys as $index => $fasilitas)
                                                
                                            <tr>
                                                <td>
                                                    @foreach ($fasilitas->facilitys as $facility)
                                                    <ul>
                                                        <li>{{$facility->name}}</li>
                                                    </ul>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
    
                                <div class="form-group">
                                    <label for="">Qty </label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Unit</span>
                                        <input type="number" min="1" wire:model="qty"  class="form-control">
                                    </div>
                                    @error('qty')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                @endif
                            @endif
                            
                        
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Add</button>
                            <a href="#" wire:click="resetFields()" class="btn btn-info  mb-2"> Clear</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Paket</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty(Kg)</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>    
                            @forelse($carts as $index=>$cart)
                            <tr>
                                <td>{{$cart['name']}}</td>
                                <td>
                                    <a wire:click="minItem('{{$cart['rowId']}}')" class="btn btn-warning btn-sm" ><i class="fas fa-minus"></i></a>
                                    {{$cart['qty']}} 
                                    <a  wire:click="increaseItem('{{$cart['rowId']}}')" class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i></i>
                                </td>
                                <td>{{$cart['pricesingle']}}</td>
                                <td>{{$cart['price']}}</td>
                                <td>
                                    <a wire:click="removeItem('{{$cart['rowId']}}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <h6 class="text-center">Empty Cart</h6>
                                </td>
                            </tr>
                            @endforelse
                        
                        </tbody>
                        </table>
                        <p>Total : Rp. {{ number_format($subtotal) }}</p>
                    </div>
                    <form wire:submit.prevent="submitHandle">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Tanggal Berangkat</label>
                                <div class="input-group-prepend">
                                    <input type="date" wire:model="tgl_brkt"   class="form-control">
                                </div>
                                @error('tgl_brkt')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Tanggal Kembali</label>
                                <div class="input-group-prepend">
                                    <input type="date" wire:model="tgl_kembali"   class="form-control">
                                </div>
                                @error('tgl_kembali')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Lama Sewa</label>
                                <input type="text" wire:model="lama_sewa" readonly class="form-control">
                                @error('lama_sewa')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div> 
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

        
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header"><h3>Detail Order</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label>Nama Penyewa</label>
                                <input type="text" wire:model="penyewa" value="{{old('penyewa')}}" class="form-control">
                                @error('penyewa')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Penyewa</label>
                                <textarea wire:model="alamat_penyewa" class="form-control" cols="30" rows="10">{{old('alamat_penyewa')}}</textarea>
                                @error('alamat_penyewa')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Penyewa</label>
                                <input type="text" wire:model="no_penyewa" value="{{old('no_penyewa')}}"  class="form-control">
                                @error('no_penyewa')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
                        
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Submit</button>
                            <a href="{{route('transactionarmada.index')}}" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
      
    </div>
</div>
