<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Dashboard',
    ];
    return view('Dashboard/index', $data);
  }
}
