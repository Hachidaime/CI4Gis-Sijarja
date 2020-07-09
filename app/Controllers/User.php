<?php

/**
 * @desc this class will associated with user intraction.
 * Such as login, update user profile, add new user, edit existing user, remove user.
 * 
 * @class User
 * @constructor
 * @extends BaseController
 * @author Garis Razzaq
 */

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
  /**
   * @desc variable of the preffered model instance.
   * 
   * @var App\Models\UserModel
   */

  protected $model;

  //--------------------------------------------------------------------

  /**
   * @desc variable of the preffered validation instance.
   */

  protected $validation;

  //--------------------------------------------------------------------

  public function __construct()
  {
    $this->model = new UserModel();

    $this->validation = \Config\Services::validation();
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle user login
   * 
   * @method login()
   */

  public function login()
  {
    // ? Data to assign on view
    $data = [
      'title' => 'Login',
    ];
    helper(['form']);

    // Todo: check Post Request on submit login form
    if ($this->request->getMethod() == 'post') {
      // ? Validation rules 
      $this->validation->setRules([
        'username' => [
          'label' => 'Username',
          'rules' => 'required|min_length[6]|max_length[20]',
          'errors' => [
            'required' => 'Username tidak boleh kosong.',
            'min_length' => 'Username tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => 'Username tertalu panjang, tidak melebihi {param} karakter.'
          ]
        ],
        'password' => [
          'label' => 'Password',
          'rules' => 'required|min_length[8]|max_length[255]|validateUser[username,password]',
          'errors' => [
            'required' => 'Password tidak boleh kosong.',
            'min_length' => 'Password tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => 'Password tertalu panjang, tidak boleh melebihi {param} karakter.',
            'validateUser' => 'Username atau Password tidak cocok.'
          ]
        ],
      ]);

      // Todo: validate user login
      if (!$this->validation->withRequest($this->request)->run()) {
        // Todo: set error message to data
        $data['validation'] = $this->validation->getErrors();
      } else {
        // Todo: set session for logged user
        $user = $this->model->where('username', $this->request->getVar('username'))->first();
        $this->setUserSession($user);
        $data['success'] = true;
      }

      // Todo: set callback data
      echo \json_encode($data);
      exit;
    }

    // Todo: return view for current method
    return view('User/login', $data);
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle user profile
   * 
   * @method profile()
   */

  public function profile()
  {
    // ? Data to assign on view
    $data = [
      'title' => 'Profil'
    ];
    helper(['form']);

    // Todo: check Post Request on submit profile form
    if ($this->request->getMethod() == 'post') {
      // ? Validation rules
      $this->validation->setRules([
        'name' => [
          'label' => 'Nama',
          'rules' => 'required|min_length[3]|max_length[20]',
          'errors' => [
            'required' => 'Nama tidak boleh kosong.',
            'min_length' => 'Nama tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => 'Nama tertalu panjang, tidak boleh melebihi {param} karakter.'
          ]
        ],
        'email' => [
          'label' => 'Email',
          'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email,id,' . \session()->get('id') . ']',
          'email' => [
            'required' => 'Email tidak boleh kosong.',
            'min_length' => 'Email tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => 'Email tertalu panjang, tidak boleh melebihi {param} karakter.',
            'valid_email' => 'Email tidak valid.',
            'is_unique' => 'Email sudah ada dalam database.'
          ]
        ]
      ]);

      // Todo: validate update profile
      if (!$this->validation->withRequest($this->request)->run()) {
        // Todo: set error messages to data
        $data['validation'] = $this->validation->getErrors();
      } else {
        // Todo: update profile data
        $this->model->save([
          'id' => session()->get('id'),
          'name' => $this->request->getVar('name'),
          'email' => $this->request->getVar('email'),
        ]);
        $data['success'] = true;
      }

      // Todo: set callback data
      echo \json_encode($data);
      exit;
    }

    // Todo: get current user logged data
    $data['user'] = $this->model->where('id', session()->get('id'))->first();

    // Todo: return view for current method
    return view('User/profile', $data);
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle change user password
   * 
   * @method changePassword()
   */

  public function changePassword()
  {
    $data = [
      'title' => 'Ubah Password'
    ];
    helper(['form']);

    // Todo: check Post Request on submit profile form
    if ($this->request->getMethod() == 'post') {
      // ? Validation rules
      $this->validation->setRules([
        'old_password' => [
          'label' => 'Password Lama',
          'rules' => 'required|min_length[8]|max_length[255]|validatePassword[username,old_password]',
          'errors' => [
            'required' => 'Password Lama tidak boleh kosong.',
            'min_length' => 'Password Lama tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => 'Password Lama tertalu panjang, tidak boleh melebihi {param} karakter.',
            'validatePassword' => 'Password Lama tidak cocok'
          ]
        ],
        'password' => [
          'label' => 'Password Lama',
          'rules' => 'required|min_length[8]|max_length[255]',
          'errors' => [
            'required' => 'Password Baru tidak boleh kosong.',
            'min_length' => 'Password Baru tertalu pendek, harus memiliki setidaknya {param} karakter.',
            'max_length' => 'Password Baru tertalu panjang, tidak boleh melebihi {param} karakter.',
          ]
        ],
        'confirm_password' => [
          'label' => 'Password Lama',
          'rules' => 'matches[password]',
          'errors' => [
            'matches' => 'Konfirmasi Password tidak cocok.'
          ]
        ],
      ]);

      // Todo: validate change password
      if (!$this->validation->withRequest($this->request)->run()) {
        // Todo: set error messages to data
        $data['validation'] = $this->validation->getErrors();
      } else {
        // Todo: change password
        $this->model->save([
          'id' => session()->get('id'),
          'password' => $this->request->getVar('password'),
        ]);
        $data['success'] = true;
      }

      // Todo: set callback data
      echo \json_encode($data);
      exit;
    }

    return view('User/change_password', $data);
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle user logout
   * 
   * @method logout()
   */

  public function logout()
  {
    // Todo: destroy session
    session()->destroy();

    // Todo: redirect to default route
    return redirect()->to('/');
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle to set user session
   * 
   * @method setUserSession()
   * @param array $user data form database
   */

  private function setUserSession(array $user)
  {
    session()->set([
      'id' => $user['id'],
      'name' => $user['name'],
      'email' => $user['email'],
      'username' => $user['username'],
      'isLoggedIn' => true,
    ]);
    return true;
  }

  //--------------------------------------------------------------------
}
