/**
* deliveries.controllers Module
*
* Description
*/
angular.module('deliveries.controllers', ['firebase']).

controller('dropoffCtrl', ['$scope', 'syncData',  function ($scope, syncData) {
	$scope.dropoffs = syncData('dropoffs');
	$scope.newDropoff = function(title){
		$scope.dropoffs.$add({title:title, complete: false});
		$scope.title = "";
	}
	$scope.completeDropoff = function(id, complete){
		if(complete === true){
			$scope.dropoffs.$child(id).$child('complete').$set(false);
		} else {
			$scope.dropoffs.$child(id).$child('complete').$set(true);			
		}
	}
	$scope.removeDropoff = function(id){
		$scope.dropoffs.$remove(id);
	}
}])

.controller('pickupCtrl', ['$scope', 'syncData',  function ($scope, syncData) {
	$scope.pickups = syncData('pickups');

	$scope.newPickup = function(title){
		$scope.pickups.$add({title:title, complete: false});
		$scope.title = "";
	}
	$scope.completePickup = function(id, complete){
		if(complete === true){
			$scope.pickups.$child(id).$child('complete').$set(false);
		} else {
			$scope.pickups.$child(id).$child('complete').$set(true);			
		}
	}
	$scope.removePickup = function(id){
		$scope.pickups.$remove(id);
	}
	
}])

.controller('methodCtrl', ['$scope', 'MethodsService', 'OrdersService', 'DriversService', function ($scope, MethodsService, OrdersService, DriversService) {
	//$scope.init = function(method){
		$scope.trucks = [13, 14, 21, 22, 23, 33, 35, 36, 88, 007];
		
		$scope.initSwitch = function(status){
			if(status === '0'){				
				$scope.status = false;
			} else if (status === '1'){				
				$scope.status = true;
			}
		}

		$scope.updateMethod = function(data, id){
			MethodsService.update(data, id);

		}		
		$scope.changeDriver = function(value, method){
			var driver = value.split("_")[1];
			var driverId = value.split("_")[0];
			$scope.updateMethod({driver: driver, driver_id: driverId}, method.id);
			DriversService.update({method_id: method.id, method: method.label}, driverId);
			var orders = _.where($scope.orders, {method: method.label});
			_.each(orders, function (order){
				OrdersService.update({driver_id: driverId}, order.id);
			});
		}
		$scope.changeStatus = function(status, method){
			var stat;
			var bg;
			if(status === true){
				stat = 1;
				bg = "bg-primary";
			} else if(status === false){
				stat = 0;
				bg = "bg-danger";
			}
			
			$scope.updateMethod({status: stat, bgColor: bg}, method.id);
			$scope.updateDriver({status: stat}, method.driver_id);
			var orders = _.where($scope.orders, {method: method.label});
			_.each(orders, function (order){
				OrdersService.update({status: stat}, order.id);
			});
		}
		$scope.changeTruck = function(truckN, method){
			$scope.updateMethod({truck: truckN}, method.id);
			DriversService.update({truck: truckN}, method.driver_id);
		}
		$scope.addOrder = function(order, method){
			OrdersService.update({
				method: method.label,
				driver_id: method.driver_id,
				status: method.status
				}, order);
		}
		$scope.addNewOrder = function(order, method){
			OrdersService.save({
				id: order.number,
				number:order.number,
				method: method.label,
				method_id: method.id,
				status:method.status, 
				driver_id: method.driver_id,
				customer_name: order.customer
			});
			//$scope.addMethodOrder = "";
		}		
	//}
}])

.controller('deliveriesCtrl', ['$scope', 'OrdersService', 'DriversService', 'CustomerService', 'MethodsService', 'Orders',  'socket', function ($scope, OrdersService, DriversService, CustomerService, MethodsService, Orders, socket) {
	$scope.orders = Orders.data;
	$scope.methods = {};
	MethodsService.get()
		.success(function (data){
			//$scope.methods = data;
			_.each(data, function (method){
				$scope.methods[method.label] = method;
			});
		});

	DriversService.get()
		.success(function (data){
			$scope.drivers = _.where(data, {location: 'reno'}) ;
		});
	CustomerService.get()
		.success(function (data){
			$scope.customers = data;
		});

	socket.on("drivers.update", function (data){
		var driver = JSON.parse(data);
		console.log(driver)
		_.each($scope.drivers, function (item, index){
			if(item.id === driver.id){
				$scope.drivers[index] = driver;
			}
		});
	});

	$scope.trans = false;
	socket.on('methods.update', function (data){
		var method = JSON.parse(data);
		$scope.methods[method.label] = method;
		
	});
	socket.on('orders.store', function (data){
		var obj = JSON.parse(data);
		$scope.orders.push(obj);
	});
	socket.on('orders.update', function (data){

		var obj = JSON.parse(data);
		
	
	
		_.each($scope.orders, function (item, index){
			if(item.id === obj.id){
				$scope.orders[index].method = obj.method;
				//$scope[obj.method] = _.where
				
			}
		});
	
		//$scope.success = false
	});

	/*_.each($scope.orders, function (item, index){
		$scope[item.method] = item;
		console.log(item)
	});*/
	$scope.sortableConfig = {
		connectWith: ".connectedSortable",
		placeholder: "list-group-item btn-danger",
		tolerance: "pointer",		
		//handle: ".mover",
		cursor: "move",
		forcePlaceholder: true,		
		stop: function (e, ui) {
      		// if the element is removed from the first container
		      //if ($(e.target).hasClass('sort-drop') &&
		        //  e.target != ui.item.sortable.droptarget[0]) {
		        // clone the original model to restore the removed item
		      	var parent = $(ui.item.sortable.droptarget[0]).attr("id").split("-")[1];
		      	var start = $(ui.item.sortable.droptarget[0]).attr("data-date");
		      	var id = $(ui.item).attr("id").split("_")[1];
		      	//console.log(parent, id);
		      	OrdersService.update({method: parent}, id).
		      		success(function (data){
		      			//console.log("success = ", data);
		      			$scope.trans = true;
		      		})
		        	// $scope.groups = Groups.data.slice();
			//}
		},		
	};
	$scope.updateOrder = function(data, id){
		OrdersService.update(data, id)
	}
	$scope.saveOrder = function(order){
		OrdersService.save({id: order.number, number: order.number, customer_name: order.customer_name, method: order.method})
			.success(function (data){
				OrdersService.show(order.number)
					.success(function (obj){
						$scope.orders.push(obj);
						$scope.newOrder = false;
						//$scope.showNew = false;
						$("#newOrderModal").modal("hide");
					});
			});
	}
	$scope.placeOrder = function(addorder){
		
		$scope.updateOrder({method: addorder.method}, addorder.order);
	}
	$scope.updateDriver = function(data, id){
		DriversService.update(data, id);
	}
	$scope.driverMethod = function(driver, method){
		//var hasMethod = _.where($scope.drivers, {method: method});
		_.each($scope.drivers, function (item){
			if(item.id !== driver.id){
				// Check if a driver is not already taking this method
				if(item.method === method){
				// if so then ask if it is ok to change the orders over?
					if(confirm("This method is already assigned to " + item.name + ". Would you like to continue?")){						
					 	// if yes then change that drivers method to null
						DriversService.update({method: null}, item.id);
						// loop through each oder and set thier driver id
					 	_.each(item.orders, function (order){
					 	 	$scope.updateOrder({method: method, driver_id: driver.id}, order.id);
						});
						// Finallly change this drivers method to the assigned method
						DriversService.update({method: method}, driver.id);
					}
				} else {
					// else if none of the drivers are assigned to this method loop though each order and assign their driver id
					var orders = _.where($scope.orders, {method: method});
					_.each(orders, function (order){
						OrdersService.update({driver_id: driver.id}, order.id);
					});
					// assign this method to this driver
					DriversService.update({method: method}, driver.id);
				}
			}
		});
		// else do nothing
		
	}
	$scope.driverStatus = function(driver){
		var orders = _.where($scope.orders, {driver_id: driver.id});
		_.each(orders, function (item){
			$scope.updateOrder({status: "In Transit"}, item.id);
		});
		DriversService.update({status: "In Transit"}, driver.id);
	}

}])