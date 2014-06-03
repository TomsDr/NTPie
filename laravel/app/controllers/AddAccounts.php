<?php

Class AddAccounts 
extends BaseController
{
    public function add_account(){
        Account::create(array(
           'email' => Input::get('email'),
           'password' => Input::get('password')
        ));
        
        return Redirect::back()->with('message','Account added!');

    }
    
}



