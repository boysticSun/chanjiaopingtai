@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          LiveRoom /
          @if($live_room->id)
            Edit #{{ $live_room->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($live_room->id)
          <form action="{{ route('live_rooms.update', $live_room->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('live_rooms.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="mb-3">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $live_room->title ) }}" />
                </div> 
                <div class="mb-3">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $live_room->user_id ) }}" />
                </div> 
                <div class="mb-3">
                    <label for="live_category_id-field">Live_category_id</label>
                    <input class="form-control" type="text" name="live_category_id" id="live_category_id-field" value="{{ old('live_category_id', $live_room->live_category_id ) }}" />
                </div> 
                <div class="mb-3">
                	<label for="excerpt-field">Excerpt</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3">{{ old('excerpt', $live_room->excerpt ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('live_rooms.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
