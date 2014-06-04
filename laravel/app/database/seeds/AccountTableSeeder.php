<?php

//Lietotāju kontu ģenerators

class AccountTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $faker = $this->getFaker();

//Izveido 10 lietotāju kontu ierakstus DB, ar nejausi ģenerētu epastu un šifrētu paroli
        
        for ($i = 0; $i < 10; $i++)
        {
            $email = $faker->email;
            $password = Hash::make("password");
            
            Account::create([
                "email" => $email,
                "password" => $password
            ]);
        }
    }
}

?>
