@extends('admin.app')
@section('title')
   تحديث مستخدم لوحه 
@endsection

@section('contenet')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header2"> تحديث مستخدم لوحه :{{$user->name}} </div>

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
        <form method="POST" action="{{route('admin.admin.users.update',$user->id)}}">
          @csrf
          <input type="hidden" name="id" value="{{$user->id}}">
         <div class="form-group">
          <label for="name">اسم المستخدم:</label>
          <input type="text" class="" id="name" name="name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
          <label for="email">البريد الالكترونى:</label>
          <input type="text" class="" id="email" name="email" value="{{$user->email}}"required >
        </div>
       
        <div class="form-control">
          <label class=" form-control-plaintext" for="user_name">اسم الصلاحيه:</label>
          <select name="role_id" class="form-select ">
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
           @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">حفظ</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection