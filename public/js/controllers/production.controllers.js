function upCheck(num){
	if(num === '100' || num === 100){
		return {status: 100, color: "success", label: "Complete", completed: 1};
	} else if(num === 75 || num === '75'){
		return {status: 100, color: "success", label: "Complete", completed: 1};	
	} else if(num === 50 || num === '50'){	
		return {status: 75, color: "info", label: "Filling", completed: 0};
	} else if(num === 25 || num === '25'){
		return {status: 50, color: "primary", label: "Lab", completed: 0};
	} else if(num === 10 || num === '10'){
		return {status: 25, color: "warning", label: "Production", completed: 0};	
	}
} 
function downCheck(num){
	//var num = new Number(number);
	if(num === '100' || num === 100){
		return {status: 75, color: "info", label: "Filling", completed: 0};
	} else if(num === 75 || num === '75'){
		return {status: 50, color: "primary", label: "Lab", completed: 0};
	} else if(num === 50 || num === '50'){
		return {status: 25, color: "warning", label: "Production", completed: 0};
	} else if(num === 25 || num === '25'){
		return  {status: 10, color: "danger", label: "Hold", completed: 0};
	} else if(num === 10 || num === '10'){
		return {status: 10, color: "danger", label: "Hold", completed: 0};
	}	
}

/**
* production.controllers Module
*
* Description
*/
angular.module('production.controllers', ['ui.sortable'])




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


	$scope.getBatches = function(data){		
		if(!data){		
			BatchService.get()
				.success(function (data){
					//$scope.batches = data;
					$scope.today = _.where(data, {place: 'today'});
					$scope.later = _.where(data, {place: 'later'});
					//$scope.completedToday = _.where(data, {place: 'today', status: '100', completed: '1'});
					//$scope.completedLater = _.where(data, {place: 'later', status: '100', completed: '1'});
				});
		} else {
			console.log(data)
			$scope.today = _.where(data, {place: 'today'});
			$scope.later = _.where(data, {place: 'later'});
			//$scope.completedToday = _.where(data, {place: 'today', status: '100'});
			//$scope.completedLater = _.where(data, {place: 'later', status: '100'});
		}
	}
	$scope.getBatches();
	var object =  _.indexBy(entries.data, 'priority');
	$scope.entries = entries.data;	
	

	// SOCKETS

	socket.on("entries.update", function (data){
		//console.log(data)
		var entry = JSON.parse(data);
		var batch = JSON.parse(data);
		if(batch.all === true){
			//console.log(batch)
			$scope.getBatches(batch);			

		} else if(entry.number){
			console.log(batch)
			_.each($scope[batch.place], function (item, index){
				if(item.id === batch.id){
					$scope[batch.place][index].status = batch.status
					$scope[batch.place][index].color = batch.color
					$scope[batch.place][index].label = batch.label
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
		//console.log(data)
		var batch = JSON.parse(data);
		if(batch.all){
			console.log(batch)
			// $scope.today = _.where(data, {place: 'today'});
			// $scope.later = _.where(data, {place: 'later'});
			// $scope.completedToday = _.where(data, {place: 'today', status: '100'});
			// $scope.completedLater = _.where(data, {place: 'later', status: '100'});
		} else {			
			_.each($scope.batches, function (item, index){
				if(item.id === batch.id){
					$scope.batches[index].status = batch.status
					$scope.batches[index].color = batch.color
					$scope.batches[index].label = batch.label
				}
			})
		}
		
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

	$scope.createBatch = function(batch, place){
		BatchService.save({id: batch.number, number: batch.number, sku: batch.sku, ready_date: batch.ready_date, gallons: batch.gallons, place: place})
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

	$scope.updateBatches = function(){
		BatchService.update({batches:'all'}, 1);
		$scope.saveBatches = false;
	}

	// SORTABLES

	$scope.sortableIncomplete  = {
		placeholder: "list-group-item bg-primary",
		connectWith : ".sortableIncomplete",
		tolerance: "pointer",		
		handle: ".mover",
		cursor: "move",
		forcePlaceholder: true,
		receive: function(e, ui){
			var batch_place;
			var batch_id = $(ui.item).attr("id").split('_')[2];
			var place = $(ui.item).attr("id").split('_')[1];
			if(place === "later"){
				batch_place = "today"
			} else if(place === "today"){
				batch_place = "later"
			}

			//console.log($(ui.item));
			BatchService.update({place: batch_place}, batch_id)
				.success(function (){
					$scope.saveBatches = true;					
				});
		}
	}
	$scope.sortablecomplete  = {
		placeholder: "list-group-item bg-primary",
		connectWith : ".sortablecomplete",
		tolerance: "pointer",		
		handle: ".mover",
		cursor: "move",
		forcePlaceholder: true,
		receive: function(e, ui){
			var batch_place;
			var batch_id = $(ui.item).attr("id").split('_')[2];
			var place = $(ui.item).attr("id").split('_')[1];
			if(place === "later"){
				batch_place = "today"
			} else if(place === "today"){
				batch_place = "later"
			}

			console.log(batch_place, batch_id);
			BatchService.update({place: batch_place}, batch_id)
				.success(function (){
					$scope.saveBatches = true;					
				});
		}
	}
	$scope.saveBatches = false;
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

	

	




	// $scope.$watchCollection('entries', function(){
	// 	$scope.entries = orderByFilter($scope.entries, ['priority']);

	// });
	//$scope.entries


}])