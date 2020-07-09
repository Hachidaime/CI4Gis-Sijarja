<?php

namespace App\Controllers;

class StaticPage extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Home',
      'menu' => 'home'
    ];
    return view('StaticPage/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About me',
      'menu' => 'about'
    ];
    return view('StaticPage/about', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact',
      'menu' => 'contact'
    ];
    return view('StaticPage/contact', $data);
  }

}
