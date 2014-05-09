(function($) {

	_.each = function (collection, iterator, context) {
		if(Array.isArray(collection)){
		    	for (var i = 0; i < collection.length; i++) {
		    		iterator(collection[i], i, collection);
		    	}
		} else {

			// USE AND OBJECT FOR
			for(var key in collection){
				iterator(collection[key], key, collection);
	    			//console.log(collection[key])
			}
		}
	    
	    
	  };
	var log = function(data){
		console.log(data);
	};
	$fireRoot  = new Firebase('https://tracom-data.firebaseio.com'); 
	$ordersPanel = $("#ordersPanel");
	$trucksPanel = $( "#trucksPanel");
	$driversPanel = $( "#driversPanel");
	$driverTds = $("td.driver");
	$findOrders = $("#findOrders");
	jQuery.extend(
	      {
	      	Drivers : {},
			Driver: {
				list: {},
				array: [],
				getDrivers: function(URL){
					$.Driver.url = URL;
					$.ajax({
						type: "GET",
						url: URL,
						success: function(data){
							//console.log(data);
							$.Driver.find(data);
						}
					});
				},
				find: function(drivers, id){
					if(id){
						return _.findWhere($.Driver.list, {id: id});
					} else {

						_.each(drivers, function (driver, index){
							//console.log("driver = ", driver);
							$.Driver.list[driver.id] = driver;
							$.Driver.setUp(driver);
						});
					}
				},
				getOrders : function(func, driverId){
					
					$fireRoot.child('drivers').child(driverId).child('orders').on('child_added', function(snapshot){
						//var obj = snapshot.val();
						var id = snapshot.name();
						if($.Driver.settingId !== id){

							var obj = _.findWhere($.Order.list, {id: id});
							func(obj, driverId);
						} else {
							console.log($.Driver.settingId, id);
						}
//+=============================
// deal with $.Driver.settings
//+=============================

					});
				},
				setUp: function(obj){
					//_.each($.Driver.list, function (obj, key){
						
						//console.log($.Driver.list[obj.id]);
						var temp = $.Driver.template(obj);
						var locationTemp = $.Driver.locationTemp(obj);
						$(temp).appendTo($driversPanel);

						if(obj.type){
							$("#info_" + obj[obj.type]).text(obj.name);
						}

						if(obj.orders){
							$.Driver.getOrders($.Driver.displayOrder, obj.id);
						}
						//console.log();
						$.Driver.setSortable(obj.id);

						resetSortableDrivers(obj.id);
						resetEvents(obj.id);

					//});
				},
				displayOrder: function(order, driverId){
					//console.log(driverId);
					var orderTemp = [	'<li id="driverOrder_'+order.id+'" data-driver="'+driverId+'" data-order="'+order.id+'" class="external-order label label-primary ui-draggable" style="position: relative;">',
    								'<i class="fa fa-tags" style="display:none;"></i>',
    								order.title,
    							'</li>'].join('');
    					$(orderTemp).appendTo("#driver_" + driverId);
    					//console.log(document.getElementById(order.id).hasAttribute("id"));
				},
				template: function(driver){
					//console.log(driver);
					
					var truck = "";
					if(driver.truck){
						truck = '<span class="pull-right"><i class="fa fa-truck"></i> '+ driver.truck + '</span>';
					}
					var temp = [
						
						'<div class="col-md-3" style="min-height:30px;" id="connectedDr_'+driver.id+'">',
						'<div id="dr_'+driver.id+'" class="block block-custom driver connectedDrivers">',
						'<span id="draggableDr_'+driver.id+'" class="ui-draggable list-group-item-heading"><strong><i class="fa fa-chevron-down"></i> ' + driver.name + '</strong>',
						truck,
						'<i class="fa fa-arrow-down pull-right" style="display:none;"></i>',
						'</span>',
						'<ul id="driver_'+driver.id+'"  style="display:none; border-left:3px solid #eeeeee; padding:10px 0 0 10px;" class="connectedSortable driverOrders">',
							//'<li class="external-order label label-warning ui-draggable">DragMe</li>',

						'</ul>',
						'</div></div>'].join('');
						return temp;
					

					
				},
				locationTemp: function(driver){
					var truck = "";
					/*if(driver.truck){
						truck = '<p style="text-align:right;"><strong><i class="fa fa-truck"></i> '+ driver.truck + '</strong></p>';
					}*/
					var temp = [ 
					 	'<p locationDriver_'+driver.id+'"><strong>'+ driver.name + '</strong></p>'].join('');
					return temp;
				},
				setSelect: function(data){

				},
				update: function(data, driverId, dragged){
					//$.Driver.setting = orderId;
	      			//console.log(data);
	      			//console.log(driverId);
	      			$.ajax({
	      				type: "PUT",
	      				url: $.Driver.url +"/" + driverId,
	      				data: data,
	      				success: function(data){
	      					//console.log(data);
	      				}
	      			});
				},
				setSortable: function(driverId){
					$( "#driver_" + driverId).sortable({
							connectWith: ".connectedSortable",
							dropOnEmpty: true,
							forcePlaceholderSize: true,
							receive: function( event, ui ) {
								//console.log($(ui.item).attr('id'));
								var id = $(ui.item).attr('id').split("_")[1];
								//$.Driver.setting = true;
								$.Driver.settingId = id;
								$.Driver.removeOrder(id, $(ui.item).data('driver'), driverId);

								$fireRoot.child('drivers').child(driverId).child('orders').child(id).set({id: id});
							}
						      		
					}).disableSelection();
					
					
					/*$( "#driverTrucks_" + driverId).sortable({
							connectWith: "ul.connectedTrucks",
							dropOnEmpty: true,
							forcePlaceholderSize: true,
							update: function( event, ui ) {
								var ordersE = $(ui.item).find(".truckOrders").children();
								_.each(ordersE, function (item, index){
									var id = $(item).attr("id");
									//console.log($ui.item).data();

									//$fireRoot.child('drivers').child(driverId).child('orders').child(id).set(id);
								});
									var truckId = $(ui.item).attr("id").split("_")[1];
									var truck = _.findWhere($.Truck.list, {id: truckId});
									$("#tr_" + truckId).remove();
									$.Truck.display(truck);
									$fireRoot.child('drivers').child(driverId).child('truck').set(truck.number);
									$.Driver.getAll($.Driver.display);
							}
							
					}).disableSelection();*/
					//resetSortableTrucks();

				},
				removeOrder: function(orderId, oldDriver, newDriver){
					if(oldDriver){$fireRoot.child('drivers').child(oldDriver).child('orders').child(orderId).remove();}
					$.ajax({
	      				type: "PUT",
	      				url: $.Order.url + "/"+orderId,
	      				data: { driver_id: newDriver },
	      				success: function(data){
	      					console.log(data);
	      				}
	      			});
				}
			},
			
	      	Order: {
	      		list: {},
	      		getAll: function(URL){
	      			$.Order.url = URL;
	      			$.ajax({
	      				type: "GET",
	      				url: URL +"/show",
	      				success: function(orders){
	      					//console.log(orders);
	      					$.Order.find(orders);
	      					$.Order.setSelect(orders);
	      					$.Order.setFinder();
	      					resetEvents();
	      				}
	      			});

	      		},
	      		find: function(orders, id){

	      			if(id){
	      				return _findWhere(orders, {id: id});
	      			} else {
	      					var options = [];
		      			_.each(orders, function (order, index){
		      				//$.Order.list.push(order);
		      				$.Order.list[order.id] = order;
		      				$.Order.setUp(order);

							options.push( '<option value="'+order.id+'">' + order.title + '</option>');
		      			});
						$('#ordersSelect').children().remove();
						$('#ordersSelect').prepend(options);
			 			$('#ordersSelect').selectpicker('refresh');
	      			}
	      		},
	      		update: function(data, orderId, dragged){
	      			//console.log(orderId, data);
	      			if(dragged){$.Order.setting = orderId;}
	      			//console.log(data);
	      			$.ajax({
	      				type: "PUT",
	      				url: $.Order.url +"/" + orderId,
	      				data: data,
	      				success: function(data){
	      					console.log("ok");
	      				}
	      			});
	      		},
	      		setUp: function(order){
	      				var temp = $.Order.template(order);
	      				var panelTemp = $.Order.panelTemplate(order);
	      				$(panelTemp).appendTo($ordersPanel);
	      				var options = [];
			

	      			/*if(order.type === "location"){
	      				$(temp).appendTo("."+order.location).not(":input");
	      			} else if(order.type === "method"){
	      				$(temp).appendTo("." + order.method).not(":input");
	      			}*/
	      				resetSortableOrders();
	      				$.Order.setting = "";
	      				//resetEvents();
	      				//$("#ordersPanel li").show();
	      		},
	      		template: function(order){
	      			var temp = [	'<li id="order_'+order.id+'" data-driver="'+order.driver_id+'" data-location="'+order.location+'" data-method="'+order.method+'" data-order="'+order.id+'" class="external-order label label-primary ui-draggable searchMe" style="position: relative; font-size:25px;">',
	      								'<i class="fa fa-tags" style="display:none;"></i>',
	      								order.number,
	      							'</li>'].join('');
	      			return temp;
	      		},
	      		panelTemplate: function(order){
	      			var temp = [	'<li id="sideorder_'+order.id+'" data-title="'+order.title+'" data-driver="'+order.driver_id+'" data-order="'+order.id+'" class="external-order label label-primary ui-draggable" style="display:none; position: relative;">',	      								
	      								order.title,
	      							'</li>'].join('');
	      			//$(temp).appendTo($ordersPanel);
	      			return temp;

	      		},
	      		setSelect: function(data){
	      			var options = [];
					_.each(data, function (item, index, array){
						options.push( '<option value="'+item.id+'">' + item.title + '</option>');
					});

					$findOrders.children().remove();
					$findOrders.prepend(options);
		 			$findOrders.selectpicker('refresh');
		 			$findOrders.on("change", function(){
	      				console.log($(this).val());
	      				$("#ordersPanel li").hide();
	      				$ordersPanel.find("#sideorder_" + $(this).val() ).show();
	      			});
		 			//$(".selectpicker").selectpicker();
	      		},
	      		setFinder: function(){
	      			$("#container-search").on("keyup", function(){
	      				//$("#ordersPanel li").hide();

	      				var val = $(this).val();
	      				console.log();
	      				$("#ordersPanel li").hide();
	      				/*if(val){
	      				}*/
	      					$("#ordersPanel li:contains("+val+")").show();
	      			});
	      			/*$( '#ordersPanel' ).searchable({
				        //searchField: '#container-search',
				        searchField: '#container-search',
				        //selector: 'li',
				        selector: '.row',
				        //childSelector: '.selectMe',
				        childSelector: '.col-xs-12',
				        show: function( elem ) {
				            elem.slideDown(100);
				        },
				        hide: function( elem ) {
				            elem.slideUp( 100 );
				        }
				    });*/
	      		}
	      	},
	      	Location: {
	      		list: {},
	      		setUp: function(data){
	      			
	      		}
	      	},
		}
	);

	
	//$.Truck.getAll($.Truck.display);
	
            //var socket = io.connect('http://192.184.87.146:3000/');

	$( "#ordersPanel, .connectedSortable").sortable({
		connectWith: ".connectedSortable",
		dropOnEmpty: true,
		forcePlaceholderSize: true,

	      		
	}).disableSelection();



	$('#west_select, #north_select')
            .bootstrapDualListbox({
                bootstrap2Compatible: false,
                moveAllLabel: 'MOVE ALL',
                removeAllLabel: 'REMOVE ALL',
                moveSelectedLabel: 'MOVE SELECTED',
                removeSelectedLabel: 'REMOVE SELECTED',
                filterPlaceHolder: 'FILTER',
                filterSelected: '2',
                filterNonSelected: '1',
                moveOnSelect: true,
                preserveSelectionOnMove: 'all',
                helperSelectNamePostfix: '_myhelper',
                selectedListLabel: 'Selected elements',
                nonSelectedListLabel: 'Unselected elements'
            })
            .bootstrapDualListbox('setMoveAllLabel', 'Move all teh elementz!!!')
            .bootstrapDualListbox('setRemoveAllLabel', 'Remove them all!')
            .bootstrapDualListbox('setSelectedFilter', undefined)
            .bootstrapDualListbox('setNonSelectedFilter', undefined)
            .append('<option>added element</option>')
            .bootstrapDualListbox('refresh');





	function resetSortableOrders(){
		$( "#ordersPanel, .connectedSortable").sortable({
			connectWith: ".connectedSortable",
			dropOnEmpty: true,
			forcePlaceholderSize: true,
			tolerance: "pointer",
			start: function(e, ui){
				//$.Order.setting = $(ui.item).attr("id").split("_")[1];
				$(ui.item).css({"position" : "absolute"});
			},
			//$(".bootstrap-duallistbox-container");
			receive: function(e, ui){
				
				var orderId = $(ui.item).attr("id").split("_")[1];
				var order = _.findWhere($.Order.list, {id: orderId});
				var prevId = $(ui.sender).attr("id");
				var parentId = $(ui.item).parent().attr("id");
				var parentType = $(ui.item).parent().attr("data-type");
				var prevType = $(ui.sender).attr("data-type");
				//console.log("prev = ", prevType, prevId);
				//console.log("parent = ", parentType, parentId);
				if(parentType === "method"){
					var data = {};
					data.type = "method";
					data.method = parentId;
					data.location = null;
					$.Order.update(data, orderId);
				} else if(parentType == 'location') {
					console.log(ui.item);
					var data = {};
					data.type = "location";
					data.location = parentId;
					data.method = null;
					$.Order.update(data, orderId);
					// dont change the type
					//$fireRoot.child(parentType).child(parentId).child('orders').child(orderId).set({id: orderId});
					//$fireRoot.child(prevType).child(prevId).child('orders').child(orderId).remove();
					// change the type
				}
			},
			update: function(e, ui){

			}
		}).disableSelection();
	}

	/*$driversPanel.sortable({
		connectWith: "ul.connected",
		dropOnEmpty: true,
		forcePlaceholderSize: true,
	      		
	}).disableSelection();*/

	function resetOrderEvents(){
		/*$("#ordersPanel li").on("click", function(){
			//log($("#locationsTable").find(".bg-active"));
			$("#locationsTable").find(".bg-active").append(this);
		});*/

	}
	function resetEvents(id){
		resetOrderEvents();
		//console.log(id)
		$("#dr_" + id).on("click", function (){
			/*$(this).find(".label").fadeToggle();*/
			$(this).find(".driverOrders").slideToggle();
			
		});

		
		$(".td-body").on("click", function(){
			//$("div").hasClass("bg-active").removeClass("bg-active");
			$("#ordersPanel li").show();
			$("div").removeClass("bg-active");
			$("#driversPanel").find('.fa-arrow-down').show();
			$("#driversPanel").find('.fa-arrow-down').show();
			$(this).addClass("bg-active");
		});
		//document.querySelector(selector);
		$("#ordersPanel li").on("click", function(){
			var data = {};
			var orderId = $(this).attr("id").split("_")[1];
			data.location = $("#locationsTable").find(".bg-active").attr("id");
			data.method = $("#methodsTable").find(".bg-active").attr("id");
			data.type = "location";
			$.Order.update(data, orderId, false);
		});

		$("#driversPanel span i").not(".fa-chevron-down").on("click", function(){
			//$(this).removeClass("fa-circle-o").addClass("fa-circle").css({"border-bottom-color" : "#009ddf"});
			var data = {};
			$(this).parent().addClass("driver-active");
			var driverId = $(this).parent().attr("id").split("_")[1];
			data.type = "location";
			data.location = $("#locationsTable").find(".bg-active").attr("id");
			var newArray = _.where($.Order.list, {type: "location", location: data.location });

			_.each(newArray, function (item){
				$.Order.update({driver_id: driverId}, item.id);
			});
			$.Driver.update(data, driverId, false);


		});

		/*$("html:not(div)").on("click", function(){
			$(".td-body").removeClass("bg-active");
		});*/

	}
		
	function resetSortableDrivers(driverId){
		//console.log(driverId);
		//$( "#connectedDr_" + driverId + ", #east, #west, #tulsa, #dallas, #shawnee, #stillwater, #shipping, #willcall").sortable({
		$( "#dr_"+driverId+ ", #info_east, #info_west, #info_north, #info_south #info_tulsa, #info_dallas, #info_shawnee, #info_stillwater").sortable({
				connectWith: ".connectedDrivers",
				dropOnEmpty: true,
				forcePlaceholderSize: true,
				tolerance: "pointer",
				//revert: true,
				receive: function( event, ui ) {
					var prev = $(ui.sender).attr("id");

					var id = $(ui.item).attr("id").split("_")[1];
					//log($(ui.item));

					var parent = $(ui.item).parent().attr("id").split("_")[1];
					var parentType = $(ui.item).parent().attr("data-type");
					var array = [];
					data = {};
					data.type = parentType;
					data.location = parent;
					var orders = _.where($.Order.list, data);
					_.each(orders, function (item){
						//$.Order.update({driver_id: driverId}, item.id);
						array.push(item.id);
					});
					data.orders = array.toString();
					$.Driver.update(data, id);
					$(ui.item).prependTo("#" + prev);

					//$(ui.item).sortable("cancel");
					
				},


		}).disableSelection();
	}
	function resetSortableTrucks(){
	
		$trucksPanel.sortable({
			connectWith: "ul.connectedTrucks",
			dropOnEmpty: true,
			forcePlaceholderSize: true,
		      		
		}).disableSelection();
	}

// <![CDATA[
            var socket = io.connect('http://joels-imac.local:3000/');
           /* socket.on('connect', function(data){
                socket.emit('subscribe', {channel:'orders.update'});
            });*/
            socket.on('orders.update', function (data) {
                var order = jQuery.parseJSON(data);
               // console.log(order);
                if($.Order.setting !== order.id){
                		$("#order_" + order.id).remove();
                		$.Order.list[order.id] = order;
                		$.Order.setUp(order);
                }
            });
            socket.on('drivers.update', function (data){
            	//log(data);
            	var driver = jQuery.parseJSON(data);
            	$.Driver.list[driver.id] = driver;
            	$("#connectedDr_" + driver.id).remove();
            	$("#locationDriver_" + driver.id).remove();
            	$.Driver.setUp($.Driver.list[driver.id]);
            });
            
 
// ]]>

}(jQuery));






