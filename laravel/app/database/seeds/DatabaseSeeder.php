<?php

//Faker datubbāzes datu ģenerators

class DatabaseSeeder 
extends Seeder 
{
    protected $faker;

//Izsauc jaunu Faker instanci
    
    public function getFaker()
    {
        if (empty($this->faker))
        {
            $faker = Faker\Factory::create();
            $faker->addProvider (new Faker\Provider\Base($faker));
            $faker->addProvider(new Faker\Provider\Lorem($faker));
        }
        
        return $this->faker = $faker;;
    }

	public function run()
	{
		//Eloquent::unguard();

            $this->call("AccountTableSeeder");
            $this->call("CategoryTableSeeder");
            $this->call("ProductTableSeeder");
            $this->call("OrderTableSeeder");
            $this->call("OrderItemTableSeeder");
	}

}
