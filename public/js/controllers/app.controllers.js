/**
* app.controllers Module
*
* Description
*/
angular.module('app.controllers', ['dashboard.controllers', 'production.controllers', 'calendar.controllers', 'deliveries.controllers', 'customers.controllers'])


.controller("BooksController", function($scope, books) {
	$scope.books = books.data;
})




.controller("ordersCtrl", ['$scope', 'orders', '$filter', 'ngTableParams', 'GroupsService', 'OrdersService', 'CustomerService', 'ProductionService', 'MethodsService', 'BatchService', 'ProductService',
				function($scope, orders, $filter, ngTableParams, GroupsService, OrdersService, CustomerService, ProductionService, MethodsService, BatchService, ProductService) {
	//$scope.data = orders.data;
	$scope.orders = orders.data;
	// _.each(orders.data, function (obj){
	// 	$scope.orders[obj.id] = obj;
	// });
	$scope.setVorder = function(order){
		console.log(order);
		$scope.Vorder = order;
		console.log($scope.Vorder.entries);
		$("#order_Modal").modal('show');
	};
	CustomerService.get()
		.success(function (data){
			$scope.customers = data;
		});
	GroupsService.get()
		.success(function (data){
			$scope.groups = data;
		});
	ProductionService.get()
		.success(function (data){
			//$scope.products = data;
			$scope.entries = data;
		});
	MethodsService.get()
		.success(function (data){
			$scope.methods = data;
		});
	ProductService.get()
		.success(function (data){
			$scope.products = data;
		});

	$scope.Norder = {};

	$scope.saveNorder = function(O){
		var method = O.method.split("_")[1];
		var method_id = O.method.split("_")[0];
		var order = {id: O.number, number: O.number, customer_name: O.customer_name, delivery_date: O.delivery_date, location: O.location, method: method, method_id: method_id, group_id: O.group_id};
		OrdersService.save(order);
		_.each(O.entries, function (E, index){
			var entry = {sku: E.sku, order_id: O.number, ready_date: E.ready_date, batch_id: E.batch_id, quantity: E.quantity};
			ProductionService.save(entry);
		});
	};

		// $scope.getEntries = function(orderId){
		// 	console.log(orderId)
		// 	$scope.entries = _.where($scope.products, {order_id: orderId});
		// }
	// var data = syncData('orders');
	//$scope.data = [];
	// var fbref = new Firebase("http://trackcom-data-base.firebaseIO.com/orders");
	// fbref.on('child_added', function(ss) {
	//       $scope.data.push(ss.val())
	//       $scope.tableParams.reload()
	// })


     	$scope.$watch("filter.$", function () {
  		//$scope.tableParams.reload();
  	});	
	$scope.saveOrder = function(order){
		OrdersService.save(order)
			.success(function (data){
				OrdersService.show(order.id)
					.success(function (obj){
						$scope.orders.unshift(obj);
						$scope.newOrder = false;
						$scope.showNew = false;
					});
			});
	};
	$scope.removeOrder = function(id, index){
		OrdersService.destroy(id)
			.success(function (data){
				//console.log(data)
				console.log($scope.orders.splice(index, 1));
			});
	};
	$scope.updateOrder = function(data, id){
		OrdersService.update(data, id);
	};
	$scope.updateVorder = function(V, id){
		var method = V.method.split("_")[1];
		var method_id = V.method.split("_")[0];
		var data = {customer_name: V.customer_name, method: method, method_id:method_id, location: V.location, delivery_date: V.delivery_date};
		OrdersService.update(data, V.id);
	};
	$scope.addEntry = function(orderId){
		ProductionService.save({order_id:orderId})
			.success(function (data){
				var entry = data.pop();
				console.log(entry);
				_.each($scope.orders, function (order, index){
					if(order.id === orderId){
						$scope.orders[index].entries.push(entry);
					}
				});
				//$scope.Vorder.entries.push(data);
			});
	};
	$scope.saveEntries = function(order){
		_.each(order.entries, function (item){
			ProductionService.update({sku: item.sku, ready_date: item.ready_date, batch_id: item.batch_id, quantity: item.quantity}, item.id);
			//console.log(item);
		});
	};
	$scope.updateEntry = function(data, id){
		ProductionService.update(data, id);
	};
	$scope.removeEntry = function(id, orderId){
		ProductionService.destroy(id)
			.success(function (data){			
				$scope.orders = data;
			});
	};

	

}])



.controller("productsCtrl", ['$scope', 'products', '$filter', 'ngTableParams', function($scope, products, $filter, ngTableParams) {
	$scope.data = products.data;
	// var data = syncData('orders');
	//$scope.data = [];
	// var fbref = new Firebase("http://trackcom-data-base.firebaseIO.com/orders");
	// fbref.on('child_added', function(ss) {
	//       $scope.data.push(ss.val())
	//       $scope.tableParams.reload()
	// })

	$scope.groupby = '';

     	$scope.$watch("filter.$", function () {
  		$scope.tableParams.reload();
  	});
	$scope.tableParams = new ngTableParams({
	      page: 1,
	      count: 10,
	      sorting: {
	        name: 'asc'
	      }
	}, {
		groupBy: $scope.groupby,
	      total: $scope.data.length,
	      getData: function($defer, params) {
	      	var filteredData = $filter('filter')($scope.data, $scope.filter);
	        	var orderedData = params.sorting() ? $filter('orderBy')(filteredData, params.orderBy()) : filteredData;
	        	$defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
	      },
	      $scope: $scope
	});
	 $scope.$watch('groupby', function(value){
              $scope.tableParams.settings().groupBy = value;
              console.log('Scope Value', $scope.groupby);
              console.log('Watch value', this.last);
              console.log('new table',$scope.tableParams);
              $scope.tableParams.reload();
          });
	 //$scope.products = syncData('products');

	$scope.getDetails = function(id){
		$scope.details = id;

	}
	
}])


.controller("HomeController", function($scope, $location, AuthenticationService) {
	$scope.title = "Awesome Home";
	$scope.message = "Mouse Over these images to see a directive at work!";

	$scope.logout = function() {
		AuthenticationService.logout().success(function() {
			$location.path('/login');
		});
	};
});
