@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h4>You are logged in!</h4>
                        <form method="get" role="form" class="offset-m1" action="/researchResults">
                            <div class="input-field">
                                <input id="search" type="search" >
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                                <a class="modal-trigger waves-effect waves-light" href="#modal1">Advanced...</a>
                                <div id="modal1" class="modal modal-fixed-footer">
                                    <div class="modal-content">

                                            <div class="row">
                                                <div class="input-field">
                                                    <input id="location" type="text" name="location">
                                                    <label for="location">Where?</label>
                                                    <a class="btn btn-primary" id="myLocation"> My location</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col m4"><input name="distance" type="radio" id="distance"
                                                                           class="with-gap" value="1"/>
                                                    <label for="test1">0-1Km</label></div>
                                                <div class="col m4"><input name="distance" type="radio" id="distance"
                                                                           class="with-gap" value="2"/>
                                                    <label for="test2">1-3Km</label></div>
                                                <div class="col m4"><input class="with-gap" name="distance" type="radio"
                                                                           id="distance"  value="3"/>
                                                    <label for="test3">3-5Km</label></div>

                                            </div>
                                            <div class="row">
                                                <div class="input-field">
                                                    <input id="supplier" name="supplier" type="text">
                                                    <label for="supplier">Which supplier?</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6">
                                                    <input id="min" name="min" min="0" type="number">
                                                    <label for="min">Minimal cost</label>
                                                </div>
                                                <div class="input-field col m6">
                                                    <input id="max" name="max" min="0" type="number">
                                                    <label for="max">Maximal cost</label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit"
                                                class="modal-action modal-close waves-effect waves-green btn-flat ">Find
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <!-- Modal Structure -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            var x = document.getElementById("location");
            x.innerHTML = "Latitude: " + position.coords.latitude +
                    "Longitude: " + position.coords.longitude;
        }
    </script>
    <script>
        $('#myLocation').click(function () {
            getLocation();
            console.log("click")
        });
    </script>
@endsection
