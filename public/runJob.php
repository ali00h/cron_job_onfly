<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$obj = new RunJob;
$obj->run();

class RunJob{
    private $env = array();
	private $logDir = "/var/www/html/log/";
	private $c_minute = 0;
	private $c_hour = 0;
	private $c_dayOfMonth = 0;
	private $c_month = 0;
	private $c_dayOfWeek = 0;

	public function run(){
		
		$this->fillENV();

        ini_set('date.timezone', $this->env["CRON_TIME_ZONE"]);
        set_time_limit(0);		
        if(sizeof($this->env["CRON_URL_LIST"]) == 0){
            $this->p('Cron job is empty!');
            exit();
        }
		$this->c_minute         = (int)date('i');
		$this->c_hour           = (int)date('H');
		$this->c_dayOfMonth     = (int)date('d');
		$this->c_month          = (int)date('m');
		$this->c_dayOfWeek      = (int)date('w');
		/*
		$this->p($this->c_minute);
		$this->p($this->c_hour);
		$this->p($this->c_dayOfMonth);
		$this->p($this->c_month);
		$this->p($this->c_dayOfWeek);
		*/

        foreach($this->env["CRON_URL_LIST"] as $jobItem){
			$this->p('JobItem: ' . trim($jobItem));
    		$this->run_job(trim($jobItem));
        }

	}
	
	private function run_job($job){
		$job_arr = explode(" ", $job);
		if(sizeof($job_arr) > 5){
			$cond = array();
			if($job_arr[0] == "*" || (int)$job_arr[0] == $this->c_minute)
				$cond[0] = true;
			else
				$cond[0] = false;
				
			if($job_arr[1] == "*" || (int)$job_arr[1] == $this->c_hour)
				$cond[1] = true;
			else
				$cond[1] = false;
				
			if($job_arr[2] == "*" || (int)$job_arr[2] == $this->c_dayOfMonth)
				$cond[2] = true;
			else
				$cond[2] = false;

			if($job_arr[3] == "*" || (int)$job_arr[3] == $this->c_month)
				$cond[3] = true;
			else
				$cond[3] = false;
				
			if($job_arr[4] == "*" || (int)$job_arr[4] == $this->c_dayOfWeek)
				$cond[4] = true;
			else
				$cond[4] = false;
				
			if($cond[0] && $cond[1] && $cond[2] && $cond[3] && $cond[4]){				
				if (str_starts_with($job_arr[5], 'http')) {
					$this->p('Calling... ' . $job_arr[5]);
					$jobContent = $this->callURL($job_arr[5]);
					$this->p('Job URL Response:<pre>' . $jobContent . '</pre>');
				}				
			}
		
		}

	}

    private function fillENV(){
        $this->env = $_SERVER;
        if (file_exists('/var/www/html/.env')) {
            $this->env = array_merge(parse_ini_file('/var/www/html/.env'), $this->env);
        }		

		if(isset($this->env["CRON_URL_LIST"]))
        	$this->env["CRON_URL_LIST"] = explode(",",$this->env["CRON_URL_LIST"]);
		else
			$this->env["CRON_URL_LIST"] = array();
		$this->env["CRON_URL_LIST"] = array_filter($this->env["CRON_URL_LIST"], fn($value) => !is_null($value) && $value !== '');		


    }

	private function p($msg){
		echo '
' . date('d-m-Y H:i:s') . ': ' . $msg . '
';
	}

    private function makeDir($path){
        return is_dir($path) || mkdir($path);
    }	



	private function callURL($url)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));
		
		$response = curl_exec($curl);
		if($response === false){
			$this->p('Calling Error: ' . curl_error($curl));
		}
		curl_close($curl);
		return $response;
	}


}
