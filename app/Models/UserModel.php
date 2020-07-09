<?php

/**
 * @desc this class will handle user model.
 * @class UserModel
 * @constructor
 * @extends Model
 * @author Garis Razzaq
 */

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  /**
   * @desc Name of database table
   *
   * @var string
   */
  protected $table = 'user';

  //--------------------------------------------------------------------

  /**
   * @desc The table's primary key.
   *
   * @var string
   */

  protected $allowedFields = ['name', 'email', 'username', 'password'];

  //--------------------------------------------------------------------

  /**
   * @desc If true, will set created_at, and updated_at
   * values during insert and update routines.
   *
   * @var boolean
   */

  protected $useTimestamps = true;

  //--------------------------------------------------------------------

  /**
   * @desc Callbacks for beforeInsert
   *
   * @var type
   */

  protected $beforeInsert = ['beforeInsert'];

  //--------------------------------------------------------------------

  /**
   * @desc Callbacks for beforeUpdate
   *
   * @var type
   */

  protected $beforeUpdate = ['beforeUpdate'];

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle callback for beforeInsert
   * 
   * @method beforeInsert()
   * @param array $data
   */

  protected function beforeInsert(array $data)
  {
    $data = $this->passwordHash($data);
    return $data;
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle callback for beforeUpdate
   * 
   * @method beforeUpdate()
   * @param array $data
   */

  protected function beforeUpdate(array $data)
  {
    $data = $this->passwordHash($data);
    return $data;
  }

  //--------------------------------------------------------------------

  /**
   * @desc this method will handle password hashing
   * 
   * @method passwordHash()
   * @param array $data
   */

  protected function passwordHash(array $data)
  {
    if (isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }
}
