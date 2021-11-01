<div class="media" id="{{$comment->id}}">
    <a class="pull-left" href="#"><img class="media-object" src="{{asset('users/'.$comment->user_id.'/images/'.$comment->user->image)}}" alt=""></a>
    <div class="media-body">
        <div class="flex">
            <h4 class="media-heading">{{$comment->user->name}}</h4>
            @if ($comment->user_id == Auth::user()->id)
                <ul class="menu flex list-unstyled">
                    <li style="display: none"><a href="" class="comment-edit" id="ce-{{$comment->id}}"><i style="color: green"class="icon-line-awesome-edit"></i></a></li>
                    <li><a href=""  class="comment-delete" id="cd-{{$comment->id}}"><i style="color: darkred" class="icon-material-outline-delete"></i></a></li>
                </ul>
            @endif
           
        </div>
        <p>{{$comment->comment}}</p>
        <div class="flex">
            <ul class="list-unstyled list-inline media-detail flex">
                <li><i class="fa fa-calendar"></i>{{$comment->updated_at->diffForHumans()}}</li>
                <li><i class="fa fa-thumbs-up"></i>{{$comment->reactions()->count()}}</li>
            </ul>
            <ul class="list-unstyled list-inline media-detail flex">
                <li class=""><a href="" class="like-comment" id="lc-{{$post->id}}">Like</a></li>
            </ul>
        </div>
    </div>
</div>
