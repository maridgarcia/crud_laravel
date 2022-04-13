@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Registration App</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('users.create') }}"> + </a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Birthdate</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->id }}</td>
            <td><img src="/image/{{ $user->image }}" width="100px"></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->birth_date }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
     
                    <a  class="btn btn-info" href="{{ route('users.show',$user->id) }}">View</a>
      
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $users->links() !!}
        
@endsection