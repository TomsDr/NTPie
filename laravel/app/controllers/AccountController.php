<?php

class AccountController
extends BaseController
{
 
//Iegūst lietotāja datus    
    
    public function authenticateAction()
    {
        $credentials = [
            "email" => Input::get("email"),
            "password" => Input::get("password")
        ];
 
//Piesaka lietotāju sistēmā, ja šādi dati eksistē DB  
  
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

}
