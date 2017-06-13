<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccesslogController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function GravaAcessos($ip, $useragent, $blockemail, $action)
    {
        $reverseip = gethostbyaddr($ip);

        $acesso = new \App\Accesslog();

        $acesso->ip = $ip;
        $acesso->reverseip = $reverseip;
        $acesso->useragent = $useragent;
        $acesso->blockemail = $blockemail;
        $acesso->action = $action;

        $acesso->save();
    }

}
