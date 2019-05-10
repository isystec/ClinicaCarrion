<?php
  function calculaedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia = date("d") - $dia;
    if ($dia_diferencia < 0 && $mes_diferencia <= 0)
    $ano_diferencia--;
    return $ano_diferencia;
  }
?>
<!DOCTYPE html>
<html lang="en">
  @foreach ($historiasclinicas as $hc)
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Historia Clinica N° {{$hc->hc_id}}</title>
    <style>
      .page-break {
          page-break-after: always;
      }
    </style>
  </head>
  <body>
    <div class="header-wrapper">
      <div class="text-center">
        <img src="{{asset('img/logo2.png')}}">
      </div>
    </div>
    <section>
      <div class="row">
        <div class="col-xs-12">
            <h5>1.FILIACIÓN:</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <p>Nombre: {{$hc->pac_apellidos.', '.$hc->pac_nombres}}</p>
        </div>
        <div class="col-xs-6">
          <p>Teléf.: {{$hc->pac_telefono}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <p>Edad: <?php echo calculaedad ($hc->pac_fechnac); ?></p>
        </div>
        <div class="col-xs-6">
          <p>Fecha de Nacimiento: {{$hc->pac_fechnac}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <p>Dirección: {{$hc->pac_direccion}}</p>
        </div>
      </div>
    </section>
    <section>
      <div class="row">
        <div class="col-xs-2">
          <h5>2.ANTECEDENTES:</h5>
        </div>
        <div class="col-xs-4">
          ALERGIAS: {{$hc->hc_alergias}}
        </div>
        <div class="col-xs-3">
          HTA: {{$hc->hc_hta}}
        </div>
        <div class="col-xs-3">
          DM: {{$hc->hc_dm}}
        </div>
      </div>
    </section>
    <section>
      <div class="row">
        <div class="col-xs-2">
          <h5>3.ANAMNESIS:</h5>
        </div>
        <div class="col-xs-8">
          <p class="text-justify">{{$hc->hc_anamnesis}}</p>
        </div>
      </div>
    </section>
    <section>
      <div class="row">
        <div class="col-xs-12">
          <h5>4.EXAMEN CLÍNICO:</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-2">
          PA: {{$hc->hc_pa}}
        </div>
        <div class="col-xs-2">
          FC: {{$hc->hc_fc}}
        </div>
        <div class="col-xs-2">
          T°: {{$hc->hc_t}}
        </div>
        <div class="col-xs-2">
          FR: {{$hc->hc_fr}}
        </div>
        <div class="col-xs-2">
          PESO: {{$hc->hc_peso}}
        </div>
      </div>
      <br>
      <div class="row">
        <table class="">
          <tr>
            <td  class="text-right" style="width:220px;">Aspecto General</td>
            <td style="width:20px;"></td>
            <td style="width:500px;">{{$hc->hc_aspectogeneral}}</td>
          </tr>
          <tr>
            <td class="text-right">Estado de Conciencia</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_estadoconciencia}}</td>
          </tr>
          <tr>
            <td class="text-right">Piel</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_piel}}</td>
          </tr>
          <tr>
            <td class="text-right">Cabeza</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_cabeza}}</td>
          </tr>
          <tr>
            <td class="text-right">Cuello</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_cuello}}</td>
          </tr>
          <tr>
            <td class="text-right">Tórax</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_torax}}</td>
          </tr>
          <tr>
            <td class="text-right">Cardiovascular</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_cardiovascular}}</td>
          </tr>
          <tr>
            <td class="text-right">Abdomen</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_abdomen}}</td>
          </tr>
          <tr>
            <td class="text-right">Genitouriano</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_genitouriano}}</td>
          </tr>
          <tr>
            <td class="text-right">Osteomuscular</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_osteomuscular}}</td>
          </tr>
          <tr>
            <td class="text-right">Neurológico</td>
            <td style="width:2px;"></td>
            <td>{{$hc->hc_neurologico}}</td>
          </tr>
        </table>
        <br>
      </div>
      <div class="row mt-2">
        <div class="col-xs-4">
          <table class="table-bordered text-center">
            <caption>EXÁMENES AUXILIARES:</caption>
            <tr>
              <td style="width:40px;">SS.</td>
              <td style="width:200px;">{{$hc->hc_ss1}}</td>
            </tr>
            <tr>
              <td>D/C</td>
              <td>{{$hc->hc_dc1}}</td>
            </tr>
            <tr>
              <td>Res.</td>
              <td>{{$hc->hc_res1}}</td>
            </tr>
            <tr>
              <td>SS.</td>
              <td>{{$hc->hc_ss2}}</td>
            </tr>
            <tr>
              <td>D/C</td>
              <td>{{$hc->hc_dc2}}</td>
            </tr>
            <tr>
              <td>Res.</td>
              <td>{{$hc->hc_res2}}</td>
            </tr>
            <tr>
              <td>SS.</td>
              <td>{{$hc->hc_ss3}}</td>
            </tr>
            <tr>
              <td>D/C</td>
              <td>{{$hc->hc_dc3}}</td>
            </tr>
            <tr>
              <td>Res.</td>
              <td>{{$hc->hc_res3}}</td>
            </tr>
          </table>
        </div>
        <div class="col-xs-7">
          <p class="text-center">DIAGNÓSTICO (Dx):</p>
          <p class="text-justify">{{$hc->hc_diagnostico}}</p>
          <p class="text-center">TRATAMIENTO (Rp)</p>
          <p class="text-justify">{{$hc->hc_tratamiento}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <p>CIE 10: {{$hc->hc_idcie10}}</p>
        </div>
        <div class="col-xs-6">
          <p>Firma:</p>
          <img src="{{asset('img/firmas/'.$hc->emp_dni.'.png')}}" width="80" height="70"/>
        </div>
      </div>
    </section>
    <div class="page-break"></div>
    @endforeach
  </body>
</html>
