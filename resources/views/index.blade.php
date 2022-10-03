@extends('home')
@section('title')
    Home Page
@endsection

@section('content')

 <div class="container">
  {{-- <div> --}}
    <h2>Posts
    <a href="{{route('post.create')}}" type="button" class="btn btn-info m-3">Create Post</a>

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
          <th>name</th>
          <th>note</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $index=> $post)
            
        <tr>
          <td>{{$index+1}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->user->email}}</td>
          <td>{{$post->name}}</td>
          <td>{{$post->note}}</td>
          <td>
            <a href="{{route('post.edit',$post->id)}}" type="button" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <a href="{{route('post.delete',$post->id)}}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach

       
      </tbody>
      
    </table>
    <div>
{{$posts->links()}}
    </div>
  </div>
    
@endsection