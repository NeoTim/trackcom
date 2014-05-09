;(function($){
$Truck = function () {

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
    	function updateTruck(URL, DATA, id){
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
		},		

		update: function(data, id){
			updateTruck(options.url, data, id);
		},
		collection: function(data){
			var list = {};
			this.list = list;
			
			_.each(data, function(item){
				list[item.id] = item;				
				//$(" .driver_" + item.id).driverblock({id: item.id, name: item.name, bgColor: item.bgColor, method: item.method, method_id: item.method_id, status: item.status, m_id: item.m_id});
				//$(".truckControl").append('<option data-icone="icon-truck" value="'+item.id+'">'+item.number+' <i class="fa fa-truck"></i></option>');
			});
			
					
		},

		
	};


		

}();
})(jQuery);