//ALSO produkta informācijas ieguve IntelMB

<?php
 
//No produktu saraksta skata saglabā un iegūst id atribūtu produktam, ko izvēlējies lietotajs
    $identity = $_GET['id'];

//Sūta saitē iekodētu XMLLink pierasījumu uz ALSO datubāzi apstrādei, vadoties pēc produkta id
    
    $target_url = 'http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll?MfcISAPICommand=Default&USERNAME=XmlNTuser623&PASSWORD=NTxMl262PiedzUser&XML=<?xml%20version="1.0"%20standalone="yes"?><CatalogRequest%20xmlns="urn:XMLLink:eLinkCatalog"><Date>2000-12-27T12:55:46</Date><CatNumber>1.0</CatNumber><Route><From><ClientID>10726237</ClientID></From><To><ClientID>0</ClientID></To></Route><Filters><Filter%20FilterID="ClassID"%20Value="L03002001"/><Filter%20FilterID="Price"%20Value="WOVAT"/></Filters></CatalogRequest>&CHECK=12345';

    $context = stream_context_create(array(
        'http' => array('ignore_errors' => true),
    ));

//Nolasa saņemto XML failu ar produkta informāciju
    
    $source_xml = file_get_contents($target_url, false, $context);

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

//Pēc XML filtra pārstaigā XML failu un iegūst vajadzīgo produkta informāciju        
        
        foreach($products->xpath("//CatalogItem/Product[ProductID='{$identity}']") as $product)
        {     
            $id = $product->ProductID;
            $part_number = $product->PartNumber;
            $ean = $product->EANCode;
            $warranty = $product->PeriodofWarranty;
            $desc = $product->Description;
            $long_desc = $product->LongDesc;

            foreach($product->xpath("../Price") as $product1)
            {
                $price =  $product1->UnitPrice;  
            }
            
            foreach($product->xpath("../Qty[@WarehouseID='1']") as $product1)
            {
                $qty =  $product1->QtyAvailable;    
            }
            
        }

            
    }
           
?>

