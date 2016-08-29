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

        $bademail = \App\Bademail::where('ativo',1 )->where('email', $email)->get();

        if(!$bademail){

            $resposta = array('Falha' => 'E-mail não está bloqueado');

            return response()->json($resposta, 404);

        }

        else{
            $resposta = array('Sucesso' => 'E-mail não está bloqueado');

            return response()->json($resposta, 200);
        }


    }

    public function insere(Request $request, $email){

        $procura = \App\Bademail::where('email', $email)->exists();

        if($procura){
            $err = array('Erro', 'E-mail já bloqueado');

            return response()->json($err, 512);
        }

        $procura2 = \App\Bademail::withTrashed()->where('email', $email)->exists();

        if($procura2){

            \App\Bademail::withTrashed()
                ->where('email', $email)
                ->restore();

            $suss = array('OK', 'E-mail Bloqueado');

            return response()->json($suss, 200);
        }

        $bademail = new \App\Bademail();

        $bademail->email = $email;

        $result = $bademail->save();

        if(!$result){

            $err = array('Erro', 'Não foi bloquear');

            return response()->json($err, 502);

        }

        $suss = array('OK', 'E-mail Bloqueado');

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

            $suss = array('OK', 'E-mail Desbloqueado');

            return response()->json($suss, 200);
        }

        $err = array('Erro', 'E-mail não está bloqueado');

        return response()->json($err, 512);

    }
}
