<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 1:34 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AuthTimbanganController extends BaseController
{
    public function LoginAction(Request $request)
    {
        $user = app('db')->table('tb_users')
            ->where('username', $request->input('username'))
            ->where('password', md5($request->input('password')))->count();
        if($user == 1){
            $msg = array('msg' => 'success', 'status' => 'true');
        }else{
            $msg = array('msg' => 'failure', 'status' => 'false');
        }
        return $msg;
    }
}