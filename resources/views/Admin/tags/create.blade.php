
        var postId = "";
        var editType = "";
        // $('body').on('click','.edit-post',(e) => {
        //     e.preventDefault();
        //     var id = $(e.currentTarget).attr('id');
        //     postId = id.match(/\d/g).join("");
        //     if($('#m-e-p-'+postId).css('display') == "none") {
        //         axios.post('{{route('edit-post')}}',{'post_id': postId})
        //         .then((res) => {
        //             console.log(res);
        //             editType = res.data.type
        //             if(editType == 'text') {
        //                 $('#m-e-p-'+postId+'#dropzone-edit-files').hide();
        //                 $('#m-e-p-'+postId+'#dropzone-edit-images').hide();
        //             } else if (editType == 'images') {
        //                 $('#m-e-p-'+postId+'#dropzone-edit-files').hide();
        //                 $('#m-e-p-'+postId+'#dropzone-edit-images').show();
        //             } else {
        //                 $('#m-e-p-'+postId+'#dropzone-edit-files').show();
        //                 $('#m-e-p-'+postId+'#dropzone-edit-images').hide();
        //             }
        //             //$('.m-edit-post > *').remove();
        //             //$('.m-edit-post').append(res.data.html);
        //             $('#m-e-p-'+postId).modal('show');
        //                 $('.modal-backdrop').show();
        //         })
        //     }
        // })
            // var counter_e = 0,counter2_e = 0;
            // var editType;
            // $('body').on('submit','#m-e-p-'+postId+' #edit-post',function(e) {
            //     e.preventDefault();
            //     var text = $('#m-e-p-'+postId+' #textpost').val();
            //     console.log(type);
            //     var tags = [];
            //     $.each($('#m-e-p-'+postId+' .keyword-text'), function(index , element){
            //         tags.push($(element).text());
            //     })
            //     axios.post('{{route('update-post')}}',{'tags':tags,'text':text,'type':type}) 
            //     .then((res) => {
            //         console.log(res)
            //         var errors = res.data.errors;
            //         if(errors) {
            //             console.log(errors)
            //             if(errors[0].text[0]){
            //                 $('#m-e-p-'+postId+' textarea[name="text"]').addClass('is-invalid');
            //                     $('#m-e-p-'+postId+' textarea[name="text"]').parent().append(
            //                         '<span id="text" class="invalid-feedback d-block px-2" role="alert">'+
            //                                 '<strong>'+errors[0].text[0]+'</strong>'+
            //                         '</span>'
            //                 );
            //             }
            //             if(errors[0].tags[0]){
            //                 messageError('tags',errors[0].tags[0]);
            //             }
            //             if(errors.media){
            //                 $('#m-e-p-'+postId+" #media").css('color','#E74C3C');
            //                 $'#m-e-p-'+postId+(" .invalid-feedback#media").css('display','block');
            //                 $('#m-e-p-'+postId+" #media > strong").html("Not Found Files Uploaded");
            //             }
            //         }else {
            //             $('#m-e-p-'+postId).modal('hide');
            //             $('.modal-backdrop').hide();
            //             //edit
            //             $('.posts-comments').prepend(res.data.html);
            //         // window.location.replace("{{route('home')}}");
            //         }
            //     })
            // })

            
            // $('body').on('change','m-edit-post input[name="radio-e"]',function () {
            //     $('span.invalid-feedback > strong').html('');
            //     if($('m-edit-post input#none-e').prop('checked') == true) {
            //         console.log("sdsd");
            //         type = "text";
            //         if(arr1.length > 0) {
            //             type = "files";
            //             $("m-edit-post .errors-files-e").css('color','#E74C3C');
            //             $("m-edit-post .invalid-feedback.errors-files-e").css('display','block');
            //             $("m-edit-post #files-e > strong").html("Found Files Uploaded");
            //             $('m-edit-post input#documents-e').prop('checked',true);
            //         }else if (arr.length > 0) {
            //             type = "images";
            //             $("m-edit-post .errors-images-e").css('color','#E74C3C');
            //             $("m-edit-post .invalid-feedback.errors-images-e").css('display','block');
            //             $("m-edit-post #images-e > strong").html("Found Images Uploaded");
            //             $('m-edit-post input#images-e').prop('checked',true);
            //         } else {
            //             console.log("sss")
            //             $("m-edit-post #images-e > strong").html("");
            //             $("m-edit-post #files-e > strong").html("");
            //             $('m-edit-post #dropzone-edit-files').hide();
            //             $('m-edit-post #dropzone-edit-images').hide();
            //         }
            //     }
            //     if($('m-edit-post input#images-e').prop('checked') == true) {
            //         console.log("xxx");
            //         type = "files";
            //         if(arr1.length == 0) {
            //             $('#dropzone-edit-files').hide();
            //             $('#dropzone-edit-images').show();
            //             $("m-edit-post #files-e > strong").html("");
            //             $("#dropzone-edit-files > .dz-file-preview").remove();
            //             type = "images";
            //             counter2 = 0;
            //         } else {
            //             $("m-edit-post .errors-files-e").css('color','#E74C3C');
            //             $("m-edit-post .invalid-feedback.errors-files-e").css('display','block');
            //             $("m-edit-post #files-e > strong").html("Found Files Uploaded");
            //             $('m-edit-post input#documents-e').prop('checked',true);
            //         }
            //     }
                
            //     if ($('m-edit-post input#documents-e').prop('checked') == true) {
            //         console.log("mmm");
            //         type = "images";
            //         if(arr.length == 0) {
            //             type = "files";
            //             $('#dropzone-edit-files').show();
            //             $('#dropzone-edit-images').hide();
            //             $("m-edit-post #images-e> strong").html("");
            //             $("#dropzone-edit-images > .dz-file-preview").remove();
            //             counter = 0;

            //         } else {
            //             $("m-edit-post .errors-images-e").css('color','#E74C3C');
            //             $("m-edit-post .invalid-feedback.errors-images-e").css('display','block');
            //             $("m-edit-post #imagess-e> strong").html("Found Images Uploaded");
            //             $('m-edit-post input#images-e').prop('checked',true);
            //         }           
            //     } 
                    
                    
            // })
            // $('body').on('click','#dropzone-edit-images',function() {
            //     $("#images-e > strong").html("");
            // })
            // $('#dropzone-edit-files').click(function() {
            //     $("#files-e > strong").html("");
            // })
            // var arr_e = [];
            // var id = {!! Auth::user()->id!!};
            // Dropzone.options.dropzoneEditImages = { 
                
            //     maxfiles:10,
            //     parallelUploads: 10,
            //     thumbnailWidth:"100",
            //     thumbnailHeight:"100",
            //     maxFilesize: 500,
            //     renameFile: function(file) {
            //         return file.name.replace(/ /g,'');
            //     },
            //     acceptedFiles: ".jpeg,.jpg,.png,.gif",
            //     addRemoveLinks: true,
            //     timeout: 50000,
            //     init: function() { 
            //         console.log('editType')
            //         if(editType == "images") {
            //             myDropzone = this;
            //             $.ajax({
            //                 headers: {
            //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                         },
            //                         type: 'get',
            //                 url: '{{route("getfiles")}}',
            //                 data: {id: id,post_id:postId,'type':'images'},
            //                 success: function(response){
            //                     console.log(response);
            //                     $.each(response, function(key,value) {
            //                         $.each(value,function(k,v){
            //                             var len = public_path.length;
            //                             var x=(v.path).slice(len);
            //                             var p = windows.location(x);
            //                             var mockFile = { name: v.name, size: v.size};
            //                             arr.push(v.name);
            //                             myDropzone.emit("addedfile", mockFile);
            //                             myDropzone.emit("thumbnail", mockFile, p);
            //                             myDropzone.emit("complete", mockFile);
            //                             counter++;

            //                         });
            //                     });
            //                 }
            //             });
            //         }
            //     },
            //     accept: function(file, done) {

            //         console.log(file.name);
            //         counter_e++;
            //         if(counter_e <=10 && $.inArray(file.name,arr_e) == -1)
            //         {  
            //             arr_e.push(file.name);
            //             done();
            //             $(".dz-message").css('display','none')
            //         }else{
            //         if(counte-er >10) 
            //         {   
            //             $(".errors-images-e").css('color','#E74C3C');
            //             $(".invalid-feedback.errors-images-e").css('display','block');
            //             $("#images-e > strong").html("Maximum Number");
            //         }
            //         else if ($.inArray(file.name,arr_e) > -1){
            //             $(".errors-images-e").css('color','#E74C3C');
            //             $(".invalid-feedback.errors-images-e").css('display','block');
            //             $("#images-e > strong").html("file is added before");
                    
            //         }
            //         file.previewElement.parentNode.removeChild(file.previewElement);
            //         counter_e--;
            //     }
            //     },
            //     removedfile: function(file) 
            //     {
            //         var name = file.upload.filename;
                    

            //         //console.log(id);
            //         $.ajax({
            //             headers: {
            //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                     },
            //             type: 'POST',
            //             url: '{{ url("/deletefiles") }}',
            //             data: {data: name ,id: id,'type':'images'},
            //             success: function (data){
            //                 console.log(data);
            //                 console.log("File has been successfully removed!!");
            //                 arr_e.splice( arr_e.indexOf(name), 1 );
            //                 counter_e--;
            //                 console.log(counter_e);
            //                 if(counter_e == 0)
            //                     $(".dz-message").css('display','block')
            //             },
            //             error: function(e) {
            //                 console.log(error);
            //             }
            //         });
            //             var fileRef;
            //             return (fileRef = file.previewElement) != null ? 
            //             fileRef.parentNode.removeChild(file.previewElement) : void 0;
                        
            //     },
        
            //     success: function(file, response) 
            //     {
            //         //
            //         console.log(arr_e);
            //         //console.log(response);
            //     },
            //     error: function(file, response)
            //     {
            //         $(".errors-images-e").css('color','#E74C3C');
            //         $(".invalid-feedback.errors-images-e").css('display','block');
            //         $("#images-e > strong").html(response);
                    
            //     file.previewElement.parentNode.removeChild(file.previewElement);
            //     if(counter_e == 0)
            //             $(".dz-message").css('display','block')
            //     },

            // };

            // var arr1_e = [];
            // Dropzone.options.dropzoneEditFiles = { 
                
            //     maxfiles:10,
            //     parallelUploads: 10,
            //     thumbnailWidth:"100",
            //     thumbnailHeight:"100",
            //     maxFilesize: 500,
            //     renameFile: function(file) {
            //         return file.name.replace(/ /g,'');
            //     },
            //     acceptedFiles: ".ppt,.docx,.pdf,.txt,.xls",
            //     addRemoveLinks: true,
            //     timeout: 50000,
            //     init: function() { 
            //         console.log(editType)
            //         if(editType == "files") {
            //             myDropzone = this;
            //             $.ajax({
            //                 headers: {
            //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                         },
            //                 type: 'get',
            //                 url: '{{route("getfiles")}}',
            //                 data: {id: id,post_id:postId,'type':'files'},
            //                 success: function(response){
            //                     console.log(response);
            //                     $.each(response, function(key,value) {
            //                         $.each(value,function(k,v){
            //                             var len = public_path.length;
            //                             var x=(v.path).slice(len);
            //                             var p = windows.location(x);
            //                             var mockFile = { name: v.name, size: v.size};
            //                             arr.push(v.name);
            //                             myDropzone.emit("addedfile", mockFile);
            //                             myDropzone.emit("thumbnail", mockFile, p);
            //                             myDropzone.emit("complete", mockFile);
            //                             counter++;

            //                         });
            //                     });
            //                 }
            //             });
            //         }
            //     },
            //     accept: function(file, done) {

            //         console.log(file.name);
            //         counter2_e++;
            //         if(counter2_e <=10 && $.inArray(file.name,arr1_e) == -1)
            //         {  
            //             arr1_e.push(file.name);
            //             done();
            //             $(".dz-message").css('display','none')
            //         }else{
            //         if(counter2_e >10) 
            //         {   
            //             $(".errors-files-e").css('color','#E74C3C');
            //             $(".invalid-feedback.errors-files-e").css('display','block');
            //             $("#files-e > strong").html("Maximum Number");
            //         }
            //         else if ($.inArray(file.name,arr1_e) > -1){
            //             $(".errors-files-e").css('color','#E74C3C');
            //             $(".invalid-feedback.errors-files-e").css('display','block');
            //             $("#files-e > strong").html("file is added before");
                    
            //         }
            //         file.previewElement.parentNode.removeChild(file.previewElement);
            //         counter2_e--;
            //     }
            //     },
            //     removedfile: function(file) 
            //     {
            //         var name = file.upload.filename;
                    

            //         //console.log(id);
            //         $.ajax({
            //             headers: {
            //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                     },
            //             type: 'POST',
            //             url: '{{ url("/deletefiles") }}',
            //             data: {data: name ,id: id,'type':'files'},
            //             success: function (data){
            //                 console.log(data);
            //                 console.log("File has been successfully removed!!");
            //                 arr1_e.splice( arr1_e.indexOf(name), 1 );
            //                 counter2_e--;
            //                 if(counter2_e == 0)
            //                     $(".dz-message").css('display','block')
            //             },
            //             error: function(e) {
            //                 console.log(error);
            //             }
            //         });
            //             var fileRef;
            //             return (fileRef = file.previewElement) != null ? 
            //             fileRef.parentNode.removeChild(file.previewElement) : void 0;
                        
            //     },
        
            //     success: function(file, response) 
            //     {
            //         //
            //         console.log(arr1_e);
            //         //console.log(response);
            //     },
            //     error: function(file, response)
            //     {
            //         $(".errors-files-e").css('color','#E74C3C');
            //         $(".invalid-feedback.errors-files-e").css('display','block');
            //         $("#files-e > strong").html(response);
                    
            //     file.previewElement.parentNode.removeChild(file.previewElement);
            //     if(counter2_e == 0)
            //             $(".dz-message").css('display','block')
            //     },

            // };