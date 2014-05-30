<!doctype html>
<html>
    <head>
        <title>NTPie Also</title>
        <meta charset="utf-8" />

        <style>
            img{
                height: 300px;
                width: 400px;
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
         
         <?php 
            require 'C:/wamp/www/laravel/public/php/'.$_GET['name'].'.php';      
         ?>
        
        <script type="text/javascript">
            function unhide(details_hidden) {
            var item = document.getElementById(details_hidden);
                if (item) {
                    item.className=(item.className==='hidden')?'unhidden':'hidden';
                }
            }
        </script>
         
    </head>
    <body>
        <div class="container">
            <h1> {{ $desc }} </h1>
        
            <img src='{{ $_GET['image'] }}' alt='logo'>
        
            <h3>Product details</h3>
            <div class="productDetails">
                <p> {{ $long_desc }} </p>
        
                <p> Price: {{ $price }} </p>
        
                <p> Quantity available: {{ $qty }} </p>
                <a href="javascript:unhide('details_hidden');">More information</a>                
                <div id="details_hidden" class="hidden">
                    <p>Product ID: {{ $id }} </p>
                    <p>Part Number: {{ $part_number }} </p>
                    <p>EAN Code: {{ $ean }} </p>
                    <p>Warranty: {{ $warranty }} </p>
                </div>
                    
            </div>
        </div>
                 


    </body>
</html>

