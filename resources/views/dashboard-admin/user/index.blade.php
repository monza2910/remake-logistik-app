
@extends('dashboard-admin.home')

@section('title')
    User
@endsection

@section('title-page')
    <h1>User</h1>
@endsection

@section('content')
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('user.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add User</a>
            
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success mx-4 my-4">
            <p>{{ $message }}</p>
        </div>
        @elseif($message = session::get('deleted'))
        <div class="alert alert-danger mx-4 my-4">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>image</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Outlet</th>
                            <th>phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)    
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>     
                                @if ($user->image != null)
                                    <img src="/users/{{$user->image}}"  class="img-fluid" width="75px">
                                @else
                                    Image Not Found
                                @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if ($user->role_id != null)
                               <td>{{$user->role->name}}</td>
                            @else
                                <td></td>
                            @endif
                            @if ($user->outlet_id != null)
                                <td>{{$user->outlet->name}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>{{$user->phone}}</td>
                            <td >
                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-alt"></i> Update</a>
                                    <button type="submit" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection