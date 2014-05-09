var gridster;													
var serialization;
$show = $(".log");

	//$show.text(localStorage);
	//localStorage.clear();	

	var each = function(array, cb){
		for (var i = 0; i < array.length; i++) {
			cb(array[i], i, array);
		}
	};

	

$(function(){ //DOM Ready
	if(typeof (Storage) !== "undefined"){
		console.log(localStorage);
		//localStorage.grid = [];
		if(localStorage.grid){
		
			serialization = localStorage.grid;

			

		} else {

		}

		
		gridster = $(".gridster ul").gridster({
			widget_margins: [10, 10],
			widget_base_dimensions: [140, 140],
			resize: {enabled: true},
			draggable: {
				stop: function(event, ui){
					var s = gridster.serialize();
					var array = [];
					each(s, function (item, index){
						//JSON.stringify(item);
						localStorage.key('grid');
						//array.push(item);
						console.log(localStorage.grid);
					});
					//$show.text(array);
					//localStorage.grid = array;
					//console.log(array);
					//localStorage.setItem('grid1',  s);
					//localStorage.setItem('grid1',  s);
					/*each(s, function (item, index){
						//console.log(localStorage.grid1[index] = item);
						//localStorage = item;
						
						$show.text(localStorage.grid1);
					});*/
				}
			}
		}).data('gridster');
		if(serialization){
			gridster.remove_all_widgets();
			$.each(serialization, function(i, item) {
			//for(var key in serialization){		
				gridster.add_widget('<li />', this.size_x, this.size_y, this.col, this.row);
			//}
				console.log(i, item);
			});
		}

	} else {
		console.log("Session");
	}			 

	/*gridster = $(".gridster ul").gridster({
          	widget_base_dimensions: [100, 55],
          	widget_margins: [5, 5]
        }).data('gridster');*/


      //$('.js-seralize').on('click', function() {
      //});

});