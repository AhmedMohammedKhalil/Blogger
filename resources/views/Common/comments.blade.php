<div class="media" id="{{$comment->id}}">
    <a class="pull-left" href="javascript:void(0)"><img class="media-object" src="{{asset('users/'.$comment->user_id.'/images/'.$comment->user->image)}}" alt=""></a>
    <div class="media-body">
        <div class="flex">
            <h4 class="media-heading"><a href="{{route('userprofile',['id' => $comment->user->name])}}">{{$comment->user->name}}</a></h4>
            @if ($comment->user_id == Auth::user()->id)
                <ul class="menu flex list-unstyled">
                    <li><a href="javascript:void(0)" class="comment-edit" id="ce-{{$comment->id}}"><i style="color: green"class="icon-line-awesome-edit"></i></a></li>
                    <li><a href="javascript:void(0)"  class="comment-delete" id="cd-{{$comment->id}}"><i style="color: darkred" class="icon-material-outline-delete"></i></a></li>
                </ul>
            @endif
           
        </div>
        <div id="c-{{$comment->id}}">
            <p>{{$comment->comment}}</p>
        </div>
        <div class="flex">
            <ul class="list-unstyled list-inline media-detail flex">
                <li><i class="fa fa-calendar"></i>{{$comment->updated_at->diffForHumans()}}</li>
                <li id="cr-{{$comment->id}}"><i class="fa fa-thumbs-up"></i>{{$comment->reactions()->count()}}</li>
            </ul>
            <ul class="list-unstyled list-inline media-detail flex">
                <li class=""><a href="javascript:void(0)" class="like-comment" id="lc-{{$comment->id}}">Like</a></li>
            </ul>
        </div>
    </div>
</div>
