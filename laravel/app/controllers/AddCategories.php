<?php

Class AddCategories 
extends BaseController
{
    public function add_category(){
        
        $name  = Input::get('name');
        
        if (Input::get('name') === "" ) 
        {
            return Redirect::back()->with('message','You must enter a name for the cateogry!');
        }
        
        $results = DB::select( DB::raw("SELECT * FROM category WHERE name = :name"), array(
        'name' => $name,
        ));
        
        if ($results){ 
            return Redirect::back()->with('message','Category with this name already exists!');
        }
        else
        {
        Category::create(array(
           'name' => Input::get('name') 
        ));
        
       return Redirect::back()->with('message','Category added!');
        }
    }
    
}

