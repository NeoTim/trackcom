;(function($){
$Order = function () {

    // private functions & variables
    	var options = {};
    	function collect(URL, model) {
		$.ajax({
			type: "GET",
			url: URL + "/show",
			success: function(data){
				model.collection(data);

			}
		});      
    	}
    	function updateOrder(URL, DATA, id){
    		$.ajax({
    			type: "PUT",
    			url: URL + "/" + id,
    			data: DATA,
    			success: function(data){
    				console.log("success", data);
    			}
    		});
    	}
    	function dropOrder(item){
    		var oldorder = $("li#order_drop-" + item.id);
    		/*if(oldorder.hasClass('order-drop')){
			oldorder.orderdrop('method', item.method);
		} else {
			var el = $("<li></li>")
			.orderdrop({
				id: item.id,
				number: item.number,
				customer: item.customer_id,
				//bgColor: 'bg-default',
				//color: 'text-dark',
				method: item.method_id,
				//method_id: item.method_id,
				driver: item.driver_id
			});
			//$("#drop-" + item.method_id).append(el);
		}*/
		//$(".connectedSortable").sortable('refresh');
		//$("#drop-" + item.method_id).append(el);
		//console.log(item.method);
	}
	function dropSelect(options){
		$('#ordersSelect').children().remove();
		$('#ordersSelect').prepend(options);
		$('#ordersSelect').selectpicker('refresh');
	}
	function renderOrder(item){
		var oldorder = $("li#order_drop-" + item.id).data('orderdrop');
		if($("li#order_drop-" + item.id).hasClass('order-drop')){
			/*var dropper = $("li#order_drop-" + item.id).data("orderdrop");
			dropper._setOption("method", item.method_id);
			dropper._setOption("driver", item.driver_id);
			dropper._setOption("bgColor", item.bgColor);*/
			$("li#order_drop-" + item.id).orderdrop({
				method: item.method_id,
				bgColor: item.bgColor,
				driver: item.driver_id

			}).removeClass("bg-success bg-default bg-primary bg-warning bg-danger").addClass(item.bgColor);
			console.log(oldorder);
		} else {		
			var el = $("<li></li>").addClass(item.bgColor)
			.orderdrop({
				id: item.id,
				bgColor: item.bgColor,
				number: item.number,
				customer: item.customer_id,
				popover: true,
				//bgColor: 'bg-default',
				//color: 'text-dark',
				method: item.method_id,
				//method_id: item.method_id,
				driver: item.driver_id
			});
		}
			//$("#drop-" + item.method_id).append(el);
		
			//$(".connectedSortable").sortable('refresh');
			//$("#order_drop-" + item.id).remove();
	}
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
				
				var orderId = $(ui.item).attr("id").split("-")[1];
				var order = _.findWhere($Order.list, {id: orderId});
				var prevId = $(ui.sender).attr("id");
				var parentId = $(ui.item).parent().attr("id").split("-")[1];
				//var parentType = $(ui.item).parent().attr("data-type");
				var prevType = $(ui.sender).attr("data-type");
				//console.log("prev = ", prevType, prevId);
				//console.log("parent = ", parentType, parentId);
				
				var data = {};
				data.type = "method";
				data.method = parentId;
				data.method_id = parentId;					
				updateOrder(options.url, data, orderId);		
					// dont change the type
					//$fireRoot.child(parentType).child(parentId).child('orders').child(orderId).set({id: orderId});
					//$fireRoot.child(prevType).child(prevId).child('orders').child(orderId).remove();
					// change the type
				
			},
			update: function(e, ui){

			}
		}).disableSelection();
	}

    // public functions
    return {

        	//main function
		init: function (url) {
			//console.log(this);
			options.url = url; 
			collect(url, this);
			// <![CDATA[
		            var socket = io.connect('http://joels-imac.local:3000/');
		           /* socket.on('connect', function(data){
		                socket.emit('subscribe', {channel:'orders.update'});
		            });*/
		            socket.on('orders.update', function (data) {
		                var item = jQuery.parseJSON(data);
		                console.log("node", item);
		                renderOrder(item);
		                /*if($.Order.setting !== order.id){
		                		$("#order_" + order.id).remove();
		                		$.Order.list[order.id] = order;
		                		$.Order.setUp(order);
		                }*/
		            });
		            socket.on('drivers.update', function (data){
		            	//log(data);
		            	var driver = jQuery.parseJSON(data);
		            	/*$.Driver.list[driver.id] = driver;
		            	$("#connectedDr_" + driver.id).remove();
		            	$("#locationDriver_" + driver.id).remove();
		            	$.Driver.setUp($.Driver.list[driver.id]);*/
		            });
		            
			 
			// ]]>
		},		


		collection: function(data){
			var list = {};
			this.list = list;
			var options = [];
			_.each(data, function(item){
				list[item.id] = item;
				if(item.method_id){
					renderOrder(item);
				}
				//console.log(item.entries);
				options.push('<option value="'+item.id+'">' + item.title + '</option>');
				/*$("#order_pop_" + item.id).gpopover({
					preventHide :true
				});*/
				//$("#truckSelect_" + item.id).bsFormButtonset('attach', {buttonClasses: "btn-white btn-sm", isOptional: true, isJustified: true});
			});
			dropSelect(options);
			resetSortableOrders();
			//dropOrders
			//console.log(list);
		},


		update: function(data, id){
			updateOrder(options.url, data, id);
		},

		dropFromSelect: function(orderId, methodId){
			var m = $("#input-" + methodId).val();	           
	           var DATA = {method_id: methodId, method: m};
	           updateOrder(options.url, DATA, orderId);
		},



		//some helper function
		doSomeStuff: function () {
			myFunc();
		}

	};


		

}();
})(jQuery);