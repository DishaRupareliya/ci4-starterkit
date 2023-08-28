<?php 
namespace User_management\Controllers;

class User_management extends \App\Controllers\BaseController
{
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
        return view('User_management\Views\manageUser', $viewData);
    }

}
