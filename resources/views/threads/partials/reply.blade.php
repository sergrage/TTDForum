<div class="media mt-3 rounded">
    <div class="">
    <a href="#">{{$reply->owner->name}}</a>
    <p>sad {{$reply->created_at->diffForHumans()}}</p>
    </div>
  <div class="media-body ml-5">
    {{ $reply->body }}
  </div>
</div>