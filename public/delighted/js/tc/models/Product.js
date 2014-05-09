;(function($){
$Product = function () {

    // private functions & variables
    	var options = {};
    	function collect(URL, model) {
		$.ajax({
			type: "GET",
			url: URL +"/show",
			success: function(data){
				model.collection(data);

			}
		});      
    	}
    	function getOrder(id, URL, callBack) {

		$.ajax({
			type: "GET",
			url: URL +"/entry/order/" + id,
			success: function(data){
				//model.collection(data);
				callBack(_.pick(data, 'number'));

			}
		});      
    	}
    	function updateModel(URL, DATA, id){
    		console.log(DATA);
    		$.ajax({
    			type: "PUT",
    			url: URL + "/" + id,
    			data: DATA,
    			success: function(data){
    				//console.log("success", data);
    			}
    		});
    	}
    	function updateStatus(item){
    		$("#entry_" + item.id).data("prodFilter")
    			._setOption('status', {status: item.status, color:item.color, label: item.label});
    	}
    	function renderUpdate(item){
    		 var old = _.where($Product.list, {id: item.id})[0];
    		 console.log(old);
    		var prod = $("#entry_" + item.id).data("prodFilter");
    		    		
    		var updated = {};
    		_.each(item, function (newo, key){
    				console.log(newo, old[key]);
    			if(newo !== old[key]){
    				console.log(newo, old[key]);
    				updated[key] = newo;
    			}
    		});
    		$Product.list[item.id] = item;

    		//var updatedVal = _.omit(updated, ["created_at", "updated_at"]);

    		_.each(updated, function (obj, key){
    			prod._setOption(key, obj);
    		});
    		
    			


    	}
	
	function renderModel(item, entryUrl){
		//console.log(item.id);
		/*getOrder(item.order_id, entryUrl, function (data){
			item.order = data
			console.log(item.order);
		});*/
			//var containers = JSON.parse(item.containers);
			//console.log(containers);

			var el = $('<tr id="entry_'+item.id+'"></tr>').prodFilter({
				id: item.id,
				ptype: item.ptype_id,
				priority: item.priority,
				order: item.order_id,
				sku: item.sku,
				groupBy: item.groupBy,
				date: item.ready_date,
				batch: item.batch,
				containers: JSON.parse(item.containers),
					/*{id:1, size: item.container1, qty: item.qty1, gal: item.gal1, desc: item.descr1},
					{id:2, size: item.container2, qty: item.qty2, gal: item.gal2, desc: item.descr2},
					{id:3, size: item.container3, qty: item.qty3, gal: item.gal3, desc: item.descr3},*/
				
				status: {status: item.status, color: item.color, label:item.label}
			});
	}
	

    // public functions
    return {

        	//main function
		init: function (url, entryUrl) {
			//console.log(this);
			options.url = url; 
			options.entryUrl = entryUrl; 
			collect(url, this);
			// <![CDATA[
		            var socket = io.connect('http://joels-imac.local:3000/');
		           /* socket.on('connect', function(data){
		                socket.emit('subscribe', {channel:'orders.update'});
		            });*/
		            socket.on('entries.update', function (data) {
		                var item = jQuery.parseJSON(data);
		               
		                var ready = _.pick(item, 'id', 'sku', 'containers', 'batch', 'date', 'groupBy', 'desc1');
		               renderUpdate(ready);
		                console.log("node", ready);
		            });			 
		            socket.on('entries.status', function (data) {
		                var item = jQuery.parseJSON(data);
		                //console.log("node", data);
		               updateStatus(item);
		            });
		             socket.on('entries.all', function (data) {
		                var entries = jQuery.parseJSON(data);
		                console.log(entries);
		                //removeEntry(data);
		            });
			// ]]>		
		},		

		update: function(data, id){
			updateModel(options.url, data, id);
		},
		collection: function(data){
			//console.log(data);
			var list = {};
			var obj = eval(data)
			$Product.list = _.indexBy(obj, 'priority');

			//console.log(obj)
			_.each(this.list, function(item){
				list[item.id] = item;
				//console.log(_.pick(item, 'priority', 'sku'))
				renderModel(item, options.entryUrl);
			});
			
					
		},

		
	};


		

}();
})(jQuery);