<?php
function redirigirURL($url = '')
{
  header("Location: " . base_url($url));
  exit();
}

function consultar($url, $token = '', $datos = null, $rutaEnlace = '', $tipo = 'GET')
{
  try {
    if($rutaEnlace == '')
      $rutaEnlace = 'https://debisoft.technology/ws_debifact/';
    $curl = curl_init();
    $head = array(
      CURLOPT_URL => $rutaEnlace . $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => $tipo,
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization: ' . $token
      ),
    );
    if($tipo != 'GET')
      $head['CURLOPT_POSTFIELDS'] = json_encode($datos);
    curl_setopt_array(
      $curl,
      $head
    );
    $response = curl_exec($curl);
    curl_close($curl);
    $o_res = json_decode($response);
  } catch (\Throwable $th) {
    $o_res = imprimirError('9999', $th->getMessage());
  }
  return (array) $o_res;
}

function imprimirError($error, $mensaje, $datos = null)
{
  if ($datos != null)
    return [
      "error" => $error,
      "mensaje" => $mensaje,
      "datos" => $datos
    ];
  else
    return [
      "error" => $error,
      "mensaje" => $mensaje
    ];
}


function accesoMenu($o_aside){
  $acceso = false;
  foreach ($o_aside['menu'] as $k => $modulo){
    foreach ($modulo['menu'] as $k => $menu) {
      foreach ($menu['subMenu'] as $k => $subMenu) {
        if($modulo['id'] == $o_aside['activo'][0] && $menu['id'] == $o_aside['activo'][1] && $subMenu['id'] == $o_aside['activo'][2])
          $acceso = true;
      }
    }
  }
  return $acceso;
}