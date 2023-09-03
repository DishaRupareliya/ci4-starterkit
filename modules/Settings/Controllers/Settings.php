<?php 
namespace Settings\Controllers;

use CodeIgniter\Email\Email;
use BackupManager\Filesystems\Destination;
use \Settings\Libraries\BackupSettings;
use CodeIgniter\HTTP\Download;

class Settings extends \App\Controllers\BaseController
{
    // Define a class property to store backup settings
    protected $backupSettings;

    public function __construct()
    {
        // Constructor method to initialize the backupSettings property with a new BackupSettings instance
        $this->backupSettings = new BackupSettings();
    }

    // This function is use to display the default setting page
    public function index() {
        $viewData = [];
        $viewData['title'] = "Settings";
        return view('Settings\Views\manage_settings', $viewData);
    }

    // This function is use to display specific settings view
    public function settings_view() {
        // Get posted data from the request
        $posted_data = $this->request->getVar();
        $data['title'] = $posted_data['title'];

        // Display the settings view based on the provided view name
        echo view('Settings\Views/'.$posted_data['settings_view_name'].'', $data);
    }

    // This function is use to save all settings
    public function saveSettings()
    {
        // Get posted data from the request and sanitize it
        $posted_data = $this->request->getVar(null, FILTER_SANITIZE_SPECIAL_CHARS);

        // Get uploaded image files
        $image = $this->request->getFiles();

        // Process each uploaded image
        foreach ($image as $key => $value) {
            if(!empty($value->guessExtension())) {
                $name = $key.'.'.$value->guessExtension();
                // Move the image to a specific directory
                $value->move(ROOTPATH.'/public/uploads/general',$name);
                 // Update the settings with the image file name
                service('settings')->set('App.'.$key, $name);
            }
        }

         // Update other settings based on posted data
        foreach ($posted_data as $key => $settings) {
            if ('smtp_password' == $key) {
                // Encode the SMTP password using a specific encryption key
                $settings = encode_values($settings, config('App')->encryption_key);
            }
            // Update the settings with the posted values
            service('settings')->set('App.'.$key, $settings);
        }
        
        // Return a JSON response indicating success
        return $this->response->setJSON(['success' => true]);
    }

    //This function is use to delete specific setting by name
    public function deleteSettings($name='')
    {
        // Get the image name associated with the setting
        $image_name = service('settings')->get('App.'.$name);
        // Delete the corresponding image file
        unlink(ROOTPATH.'/public/uploads/general/'.$image_name);
        // Remove the setting from the configuration
        service('settings')->forget('App.'.$name);
        // Return a JSON response indicating success
        return $this->response->setJSON(['success' => true]);
    }

    // This function is use to send test email
    public function sendTestMail()
    {
        // Get posted data from the request
        $posted_data = $this->request->getPost();

        // Send a test email and check if it was successful
        $send = send_app_mail($posted_data['email'], 'SMTP testing mail',  get_option('email_header').'If you received this message that means that your SMTP settings is set correctly'.get_option('email_footer'));

        // Prepare a response with the result of the email sending
        $data = [
            'type'    => ($send) ? 'success' : 'error',
            'message' => ($send) ? 'Test mail sent successfully' : 'Set mail settings correctly',
        ];

        // Return a JSON response with the email sending result
        return $this->response->setJSON($data);
    }

    public function backup()
    {
        // Perform the database backup and store the success status.
        $success = $this->backupSettings->backup();

        // Prepare a response indicating the backup status.
        $response = [
            'type'  => ($success) ? 'success' : 'error',
            'message' => ($success) ? 'Database backup successfully' : 'Please try again',
        ];
       
        // Return the response in JSON format.
        return $this->response->setJSON($response);
    }

    public function download($filename = '')
    {
        // Build the full filename with the '.sql' extension.
        $fullname = $filename . '.sql';

        // Construct the full path to the backup file.
        $fullPath = ROOTPATH . 'public/uploads/backups/' . $fullname;

        if (file_exists($fullPath)) {
            // Set the appropriate headers for file download.
            $this->response->setHeader('Content-Type', 'application/octet-stream');
            $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $fullname . '"');

            // Read and output the file content.
            $this->response->setBody(file_get_contents($fullPath));

            // Return the response to initiate the download.
            return $this->response;
        }
    }

    public function deleteBackup($filename = '')
    {
        // Construct the full path to the backup file.
        $fullPath = ROOTPATH . 'public/uploads/backups/' . $filename;

        if (file_exists($fullPath)) {
            // If the file exists, delete it.
            unlink($fullPath);
        }
        // Redirect to the admin settings page after deletion.
        return redirect()->to('admin/settings');
    }


}
