<div class="modal-header">
    <h2 class="modal-title" id="exampleModalCenterTitle">Edit Post</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body editPost" id="{{$post->id}}">
        <form action="#" class="row" id="edit-post" method="post">
            @csrf
            <div class="col-xl-12">
                <div class="submit-field">
                <textarea cols="30" rows="1" name="text" id="textpost" class="with-border" placeholder="What's on your mind, {{Auth::user()->name}} ?">{{$post->content}}</textarea>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="submit-field">
                    <h5>What Tags You Need?</h5>
                    <div class="keywords-container">
                        <div class="keyword-input-container">
                            <input type="text" name ="tags" class="keyword-input with-border" placeholder="Add Tags">
                            <button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                        </div>
                        <div class="keywords-list" style="height: auto;">
                            @foreach ($post->tags as $tag)
                                <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">{{$tag->name}}</span></span>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="col-xl-12">
                <div class="submit-field ">
                    <h5>Choose Attachment Type?</h5>
                    <div class="feedback-yes-no margin-top-0" style="text-align: center">
                        <div class="radio">
                            <input id="none-e" name="radio-e" type="radio" @if ($post->type == "text")
                                checked
                            @endif value="text">
                            <label for="none-e"><span class="radio-label"></span> Text</label>
                        </div>

                        <div class="radio">
                            <input id="images-e" name="radio-e" type="radio" @if ($post->type == "images")
                            checked
                        @endif value="images">
                            <label for="images-e"><span class="radio-label"></span> Images</label>
                        </div>

                        <div class="radio">
                            <input id="documents-e" name="radio-e" type="radio" @if ($post->type == "files")
                            checked
                        @endif value="documents">
                            <label for="documents-e"><span class="radio-label"></span> Documents</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            
        <div class="col-xl-12">
            <div class="submit-field">
                
                <form method="post" action="{{route('upload',['id' => Auth::user()->id, 'type' => 'images','_token' => csrf_token() ])}}" enctype="multipart/form-data" class="dropzone @if($post->type != "images") d-none @endif" id="dropzone-edit-images">
                    <div class="dz-message">
                        <div class="col-xs-12">
                            <div class="message">
                                <p>Drop Images here or Click to Upload</p>
                                <p>Maximum Images are 10</p>
                            </div>
                        </div>
                    </div>
                </form> 
                <span class="invalid-feedback errors-images-e" id="images-e" role="alert">
                    <strong></strong>
                </span>

            </div>
        </div>
        <div class="col-xl-12">
            <div class="submit-field">
                <form method="post" action="{{route('upload',['id' => Auth::user()->id, 'type' => 'files','_token'=>csrf_token() ])}}" enctype="multipart/form-data" class="dropzone @if($post->type != "files") d-none @endif" id="dropzone-edit-files">

                    <div class="dz-message">
                        <div class="col-xs-12">
                            <div class="message">
                                <p>Drop files here or Click to Upload</p>
                                <p>Maximum Files are 10</p>
                            </div>
                        </div>
                    </div>
                </form> 
                <span class="invalid-feedback errors-files-e" id="files-e" role="alert">
                    <strong></strong>
                </span>
            </div>
        </div>
        <span class="invalid-feedback" id="media-e" role="alert">
            <strong></strong>
        </span>
    </div>
    <div class="modal-footer">
    <button type="submit" form="edit-post" class="btn btn-primary">Add Post</button>
    </div>


    