@extends('layouts.main')

@section('title', 'Insert')

@section('css')
@parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List of Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active">List of Customers</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-12 col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of customers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="customer_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Phone Number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_customer as $list_customer_ind => $list_customer_array)
                                    <tr>
                                        <td>{{$list_customer_array['id']}}</td>
                                        <td>{{$list_customer_array['name']}} {{$list_customer_array['surname']}}</td>
                                        <td>{{$list_customer_array['email']}}</td>
                                        <td>{{$list_customer_array['address']}}</td>
                                        <td>{{$list_customer_array['city']}}</td>
                                        <td>{{$list_customer_array['state']}}</td>
                                        <td>{{$list_customer_array['phone_number']}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('edit_customer', [$list_customer_array['id']]) }}">
                                                    <button type="button" class="btn btn-block btn-outline-warning btn-xs"><i class="fas fa-edit"></i> </button>
                                                </a>
                                                <a href="#modal_delete_{{ $list_customer_array['id'] }}" data-toggle="modal" data-target="#modal_delete_{{ $list_customer_array['id'] }}">
                                                    <button type="button" class="btn btn-block btn-outline-danger btn-xs" ><i class="fas fa-trash"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- /.modal -->
                                    <div class="modal fade" id="modal_delete_{{ $list_customer_array['id'] }}">
                                        <form method="POST" action="{{ route('delete_customer') }}" id="form_delete_customer_{{ $list_customer_array['id'] }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $list_customer_array['id'] }}"/>
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete User</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you want to delete this user?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-outline-light">Yes</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </form>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                        {{-- <!-- /.card-body --> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('js')
@parent

<!-- DataTables -->
<script src="{{ asset('admin_lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $(function() {
        $("#customer_list").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>

@endsection
