@push('css')
    <style>
        div.p-c {
            margin-bottom: 60px;
            box-shadow: -2px 5px 23px #ccc;
        }
        .flex {
            display:flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }
        .posts-content{
            margin-top:20px;    
        }
        .ui-w-40 {
            width: 100px !important;
            height: auto;
        }
        .default-style .ui-bordered {
            border: 1px solid rgba(24,28,33,0.06);
        }
        .ui-bg-cover {
            background-color: transparent;
            background-position: center center;
            background-size: cover;
        }
        .ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
            position: relative !important;
            display: block !important;
            width: 100% !important;
        }
        .d-flex, .d-inline-flex, .media, .media>:not(.media-body), .jumbotron, .card {
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }
        .bg-dark {
            background-color: rgba(24,28,33,0.9) !important;
        }
        .card-footer, .card hr {
            border-color: rgba(24,28,33,0.06);
        }
        .ui-rect-content {
            position: absolute !important;
            top: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
        }
        .default-style .ui-bordered {
            border: 1px solid rgba(24,28,33,0.06);
        }
        .content-item {
            padding:15px 0;
            background-color:#FFFFFF;
        }

        .content-item.grey {
            background-color:#F0F0F0;
            padding:50px 0;
            height:100%;
        }

        .content-item h2 {
            font-weight:700;
            font-size:35px;
            line-height:45px;
            text-transform:uppercase;
            margin:20px 0;
        }

        .content-item h3 {
            font-weight:400;
            font-size:20px;
            color:#555555;
            margin:10px 0 15px;
            padding:0;
        }

        .content-headline {
            height:1px;
            text-align:center;
            margin:20px 0 70px;
        }

        .content-headline h2 {
            background-color:#FFFFFF;
            display:inline-block;
            margin:-20px auto 0;
            padding:0 20px;
        }

        .grey .content-headline h2 {
            background-color:#F0F0F0;
        }

        .content-headline h3 {
            font-size:14px;
            color:#AAAAAA;
            display:block;
        }


        #comments {
            border: 2px solid rgb(0 0 0 /10%);
            background-color:#FFFFFF;
        }
        #comments .btn {
            margin-top:7px;
        }
        #comments a {
            color : black
        }
        #comments form fieldset {
            clear:both;
        }

        #comments .media {
            border-top:1px dashed #DDDDDD;
            padding:20px 0;
            margin:0;
        }

        #comments .media > .pull-left {
            margin-right:20px;
        }

        #comments .media img {
            max-width:100px;
        }
        #comments img {
            border-radius: 50%;

        }
        #comments .menu ,.media .menu{
            margin-bottom: 0;
            width: 67px;
            justify-content: flex-end;
        }
        #comments .media-heading , #comments .menu li, .media .menu li{
            font-size: 30px
        }

        #comments .media-detail li a {
            font-size: 18px;
            text-decoration: none;
            padding: 0 20px;
            text-align: center;
        }

        #comments .media h4 span {
            font-size:14px;
            color:#999999;
        }

        #comments .media p {
            margin-bottom:15px;
            text-align:justify;
        }

        #comments .media-detail {
            margin:0;
        }

        #comments .media-detail li {
            color:#AAAAAA;
            font-size:12px;
            padding-right: 10px;
            font-weight:600;
        }

        #comments .media-detail a:hover {
            background-color: rgb(0 0 0 /20%)
        }

        #comments .media-detail li:last-child {
            padding-right:0;
        }

        #comments .media-detail li i {
            color:#666666;
            font-size:15px;
            margin-right:10px;
        }
        .image-user {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 130px;
            padding-right: 0;
        }
        .posts-content {
            padding: 0
        }
        .images {
            justify-content: space-evenly;
            flex-wrap: wrap;

        }
        .images img {
            width: 315px;
            height: 315px;
            margin: 10px 0;
        }
        .more-images {
            width: 100%;
            height: 315px;
            right: 0;
            top: 0;
            background-color: black;
            margin-top: 10px;
        }
        .tag {
            border-radius: 10px;
            padding: 5px;
            background: #5590fb;
            color: black;
            margin-right: 10px;
        }
        .card-footer .media-detail li a {
            font-size: 18px;
            text-decoration: none;
            padding: 0 20px;
            text-align: center;
            color : black;
            border-radius: 10px
        }
        .card-footer .media-detail li a:hover {
            background-color: #555555;
        }
    </style>
@endpush


