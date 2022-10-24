@extends('admin.layouts.app')

@section('title', 'Create RoomType')


@section('content')

    <!-- general form elements -->
    <div class="card card-primary">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add RoomType</h1>
                    </div>
                    <div class="col-12">
                        <div class="float-right">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="{{ url('roomtype') }}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                    </div>
                </div>
        </section>
        
        <form action="{{url('roomtype/'.$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                @if(Session::has('messenger'))
                <p class="text-success">{{session('messenger')}}</p>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Roomtype</label>
                    <input value="{{$data->roomtype}}" type="text" name="roomtype" class="form-control" id="exampleInputEmail1" id="hidden"
                        placeholder="roomtype">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input value="{{$data->description}}" type="text" name="description" class="form-control" id="exampleInputEmail1" id="hidden"
                        placeholder="description">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cost</label>
                    <input value="{{$data->cost}}" type="text" name="cost" class="form-control" id="exampleInputPassword1" id="hidden" placeholder="cost">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input value="{{$data->status}}" type="text" name="status" class="form-control" id="exampleInputEmail1" id="hidden" placeholder="status">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>

    </div>
    <!-- /.card -->
@endsection
