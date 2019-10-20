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

        <form class="form-horizontal" id="form" method="post" action="{{ route('usuarios.store') }}" enctype="multipart/form-data"> 
                <!-- Proteccion CSRF  -->
                @csrf  

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Nombres (*)</label>
                            <input class="form-control" value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Ingrese el nombre" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Apellidos (*)</label>
                            <input class="form-control" value="{{ old('apellidos') }}" type="text" id="apellidos" name="apellidos" placeholder="Ingrese el apellido" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Cedula (*)</label>
                            <input class="form-control" onblur="validarCedula()" value="{{ old('cedula') }}" type="text" id="cedula" name="cedula" placeholder="Ingrese la cedula" required="" onkeypress="return soloNumeros(event)">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Edad (*)</label>
                            <input class="form-control" value="{{ old('edad') }}" type="number" id="edad" name="edad" placeholder="Ingrese la edad" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" onblur="validarEmail()" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="Ingrese el email" required="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Foto (*)</label>
                            <input class="form-control" type="file" id="path" name="path" accept="image/*" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        
                        <div class="form-group">
                            <label>Contraseña (*)</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese el contraseña" required="">
                        </div>
                    
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>Roles</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione los roles" name ="roles[]" style="width: 100%;" required="">
                                @foreach($roles as $rol)
                                    <option value="{{$rol->id}}" >  {{ $rol->rol }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--align="center"-->
                    <div class="col-md-4 col-xs-12">
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
        $(".select2").select2();

    });

</script>

<script>

$(function() {
    $("form").submit(function(e) {
    
        
            $('button[type=submit]').addClass("disabled-button");
        });
    });


</script>

<script type="text/javascript">    
  var input1=  document.getElementById('cedula');
      input1.addEventListener('input',function(){
        if (this.value.length > 10) 
          this.value = this.value.slice(0,10); 
      })

</script>


<script type="text/javascript">    

function validarCedula() {
    var x = document.getElementById("cedula");
    var cedula = x.value;
   
    $.ajaxSetup({
  
        headers: {
  
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  
    });
  
    if(cedula.length > 0){
  
            //**********************************/
            $.ajax({

                    type:'POST',

                    url: "<?php echo route('buscar_cedula_usuario') ?>",


                    data:{cedula:cedula},
                    beforeSend: function() {
                    $(".loader").show();
                    },

                    success:function(data){
                    
                    $(".loader").hide();
                        
                    if(data == "existe"){
                        swal({
                        title: "Lo sentimos!",
                        text: "La cédula ingresada ya se encuentra registrada",
                        type: "warning",
                        button: "Ok",
                        });

                        document.getElementById("cedula").value = "";
                        document.getElementById("cedula").style.borderColor = "red";
                        
                    }else{

                        document.getElementById("cedula").style.borderColor = "#b5b5b5";

                    }

                }
                        
            });
            //**********************************/
  
      }
     
  }


function validarEmail() {
  var x = document.getElementById("email");
  var email = x.value;
 
  $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });

    if(email.length > 0){


    $.ajax({

      type:'POST',

      url: "<?php echo route('buscar_email_usuario') ?>",


      data:{email:email},
        beforeSend: function() {
        $(".loader").show();
      },

      success:function(data){
        
        $(".loader").hide();
        
      

        if(data == "existe"){
          swal({
        title: "¡Oh no!",
        text: "El email que ingresaste ya se encuentra registrado en el sistema",
        type: "warning",
        button: "Ok",
        });
        document.getElementById("email").value = "";
        document.getElementById("email").style.borderColor = "red";
          

        }else{
          document.getElementById("email").style.borderColor = "#cacaca";
        }


      }

      });

    }
}
   
</script>


@endsection