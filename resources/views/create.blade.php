@extends('home')
@section('title')
    Create Page
@endsection

@section('content')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header"> Create New Post </div>

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
        <form method="POST" action="{{route('post.store')}}">
          @csrf
          
         <div class="form-group">
          <label for="name">Post Name:</label>
          <input type="text" class="form-control" id="name" name="name" >
        </div>
        <div class="form-group">
          <label for="note">Post Note:</label>
          <input type="text" class="form-control" id="note" name="note"  >
        </div>
        <div class="form-group">
          <label for="user_name">Post User name:</label>
          <select name="user_id" class="form-select">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
           @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-default">save</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection