<?php 
namespace Settings\Controllers;

use BackupManager\Filesystems;
use BackupManager\Databases;
use BackupManager\Compressors;
use BackupManager\Manager;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use BackupManager\Config\Config;

class Loader extends \App\Controllers\BaseController {
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
    	// build providers
    	$a = $customvalues = new \Settings\Config\Storage();
    
    	
    
		$filesystems = new Filesystems\FilesystemProvider($a);
		$filesystems->add(new Filesystems\Awss3Filesystem);
		$filesystems->add(new Filesystems\GcsFilesystem);
		$filesystems->add(new Filesystems\DropboxFilesystem);
		$filesystems->add(new Filesystems\FtpFilesystem);
		$filesystems->add(new Filesystems\LocalFilesystem);
		$filesystems->add(new Filesystems\RackspaceFilesystem);
		$filesystems->add(new Filesystems\SftpFilesystem);
		$filesystems->add(new Filesystems\WebdavFilesystem);


		$databases = new Databases\DatabaseProvider(config('Database'));
		$databases->add(new Databases\MysqlDatabase);
		$databases->add(new Databases\PostgresqlDatabase);

		$compressors = new Compressors\CompressorProvider;
		$compressors->add(new Compressors\GzipCompressor);
		$compressors->add(new Compressors\NullCompressor);

		// build manager
		return new Manager($filesystems, $databases, $compressors);
	}
}