@extends('layouts.app')
@section('content')




    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <h3>{{$distrito->nombre}} : ENCUESTA VIRTUAL </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla malesuada enim id enim congue
                        convallis. Praesent a cursus orci. Proin mauris eros, rhoncus in risus nec, vestibulum dignissim
                        diam. Duis dapibus, magna ac fringilla consectetur, tellus quam aliquam quam, molestie tincidunt
                        justo risus et nunc. Donec quis justo nec diam hendrerit facilisis placerat non magna. Class aptent
                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>

                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, modi!</li>
                        <li>Ea iure at, debitis culpa perspiciatis suscipit laudantium a, expedita.</li>
                        <li>Voluptate distinctio perspiciatis cum sed ipsum nisi accusantium a aut!</li>
                        <li>Sed vel quo dignissimos, quaerat totam officia, deserunt provident minus.</li>
                    </ul>



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
                    <div>
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
                    </div>
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
