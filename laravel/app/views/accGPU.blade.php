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
        <div class="container">
        <h1>Graphics Card Accessories</h1>

        <?php

            $name = 'accGPUProductDetails';
            
            $image = 'http://www.dabs.ie/images/product/uni2/DigitalContent/96/961R_0D69F0EE-1FAE-4CAB-B6BB-3E15AD868092_large.jpg';

//XMLLink pieprasījums uz kategorijas līmeni                 
            
            $target_url = 'http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll?MfcISAPICommand=Default&USERNAME=XmlNTuser623&PASSWORD=NTxMl262PiedzUser&XML=<?xml%20version="1.0"%20standalone="yes"?><CatalogRequest%20xmlns="urn:XMLLink:eLinkCatalog"><Date>2000-12-27T12:55:46</Date><CatNumber>1.0</CatNumber><Route><From><ClientID>10726237</ClientID></From><To><ClientID>0</ClientID></To></Route><Filters><Filter%20FilterID="ClassID"%20Value="L03008004"/><Filter%20FilterID="Price"%20Value="WOVAT"/></Filters></CatalogRequest>&CHECK=12345';

//Atļauj garu saišu apstrādi              
            
            $context = stream_context_create(array(
                'http' => array('ignore_errors' => true),
            ));

//Nolasa XMLLink pieprasījuma atgriezto XML failu 
            
            $source_xml = file_get_contents($target_url, false, $context);
            
//Pārbauda XML failu   
            
            if($source_xml === false)
            {
                $result_status = "error";
                $result_message = "Could not load document.";
                echo $result_message;
            }
            else
            {
                $result_status = "success";
                $products = simplexml_load_string($source_xml);

//Ģenerē sarakstu ar kategorijas produktiem                 
                
                foreach($products->xpath('//Product') as $product)
                {
                    echo "<span class='product'>",
                    "<a href= 'http://localhost/www/index.php/also/productDetails?id=$product->ProductID&name=$name&image=$image' >",
                    "<img src='$image' alt='gpu accessories logo'>",
                    "</a>",
                    "<p>$product->Description</p>",
                    "</span>",
                    PHP_EOL;
                }
            }

        ?>
        </div>
    </body>
</html>





