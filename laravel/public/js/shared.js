var app = angular.module("app", ["ngCookies"]);

//Ataino kategorijas

app.factory("CategoryService", function($http) {
    return {
        "getCategories": function() {
            return $http.get("/category/index");
        }
    };
});

//Ataino produktus

app.factory("ProductService", function($http) {
    return {
        "getProducts": function() {
            return $http.get("/product/index");
        }
    };
});

app.factory("BasketService", function($cookies){
    var products = JSON.parse($cookies.products || "[]");

//Iegūšt produktus, tiek glabāti JSON masīvā    
        
    return {
        "getProducts" : function() {
            return products;
        },
 
//Pievieno produktu grozam 
 
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

//Izņem no groza

        "remove" : function(product) {
            for (var i = 0; i < products.length; i++) {
                var next = products[i];
                
                if (next.id === product.id) {
                    products.splice(i, 1);
                }
            }
            
            this.store();
        },

//Atjauno groza saturu, produktu cenu (to noapaļojot)

        "update" : function() {
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var raw = product.quantity * product.price;
                
                product.total = Math.round(raw *100) / 100;
            }
            
            this.store();
        },

//Saglabā cookies pašreizējo groza saturu

        "store" : function() {
            $cookies.products = JSON.stringify(products);
        },

//Iztīra grozu

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
            
//Autentifikācija            
           
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
 
//Atgriež konta info 
 
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
          
//Maksājumu loģika         
         
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
    
//Iegūst kategorijas

    var categories = CategoryService.getCategories();
    
    categories.success(function(data) {
        self.categories = data;
    });

//Iegūst produktus
        
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

//Pievieno grozam    
        
    this.addToBasket = function(product){
        BasketService.add(product);
    };
    
    $scope.products = this;
    
});

app.controller("main", function($scope) {
    $scope.main = this;
});

//Groza loģika

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