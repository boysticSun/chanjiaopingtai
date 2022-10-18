<?php

namespace App\Http\Controllers;

use App\Models\LiveRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LiveRoomRequest;

class LiveRoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$live_rooms = LiveRoom::paginate();
		return view('live_rooms.index', compact('live_rooms'));
	}

    public function show(LiveRoom $live_room)
    {
        return view('live_rooms.show', compact('live_room'));
    }

	public function create(LiveRoom $live_room)
	{
		return view('live_rooms.create_and_edit', compact('live_room'));
	}

	public function store(LiveRoomRequest $request)
	{
		$live_room = LiveRoom::create($request->all());
		return redirect()->route('live_rooms.show', $live_room->id)->with('message', 'Created successfully.');
	}

	public function edit(LiveRoom $live_room)
	{
        $this->authorize('update', $live_room);
		return view('live_rooms.create_and_edit', compact('live_room'));
	}

	public function update(LiveRoomRequest $request, LiveRoom $live_room)
	{
		$this->authorize('update', $live_room);
		$live_room->update($request->all());

		return redirect()->route('live_rooms.show', $live_room->id)->with('message', 'Updated successfully.');
	}

	public function destroy(LiveRoom $live_room)
	{
		$this->authorize('destroy', $live_room);
		$live_room->delete();

		return redirect()->route('live_rooms.index')->with('message', 'Deleted successfully.');
	}
}