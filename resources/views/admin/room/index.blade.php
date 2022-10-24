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
                            <a href="{{ url('room/create') }}" class="float-right btn btn-success btn-sm">Add Room</a>
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

                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($data)
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{$d->roomnumber}}</td>                                
                                                <td>{{$d->description}}</td>
                                                <td>{{$d->status}}</td>
                                                <td>
                                                    <a href="{{url('room/'.$d->id)}}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{url('room/'.$d->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure to delete this data ? ')" href="{{url('room/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
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
