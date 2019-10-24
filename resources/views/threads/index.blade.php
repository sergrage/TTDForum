@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="text-white">Forum Threads</h1>
    <div class="row">
        @foreach($threads as $thread)
        <div class="col-6 p-3">
            <div class="card">
                <div class="card-header">
                    <a href="{{ $thread->path() }}">{{$thread->title}}</a>
                </div>
                <div class="card-body">
                    <article>
                        <div class="body">{{$thread->body}}</div>
                    </article>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
