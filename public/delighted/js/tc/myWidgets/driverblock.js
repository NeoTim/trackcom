
//widget._container.append(popover);

	/*$('#popTruckTrigger_'+id).gpopover({
		preventHide: true,
		width: '80px'
	});*/
	/*$("#truckSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-block", isOptional: true, isVertical: true})
		.on("change", function(){
			//var inputId = $(this).find(".active").attr("data-input-id");
			//console.log($(this).find("#" + inputId).val());
			widget._setOption('truck', $(this).val());
			console.log($(this).val());
		});*/
	/*$("#truckSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-xs", isOptional: true, isJustified: true});*/
	//$("#truckSelect_" + id).selectpicker();
	//$("#truckSelect_" + id).find(".btn_input-" + truck).addClass("active");



/*var popTemplate = ['<div id="truckPopover_'+id+'" class="gpopover">',						
						'<div id="truckSelect_' + id + '">',
							'<input type="radio" id="truck_12" name="options" value="12"><label for="truck_12">12 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_13" name="options" value="13"><label for="truck_13">13 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_14" name="options" value="14"><label for="truck_14">14 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_21" name="options" value="21"><label for="truck_21">21 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_22" name="options" value="22"><label for="truck_22">22 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_33" name="options" value="33"><label for="truck_33">33 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_88" name="options" value="88"><label for="truck_88">88 <i class="fa fa-truck"></i></label>',							
							'<input type="radio" id="truck_007" name="options" value="007"><label for="truck_007">007 <i class="fa fa-truck"></i></label>',
						'</div>',				
					'</div>'].join('');
	var popover = $(popTemplate);*/




/*
$.widget("grouper", {

	options: {	
		id: "",
		name: "",
		status: "",
		method: "",
		truck: ""
	},
	_create: function(){					
		
	},
	_constrain: function(status){
		var stColor = "";
		if(status === "delivering"){
			stColor = "bg-success";
		} else if(status === "loading"){
			stColor = "bg-warning";			
		} else if(status === "Available") {
			stColor = "bg-primary";			
		} else if(status === "absent"){
			stColor = "bg-danger";			
		}
		return stColor;
	},
	refresh: function(){
		var color = this._constrain(this.options.status);
		this.element.find(".title").text(this.options.name);
		this.element.find(".truck").html(this.options.truck + ' <i class="fa fa-truck"></i>');
		this.element.find(".status").text(this.options.status).addClass(color);
	}

});
*/

