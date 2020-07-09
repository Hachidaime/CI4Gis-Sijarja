<?php

namespace App\Controllers;

class Pengaduan extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Pengaduan',
      'menu' => 'pengaduan'
    ];
    return view('Pengaduan/index', $data);
  }
}
