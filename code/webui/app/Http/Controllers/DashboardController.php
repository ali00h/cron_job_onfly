<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LogHandler;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $logH = new LogHandler();
        $cronList = $logH->getCronListFromLog();

        //print_r($cronList);exit();

        return view('dashboard',['loglist' => $cronList]);
    }    
}
