@extends('layouts.admin')

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            <p><strong>Error!! </strong>Corrija los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content-header">
        <h1>Usuarios</h1>
       
    </section>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Nuevo Usuario</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

        <form class="form-horizontal" id="form" method="post" action="{{ route('usuarios.store') }}"> 
                <!-- Proteccion CSRF  -->
                @csrf  

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Nombres (*)</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Ingrese el nombre" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Apellidos (*)</label>
                            <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Ingrese el apellido" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Cedula (*)</label>
                            <input class="form-control" type="text" id="cedula" name="cedula" placeholder="Ingrese la cedula" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Edad (*)</label>
                            <input class="form-control" type="number" id="edad" name="edad" placeholder="Ingrese la edad" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese el email" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Foto (*)</label>
                            <input class="form-control" type="file" id="path" name="path"  required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>Contraseña (*)</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese la contraseña" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">

                    </div>
                    <div class="col-md-4 col-xs-12">
                    
                    </div>
                </div>








                <div class="row" ><!--Inicio de row -->
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Rol (*)</label>
                                    <input class="form-control" type="text" id="rol" name="rol" placeholder="Ingrese el nrol" required="">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Descripción (*)</label>
                                    <textarea class="form-control" rows="5" id="descripcion" name="descripcion" required=""></textarea>
                                    
                                </div>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha (*)</label>
                                    <input class="form-control" type="date" id="fecha_registro" name="fecha_registro" required="">
                
                                </div>
                            </div>

                            <div class="col-md-12 col-xs-12" align="center">
                                
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            
                            </div>
                      
            
                </div>


            </form>
        </div>
    </div>
@endsection

@section('script')

<script>

$(function() {
       $("form").submit(function(e) {
    
           
             $('button[type=submit]').addClass("disabled-button");
          });
       });


</script>


@endsection