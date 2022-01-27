@extends('layouts.app')


@section('content')

    <div id="fh5co-title-box" style="background-image: url(/storage/distrito/ate.jfif); background-position: 50% 90.5px;"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <span>{{ $evento->created_at }}</span>
            <h2>{{ $distrito->nombre }} : Encuesta Virtual </h2>
        </div>
    </div>

    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <!-- <h3>{{ $distrito->nombre }} : Encuesta Virtual </h3> -->
                    <!-- <img src="{{ Storage::url($evento->imagen) }}" alt="img" class="img-fluid"> -->
                    <!-- <h5>{{ $evento->created_at }}</h5> -->
                    <p>{{ $evento->descripcion }}</p>
                    <!-- <h2> {{ $evento->contenido }}</h2> -->




                    <div class="encuesta-votacion">

                        <form>


                            {{-- <div class="col-12 lista-candidatos">

                             </div> --}}



                            <table class="table table-image table-candidato">
                                <tbody class="lista-candidatos">

                                </tbody>
                            </table>


                            <table class="table table-image table-candidato">
                                <tbody class="lista-candidatos-resultado">

                                </tbody>
                            </table>


                            {{-- <table class="table table-image table-candidato">
                                <tbody>
                                <tr>
                                    <td class="name-votos">Aly Carlos Villarroel</td>
                                    <td class="w-80"><img
                                            src="https://i.pinimg.com/originals/c5/f5/b0/c5f5b093d6147305ab51eafa3bbd597c.jpg"
                                            class="img-candidato" alt="Sheep"></td>
                                    <td class="w-80"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Alianza_para_el_Progreso_Peru.svg"
                                            class="img-candidato" alt="Sheep"></td>
                                    <td>
                                        <div class="progress-element progress-element--html">
                                            <p class="progress-label">HTML</p>
                                            <div class="progress-container">
                                                <progress max="100" value="90">10%</progress>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-votos">Erasmo Cárdenas Obregón</td>
                                    <td class="w-80"><img
                                            src="https://i.pinimg.com/originals/c5/f5/b0/c5f5b093d6147305ab51eafa3bbd597c.jpg"
                                            class="img-candidato" alt="Sheep"></td>
                                    <td class="w-80"><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/c/c0/Logo_Oficial_PPC.png"
                                            class="img-candidato" alt="Sheep"></td>
                                    <td>
                                        <div class="progress-element progress-element--html">
                                            <p class="progress-label">HTML</p>
                                            <div class="progress-container">
                                                <progress max="100" value="95">95%</progress>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table> --}}

                            <div class="col-12 lista-votos">
                                resultado de votos
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
                        @foreach ($distritos as $d)
                            <a href="/peru/{{ $d->region->url_seo }}/{{ $d->url_seo }}"
                                class="fh5co_tagg">{{ $d->nombre }}</a>
                        @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    @foreach ($e as $eve)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{ Storage::url($eve->imagen) }}" alt="img" class="fh5co_most_trading" />
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"> {{ $eve->titulo }}</div>
                                <a href="/peru/{{ $distrito->region->url_seo }}/{{ $eve->slug }}/{{ $eve->fecha }}"><span
                                        class="most_fh5co_treding_font_123">{{ $eve->created_at }}</span></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <style>
        .table-candidato td {
            vertical-align: middle;
        }

        .table-candidato tr:hover {
            background-color: rgba(0,0,0,.05);
        }

        .w-80 {
            width: 80px;
        }

        .w-10 {
            width: 10px;
        }

        .img-candidato {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
        }

        .name-votos {
            width: 170px;
            text-align: right;
        }

        /* radio  */
        .option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  /* top: 13.33333px; */
  right: 0;
  bottom: 0;
  left: 0;
  height: 22px;
  width: 22px;
  transition: all 0.15s ease-out 0s;
  background: lightgray;
  border: 2px solid darkgray;;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  /* margin-right: 0.5rem; */
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
    background: #40e0d0;
    border: 2px solid darkgray;
}
.option-input:checked::before {
    width: 8px;
    height: 8px;
    display: flex;
    content: "";
    font-size: 25px;
    font-weight: bold;
    position: absolute;
    align-items: center;
    justify-content: center;
    /* font-family: 'Font Awesome 5 Free'; */
    background-color: #fff;
    border-radius: 50%;
    right: calc(50% - 4px);
    top: calc(50% - 4px);
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}

