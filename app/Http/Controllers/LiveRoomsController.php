<?php

namespace App\Http\Controllers;

use App\Models\LiveRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LiveRoomRequest;
use App\Models\LiveCategory;
use Illuminate\Support\Facades\Auth;

use ZEGO\ZegoServerAssistant;
use ZEGO\ZegoErrorCodes;

class LiveRoomsController extends Controller
{
    private $appID = 820242667;
    private $server = '6d0271f0eba230ed33ff7a5af271d9e8';

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
        $appID = $this->appID;
        $server = $this->server;
        $token = $this->getZegoToken();

        return view('live_rooms.show', compact('live_room', 'appID', 'server', 'token'));
    }

	public function create(LiveRoom $live_room)
	{
        $categories = LiveCategory::all();
		return view('live_rooms.create_and_edit', compact('live_room', 'categories'));
	}

	public function store(LiveRoomRequest $request, LiveRoom $live_room)
	{
        $live_room->fill($request->all());
        $live_room->user_id = Auth::id();
        $live_room->save();

		return redirect()->route('live_rooms.show', $live_room->id)->with('message', '创建成功！');
	}

	public function edit(LiveRoom $live_room)
	{
        $this->authorize('update', $live_room);

        $categories = LiveCategory::all();

		return view('live_rooms.create_and_edit', compact('live_room', 'categories'));
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

    /**
     * 生成Zego直播SDK基础鉴权 Token
     */
    private function getZegoToken()
    {
        $appId = 820242667;
        $userId = 1;
        $secret = '6d0271f0eba230ed33ff7a5af271d9e8';
        $payload = '';
        $token = ZegoServerAssistant::generateToken04($appId,$userId,$secret,3600,$payload);
        if( $token->code == ZegoErrorCodes::success ){
          return $token->token;
        }

        return false;
    }
}
