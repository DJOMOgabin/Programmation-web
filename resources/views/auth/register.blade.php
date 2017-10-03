@extends('layouts.myApp')

@section('content')
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col m10 offset-m1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="center-align">Register</h3></div>
                    <div class="panel-body">
                        <form class="col m10 offset-m1" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="input-field ">
                                    <select id="typeOfUser" name="typeOfUser">
                                        <option value="" disabled selected>Which kind of user?</option>
                                        <option value="Company">Company</option>
                                        <option value="Educational">Educational</option>
                                        <option value="Individual">Individual</option>
                                    </select>
                                    <label class="oblige">Type Of User</label>
                                </div>
                            </div>

                            <div class="row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="input-field ">
                                    <i class="material-icons prefix">person_pin</i>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}">
                                    <label for="name" class="oblige">Name</label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field  prenom">
                                    <input id="firstname" type="text" name="firstname">
                                    <label for="firstname">First Name</label>
                                </div>

                                <div class="input-field  shortname">
                                    <input id="shortname" type="text" name="shortname">
                                    <label for="shortname">Short Name</label>
                                </div>

                            </div>
                            <div class="row">
                                <label class="oblige">Birth date</label>
                                <input type="date" class="datepicker" id="dateNaiss" name="dateNaiss" required>
                            </div>
                            <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="input-field">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}">
                                    <label for="email" class="oblige">E-Mail Address</label>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="input-field col m6">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password" type="password" name="password">
                                    <label for="password" class="oblige">Password</label>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-field col m6">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="password-confirm" type="password" name="password_confirmation">
                                    <label for="password-confirm" class="oblige">Confirm Password</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="input-field">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phone" type="number" name="phone">
                                    <label for="phone" class="oblige">Phone Number</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="input-field col m6">
                                    <input id="country" type="text" name="country">
                                    <label for="country">Country</label>
                                </div>
                                <div class="input-field col m6">
                                    <input id="town" type="text" name="town">
                                    <label for="town">Town</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="input-field col m6">
                                    <i class="material-icons prefix">location_on</i>
                                    <input id="address" type="text" name="address">
                                    <label for="address">Address</label>
                                </div>
                                <div class="input-field col m6">
                                    <i class="material-icons prefix">markunread_mailbox</i>
                                    <input id="pobox" type="number" name="pobox">
                                    <label for="pobox">P.O.Box</label>
                                </div>
                            </div>


                            <div class="row civility">

                                <div class="input-field">
                                    <select id="civility" name="civility">
                                        <option value="" disabled selected>Which civility?</option>
                                        <option value="Mister">Mister</option>
                                        <option value="Mistress">Mistress</option>
                                    </select>
                                    <label>Civility</label>
                                </div>
                            </div>


                            <div class="row language">

                                <div class="input-field">
                                    <select id="language" name="language">
                                        <option value="" disabled selected>Which language?</option>
                                        <option value="French">French</option>
                                        <option value="English">English</option>
                                    </select>
                                    <label for="language" class="oblige">Language</label>
                                </div>
                            </div>
                            <div class="row currency">

                                <div class="input-field">
                                    <select id="currency" name="currency">
                                        <option value="" disabled selected>Which currency?</option>
                                        <option value="Dollar">Dollar</option>
                                        <option value="Euro">Euro</option>
                                        <option value="FCFA">FCFA</option>
                                    </select>
                                    <label for="currency" class="oblige">Currency</label>
                                </div>
                            </div>
                            <div class="row gps">
                                <div class="input-field col m7">
                                    <i class="material-icons prefix">my_location</i>
                                    <input id="gps" type="text" name="gps" placeholder="Latitude: xxx, Longitude: xxx"
                                    >
                                    <label for="gps">Location</label>


                                </div>
                                <div class="col m4">
                                    <!-- Modal Trigger -->
                                    <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Find on map</a>
                                    <!-- Modal Structure -->
                                    <div id="modal1" class="modal bottom-sheet">
                                        <div class="modal-content" id='map_canvas' style="height:300px!important; ">
                                        </div>
                                        <div class="modal-footer">
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat "
                                               id="save-location">Save</a>
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat "
                                               id="cancel-location">Cancel</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label for="captcha-input" class="oblige">Sure you are not a robot?</label>

                            </div>
                            <div class="row">
                                <div class="captcha-image col m6">

                                    {{--<img src="{{$chemin}}" alt="captcha" class="responsive-img">
                                </div>
                                <div class="captcha-input col m6">
                                    <input id="captcha-input" type="text" name="captcha-input" >--}}
                                    {!! captcha_image_html('ExampleCaptcha') !!}
                                    <input type="text" id="CaptchaCode" name="CaptchaCode">
                                </div>
                            </div>

                            <div class="row conditions">
                                <div class="col s12">
                                    <p>
                                        <input type="checkbox" class="filled-in" name="conditions"
                                               id="conditions" {{ old('conditions') ? 'checked' : '' }}>
                                        <label for="conditions" class="oblige">I had read and approved <a
                                                    href="#modal2">conditions</a></label>
                                    </p>

                                    <!-- Modal Structure-->
                                    <div id="modal2" class="modal" style="height: 250px!important;">
                                        <div class="modal-content">
                                            <h4>Conditions and Terms of utilisation</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore
                                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                dolor in reprehenderit in
                                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                                sint occaecat cupidatat non proident,
                                                sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                            <div class="modal-footer">
                                                <a class="modal-action modal-close waves-effect waves-green btn-flat"
                                                   id="agree-conditions">Agree</a>
                                                <a class="modal-action modal-close waves-effect waves-green btn-flat "
                                                   id="disagree-conditions">Disagree</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col m6  offset-m4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal').modal();
            });

            $('.oblige').each(function () {
                        $(this).html($(this).html() + "<span style= 'color:red'>*</span>");

                    }
            )
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });
        });


    </script>

@endsection
