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

    public function index() {
        $viewData          = [];
        $viewData['title'] = 'Dashboard';
        return view('dashboard', $viewData);
    }

    // View user profile data
    public function userView()
    {
        $viewData          = [];
        $viewData['title'] = 'User Management';
        return view('User_management\Views\user', $viewData);
    }

    // Manage user with permission and roles
    public function manageUser()
    {
        $viewData                = [];
        $viewData['title']       = 'User Management';
        $viewData['permissions'] =  $this->permission->find();
        return view('User_management\Views\manageUser', $viewData);
    }

    public function saveUser()
    {
        // $data = $this->request->getPost();
        // $res = $this->checkValidateUser($data);
       
        $res = false;
        if ($this->request->getPost()) {
            $res = $this->userModel->save($this->request->getPost());
        }
        return $res;
    }

    // public function checkValidateUser($posted_data='')
    // {
        
    // }
}
