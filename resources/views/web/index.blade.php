@extends('layouts.app')
@section('content')

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">

            <div class="row mx-0">
                <div class="col-md-9 animate-box" data-animate-effect="fadeInLeft">
                    {{-- <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4"></div>
                    </div> --}}
                    <div class="row">
                    @foreach($eventos as $evento)
                        {{-- <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{Storage::url($evento['evento']->imagen)}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="/peru/{{$evento['distrito']->region->url_seo}}/{{$evento['evento']->slug}}/{{$evento['evento']->fecha}}" class="fh5co_magna py-2"> {{$evento['distrito']->nombre}} : {{$evento['evento']->titulo}}</a><br> <a href="" class="fh5co_mini_time py-3"> <span>{{formato_fecha($evento['evento']->created_at)}}</span> </a>
                                <div class="fh5co_consectetur"> {{$evento['evento']->contenido}}
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-lg-6 col-md-6">
                        <a href="/peru/{{$evento['distrito']->region->url_seo}}/{{$evento['evento']->slug}}/{{$evento['evento']->fecha}}">
                            <div class="single-what mb-100">
                                <div class="what-img">
                                    <img src="{{Storage::url($evento['evento']->imagen)}}" alt="">
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{formato_fecha($evento['evento']->created_at)}}</span>
                                    <h2> {{$evento['distrito']->nombre}} : {{$evento['evento']->titulo}}</h2>
                                </div>
                            </div>
                        </a>
                        </div>
                    @endforeach
                <!--prueba inicio -->

                    {{-- <a href="https://api.whatsapp.com/send?phone=+51958179714" target="_blank"><img src="/assets/images/banner-numero.png" style="width: 100%" alt=""></a> --}}
                </div>
                </div>


                
                <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Enero</div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="http://melina.test/storage/distritos/ancon-61f5cc07b280c.jpg" alt="img" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="home__tag">ancón</div>
                            <div class="most_fh5co_treding_font">Encuesta Virtual Febrero 2022</div>
                        </div>
                    </div>

                    <a href="https://api.whatsapp.com/send?phone=+51958179714" target="_blank"><img src="/assets/images/banner-web_v2.png" style="width: 100%" alt=""></a>
                </div>


                <!--div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <a href="#" class="fh5co_tagg">Business</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Sport</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                        <a href="#" class="fh5co_tagg">Photography</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Education</a>
                        <a href="#" class="fh5co_tagg">Social</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                    </div>

                    <a href="https://api.whatsapp.com/send?phone=+51958179714" target="_blank"><img src="/assets/images/banner-numero-.png" style="width: 100%" alt=""></a>

                    </div-->
                {{-- <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (1).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/allef-vinicius-108153.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (2).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center"><img src="images/seth-doyle-133175.jpg" alt="img"
                                                              class="fh5co_most_trading"/></div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>
    </div>

@endsection



