;(function($){
$Method = function () {

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
    	function updateMethod(URL, DATA, id){
    		$.ajax({
    			type: "PUT",
    			url: URL + "/" + id,
    			data: DATA,
    			success: function(data){
    				console.log("success", data);
    			}
    		});
    	}
    	
	
	function renderMethods(item){
	
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
		            socket.on('methods.update', function (data){		            	
		            	var driver = jQuery.parseJSON(data);
		            	console.log("node ",data);
		            	
		            });
		            
			 
			// ]]>
		},		


		collection: function(data){
			var list = {};
			this.list = list;
			
			_.each(data, function(item){
				list[item.id] = item;				
				$("#method-" + item.m_id).dropPanel({primaryId:item.id, id: item.m_id ,title: item.title, driver: item.driver});
				$(".methodControl").append('<option value="'+item.m_id+'-'+item.id+'">' + item.title + '</option>');
				$("#newOrderMethod").append('<option value="'+item.id+'-'+item.m_id+'">'+item.title+ '</option>');
			});
			$(".selectpicker").selectpicker('refresh');
			
					
		},
		update: function(data, id){
			updateMethod(options.url, data, id);
		}

		
	};


		

}();
})(jQuery);