<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BloqueiaMailController extends Controller
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

    public function bloqueia($email){
    	return $app->version();
dd($email);
        // create curl resource
		/*$ch = curl_init();

		// set url
		curl_setopt($ch, CURLOPT_URL, "emails/" . $email);

		// set type
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

		//return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// $output contains the output string
		$output = curl_exec($ch);

		// close curl resource to free up system resources
		curl_close($ch);

		$s = json_decode($output);

		return view('retorno.index')->with(compact('s'));*/

    }
}
