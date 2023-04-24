
@extends('admin.layouts.app', ['page_action' => 'Region List'])
@section('style')
<!-- page css -->
<link href="{{ asset('backend/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">

<style>
    #data-table_filter input{
        max-width: 200px !important;
    }
</style>
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">Region List</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            {{-- <a class="breadcrumb-item" href="{{route('projects.index')}}">Product</a> --}}
            <span class="breadcrumb-item active">Regions</span>
        </nav>
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
{{-- Success message --}}
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('error') }}
</div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header mt-3 h4">{{ __('Add New Region') }}</div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('admin.regions.store') }}" >
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Region Name" value="{{ old('name') }}" >
                        
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control  @error('slug') is-invalid @enderror" placeholder="region-slug" value="{{ old('slug') }}" >
                        <small id="helpId" class="form-text text-muted">အင်္ဂလိပ်လို ထည့်သွင်းပေးရန်</small>
                        @error('slug')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- Order --}}
                    <div class="form-group">
                        <input type="number" name="order" id="order" class="form-control  @error('order') is-invalid @enderror" value="{{ old('order') }}" placeholder="Order">
                        @error('order')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>                   
                    
                    
                    <button type="submit" class="btn btn-primary">Create <i class="anticon anticon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            
            
            <div class="card-body">
                <table id="data-table" class="table table-inverse ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Cites</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($regions as $data)
                            <tr>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{$data->slug}}
                                </td>
                                
                                <td>
                                    {{$data->cities->count()}}
                                </td>
                                
                                <td>
                                    
                                    {{-- Edit and View --}}
                                    <a href="{{route('admin.regions.edit', $data->id)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-primary">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    
                                    
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger" onclick="if(confirm('Are you sure you want to delete this data?')){document.getElementById('delete-form{{$data->id}}').submit(); }">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                    <form style="display: none;" id="delete-form{{$data->id}}" method="POST" action="{{route('admin.regions.destroy', $data->id)}}" >
                                        @csrf @method('DELETE')
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- page js -->
<script src="{{ asset('backend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
    

$('#data-table').DataTable();


</script>
@endsection