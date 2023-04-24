@extends('admin.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header no-gutters">
    <div class="d-md-flex align-items-md-center justify-content-between">
        <div class="media m-v-10 align-items-center">
            <div class="avatar avatar-image avatar-lg">
                <img src="{{asset('backend/images/logo/favicon.png')}}" alt="">
            </div>
            <div class="media-body m-l-15">
                <h4 class="m-b-0">Welcome back, {{auth()->user()->name}}!</h4>
                <span class="text-gray">Admin</span>
            </div>
        </div>
        <div class="d-md-flex align-items-center d-none">
            <div class="media align-items-center m-r-40 m-v-5">
                <div class="font-size-27">
                    <i class="text-primary anticon anticon-profile"></i>
                </div>
                <div class="d-flex align-items-center m-l-10">
                    <h2 class="m-b-0 m-r-5">{{$listings}}</h2>
                    <span class="text-gray">Listings</span>
                </div>
            </div>
            <div class="media align-items-center m-r-40 m-v-5">
                <div class="font-size-27">
                    <i class="text-success  anticon anticon-appstore"></i>
                </div>
                <div class="d-flex align-items-center m-l-10">
                    <h2 class="m-b-0 m-r-5">{{$categories}}</h2>
                    <span class="text-gray">Categories</span>
                    
                </div>
            </div>
            <div class="media align-items-center m-v-5">
                <div class="font-size-27">
                    <i class="text-danger anticon anticon-team"></i>
                </div>
                <div class="d-flex align-items-center m-l-10">
                    <h2 class="m-b-0 m-r-5">{{$users}}</h2>
                    <span class="text-gray">Accounts</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Latest 10 Contacts</h5>
                    <div>
                        <a href="{{route('admin.contacts.index')}}" class="btn btn-default btn-sm">View All</a> 
                    </div>
                </div>
                <div class="table-responsive m-t-30">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Listing</th>
                                <th>Contact Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts_lat as $data)
                            <tr>
                                <td>
                                    {{$data->name}}
                                </td>

                                <td>
                                    {{$data->listing->name}}
                                </td>

                                <td>
                                    {{$data->contact_info}}
                                </td>
                                
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Latest Listing</h5>
                
            </div>
            <div class="m-t-30">
                <ul class="list-group list-group-flush">
                  @foreach ($listings_lat as $data)
                    <li class="list-group-item p-h-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex">
                                
                                <div>
                                    <h6 class="m-b-0">
                                        <a href="javascript:void(0);" class="text-dark"> {{$data->name}}</a>
                                    </h6>
                                    <span class="text-muted font-size-13">{{$data->category->name}}</span>
                                </div>
                            </div>
                            <a href="{{route('frontend.listings.show', $data->id)}}" class="badge badge-pill badge-cyan font-size-12">
                                <span class="font-weight-semibold m-l-5">View</span>
                            </a>
                        </div>
                    </li>
                  @endforeach
                </ul> 
            </div>
        </div>
    </div>
    </div>
  </div>
@endsection

@section('script')

@endsection