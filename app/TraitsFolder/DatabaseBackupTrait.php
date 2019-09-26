<?php

namespace App\TraitsFolder;

trait DatabaseBackupTrait
{
    public function __construct()
    {
        setlocale(LC_ALL, 'en_US.UTF8');
    }

    public static function DatabaseBackupName()
    {
        /*
         * Back Up Action
         * Save Database name
         * return to Backup page
         * */

        try {
            $con = mysqli_connect(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));
            $tables = array();
            $result = mysqli_query($con, 'SHOW TABLES');
            while ($row = mysqli_fetch_row($result)) {
                $tables[] = $row[0];
            }

            $return = '';
            foreach ($tables as $table)
            {
                $result     = mysqli_query($con, 'SELECT * FROM ' . $table);
                $num_fields = mysqli_num_fields($result);

                $row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE ' . $table));
                $return .= "\n\n" . str_replace("CREATE TABLE", "CREATE TABLE IF NOT EXISTS", $row2[1]) . ";\n\n";

                for ($i = 0; $i < $num_fields; $i++)
                {
                    while ($row = mysqli_fetch_row($result))
                    {
                        $return .= 'INSERT INTO ' . $table . ' VALUES(';
                        for ($j = 0; $j < $num_fields; $j++)
                        {
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = preg_replace("/\n/", "\\n", $row[$j]);
                            if (isset($row[$j])) {
                                $return .= '"' . $row[$j] . '"';
                            }else {
                                $return .= '""';
                            }if ($j < ($num_fields - 1)) {
                            $return .= ',';
                        }
                        }
                        $return .= ");\n";
                    }
                }

                $return .= "\n\n\n";
            }

            $backup_name = 'backup-'.date('Y-m-d-H-i-s').'.sql';

            $handle = fopen(storage_path("database-backup").'/'. $backup_name, 'w+');
            fwrite($handle, $return);
            fclose($handle);

            return $backup_name;
        }
        catch (Exception $e)
        {
            \session()->flash('message',$e->getMessage());
            \session()->flash('type','warning');
            return redirect()->back();
        }
    }

    public static function DatabaseDownload($filename)
    {
        $backup_loc = url('core/storage/database-backup/' . $filename);
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        readfile($backup_loc);
        exit();
    }
}