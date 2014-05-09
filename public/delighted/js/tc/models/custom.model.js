;(function($){
$custom = function () {

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
    	function updateModel(URL, DATA, id){
    		$.ajax({
    			type: "PUT",
    			url: URL + "/" + id,
    			data: DATA,
    			success: function(data){
    				console.log("success", data);
    			}
    		});
    	}
    	

	
	function renderModel(item){
	
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
			updateModel(options.url, data, id);
		},
		collection: function(data){
			var list = {};
			this.list = list;
			
			_.each(data, function(item){
				list[item.id] = item;				
				
				
			});
			
					
		},

		
	};


		

}();
})(jQuery);