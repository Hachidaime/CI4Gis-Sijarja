<?php

namespace App\Controllers;

class Gis extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'GIS',
      'menu' => 'gis'
    ];
    return view('Gis/index', $data);
  }
}
