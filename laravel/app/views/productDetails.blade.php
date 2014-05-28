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
               
        <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css"> 
        
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 
        
    </head>
    <body>
        
        <h1> Details </h1>
        
        <?php
        $identity = $_GET['id'];
         echo $identity;
         
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
            
            //$product = $products->xpath("/CatalogItem/Product[ProductID='{$identity}']");
            
           // $product = $products->xpath("//Product");
           
            foreach($products->xpath("//CatalogItem/Product[ProductID='{$identity}']") as $product){
            
            echo $product->Product->Description;
            echo $product->LongDesc;

            foreach($product->xpath("../Price") as $product1){
            echo $product1->UnitPrice;}
            
            }
            ///ListofCatalogDetails/CatalogItem/Product[ProductID='{$identity}']/CatalogItem
         /*   foreach($products->xpath("//CatalogItem/Product[ProductID='{$identity}']../Price") as $product){
            
            
            echo $product->UnitPrice;
            
            }*/
            
        }
            
            
            
        ?>
        

    </body>
</html>

