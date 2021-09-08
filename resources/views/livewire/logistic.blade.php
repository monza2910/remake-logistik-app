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
                    <form wire:submit.prevent="addItem">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model="name"  class="form-control">
                            @error('wire:model')
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
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="#" wire:click="minItem('{{$cart['rowId']}}')" class="btn btn-warning btn-sm" ><i class="fas fa-minus"></i></a>
                                    {{$cart['qty']}} 
                                    <a href="#" wire:click="increaseItem('{{$cart['rowId']}}')" class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i></i>
                                    </td> 
                                <td>
                                    <a href="#"  wire:click="removeItem('{{$cart['rowId']}}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>    
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        
                        </tbody>
                    </table>
                    <h4>{{$qtyTotal}}</h4>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header"><h1>Detail Order</h1></div>
                <div class="card-body">
                    <form action="{{route('variant.store')}}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model="name"  class="form-control">
                            @error('wire:model')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Weight(kg)</label>
                            <input type="number" wire:model="weight" class="form-control">
                            @error('weight')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" wire:model="description"  class="form-control">
                            @error('description')
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
