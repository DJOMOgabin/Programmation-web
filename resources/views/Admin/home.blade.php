@extends("admin")
@section('body')
    @if($services->first()==null)
                        <div class="col-md-10">
                            <h4 class="content-header" style="text-align: center">Vous n'avez aucun service</h4>
                        </div>
                    @else
                        @foreach($services->chunk(4) as $productChunk)
                                    <div class="row">
                                        @foreach($productChunk as $service)
                                            <div class="col-md-3 panel-heading offset-m1 panel panel-default">
                                                <div class="thumbnail">
                                                    <img src="{{asset('images/'.$service->logo)}}" alt="Book">
                                                    <div class="caption">
                                                        <h3>{{$service->name}}</h3>
                                                        <p class="description">
                                                            {{$service->description}}
                                                        </p>
                                                        <div class="clearfix">
                                                            <div class="pull-left price">{{$service->price}} {{$service->currency}}</div>
                                                        </div>
                                                        <br>
                                                        @if($service->publication==1)
                                                            <div style="background-color: forestgreen; text-align: center">
                                                                <i><b style="color: red">
                                                                        <a href="{{'detail'}}?id={{$service->id}}" class="small-box-footer">
                                                                            More information <i class="fa fa-arrow-circle-right"></i></a>
                                                                        <br></b></i>
                                                        @else
                                                            <div style="background-color:firebrick; text-align: center">
                                                                <i><b style="color: green">
                                                                        <a href="{{'detail'}}?id={{$service->id}}" class="small-box-footer">
                                                                            More information <i class="fa fa-arrow-circle-right"></i></a>
                                                                        <br></b></i>
                                                        @endif
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                @endforeach
                    @endif
                </div>

                <br><br><br>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <form action="{{route('create')}}" method="get">
                            <button class="btn btn-block" type="submit">
                                <span>Create <i class="fa fa-plus-square"></i></span>
                            </button>
                        </form>
                    </div>
                </div><br><br>
@endsection