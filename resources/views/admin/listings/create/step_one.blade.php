@extends('admin.layouts.app', ['page_action' => 'Step One - Add Listing '])
@section('style')

<!-- select css -->
<link href="{{ asset('backend/vendors/select2/select2.css') }}"  rel="stylesheet">
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header mb-3">
    <h2 class="header-title">Step One - Add Listing</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="{{route('admin.listings.index')}}">Listing</a>
            <span class="breadcrumb-item active">Step One - Add Listing</span>
        </nav>
    </div>
</div>

@endsection
@section('content')


<form method="GET" action="{{ route('admin.listings.create_st_one') }}" >
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="type_id">Select Type</label>
                                <select class="select2" name="type_id" id="type_id " style="text-transform:capitalize;" required>
                                    <option value="" selected>Selete Type</option>                                
                                    @foreach ($types as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="region_id">Select Region</label>
                                <select class="select2" name="region_id" id="region_id " style="text-transform:capitalize;" required>
                                    <option value="" selected>Selete Type</option>                                
                                    @foreach ($regions as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">
                        Next
                        <i class="anticon anticon-double-right"></i>
                    </button>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>
</form>


@endsection

@section('script')
<!-- select js -->
<script src="{{asset('backend/vendors/select2/select2.js')}}"></script>
<script>    
    
    // select 2
    $('.select2').select2()
    
    
</script>
@endsection