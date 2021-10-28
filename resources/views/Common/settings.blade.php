@push('css')
<style>
    .wrapper{
        padding: 5px;
        text-align: center;
        color: #495057;
        border: 3px solid #CED4DA;
        border-radius: 0.625rem;
        height: 60%;
        position: relative;
    }
    .wrapper h2{
        padding-bottom: 5px;
    }
    .wrapper #file-input{
        display:none;
    }
    .wrapper label {
        display: flex;
        font-weight: bold;
        font-size: 16px;
        font-weight: normal;
        height: 97%;
        width: 97%;
        position: absolute;
        top: 0;
        justify-content: center;
        align-items: center;
    } 
    .wrapper label[for='file-input'] *{
        vertical-align:middle;
        cursor:pointer;

    }

    .wrapper label[for='file-input'] span{
        margin-left: 10px
    }

    .wrapper i.remove{
        vertical-align:middle;
        margin-left: 5px;
        cursor:pointer;
        display:none;
    }
</style>
@endpush







<!-- Dashboard Headline -->
<div class="dashboard-headline">
    <h3>Settings</h3>
</div>

<!-- Row -->
<div class="row">
    <form id="edit" action="settings/edit" method="post" class="col-xl-12" enctype="multipart/form-data">
        @csrf
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                </div>

                <div class="content with-padding padding-bottom-0">

                    <div class="row">

                        <div class="col-6">
                            <div class="wrapper">
                                <h2>Upload Profile Picture 300*300</h2>
                                <input type="file" id="file-input" name="image">
                                <label for="file-input" >
                                    <i class="fa fa-paperclip fa-2x"></i>
                                    <span></span>
                                </label>
                                <i class="fa fa-times-circle remove"></i>
                            </div>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-6">
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Name</h5>
                                        <input type="text" name="name" class="with-border" value="{{Auth::user()->name}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Email</h5>
                                        <input type="text" name="email" class="with-border" value="{{Auth::user()->email}}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div id="test1" class="dashboard-box">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
                </div>

                <div class="content with-padding">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>New Password</h5>
                                <input type="password" name="password" class="with-border">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="submit-field">
                                <h5>Repeat New Password</h5>
                                <input type="password" name="confirm_password" class="with-border">
                                @if ($errors->has('confirm_password'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Button -->
    <div class="col-xl-12">
        <button type="submit" form="edit"  class="button ripple-effect big margin-top-30">Save Changes</button>
    </div>

</div>
<!-- Row / End -->

@push('js')
<script>
    var $file = $('#file-input'),
    $label = $file.next('label'),
    $labelText = $label.find('span'),
    $labelRemove = $('i.remove'),
    labelDefault = $labelText.text();

    // on file change
    $file.on('change', function(event){
    //console.log(event.target);
    var fileName = $file.val().split( '\\' ).pop();

    if( fileName ){
            //console.log($file)
            $labelText.text(fileName);
            $labelRemove.show();
    }else{
        $labelText.text(labelDefault);
        $labelRemove.hide();
    }

    if($file.hasClass('is-invalid')) {
        //console.log($file);
        $file.removeClass('is-invalid');
        $('#'+$file.attr('name')).remove();
    }
    });

    // Remove file   
    $labelRemove.on('click', function(event){
    $file.val("");
    $labelText.text(labelDefault);
    $labelRemove.hide();
    //console.log($file)
    });
</script>
@endpush

