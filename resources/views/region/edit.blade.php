@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Region</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('region.index')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Nueva Region</li>
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
                            <h3 class="card-title">Nueva Region</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('region.update',$region->id)}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Nombre  </label>
                                    <input type="text" id="inputName" name="nombre" value="{{$region->nombre}}" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Url Seo  </label>
                                    <input type="text" id="inputName" name="url_seo" class="form-control" value="{{$region->url_seo}}" required >
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
