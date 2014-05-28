<!doctype html>
<html>
    <head>
        <title>NTPie Also</title>
        <meta charset="utf-8" />

        <style>
            img{
                height: 150px;
                width: 200px;
                margin: 40px;
            }
            
            .hidden{
                display: none;
            }
            
            .unhidden{
                display: block;
                background-color: #485563;
            }
            .product{
                display: inline-block;
                padding: 20px;
                max-width: 300px;
            }
        </style>        
        
 <!--<script type="text/javascript">
  function unhide(product_hidden) {
    var item = document.getElementById(product_hidden);
    if (item) {
      item.className=(item.className==='hidden')?'unhidden':'hidden';
    }
  }
</script>-->
        
        <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css"> 
        
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 
        
    </head>
    <body>
        <div class="container">
        <h1>Intel motherboards</h1>
        <!--<div class="categories">
            <div class="motherboards">
                <a href="javascript:unhide('motherboards_hidden');"><img src="http://www.guru3d.com/miraserver/images/2012/z77a-gd65-preview/IMG_5889.jpg" alt="mb_main" id="mb_main"></a>
                <div id="motherboards_hidden" class="hidden">
                    <span class="intel">
                        <img src='http://1.bp.blogspot.com/_vo_vJFSyvQU/THgJoUx1SeI/AAAAAAAAACs/xR8InN7D5e4/s1600/intel+motherboard.jpg' alt='intel motherboards'>
                    </span>
                    <span class="amd">
                        <img src='http://img.hexus.net/v2/news/sapphire/SAPPHIRE_PI-AM2RS780G.jpg' alt='amd motherboards'>
                    </span>
                    <span class="server">
                        <img src='http://images.anandtech.com/doci/6533/GA-7PESH1%20Oblique.jpg' alt='server motherboards'>
                    </span>
                    <span class="accessories">
                        <img src='http://www.scythe-eu.com/uploads/tx_cfamooflow/Thermal-Elixer-Unit_01.jpg' alt='motherboard accessories'>
                    </span>
                </div>
            </div> -->

 <?php

  $target_url = 'http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll?MfcISAPICommand=Default&USERNAME=XmlNTuser623&PASSWORD=NTxMl262PiedzUser&XML=<?xml%20version="1.0"%20standalone="yes"?><CatalogRequest%20xmlns="urn:XMLLink:eLinkCatalog"><Date>2000-12-27T12:55:46</Date><CatNumber>1.0</CatNumber><Route><From><ClientID>10726237</ClientID></From><To><ClientID>0</ClientID></To></Route><Filters><Filter%20FilterID="ClassID"%20Value="L03002001"/><Filter%20FilterID="Price"%20Value="WOVAT"/></Filters></CatalogRequest>&CHECK=12345';

  $context = stream_context_create(array(
    'http' => array('ignore_errors' => true),
));


$source_xml1 = file_get_contents($target_url, false, $context);

if($source_xml1 === false)
{
        $result_status = "error";
        $result_message = "Could not load document.";
        echo $result_message;
}
else
{
    $result_status = "success";
    $products = simplexml_load_string($source_xml1);
   /* $product_id = $products->xpath('//Product/ProductID');
    $product_price = $products->xpath('//Price/UnitPrice');
    
    $it = new MultipleIterator();
    $it->attachIterator(new IteratorIterator($product_id));
    $it->attachIterator(new IteratorIterator($product_price));
    
    
    
       foreach($it as $value)
    {
           list($id, $price) = $value;
        echo "<span class='product'>",
        //"<a href="javascript:unhide("product_hidden");">",
                 "<img src='http://semiaccurate.com/assets/uploads/2011/07/Intel-logo.jpg' alt='intel logo'>",
                 //"</a>",
                "<p>Product ID: $id->nodeValue</p>",
                "<p>Price: $id->nodeValue</p>",
         //"<span id='product_hidden' class='hidden'>",
               // "<p>Product ID: $product->Product->ProductID</p>",
            // "<p>Description: $product->Product->Description</p>",
              //  "<p>Price: $product->Price->UnitPrice</p>",
              // "</span>",
                "</span>",
                PHP_EOL;
    }
} */
 
    
    foreach($products->xpath('//Product') as $product)
    {
        echo "<span class='product'>",
        "<a href= 'http://localhost/www/index.php/also/productDetails?id=$product->ProductID' >",
                 "<img src='http://semiaccurate.com/assets/uploads/2011/07/Intel-logo.jpg' alt='intel logo'>",
                 "</a>",
                "<p>Description: $product->Description</p>",
         //"<div id='product_hidden' class='hidden'>",
             //   "<p>Product ID: $product->Product->ProductID</p>",
            // "<p>Description: $product->Product->Description</p>",
            //    "<p>Price: $product->Price->UnitPrice</p>",
            //   "</div>",
                "</span>",
                PHP_EOL;
        
        $id = $product->ProductID;
        echo $id;
    }
}



?>
        </div>
    </body>
</html>

