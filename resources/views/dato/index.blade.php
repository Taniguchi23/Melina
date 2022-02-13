@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Registros</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Registros</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="breadcrumb float-sm-right">
                            <form action="{{route('dato.buscar')}}" method="post">
                                @csrf
                                <input type="text" placeholder="Buscar..." name="palabra" required>
                                <button type="submit"> Buscar </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Registro</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Distrito
                            </th>
                            <th >
                                Candidato
                            </th>
                            <th >
                                Evento
                            </th>
                            <th>
                                Votos
                            </th>
                            <th>
                                Actualizado
                            </th>

                            <th >Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datos as $dato)
                            <tr>
                                <td>
                                    {{$dato->id}}
                                </td>
                                <td>
                                    {{$dato->candidato->distrito->nombre}}
                                </td>
                                <td>
                                    {{$dato->candidato->nombre}}}
                                </td>
                                <td>
                                    {{$dato->evento->fecha}}
                                </td>
                                <td class="project_progress">
                                    {{$dato->votos}}
                                </td>
                                <td>
                                    {{$dato->updated_at}}
                                </td>
                                <td class="project-actions text-right">

                                    <a class="btn btn-info btn-sm" href="{{route('dato.edit',$dato->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

