<?php

/**
 * @desc this class will handle user rules validation.
 * 
 * @class UserRules
 * @author Garis Razzaq
 */

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
  /**
   * @desc this method will handle matching between username and password on user login validation
   * 
   * @method validateUser()
   * @param string $st
   * @param string $fields
   * @param array $data
   */

  public function validateUser(string $st, string $fields, array $data)
  {
    $model = new UserModel();
    $user = $model->where('username', $data['username'])->first();

    if (!$user) return false;

    return password_verify($data['password'], $user['password']);
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle matching between username and password on change password
   * 
   * @method validateUser()
   * @param string $st
   * @param string $fields
   * @param array $data
   */

  public function validatePassword(string $st, string $fields, array $data)
  {
    $model = new UserModel();
    $user = $model->where('username', $data['username'])->first();

    if (!$user) return false;

    return password_verify($data['old_password'], $user['password']);
  }
}
