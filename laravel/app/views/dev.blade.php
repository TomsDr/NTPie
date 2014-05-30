<!doctype html>
<html>
    <head>
        <title>NTPie Also</title>
        <meta charset="utf-8" />  
        
        <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css">--> 
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 
        
    </head>
    <body>
        <div class="container">
            <h1>Dev</h1>
        <div>
            <form action="add_category" role="form" method="post">
                <div class="form_group">
                    <label for="">Insert new category name</label>
                    <input type="text" name="name" id="" class="form_control">
                    
                </div>
                
                <input type="submit" value="Add category" class="btn btn-primary">
            </form>
        </div>
        
        
        
         <?php
         
        $source_file_xml = "C:/wamp/www/laravel/app/views/xmltest.xml";
  $source_xml = file_get_contents($source_file_xml);
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
        
        </div>
    </body>
</html>




