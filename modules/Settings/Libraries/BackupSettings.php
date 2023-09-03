<?php
namespace Settings\Libraries;

use BackupManager\Filesystems\Destination;
use BackupManager\Config\Config;
use BackupManager\Filesystems;
use BackupManager\Databases;
use BackupManager\Compressors;
use BackupManager\Manager;

class BackupSettings
{
    public static function backup() {

        $manager = 'backup_manager';
        $configFileSystemProvider = new Config([
            'local' => [
                'type' => 'Local',
                'root' => ROOTPATH.'public/uploads/backups',
            ],
        ]);
       
        $db = \Config\Database::connect();
        $dbname = $db->database;

        $configDatabase = new Config([
            'production' => [
                'type'     => 'mysql',
                'host'     => $db->hostname,
                'port'     => $db->port,
                'user'     => $db->username,
                'pass'     => $db->password,
                'database' => $db->database,
            ],
            'development' => [
                'type'     => 'mysql',
                'host'     => $db->hostname,
                'port'     => $db->port,
                'user'     => $db->username,
                'pass'     => $db->password,
                'database' => $db->database,
            ],
        ]);

        $filesystems = new Filesystems\FilesystemProvider($configFileSystemProvider);
        $filesystems->add(new Filesystems\Awss3Filesystem);
        $filesystems->add(new Filesystems\GcsFilesystem);
        $filesystems->add(new Filesystems\DropboxFilesystem);
        $filesystems->add(new Filesystems\FtpFilesystem);
        $filesystems->add(new Filesystems\LocalFilesystem);
        $filesystems->add(new Filesystems\RackspaceFilesystem);
        $filesystems->add(new Filesystems\SftpFilesystem);
        $filesystems->add(new Filesystems\WebdavFilesystem);

        $databases = new Databases\DatabaseProvider($configDatabase);
        $databases->add(new Databases\MysqlDatabase);
        $databases->add(new Databases\PostgresqlDatabase);

        $compressors = new Compressors\CompressorProvider;
        $compressors->add(new Compressors\GzipCompressor);
        $compressors->add(new Compressors\NullCompressor);

        $manager = new Manager($filesystems, $databases, $compressors);

        $backup_name = $dbname.'_'.date('Y-m-d-H-i-s').'.sql';

        try {
            $manager->makeBackup()->run('development', [new Destination('local', $backup_name)], 'null');
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
