@extends('layouts.myApp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Result(s)</div>
                    <div class="panel-body">
                        <div class="row selection">
                            <div class="col m10 offset-m2">
                                @foreach(array_chunk($products,3) as $productChunk)
                                    <div class="row">
                                        @foreach($productChunk as $product)
                                            <div class="col m3">

                                                <div class="card" style="height: 350px!important;" id="{{$product->id}}"
                                                     onclick="gestionClick({{$product->id}});">
                                                    <div class="card-image">
                                                        <img src="{{$product->logo}}" height="150px" width="150px">
                                                    </div>
                                                    <div class="card-content">
                                                        <p>
                                                            <span class="card-title" id="name{{$product->id}}">{{$product->name}}</span></p>
                                                        <p>
                                                            <span><b>{{$product->price}}$</b></span>
                                                            {{$product->description}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="icon{{$product->id}}"></div>
                                            </div>
                                        @endforeach
                                    </div>


                                @endforeach
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
