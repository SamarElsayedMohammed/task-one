@extends('admin.app')
@section('title')
    تحديث المستخدم
@endsection

@section('contenet')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header2"> تحديث المستخدم: {{$user->name}}</div>

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
        <form method="POST" action="{{route('admin.users.update',$user->id)}}">
          @csrf
          
         <div class="form-group">
          <label for="name">اسم المستخدم:</label>
          <input type="text" class="" id="name" name="name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
          <label for="note">البريد الالكترونى:</label>
          <input type="text" class="" id="email" name="email"  value="{{$user->email}}" required>
        </div>
       
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">تحديث</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection