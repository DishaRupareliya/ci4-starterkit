<?php 
namespace Settings\Controllers;
use CodeIgniter\Email\Email;

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
            if ('smtp_password' == $key) {
                $settings = encode_values($settings, 'smtp_pass');
            }
            service('settings')->set('App.'.$key, $settings);
        }
        
        return $this->response->setJSON(['success' => true]);
    }

    public function deleteSettings($name='')
    {
        $image_name = service('settings')->get('App.'.$name);
        unlink(ROOTPATH.'/public/uploads/general/'.$image_name);
        service('settings')->forget('App.'.$name);

        return $this->response->setJSON(['success' => true]);
    }

    public function sendTestMail()
    {
        $posted_data = $this->request->getPost();

        $send = send_app_mail($posted_data['email'], 'SMTP testing mail',  get_option('email_header').'If you received this message that means that your SMTP settings is set correctly'.get_option('email_footer'));

        $data = [
            'type'    => ($send) ? 'success' : 'error',
            'message' => ($send) ? 'Test mail sent successfully' : 'Set mail settings correctly',
        ];

        return $this->response->setJSON($data);
    }
}
