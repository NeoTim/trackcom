/**
* app.routes Module
*
* Description
*/
 angular.module('app.routes', [])

	.config(function($routeProvider) {

	$routeProvider.when('/login', {
		templateUrl: 'templates/login.html',
		controller: 'LoginController'
	});

	$routeProvider.when('/home', {
		templateUrl: 'templates/home.html',
		controller: 'HomeController'
	});
	$routeProvider.when('/signup', {
         templateUrl: 'views/pages/signup.html',
         controller: 'LoginCtrl'
      }); 
	$routeProvider.when('/login', {
         templateUrl: 'views/pages/signin.html',
         controller: 'LoginCtrl'
      }); 
	$routeProvider.when('/dashboard', {
		templateUrl: 'templates/dashboard/dashboard.html',
		controller: 'dashboardCtrl',
		authRequired: true,
		resolve: {
			drivers: function(DriversService){
				return DriversService.get();
			}			
		}
	});
	$routeProvider.when('/deliveries', {
		authRequired: true,
		templateUrl: 'templates/deliveries/deliveries.html',
		controller: 'deliveriesCtrl',
		resolve: {
			Orders: function(OrdersService){
				return OrdersService.get();
			}
		}
	});
	$routeProvider.when('/production', {
		authRequired: true,
		templateUrl: 'templates/production/production.html',
		controller: 'productionCtrl',
		resolve: {
			entries: function(ProductionService){
				return ProductionService.get();
			}
		}
	});
	$routeProvider.when('/orders', {
		authRequired: true,
		templateUrl: 'templates/orders/orders.html',
		controller: 'ordersCtrl',
		resolve: {
			orders: function(OrdersService){
				return OrdersService.get();
			}
		}
	});
	$routeProvider.when('/orders/:orderId', {
		authRequired: true,
		templateUrl: 'templates/orders/orders.single.html',
		controller: 'orderCtrl'
	});


	$routeProvider.when('/products', {
		authRequired: true,
		templateUrl: 'templates/products/products.html',
		controller: 'productsCtrl',
		resolve: {
			products: function(ProductService){
				return ProductService.get();
			}
		}
	});
	$routeProvider.when('/calendar', {
		authRequired: true,
		templateUrl: 'templates/calendar/calendar.html',
		controller: 'groupsCtrl',
		resolve: {
			Groups: function(GroupsService){
				return GroupsService.get();
			}
		}
	});

	$routeProvider.when('/customers', {
		authRequired: true,
		templateUrl: 'templates/customers/customers.html',
		controller: 'customersCtrl',
		resolve: {
			Customer : function(CustomerService) {
				return CustomerService.get();
				}
			}
	});
	$routeProvider.when('/customers/:customerId', {
		authRequired: true,
		templateUrl: 'templates/customers/customers.single.html',
		controller: 'custCtrl'		
	});


	$routeProvider.otherwise({ redirectTo: '/dashboard' });
});