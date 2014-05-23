<!doctype html>
<html>
    <head>
        <title>NTPie Also</title>
    </head>
    <body>
        <p>Test</p>
    <?php    
        $source_file_xml = "C:/wamp/www/laravel/app/views/xmltest.xml";
  $source_xml = file_get_contents($source_file_xml);
 /* echo $source_xml; */
  /*
  xmlhttp.open("POST", $source_xml, true);
    xmlhttp.send(); */
   
 /*   $xml = file_get_contents('C:/wamp/www/laravel/app/views/xmltest.xml');
$url = "http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll";

$post_data = array(
    "xml" => $xml,
);

$stream_options = array(
    'http' => array(
       'method'  => 'POST',
       'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
       'content' => http_build_query($post_data),
    ),
);

$context  = stream_context_create($stream_options);
$response = file_get_contents($url, null, $context);

  
$xml_url = "http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll";
    $xml1 = @simplexml_load_file($xml_url);
    
    if($xml1 === false) 
    {
        $result_status = "error";
        $result_message = "Could not load document.";
    } else {
        $result_status = "success";
        $result_message = "Document loaded.";
    }
 
   /* $items = $xml->xpath("//Product[ID = '1872304']");
     
            foreach ($items as $item) 
            {
                echo $item;
            } */

 ?>
        
        <FORM name="Frm" action="http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll" method="POST">
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
</FORM>
        
 <?php

 

 
  $target_url = 'http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll?MfcISAPICommand=Default&USERNAME=XmlNTuser623&PASSWORD=NTxMl262PiedzUser&XML=<?xml%20version="1.0"%20standalone="yes"?><CatalogRequest%20xmlns="urn:XMLLink:eLinkCatalog"><Date>2000-12-27T12:55:46</Date><CatNumber>1.0</CatNumber><Route><From><ClientID>10726237</ClientID></From><To><ClientID>0</ClientID></To></Route><Filters><Filter%20FilterID="VendorID"%20Value="80001262"/><Filter%20FilterID="Price"%20Value="WOVAT"/></Filters></CatalogRequest>&CHECK=12345';

  $context = stream_context_create(array(
    'http' => array('ignore_errors' => true),
));


$source_xml1 = file_get_contents($target_url, false, $context);
echo $source_xml1; 
 
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

 
/*$url = "http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll";

$post_string = '<?xml version="1.0" standalone="yes"?>
<CatalogRequest xmlns="urn:XMLLink:eLinkCatalog">
  <Date>2000-12-27T12:55:46</Date>
  <CatNumber>1.0</CatNumber>
  <Route>
    <From>
      <ClientID>10726237</ClientID>
    </From>
    <To>
      <ClientID>0</ClientID>
    </To>
  </Route>
  <Filters>
    <Filter FilterID="VendorID" Value="80001262"/>
    <Filter FilterID="Price" Value="WOVAT"/>
  </Filters>
</CatalogRequest>';


$header  = "POST HTTP/1.0 \r\n";
$header .= "Content-type: text/xml \r\n";
$header .= "Content-length: ".strlen($post_string)." \r\n";
$header .= "Content-transfer-encoding: text \r\n";
$header .= "Connection: close \r\n\r\n"; 
$header .= $post_string;

$postData = array(
    'login' => 'XmlNTuser623',
    'pwd' => 'NTxMl262PiedzUser'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);

$data = curl_exec($ch); 

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

echo $data;*/

?>
        
    <a href={{ URL::route('gntxml/index') }}><img alt= "Also" src ="http://www.telecom-handel.de/var/ezwebin_site/storage/images/telecom-handel/news/distribution/also-deutschland-goodbye-actebis/540861-1-ger-DE/Also-Deutschland-Goodbye-Actebis_very_large.jpg"></a>
    </body>
</html>