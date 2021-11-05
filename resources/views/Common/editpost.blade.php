<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('images/logo-favicon.png')}}" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title'){{Config('app.name','Blogs')}}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
        <link rel="stylesheet" href={{asset('css/style.css')}}>
        <link rel="stylesheet" href="{{asset('css/colors/blue.css')}}">

        @include('Common.styles')
        <style>
            #footer {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .footer-bottom-section {
                padding: 25px 0;
                border-top: none; 
                text-align: center;
            }
        </style>

        @stack('css')
    </head>
    <body>
            @include('layouts.header')
            <div class="content">
                    <div class="container" style="margin-bottom: 25px;">
                        <div class="row">
                            
                            <!-- Content -->
                            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 margin-bottom-40">
                                
                                    <div class="dashboard-headline margin-top-20 padding-left-20">
                                        <h3>Edit Post</h3>
                                    </div>
                                    <div class="row">
                                        {{-- posts --}}
                                        <div class="col-md-12 col-lg-10 offset-lg-1 edit-post">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalCenterTitle">Edit Post</h2>
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
                                                            
                                                            <form method="post" action="{{route('upload',['id' => Auth::user()->id, 'type' => 'images','_token' => csrf_token() ])}}" enctype="multipart/form-data" class="dropzone" id="dropzone-edit-images" style="@if($post->type != "images") display:none @endif">
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
                                                            <form method="post" action="{{route('upload',['id' => Auth::user()->id, 'type' => 'files','_token'=>csrf_token() ])}}" enctype="multipart/form-data" class="dropzone" id="dropzone-edit-files" style="@if($post->type != "files") display:none @endif">
                                            
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
                                                <div class="modal-footer" style="justify-content: center !important">
                                                    <button type="submit" form="edit-post" class="btn btn-primary">Edit Post</button>
                                                </div>
                                            </div>
                                    </div>
                                        {{--end posts--}}
                                        
                            </div>
                    
                            </div>
                                    
                    </div>
                    <div id="footer">
                        <div class="footer-bottom-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        © 2021 <strong>{{config('app.name','Blogs')}}</strong>. All Rights Reserved.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                   
            
            
            <script src="{{asset('js/app.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
            <script src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="{{asset('js/dropzone.min.js')}}"></script>
            <script src="{{asset('js/mmenu.min.js')}}"></script>
            <script src="{{asset('js/tippy.all.min.js')}}"></script>
            <script src="{{asset('js/simplebar.min.js')}}"></script>
            <script src="{{asset('js/bootstrap-slider.min.js')}}"></script>
            <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
            <script src="{{asset('js/snackbar.js')}}"></script>
            <script src="{{asset('js/clipboard.min.js')}}"></script>
            <script src="{{asset('js/counterup.min.js')}}"></script>
            <script src="{{asset('js/magnific-popup.min.js')}}"></script>
            <script src="{{asset('js/slick.min.js')}}"></script>
            <script src="{{asset('js/custom.js')}}"></script>
           
        <script>
            var post = {!!$post!!}
            var postId = post.id
            var editType = post.type;
            var type = editType
            var counter_e = 0,counter2_e = 0;
            $('body').on('submit','#edit-post',function(e) {
                e.preventDefault();
                var text = $('#textpost').val();
                axios.post('{{route('update-post')}}',{'post_id':postId,'text':text,'type':type}) 
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors[0].text[0]){
                            $('textarea[name="text"]').addClass('is-invalid');
                                $('textarea[name="text"]').parent().append(
                                    '<span id="text" class="invalid-feedback d-block px-2" role="alert">'+
                                            '<strong>'+errors[0].text[0]+'</strong>'+
                                    '</span>'
                            );
                        }
                        if(errors.media){
                            $("#media").css('color','#E74C3C');
                            $(" .invalid-feedback#media").css('display','block');
                            $("#media > strong").html("Not Found Files Uploaded");
                        }
                    }else {
                        window.location.replace('/showpost/?post_id='+res.data.post.id);
                    }
                })
            })

            
            $('body').on('change','input[name="radio-e"]',function () {
                $('span.invalid-feedback > strong').html('');
                if($('input#none-e').prop('checked') == true) {
                    console.log("sdsd");
                    type = "text";
                    if(arr1_e.length > 0) {
                        type = "files";
                        $(".errors-files-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-files-e").css('display','block');
                        $("#files-e > strong").html("Found Files Uploaded");
                        $('input#documents-e').prop('checked',true);
                    }else if (arr_e.length > 0) {
                        type = "images";
                        $(".errors-images-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-images-e").css('display','block');
                        $("#images-e > strong").html("Found Images Uploaded");
                        $('input#images-e').prop('checked',true);
                    } else {
                        console.log("sss")
                        $("#images-e > strong").html("");
                        $("#files-e > strong").html("");
                        $('#dropzone-edit-files').hide();
                        $('#dropzone-edit-images').hide();
                    }
                }
                if($('input#images-e').prop('checked') == true) {
                    console.log(arr1_e.length);
                    type = "files";
                    
                    if(arr1_e.length == 0) {
                        console.log("x")
                        $('#dropzone-edit-files').hide();
                        $('#dropzone-edit-images').show();
                        $("#files-e > strong").html("");
                        $("#dropzone-edit-files > .dz-file-preview").remove();
                        type = "images";
                        counter2_e = 0;
                    } else {
                        $(".errors-files-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-files-e").css('display','block');
                        $("#files-e > strong").html("Found Files Uploaded");
                        $('input#documents-e').prop('checked',true);
                    }
                }
                
                if ($('input#documents-e').prop('checked') == true) {
                    console.log(arr_e.length);
                    type = "images";
                    if(arr_e.length == 0) {
                        type = "files";
                        $('#dropzone-edit-files').show();
                        $('#dropzone-edit-images').hide();
                        $("#images-e> strong").html("");
                        $("#dropzone-edit-images > .dz-file-preview").remove();
                        counter_e = 0;

                    } else {
                        $(".errors-images-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-images-e").css('display','block');
                        $("#images-e> strong").html("Found Images Uploaded");
                        $('input#images-e').prop('checked',true);
                    }           
                } 
                    
                    
            })
            $('body').on('click','#dropzone-edit-images',function() {
                $("#images-e > strong").html("");
            })
            $('#dropzone-edit-files').click(function() {
                $("#files-e > strong").html("");
            })
            var arr_e = [];
            var id = {!! Auth::user()->id!!};
            Dropzone.options.dropzoneEditImages = { 
                
                maxfiles:10,
                parallelUploads: 10,
                thumbnailWidth:"100",
                thumbnailHeight:"100",
                maxFilesize: 500,
                renameFile: function(file) {
                    return file.name.replace(/ /g,'');
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                init: function() { 
                    console.log('editType')
                    if(editType == "images") {
                        myDropzone = this;
                        $.ajax({
                            headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'get',
                            url: '{{route("getfiles")}}',
                            data: {id: id,post_id:postId,'type':'images'},
                            success: function(response){
                                console.log(response);
                                $.each(response, function(key,value) {
                                    $.each(value,function(k,v){
                                        var len =   @json(public_path()).length;
                                        var x=(v.path).slice(len);
                                        var mockFile = { name: v.name, size: v.size};
                                        arr_e.push(v.name);
                                        myDropzone.emit("addedfile", mockFile);
                                        myDropzone.emit("thumbnail", mockFile, x);
                                        myDropzone.emit("complete", mockFile);
                                        counter_e++;

                                    });
                                });
                            }
                        });
                    }
                },
                accept: function(file, done) {

                    console.log(file.name);
                    counter_e++;
                    if(counter_e <=10 && $.inArray(file.name,arr_e) == -1)
                    {  
                        arr_e.push(file.name);
                        done();
                        $(".dz-message").css('display','none')
                    }else{
                    if(counte-er >10) 
                    {   
                        $(".errors-images-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-images-e").css('display','block');
                        $("#images-e > strong").html("Maximum Number");
                    }
                    else if ($.inArray(file.name,arr_e) > -1){
                        $(".errors-images-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-images-e").css('display','block');
                        $("#images-e > strong").html("file is added before");
                    
                    }
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    counter_e--;
                }
                },
                removedfile: function(file) 
                {
                    console.log(file.name)
                    var name = file.name;
                    

                    //console.log(id);
                    $.ajax({
                        headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                        type: 'POST',
                        url: '{{ url("/deletefiles") }}',
                        data: {data: name ,id: id,'type':'images'},
                        success: function (data){
                            console.log(data);
                            console.log("File has been successfully removed!!");
                            arr_e.splice( arr_e.indexOf(name), 1 );
                            counter_e--;
                            console.log(counter_e);
                            if(counter_e == 0)
                                $(".dz-message").css('display','block')
                        },
                        error: function(e) {
                            console.log(error);
                        }
                    });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ? 
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                        
                },
        
                success: function(file, response) 
                {
                    //
                    console.log(arr_e);
                    //console.log(response);
                },
                error: function(file, response)
                {
                    $(".errors-images-e").css('color','#E74C3C');
                    $(".invalid-feedback.errors-images-e").css('display','block');
                    $("#images-e > strong").html(response);
                    
                file.previewElement.parentNode.removeChild(file.previewElement);
                if(counter_e == 0)
                        $(".dz-message").css('display','block')
                },

            };

            var arr1_e = [];
            Dropzone.options.dropzoneEditFiles = { 
                
                maxfiles:10,
                parallelUploads: 10,
                thumbnailWidth:"100",
                thumbnailHeight:"100",
                maxFilesize: 500,
                renameFile: function(file) {
                    return file.name.replace(/ /g,'');
                },
                acceptedFiles: ".ppt,.docx,.pdf,.txt,.xls",
                addRemoveLinks: true,
                timeout: 50000,
                init: function() { 
                    console.log(editType)
                    if(editType == "files") {
                        myDropzone = this;
                        $.ajax({
                            headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                            type: 'get',
                            url: '{{route("getfiles")}}',
                            data: {id: id,post_id:postId,'type':'files'},
                            success: function(response){
                                console.log(response);
                                $.each(response, function(key,value) {
                                    $.each(value,function(k,v){
                                        var len =   @json(public_path()).length;
                                        var x=(v.path).slice(len);
                                        var mockFile = { name: v.name, size: v.size};
                                        arr1_e.push(v.name);
                                        myDropzone.emit("addedfile", mockFile);
                                        myDropzone.emit("thumbnail", mockFile, x);
                                        myDropzone.emit("complete", mockFile);
                                        counter2_e++;

                                    });
                                });
                            }
                        });
                    }
                },
                accept: function(file, done) {

                    console.log(file.name);
                    counter2_e++;
                    if(counter2_e <=10 && $.inArray(file.name,arr1_e) == -1)
                    {  
                        arr1_e.push(file.name);
                        done();
                        $(".dz-message").css('display','none')
                    }else{
                    if(counter2_e >10) 
                    {   
                        $(".errors-files-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-files-e").css('display','block');
                        $("#files-e > strong").html("Maximum Number");
                    }
                    else if ($.inArray(file.name,arr1_e) > -1){
                        $(".errors-files-e").css('color','#E74C3C');
                        $(".invalid-feedback.errors-files-e").css('display','block');
                        $("#files-e > strong").html("file is added before");
                    
                    }
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    counter2_e--;
                }
                },
                removedfile: function(file) 
                {
                    var name = file.name;
                    

                    //console.log(id);
                    $.ajax({
                        headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                        type: 'POST',
                        url: '{{ url("/deletefiles") }}',
                        data: {data: name ,id: id,'type':'files'},
                        success: function (data){
                            console.log(data);
                            console.log("File has been successfully removed!!");
                            arr1_e.splice( arr1_e.indexOf(name), 1 );
                            counter2_e--;
                            if(counter2_e == 0)
                                $(".dz-message").css('display','block')
                        },
                        error: function(e) {
                            console.log(error);
                        }
                    });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ? 
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                        
                },
        
                success: function(file, response) 
                {
                    //
                    console.log(arr1_e);
                    //console.log(response);
                },
                error: function(file, response)
                {
                    $(".errors-files-e").css('color','#E74C3C');
                    $(".invalid-feedback.errors-files-e").css('display','block');
                    $("#files-e > strong").html(response);
                    
                file.previewElement.parentNode.removeChild(file.previewElement);
                if(counter2_e == 0)
                    $(".dz-message").css('display','block')
                },

            };
        </script>    
        
        @stack('js')

    </body>
</html>







