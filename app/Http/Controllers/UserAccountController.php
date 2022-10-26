<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function index()
    {
        $useracc = UserAccount::all();
        return response()->json([
            'status'=> 200,
            'useracc'=>$useracc,
        ]);
    }

    function register(Request $req)
    {
        $useracc = new UserAccount;
        $useracc->username=$req->input('username');
        $useracc->fname=$req->input('fname');
        $useracc->lname=$req->input('lname');
        $useracc->email=$req->input('email');
        $useracc->password=Hash::make($req->input('password'));
        $useracc->save();

        $data = [
            'status' => true,
            'useracc' => $useracc
        ];

        return $useracc->toJson();
    }

    function login(Request $req)
    {
        $useracc = UserAccount::where('email', $req->email)->first();
        if(!$useracc || !Hash::check($req->password, $useracc->password))
        {
            return ["error"=>"Email or password is not matched"];
        } 
        return $useracc;
    }
}
