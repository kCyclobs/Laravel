@extends('admin.template')

@section('content')
<head>
    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <!-- Include jQuery Loading Overlay Plugin if needed -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
</head>

@if ($message = Session::get('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $message }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
@if ($message = Session::get('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: '{{ $message }}',
                confirmButtonText: 'Retry'
            });
        });
    </script>
@endif
<div class="col-12">
    <div class="row">
        @if($message = Session::get('error'))
            <div style="color: red" class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>
</div>
    <!-- profile -->
    <div class="col-12">
        <div class="profile__content">
            <!-- profile user -->
            <div class="profile__user">
                <div class="profile__avatar">
                    <img src="{{ Auth::user()->profile ? url('profile/' . Auth::user()->profile) : url('img/user.svg') }}" alt="" id="update_profile_pic">
                    {{-- src="{{ url('profile/'. Auth::user()->profile )}}" --}}
                    <input type="file" id="FileUpload1" style="display: none" />
                </div>
                <!-- or red -->
                <div class="profile__meta profile__meta--green">
                    
                    <h3>{{ Auth::user()->name}} 
                        <span>({{ (Auth::user()->status) ? 'Approved' : 'Block'}})</span>
                    </h3>
                    <span>FlixTV ID: {{ Auth::user()->id}} </span>
                </div>
            </div>
            <!-- end profile user -->

            <!-- profile tabs nav -->
            <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a>
                </li>

            </ul>
            <!-- end profile tabs nav -->

            <!-- profile mobile tabs nav -->
            <div class="profile__mobile-tabs" id="profile__mobile-tabs">
                <div class="profile__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <input type="button" value="Profile">
                    <span></span>
                </div>

                <div class="profile__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a></li>

                        <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comments</a></li>

                        <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews</a></li>
                    </ul>
                </div>
            </div>
            <!-- end profile mobile tabs nav -->
    
                <!-- profile btns -->
            <div class="profile__actions">
                <a href="#modal-status3" class="profile__action profile__action--banned open-modal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"/></svg></a>
                <a href="#modal-delete3" class="profile__action profile__action--delete open-modal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg></a>
            </div>
                <!-- end profile btns -->
        </div>
    </div>
     <!-- end profile -->

     <!-- content tabs -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
            <div class="col-12">
                <div class="sign__wrap">
                    <div class="row">
                        <!-- details form -->
                        <div class="col-12 col-lg-6">
                            <form action="{{ route('save') }}" method="POST"  class="sign__form sign__form--profile sign__form--first">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="sign__title">Profile details</h4>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="name">Login</label>
                                            <input id="name" type="text" name="name" class="sign__input" value="{{ Auth::User()->name }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="email">Email</label>
                                            <input id="email" type="text" name="email" class="sign__input" value="{{ Auth::User()->email }}" readonly>
                                        </div>
                                    </div>

                                    

                                    
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="subscription">Subscription</label>
                                            <input id="subscription" type="text" name="subscription" class="sign__input" value="Basic" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="rights">Rights</label>
                                            <input id="rights" type="text" name="rights" class="sign__input" value="User" readonly>
                                        </div>
                                    </div>

                                    {{-- <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="subscription">Subscription</label>
                                            <select class="js-example-basic-single" id="subscription">
                                                <option value="Basic">Basic</option>
                                               <option value="Premium">Premium</option>
                                                
                                            </select>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="rights">Rights</label>
                                            <select class="js-example-basic-single" id="rights">
                                                <option value="User">User</option>
                                            
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="col-12">
                                        <button class="sign__btn" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end details form -->

                        <!-- password form -->
                        <div class="col-12 col-lg-6" id="changePassword">
                            <form method="POST" action="{{ route('password.update') }}"  class="sign__form sign__form--profile" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="sign__title">Change password</h4>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="current_password">Old password</label>
                                            <input  id="current_password" type="password" name="current_password" class="sign__input" required autofocus autocomplete="current-password">
                                        </div>
                                        @error('current_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="new_password">New password</label>
                                            <input id="new_password" type="password" name="new_password" class="sign__input" required autocomplete="new-password">
                                        </div>
                                        @error('new_password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="new_password_confirmation">Confirm new password</label>
                                            <input id="new_password_confirmation" type="password" name="new_password_confirmation" class="sign__input" required autocomplete="new-password">
                                        </div>
                                        @error('new_password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="sign__btn" type="submit">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end password form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content tabs -->



<script>
    let fileupload = $("#FileUpload1");
    let image = $("#update_profile_pic");

    image.click(function() {
        fileupload.click();
    });
    fileupload.change(function(e) {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                image.attr("src", event.target.result);
            };
            //console.log(file);
            reader.readAsDataURL(file);
        }
        let form = new FormData();
        form.append('image', file);
        $.ajax({
            url:"/profile/upload",
            method:"POST",
            headers: {
            'X-CSRF-Token' : '{{csrf_token()}}',
            },
            dataType:'JSON',
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            success:function(response) {
                console.log("Success: " + response.message);
            },
            error: function(response) {
                console.log("error: " + response.message);
            }
        })
    });
</script>
{{-- <script type="text/javascript" src="{{asset('js/profile.js')}}"></script> --}}
{{-- <script>
    $(document).ready(function() {
    $('#change_password_form').validate({
        ignore: '.ignore',
        errorClass: 'invalid',
        validClass: 'success',
        rules: {
            old_password: {
                required: true,
                minlength: 8,
                maxlength: 100
            },
            new_password: {
                required: true,
                minlength: 8,
                maxlength: 100
            },
            confirm_password: {
                required: true,
                equalTo: '#new_password'
            }
        },
        messages: {
            old_password: {
                required: "Enter your old password"
            },
            new_password: {
                required: "Enter your new password"
            },
            confirm_password: {
                required: "Need to confirm your new password",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function(form) {
            $.LoadingOverlay("show");
            form.submit();
        }
    });
}); --}}

</script>
@endsection