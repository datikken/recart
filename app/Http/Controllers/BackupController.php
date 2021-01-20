<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use ZanySoft\Zip\Zip;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    public function back_up_from_last_archive()
    {
        $backupUrl = $this->get_last_backup_archive();
        $sqlFile = $this->extract_archive_to_tmp($backupUrl);

        $this->restore_db_from_file($sqlFile);
        $this->clear_backup_tmp_folder();

        return response()->json(['status' => 200, 'message' => 'Backup sailed']);
    }

    public function get_last_backup_archive()
    {
        $directory = config('app.name');
        $backupsArray = Storage::files($directory);
        $lastBackup = $backupsArray[sizeof($backupsArray) - 1];

        return $lastBackup;
    }

    public function extract_archive_to_tmp($backupUrl)
    {
        $archive = Storage::path($this->get_last_backup_archive());

        $zip = Zip::open($archive);
        $zip->setMask(0644);
        $zipSqlFile = $zip->listFiles()[0];

        $dirPath = storage_path() . '/app';
        $zip->extract($dirPath, $zipSqlFile);
        $zip->close();

        $sqlFilePath = File::glob("{$dirPath}/db-dumps/*.sql");

        return $sqlFilePath;
    }

    public function restore_db_from_file($sqlFilePath)
    {
        DB::unprepared(file_get_contents($sqlFilePath[0]));
    }

    public function clear_backup_tmp_folder()
    {
        $path = 'db-dumps';

        Storage::disk('local')->deleteDirectory($path);
    }
}
