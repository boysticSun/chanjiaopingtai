@extends('layouts.app')

@section('content')

<div class="container pb-5">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>{{ $live_room->title }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link float-start py-2" href="{{ route('live_rooms.index') }}"><- {{ __('Back') }}</a>
              <div class="float-start p-2"><span> ▪ {{ __('Anchor') }}:</span><a href="/">{{ $live_room->user->name }}</a></div>
              <div class="float-start p-2"><span> ▪ {{ __('Live category') }}:</span><a href="/">{{ $live_room->live_category->name }}</a></div>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-end mt-1" href="{{ route('live_rooms.edit', $live_room->id) }}">
                {{ __('Edit LiveRoom') }}
              </a>
            </div>
          </div>
        </div>
        <br>
        <label class="pb-2">
          <a class="btn btn-sm btn-primary float-right mt-1" href="javascript:;" onclick="loginRoom()">
            {{ __('Login LiveRoom') }}
          </a>
          <a class="btn btn-sm btn-primary float-right mt-1" href="javascript:;" onclick="createStream()">
            {{ __('Create Stream') }}
          </a>
          <a class="btn btn-sm btn-primary float-right mt-1" href="javascript:;" onclick="startPublishingStream()">
            {{ __('Start Publishing Stream') }}
          </a>
        </label>
        <div class="row m-0">
          <div class="col-md-9 p-0 bg-black live-window">
            <video id="local-video" class="live-local-video" autoplay muted playsinline controls></video>
          </div>
          <div class="col-md-3 border p-0">
            <div class="p-2">
              <label class="pb-2">{{ __('LiveRoom Excerpt') }}</label>
              <p>{{ $live_room->excerpt }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>

  // 初始化实例
  const appID = {{ $appID }};
  const server = "{{ $server }}";
  const zg = new ZegoExpressEngine(appID, server);

  // 登录房间，成功则返回 true
  // “roomID”、“userID” 和 “userName” 参数的取值都为自定义。
  // “roomID” 和 “userID” 都必须唯一，建议开发者将 “userID” 设置为一个有意义的值，可将其与自己的业务账号系统进行关联。
  // userUpdate 设置为 true 会开启监听 roomUserUpdate 回调，默认情况下不会开启该监听
  async function loginRoom() {
    const roomID = "{{ $live_room->id }}";
    const userID = "{{ $live_room->user->id }}";
    const userName = "{{ $live_room->user->name }}";
    const token = "{{ $token }}";
    const result = await zg.loginRoom(roomID, token, {userID, userName}, {userUpdate: true});
    // console.log(result)
    // return result;

    // 房间状态更新回调
    zg.on('roomStateUpdate', (roomID,state,errorCode,extendedData) => {
      if (state == 'DISCONNECTED') {
        // 与房间断开了连接
        console.log('DISCONNECTED');
      }

      if (state == 'CONNECTING') {
        // 与房间尝试连接中
        console.log('CONNECTING');
      }

      if (state == 'CONNECTED') {
        // 与房间连接成功
        console.log('CONNECTED');
      }
    })

    // 用户状态更新回调
    zg.on('roomUserUpdate', (roomID, updateType, userList) => {
      console.warn(
        `roomUserUpdate: room ${roomID}, user ${updateType === 'ADD' ? 'added' : 'left'} `,
        JSON.stringify(userList),
      );
    });

    // 流状态更新回调
    zg.on('roomStreamUpdate', async (roomID, updateType, streamList, extendedData) => {
      if (updateType == 'ADD') {
        // 流新增，开始拉流
      } else if (updateType == 'DELETE') {
        // 流删除，停止拉流
      }
    });
  }

  // 创建流
  async function createStream() {
    // 调用 createStream 接口后，需要等待 ZEGO 服务器返回流媒体对象才能执行后续操作
    localStream = await zg.createStream();

    // 获取页面的 video 标签
    const localVideo = document.getElementById('local-video');
    // stream 为MediaStream对象，开发者可通过赋值给video或audio的srcObject属性进行渲染
    localVideo.srcObject = localStream;
    console.log(streamID);
  }

  streamID = "Room{{ $live_room->id }}";
  async function startPublishingStream() {
    // localStream 为创建流获取的 MediaStream 对象
    zg.startPublishingStream(streamID, localStream)
  }

  // 监听推流后的事件回调
  zg.on('publisherStateUpdate', result => {
    // 推流状态更新回调
    // ...
  })

  zg.on('publishQualityUpdate', (streamID, stats) => {
    // 推流质量回调
    // ...
  })

</script>
@stop
