<?php

Class AddCategories 
extends BaseController
{
    public function add_category(){
        Category::create(array(
           'name' => Input::get('name') 
        ));
        
        return Redirect::back()->with('message','Category added!');

    }
    
}

