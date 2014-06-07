<!doctype html>
<html lang="en" ng-app="app">
    <head>
         <title>NTPie Online Store</title>
         <meta charset="utf-8" />
               
          <!--Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

         <!-- Optional theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css"> 
        
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js"></script>
         
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular-cookies.js"></script> 
    </head>
    
     <body ng-controller="main">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <h1>NTPie Online Store</h1>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-8" ng-controller="products">
                     <h2>Products</h2>
                     <div class="categories btn-group">
                         <button type="button" class="category btn btn-default active" ng-click="products.setCategory(null)" ng-class="{ 'active' : products.category === null }">All</button>
                         <button type="button" class="category btn btn-default" ng-repeat="category in products.categories" ng-click="products.setCategory(category)" ng-class="{ 'active' : products.category.id === category.id }">@{{ category.name }}</button>
                     </div>
                     <div class="products">
                         <div class="product media" ng-repeat="product in products.products | filter : products.filterByCategory">
                             <button type="button" class="pull-left btn btn-default" ng-click="products.addToBasket(product)">Add to basket</button>
                             <div class="media-body">
                                 <h4 class="media-heading">@{{ product.name }}</h4>
                                 <p>Price: @{{ product.price }}, Stock: @{{ product.stock }}</p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4" ng-controller="basket">
                     <a href={{ URL::route('also/index') }}><img alt= "Also" src ="https://www.karriere-suedwestfalen.de/cms/upload/arbeitgeber/logos/gross/logo_0000308.jpg" id="also"></a>
                     <h2>Basket</h2>
                     <form class="basket" name="signup_form">
                         <table class="table">
                             <tr class="product" ng-repeat="product in basket.products track by $index" ng-class="{ 'hide' : basket.state != 'shopping' }">
                                 <td class="name">@{{ product.name }}</td>
                                 <td class="quantity">
                                     <input class="form-control" type="number" ng-model="product.quantity" ng-change="basket.update()" min="1" />
                                 </td>
                                 <td class="product">@{{ product.total }}</td>
                                 <td class="product">
                                     <a class="remove glyphicon glyphicon-remove" ng-click="basket.remove(product)"></a>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'shopping' }">
                                     <input type="email" name="email" class="form-control" placeholder="email" ng-model="basket.email" id="email" required/>
                                         <div class="error-container" ng-show="signup_form.email.$dirty && signup_form.email.$invalid">
                                            <small class="error" ng-show="signup_form.email.$error.required">Your email is required.</small>
                                            <small class="error" ng-show="signup_form.email.$error.email">That is not a valid email. Please input a valid email.</small>
                                        </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'shopping' }">
                                     <input type="password" name="password" class="form-control" placeholder="password" ng-model="basket.password" required/>
                                        <div class="error-container" ng-show="signup_form.password.$dirty && signup_form.password.$invalid">
                                            <small class="error" ng-show="signup_form.password.$error.required">Your password is required.</small>
                                        </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'shopping' }">
                                     <button type="button" class="pull-left btn btn-default" ng-click="basket.authenticate()" >Authenticate</button>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <input type="text" name="card_number" class="form-control" placeholder="card number" ng-model="basket.number" ng-minlength="16" ng-maxlength="16" required/>
                                        <div class="error-container" ng-show="signup_form.card_number.$dirty && signup_form.card_number.$invalid">
                                            <small class="error" ng-show="signup_form.card_number.$error.required">Your card number is required.</small>
                                            <small class="error" ng-show="signup_form.card_number.$error.minlength">Security number must be 16 characters long.</small>
                                            <small class="error" ng-show="signup_form.card_number.$error.maxlength">Security number must be 16 characters long.</small>
                                        </div>
                                 </td>
                             </tr>
                              <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <input type="text" name="expiry" class="form-control" placeholder="expiry" ng-model="basket.expiry" ng-minlength="4" ng-maxlength="4" required />
                                        <div class="error-container" ng-show="signup_form.expiry.$dirty && signup_form.expiry.$invalid">
                                            <small class="error" ng-show="signup_form.expiry.$error.required">Your expiry date required.</small>
                                            <small class="error" ng-show="signup_form.expiry.$error.minlength">Security number must be 4 characters long.</small>
                                            <small class="error" ng-show="signup_form.expiry.$error.maxlength">Security number must be 4 characters long.</small>
                                        </div>
                                 </td>
                             </tr>
                              <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <input type="text" name="security_number" class="form-control" placeholder="security number" ng-model="basket.security" ng-minlength="3" ng-maxlength="3" required/>
                                        <div class="error-container" ng-show="signup_form.security_number.$dirty && signup_form.security_number.$invalid">
                                            <small class="error" ng-show="signup_form.security_number.$error.required">Your security number is required.</small>
                                            <small class="error" ng-show="signup_form.security_number.$error.minlength">Security number must be 3 characters long.</small>
                                            <small class="error" ng-show="signup_form.security_number.$error.maxlength">Security number must be 3 characters long.</small>
                                        </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <button type="button" class="pull-left btn btn-default" ng-click="basket.pay()" >Pay</button>
                                 </td>
                             </tr>
                         </table>
                     </form>
                 </div>
             </div>
         </div>    
         {{ HTML::script('js/shared.js') }} 
     </body>
</html> 

