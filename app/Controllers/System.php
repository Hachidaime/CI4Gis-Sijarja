<?php

/**
 * @desc this class will associated with system management.
 * 
 * @class System
 * @constructor
 * @extends BaseController
 * @author Garis Razzaq
 */

namespace App\Controllers;

use App\Models\SystemModel;

class System extends BaseController
{
  /**
   * @desc variable of the preffered model instance.
   * 
   * @var App\Models\SystemModel
   */

  protected $model;

  //--------------------------------------------------------------------

  /**
   * @desc variable of the preffered validation instance.
   */

  protected $validation;

  protected $pager;

  //--------------------------------------------------------------------

  public function __construct()
  {
    $this->model = new SystemModel();

    $this->validation = \Config\Services::validation();

    $pager = \Config\Services::pager();
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle to set system session
   * 
   * @method setSystem()
   * @param string $data
   */

  public function setSystemSession($data)
  {
    $system = $this->model->getSystem($data);
    session()->set(['system' => $system['name']]);
    return redirect()->to('/');
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle system default page
   * 
   * @method index()
   */

  public function index()
  {
    # code...
    // ? Data to assign on view
    $data = [
      'title' => 'Sistem',
    ];

    // Todo: return view for current method
    return view('System/index', $data);
  }

  public function search()
  {
    $perPage = ROW_PER_PAGE;

    list($list, $count, $pager) = $this->model->setPager();

    $data = [
      'list' => $list,
      'pager' => $pager,
      'page' => $this->request->getVar('page_system') ?? 1,
      'perPage' => $perPage,
      'count' => $count
    ];

    echo \json_encode($data);
    exit;
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle add system
   * 
   * @method index()
   */

  public function add()
  {
    // ? Data to assign on view
    $data = [
      'title' => 'Tambah Data Sistem',
    ];
    \helper(['form']);

    // Todo: check Post Request on submit profile form
    if ($this->request->getMethod() == 'post') {
      // ? Validation rules
      $this->validation->setRules([
        'name' => [
          'label' => '<b>Nama Sistem</b>',
          'rules' => 'required|min_length[3]|max_length[20]|is_unique[system.name]',
          'errors' => [
            'required' => '{field} tidak boleh kosong.',
            'min_length' => '{field} tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => '{field} tertalu panjang, tidak boleh melebihi {param} karakter.',
            'is_unique' => '{field} [{value}] sudah ada dalam database.'
          ]
        ],
        'sort' => [
          'label' => '<b>Urutan</b>',
          'rules' => 'required|is_unique[system.sort]|greater_than[0]',
          'errors' => [
            'required' => '{field} tidak boleh kosong.',
            'is_unique' => '{field} [{value}] sudah ada dalam database.',
            'greater_than' => '{field} harus lebih dari {param}.'
          ]
        ]
      ]);

      // Todo: validate update profile
      if (!$this->validation->withRequest($this->request)->run()) {
        // Todo: set error messages to data
        $data['validation'] = $this->validation->getErrors();
      } else {
        $slug = url_title($this->request->getVar('name'), '-', true);
        // Todo: update profile data
        $this->model->save([
          'slug' => $slug,
          'name' => $this->request->getVar('name'),
          'sort' => $this->request->getVar('sort'),
        ]);
        $data['success'] = true;
      }

      // Todo: set callback data
      echo \json_encode($data);
      exit;
    }

    // Todo: return view for current method
    return view('System/add', $data);
  }
}
