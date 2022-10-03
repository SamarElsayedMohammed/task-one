@extends('home')
@section('title')
    Home Page
@endsection

@section('content')

 <div class="container">
  {{-- <div> --}}
    <h2>Users
    <a href="{{route('user.create')}}" type="button" class="btn btn-info m-3">Create User</a>

    </h2>
  {{-- </div> --}}
    @if(Session::has('success'))
    <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
    @endif

    @if(Session::has('error'))
    <div class="row mr-2 ml-2" >
            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error">{{Session::get('error')}}
            </button>
    </div>
    @endif
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>user name</th>
          <th>Email</th>
          <th>User posts</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $index=> $user)
            
        <tr>
          <td>{{$index+1}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->posts->count()}}</td>
          
          <td>
            <a href="{{route('user.edit',$user->id)}}" type="button" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('user.delete',$user->id)}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach

       
      </tbody>
      
    </table>
    <div>
{{$users->links()}}
    </div>
  </div>
    
@endsection