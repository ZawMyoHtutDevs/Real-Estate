@extends('admin.layouts.app', ['page_action' => 'Add Listing'])
@section('style')
<style>
    /* image gallery */
    .image_custom {
        width: 100%;
        height: 150px;
        background-size: cover;
        background-position: center;
    }
    .delete_image_overly{
        display: none;
        width: 100%;
        height: 150px;
        background-color: #8080804f;
        margin-top: -150px;
    }
</style>
<!-- select css -->
<link href="{{ asset('backend/vendors/select2/select2.css') }}"  rel="stylesheet">
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header mb-3">
    <h2 class="header-title">Add Listing</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="{{route('admin.listings.index')}}">Products</a>
            <span class="breadcrumb-item active">Add Listing</span>
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

<form method="POST" action="{{ route('admin.listings.update', $listing->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row ">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label for="name">Name  <small class="text-muted">*</small></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $listing->name }}" required autocomplete="name" autofocus >
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="category_id">Select Category <small class="text-muted">*</small></label>
                                <select class="select2" name="category_id" id="category_id" style="text-transform:capitalize;" required>

                                    @if ($listing->category != '')
                                    <option value="{{$listing->category->id}}" selected>{{$listing->category->name}}</option>    
                                    @endif

                                    @foreach ($categories as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group ">
                                <label for="city_id">Select City <small class="text-muted">*</small></label>
                                <select class="select2" name="city_id" id="city_id " style="text-transform:capitalize;" required>
                                    @if ($listing->city != '')
                                    <option value="{{$listing->city->id}}" selected>{{$listing->city->name}}</option>    
                                    @endif                           
                                    @foreach ($cities as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    
                    
                    {{-- Description --}}
                    <div class="form-group">
                        <label for="">Description  <small class="text-muted">Optional</small></label>
                        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" autocomplete="description" rows="3">{!! old('description') ?? $listing->description !!}</textarea>
                    </div>
                    
                    
                </div>
                
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('listing_photos/'.$listing->asset)}}" class="img-fluid " width="100%" alt="">
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="asset">New Main Photo <small class="text-muted">Optional</small></label>
                                <input id="asset" type="file" class="form-control @error('asset') is-invalid @enderror" name="asset" value="{{ old('asset') }}" autocomplete="asset" >
                                @error('asset')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="form-group mt-3">
                        <label for="asset">New Gallery Photos <small class="text-muted">Optional</small></label>
                        <input id="gallery" type="file" class="form-control @error('gallery_image') is-invalid @enderror" name="gallery_image[]" value="{{ old('gallery_image') }}" autocomplete="gallery" multiple>
                        @error('gallery_image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="card-body">                    
                    
                    <h5>Gallery List</h5>
                    
                    <input type="hidden" name="delete_gallery_images" id="delete_gallery_images">
                    
                    <div class="row">
                        @foreach ($listing->images as $data)
                        <div class="col-md-4 mb-4">
                            <div class="image_custom shadow"  style="background-image: url({{ asset('listing_photos/gallery/'.$data->asset) }});">
                                <span class="badge badge-danger float-right" id="image{{$data->id}}" onclick="del_image('{{$data->asset}}', '{{$data->id}}')">X</span>
                            </div>
                            
                            <div class="delete_image_overly text-center" id="image_over{{$data->id}}">
                                <span class="btn btn-info mt-5" onclick="restore_image('{{$data->id}}')">Restore</span>
                            </div>
                        </div> 
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="form-group d-flex align-items-center mt-2">
                                <div class="switch m-r-10">
                                    <input type="checkbox" name="status" id="status" 
                                    @if ($listing->status)
                                    checked
                                    @endif
                                    >
                                    <label for="status"></label>
                                </div>
                                <label>Status</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary float-right">
                                <i class="anticon anticon-save"></i>
                                {{ __('Save') }}
                            </button>
                            
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-group">
                        <label for="time">Price <small class="text-muted">*</small></label>
                        <div class="input-group mb-3">
                            
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror " value="{{ old('price') ?? $listing->price }}" placeholder="250" aria-label="150" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Lakhs</span>
                            </div>
                        </div>
                        
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    
                </div>
                
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">Attributes <small class="text-muted">Optional</small></h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordion-default">
                        @foreach ($attributes as $data)
                        
                                    @php
                                        $dev_value = '';
                                        foreach ($listing->att_values as $item) {
                                            if ($item->attribute_id == $data->id) {
                                                $dev_value = $item->value;
                                            }
                                        }
                                    @endphp
                                    
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <a data-toggle="collapse" href="#collapse{{$data->id}}">
                                        <span>{{$data->name}}</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse{{$data->id}}" class="collapse " data-parent="#accordion-default">
                                <div class="card-body">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="att{{$data->id}}" value="{{$dev_value}}" placeholder="Value">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.20.1/ckeditor.js"></script> --}}

<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>
<script>    
    window.onload = function() {   
        document.getElementById('delete_gallery_images').value = '';
    }

    // select 2
    $('.select2').select2()
    
    // CKeditor
    CKEDITOR.replace( 'description',{
        
    } 
    );
    
    
    
    
    
    var options = []; 
    
    function del_image(image, id){
        document.getElementById('image'+id).style.display = "none";
        document.getElementById('image_over'+id).style.display = "block";
        
        options.push(id);
        document.getElementById('delete_gallery_images').value = options.toString();
        
    }
    
    function restore_image(id){
        document.getElementById('image'+id).style.display = "block";
        document.getElementById('image_over'+id).style.display = "none";
        
        
        for( var i = 0; i < options.length; i++){ 
            
            if ( options[i] === id) { 
                
                options.splice(i, 1); 
            }
            
        }
        document.getElementById('delete_gallery_images').value = options.toString();
    }
</script>
@endsection