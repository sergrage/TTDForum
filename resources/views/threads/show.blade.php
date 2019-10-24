@extends('layouts.app')

@section('content')
<div class="container bg-white">
    <h1 class="p-2">Forum Threads</h1>
    @if(auth()->check())
    <div class="row">
      <div class="col-12 p-3">
        <form action="{{$thread->path() . '/replies'}}" method="POST" accept-charset="utf-8">
          {{@csrf_field()}}
          <div class="form-group">
            <textarea class="form-control" id="replyBody" name="body" placeholder="Have somthing to say?" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    @else
    <p class="text-center">Please <a href="{{ route('login') }}">sing in</a> to participate in this discussion.</p>
    @endif
    <div class="row">
        <div class="col-12 p-3">
          <div class="card border">
                <div class="card-header">
                  <h5 class="mt-0">{{$thread->title}}</h5>
                </div>
                <div class="card-body">
                    {{$thread->body}}
                </div>
          </div>
            @foreach($thread->replies as $reply)
            <div class="card border mt-3">
              <div class="card-body">
              @include('threads.partials.reply')
              </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
