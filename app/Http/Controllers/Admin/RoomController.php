<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('admin.room.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtypes = RoomType::all();
        return view('admin.room.create',['roomtype'=>$roomtypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'room_type_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'roomnumber' => 'required',
        ]);

        dd($request->room_type_id);
        $room = Room::create([
            'room_type_id	'=> $request->room_type_id,
            'roomnumber' =>$request->roomnumber,
            'description' => $request->description,
            'status' => $request->status,

        ]);

        $room->save();


        return redirect()->route('room.create')->with(['messenger' => 'create room success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Room::find($id);
        return view('admin.room.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype = RoomType::all();
        $data = Room::find($id);
        return view('admin.room.edit', ['data' => $data, 'roomtype'=>$roomtype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $affectedRows = Room::where("id", $id)->update([
            'roomnumber'=>$request['roomnumber'],
            'description'=>$request['description'],
            'status'=>$request['status']
        ]);

        return redirect('room/' . $id . '/edit')->with(['messenger' => $affectedRows > 0 ? 'Update room success' : 'Failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::where('id', $id)->delete();
        return redirect('room')->with(['messenger' => 'delete room success']);
    }
}
