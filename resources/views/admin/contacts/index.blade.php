
@extends('admin.layouts.app', ['page_action' => 'Contact List'])
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
    <h2 class="header-title">Contact List</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{route('admin')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Dashboard</a>
            {{-- <a class="breadcrumb-item" href="{{route('projects.index')}}">Product</a> --}}
            <span class="breadcrumb-item active">Contacts</span>
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

<div class="card">
            
            
    <div class="card-body">
        <table id="data-table" class="table table-inverse ">
            <thead>
                <tr>
                    
                    <th>Date</th>
                    <th>Name</th>
                    <th>Listing</th>
                    <th>Contact Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($contacts as $data)
                    <tr>
                        
                        <td>
                            {{Carbon\Carbon::parse($data->created_at)->format('d, M Y')}}
                        </td>
                        <td>
                            {{$data->name}}
                        </td>
                        <td>
                            {{$data->listing->name}}
                        </td>
                        <td>
                            {{$data->contact_info}}
                        </td>
                        
                        <td>
                            
                            {{-- View --}}
                            <a href="{{route('admin.contacts.show', $data->id)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right text-success">
                                <i class="anticon anticon-eye"></i>
                            </a>
                            
                            
                            <button class="btn btn-icon btn-hover btn-sm btn-rounded text-danger" onclick="if(confirm('Are you sure you want to delete this data?')){document.getElementById('delete-form{{$data->id}}').submit(); }">
                                <i class="anticon anticon-delete"></i>
                            </button>
                            <form style="display: none;" id="delete-form{{$data->id}}" method="POST" action="{{route('admin.contacts.destroy', $data->id)}}" >
                                @csrf @method('DELETE')
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            
            
        </table>
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