@extends('admin.app')
@section('title')
    انشاء صلاحيه
@endsection
@section('contenet')

 <div class="container">
  
  <div class="card mt-5">
    <div class="card-header2"> انشاء صلاحيه جديد </div>

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
        <form method="POST" action="{{route('admin.roles.store')}}">
          @csrf
          
         <div class="form-control">
          <label class="form-control-plaintext" for="name">اسم الصلاحيه:</label>
          <input type="text" class="navbar-main" id="name" name="name" >
        </div>
        <div class="form-control">
          <label class="form-control-plaintext" for="permissions">اختيار الصلاحيات:</label>
          <hr>
          @foreach (config('global.permissions') as $name=>$value)
              
          <input type="checkbox" class="navbar-main" id="permissions" name="permissions[]" value="{{$name}}" >{{$value}}
          <hr>
          @endforeach
        
        </div>
       
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">حفظ</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection