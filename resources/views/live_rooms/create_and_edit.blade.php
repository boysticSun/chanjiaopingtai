@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          @if($live_room->id)
            {{ __('Edit LiveRoom') }}
          @else
            {{ __('Create LiveRoom') }}
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
                	<label for="title-field">{{ __('LiveRoom Title') }}</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $live_room->title ) }}" />
                </div>
                <div class="mb-3">
                    <label for="live_category_id-field">{{ __('Live category') }}</label>
                    <select class="form-control" name="live_category_id" required>
                      <option value="" hidden disabled @selected(old('live_category_id', $live_room->live_category_id) == '')>{{ __('Please Select') }}</option>
                      @foreach ($categories as $value)
                        <option value="{{ $value->id }}" @selected(old('live_category_id', $live_room->live_category_id) == $value->id)>{{ $value->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                	<label for="excerpt-field">{{ __('LiveRoom Excerpt') }}</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3">{{ old('excerpt', $live_room->excerpt ) }}</textarea>
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <a class="btn btn-link float-xs-right" href="{{ route('live_rooms.index') }}"> <- {{ __('Back') }}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
