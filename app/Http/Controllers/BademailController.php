<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\AccesslogController as AccesslogController;

use App\Http\Controllers\AccesscountController as AccesscountController;

class BademailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $AccesslogController;

    public function __construct(AccesslogController $AccesslogController, AccesscountController $AccesscountController)
    {

        $this->AccesslogController   = $AccesslogController;
        $this->AccesscountController = $AccesscountController;

    }

    public function show(){

        $bademail = \App\Bademail::where('ativo', '1')->get();

        return response()->json($bademail, 202);

    }


    public function procura($email){

        $ip = $_SERVER['REMOTE_ADDR'];

        $useragent = $_SERVER['HTTP_USER_AGENT'];

        $this->AccesslogController->GravaAcessos($ip, $useragent, $email, 'consulta email');

        $count = $this->AccesscountController->conunt($email);

        if($this->validaemail($email) == false){

            $err = array('Resposta' => 'E-mail não é válido', 'Cod' => 6);

            return response()->json($err, 512);
        }

        $bademail = \App\Bademail::where('ativo',1 )->where('email', $email)->exists();

        if(!$bademail){

            $resposta = array('Resposta' => 'E-mail não está bloqueado', 'Cod' => 0);

            return response()->json($resposta, 404);

        }

        else{
            $resposta = array('Resposta' => 'E-mail está bloqueado', 'Cod' => 1);

            return response()->json($resposta, 200);
        }


    }

    public function insere(Request $request, $email){

        $ip = $_SERVER['REMOTE_ADDR'];

        if(isset($_SERVER['HTTP_USER_AGENT'])){

            $useragent = $_SERVER['HTTP_USER_AGENT'];

        }
        else{
            $useragent = 'Unknow';
        }

        if($this->validaemail($email) == false){

            $err = array('Resposta' => 'E-mail não é válido', 'Cod' => 6);

            return response()->json($err, 512);
        }

        $procura = \App\Bademail::where('email', $email)->exists();

        if($procura){
            $err = array('Resposta' => 'E-mail já bloqueado', 'Cod' => 2);

            return response()->json($err, 512);
        }

        $procura2 = \App\Bademail::withTrashed()->where('email', $email)->exists();

        if($procura2){

            \App\Bademail::withTrashed()
                ->where('email', $email)
                ->restore();

            $this->AccesslogController->GravaAcessos($ip, $useragent, $email, 'reinsere email');

            $suss = array('Resposta' => 'E-mail Bloqueado', 'Cod' => 3);

            return response()->json($suss, 200);
        }

        $this->AccesslogController->GravaAcessos($ip, $useragent, $email, 'insere email');

        $bademail = new \App\Bademail();

        $bademail->email = $email;

        $result = $bademail->save();

        if(!$result){

            $err = array('Resposta' => 'Não foi bloqueado', 'Cod' => 4);

            return response()->json($err, 502);

        }

        $suss = array('Resposta' => 'E-mail Bloqueado', 'Cod' => 3);

        return response()->json($suss, 200);

    }

    public function retira(Request $request, $email){

        $ip = $_SERVER['REMOTE_ADDR'];

        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if($this->validaemail($email) == false){

            $err = array('Resposta' => 'E-mail não é válido', 'Cod' => 6);

            return response()->json($err, 512);
        }

        $bademail = new \App\Bademail();

        $procura = \App\Bademail::where('email', $email)->exists();

        if($procura){
            $verifica = \App\Bademail::select('id as codigo')->where('email', $email)->get();

            foreach ($verifica as $value) {
                $codigo = $value->codigo;
            }

            $bademail = \App\Bademail::find($codigo);

            $bademail->delete();

            $this->AccesslogController->GravaAcessos($ip, $useragent, $email, 'retira email');

            $suss = array('Resposta' => 'E-mail Desbloqueado', 'Cod' => 5);

            return response()->json($suss, 200);
        }

        $err = array('Resposta' => 'E-mail não está bloqueado', 'Cod' => 6);

        return response()->json($err, 512);

    }

    private function validaemail($email){

        if(!$email ){

            return false;

        }

        if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){

            return false;

        }

        $Sintaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';

        if(!preg_match($Sintaxe,$email)){

            return false;

        }

        return true;

    }
}