@keyframes click-wave {
  0% {
    height: 22px;
    width: 22px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 80px;
    width: 80px;
    margin-left: -31px;
    margin-top: -32px;
    opacity: 0;
  }
}

        /* progress */


        progress {
            opacity: 0;
        }

        .progress-element {
            /* width: 200px; */
            margin: 0 0 10px;
        }

        .progress-container {
            position: relative;
            background: #eee;
            height: 20px;
            border-radius: 6px;
            overflow: hidden;
        }

        .progress-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background: turquoise;
        }

        .progress-element--html .progress-container::before {
            animation: progress-html 1s ease-in forwards;
        }

        @keyframes progress-html {
            to {
                width: 45%;
            }
        }

        .progress-label {
            font-size: 14px !important;
            position: relative;
        }

        @property --num {
            syntax: "<integer>";
            initial-value: 0;
            inherits: false;
        }

        /* .progress-label::after {
            counter-reset: num var(--num);
            content: counter(num) "%";
            position: absolute;
            top: 0;
            right: 0;
        } */

        .progress-element--html .progress-label::after {
            animation: progress-text-html 1s ease-in forwards;
        }

        @keyframes progress-text-html { 
            to {
                --num: 45;
            }
        }

    </style>

    <script>

    function addAnimation(keyframe){
        var ss=document.createElement('style');
        ss.innerText=keyframe;
        document.head.appendChild(ss);
    }

        $.get("{{ url('/api/lista/' . $evento->id) }}", function(data, status) {
            for (var it of data) {
                var item =` 
                    '<tr id="${it.id}">
                    <td class="w-10"><input type="radio" class="option-input radio" name="votar" value="${it.id}" /></td><td>${it.nombre}</td>
                    '<td class="w-80"><img src="https://i.pinimg.com/originals/c5/f5/b0/c5f5b093d6147305ab51eafa3bbd597c.jpg" class="img-candidato" alt="Sheep"></td>
                    '<td class="w-80"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Alianza_para_el_Progreso_Peru.svg" class="img-candidato" alt="Sheep"></td>
                    </tr>`;
                $('.lista-candidatos').append(item)
            }
        });

        $.get("{{url('/api/resultados/'.$evento->id)}}",function (data,status){

            const newdata = data.sort((a, b) => b.porcentaje - a.porcentaje)

            for (var it of newdata){

                let porcen = it.porcentaje.toString().split('.')

                var item =`
                    <tr>
                    <td class="name-votos">${it.nombre}</td><td class="w-80">
                    <img src="https://i.pinimg.com/originals/c5/f5/b0/c5f5b093d6147305ab51eafa3bbd597c.jpg" class="img-candidato" alt="Sheep"></td>
                    <td class="w-80"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Alianza_para_el_Progreso_Peru.svg" class="img-candidato" alt="Sheep"></td>
                    <td><div class="progress-element progress-element--${it.id}"><p class="progress-label">${it.votos} votos</p><div class="progress-container">
                    <progress max="100" value="20">95%</progress></div></div></td>
                    </tr>`;
                        
                    addAnimation(`
                    .progress-element--${it.id} .progress-container::before {
                        animation: progress-${it.id} 1s ease-in forwards;
                    }
                    @keyframes progress-${it.id} {
                        to {
                            width: ${it.porcentaje}%;
                        }
                    }

                    .progress-element--${it.id} .progress-label::after {
                        animation: progress-text-${it.id} 1s ease-in forwards;
                    }

                    @keyframes progress-text-${it.id} {
                        to {
                            --num: ${porcen[0]};
                        }
                    }

                    .progress-label::after {
                        counter-reset: num var(--num);
                        content: counter(num) ".${porcen[1]}%";
                        position: absolute;
                        top: 0;
                        right: 0;
                    }
                    `)


                $('.lista-candidatos-resultado').append(item)
            }
        });

        $(document).on('ready', function() {

            $('.btn-votar').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ url('/api/votacion') }}',
                    data: JSON.stringify({
                        'evento_id': 1,
                        'candidato_id': 1
                    }),
                    success: function(a) {
                        console.log(a);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var r = xhr?.responseJSON;
                        if (r != null) {
                            alert(r.message);
                        }

                    }
                });
            });

        });
    </script>

@endsection
