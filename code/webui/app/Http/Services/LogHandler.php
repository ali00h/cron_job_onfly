<?php

namespace App\Http\Services;



class LogHandler
{
    private $logDir = "";
    public function __construct()
    {
        $this->logDir = "C:/Ali/Temp/cronlog/";
    }

    public function getCronListFromLog()
    {
        $logs = array();
        $files = scandir($this->logDir);
        foreach($files as $log){
            if(substr($log, 0, 1) != "."){
                $filePath = $this->logDir . $log;
                $id = str_replace(".log","",$log);
                $logs[] = array(
                    "id"            => $id,
                    "filename"      => $log,
                    "job"           => $this->readFirstLine($filePath),
                    "last_change"   => date("Y-m-d H:i", filemtime($filePath))
                );
            }
        }
        return $logs;
    }    

    private function readFirstLine($filePath){
        $f = fopen($filePath, 'r');
        $line = fgets($f);
        fclose($f);        
        return $line;
    }
}
