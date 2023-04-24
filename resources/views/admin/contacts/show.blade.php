
@extends('admin.layouts.app', ['page_action' => 'Contact Detail'])
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<div class="page-header">
    <h2 class="header-title">{{$contact->name}}</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            {{-- <a class="breadcrumb-item" href="{{route('projects.index')}}">Product</a> --}}
            <span class="breadcrumb-item active">Contact Detail</span>
        </nav>
    </div>
</div>
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="mt-3">
                    {{$contact->name}}
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Contact Info</th>
                            <th>{{$contact->contact_info}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">Listing</td>
                            <td>{{$contact->listing->name}}</td>
                        </tr>
                        <tr>
                            <td scope="row">Message</td>
                            <td>{{$contact->description}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection