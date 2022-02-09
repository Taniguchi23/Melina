@extends('layouts.app')


@section('content')

    {{-- <div id="fh5co-title-box" style="background-image: url({{Storage::url($evento->imagen)}}); background-position: 50% 0;" --}}
    <div id="fh5co-title-box"
         style="background: url({{ Storage::url($evento->imagen) }}) center center  fixed;background-size: cover;"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <span>{{ formato_fecha($evento->created_at) }}</span>
            <h2>{{ $distrito->nombre }} : {{ $evento->titulo }}</h2>
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

                    <span> Los votos fueron estrictos, es decir, 1 voto por IP + cookie, evitando el voto mÃºltiple.<br><br>

		                <strong>NOTA IMPORTANTE:</strong><br>
		            La presente encuesta refleja las preferencias del segmento â€œUsuarios de Internetâ€.
		            Los usuarios de Internet son juventud, universidades y gente muy influyente en redes sociales. </span>
                    @if($evento->imagen_resultado != null){
                    <img src="{{ Storage::url($evento->imagen_resultado) }}" alt="img" class="img-fluid">
                    }
                    @endif

                    <div class="encuesta-votacion">

                        <form id="js-form-candidatos">

                            <table id="table-votar" class="table table-image table-candidato">
                                <tbody class="lista-candidatos">
                                </tbody>
                            </table>


                            <table id="table-resul" class="table table-image table-candidato">
                                <tbody class="lista-candidatos-resultado">
                                </tbody>
                            </table>

                            <p class="text-right" style="padding: 0 12px 0 0">
                                <button id="btn-resul" class="btn btn-outline-primary">Resultados</button>
                                <button id="btn-votar" class="btn btn-primary btn-votar">Votar</button>
                                <button id="btn-atras" class="btn btn-outline-primary">Atras</button>
                                {{-- <input class="btn btn-primary btn-votar" type="submit" value="Votar"> --}}
                            </p>

                        </form>

                    </div>


                    {{-- <div style="width: 100%">
                        <div id="canvas"></div>
                    </div> --}}

                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{ $distrito->region->nombre }}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach ($distritos as $d)
                            <a href="/peru/{{ $d->region->url_seo }}/{{ $d->url_seo }}"
                               class="fh5co_tagg">{{ $d->nombre }}</a>
                        @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Ãšltimas Encuestas</div>
                    </div>
                    @foreach ($e as $eve)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{ Storage::url($eve->imagen) }}" alt="img" class="fh5co_most_trading" />
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"> {{ $eve->titulo }}</div>
                                <a
                                    href="/peru/{{ $distrito->region->url_seo }}/{{ $eve->slug }}/{{ $eve->fecha }}"><span
                                        class="most_fh5co_treding_font_123">{{ formato_fecha($eve->created_at) }}</span></a>
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
            background-color: rgba(0, 0, 0, .05);
            cursor: pointer;

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
            border: 2px solid darkgray;
        ;
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


        /* progress {
                    opacity: 0;
                } */

        /* .progress-element {
                    width: 200px;
                    margin: 0 0 10px;
                } */

        .progress-container {
            position: relative;
            background: #eee;
            height: 20px;
            border-radius: 3px;
            overflow: hidden;
        }

        /* .progress-container::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 0;
                    background: turquoise;
                } */

        /* .progress-element--html .progress-container::before {
                    animation: progress-html 1s ease-in forwards;
                } */

        /* @keyframes progress-html {
                    to {
                        width: 45%;
                    }
                } */

        .progress-label {
            font-size: 14px !important;
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        /*
                @property --num {
                    syntax: "<integer>";
                    initial-value: 0;
                    inherits: false;
                } */

        /* .progress-label::after {
                    counter-reset: num var(--num);
                    content: counter(num) "%";
                    position: absolute;
                    top: 0;
                    right: 0;
                } */

        /* .progress-element--html .progress-label::after {
                    animation: progress-text-html 1s ease-in forwards;
                }

                @keyframes progress-text-html {
                    to {
                        --num: 45;
                    }
                } */

    </style>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>



    <script>
        const setBg = () => '#' + Math.floor(Math.random() * 16777215).toString(16);

        $.get("{{ url('/api/resultados/' . $evento->id) }}", function(data, status) {
            console.log(data)

            let dataFilter = data.filter(elm => (elm.votos > 1) ? true : false);

            let nameMap = dataFilter.map(elm => elm.nombre)
            let votosMap = dataFilter.map(elm => elm.votos)

            let colorMap = dataFilter.map(elm => setBg())
            
            let votosName = nameMap.map((elm, index) => [elm, votosMap[index]])
            console.log(votosName)

            console.log(votosMap)



            // var ctx = document.getElementById("canvas").getContext("2d");
            // var myBar = new Chart(ctx, {
            //   type: 'bar',
            //   data: {
            //     labels: nameMap,
            //     datasets: [{
            //       label: 'Fuel',
            //       backgroundColor: colorMap,
            //       borderColor: colorMap,
            //       data: votosMap
            //     }]
            //   },
            //   options: {
            //     title: {
            //       display: true,
            //       text: "Candidatos de {{ $distrito->nombre }}"
            //     },
            //     tooltips: {
            //       mode: 'index',
            //       intersect: false
            //     },
            //     legend: {
            //       display: false,
            //     },
            //     responsive: true,
            //   }
            // });

        //     var chart = c3.generate({
        //         bindto: '#canvas',
        //         data: {
        //             columns: votosName,
        //             type: 'bar',
        //             colors: {
        //                 data1: '#ff0000',
        //                 data2: '#111',
        //                 data3: '#aaa'
        //             },
        //         },
        //         bar: {
        //             width: {
        //                 ratio: 0.97
        //             },
        //         }
        //     });



        // })
    </script>

    <script>
        var _EVENTO_ID = '{{ $evento->id }}';
        var _EVENTO_ESTADO = {{ $total }};

        function addAnimation(keyframe) {
            var ss = document.createElement('style');
            ss.innerText = keyframe;
            document.head.appendChild(ss);
        }

        $.get("{{ url('/api/lista/' . $evento->id) }}", function(data, status) {

            const newdata = data.sort((a, b) => (b.nombre.toLowerCase() == 'otro') ? -1 : 1);

            for (var it of newdata) {
                var valor = "";
                if (it.imagen_candidato === null) {
                    valor = "none";
                }

                var item = `
                    <tr id="votar-${it.id}" data-voto="${it.id}">
                    <td class="w-10"><input type="radio" class="option-input radio" id="radio-${it.id}" name="votar" value="${it.id}" /></td><td>${it.nombre}</td>
                    <td class="w-80" ><img src="${it.imagen_candidato}" class="img-candidato" alt="Sheep"style="display: ${valor} " ></td>
                    <td class="w-80"><img src="${it.imagen_partido}" class="img-candidato" alt="Sheep" style="display: ${valor}"></td>
                    </tr>`;
                $('.lista-candidatos').append(item);

                document.getElementById(`votar-${it.id}`).addEventListener('click', function() {
                    let idbtn = this.dataset.voto
                    let radiobtn = document.getElementById(`radio-${idbtn}`);
                    radiobtn.checked = true;
                })
            }

        });

        var resul = $('#table-resul')
        var votar = $('#table-votar')

        var btnVotar = $('#btn-votar')
        var btnAtras = $('#btn-atras')
        var btnResul = $('#btn-resul')
        btnAtras.hide();
        resul.hide();

        btnResul.click(function() {
            showResul();
            resul.show();
            votar.hide();
            btnVotar.hide();
            btnAtras.show();
            btnResul.hide();
        })

        btnAtras.click(function() {
            resul.hide();
            votar.show();
            btnAtras.hide();
            btnVotar.show();
            btnResul.show();
        })

        const formatter = new Intl.NumberFormat('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });

        function showResul() {
            $.get("{{ url('/api/resultados/' . $evento->id) }}", function(data, status) {
                var total = data.reduce((n, {
                    votos
                }) => n + votos, 0);
                $('.lista-candidatos-resultado').empty();
                for (var it of data) {
                    var valor = "";
                    if (it.imagen_candidato === null) {
                        valor = "none";
                    }
                    var porc = total > 0 ? ((it.votos * 100) / total) : 0;
                    var item = `<tr>

                    <td class="name-votos">${it.nombre}</td><td class="w-80">
                    <img src="${it.imagen_candidato}" class="img-candidato" alt="Sheep" style="display: ${valor} " ></td>
                    <td class="w-80"><img src="${it.imagen_partido}" class="img-candidato" alt="Sheep" style="display: ${valor} " ></td>
                    <td>
                        <div class="progress-element progress-element--${it.id}" ><p class="progress-label"><span>${it.votos} votos</span> <span><span class="count">${porc}</span>%</span></p><div class="progress-container">
                        <div class="barra-votacion" style="background:#00afa9;width:0;height:20px" value="${porc}"></div></div></div>
                    </td>
                    </tr>`;

                    $('.lista-candidatos-resultado').append(item);

                }
                $('.barra-votacion').each(function(a) {
                    $(this).animate({
                        width: $(this).attr('value') + '%'
                    }, 1500, 'linear');
                });
                $('.count').each(function() {
                    $(this).prop('counter', 0).animate({
                        counter: $(this).text()
                    }, {
                        duration: 1500,
                        easing: 'linear',
                        step: function(step) {
                            $(this).text('' + formatter.format(step));
                        }
                    });
                });
            });
        }


        var jsform = document.getElementById('js-form-candidatos');
        console.log(jsform);

        jsform.addEventListener('submit', function(e) {
            e.preventDefault()
            console.log(jsform.votar)
        })

        $(document).on('ready', function() {

            $('.btn-votar').on('click', function() {

                var candidato = $('input[name=votar]:checked').val();

                if (candidato != null) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('/api/votacion') }}',
                        data: JSON.stringify({
                            'evento_id': _EVENTO_ID,
                            'candidato_id': candidato
                        }),
                        success: function(a) {
                            $('#btn-resul').trigger('click');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            var r = xhr?.responseJSON;
                            if (r != null) {
                                //alert(r.message);
                                $('#btn-resul').trigger('click');
                            }
                        }
                    });
                } else alert('Por favor seleccione el candidato de su preferencia');
            });
            if (_EVENTO_ESTADO < 0) {
                $('#btn-resul').trigger('click');
            }
        });
    </script>

@endsection
