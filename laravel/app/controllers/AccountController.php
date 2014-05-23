<?php

class AccountController
extends BaseController
{
    public function authenticateAction()
    {
        $credentials = [
            "email" => Input::get("email"),
            "password" => Input::get("password")
        ];
        
        if (Auth::attempt($credentials))
        {
            return Response::json([
                "status" => "ok",
                "account" => Auth::user()->toArray()
            ]);
        }
        
        return Response::json([
            "status" => "error",
            $data["error"] = "Username and/or password invalid!"
        ]);
    }
    /*
    public function registerAction()
    {
        $email = Input::get("email");
        $password = Input::get("password");
        
        
        $credentials = [
            "email" => Input::get("email"),
            "password" => Input::get("password")
        ];
        
        DB::table('Account')->insert($credentials);
        
    }*/
}
