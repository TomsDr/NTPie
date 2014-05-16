<?php

class Category
Extends Eloquent
{
    protected $table = "category";
   
    protected $guarded = ["id"];
    
    protected $softDelete = true;
    
    public function products()
    {
        return $this->hasMany("Product");
    }
}

?>
