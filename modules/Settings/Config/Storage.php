<?php

namespace Settings\Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\Paths;

class Storage extends BaseConfig
{
	
    public $Storage = [
		    'local' => [
		        'type' => 'Local',
		        'root' => '../../',
		    ],
		    's3' => [
		        'type' => 'AwsS3',
		        'key'    => '',
		        'secret' => '',
		        'region' => 'us-east-1',
		        'version' => 'latest',
		        'bucket' => '',
		        'root'   => '',
		        'use_path_style_endpoint' => false,
		    ],
		    'gcs' => [
		        'type' => 'Gcs',
		        'key'    => '',
		        'secret' => '',
		        'version' => 'latest',
		        'bucket' => '',
		        'root'   => '',
		    ],
		    'rackspace' => [
		        'type' => 'Rackspace',
		        'username' => '',
		        'password' => '',
		        'container' => '',
		    ],
		    'dropbox' => [
		        'type' => 'Dropbox',
		        'token' => '',
		        'key' => '',
		        'secret' => '',
		        'app' => '',
		        'root' => '',
		    ],
		    'ftp' => [
		        'type' => 'Ftp',
		        'host' => '',
		        'username' => '',
		        'password' => '',
		        'root' => '',
		        'port' => 21,
		        'passive' => true,
		        'ssl' => true,
		        'timeout' => 30,
		    ],
		    'sftp' => [
		        'type' => 'Sftp',
		        'host' => '',
		        'username' => '',
		        'password' => '',
		        'root' => '',
		        'port' => 21,
		        'timeout' => 10,
		        'privateKey' => '',
		    ],
		    'webdav' => [
		        'type' => 'webdab',
		        'host' => '',
		        'username' => '',
		        'password' => '',
		        'root' => '',
		        'port' => 21,
		        'timeout' => 10,
		        'privateKey' => '',
		    ],
		];
   
}


