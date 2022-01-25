@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Distrito</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('distrito.index')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Editar Distrito</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar Distrito</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('distrito.update',$distrito->id)}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Nombre  </label>
                                    <input type="text" id="inputName" name="nombre" class="form-control"value="{{$distrito->nombre}}" required >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Url Seo  </label>
                                    <input type="text" id="inputName" name="url_seo" class="form-control" value="{{$distrito->url_seo}}" required >
                                </div>
                                <div class="form-group">
                                    <select name="region_id" id="">
                                        <option value="{{$solo->id}}">{{$solo->nombre}}</option>
                                        @foreach($regiones as $region)
                                            <option value="{{$region->id}}">{{$region->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right" >Editar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