@foreach ($posts as $post)
<div id="{{'p-c-'.$post->id}}" class="p-c">
    <div class="container posts-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-1">
                  <div class="card-body">
                    <div class="media mb-3 flex">
                      <div class="flex">
                        <img src="{{asset('users/'.$post->user->id.'/images/'.$post->user->image)}}" class="d-block ui-w-40 rounded-circle" alt="">
                        <div class="media-body ml-3">
                          {{$post->user->name}}
                          <div class="text-muted small">{{$post->updated_at->diffForHumans()}}</div>
                        </div>
                      </div>
                      @if ($post->user_id == Auth::user()->id)
                        <ul class="menu flex list-unstyled">
                            <li style="display: none"><a href=""><i style="color: green"class="icon-line-awesome-edit"></i></a></li>
                            <li><a href="" class="delete-post" id="dp-{{$post->id}}"><i style="color: darkred" class="icon-material-outline-delete"></i></a></li>
                        </ul>
                      @endif
                    </div>
                
                    <p style="margin-bottom : 2px">
                        {{$post->content}}
                    </p>
                    <div class="flex" style="justify-content: flex-start">
                        @foreach ($post->tags as $tag)
                            <div class="tag">{{$tag->name}}</div>
                        @endforeach
                    </div>
                    @if ($post->media()->count() > 0 && $post->type == "images")
                        <div class="images flex text-align-center">
                            @if ($post->media()->count() == 1)
                                <a href=""><img src="{{asset('users/'.$post->user->id.'/posts/'.$post->id.'/images/'.$post->media->media)}}" alt=""></a>
                            @else
                                <div class="position-relative">
                                    <a href=""><img src="{{asset('users/'.$post->user->id.'/posts/'.$post->id.'/images/'.$post->media()->first()->media)}}" alt=""></a>
                                    <div class="position-absolute  more-images">
                                        <span>+</span><span>{{$post->media()->count() - 1}}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    @if ($post->media()->count() > 0 && $post->type == "files")
                        @foreach ( $post->media as $media)
                            <div class="">
                                <span>{{$media->media.' >> '}}</span>
                                <a href="">Download</a>
                            </div>
                        @endforeach
                    @endif
                    
                  </div>
                  <div class="card-footer flex">
                    <div>
                        <a href="javascript:void(0)" id="cr-{{$post->id}}" class="d-inline-block text-muted">
                            <strong >{{$post->reactions()->count()}}</strong> Likes</small>
                        </a>
                        <a href="javascript:void(0)" id="cc-{{$post->id}}" class="d-inline-block text-muted ml-3">
                            <strong >{{$post->comments()->count()}}</strong> Comments</small>
                        </a>
                        @if ($post->user_id == Auth::user()->id)
                            <a href="javascript:void(0)" id="cv-{{$post->id}}" class="d-inline-block text-muted ml-3">
                                <strong >{{$post->views()->count()}}</strong> views</small>
                            </a>
                        @endif
                    </div>
                    <ul class="list-unstyled list-inline media-detail flex" style="margin-bottom: 0">
                        <li class=""><a class="like-post" id="lp-{{$post->id}}" href="">Like</a></li>
                    </ul>

                  </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content-item" id="comments">
        <div class="container">   
            <div class="row">
                <div class="col-sm-12">   
                    <form id="addComment-{{$post->id}}" class="addcomments">
                        <h3 class="pull-left">New Comment</h3>
                        <button type="submit" form="addComment-{{$post->id}}" class="btn btn-normal pull-right">Submit</button>
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-2 col-lg-3 col-xl-2 image-user">
                                    <img class="img-responsive" width="100" height="100" src="{{asset('users/'.Auth::user()->id.'/images/'.Auth::user()->image)}}" alt="">
                                </div>
                                <div class="form-group col-xs-12 col-sm-10 col-lg-9 col-xl-10">
                                    <textarea class="form-control" id="addc-{{$post->id}}" placeholder="Your comment" required=""></textarea>
                                </div>
                            </div>  	
                        </fieldset>
                    </form> 
                    <div id="comments-{{$post->id}}" >
                        @foreach ($post->comments as $comment)
                            @include('Common.comments')
                        @endforeach
                    </div>                   
                   
                    
                
                </div>
            </div>
        </div>
    </section>
</div>
@endforeach



@push('js')
    <script>
        $('form.addcomments').submit((e) => {
            e.preventDefault();
            var id = $(e.target).attr('id');
            var post_id = id.match(/\d/g).join("");
            var comment = $('#'+'addc-'+post_id).val();
            axios.post('{{route('create-comment')}}',{'comment': comment, 'post_id': post_id})
            .then((res) => {
                console.log(res);
                $('#comments-'+post_id).append(res.data.html);
                $('#cc-'+post_id+" > strong").html(res.data.ccounter)
                $('#cv-'+post_id+" > strong").html(res.data.vcounter)
                $('#'+'addc-'+post_id).val('');
            })
        })

        $('.comment-delete').click((e) => {
            e.preventDefault();
            
            var id = $(e.currentTarget).attr('id');
            var comment_id = id.match(/\d/g).join("");
            axios.post('{{route('delete-comment')}}',{'comment_id': comment_id})
            .then((res) => {
                console.log(res);
                $('#'+comment_id).remove();
                $('#cc-'+res.data.post_id+" strong").html(res.data.ccounter)
            })
        })

        $('.delete-post').click((e) => {
            e.preventDefault();
            var id = $(e.currentTarget).attr('id');
            var post_id = id.match(/\d/g).join("");
            axios.post('{{route('delete-post')}}',{'post_id': post_id})
            .then((res) => {
                console.log(res);
                $('#p-c-'+post_id).remove();
            })
        })

        $('.like-post').click((e) => {
            e.preventDefault();
            var id = $(e.currentTarget).attr('id');
            var post_id = id.match(/\d/g).join("");
            axios.post('{{route('delete-post')}}',{'post_id': post_id})
            .then((res) => {
                console.log(res);
                $('#p-c-'+post_id).remove();
            })
        })

    </script>
@endpush