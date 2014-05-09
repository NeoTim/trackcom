'use strict'

/**
* calendar.controllers Module
*
* Description
*/
angular.module('calendar.controllers', ['ui.calendar', 'ngDragDrop'])


	// $scope.w1.day1 = 
	// $scope.w1.day2 = 
	// $scope.w1.day3 = 
	// $scope.w1.day4 = 
	// $scope.w1.day5 = 
	// $scope.w2.day1 = 
	// $scope.w2.day2 = 
	// $scope.w2.day2 = 
	// $scope.w2.day3 = 
	// $scope.w2.day4 = 
	// $scope.w2.day5 = 
	// $scope.w3.day1 = 
	// $scope.w3.day2 = 
	// $scope.w3.day3 = 
	// $scope.w3.day4 = 
	// $scope.w3.day5 = 


.controller('groupsCtrl', [
						'$scope',
						'Groups',
						'OrdersService',
						'GroupsService',
						'MethodsService',
						'DriversService',
						'ProductService',
						'CustomerService',
						'socket',
						function (
							$scope, 
							Groups,
							OrdersService,
							GroupsService,
							MethodsService,
							DriversService,
							ProductService,
							CustomerService,
							socket
						) {

	OrdersService.get()
		.success(function (data){
			$scope.orders = data;
			_.each($scope.orders, function (order){
				if(order.group_id){
					_.each($scope.groups, function (item, index){
						if(item.id === order.group_id){							
							$scope.groups[index].orders.push(order);
							//console.log($scope.groups);
						}
					});

				}
			});

		});
	$scope.status = {};

	$scope.initSwitch = function(status, id){
		if(status === '0'){
			$scope.status[id] = false;
		} else if (status === '1'){				
			$scope.status[id] = true;
		}
	}

	DriversService.get()
		.success(function (data){
			$scope.drivers = _.where(data, {location: 'sheridan'});
		});
	MethodsService.get()
		.success(function (data){
			$scope.methods = data
		});
	ProductService.get()
		.success(function (data){
			$scope.products = data
		});
	CustomerService.get()
		.success(function (data){
			$scope.customers = data
		});

	$scope.groups = Groups.data;
	// _.each(Groups.data, function (item) {
	// 	if(item.day){
	// 		$scope.groups.push(item);
	// 	}
	// });	
	_.each($scope.groups, function (item, index){
		var orders = _.where($scope.orders, {group_id: item.id});
		console.log($scope.orders);
		if(orders){
			$scope.groups[index].orders = orders;
		}
	});

	// $scope.$watch('groups', function(e){
	// 	//console.log(e);
	// });
	socket.on("orders.update", function(data){
		//console.log(data);
	})
	socket.on('groups.update', function (data){
		var obj = JSON.parse(data)
		_.each($scope.groups, function (item, index){
			if(obj.destroy){
				$scope.groups[index].remove();
			} else {
				_.each($scope.groups, function (item, index){
					if(item.id === obj.id){
						if(obj.msg === 'status'){
							console.log(obj.status)
							$scope.groups[index].status === obj.status;
						} else {
							$scope.groups[index] = obj;
						}
					}
				});
			}
		});
		
	});
	
	$scope.getGroup = function(id){
		var group;
		GroupsService.show(id)
			.success(function (data){
				group = data[0];
			});
		return group;
	}
	$scope.createGroup = function(val){
		
			
	};
	$scope.updateGroup = function(data, id){
		GroupsService.update(data, id)
		
	};
	$scope.removeGroup = function(id){
		GroupsService.destroy(id)
			.success(function (data){
				$scope.groups = data;
				console.log()

			});
	}
	$scope.changeBG = function(data, group){
		_.each(group.orders, function (order){
			OrdersService.update({backgroundColor: data.backgroundColor, grpColor: data.bgColor}, order.id);
		});
		GroupsService.update(data, group.id);	
	};

	$scope.addOrder = function(orderId, group){
		OrdersService.update({group_id: group.id, group:group.title, delivery_date: group.start, grpColor: group.bgColor, backgroundColor: group.backgroundColor}, orderId);
	}

	$scope.addNewOrder = function(order, group){
		OrdersService.save({id:order.number, number:order.number, customer_name: order.customer_name, group_id: group.id, group:group.title, delivery_date: group.start, grpColor: group.bgColor, backgroundColor: group.backgroundColor});		
	}

	$scope.changeStatus = function(status, group){
		var stat;
		var bg;
		if(status === true){
			stat = 1;
			bg = "bg-primary";
		} else if(status === false){
			stat = 0;
			bg = "bg-danger";
		}
		
		$scope.updateGroup({status: stat}, group.id);
		DriversService.update({status: stat}, group.driver_id);
		//var orders = _.where($scope.orders, {group_id: group_id});
		_.each(group.orders, function (order){
			OrdersService.update({status: stat, grpColor: group.bgColor}, order.id);
		});
	}
	$scope.changeDriver = function(D, group){
		var driver = D.split("_")[1];
		var driver_id = D.split("_")[0];
		DriversService.update({group_id: group.id, group: group.title}, driver_id);
		GroupsService.update({driver_id: driver_id, driver: driver}, group.id);
	}

	$scope.changeTruck = function(truckN, group){
		GroupsService.update({truck: truckN}, group.id);
		DriversService.update({truck: truckN}, group.driver_id);
	}
	socket.on('driver.update', function (data){
		var obj = JSON.parse(data);
		if(obj.group_id !== "" || obj.group_id !== 0 || obj.group_id !== null){
			
		}
	});
	socket.on('driver.update', function (data){
		var obj = JSON.parse(data);
		if(obj.group_id !== "" || obj.group_id !== 0 || obj.group_id !== null){

		}
	});

	socket.on('orders.update', function (data){
		var obj = JSON.parse(data);
		if(obj.group_id !== "" || obj.group_id !== 0 || obj.group_id !== null){
			_.each($scope.groups, function (item, index){
				if(item.id === obj.group_id){
					if(obj.allOrders = 'true'){
						_.each($scope.groups[index].orders, function (order, indx){
							if(order.id === obj.id){
								$scope.groups[index].orders[indx] = order;								
							}
						});
						console.log(obj);
					} else {
						$scope.groups[index].orders.push(obj);					
					}
				}
			});
		}
	});
	// socket.on('orders.store', function (data){
	// 	var obj = JSON.parse(data);
	// 	if(obj.group_id !== "" || obj.group_id !== 0 || obj.group_id !== null){
	// 		_.each($scope.groups, function (item, index){
	// 			if(item.id === obj.group_id){
	// 				$scope.groups[index].orders.push(obj);					
	// 			}
	// 		});
	// 	}
	// });



}])
.controller('CalendarCtrl', ['$scope', 'GroupsService', 'socket', function ($scope, GroupsService, socket) {
 	







	// GroupsService.get().success(function (data){
	// 	$scope.groups = data;
	// });
	//$scope.uiConfig.calendar.fullCalendar('render');
	socket.on("groups.store", function(data){
		var obj = JSON.parse(data);
		console.log(data)
		//$scope.events.push(data);
		$scope.groups = obj
		//$scope.myCalendar1.fullCalendar('refetchEvents');

		// _.each($scope.groups, function (item, index){
		// 	if(item.id === obj.id){
		// 		$scope.groups[obj.id] = obj;
		// 	}
		// });
	});
	socket.on("groups.update", function (data){
		var group = JSON.parse(data);
		//$scope.events = groups;
		$scope.myCalendar1.fullCalendar('refetchEvents');
		
	});

var date = new Date();
var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		 // event source that pulls from google.com 
		$scope.eventSource = {
						url: "http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic",
						className: 'gcal-event',           // an option!
						currentTimezone: 'America/Chicago' // an option!
		};
		 // event source that contains custom events on the scope 
		$scope.events = $scope.groups
			// {title: 'All Day Event',start: new Date(y, m, 1)},
			// {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},
			// {id: 999,title: 'Repeating Event',start: new Date(y, m, d - 3, 16, 0),allDay: false},
			// {id: 999,title: 'Repeating Event',start: new Date(y, m, d + 4, 16, 0),allDay: false},
			// {title: 'Birthday Party',start: new Date(y, m, d + 1, 19, 0),end: new Date(y, m, d + 1, 22, 30),allDay: false},
			// {title: 'Click for Google',start: new Date(y, m, 28),end: new Date(y, m, 29),url: 'http://google.com/'}
		//];
		 // event source that calls a function on every view switch 
	$scope.eventsF = function (start, end, callback) {
			var s = new Date(start).getTime() / 1000;
			var e = new Date(end).getTime() / 1000;
			var m = new Date(start).getMonth();
			var events = [{title: 'Feed Me ' + m,start: s + (50000),end: s + (100000),allDay: false, className: ['customFeed']}];
			callback(events);
		};

		$scope.calEventsExt = {
			 color: '#f00',
			 textColor: 'yellow',
			 events: [ 
					{type:'party',title: 'Lunch',start: new Date(y, m, d, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false},
					{type:'party',title: 'Lunch 2',start: new Date(y, m, d, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false},
					{type:'party',title: 'Click for Google',start: new Date(y, m, 28),end: new Date(y, m, 29),url: 'http://google.com/'}
				]
		};
		 // alert on eventClick 
		$scope.alertEventOnClick = function( date, allDay, jsEvent, view ){
			 $scope.alertMessage = ('Day Clicked ' + date);
		};
		 // alert on Drop 
		 $scope.alertOnDrop = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view){
				$scope.alertMessage = ('Event Droped to make dayDelta ' + dayDelta);
				console.log(event);
				GroupsService.update({start: event.start}, event.id);

		};
		 // alert on Resize 
		$scope.alertOnResize = function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ){
				$scope.alertMessage = ('Event Resized to make dayDelta ' + minuteDelta);
		};
		 // add and removes an event source of choice 
		$scope.addRemoveEventSource = function(sources,source) {
			var canAdd = 0;
			angular.forEach(sources,function(value, key){
				if(sources[key] === source){
					sources.splice(key,1);
					canAdd = 1;
				}
			});
			if(canAdd === 0){
				sources.push(source);
			}
		};
		 // add custom event
		$scope.addEvent = function(t) {
			var title = "";
			if(t){title = t;}
			var newG = {
				title: title,
				start: moment().format('l'),
				//className: ['openSesame'],
				color: "danger", 
				backgroundColor: "#e87352"
			};
			GroupsService.save(newG);
			$scope.events.push(newG);
			$scope.newGroup = " ";
			// $scope.events.push({
			// 	newG
			// });
		};
		 // remove event 
		$scope.remove = function(index) {
			$scope.events.splice(index,1);
		};
		 // Change View 
		$scope.changeView = function(view,calendar) {
			calendar.fullCalendar('changeView',view);
		};
		 // Change View 
		$scope.renderCalender = function(calendar) {
			//calendar.fullCalendar('render');
		};
		 // config object 
		$scope.uiConfig = {
			calendar:{
				height: 450,
				editable: true,
				header:{
					left: 'title',
					center: '',
					right: 'today prev,next'
				},
				dayClick: $scope.alertEventOnClick,
				eventDrop: $scope.alertOnDrop,
				eventResize: $scope.alertOnResize
			}
		};
		 // event sources array
		$scope.eventSources = [
				        // your event source
				        {
				            url: '/api/groups', // use the `url` property				         
				        }				        

				    ]


		//$scope.eventSources2 = [$scope.calEventsExt, $scope.eventsF, $scope.events];


}])

