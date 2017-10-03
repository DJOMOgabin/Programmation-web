@extends("admin")


@section('detail')
                <div class="panel-body">
                    <form role="form" method="POST" action="{{'Apply'}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="col m10 offset-m1" style="align-content: center;
                        margin-left: 2%; color:black; size: 20px">
                        <div class="small-box" style=" padding-left: 5%">
                            <div class="row">
                                <div class="inner">
                                    <br>
                                    <h3 style="text-align: center;font-family: Algerian">{{$service->name}}</h3>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="id" value="{{$service->id}}">
                            <div class="row">
                                <h5 style="text-align: center"><b><u>Service's Description</u></b></h5><p>{{$service->description}}</p>
                                <p><b><u>Sector:</u>  {{$sector->name}}</b></p>
                                <p><b><u>Category:</u>  {{$category->name}}</b></p>
                            </div>
                            <div class="row">
                                <label for="img"><u>Service's<b> LOGO</b></u></label>
                                <br><br>
                                <div class="col-md-5">
                                    <img style="max-width: 100%" src="{{asset('images/'.$service->logo)}}" id="img">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <b><u>Service's PUBLISH:</u></b>
                                 @if($service->publication=='1')
                                     <div id="public">
                                         <b style="color: green" id="val">TRUE</b>
                                     </div>
                                    <div class="row" id="row">
                                        <div class="input-field col m11" id="child">
                                            <input type="checkbox" onclick="check(this.value)" value="1" id="publication" name="publication" checked>
                                            <label for="publication">Publish it?</label>
                                        </div>
                                    </div>
                                @else
                                    <div id="public">
                                        <b style="color: red" id="val">FALSE</b>
                                    </div>
                                    <div class="row" id="row">
                                        <div class="input-field col m11" id="child">
                                            <input type="checkbox" onclick="check(this.value)" value="2" id="publication" name="publication">
                                            <label for="publication">Publish it?</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <h5 style="text-align: center"><b><u>QRcode of the Service</u></b></h5>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4">{!! QrCode::size(200)->generate($service->id)!!}</div>
                                <div class="col-md-4"></div>
                            </div>
                            <br>
                            <br>
                            <h5 style="text-align: center"><b><u>CodeBar of the Service</u></b></h5>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3" style="margin-left: 4%">{!! CodeBar1::getBarcodeHTML($service->id, "EAN13")!!}</div>
                                <div class="col-md-4"></div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{'home'}}" class="btn btn-block"><span>Return <i class="fa fa-mail-reply"></i></span></a>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-3" id="apply">
                                    <button type="submit" disabled="disabled" id="app" class="btn btn-block"><span>Apply</span></button>
                                </div>
                            </div>
                </form>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script>
           var but=0,valeur;
            function check(val) {
                valeur=val;
                if(val==1){
                    var tr = document.createElement('div');
                         tr.innerHTML='<b id="val" style="color: red" class="check">FALSE</b></div>';
                    $("#val").remove();
                    $("#public").append(tr);
                    var td = document.createElement('div');
                    td.innerHTML='<div class="input-field col m11" id="child">'+
                            '<input type="checkbox" onclick="check(this.value)" value="2" id="publication" name="publication">'+
                            '<label for="publication">Publish it?</label></div></div>';
                    $("#child").remove();
                    $("#row").append(td);

                }else {
                    var tr = document.createElement('div');
                    tr.innerHTML='<b id="val" style="color: green" class="check">TRUE</b></div>';
                    $("#val").remove();
                    $("#public").append(tr);
                    var td = document.createElement('div');
                    td.innerHTML='<div class="input-field col m11" id="child">'+
                            '<input type="checkbox" onclick="check(this.value)" value="1" id="publication" name="publication" checked>'+
                            '<label for="publication">Publish it?</label></div></div>';
                    $("#child").remove();
                    $("#row").append(td);
                }
                if(but==0){
                    but=1;
                    $("#app").removeAttr("disabled", "disabled");
                }
            }
        </script>
@endsection


@section('body')

    <div class="container">
        <div class="row">
            <div class="col m8 offset-m1">
                <div class="panel panel-default">
                    <div class="panel-heading">Service's Detail</div>
                    @yield('detail')
                </div>
            </div>
        </div>
    </div>
@endsection