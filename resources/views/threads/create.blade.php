@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-white">Forum Threads</h1>
    <div class="row">
        <div class="col-12 p-3">
            <form method="POST" action="/threads" class="text-white">
               {{@csrf_field()}}
               <div class="form-group">
                    <label for="threatTitle">Title</label>
                    <input class="form-control" name="title" id="threatTitle">
                    <input class="form-control" type="hidden" name="user_id" value="{{Auth::id()}}">
                </div>
                <div class="form-group">
                    <label for="threatBody">Enter message</label>
                    <textarea class="form-control" id="threadBody" name="body" rows="5"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
