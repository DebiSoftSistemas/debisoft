<?php

namespace App\Controllers\Cover;

class Home extends BaseController
{
  protected $req, $session;

  public function __construct()
  {
    $this->req = \Config\Services::request();
    $this->session = \Config\Services::session();
    if (!$this->session->has('idioma')) $this->session->set('idioma', 'es');
    $this->req->setLocale($this->session->get('idioma'));
  }

  public function cover()
  {
    $aside = [
      "idioma" => $this->req->getLocale(),
      "sinAccion" => true 
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/body') . view('Cover/Principal/footer');
  }

  public function contactanos()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/contactanos') . view('Cover/Principal/footer');
  }

  public function debifact()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/debifact') . view('Cover/Principal/footer');
  }

  public function debiconta()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/debiconta') . view('Cover/Principal/footer');
  }
  public function masProductos()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/masProductos') . view('Cover/Principal/footer');
  }
  public function debisicte()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/debisicte') . view('Cover/Principal/footer');
  }
  public function debisijap()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/debisijap') . view('Cover/Principal/footer');
  }

  public function solicitarFirma()
  {
    $aside = [
      "idioma" => $this->req->getLocale()
    ];
    $w_comisionistas = consultar('listaComisionistas/');
    $w_tIdentificacion = consultar('listaTipoIden/');
    $w_tFirma = consultar('listaTipoFirma/');
    $w_cBancarias = consultar('listaTipoCuentas/');
    $w_vigencia = consultar('listaTipoVigencia/');
    $o_body = [
      "comisionistas" => $w_comisionistas['error'] <> '0' ? [] : (array) $w_comisionistas['datos'],
      "tIdentificacion" => $w_tIdentificacion['error'] <> '0' ? [] : (array) $w_tIdentificacion['datos'],
      "tFirma" => $w_tFirma['error'] <> '0' ? [] : (array) $w_tFirma['datos'],
      "cBancarias" => $w_cBancarias['error'] <> '0' ? [] : (array) $w_cBancarias['datos'],
      "vigencia" => $w_vigencia['error'] <> '0' ? [] : (array) $w_vigencia['datos'],
    ];
    return view('Cover/Principal/header') . view('Cover/Principal/aside', $aside) . view('Cover/solicitarFirma', $o_body);
  }

  
  public function terminos()
  {
      return view('Acconunt/terminos');
  }
 
  public function idioma()
  {
      if (!isset($_POST['idioma']))
          return json_encode(imprimirError('9998', 'idioma not defined'));
      else {
          $this->session->set('idioma', $_POST['idioma']);
          $this->req->setLocale($_POST['idioma']);
          return json_encode(imprimirError('0', 'Correcto', $this->req->getLocale()));
      }
  }

  public function proteccionDatos()
  {
      return view('Acconunt/protecciondatos');
  }

}
