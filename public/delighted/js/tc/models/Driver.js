;(function($){
$Driver = function () {

    // private functions & variables
    	var options = {};
    	function collect(URL, model) {
		$.ajax({
			type: "GET",
			url: URL,
			success: function(data){
				model.collection(data);

			}
		});      
    	}
    	function updateDriver(URL, DATA, id){
    		$.ajax({
    			type: "PUT",
    			url: URL + "/" + id,
    			data: DATA,
    			success: function(data){
    				console.log("success", data);
    			}
    		});
    	}
    	

	
	function renderDrivers(item){
	
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
		                //console.log("node", item);
		               // renderOrder(item);
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

		update: function(data, id){
			updateDriver(options.url, data, id);
		},
		collection: function(data){
			var list = {};
			this.list = list;
			
			_.each(data, function(item){
				list[item.id] = item;				
				$(" .driver_" + item.id).driverblock({id: item.id, name: item.name, bgColor: item.bgColor, method: item.method, method_id: item.method_id, status: item.status, m_id: item.m_id, truck: item.truck, truck_id: item.truck_id});
			});
			
					
		},

		
	};


		

}();
})(jQuery);