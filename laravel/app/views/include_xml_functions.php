<?php
/*$proc = new XSLTProcessor;
if (!$proc->hasExsltSupport()) {
    die('EXSLT support not available');
}else{
    die('Hooked Up!');
}*/

/*$xml = new DomDocument;
$xml->load($xmlfilename);

$xsl = new DomDocument;
$xsl->load($xsltfilename);

$proc = new xsltprocessor;
$proc->importStyleSheet($xsl);
$result = $proc->transformToXML($xml); */

  function XMLTransformMM($xml, $xsl) {
    $arguments = array('/_xml' => $xml, '/_xsl' => $xsl);
    //$xp = xslt_create();
    $xmlfile = new DomDocument;
    $xmlfile->load($xml);

$xslfile = new DomDocument;
$xslfile->load($xsl);
    $proc = new xsltprocessor;
    $proc->importStyleSheet($xslfile);
    $result = $proc->transformToXML($xmlfile);
    //$result = xslt_process($xp, 'arg:/_xml', 'arg:/_xsl', NULL, $arguments); 
   /* if (!$result) {
      $result = (sprintf("Cannot process XSLT document [%d]: %s", xslt_errno($xp), xslt_error($xp)));
    }*/
    //xslt_free($xp);
    return $result;
  }
?>