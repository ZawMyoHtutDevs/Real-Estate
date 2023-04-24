@extends('admin.layouts.app', ['page_action' => 'Add New Account'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">Create New Account</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">New Account</span>
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
    <div class="col-md-8">
        
        <form method="POST" action="{{ route('admin.accounts.store') }}" enctype="multipart/form-data">
            @csrf @method('POST')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="asset">Photo <small class="text-muted">Optional</small></label>
                                <input id="asset" type="file" class="form-control @error('asset') is-invalid @enderror" name="asset">
                                @error('asset')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name <small class="text-muted ">*</small></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" required>
                                
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <small class="text-muted">Optional</small></label>
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">
                                
                                @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="password" class="text-md-right">{{ __('Password') }} <small class="text-muted">*</small></label>
                                
                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="password-confirm" class="text-md-right">{{ __('Confirm Password') }} <small class="text-muted">*</small></label>
                                
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary  float-right">
                        {{ __('Create') }} <i class="anticon anticon-save"></i>
                    </button>
                </div>
                
                
                
            </div>
            
        </div>
    </form>
</div>


@endsection

@section('script')

@endsection