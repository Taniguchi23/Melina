@extends('layouts.app')
@section('content')

    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <h3>{{$distrito->nombre}} : Encuesta Virtual </h3>
                    <img src="{{Storage::url($evento->imagen)}}" alt="img" width="700px">
                    <h5>{{$evento->created_at}}</h5>
                    <h3>{{$evento->descripcion}}</h3>
                    <h2> {{$evento->contenido}}</h2>




                    <div class="encuesta-votacion">

                        <form>
                            <div class="row">
                             <div class="col-12 lista-candidatos">

                             </div>
                            </div>

                        </form>

                        <button class="btn btn-primary">Resultados</button>
                        <button class="btn btn-primary btn-votar">Votar</button>

                    </div>






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
                                <div class="most_fh5co_treding_font"> {{$eve->titulo}}</div>
                                <a href="/peru/{{$distrito->region->url_seo}}/{{$eve->slug}}/{{$eve->fecha}}"><span class="most_fh5co_treding_font_123">{{$eve->created_at}}</span></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


    <script>

        $.get("{{url('/api/lista/'.$evento->id)}}", function(data, status){
            console.log(data);
            for(var it of data){
                var item = '<div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> <label class="form-check-label" for="flexRadioDefault1">'+it.nombre+'</label></div>';
                $('.lista-candidatos').append(item)
            }
        });

        $(document).on('ready', function(){

            $.get("{{url('/api/votacion')}}", function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });

            $('.btn-votar').on('click', function(){
                alert(5);
            });

        });

    </script>

@endsection
