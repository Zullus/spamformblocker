<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BademailController extends Controller
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

    public function show(){

        $bademail = \App\Bademail::where('ativo', '1')->get();

        return response()->json($bademail, 202);

    }


    public function procura($email){

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

            $suss = array('Resposta' => 'E-mail Bloqueado', 'Cod' => 3);

            return response()->json($suss, 200);
        }

        $bademail = new \App\Bademail();

        $bademail->email = $email;

        $result = $bademail->save();

        if(!$result){

            $err = array('Resposta' => 'Não foi bloquear', 'Cod' => 4);

            return response()->json($err, 502);

        }

        $suss = array('Resposta' => 'E-mail Bloqueado', 'Cod' => 3);

        return response()->json($suss, 200);

    }

    public function retira(Request $request, $email){

        $bademail = new \App\Bademail();

        $procura = \App\Bademail::where('email', $email)->exists();

        if($procura){
            $verifica = \App\Bademail::select('id as codigo')->where('email', $email)->get();

            foreach ($verifica as $value) {
                $codigo = $value->codigo;
            }

            $bademail = \App\Bademail::find($codigo);

            $bademail->delete();

            $suss = array('Resposta' => 'E-mail Desbloqueado', 'Cod' => 5);

            return response()->json($suss, 200);
        }

        $err = array('Resposta' => 'E-mail não está bloqueado', 'Cod' => 6);

        return response()->json($err, 512);

    }
}
