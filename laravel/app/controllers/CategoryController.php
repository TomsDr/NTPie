<?php

class CategoryController
extends BaseController
{
    
//Atgriež visas kategorijas    
    
    public function indexAction()
    {
        return Category::with(["products"])->get();
    }
}

