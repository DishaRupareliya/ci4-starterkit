<?php 
namespace Settings\Controllers;
use CodeIgniter\Email\Email;
use BackupManager\Filesystems\Destination;
use App\Libraries\BackupSettings;
use Settings\Controllers\Loader;

class Settings extends Loader
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
                $settings = encode_values($settings, config('App')->encryption_key);
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

    public function backup()
    {
        if (!class_exists('BackupManager\Filesystems\Destination')) {
            return;
        }

        $manager = require 'bootstrap.php';
        $manager
            ->makeBackup()
            ->run('development', [
                new Destination('local', 'test/backup.sql'),
                new Destination('s3', 'test/dump.sql')
            ], 'gzip');
        //$data = BackupSettings::backup();
        exit();
        // $path = base_url('uploads/dbbackup/') ;
        // $filename = $dbname.'_'.date('Y-m-d').'.sql';
        // $prefs = ['filename' => $filename];

        // $util = (new \CodeIgniter\Database\Database())->loadUtils($db);
        // $backup = $util->backup($prefs,$db);
        // echo "<pre>";
        // print_r ($backup);
        // echo "</pre>";
        // exit();
            
        // write_file($path.$filename.'.gz', $backup); 
        // return $this->response->download($path.$filename.'.gz',null);
    }

}
