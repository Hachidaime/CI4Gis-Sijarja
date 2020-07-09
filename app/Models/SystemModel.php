<?php

/**
 * @desc this class will handle system model.
 * @class SystemModel
 * @constructor
 * @extends Model
 * @author Garis Razzaq
 */

namespace App\Models;

use CodeIgniter\Model;

class SystemModel extends Model
{
  /**
   * @desc Name of database table
   *
   * @var string
   */
  protected $table = 'system';

  //--------------------------------------------------------------------

  /**
   * @desc The table's primary key.
   *
   * @var string
   */

  protected $allowedFields = ['name', 'slug', 'sort'];

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
   * @desc this method will handle get system from database
   *
   * @method getSystem
   * @param bool $slug
   */

  public function getSystem($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }

    return $this->where(['slug' => $slug])->first();
  }

  /**
   * @desc this method will handle get data with pagination
   *
   * @method setPager
   * @param int $perPage total row per page
   */

  public function setPager(int $perPage = ROW_PER_PAGE)
  {
    $request = \Config\Services::request();

    if (!empty($request->getVar('keyword'))) {
      $this->like('name', $request->getVar('keyword'));
    }

    $list = $this->paginate($perPage, 'system');
    $count = $this->countRows();
    $pager = $this->pager->links('system', 'paging');

    return [$list, $count, $pager];
  }

  public function countRows()
  {
    $request = \Config\Services::request();

    if (!empty($request->getVar('keyword'))) {
      $this->like('name', $request->getVar('keyword'));
    }

    $count = $this->countAllResults();

    return $count;
  }
}
