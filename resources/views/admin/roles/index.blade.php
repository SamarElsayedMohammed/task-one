@extends('admin.app')
@section('title')
    الصلاحيات
@endsection
@section('contenet')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            @can('show_roles')
                      
            <a href="{{route('admin.roles.create')}}" style="float: left;" class="text-secondary font-weight-bold text-xs" >
              <div style="width: fit-content;font-size: 1.5em; height: 2.3em;" class="icon  border-radius-md  text-center mr-2 d-flex align-items-center justify-content-center me-2 m-2 p-3 bg-gradient-primary  shadow-primary  text-white">
                <i class="ni-fat-add text-white" style="font-size: 1.5em"></i>
                انشاء صلاحيه جديد
              </div>
        
            </a>
            @endcan

            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 style="padding-right: 1rem !important;" class="text-white text-capitalize ps-3">جدول الصلاحيات</h6>
            
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">اسم الصلاحيه</th>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2">الصلاحيات</th>
                    
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $index=>$role)
                      
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
                          <h6 class="mb-0 text-sm">{{$role->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      @foreach($role->permissions as $permission)
                      <span class="badge badge-sm bg-gradient-success">{{$permission}}</span>
                      @endforeach
                    </td>
                  
                    <td class="align-middle">
                      @can('edit_role')
                      
                      <a href="{{route('admin.roles.edit',$role->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit post">
                        <div class="icon icon-xs border-radius-md bg-gradient-success text-center mr-2 d-flex align-items-center justify-content-center me-2 m-2 p-3 ">
                          <i class="fa fa-edit text-white" style="font-size: 1.5em"></i>
                        </div>
                  
                      </a>
                      @endcan
                      @can('delete_role')

                      <a href="{{route('admin.roles.delete',$role->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
                {{-- {{$posts->links()}} --}}
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection