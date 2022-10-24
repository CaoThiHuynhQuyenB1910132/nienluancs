@extends('admin.layouts.app')

@section('title', 'Create Room')


@section('content')

    <!-- general form elements -->
    <div class="card card-primary">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Room</h1>
                    </div>
                    <div class="col-12">
                        <div class="float-right">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="{{ url('room') }}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                    </div>
                </div>
        </section>
        
        <form action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if(Session::has('messenger'))
                <p class="text-success">{{session('messenger')}}</p>
                @endif
                
                    
                <table class="table table-bordered">
                    <tr>
                        <th>Select Room Type</th>
                        <td>
                            <select name="room_type_id" class="form-control">
                                @foreach($roomtypes as $roomtype)
                                <option value="{{$roomtype->id}}">{{$roomtype->roomtype}}</option>
                                @endforeach
                            </select>
                            @error('room_type_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <th>Room Number</th>
                        <td><input type="text" name="roomnumber" class="form-control">
                            @error('roomnumber')
                            <span class="text-danger">{{$message}}</span>
                        @enderror</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td><input type="text" name="description" class="form-control">
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td><input type="text" name="status" class="form-control">
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror</td>
                    </tr>
                    
                </table>
                
                
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>

    </div>
    <!-- /.card -->
@endsection
