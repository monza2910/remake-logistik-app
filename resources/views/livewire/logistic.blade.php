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
                <div class="card-body">
                    <form action="{{route('variant.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" placeholder="" value="{{old('nama_barang')}}" class="form-control">
                            @error('nama_barang')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Berat Barang(kg)</label>
                            <input type="number" name="berat_barang" placeholder="" value="{{old('berat_barang')}}" class="form-control">
                            @error('berat_barang')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" placeholder="" value="{{old('keterangan')}}" class="form-control">
                            @error('keterangan')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary mb-2" type="submit">Add</button>
                            <a href="{{route('variant.index')}}" class="btn btn-info  mb-2"> Clear</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Variant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>    
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header"><h1>Detail Order</h1></div>
                <div class="card-body">
                    <form action="{{route('variant.store')}}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" placeholder="" value="{{old('nama_barang')}}" class="form-control">
                            @error('nama_barang')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Berat Barang(kg)</label>
                            <input type="number" name="berat_barang" placeholder="" value="{{old('berat_barang')}}" class="form-control">
                            @error('berat_barang')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" placeholder="" value="{{old('keterangan')}}" class="form-control">
                            @error('keterangan')
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
