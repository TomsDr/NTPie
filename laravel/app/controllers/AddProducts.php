<?php

Class AddProducts 
extends BaseController
{
    public function add_product(){
        
        $category_id  = Input::get('category_id');
        
        if (Input::get('name') === "" || Input::get('category_id') === "" || Input::get('price') === "" || Input::get('stock') === "") 
        {
            return Redirect::back()->with('message','You must specify all information about the new product!');
        }
                
        $results = DB::select( DB::raw("SELECT * FROM category WHERE id = :category_id"), array(
        'category_id' => $category_id,
        ));
        
        if (!$results){ 
            return Redirect::back()->with('message','Cannot add product in non-existant category!');
        }
        else
        {           
            Product::create(array(
                'name' => Input::get('name'),
                'category_id' => Input::get('category_id'),
                'price' => Input::get('price') ,
                'stock' => Input::get('stock')
            ));
        
        return Redirect::back()->with('message','New product added!');

    }
    }
    
}

