@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <h1>Registrar Paciente</h1>
    @if (count($errors)>0)
      <div class="alert alert-danger">
        <p>Corregir los siguientes campos:</p>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
</div>
<div class="row">
    <div class="col-xl-2">
        <input type="text" id="dni" class="form-control" placeholder="Escriba el DNI" maxlength="8" minlength="8" autofocus>
    </div>
    <div class="col-xl-2">
        <button id="btnbuscar" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
    </div>
    <div class="col-xl-4">
        <label id="mensaje" style="color: red;display: none;font-size: 12pt;">El numero de DNI no es valido.</label>
    </div>
</div>
<form action="{{url('paciente')}}" method="POST" class="my-3">
    @method('POST')
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xl-2 col-md-6">
            <div class="form-group">
                <label for="">DNI *</label>
                <input type="text" name="pac_dni" id="txtdni" class="form-control" required maxlength="8" minlength="8" value="{{old('pac_dni')}}">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Apellidos *</label>
                <input type="text" name="pac_apellidos" id="txtapellidos" class="form-control" maxlength="50" required style="text-transform:uppercase;" value="{{old('pac_apellidos')}}">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Nombres *</label>
                <input type="text" name="pac_nombres" id="txtnombres" class="form-control" maxlength="50" required style="text-transform:uppercase;" value="{{old('pac_nombres')}}" >
            </div>
        </div>
        <div class="col-xl-12 col-md-6">
            <div class="form-group">
                <label for="">Direccion</label>
                <input type="text" name="pac_direccion" maxlength="70" class="form-control" value="{{old('pac_direccion')}}" >
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">Sexo *</label>
                <select name="pac_sexo" class="form-control" required>
                  <option value="" hidden>--- Seleccione ---</option>
                  <option value="1" @if (old('pac_sexo') == "1") {{ 'selected' }} @endif>Femenino</option>
                  <option value="2" @if (old('pac_sexo') == "2") {{ 'selected' }} @endif>Masculino</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">Fecha de Nacimiento *</label>
                <input type="date" name="pac_fechnac" class="form-control" required value="{{old('pac_fechnac')}}" >
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">Teléfono</label>
                <input type="text" name="pac_telefono" class="form-control" maxlength="13" value="{{old('pac_telefono')}}" >
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" name="pac_email" class="form-control" value="{{old('pac_email')}}" >
            </div>
        </div>
        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" value="Registrar" class="btn btn-primary">
                <a href="{{url('paciente')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#btnbuscar').click(function(){
            var numdni=$('#dni').val();
            if (numdni!='') {
                $.ajax({
                    url:"{{ route('consultar.reniec') }}",
                    method:'GET',
                    data:{dni:numdni},
                    dataType:'json',
                    success:function(data){
                        var resultados=data.estado;
                        if (resultados==true) {
                            $('#txtdni').val(data.dni);
                            $('#txtnombres').val(data.nombres);
                            $('#txtapellidos').val(data.apellidos);
                        }else{
                            $('#txtdni').val('');
                            $('#txtnombres').val('');
                            $('#txtapellidos').val('');
                            $('#mensaje').show();
                            $('#mensaje').delay(2000).hide(2500);
                        }
                    }
                });
            }else{
                alert('Escribir el DNI');
                $('#dni').focus();
            }
        });
    });
</script>
@endsection
