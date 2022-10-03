@extends('home')
@section('title')
    Edit Page
@endsection

@section('content')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header"> Edit User : {{$user->name}}</div>

    <div class="card-body">
      @if ($errors->any())
      <div
          class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
        <form method="POST" action="{{route('user.update',$user->id)}}">
          @csrf
          
         <div class="form-group">
          <label for="name">User Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
          <label for="note">User Email:</label>
          <input type="text" class="form-control" id="email" name="email"  value="{{$user->email}}" required>
        </div>
       
        <button type="submit" class="btn btn-default">update</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection