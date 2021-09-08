@section('title')
    Logistic
@endsection
@section('title-page')
    Add Transaction Logistic
@endsection
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Tambah Paket </h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addItem">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model="name"  class="form-control">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Weight(kg)</label>
                            <input type="number" wire:model="weight" min="0" class="form-control">
                            @error('weight')
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
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Weight(Kg)</th>
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
                                <td>
                                    <a wire:click="removeItem('{{$cart['rowId']}}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>    
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Service Yang Dipilih</h3>
                </div>
                <div class="card-body">
                   
                    <div class="form-group select-box">
                        <label >Dikirim Dari</label>
                        <select class="form-control " wire:model="from" >
                            <option value="" selected > Pilih </option>
                            @foreach ($origins as $index => $origin)
                            <option value="{{$origin->origin_id}}">{{$origin->origin->province.', '.$origin->origin->city.', '.$origin->origin->subdistrict}}</option>
                            @endforeach
                        </select>
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
                    </div>
                    <div class="form-group select-box">
                        <label >Jenis Layanan</label>
                        <select class="form-control " wire:model="service" >
                        @if (!empty($variants))
                            @foreach ($variants as $index => $variant) 
                            <option value="{{$variant->variantservice_id}}">{{$variant->variantservice->variant_service}}</option>
                            @endforeach
                        @else
                            <option value="" >Not Found</option>
                        
                        @endif
                        </select>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Berat Keseluruhan(Kg) </label>
                                <input type="text" wire:model="berat_keseluruhan" value=""  class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Harga /Kg</label>
                                @if (!empty($prices))
                                    @foreach ($prices as $index => $price)
                                    <input type="text" wire:model="harga_kg" value="{{$price->above_terms}}" class="form-control">                
                                        
                                    @endforeach
                                @else
                                    <input type="text" wire:model="harga_kg" readonly value="Kosong" class="form-control">
                                @endif    
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Sub Total </label>
                                <input type="text" wire:model="sub_total"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Diskon </label>
                                <input type="text" wire:model="diskon"  class="form-control">
                            </div>
                        </div>
                        <h2>Total Harga     : </h2>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header"><h3>Detail Order</h3></div>
                <div class="card-body">
                    <form >
                        @csrf

                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" wire:model="nama_pengirim"  class="form-control">
                                @error('nama_pengirim')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Pengirim</label>
                                <textarea wire:model="alamat_pengirim" class="form-control" cols="30" rows="10"></textarea>
                                @error('alamat_pengirim')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Pengirim</label>
                                <input type="text" wire:model="no_pengirim"  class="form-control">
                                @error('no_pengirim')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Penerima</label>
                                <input type="text" wire:model="penerima"  class="form-control">
                                @error('penerima')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>ALaamt Penerima </label>
                                <textarea wire:model="alamat_penerima" class="form-control" cols="30" rows="10"></textarea>
                                @error('alamat_penerima')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Pengirim</label>
                                <input type="text" wire:model="no_pengirim"  class="form-control">
                                @error('no_pengirim')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Submit</button>
                            <a href="{{route('variant.index')}}" class="btn btn-info  mb-2"> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
      
    </div>
</div>
