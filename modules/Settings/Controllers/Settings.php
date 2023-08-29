<?php 
namespace Settings\Controllers;

class Settings extends \App\Controllers\BaseController
{
    public function index() {
        $viewData = [];
        $viewData['title'] = "Settings";
        return view('Settings\Views\manage_settings', $viewData);
    }

    public function settings_view() {
        $posted_data = $this->request->getVar();
        $data['title'] = $posted_data['title'];
        echo view('Settings\Views/'.$posted_data['settings_view_name'].'', $data);
    }

    public function saveSettings()
    {
        $posted_data = $this->request->getVar(null, FILTER_SANITIZE_SPECIAL_CHARS);
        $image = $this->request->getFiles();

        foreach ($image as $key => $value) {
            if(!empty($value->guessExtension())) {
                $name = $key.'.'.$value->guessExtension();
                $value->move(ROOTPATH.'/public/uploads/general',$name);
                service('settings')->set('App.'.$key, $name);
            }
        }

        foreach ($posted_data as $key => $settings) {
            service('settings')->set('App.'.$key, $settings);
        }

        return $this->response->setJSON(['success' => true]);
    }
}
