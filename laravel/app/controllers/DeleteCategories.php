<?php

Class DeleteCategories 
extends BaseController
{
    public static function delete_category(){
        Category::delete(array(
           'name' => Input::get('name') 
        ));
        
        return Redirect::back()->with('message','Category deleted!');

    }
    
}


