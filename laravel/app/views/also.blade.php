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
        </style>        
        
        <script type="text/javascript">
  function unhide(motherboards_hidden) {
    var item = document.getElementById(motherboards_hidden);
    if (item) {
      item.className=(item.className==='hidden')?'unhidden':'hidden';
    }
  }
</script> 
        
        <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css"> 
        
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 
        
    </head>
    <body>
        <div class="container">
        <h1>Kategorijas</h1>
        <div class="categories">
            <div class="motherboards">
                <a href="javascript:unhide('motherboards_hidden');"><img src="http://www.guru3d.com/miraserver/images/2012/z77a-gd65-preview/IMG_5889.jpg" alt="mb_main" id="mb_main"></a>
                <div id="motherboards_hidden" class="hidden">
                    <span class="intel">
                        <a href={{ URL::route('also/intelMB') }}><img src='http://1.bp.blogspot.com/_vo_vJFSyvQU/THgJoUx1SeI/AAAAAAAAACs/xR8InN7D5e4/s1600/intel+motherboard.jpg' alt='intel motherboards'></a>
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
            </div>
        </div>
         
 <?php

  $target_url = 'http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll?MfcISAPICommand=Default&USERNAME=XmlNTuser623&PASSWORD=NTxMl262PiedzUser&XML=<?xml%20version="1.0"%20standalone="yes"?><CatalogRequest%20xmlns="urn:XMLLink:eLinkCatalog"><Date>2000-12-27T12:55:46</Date><CatNumber>1.0</CatNumber><Route><From><ClientID>10726237</ClientID></From><To><ClientID>0</ClientID></To></Route><Filters><Filter%20FilterID="VendorID"%20Value="80001262"/><Filter%20FilterID="Price"%20Value="WOVAT"/></Filters></CatalogRequest>&CHECK=12345';

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
//print_r($sxml);
    foreach($products->xpath('//Product') as $product)
    {
        echo "<div class='amd'>"
        . "<p>Product ID: $product->ProductID</p>",
             "<p>Description: $product->Description</p>", PHP_EOL;
    }
}




/*$product = array();
$product[0] = $sxml->xpath("//Date");

print_r($product[0]); */

//print_r($sxml->PriceCatalog->PriceCatHdr->Date);
 // $sxml1 = @simplexml_load_file($target_url);
  


/*$sxml = new SimpleXMLElement($source_xml1);

  echo $sxml->PriceCatalog->PriceCatHdr->Date; */
/*$products = $sxml->{"Product"};

foreach ($products as $product)
{
    $productDescription = $product->{"Description"};
                echo $productDescription;
}
*/
/*if($source_xml1 === false) 
    {
        $result_status = "error";
        $result_message = "Could not load document.";
        echo $result_message;
    }
else{
    $items = $source_xml1->xpath("//Product[@Description]");
     
            foreach ($items as $item) 
            {
                $productDescription = $item->Description;
                echo $productDescription;
            } 
    
    //echo $source_xml1; 
}*/

   /* if($source_xml1 === false) 
    {
        $result_status = "error";
        $result_message = "Could not load document.";
    } else {
        $result_status = "success";
        $result_message = "Document loaded.";
    }
 
   $items = $source_xml1->xpath("//Product");
     
            foreach ($items as $item) 
            {
                echo $item;
            } */

 
?>
        
   <!-- <a href={{ URL::route('gntxml/index') }}><img alt= "Also" src ="http://www.telecom-handel.de/var/ezwebin_site/storage/images/telecom-handel/news/distribution/also-deutschland-goodbye-actebis/540861-1-ger-DE/Also-Deutschland-Goodbye-Actebis_very_large.jpg"></a> -->
        </div>
    </body>
</html>

<!--   <?php
        $source_file_xml = "C:/wamp/www/laravel/app/views/xmltest.xml";
  $source_xml = file_get_contents($source_file_xml);
 ?> -->
        
        <!--<FORM name="Frm" action="http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll" method="POST">
<table width="100%" ID="Table1">
  <input type="hidden" name="MfcISAPICommand" value="Default"/>
  <tr>
    <td colSpan="2">
    <TEXTAREA name="XML" rows="31" cols="120" ID="Textarea1"><?php echo $source_xml; ?></TEXTAREA>
    </td>
  </tr>
  <tr>
    <td>
      <input type="hidden" name="USERNAME" VALUE="XmlNTuser623"/>
      <input type="hidden" name="PASSWORD" VALUE="NTxMl262PiedzUser"/>
    </td>
  </tr>
  <tr>
    <td>CHECK</td>
    <td>
      <input type="text" name="CHECK" VALUE="12345"/>
    </td>
  </tr>
  <tr>
    <td>
      <INPUT type="SUBMIT" value="Submit Request"/>
    </td>
  </tr>
</table>
</FORM>-->