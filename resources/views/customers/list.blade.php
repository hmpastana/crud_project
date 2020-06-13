@extends('layouts.main')

@section('title', 'Insert')

@section('css')
@parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('sweet_alert/package/dist/sweetalert2.min.css')}}">

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
                        <table id="example1" class="table table-bordered table-striped">
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
                                                <a href="{{ route('edit_customer', [$list_customer_array['id']]) }}"><button type="button" class="btn btn-block btn-outline-warning btn-xs"><i class="fas fa-edit"></i> </button></a>
                                                <form method="POST" action="{{ route('delete_customer') }}" id="form_delete_customer_{{ $list_customer_array['id'] }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $list_customer_array['id'] }}"/>
                                                    {{-- <button type="button" class="btn btn-block btn-outline-danger btn-xs delete_customer" id="{{ $list_customer_array['id'] }}"><i class="fas fa-trash"></i></button> --}}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
                    <!-- /.card-body -->
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


<script src="{{ asset('sweet_alert/package/dist/sweetalert2.all.min.js')}}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
        });
    });

    $('.delete_customer').click(function() {
        var idCustomer = $(this).attr('id');
        alert(idCustomer)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'

                $('#form_delete_customer_' + idCustomer).submit();
            )
        }
        })
    });
</script>

@endsection
