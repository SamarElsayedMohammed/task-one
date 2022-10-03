@extends('home')
@section('title')
    Create Page
@endsection

@section('content')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header"> Create New User </div>

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
        <form method="POST" action="{{route('user.store')}}">
          @csrf
          <input type="hidden" name="id" value="0">
         <div class="form-group">
          <label for="name">User Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">User email:</label>
          <input type="text" class="form-control" id="email" name="email" required >
        </div>
        <div class="form-group">
          <label for="password">User Password:</label>
          <input type="password" class="form-control" id="password" name="password" required >
        </div>
        <button type="submit" class="btn btn-default">save</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection