@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          {{ __('LiveRoom') }}
          @guest
          <a class="btn btn-info float-xs-right" href="{{ route('login') }}">{{ __('Login') }}</a>
          @else
          @if(Auth::user()->live_room)
          <a class="btn btn-warning float-xs-right" href="{{ route('live_rooms.edit', Auth::user()->live_room->id) }}">{{ __('Edit LiveRoom') }}</a>
          @else
          <a class="btn btn-success float-xs-right" href="{{ route('live_rooms.create') }}">{{ __('Create LiveRoom') }}</a>
          @endif
          @endguest
        </h1>
      </div>

      <div class="card-body">
        @if($live_rooms->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>{{ __('LiveRoom Title') }}</th>
                <th>{{ __('Anchor') }}</th>
                <th>{{ __('Live category') }}</th>
                <th>{{ __('LiveRoom Excerpt') }}</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($live_rooms as $live_room)
              <tr>
                <td class="text-xs-center"><strong>{{$live_room->id}}</strong></td>

                <td>{{$live_room->title}}</td>
                <td>{{$live_room->user->name}}</td>
                <td>{{$live_room->live_category->name}}</td>
                <td>{{$live_room->excerpt}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('live_rooms.show', $live_room->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('live_rooms.edit', $live_room->id) }}">
                    E
                  </a>

                  <form action="{{ route('live_rooms.destroy', $live_room->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $live_rooms->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
