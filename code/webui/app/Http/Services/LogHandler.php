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

    public function getLogDetail($id){
        $filePath = $this->logDir . $id . ".log";
        $title = '';
        $list = array();

        $fileContent = file_get_contents($filePath);

        $exp1 = explode("---cronjobline---", $fileContent);
        $title = $exp1[0];
        $content2 = $exp1[1];
        $exp2 = explode("---newlogdate:---", $content2);
        
        foreach($exp2 as $xitem){
            $exp3 = explode("---newlog:---", $xitem);
            if(sizeof($exp3) > 1){
                $list[] = array(
                    'index'       => 0,
                    'set_date'    => $exp3[0],
                    'content'     => trim($exp3[1])
                );
            }
        }

        $list = array_reverse($list);

        $index = 1;
        foreach($list as &$item){
            $item['index'] = $index++;
        }

        $ret = array();
        $ret['title'] = $title;
        $ret['list'] = $list;
        return $ret;
    }
}
