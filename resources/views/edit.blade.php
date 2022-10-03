@extends('home')
@section('title')
    Edit Page
@endsection

@section('content')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header"> Edit Post : {{$post->name}}</div>

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
        <form method="POST" action="{{route('post.update',$post->id)}}">
          @csrf
          
         <div class="form-group">
          <label for="name">Post Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$post->name}}">
        </div>
        <div class="form-group">
          <label for="note">Post Note:</label>
          <input type="text" class="form-control" id="note" name="note"  value="{{$post->note}}">
        </div>
        <div class="form-group">
          <label for="user_name">Post User name:</label>
          <input type="text" class="form-control" id="user_name" value="{{$post->user->name}}" disabled>
        </div>
        <div class="form-group">
          <label for="email">Post User email:</label>
          <input type="email" class="form-control" id="email" value="{{$post->user->email}}" disabled>
        </div>
        <button type="submit" class="btn btn-default">update</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection