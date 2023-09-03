<?php

if (!function_exists("get_logged_in_user")) {
	function get_logged_in_user() {
		$db = \Config\Database::connect();
		$builder = $db->table("users");
        $builder->select("users.id as id, username, auth_groups_users.group");
        $builder->join("auth_groups_users", "auth_groups_users.user_id = users.id");
		return $builder->getWhere(["users.id" => user_id()])->getRow();
	}
}

if(!function_exists('get_option')) {
	function get_option($value) {
		return service('settings')->get('App.'.$value);
	}
}

if (!function_exists('send_app_mail')) {
	function send_app_mail($to, $subject, $message, $optoins = array(), $convert_message_to_html = true) 
	{
		$email_config = [
			'charset' => 'utf-8',
			'mailType' => 'html'
		];
	    //check mail sending method from settings
		if (get_option("email_protocol") === "smtp") {
			$email_config["protocol"] = get_option('email_protocol');
			$email_config["SMTPHost"] = get_option("smtp_host");
			$email_config["SMTPPort"] = get_option("smtp_port");
			$email_config["SMTPUser"] = get_option("smtp_username");
			$email_config["SMTPPass"] = decode_values(get_option('smtp_password'), config('App')->encryption_key);
			$email_config["SMTPCrypto"] = get_option("smtp_encryption");
			
			if (!$email_config["SMTPCrypto"]) {
	            $email_config["SMTPCrypto"] = "tls"; //for old clients, we have to set this by default
	        }

	        if ($email_config["SMTPCrypto"] === "none") {
	        	$email_config["SMTPCrypto"] = "";
	        }
	    }
	    
	    $email = \CodeIgniter\Config\Services::email();
	    $email->initialize($email_config);
	    $email->clear(true); //clear previous message and attachment

	    $email->setNewline("\r\n");
	    $email->setCRLF("\r\n");
	    $email->setFrom(get_option("smtp_email"));

	    $email->setTo($to);
	    $email->setSubject($subject);

	    if ($convert_message_to_html) {
	    	$message = htmlspecialchars_decode($message);
	    }

	    $email->setMessage($message);
	    //add attachment
	    $attachments = get_array_value($optoins, "attachments");
	    if (is_array($attachments)) {
	    	foreach ($attachments as $value) {
	    		$file_path = get_array_value($value, "file_path");
	    		$file_name = get_array_value($value, "file_name");
	    		$email->attach(trim($file_path), "attachment", $file_name);
	    	}
	    }

	    //check cc
	    $cc = get_array_value($optoins, "cc");
	    if ($cc) {
	    	$email->setCC($cc);
	    }

	    //check bcc
	    $bcc = get_array_value($optoins, "bcc");
	    $bcc.=get_option('bcc_emails');    

	    if ($bcc) {
	    	$email->setBCC($bcc);
	    }

	    //send email
	    if ($email->send()) {
	    	return true;
	    } else {
	    	return false;
	    }
	}
}

if (!function_exists('decode_values')) {
	function decode_values($data = "", $salt = "") 
	{
		if ($data && $salt) {
			if (strlen($data) > 100) {
	            //encoded data with encode_id
	            //return with decode
				return decode_id($data, $salt);
			} else {
	            //old data, return as is
				return $data;
			}
		}
	}
}

if (!function_exists('decode_id')) {
	function decode_id($id, $salt) 
	{
		$encrypter = get_encrypter();
		$id = str_replace("_", "+", $id);
		$id = str_replace("~", "=", $id);
		$id = str_replace("-", "/", $id);
	
		try {
			$id = $encrypter->decrypt(hex2bin($id));
			if ($id && strpos($id, $salt) != false) {
				return str_replace($salt, "", $id);
			} else {
				return "";
			}
		} catch (\Exception $ex) {
			return "";
		}
	}
}

if (!function_exists('encode_values')) {
	function encode_values($id, $salt) 
	{
		$encrypter = get_encrypter();
		$id = bin2hex($encrypter->encrypt($id . $salt));
		$id = str_replace("=", "~", $id);
		$id = str_replace("+", "_", $id);
		$id = str_replace("/", "-", $id);
		return $id;
	}
}

if (!function_exists('get_encrypter')) {
	function get_encrypter() 
	{
		$config         = new \Config\Encryption();
		$config->key    = config('App')->encryption_key;
		$config->driver = 'OpenSSL';
		return \Config\Services::encrypter($config);
	}
}

if (!function_exists('get_array_value')) {
	function get_array_value($array, $key) 
	{
		if (is_array($array) && array_key_exists($key, $array)) {
			return $array[$key];
		}
	}
}

if (!function_exists('list_files')) {
	function list_files($directoryPath='')
	{
		$fileNames = [];
		// Check if the directory exists
		if (is_dir($directoryPath)) {
		    $files = scandir($directoryPath);

		    // Loop through the files and display only files (not directories)
		    foreach ($files as $file) {
		        if (is_file($directoryPath . DIRECTORY_SEPARATOR . $file)) {
		        	array_push($fileNames, $file);
		        }
		    }
		}

		return $fileNames;
	}
}
?>