/*
Truck: {
				list: {},
				getAll: function(func){
					$fireRoot.child('trucks').on("value", function(snap){
						//console.log(snap.val());
						var x = snap.val();
						//Truck.list.push();
						_.each(snap.val(), function (obj, key){
							obj.id = key;
							$.Truck.list[key] = obj;
							//console.log(key);
							func({id: key, driver: obj.driver, name: obj.name, number: obj.number});
						});
						//func({id: snap.name(), driver: x.driver, name: x.name, number: x.number});
					});
				},
				find: function(trucks, id){
					if(!id){
						_.each($.Truck.list, function (truck, index){
							console.log("truck = ", truck);

						});
					} else if(id){
						return _.findWhere($.Truck.list, {id: id});
					}
				},
				display: function(truck){
					//$("#tr_" + driver.id).remove();
					var temp = [
						'<li id="tr_'+truck.id+'" class="list-group-item ui-draggable">',
						'<p class="list-group-item-heading"><i class="fa fa-truck"></i> ' + truck.number + '</p>',
						'<ul id="truck_'+truck.id+'"  style="min-height: 20px; border-top:1px solid #eeeeee; padding:10px 0 10px 0;" class="connectedSortable truckOrders">',
							//'<li class="external-order label label-warning ui-draggable">DragMe</li>',

						'</ul>',
						'</li>'].join('');
					$(temp).appendTo($trucksPanel);
						$( "#truck_" + truck.id).sortable({
							connectWith: ".connectedSortable, ",
							dropOnEmpty: true,
							forcePlaceholderSize: true
						      		
						}).disableSelection();

				}

	      	},
*/				