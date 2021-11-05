@push('css')
    <style>
        .add {
            text-align: center;
            display: block !important;
            width: 184px;
            margin: 0 auto 40px !important;
            border-radius: 27px !important;
        }
    </style>
@endpush




<a class="nav-link button ripple-effect big margin-bottom-10 add" href="javascript:void(0)" data-dismiss="modal"
    data-toggle="modal" data-target="#modal-add-post">
        <i class="icon-feather-plus"></i>    
        <span>Add Post</span>
</a>
<hr>
<div class="dashboard-headline margin-top-20 padding-left-20">
    <h3>Posts</h3>
</div>
<div class="row">
    {{-- posts --}}
    <div class="col-md-12 col-lg-10 offset-lg-1 posts-comments">
        @include('Common.Posts-comments')
    </div>
    {{--end posts--}}
    
</div>

@section('modal')
<div class="modal fade" id="modal-add-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalCenterTitle">Add Post</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" class="row" id="create-post" method="post">
                @csrf
                <div class="col-xl-12">
                    <div class="submit-field">
                    <textarea cols="30" rows="1" name="text" id="textpost" class="with-border" placeholder="What's on your mind, {{Auth::user()->name}} ?"></textarea>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="submit-field ">
                        <h5>Choose Attachment Type?</h5>
                        <div class="feedback-yes-no margin-top-0" style="text-align: center">
                            <div class="radio">
                                <input id="none" name="radio" type="radio" checked value="text">
                                <label for="none"><span class="radio-label"></span> Text</label>
                            </div>

                            <div class="radio">
                                <input id="images" name="radio" type="radio" value="images">
                                <label for="images"><span class="radio-label"></span> Images</label>
                            </div>

                            <div class="radio">
                                <input id="documents" name="radio" type="radio" value="documents">
                                <label for="documents"><span class="radio-label"></span> Documents</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                
            <div class="col-xl-12">
                <div class="submit-field">
                    <form method="post" action="{{route('upload',['id' => Auth::user()->id, 'type' => 'images','_token' => csrf_token() ])}}" enctype="multipart/form-data" class="dropzone" id="dropzone-images">
                        <div class="dz-message">
                            <div class="col-xs-12">
                                <div class="message">
                                    <p>Drop Images here or Click to Upload</p>
                                    <p>Maximum Images are 10</p>
                                </div>
                            </div>
                        </div>
                    </form> 
                    <span class="invalid-feedback errors-images" id="images" role="alert">
                        <strong></strong>
                    </span>

                </div>
            </div>
            <div class="col-xl-12">
                <div class="submit-field">
                    <form method="post" action="{{route('upload',['id' => Auth::user()->id, 'type' => 'files','_token'=>csrf_token() ])}}" enctype="multipart/form-data" class="dropzone" id="dropzone-files">

                        <div class="dz-message">
                            <div class="col-xs-12">
                                <div class="message">
                                    <p>Drop files here or Click to Upload</p>
                                    <p>Maximum Files are 10</p>
                                </div>
                            </div>
                        </div>
                    </form> 
                    <span class="invalid-feedback errors-files" id="files" role="alert">
                        <strong></strong>
                    </span>
                </div>
            </div>
            <span class="invalid-feedback" id="media" role="alert">
                <strong></strong>
            </span>
        </div>
        <div class="modal-footer">
          <button type="submit" form="create-post" class="btn btn-primary">Add Post</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script>
        $('#searching').submit((e) => {
            e.preventDefault();
            axios.get('{{route('search-post')}}')
            .then((res) => {
                console.log(res.data.html);
                $('.posts-comments > *').remove();
                $('.posts-comments').append(res.data.html);
            })
        })
    </script>
    <script>
         $('#modal-add-post').on('show.bs.modal', (e) =>{
            $(e.target).find('input.is-invalid').removeClass('is-invalid');
            $(e.target).find('span.invalid-feedback#text').remove();
            $(e.target).find('span.invalid-feedback > strong').html('');
            $(e.target).find('input').val('');
            $(e.target).find('textarea').val('');
            $("#dropzone-images > .dz-preview").remove();
            $("#dropzone-files > .dz-preview").remove();
            $('#dropzone-files').hide();
            $('#dropzone-images').hide();
            $('.dz-message').css('display','block');           
            $(e.target).find('input#text').prop('checked',true);
            counter = 0;
            counter2 = 0;
            arr = [];
            arr1 = [];

        })
        $('textarea[name=text]').on('click',(e) => {
            if( $('textarea[name=text]').hasClass('is-invalid')) {
                $('textarea[name=text]').removeClass('is-invalid');
                $('span.invalid-feedback#text').remove();

            }
            
        })
        function messageError(errorName,message) {
            $('input[name='+errorName+']').addClass('is-invalid');
                $('input[name='+errorName+']').parent().append(
                    '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                            '<strong>'+message+'</strong>'+
                    '</span>'
            );
        } 
        var counter = 0,counter2 = 0;
        var type = "text";
        $('#create-post').submit(function(e) {
            e.preventDefault();
            var text = $('#textpost').val();
            console.log(type);
        
            axios.post('{{route('create-post')}}',{'text':text,'type':type}) 
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
                        $(".invalid-feedback#media").css('display','block');
                        $("#media > strong").html("Not Found Files Uploaded");
                    }
                }else {
                    $('#modal-add-post').modal('hide');
                    $('.modal-backdrop').hide();
                    $('.posts-comments').prepend(res.data.html);
                   // window.location.replace("{{route('home')}}");
                }
            })
        })

        $('#dropzone-files').hide();
        $('#dropzone-images').hide(); 
        $('input[name="radio"]').on('change',function () {
            $('span.invalid-feedback > strong').html('');
            if($('input#none').prop('checked') == true) {
                console.log("sdsd");
                type = "text";
                if(arr1.length > 0) {
                    type = "files";
                    $(".errors-files").css('color','#E74C3C');
                    $(".invalid-feedback.errors-files").css('display','block');
                    $("#files > strong").html("Found Files Uploaded");
                    $('input#documents').prop('checked',true);
                }else if (arr.length > 0) {
                    type = "images";
                    $(".errors-images").css('color','#E74C3C');
                    $(".invalid-feedback.errors-images").css('display','block');
                    $("#images > strong").html("Found Images Uploaded");
                    $('input#images').prop('checked',true);
                } else {
                    console.log("sss")
                    $("#images > strong").html("");
                    $("#files > strong").html("");
                    $('#dropzone-files').hide();
                    $('#dropzone-images').hide();
                }
            }
            if($('input#images').prop('checked') == true) {
                console.log("xxx");
                type = "files";
                if(arr1.length == 0) {
                    $('#dropzone-files').hide();
                    $('#dropzone-images').show();
                    $("#files > strong").html("");
                    $("#dropzone-files > .dz-file-preview").remove();
                    type = "images";
                    counter2 = 0;
                } else {
                    $(".errors-files").css('color','#E74C3C');
                    $(".invalid-feedback.errors-files").css('display','block');
                    $("#files > strong").html("Found Files Uploaded");
                    $('input#documents').prop('checked',true);
                }
            }
               
            if ($('input#documents').prop('checked') == true) {
                console.log("mmm");
                type = "images";
                 if(arr.length == 0) {
                     type = "files";
                    $('#dropzone-files').show();
                    $('#dropzone-images').hide();
                    $("#images > strong").html("");
                    $("#dropzone-images > .dz-file-preview").remove();
                    counter = 0;

                } else {
                    $(".errors-images").css('color','#E74C3C');
                    $(".invalid-feedback.errors-images").css('display','block');
                    $("#images > strong").html("Found Images Uploaded");
                    $('input#images').prop('checked',true);
                }           
            } 
                
                
        })
        $('#dropzone-images').click(function() {
            $("#images > strong").html("");
        })
        $('#dropzone-files').click(function() {
            $("#files > strong").html("");
        })
        var arr = [];
        var id = {!! Auth::user()->id!!};
        Dropzone.options.dropzoneImages = { 
            
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
            
            accept: function(file, done) {

                console.log(file.name);
                counter++;
                if(counter <=10 && $.inArray(file.name,arr) == -1)
                {  
                    arr.push(file.name);
                    done();
                    $(".dz-message").css('display','none')
                }else{
                if(counter >10) 
                {   
                    $(".errors-images").css('color','#E74C3C');
                    $(".invalid-feedback.errors-images").css('display','block');
                    $("#images > strong").html("Maximum Number");
                }
                else if ($.inArray(file.name,arr) > -1){
                    $(".errors-images").css('color','#E74C3C');
                    $(".invalid-feedback.errors-images").css('display','block');
                    $("#images > strong").html("file is added before");
                
                }
                file.previewElement.parentNode.removeChild(file.previewElement);
                counter--;
              }
            },
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                

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
                        arr.splice( arr.indexOf(name), 1 );
                        counter--;
                        console.log(counter);
                        if(counter == 0)
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
                console.log(arr);
                //console.log(response);
            },
            error: function(file, response)
            {
                $(".errors-images").css('color','#E74C3C');
                $(".invalid-feedback.errors-images").css('display','block');
                $("#images > strong").html(response);
                
               file.previewElement.parentNode.removeChild(file.previewElement);
               if(counter == 0)
                    $(".dz-message").css('display','block')
            },

        };

        var arr1 = [];
        Dropzone.options.dropzoneFiles = { 
            
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
            
             accept: function(file, done) {

                console.log(file.name);
                counter2++;
                if(counter2 <=10 && $.inArray(file.name,arr1) == -1)
                {  
                    arr1.push(file.name);
                    done();
                    $(".dz-message").css('display','none')
                }else{
                if(counter2 >10) 
                {   
                    $(".errors-files").css('color','#E74C3C');
                    $(".invalid-feedback.errors-files").css('display','block');
                    $("#files > strong").html("Maximum Number");
                }
                else if ($.inArray(file.name,arr1) > -1){
                    $(".errors-files").css('color','#E74C3C');
                    $(".invalid-feedback.errors-files").css('display','block');
                    $("#files > strong").html("file is added before");
                
                }
                file.previewElement.parentNode.removeChild(file.previewElement);
                counter2--;
              }
            },
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                

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
                        arr1.splice( arr1.indexOf(name), 1 );
                        counter2--;
                        console.log(counter);
                        if(counter2 == 0)
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
                console.log(arr1);
                //console.log(response);
            },
            error: function(file, response)
            {
                $(".errors-files").css('color','#E74C3C');
                $(".invalid-feedback.errors-files").css('display','block');
                $("#files > strong").html(response);
                
               file.previewElement.parentNode.removeChild(file.previewElement);
               if(counter2 == 0)
                    $(".dz-message").css('display','block')
            },

        };
    </script>
@endpush