$(document).ready(function(){



function statusColors(status){
	var stColor = false;
	if(status === "Delivering"){
		stColor = "bg-success";
		
	} else if(status === "Loading"){
		stColor = "bg-warning";			
		
	} else if(status === "Available") {
		stColor = "bg-primary";			
	
	} else if(status === "absent"){
		stColor = "bg-danger";	
		
	} else {
		stColor = "bg-default";	
		
	}
	return stColor;
}
function createMethod(method, widget){
	widget._container.find(".body p").remove();
	var template = $('<p style="font-weight:bold; margin-top:10px;">' + method + '</p>');
	
	$.each($("#drop-" + widget.options.m_id + " .order-drop"), function(i, item){
		var orderId = $(this).attr("id").split("-")[1];
		$Order.update({driver_id: widget.options.id, bgColor: widget.options.bgColor}, orderId);

	});
	widget._container.find(".body").append(template);
}

function createName(name, widget){
	var id = widget.options.id;
	widget._container.find('.head input').remove();
	var input = $('<input type="text" id="name_'+id+'" value="'+widget.options.name+'" class="form-control no-border">');
	widget._container.find(".head .input-group").prepend(input);


}
function createTruck(truck, widget){		
	var id = widget.options.id;
	widget._container.find('#popTruckTrigger_' + id).remove();
	var btn = $('<button id="popTruckTrigger_'+id+'" type="button" class="btn btn-white pull-right btn-sm" data-popover="truckPopover_'+id+'">' +truck + ' <i class="fa fa-truck"></i></button>');

	widget._container.find(".body").prepend(btn);

}


function createStatus(status, widget){
	widget._container.find(".status").remove();
	var bg = statusColors(status);
	var color = "text-dark";
	if(bg){ color = "text-white";}
	//var template = $('<div></div>').addClass("status " +color).text(status);

	var switcher;
	if(widget.options.status === "true" || widget.options.status === true || widget.options.status >= 1){
		 switcher = $('<input id="status_switch-' +widget.options.id+ '" type="checkbox" checked="checked" name="my-checkbox">').addClass("pull-right");
	} else if(widget.options.status === "false" || widget.options.status === 0 || widget.options.status === false){
		switcher = $('<input id="status_switch-' +widget.options.id+ '" type="checkbox" name="my-checkbox">').addClass("pull-right");
	}
	//switcher.appendTo(widget._container.find(".foot"));
		
}
function createPopover(id, widget){
	widget._container.find("popover_"+id).remove();
	var content =  '<i class="fa fa-truck"></i>';
	var popTemplate = ['<div id="popover_'+id+'" class="gpopover">',
						'<div class="form-group">',
							'<input id="inputName_'+id+'" type="text" value="'+widget.options.name+'" class="form-control" placeholder="Driver\'s name">',
						'</div>',
						'<div class="clearfix">',
							'<div class="form-group">',
								'<label class="control-label">Method</label>',								
								'<select id="methodControl-'+id+'" class="s1 form-control methodControl methodControl_'+widget.options.id+' pull-right" data-container="body"  data-size="auto" data-style="btn-inverse" data-width="70%">'].join('');
									_.each($Method.list, function (item){
										popTemplate += '<option value="shawnee">'+item.title+'</option>';
									});
			popTemplate += ['</select>',
							'</div>',
						'</div>',
						'<div class="clearfix">',
							'<div class="form-group">',
								'<lable class="control-label "><i class="fa fa-truck"></i> Truck </label>',
								'<select id="truckControl-'+id+'" class=" form-control truckControl truckControl_'+widget.options.id+' pull-right" data-container="body"  data-size="auto" data-style="btn-inverse" data-width="50%">',								
									'<option value="1">14 <i class="fa fa-truck"></i></option>',
									'<option value="2" >15</option>',
									'<option value="3">16</option>',
									'<option value="4">21</option>',
									'<option value="5">22</option>',
									'<option value="6">23</option>',
									'<option vlaue="7">33</option>',
									'<option value="8">88</option>',
									'<option value="9">007</option>',
								'</select>',
								
							'</div>',
						'</div>',					
						'<hr>',
						'<div class="form-group">',
							'<button class="btn btn-primary pull-right done" id="done" data-popover="popover_'+id+'">Done</button>',
						'</div>',

					'</div>'].join('');
	var popover = $(popTemplate);
	var btn = $('<button id="popStatTrigger_'+id+'" type="button" data-popover="popover_'+id+'" class="btn btn-default pull-right btn-xs"><i class="fa fa-chevron-down" ></i></button>');
	widget._container.find(".head .input-group-btn").append(btn);
	widget._container.append(popover);
	$('#popStatTrigger_'+id).gpopover({
		preventHide: true,
		viewportSideMargin: 10,		
	});
	$("#statusSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-xs", isOptional: true, isJustified: true})
		.on("change", function(){			
			console.log($(this).val());
		});
	$("#statusSelect_" + id).val(widget.options.status).find(".btn_input-" + widget.options.status).addClass("active");
	$("#truckControl-" + id).val(widget.options.truck_id)
	$("#methodControl-" + id).val(widget.options.m_id + "-" + widget.options.method_id)
	popover.find(".done").on("click", function(){

		$Method.update({driver: null}, widget.options.method_id);
		$(this).gpopover("hide");
		var name = $("#inputName_" +id).val();
		var m_id = $("#methodControl-" + id).val().split("-")[0];
		var method_id = $("#methodControl-" + id).val().split("-")[1];
		var method = $("#methodControl-" + id + " option:selected").text();
		var truck_id = $("#truckControl-" + id).val();
		var truck = $("#truckControl-" + id + " option:selected").text();
		console.log(m_id);
		widget._setOption('name', name);
		widget._setOption('method', method);
		widget._setOption('truck', truck);
		var data = {truck: truck, truck_id: truck_id, name: name, method: method, m_id:m_id};

		$Driver.update(data, widget.options.id);
		$Method.update({driver: widget.options.id}, method_id);
	});
	
	widget._container.find(".truckControl").val(widget.options.truck_id);
	widget._container.find(".methodControl").val(widget.options.m_id);
	
	/*$(".truckControl_" +widget.options.id).selectpicker().on("change", function(){
			$(".truckControl_" +widget.options.id).find(".dropdown-menu").hide();
		
	});
	$(".truckControl_" +widget.options.id).selectpicker().on("click", function(){
		$(".truckControl_" +widget.options.id).find(".dropdown-menu").toggle();
	});	

	
	$(".methodControl_" + widget.options.id).selectpicker().on("change", function(){
		$(".methodControl_" + widget.options.id).find(".dropdown-menu").hide();
	});
	$(".methodControl_" + widget.options.id).selectpicker().on("click", function(){
		$(".methodControl_" + widget.options.id).find(".dropdown-menu").toggle();		
	});*/

	//$(".methodControl_" + widget.options.id).selectpicker('refresh');
	//$(".truckControl_" +widget.options.id).selectpicker('refresh');
		
}
$.widget("nt.driverblock",  {
	options: {
		id: null,
		name: "",
		truck: 0,
		truck_id: 0,
		bgColor: "bg-info",
		status: "Available",
		orders: {id: 0, number: "unnasigned"},		
		popover: false,
		method : 'unnasigned',
		method_id : null,
		m_id: null,
		//popoverBtn: false
	},

	_create: function(){
		var self = this;
		this.element.addClass('driver-block');
		this._container = $('<table></table>').addClass("driver-container table")
			.appendTo(this.element);
		this._headContainer = $('<td><div class="input-group"><div class="input-group-btn"></div></div></td>').appendTo(this._container).addClass("head ").wrap('<tr></tr>');
		this._bodyContainer = $('<td></td>').appendTo(this._container).addClass("body").wrap('<tr></tr>');
		this._footContainer = $('<td></td>').appendTo(this._container).addClass("foot").wrap('<tr></tr>');		
		
		
		
		this._setOptions({
			'name': this.options.name,
			'method' : this.options.method,
			'truck': this.options.truck,
			'status': this.options.status,
			'orders': this.options.orders,
			'popover' : this.options.id,
		});
		if(this._id){
			this._popover = true;
			this.setOption();
			//this.setOption({'popoverBtn' : this.options.id});
		}
		
		var checked;
		if(self.options.status === "true"){
			checked = true;
		} else if(self.options.status === "false"){
			checked = false;
		}
		$('#status_switch-' + this.options.id).bootstrapSwitch({
			state: checked,
			onColor: "warning",
			offColor: "success",
			onText: "Out",
			offText: "Ready",			
		}).on('switchChange.bootstrapSwitch', function(event, state) {
		  		  
		  console.log(state); // true | false
		  $Driver.update({status: state}, self.options.id);
		});		

	},
	_setOption: function(key, value){
		var self = this,
			prev = this.options[key],
			fnMap = {
				'name' : function(){
					//createTitle(value, self);
					createName(value, self);
				},
				'truck' : function(){
					createTruck(value, self);					
				},
				'orders': function(){
					//createOrders(value, self);
					//createOrder(value, self);
				},
				'status' : function(){
					createStatus(value, self);
				},
				'popover': function(){
					createPopover(value, self);
				},
				'method' : function(){
					createMethod(value, self);
				}
				
			};
		this._super(key, value);

		if(key in fnMap){
			fnMap[key]();
		}
		this._triggerOptionChanged(key, prev, value);
	},

	_triggerOptionChanged: function(optionKey, previouseValue, currentValue){
		this._trigger('setOption', {type: 'setOption'}, {
			option: optionKey,
			previous: previouseValue,
			current: currentValue
		});
	},

	_destroy: function(){
		this.element.removeClass('driver-block');
		this.element.empty();
	},

});

/*
$.widget("nt.driverblock2", $.nt.driverblock,  {
	options: {
		
		legend: true
	},

	widgetEventPrefix: $.nt.driverblock.prototype.widgetEventPrefix,

	_create: function(){
		var self = this;

		this._legend = $('<div class="legend"></div>')
			.appendTo(this.element);


		this.element.on('driverblock:setoption', function (event, data){
			if(data.option === 'truck'){
				createTruck(data.current);
				
			}
		});


		this._super();

		this._setOption('legend', this.options.legend);

	},

	_destroy: function(){
		this.element.find('.legend').empty();		
		this._super();
	},


	_setOption: function(key, value){
		var self = this,
			prev = this.options[key],
			fnMap = {
				'name' : function(){
					createName(value, self);				
				},
				'truck' : function(){
					createTruck(value, self);					
				},
				'status' : function(){
					createStatus(value, self);
				}
				
			};
		this._super(key, value);

		if(key in fnMap){
			fnMap[key]();
		}
		this._triggerOptionChanged(key, prev, value);
	},

	_triggerOptionChanged: function(optionKey, previouseValue, currentValue){
		this._trigger('setOption', {type: 'setOption'}, {
			option: optionKey,
			previous: previouseValue,
			current: currentValue
		});
	}	

});*/
});