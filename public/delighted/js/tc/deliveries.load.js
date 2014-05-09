   $(document).ready(function () {
        	/*$.Order.getAll("{{URL::to('deliveries')}}");*/
		/*$.Driver.getDrivers("{{URL::to('drivers')}}");*/
		//$.Order.init("{{URL::to('deliveries')}}");


		/*$("#bot-add-2_2_1_1_b, #bot-add-2_2_1_1_t").gpopover({
			preventHide:true
		});*/
				
		$Driver.init("{{URL::to('drivers')}}");
		$Method.init("{{URL::to('methods')}}");
		$Truck.init("{{URL::to('trucks')}}");
				
			var panels = {};
		/*$.jStorage.set("panel_2_1_1_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_b",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_1_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_1_b",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_2_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_2_b",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_2_1_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_1_2_1_b",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_2_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_1_2_b",  {size: "50%", collapsible: false});

			$.jStorage.set("panel_2_2_1_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_2_1_b",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_2_1_1_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_2_1_1_b",  {size: "50%", collapsible: false}); 
			$.jStorage.set("panel_2_2_1_2_t",  {size: "50%", collapsible: false}); 
			$.jStorage.set("panel_2_2_1_2_b",  {size: "50%", collapsible: false}); 
			$.jStorage.set("panel_2_2_2_t",  {size: "50%", collapsible: false});
			$.jStorage.set("panel_2_2_2_b",  {size: "50%", collapsible: false})
		*/
			
			//$.jStorage.deleteKey('panels');
			Storage.prototype.setObject = function(key, value) {
			    //this.setItem(key, JSON.stringify(value));
			    $.jStorage.set(key, panels[key] );
			}

			Storage.prototype.getObject = function(key) {
			    return JSON.parse(this.getItem(key));

			}
			for(var key in panels){
				Storage.prototype.setObject(key, panels[key]);
			}



	            $('#mainsplit').jqxSplitter({ theme: 'highblue', width: '100%', height: 800, orientation: 'horizontal', panels: [{ size: 115, collapsible: false }] });
	            $('#split_1').jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}, { size: '50%', collapsible: false}] });
	            $('#split_2').jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%'},{ size: '50%', collapsible: false}] });
	            $('#split_1_1').jqxSplitter({ theme: 'highblue' , width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}, { size: '50%', collapsible: false}] });
	            $('#split_1_2').jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}, { size: '50%', collapsible: false}] });

	            $('#split_2_1').jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '66.6666%', collapsible: false}, { size: '66.6666%', collapsible: false}] });
	            $('#split_2_2').jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '66.6666%', collapsible: false}, { size: '66.6666%', collapsible: false}] });	            	

	            $('#split_2_1_1')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}, { size: '50%', collapsible: false}] })
	            	/*.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_1_1_t", pan[0]);
		            	$.jStorage.set("panel_2_1_1_b", pan[1]);
		            });*/
	            $('#split_2_1_1_1')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_1_1_1_t"), $.jStorage.get("panel_2_1_1_1_b")] })
	            	.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_1_1_1t", pan[0]);
		            	$.jStorage.set("panel_2_1_1_1_b", pan[1]);
		            });
	            $('#split_2_1_1_2')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_1_1_2_t"), $.jStorage.get("panel_2_1_1_2_b")] })
	            	.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_1_1_2_t", pan[0]);
		            	$.jStorage.set("panel_2_1_1_2_b", pan[1]);
		            });
	            $('#split_2_1_1_2_1')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_1_1_2_1_t"), $.jStorage.get("panel_2_1_1_2_1_b")] })
	            	.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_1_1_2_1_t", pan[0]);
		            	$.jStorage.set("panel_2_1_1_2_1_b", pan[1]);
		            });
	            $('#split_2_1_2')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_1_2_t"), $.jStorage.get("panel_2_1_2_b")] })
	            	.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_1_2_t", pan[0]);
		            	$.jStorage.set("panel_2_1_2_b", pan[1]);
		            });

	            $('#split_2_2_1')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}, { size: '50%', collapsible: false}] })
	            	/*.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_2_1_t", pan[0]);
		            	$.jStorage.set("panel_2_2_1_b", pan[1]);
		            });*/
	            $('#split_2_2_1_1')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_2_1_1_t"), $.jStorage.get("panel_2_2_1_1_b")] })
	            	.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_2_1_1_t", pan[0]);
		            	$.jStorage.set("panel_2_2_1_1_b", pan[1]);
		            });

	            $('#split_2_2_1_2')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_2_1_2_t"), $.jStorage.get("panel_2_2_1_2_b")] })
	            	.on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_2_1_2_t", pan[0]);
		            	$.jStorage.set("panel_2_2_1_2_b", pan[1]);
		            });
	            $('#split_2_2_2')
	            	.jqxSplitter({ theme: 'highblue', width: '100%', height: '100%',  orientation: 'horizontal', panels: [$.jStorage.get("panel_2_2_2_t"), $.jStorage.get("panel_2_2_2_b")] })
		            .on("resize", function(event){
		            	var pan = event.args.panels;
		            	console.log(pan);
		            	$.jStorage.set("panel_2_2_2_t", pan[0]);
		            	$.jStorage.set("panel_2_2_2_b", pan[1]);
		            });


	            $("button.bot").click(function(){
	            	var panl = [{size: "50%"}];
	            	panl[0].collapsible = true;
	            	panl[0].collapsible = false;
	            	var id  = $(this).attr("id").split("-")[1];
	            	$('#split_' + id).jqxSplitter({panels: panl});
	            	$('#split_' + id).jqxSplitter("collapse");
	            });
	            $("button.top").click(function(){
	            	var panl = [{size: "50%"}];
	            	panl[0].collapsible = false;
	            	panl[0].collapsible = true;
	            	var id  = $(this).attr("id").split("-")[1];
	            	$('#split_' + id).jqxSplitter({panels: panl});
	            	$('#split_' + id).jqxSplitter("collapse");
	            });
	            var dropId = "";
	            var dropName = "";
	            $("button.add").on("click", function(){
	            	dropId = $(this).attr("id").split("-")[2];
	            	dropName = $("input-" + dropId).val();
	            	console.log("split_" + dropId);
	            	//$("#addOrderModal").attr("data-method", id);//
	            	//$("#ordersSelect").on("change", function(){
	            	//});
	            	$("#saveOrderBtn").click(function(){
	            		
	            		//$("#drop-" + dropId).append($("#ordersSelect").val());
	            		//$("#addOrderModal").modal("hide");
	            		Order.dropFromSelect($("#ordersSelect").val(), dropId);
	            		$("#addOrderModal").modal("hide");
	            		dropId = "";
	            		dropName = "";
	            	});

	            	$("#addOrderModal").modal("show");
	            });
	           $(".sort-drop").on("dblclick", function(){
	            	dropId = $(this).attr("id").split("-")[1];
	            	dropName = $("input-" + dropId).val();
	            	console.log("split_" + dropId);	        
	            	$("#saveOrderBtn").click(function(){	            		            	
	            		$Order.dropFromSelect($("#ordersSelect").val(), dropId);
	            		$("#addOrderModal").modal("hide");
	            		dropId = "";
	            		dropName = "";
	            	});

	            	$("#addOrderModal").modal("show");
	            });
			$("#newOrder").on("click", function(){
				$("#addOrderModal").modal("hide");
				$("#newOrderModal").modal("show");
				$(".newOrderMethod").bsFormButtonset('attach', {buttonClasses: "btn-warning", isOptional: true});
			});
			var i=1
			$("#add_row").click(function(){
      			$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Quantity' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Size'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Description'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='SKU'  class='form-control input-md'></td>");

      			$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      			i++; 
  			});
		     $("#delete_row").click(function(){
		    	 if(i>1){
				 $("#addr"+(i-1)).html('');
				 i--;
				 }
			 });
	           
	            /*var x = localStorage.splitCenter;
	            var y = localStorage
	            console.log()
	            console.log();*/

	            //alert(split.SS.panels);
	            $Order.init("{{URL::to('deliveries')}}");
	           /* $("#method-2_2_1_1_b").dropPanel({
				id: "2_2_1_1_b",
				title: "Dallas",			
			});*/

	           /* $('#nested2_split').jqxSplitter({width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '60%', collapsible:false}, { size: '50%', collapsible:false}], splitBarSize: 10 });	            
	            $('#nested2_methods').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '30%', collapsible: false}], splitBarSize: 10 });
	            $('#nested2_split2').jqxSplitter({ width: '100%', height: '100%',  orientation: 'vertical', panels: [{ size: '50%', collapsible: false}], splitBarSize: 10 });*/
	            
	         


		

        });