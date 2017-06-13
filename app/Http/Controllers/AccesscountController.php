<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccesscountController extends Controller
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

    public function conunt($email)
    {
        $access = \App\Accesscount::where('email', $email)->exists();

        if(!$access){

            $this->store($email, 1);

            return 1;

        }

        $numberofaccess = \App\Accesscount::where('email', $email)->get();

        foreach ($numberofaccess as $n) {

            $count = $n->numberofaccess;
            $id    = $n->id;

        }

        $count = $count + 1;

       $this->update($id, $count);

        return $count;

    }

    private function store($email, $numberofaccess){

        $access = new \App\Accesscount;

        $access->email          = $email;
        $access->numberofaccess = $numberofaccess;
        $access->save();

        return true;
    }

    private function update($id, $numberofaccess){

        $access = \App\Accesscount::find($id);

        $access->numberofaccess = $numberofaccess;
        $access->save();

        return true;
    }

}
