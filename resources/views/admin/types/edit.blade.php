@extends('admin.layouts.app', ['page_action' => 'Edit Type'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$type->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Edit Type</span>
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

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header mt-3 h3">{{ __('Update Type') }}</div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('admin.types.update', $type->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Apple" value="{{ old('name') ?? $type->name }}" autocomplete="name" >
                        
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control  @error('slug') is-invalid @enderror" placeholder="type-slug" value="{{ old('slug') ?? $type->slug }}" >
                        <small id="helpId" class="form-text text-muted">အင်္ဂလိပ်လို ထည့်သွင်းပေးရန်</small>
                        @error('slug')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- Order --}}
                    <div class="form-group">
                        <input type="number" name="order" id="order" class="form-control  @error('order') is-invalid @enderror" value="{{ old('order') ?? $type->order }}" placeholder="Order">
                        @error('order')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    
                    
                    <button type="submit" class="btn btn-primary float-right">Update  <i class="anticon anticon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection