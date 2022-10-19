@extends('admin.app')
@section('title')
    مستخدمى النظام
@endsection
@section('contenet')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
             @can('create_admin_user')
                 
              <a href="{{route('admin.admin.users.create')}}" style="float: left;" class="text-secondary font-weight-bold text-xs" >
                <div style="width: fit-content;font-size: 1.5em; height: 2.3em;" class="icon  border-radius-md  text-center mr-2 d-flex align-items-center justify-content-center me-2 m-2 p-3 bg-gradient-primary  shadow-primary  text-white">
                  <i class="ni-fat-add text-white" style="font-size: 1.5em"></i>
                  انشاء مستخدم نظام جديد
                </div>
          
              </a>
             @endcan

              <h6 style="padding-right: 1rem !important;" class="text-white text-capitalize ps-3">جدول مستخدمين النظام</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">المستخدم</th>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2">البريد الالكترونى</th>
                    <th class="text-center text-uppercase text-secondary text-lg font-weight-bolder opacity-7">الصلاحيه</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $index=>$user)
                      
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                       
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$index+1}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                       
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>
                    </td>
                    <td class="align-middle text-center text-xl">
                      <span class="badge badge-sm bg-gradient-success">{{$user->role->name}}</span>
                    </td>
                    <td class="align-middle">
                      @can('edit_admin_user')
                          
                      <a  href="{{route('admin.admin.users.edit',$user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <div class="icon icon-xs border-radius-md bg-gradient-success text-center mr-2 d-flex align-items-center justify-content-center me-2 m-2 p-3 ">
                          <i class="fa fa-edit text-white" style="font-size: 1.5em"></i>
                        </div>
                  
                      </a>
                      @endcan

                      @can('delete_admin_user')
                          
                      <a href="{{route('admin.admin.users.delete',$user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <div class="icon icon-xs border-radius-md bg-gradient-primary text-center mr-2 d-flex align-items-center justify-content-center me-2 m-2 p-3">
                          <i class="fa fa-trash text-white" style="font-size: 1.5em"></i>
                        </div>
                  
                      </a>
                      @endcan

                    </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
            <div class="dataTable-bottom">
           
              <nav class="dataTable-pagination">
                {{$users->links()}}
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection