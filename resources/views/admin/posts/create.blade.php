@extends('admin.app')
@section('title')
    انشاء منشور
@endsection
@section('contenet')

 <div class="container">
  
  <div class="card mt-5">
    <div class="card-header2"> انشاء منشور جديد </div>

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
        <form method="POST" action="{{route('admin.posts.store')}}">
          @csrf
          
         <div class="form-control">
          <label class="form-control-plaintext" for="name">اسم المنشور:</label>
          <input type="text" class="navbar-main" id="name" name="name" >
        </div>
        <div class="form-control">
          <label class="form-control-plaintext" for="note">ملاحظه المنشور :</label>
          <input type="text" class="navbar-main" id="note" name="note"  >
        </div>
        <div class="form-control">
          <label class=" form-control-plaintext" for="user_name">اسم مستخدم المنشور:</label>
          <select name="user_id" class="form-select ">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
           @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">حفظ</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection