'use strict';

/**
* dashboard.controllers Module
*
* Description
*/
angular.module('orders.controllers', [])

.controller("orderCtrl", ['$scope', '$filter', '$routeParams', 'GroupsService', 'OrdersService', 'CustomerService', 'ProductionService', 'MethodsService', 'BatchService', 'ProductService',
	function($scope, $filter, $routeParams, GroupsService, OrdersService, CustomerService, ProductionService, MethodsService, BatchService, ProductService) {


		$scope.orderId = $routeParams.orderId;

		function getEntries(){
		$scope.entries =[];
			ProductionService.get().success(function (data){
				//$scope.entries = _.where(data, {order_id : $scope.orderId});
				_.each(data, function (item, index){
					if(item.order_id === $scope.orderId){
						$scope.entries.push(item);
					}
				});
			});		
		}

		BatchService.get().success(function (data){
			$scope.batches = data;
		});
		CustomerService.get().success(function (data){
			$scope.customers = data;
		});
		MethodsService.get().success(function (data){
			$scope.methods = data;
		});	
		ProductService.get().success(function (data){
			$scope.products = data;
		});
		GroupsService.get(function (data){
			$scope.groups = data;
		});

		OrdersService.show($scope.orderId).success(function (data){
			$scope.order = data;
		});

		$scope.updateOrder = function(data, id){
			console.log(data)
			OrdersService.update(data, id).success(function (data){
				// Notification
				console.log(data);
			});
		};
		$scope.updateEntry = function(data, id){
			console.log(data)
			ProductionService.update(data, id).success(function (data){
				// Notification
				console.log(data);
			});
		};

		$scope.addEntry = function(orderId){
			ProductionService.save({order_id:orderId}).success(function (data){
				getEntries();
			});
		};

		$scope.removeEntry = function(entryId){
			ProductionService.destroy(entryId).success(function (){
				_.each($scope.entries, function (item, index){
					if(item.id === entryId){
						$scope.entries.splice(index, 1);
					}
				});
			});

		};

		getEntries();
	
}])
