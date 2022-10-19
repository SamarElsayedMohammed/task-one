@extends('admin.app')
@section('title')
    تعديل المنشور
@endsection

@section('contenet')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header"> تعديل المنشور : {{$post->name}}</div>

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
        <form method="POST" action="{{route('admin.posts.update',$post->id)}}">
          @csrf
          
         <div class="form-group">
          <label for="name">اسم المنشور:</label>
          <input type="text" class="" id="name" name="name" value="{{$post->name}}">
        </div>
        <div class="form-group">
          <label for="note">ملاحظه المنشور:</label>
          <input type="text" class="" id="note" name="note"  value="{{$post->note}}">
        </div>
        <div class="form-group">
          <label for="user_name">اسم مستخدم المنشور:</label>
          <input type="text" class="" id="user_name" value="{{$post->user->name}}" disabled>
        </div>
        <div class="form-group">
          <label for="email">البريد الالكترونى للمستخدم</label>
          <input type="email" class="" id="email" value="{{$post->user->email}}" disabled>
        </div>
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">تحديث</button>

        {{-- <button type="submit" class="btn btn-default">تحديث</button> --}}


        </form>      
        </div>
      </div>
  </div>
    
@endsection