'use strict';

/**
* dashboard.controllers Module
*
* Description
*/
angular.module('dashboard.controllers', ['angular-carousel'])

.controller('dashboardCtrl', ['$scope', 'drivers', 'ProductionService', function ($scope, drivers, ProductionService) {
	$scope.drivers = _.where(drivers.data, {location: 'reno'});
	console.log(drivers.data);
	$scope.slides = {};
	ProductionService.get()
		.success(function (data){
			$scope.entries = data;
			var L = data.length
			var LD = L / 4;
			var entries = $scope.entries;
			var eits = $scope.entries;
			for (var i = 0; i < data.length; i+=4) {

				$scope.slides[i] = data.slice(i, i+4)
				
			};
			console.log($scope.slides)
			
		});

	//var L = $scope.entries.length;
	
	
	
}])