// var mm = moment();
		 // 	var dd = 'dddd';
		 // 	var ll = 'l';
		 // 	var week1 = {day1:[] ,day2:[], day3:[], day4:[], day5:[]};
		 // 	var week2 = {day1:[] ,day2:[], day3:[], day4:[], day5:[]};
		 // 	var week3 = {day1:[] ,day2:[], day3:[], day4:[], day5:[]};

		 // 	var today = mm.format(dd);
		 // 	if(moment().format(dd) === 'Monday'){
		 // 		week1.day1 = [moment().format(dd), moment().format(ll)];
		 // 		week1.day2 = [moment().add('days', 1).format(dd), moment().add('days', 1).format(ll)];
		 // 		week1.day3 = [moment().add('days', 2).format(dd), moment().add('days', 2).format(ll)];
		 // 		week1.day4 = [moment().add('days', 3).format(dd), moment().add('days', 3).format(ll)];
		 // 		week1.day5 = [moment().add('days', 4).format(dd), moment().add('days', 4).format(ll)];

		 // 		week2.day1 = [moment().add('days', 7).format(dd), moment().add('days', 7).format(ll)];
		 // 		week2.day2 = [moment().add('days', 8).format(dd), moment().add('days', 8).format(ll)];
		 // 		week2.day3 = [moment().add('days', 9).format(dd), moment().add('days', 9).format(ll)];
		 // 		week2.day4 = [moment().add('days', 10).format(dd), moment().add('days', 10).format(ll)];
		 // 		week2.day5 = [moment().add('days', 11).format(dd), moment().add('days', 11).format(ll)];

		 // 		week3.day1 = [moment().add('days', 14).format(dd), moment().add('days', 14).format(ll)];
		 // 		week3.day2 = [moment().add('days', 15).format(dd), moment().add('days', 15).format(ll)];
		 // 		week3.day3 = [moment().add('days', 16).format(dd), moment().add('days', 16).format(ll)];
		 // 		week3.day4 = [moment().add('days', 17).format(dd), moment().add('days', 17).format(ll)];
		 // 		week3.day5 = [moment().add('days', 18).format(dd), moment().add('days', 18).format(ll)];

		 // 	} else if(moment().format(dd) === 'Tuesday'){
		 // 		week1.day2 = [moment().subtract('days', 1).format(dd), moment().subtract('days', 1).format(ll)];
		 // 		week1.day1 = [moment().format(dd), moment().format(ll)];
		 // 		week1.day3 = [moment().add('days', 1).format(dd), moment().add('days', 2).format(ll)];
		 // 		week1.day4 = [moment().add('days', 2).format(dd), moment().add('days', 3).format(ll)];
		 // 		week1.day5 = [moment().add('days', 3).format(dd), moment().add('days', 4).format(ll)];

		 // 		week2.day1 = [moment().add('days', 6).format(dd), moment().add('days', 6).format(ll)];
		 // 		week2.day2 = [moment().add('days', 7).format(dd), moment().add('days', 7).format(ll)];
		 // 		week2.day3 = [moment().add('days', 8).format(dd), moment().add('days', 8).format(ll)];
		 // 		week2.day4 = [moment().add('days', 9).format(dd), moment().add('days', 9).format(ll)];
		 // 		week2.day5 = [moment().add('days', 10).format(dd), moment().add('days', 10).format(ll)];

		 // 		week3.day1 = [moment().add('days', 13).format(dd), moment().add('days', 13).format(ll)];
		 // 		week3.day2 = [moment().add('days', 14).format(dd), moment().add('days', 14).format(ll)];
		 // 		week3.day3 = [moment().add('days', 15).format(dd), moment().add('days', 15).format(ll)];
		 // 		week3.day4 = [moment().add('days', 16).format(dd), moment().add('days', 16).format(ll)];
		 // 		week3.day5 = [moment().add('days', 17).format(dd), moment().add('days', 17).format(ll)];
		 // 	} else if(moment().format(dd) === 'Wednesday'){
		 // 		week1.day2 = [moment().subtract('days', 2).format(dd), moment().subtract('days', 2).format(ll)];
		 // 		week1.day3 = [moment().subtract('days', 1).format(dd), moment().subtract('days', 1).format(ll)];
		 // 		week1.day1 = [moment().format(dd), moment().format(ll)];
		 // 		week1.day4 = [moment().add('days', 1).format(dd), moment().add('days', 1).format(ll)];
		 // 		week1.day5 = [moment().add('days', 2).format(dd), moment().add('days', 2).format(ll)];

		 // 		week2.day1 = [moment().add('days', 5).format(dd), moment().add('days', 5).format(ll)];
		 // 		week2.day2 = [moment().add('days', 6).format(dd), moment().add('days', 6).format(ll)];
		 // 		week2.day3 = [moment().add('days', 7).format(dd), moment().add('days', 7).format(ll)];
		 // 		week2.day4 = [moment().add('days', 8).format(dd), moment().add('days', 8).format(ll)];
		 // 		week2.day5 = [moment().add('days', 9).format(dd), moment().add('days', 9).format(ll)];

		 // 		week3.day1 = [moment().add('days', 12).format(dd), moment().add('days', 12).format(ll)];
		 // 		week3.day2 = [moment().add('days', 13).format(dd), moment().add('days', 13).format(ll)];
		 // 		week3.day3 = [moment().add('days', 14).format(dd), moment().add('days', 14).format(ll)];
		 // 		week3.day4 = [moment().add('days', 15).format(dd), moment().add('days', 15).format(ll)];
		 // 		week3.day5 = [moment().add('days', 16).format(dd), moment().add('days', 16).format(ll)];
		 // 	} else if(moment().format(dd) === 'Thursday'){
		 // 		week1.day2 = [moment().subtract('days', 3).format(dd), moment().subtract('days', 1).format(ll)];
		 // 		week1.day3 = [moment().subtract('days', 2).format(dd), moment().subtract('days', 2).format(ll)];
		 // 		week1.day4 = [moment().subtract('days', 1).format(dd), moment().subtract('days', 3).format(ll)];
		 // 		week1.day1 = [moment().format(dd), moment().format(ll)];
		 // 		week1.day5 = [moment().add('days', 1).format(dd), moment().add('days', 1).format(ll)];

		 // 		week2.day1 = [moment().add('days', 4).format(dd), moment().add('days', 4).format(ll)];
		 // 		week2.day2 = [moment().add('days', 5).format(dd), moment().add('days', 5).format(ll)];
		 // 		week2.day3 = [moment().add('days', 6).format(dd), moment().add('days', 6).format(ll)];
		 // 		week2.day4 = [moment().add('days', 7).format(dd), moment().add('days', 7).format(ll)];
		 // 		week2.day5 = [moment().add('days', 8).format(dd), moment().add('days', 8).format(ll)];

		 // 		week3.day1 = [moment().add('days', 11).format(dd), moment().add('days', 11).format(ll)];
		 // 		week3.day2 = [moment().add('days', 12).format(dd), moment().add('days', 12).format(ll)];
		 // 		week3.day3 = [moment().add('days', 13).format(dd), moment().add('days', 13).format(ll)];
		 // 		week3.day4 = [moment().add('days', 14).format(dd), moment().add('days', 14).format(ll)];
		 // 		week3.day5 = [moment().add('days', 15).format(dd), moment().add('days', 15).format(ll)];
		 // 	} else if(moment().format(dd) === 'Friday'){
		 // 		week1.day2 = [moment().subtract('days', 4).format(dd), moment().subtract('days',4).format(ll)];
		 // 		week1.day3 = [moment().subtract('days', 3).format(dd), moment().subtract('days', 3).format(ll)];
		 // 		week1.day4 = [moment().subtract('days', 2).format(dd), moment().subtract('days', 2).format(ll)];
		 // 		week1.day5 = [moment().subtract('days', 1).format(dd), moment().subtract('days', 1).format(ll)];
		 // 		week1.day1 = [moment().format(dd), moment().format(ll)];

		 // 		week2.day1 = [moment().add('days', 1).format(dd), moment().add('days', 1).format(ll)];
		 // 		week2.day2 = [moment().add('days', 2).format(dd), moment().add('days', 2).format(ll)];
		 // 		week2.day3 = [moment().add('days', 3).format(dd), moment().add('days', 3).format(ll)];
		 // 		week2.day4 = [moment().add('days', 4).format(dd), moment().add('days', 4).format(ll)];
		 // 		week2.day5 = [moment().add('days', 5).format(dd), moment().add('days', 5).format(ll)];

		 // 		week3.day1 = [moment().add('days', 8).format(dd), moment().add('days', 8).format(ll)];
		 // 		week3.day2 = [moment().add('days', 9).format(dd), moment().add('days', 9).format(ll)];
		 // 		week3.day3 = [moment().add('days', 10).format(dd), moment().add('days', 10).format(ll)];
		 // 		week3.day4 = [moment().add('days', 11).format(dd), moment().add('days', 11).format(ll)];
		 // 		week3.day5 = [moment().add('days', 12).format(dd), moment().add('days', 12).format(ll)];
		 // 	}
		 // 	$scope.week1 = week1;
		 // 	$scope.week2 = week2;
	 	 // 	$scope.week3 = week3;
 	
 	

		// $scope.monday1 = _.where(Groups.data, {start: week1.day1[1]});
		// $scope.tuesday1 = _.where(Groups.data, {start: week1.day2[1]});
		// $scope.wednesday1 = _.where(Groups.data, {start: week1.day3[1]});
		// $scope.thursday1 = _.where(Groups.data, {start: week1.day4[1]});
		// $scope.friday1 = _.where(Groups.data, {start: week1.day5[1]});
		// $scope.monday2 = _.where(Groups.data, {start: week2.day1[1]});
		// $scope.tuesday2 = _.where(Groups.data, {start: week2.day2[1]});
		// $scope.wednesday2 = _.where(Groups.data, {start: week2.day3[1]});
		// $scope.thursday2 = _.where(Groups.data, {start: week2.day4[1]});
		// $scope.friday2 = _.where(Groups.data, {start: week2.day5[1]});
		// $scope.monday3 = _.where(Groups.data, {start: week3.day1[1]});
		// $scope.tuesday3 = _.where(Groups.data, {start: week3.day2[1]});
		// $scope.wednesday3 = _.where(Groups.data, {start: week3.day3[1]});
		// $scope.thursday3 = _.where(Groups.data, {start: week3.day4[1]});
// $scope.friday3 = _.where(Groups.data, {start: week3.day5[1]});
