function upCheck(num){
	if(num === '100' || num === 100){
		return {status: 100, color: "success", label: "Complete"};	
	} else if(num === 75 || num === '75'){
		return {status: 100, color: "success", label: "Complete"};	
	} else if(num === 50 || num === '50'){	
		return {status: 75, color: "info", label: "Filling"};
	} else if(num === 25 || num === '25'){
		return {status: 50, color: "primary", label: "Lab"};
	} else if(num === 10 || num === '10'){
		return {status: 25, color: "warning", label: "Production"};			
	}
} 
function downCheck(num){
	//var num = new Number(number);
	if(num === '100' || num === 100){
		return {status: 75, color: "info", label: "Filling"};
	} else if(num === 75 || num === '75'){
		return {status: 50, color: "primary", label: "Lab"};
	} else if(num === 50 || num === '50'){
		return {status: 25, color: "warning", label: "Production"};
	} else if(num === 25 || num === '25'){
		return  {status: 10, color: "danger", label: "Hold"};
	} else if(num === 10 || num === '10'){
		return {status: 10, color: "danger", label: "Hold"};
	}	
}

/**
* production.controllers Module
*
* Description
*/
angular.module('production.controllers', ['ui.sortable'])

.factory('socket', function (socketFactory) {
    return socketFactory({
    	ioSocket: io.connect('http://joels-imac.local:3000')
    });
})


.controller("productionCtrl", [
	'$scope',
	'entries',
	'orderByFilter',
	'ProductionService',
	'socket', 
	'BatchService',
	'ProductService',
	function($scope, entries, orderByFilter, service, socket, BatchService, ProductService) {

	BatchService.get()
		.success(function (data){
			$scope.batches = data;
		});

	$scope.products = [];
	ProductService.get()
		.success(function (data){
			_.each(data, function (item){
				var newItem = item.sku.split('-')[0];
				if(!_.contains($scope.products, newItem)){
					$scope.products.push(newItem);
				}
			});
		});

	BatchService.get()
		.success(function (data){
			$scope.batches = data;
		});
	var object =  _.indexBy(entries.data, 'priority');
	$scope.entries = entries.data;
	/*_.each(object, function (item, index){
		$scope.entries[item.id] = item;
	});*/

	/*$scope.$watch('entries', function(){

	});*/
	console.log($scope.entries)
	//socket.emit('entries.update', 'Hello There');
	socket.on("entries.update", function (data){
		console.log(data)
		var entry = JSON.parse(data);
		var batch = JSON.parse(data);
		if(entry.number){
			_.each($scope.batches, function (item, index){
				if(item.id === batch.id){
					$scope.batches[index].status = batch.status
					$scope.batches[index].color = batch.color
					$scope.batches[index].label = batch.label
				}
			})
		} else {		
			_.each($scope.entries, function (item, index){
				if(item.id === entry.id){
					$scope.entries[index].status = entry.status
					$scope.entries[index].color = entry.color
					$scope.entries[index].label = entry.label
				}
			})
		}
	});

	socket.on("batches.update", function (data){
		console.log(data)
		var batch = JSON.parse(data);
		console.log(batch)
		_.each($scope.batches, function (item, index){
			if(item.id === batch.id){
				$scope.batches[index].status = batch.status
				$scope.batches[index].color = batch.color
				$scope.batches[index].label = batch.label
			}
		})
	});

	$scope.productionConfig  = {
		placeholder: "beingDragged",
		tolerance: "pointer",
		
		handle: ".mover",
		cursor: "move",
		
		forcePlaceholder: true
	}

	$scope.updateEntryBatch = function(batch, id){
		service.update({batch_id: batch}, id);
	}
	$scope.statusDown = function(status, id){
		var stats = downCheck(status);
		//console.log(stats);
		
		service.update(stats, id);
	}
	$scope.statusUp = function(status, id){
		var stats = upCheck(status);
		//console.log(stats);
		service.update(stats, id);
	}

	$(".options-holder div").first().on("click", function(e){
		e.preventDefault();
		console.log($(this));
		$scope.showNewEntry = true;
	});

	$scope.createBatch = function(batch){
		BatchService.save({id: batch.number, number: batch.number, sku: batch.sku, ready_date: batch.ready_date, gallons: batch.gallons})
			.success(function (data){
				$scope.batches = data;
			})

	}
	$scope.BstatusDown = function(status, id, entries){
		var stats = downCheck(status);
		//console.log(stats);		
		BatchService.update(stats, id)
		_.each(entries, function (item){
			service.update(stats, item.id)
		});
			//.success(function)
	}
	$scope.BstatusUp = function(status, id, entries){
		var stats = upCheck(status);
		//console.log(stats);
		BatchService.update(stats, id);
		_.each(entries, function (item){
			service.update(stats, item.id)
		});
	}
	$scope.setVbatch = function(batch){
		$scope.Vbatch = batch;
	}
	$scope.saveVbatch = function(V){
		var data = {number: V.number, ready_date: V.ready_date, sku: V.sku, gallons: V.gallons, notes: V.notes};
		BatchService.update(data, V.id);
	}
	// $scope.$watchCollection('entries', function(){
	// 	$scope.entries = orderByFilter($scope.entries, ['priority']);

	// });
	//$scope.entries


}])

.controller("batchesCtrl", [
	'$scope',	
	'orderByFilter',
	'ProductionService',
	'socket', 
	'BatchService',
	'ProductService',
	function($scope, orderByFilter, service, socket, BatchService, ProductService) {



	
	//var object =  _.indexBy(entries.data, 'priority');
	//$scope.entries = entries.data;
	/*_.each(object, function (item, index){
		$scope.entries[item.id] = item;
	});*/

	/*$scope.$watch('entries', function(){

	});*/
	//console.log($scope.entries)

	

	$scope.BproductionConfig  = {
		placeholder: "beingDragged",
		tolerance: "pointer",
		
		handle: ".mover",
		cursor: "move",
		
		forcePlaceholder: true
	}




	// $scope.$watchCollection('entries', function(){
	// 	$scope.entries = orderByFilter($scope.entries, ['priority']);

	// });
	//$scope.entries


}])