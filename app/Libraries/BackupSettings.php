<?php
namespace App\Libraries;
use BackupManager\Filesystems\Destination;

class BackupSettings
{
    public static function backup() {
        $configFileSystemProvider = new \BackupManager\Config\Config([
            'local' => [
                'type' => 'Local',
                'root' => base_url('uploads/backup/'),
            ],
        ]);

        $db = \Config\Database::connect();
        $dbname = $db->database;

        $configDatabase = new \BackupManager\Config\Config([
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

        $filesystems = new \BackupManager\Filesystems\FilesystemProvider($configFileSystemProvider);
        $filesystems->add(new \BackupManager\Filesystems\LocalFilesystem);
        $databases = new \BackupManager\Databases\DatabaseProvider($configDatabase);
        $databases->add(new \BackupManager\Databases\MysqlDatabase);
        $compressors = new \BackupManager\Compressors\CompressorProvider;
        $compressors->add(new \BackupManager\Compressors\GzipCompressor);
        $compressors->add(new \BackupManager\Compressors\NullCompressor);

        // build manager
        $manager = new \BackupManager\Manager($filesystems, $databases, $compressors);

        $backup_name = $dbname.'_'.date('Y-m-d').'.sql';
        echo "<pre>";
        print_r ($manager);
        echo "</pre>";
        exit();
        try {
            $manager->makeBackup()
                    ->run('development', [
                        new \BackupManager\Filesystems\Destination('local', $backup_name),
                    ], 'zip');
            return true;
        } catch (Exception $e) {
            return false;
        }

    }
}
