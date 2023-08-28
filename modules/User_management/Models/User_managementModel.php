<?php 
namespace User_management\Models;
use \CodeIgniter\Model;

class User_managementModel extends Model
{
  protected $table = 'user_management';
  protected $primaryKey = 'id';
  protected $allowedFields = [];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $useSoftDeletes = true;
  // protected $deletedField  = 'deleted_at';
  // protected $skipValidation  = false;

  protected $returnType = 'User_management\Entities\User_management';
}
