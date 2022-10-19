@extends('admin.app')
@section('title')
   انشاء مستخدم جديد
@endsection

@section('contenet')

 <div class="container">
  <div class="card mt-5">
    <div class="card-header2"> انشاء مستخدم جديد </div>

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
        <form method="POST" action="{{route('admin.users.store')}}">
          @csrf
          <input type="hidden" name="id" value="00">
         <div class="form-group">
          <label for="name">اسم المستخدم:</label>
          <input type="text" class="" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">البريد الالكترونى:</label>
          <input type="text" class="" id="email" name="email" required >
        </div>
        <div class="form-group">
          <label for="password">كلمه المرور:</label>
          <input type="password" class="" id="password" name="password" required >
        </div>
        <button type="submit" class="btn btn-default bg-gradient-primary shadow-primary ">حفظ</button>


        </form>      
        </div>
      </div>
  </div>
    
@endsection