@extends('admin.layouts.app', ['page_action' => 'Edit Account'])
@section('style')
<!-- select css -->
<link href="{{ asset('backend/vendors/select2/select2.css') }}"  rel="stylesheet">
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$user->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            
            <span class="breadcrumb-item active">{{$user->name}}</span>
        </nav>
    </div>
    {{-- change Pssword --}}
    <a name="" id="" class="btn btn-primary float-right" href="#" role="button" data-toggle="modal" data-target="#change_password">Change Password</a>
</div>

@endsection
@section('content')


@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('success') }}
</div>
@endif

@include('admin.accounts.change_password')
<div class="row justify-content-center">
    <div class="col-md-8">
        
        <form method="POST" action="{{ route('admin.accounts.update', $user->id) }}">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div class="avatar avatar-image" style="width: 75px; height: 75px;">
                                <img src="{{asset('user_photos/'. $user->asset)}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="asset">New Photo <small class="text-muted">Optional</small></label>
                                <input id="asset" type="file" class="form-control @error('asset') is-invalid @enderror" name="asset">
                                @error('asset')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name <small class="text-muted ">*</small></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}" required autocomplete="name" autofocus>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Email <small class="text-muted">*</small></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}"  autocomplete="email" required>
                                
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <small class="text-muted">Optional</small></label>
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $user->phone }}"  autocomplete="phone">
                                
                                @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary float-right">
                        {{ __('Change') }}
                    </button>
                </div>
                
                
                
            </div>
            
        </div>
    </form>
</div>


@endsection

@section('script')

@endsection