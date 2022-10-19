@extends('admin.app')
@section('title')
    تعديل الصلاحيه
@endsection

@section('contenet')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header"> تعديل الصلاحيه : {{$role->name}}</div>

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
        <form method="POST" action="{{route('admin.roles.update',$role->id)}}">
          @csrf
          
         <div class="form-group">
          <label for="name">اسم الصلاحيه:</label>

          <input type="text" class="" id="name" name="name" value="{{$role->name}}">
        </div>
    
        <div class="form-control">
          <label class="form-control-plaintext" for="permissions">اختيار الصلاحيات:</label>
          @foreach (config('global.permissions') as $name=>$value)
              
          <input type="checkbox" class="navbar-main" id="permissions" name="permissions[]" value="{{$name}}" 
          {{ in_array($name, $role->permissions)? 'checked' : '' }} >{{$value}}
          @endforeach
        
        </div>
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">تحديث</button>

        {{-- <button type="submit" class="btn btn-default">تحديث</button> --}}


        </form>      
        </div>
      </div>
  </div>
    
@endsection