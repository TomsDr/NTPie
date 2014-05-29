<?php

Class ProductDetails
extends Eloquent
{
  public function getProductDetails()
  {
      echo $id, $part_number, $ean, $warranty, $desc, $long_desc, $price, $qty;
  }  
}

