<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    protected $room;

    public function __construct(RoomType $room)
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
        $data = RoomType::all();
        return view('admin.roomtype.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCreate =  $request->all();
        $dataCreate['roomimg'] = '';
        $dataCreate['status'] = 0;
        $this->room->create($dataCreate);
        return redirect()->route('roomtype.create')->with(['messenger' => 'create room success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RoomType::find($id);
        return view('admin.roomtype.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = RoomType::find($id);
        return view('admin.roomtype.edit', ['data' => $data]);
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
        $affectedRows = RoomType::where("id", $id)->update([
            'roomtype'=>$request['roomtype'],
            'roomimg'=>$request['roomimg']??'',
            'description'=>$request['description'],
            'cost'=>$request['cost'],
            'status'=>$request['status']
        ]);

        return redirect('roomtype/' . $id . '/edit')->with(['messenger' => $affectedRows > 0 ? 'Update room success' : 'Failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::where('id', $id)->delete();
        return redirect('roomtype')->with(['messenger' => 'delete room success']);
    }
}
