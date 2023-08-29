<?php 
namespace User_management\Controllers;

use CodeIgniter\Model;
use \Permissions\Models\PermissionsModel;
use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Models\UserModel;

class User_management extends \App\Controllers\BaseController
{

    protected $permission;

    /**
    * INDEX USER MANAGEMENT
    * __construct.
    *
    * @return void
    */
    public function __construct()
    {
        $this->permission = new PermissionsModel();
        $this->userModel  = new UserModel();
        $this->userIdentityModel  = new UserIdentityModel();
    }
    
    /**
    * INDEX USER MANAGEMENT
    */
    public function index() {
        $viewData          = [];
        $viewData['title'] = 'Dashboard';
        return view('dashboard', $viewData);
    }

    public function userView()
    {
        $viewData          = [];
        $viewData['title'] = 'User Management';
        return view('User_management\Views\user', $viewData);
    }

    public function manageUser()
    {
        $viewData          = [];
        $viewData['title'] = 'User Management';
        $viewData['permissions'] =  $this->permission->find();
        return view('User_management\Views\manageUser', $viewData);
    }

}
