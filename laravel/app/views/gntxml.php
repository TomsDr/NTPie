<?php
  include('include_xml_functions.php');

  $target_url="http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll?MfcISAPICommand=Default&USERNAME=XmlNTuser623&PASSWORD=NTxMl262PiedzUser&XML=%3C%3Fxml+version%3D%221.0%22+standalone%3D%22yes%22%3F%3E+%0D%0A%3CCatalogRequest+xmlns%3D%22urn%3AXMLLink%3AeLinkCatalog%22%3E+%0D%0A++++++++%3CDate%3E2000-12-27T12%3A55%3A46%3C%2FDate%3E+%0D%0A++++++++%3CCatNumber%3E1.0%3C%2FCatNumber%3E+%0D%0A++++++++%3CRoute%3E%3CFrom%3E%3CClientID%3EYOUR_CLIENT_ID%3C%2FClientID%3E%3C%2FFrom%3E+%0D%0A++++++++++++++++%3CTo%3E%3CClientID%3E0%3C%2FClientID%3E%3C%2FTo%3E+%0D%0A++++++++%3C%2FRoute%3E+%0D%0A++++++++%3CFilters%3EF2107B+%0D%0A++++++++++++++++%3CFilter+FilterID%3D%22VendorID%22+Value%3D%22HWP%22%2F%3E+%0D%0A++++++++++++++++%3CFilter+FilterID%3D%22Price%22+Value%3D%22WOVAT%22%2F%3E+%0D%0A++++++++%3C%2FFilters%3E+%0D%0A%3C%2FCatalogRequest%3E+%0D%0A%09%09%09%09%09%09&CHECK=12345";
  $source_xml = file_get_contents($target_url);
  $source_file_xsl = "C:/wamp/www/laravel/app/views/gntxml.xsl";
  $source_xsl = file_get_contents($source_file_xsl);

  $res = XMLTransformMM($source_xml, $source_xsl);
  echo $res;
?>
