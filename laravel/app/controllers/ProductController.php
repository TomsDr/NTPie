<?php

class ProductController
extends BaseController
{
    
//Atgriež visus produktus, kas ietilpst kategorijās    
    
    public function indexAction()
    {
        $query = Product::with(["category"]);
        $category = Input::get("category");
        
        if ($category)
        {
            $query->where("category_id", $category);
        }
        
        return $query->get();
    }
}

