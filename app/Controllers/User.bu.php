<?php

/**
 * @desc this class will associated with user intraction.
 * Such as login, update user profile, add new user, edit existing user, remove user.
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
   * @desc variable of the preffered model should be used.   
   */
  protected $model;

  public function __construct()
  {
    $this->model = new UserModel();
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle user login
   * @method login()
   */
  public function login()
  {
    // ? Data to assign on view
    $data = [
      'title' => 'Login',
    ];
    helper(['form']);

    // Todo check Post Request on submit login form
    if ($this->request->getMethod() == 'post') {
      // ? Login form validation rules
      $rules = [
        'username' => 'required|min_length[6]|max_length[20]',
        'password' => 'required|min_length[8]|max_length[255]|validateUser[username,password]',
      ];

      // ? Custom messages on error validation
      $errors = [
        'username' => [
          'required' => 'Username tidak boleh kosong.',
          'min_length' => 'Username tertalu pendek, harus memiliki setidaknya {param} karakter.',
          'max_length' => 'Username tertalu panjang, tidak melebihi {param} karakter.'
        ],
        'password' => [
          'required' => 'Password tidak boleh kosong.',
          'min_length' => 'Password tertalu pendek, harus memiliki setidaknya {param} karakter.',
          'max_length' => 'Password tertalu panjang, tidak melebihi {param} karakter.',
          'validateUser' => 'Username atau Password tidak cocok.'
        ]
      ];

      // Todo validate user login
      if (!$this->validate($rules, $errors)) {
        // Todo set error message to data
        $data['validation'] = $this->validator;
      } else {
        // Todo set session for logged user
        $user = $this->model->where('username', $this->request->getVar('username'))->first();
        $this->setUserSession($user);

        // Todo redirect after success login
        return redirect()->to('/');
      }
    }

    // Todo return view for current method
    return view('User/login', $data);
  }

  //--------------------------------------------------------------------

  public function register()
  {
    $data = [];
    helper(['form']);

    if ($this->request->getMethod() == 'post') {
      $rules = array_merge($this->model->userRules, $this->model->registerRules, $this->model->passwordRules);

      if (!$this->validate($rules)) {
        $data['validation'] = $this->validator;
      } else {
        $this->model->save($this->newData());
        session()->setFlashdata('success', 'Successful Registration');
        return redirect()->to('/');
      }
    }

    return view('User/register', $data);
  }

  //--------------------------------------------------------------------

  public function profile()
  {
    $data = [
      'title' => 'Profil'
    ];
    helper(['form']);

    if ($this->request->getMethod() == 'post') {
      $rules = $this->model->userRules;

      if (!empty($this->request->getPost('password'))) {
        $rules = array_merge($rules, $this->model->passwordRules);
      }

      if (!$this->validate($rules)) {
        $data['validation'] = $this->validator->getErrors();
      } else {
        $this->model->save($this->newData(true));
        $data['success'] = true;
      }
      echo \json_encode($data);
      exit;
    }

    $data['user'] = $this->model->where('id', session()->get('id'))->first();

    return view('User/profile', $data);
  }

  //--------------------------------------------------------------------

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }

  //--------------------------------------------------------------------

  private function setUserSession($user)
  {
    $data = [
      'id' => $user['id'],
      'name' => $user['name'],
      'email' => $user['email'],
      'username' => $user['username'],
      'isLoggedIn' => true,
    ];

    session()->set($data);
    return true;
  }

  //--------------------------------------------------------------------

  private function newData($isUpdate = false)
  {
    $newData = [
      'name' => $this->request->getVar('name'),
      'email' => $this->request->getVar('email'),
    ];

    if ($isUpdate) {
      $newData = array_merge($newData, [
        'id' => session()->get('id'),
      ]);

      if (!empty($this->request->getPost('password'))) {
        $newData = array_merge($newData, [
          'password' => $this->request->getVar('password'),
        ]);
      }
    } else {
      $newData = array_merge($newData, [
        'username' => $this->request->getVar('username'),
        'password' => $this->request->getVar('password'),
      ]);
    }

    return $newData;
  }

  //--------------------------------------------------------------------
}
