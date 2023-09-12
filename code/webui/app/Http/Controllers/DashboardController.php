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

    public function detail(Request $request,$id,$pagenumber)
    {
        $logH = new LogHandler();
        $detail = $logH->getLogDetail($id);

        $pagesize = 100;
        $count = sizeof($detail['list']);
        $list = array_slice($detail['list'], ($pagesize * ($pagenumber - 1)), $pagesize);
        
        $previous_page_disable = ($pagenumber == 1 ? true : false);
        $next_page_disable = (($pagesize * ($pagenumber)) < $count ? false : true);

        return view('log-detail',[
            'title'                 => $detail['title'], 
            'loglist'               => $list, 
            'id'                    => $id,
            'page_number'           => $pagenumber,
            'previous_page_disable' => $previous_page_disable, 
            'next_page_disable'     => $next_page_disable
        ]);
    }      
}
