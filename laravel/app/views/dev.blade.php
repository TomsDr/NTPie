<!doctype html>
<html>
    <head>
        <title>NTPie Dev Panel</title>
        <meta charset="utf-8" />  
        
        <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 

    </head>
    <body>
        <div class="container">
            <h1>Dev</h1>
            <div class="message">
                @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
                 @endif 
            </div>
        <div class="add_category">
            <form action="add_category" role="form" method="post">
                <div class="form_group">
                    
                    <h3><strong>Add new product category</strong></h3>
                    <p>Insert new category name: </label></p>
                    <input type="text" name="name" id="" class="form_control" style="color:black">                  
                </div>
                <br>
                <input type="submit" value="Add category" class="btn btn-primary" style="color:black">
            </form>
        </div>
            <br>
        <div class="add_product">
            <form action="add_product" role="form" method="post">
                <div class="form_group">
                    <h3><strong>Add new product</strong></h3>
                    <p>Insert new product name: </p>
                    <input type="text" name="name" id="" class="form_control" style="color:black">
                    <p>Insert new product category id: </p>
                    <input type="text" name="category_id" id="" class="form_control" style="color:black">
                    <p>Insert price: </p>
                    <input type="text" name="price" id="" class="form_control" style="color:black">
                    <p>Insert stock amount: </p>
                    <input type="text" name="stock" id="" class="form_control" style="color:black">
                    
                </div>
                <br>
                <input type="submit" value="Add new product" class="btn btn-primary" style="color:black">
            </form>
        </div>
            <br>
         <?php
         
        $source_file_xml = "C:/wamp/www/laravel/app/views/xmltest.xml";
  $source_xml = file_get_contents($source_file_xml);
 ?> 
        
<FORM name="Frm" action="http://b2b.alsolatvia.lv/DirectXML.svc/2/scripts/XML_Interface.dll" method="POST">
<table width="100%" ID="Table1">
  <input type="hidden" name="MfcISAPICommand" value="Default"/>
  <tr>
    <td colSpan="2">
    <TEXTAREA name="XML" rows="31" cols="120" ID="Textarea1" style="color:black"><?php echo $source_xml; ?></TEXTAREA>
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
      <input type="text" name="CHECK" VALUE="12345" style="color:black"/>
    </td>
  </tr>
  <tr>
    <td>
      <INPUT type="SUBMIT" value="Submit Request" style="color:black"/>
    </td>
  </tr>
</table>
</FORM>
        
        </div>
    </body>
</html>




