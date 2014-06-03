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
                     <form class="basket">
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
                                     <input type="text" name="email" class="form-control" placeholder="email" ng-model="basket.email" />
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'shopping' }">
                                     <input type="password" name="password" class="form-control" placeholder="password" ng-model="basket.password" />
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'shopping' }">
                                     <button type="button" class="pull-left btn btn-default" ng-click="basket.authenticate()" >Authenticate</button>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <input type="text" class="form-control" placeholder="card number" ng-model="basket.number" />
                                 </td>
                             </tr>
                              <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <input type="text" class="form-control" placeholder="expiry" ng-model="basket.expiry" />
                                 </td>
                             </tr>
                              <tr>
                                 <td colspan="4" ng-class="{ 'hide' : basket.state != 'paying' }">
                                     <input type="text" class="form-control" placeholder="security number" ng-model="basket.security" />
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
         {{ HTML::script('/js/shared.js') }}
         <script type="text/javascript">
            var app = angular.module("app", ["ngCookies"]);


/*
app.controller("products", function($scope) {
    console.log("products.init:", $scope.main.shared);
    
    $scope.products = this;
});*/

app.factory("CategoryService", function($http) {
    return {
        "getCategories": function() {
            return $http.get("/category/index");
        }
    };
});

app.factory("ProductService", function($http) {
    return {
        "getProducts": function() {
            return $http.get("/product/index");
        }
    };
});

app.factory("BasketService", function($cookies){
    var products = JSON.parse($cookies.products || "[]");
    
    return {
        "getProducts" : function() {
            return products;
        },
        
        "add" : function(product) {
            products.push({
                "id" : product.id,
                "name" : product.name,
                "price" : product.price,
                "total" : product.price * 1,
                "quantity" : 1
            });
            
            this.store();
        },
        
        "remove" : function(product) {
            for (var i = 0; i < products.length; i++) {
                var next = products[i];
                
                if (next.id === product.id) {
                    products.splice(i, 1);
                }
            }
            
            this.store();
        },
        
        "update" : function() {
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var raw = product.quantity * product.price;
                
                product.total = Math.round(raw *100) / 100;
            }
            
            this.store();
        },
        
        "store" : function() {
            $cookies.products = JSON.stringify(products);
        },
        
        "clear" : function() {
            products.length = 0;
            this.store();
        }
    };
});

app.factory("AccountService", function(
    $http
  ) {
        var account = null;
        
        return {
            "authenticate" : function(email, password) {
                var request = $http.post("/account/authenticate", {
                    "email" : email,
                    "password" : password
                });
                
                request.success(function(data) {
                    if (data.status !== "error") {
                        account = data.account;
                    }
                });
                
                return request;
                
            },
            
            "getAccount" : function() {
                return account;
            }
        };
    });

app.factory("OrderService", function(
    $http,
    AccountService,
    BasketService
  ) {
      return {
          "pay" : function(number, expiry, security) {
              var account = AccountService.getAccount();
              var products = BasketService.getProducts();
              var items = [];
              
              for (var i = 0; i < products.length; i++) {
                  var product = products[i];
                  
                  items.push({
                      "product_id" : product.id,
                      "quantity" : product.quantity
                  });
              }
              
              return $http.post("/order/add", {
                  "account" : account.id,
                  "items" : JSON.stringify(items),
                  "number" : number,
                  "expiry" : expiry,
                  "security" : security
              });
          }
      };
  });

app.controller("products", function(
    $scope,
    CategoryService,
    ProductService,
    BasketService
) {
    var self = this;
    var categories = CategoryService.getCategories();
    
    categories.success(function(data) {
        self.categories = data;
    });
    
    var products = ProductService.getProducts();
    
    products.success(function(data) {
        self.products = data;
    });
    
    this.category = null;
    
    this.filterByCategory = function(product) {
        if (self.category !== null) {
            return product.category.id === self.category.id;
        }
        
        return true;
    };
    
    this.setCategory = function(category) {
        self.category = category;
    };
    
    this.addToBasket = function(product){
        BasketService.add(product);
    };
    
    $scope.products = this;
    
});

app.controller("main", function($scope) {
    $scope.main = this;
});

app.controller("basket", function(
    $scope,
    AccountService,
    BasketService,
    OrderService
) {
    var self = this;
    
    this.products = BasketService.getProducts();
    
    this.update = function() {
        BasketService.update();
    };
    
    this.remove = function(product) {
        BasketService.remove(product);
    };
    
    this.state = "shopping";
    this.email = "";
    this.password = "";
    this.number = "";
    this.expiry = "";
    this.security = "";
    
    this.authenticate = function() {
        var details = AccountService.authenticate(self.email, self.password);
        
        details.success(function(data) {
            if (data.status == "ok") {
                self.state = "paying";
            }
        });
    };
    
    this.pay = function() {
        var details = OrderService.pay(
            self.number,
            self.expiry,
            self.security
          );
  
          details.success(function(data) {
              BasketService.clear();
              self.state = "shopping";
          });
    };
    
    $scope.basket = this;
});
</script>
     </body>
</html> 

