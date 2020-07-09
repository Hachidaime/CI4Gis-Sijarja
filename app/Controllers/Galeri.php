<?php

namespace App\Controllers;

class Galeri extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Galeri',
      'menu' => 'galeri'
    ];
    return view('Galeri/index', $data);
  }
}
