@extends('layouts.app')
@section('content')

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{$distrito->nombre}}</div>
                    </div>
                    @foreach($eventos as $evento)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{Storage::url($evento->imagen)}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="/peru/{{$distrito->region->url_seo}}/{{$evento->slug}}/{{$evento->fecha}}" class="fh5co_magna py-2"> {{$evento->titulo}}  </a>
                                <a href="/peru/{{$distrito->region->url_seo}}/{{$evento->slug}}/{{$evento->fecha}}" class="fh5co_mini_time py-3"> Encuesta -
                                    April 18,2016 </a>
                                <div class="fh5co_consectetur"> {{$evento->contenido}}
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach($distritos as $d)
                        <a href="/peru/{{$d->region->url_seo}}/{{$d->url_seo}}" class="fh5co_tagg">{{$d->nombre}}</a>
                        @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    @foreach($e as $eve)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{Storage::url($eve->imagen)}}" alt="img" class="fh5co_most_trading"/>
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"> {{$eve->contenido}}</div>
                                <a href="/peru/{{$distrito->region->url_seo}}/{{$eve->slug}}/{{$eve->fecha}}"><div class="most_fh5co_treding_font_123">{{$eve->created_at}}</div></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-center pb-4 pt-4">
                    <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                    <a href="#" class="btn_pagging">1</a>
                    <a href="#" class="btn_pagging">2</a>
                    <a href="#" class="btn_pagging">3</a>
                    <a href="#" class="btn_pagging">...</a>
                    <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
                </div>
            </div>
        </div>
    </div>

@endsection
