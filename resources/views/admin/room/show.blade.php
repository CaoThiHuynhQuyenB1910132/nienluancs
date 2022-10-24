@extends('admin.layouts.app')

@section('title', 'Room')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb float-sm-right">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <a href="{{ url('room') }}" class="float-right btn btn-success btn-sm">View All</a>
                        </h6>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Room</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                @if ($data)
                                

                                        <tbody>
                                            <tr>
                                                <th>RoomNumber</th>
                                                <td>{{ $data->roomnumber }}</td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{ $data->description }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{{ $data->status }}</td>
                                            </tr>
                                    
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
