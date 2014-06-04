<?php

//Pasūtījumu datu ģenerators

class OrderTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $faker = $this->getFaker();
        
        $accounts = Account::all();
 
//Katram lietotāja kontam izveido nejaušu pasūtījumu skaitu
        
        foreach ($accounts as $account)
        {
            for ($i = 0; $i < rand(-1,5); $i++)
            {
                Order::create([
                    "account_id" => $account->id
                ]);
            }
        }
    }
}

