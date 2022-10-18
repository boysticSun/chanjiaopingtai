@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>LiveRoom / Show #{{ $live_room->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('live_rooms.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('live_rooms.edit', $live_room->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $live_room->title }}
</p> <label>User_id</label>
<p>
	{{ $live_room->user_id }}
</p> <label>Live_category_id</label>
<p>
	{{ $live_room->live_category_id }}
</p> <label>Excerpt</label>
<p>
	{{ $live_room->excerpt }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>

</script>
@stop
