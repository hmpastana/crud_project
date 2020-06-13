@extends('layouts.main')

@section('title', 'Insert')

@section('css')
@parent

@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Customer Information</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('list_customer')}}">List</a></li>
                    <li class="breadcrumb-item active">Edit customer</li>
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
                <!-- Horizontal Form -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Customer Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('update_customer') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $customer_info['id'] }}"/>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Name" value="{{ $customer_info['name'] }}" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Surname" value="{{ $customer_info['surname'] }}" name="surname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" value="{{ $customer_info['email'] }}" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Phone Number" value="{{ $customer_info['phone_number'] }}" name="phone_number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Address" value="{{ $customer_info['address'] }}" name="address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="City" value="{{ $customer_info['city'] }}" name="city">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="State" value="{{ $customer_info['state'] }}" name="state">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
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

<script>

$(document).ready(function() {
    setTimeout(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": false,
            "positionClass": "toast-top-center",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if (!is_null(session('message-insert')))
            toastr.success('{{session('message-insert')}}');
        @elseif(!is_null(session('message-delete')))
            toastr.error('{{ session("message-delete") }}');
        @elseif(!is_null(session('message-error')))
            toastr.error('{{ session("message-error") }}');
        @elseif(!is_null(session('message-success')))
            toastr.success('{{ session("message-success") }}');
        @elseif(isset($message_success) and $message_success == true)
            toastr.success('{{ $message_success }}');
        @endif
    }, 1300);
});
</script>

@endsection
