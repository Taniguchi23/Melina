@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Evento</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{route('evento.index')}}">Evento</a></li>
                            <li class="breadcrumb-item active">Editar Evento</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{route('evento.update',$evento->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Componer El Nuevo Evento</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="titulo" value="{{$evento->titulo}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="slug" value="{{$evento->slug}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contenido" value="{{$evento->contenido}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="descripcion" value="{{$evento->descripcion}}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fecha" value="{{$evento->fecha}}" required>
                                    </div>
                                    <div class="form-group">
                                        <img src="{{Storage::url($evento->imagen)}}" alt="" style="width: 200px">
                                        <input type="text" class="form-control" name="imagen"  value="{{$imagen}}">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar Evento</button>
                                    </div>
                                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
@endsection
@section('content_script')
    <script>
        $(function () {
            //Add text editor
            $('#compose-textarea').summernote()
        })
    </script>

@endsection
