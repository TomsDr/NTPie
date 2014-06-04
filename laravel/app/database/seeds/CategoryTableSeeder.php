<?php

//Kategoriju ģenerators

class CategoryTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $faker = $this->getFaker();

//Izveido 10 kategorijas ar nejauši ģenerētiem vārdiem
        
        for ($i=0; $i < 10; $i++)
        {
            $name = ucwords ($faker->word);
            
            Category::create([
                "name" => $name
            ]);
        }
    }
}
