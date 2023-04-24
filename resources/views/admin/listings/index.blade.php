@extends('admin.layouts.app', ['page_action' => 'Listing List'])
@section('style')
<!-- select css -->
<link href="{{ asset('backend/vendors/select2/select2.css') }}"  rel="stylesheet">
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')

<div class="page-header no-gutters">
    <div class="row align-items-md-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <h3>Listing List</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-md-right m-v-10">
                <span class="text-muted pr-3 pt-2 p">Total Result: {{count($listings)}}</span>
                
                <button class="btn btn-default m-r-5 ml-2 btn-sm" data-toggle="modal" data-target="#filter" >
                    <i class="anticon anticon-filter"></i>
                    <span class="m-l-5">Filter</span>
                </button>
                
                
                <a href="
                {{route('admin.listings.create')}}
                " class="btn btn-primary m-r-5 ml-2 btn-sm">
                    <i class="anticon anticon-plus"></i>
                    <span class="m-l-5">New</span>
                </a>
                
            </div>
        </div>
    </div>
</div> 


@endsection
@section('content')

{{-- Success message --}}
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('success') }}
</div>
@endif


<div class="container-fluid">
    
    <div id="card-view">
        <div class="row">
            
            @foreach ($listings as $data)
            <div class="col-lg-3 col-md-6 col-6" style="padding-right: 5px;
            padding-left: 3px;">
            <div class="card" style="margin-bottom: 10px;">
                <div class="card-body" style="padding-top: 0.7em; padding-left: 0.3em; padding-right: 0.3em;">
                    
                    <div class="d-flex align-items-center p-2">
                        
                        @if ($data->asset)
                        <div class="avatar avatar-image avatar-badge avatar-square">
                            <img src="{{asset('listing_photos/'.$data->asset)}}" alt="">
                            @if ($data->status)
                                <span class="badge badge-indicator badge-success"></span>
                            @else
                                <span class="badge badge-indicator badge-danger"></span>
                            @endif
                        </div>
                        @else
                        <div class="avatar avatar-icon avatar-blue avatar-badge avatar-square">
                            <i class="anticon anticon-picture"></i>
                            @if ($data->status)
                                <span class="badge badge-indicator badge-success"></span>
                            @else
                                <span class="badge badge-indicator badge-danger"></span>
                            @endif
                        </div>
                        @endif
                        
                        
                        
                        <div class="m-l-10">
                            <div class="m-b-0 text-dark font-weight-semibold">{{$data->price}} Lakhs </div>
                            

                            <div class="m-b-0 opacity-07 font-size-14">{{$data->type->name ?? 'null'}}</div>
                        </div>

                    </div>
                    <hr style="margin-top: 5px; margin-bottom: 12px;">
                    <div class="d-flex align-items-center" style="word-wrap: break-word;
                    display: block !important;
                    height: 57px;">
                    
                    <div class="m-l-10">
                        <div class="m-b-0 text-dark font-weight-semibold">
                            {{$data->name}}                             
                        </div>

                        <div class="m-b-0 opacity-07 font-size-13 mt-3">
                            <span class="badge badge-pill badge-geekblue">{{$data->city->name ?? 'null'}}</span>
                            <span class="badge badge-pill badge-geekblue">{{$data->category->name ?? 'null'}}</span>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="card-footer" style="padding: 0.7rem;">
                <div class="text-right">
                    
                    

                    <a onclick="if(confirm('Are you sure you want to delete this data?')){document.getElementById('delete-form{{$data->id}}').submit(); }"  class="btn btn-default btn-xs">Delete</a>

                    <a href="{{route('admin.listings.edit', $data->id)}}" class="btn btn-primary btn-xs">Edit</a>

                    <form id="delete-form{{$data->id}}" method="POST" action="{{route('admin.listings.destroy', $data->id)}}" >
                        @csrf @method('DELETE') 
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
    @endforeach
    
</div>
</div>


{!! $listings->appends(array("name" => request()->get('name',''),"type_id" => request()->get('type_id',''),"category_id" => request()->get('category_id',''),"city_id" => request()->get('city_id',''), "status" => request()->get('status','') ))->links() !!}
</div>


{{-- Filter Form  --}}
@include('admin.listings.parts.filter_form')

@endsection

@section('script')

<!-- select js -->
<script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>
<script>
    $('.select2').select2();
    
    
</script>

@endsection