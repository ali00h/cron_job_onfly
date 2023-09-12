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


        return view('dashboard',['loglist' => $cronList]);
    }    

    public function detail(Request $request,$id)
    {
        $logH = new LogHandler();
        $detail = $logH->getLogDetail($id);


        return view('log-detail',['title' => $detail['title'],'loglist' => $detail['list']]);
    }      
}
