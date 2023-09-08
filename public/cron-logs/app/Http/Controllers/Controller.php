<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /*
{
  "login_info": {
    "username": "ali",
    "password": "Mn123456"
  },
  "cron_logs": [
    {
      "id": "21231231",
      "title": "* * * * https://myurl.com",
      "logs": [
        {
          "set_date": "2023-09-07 18:58:00",
          "content": "cron test for each minutes"
        },
        {
          "set_date": "2023-09-07 18:59:00",
          "content": "cron test1 for each minutes"
        },
        {
          "set_date": "2023-09-07 19:00:00",
          "content": "cron test2 for each minutes"
        }
      ]
    },
    {
      "id": "21231241",
      "title": "* * * * https://yoururl.com",
      "logs": [
        {
          "set_date": "2023-09-07 17:58:00",
          "content": "cron test4 for each minutes"
        },
        {
          "set_date": "2023-09-07 17:59:00",
          "content": "cron test4 for each minutes"
        },
        {
          "set_date": "2023-09-07 18:00:00",
          "content": "cron test3 for each minutes"
        }
      ]
    }
  ]
}    
    */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
