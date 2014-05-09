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
	var template = $('<p>' + method + '</p>');
	
	$.each($("#drop-" + widget.options.m_id + " .order-drop"), function(i, item){
		var orderId = $(this).attr("id").split("-")[1];
		$Order.update({driver_id: widget.options.id, bgColor: widget.options.bgColor}, orderId);

	});
	widget._container.find(".body").append(template);
}

function createName(name, widget){
	var id = widget.options.id;
	widget._container.find('.head input').val(name);
	//var nameTemplate = $('<div class="name"></div>');	
	//widget._container.find('.title').append(nameTemplate);

	//var inputName = $();
/*		.on("keyup", function(){
			widget._setOption('name', $(this).val());
		});*/
	//widget._container.find('.head').prepend(inputName);


}
function createTruck(truck, widget){
	widget._container.find('.head').children().remove();
	/*id="dropTruck_'+widget.options.id+'*/
	var id = widget.options.id;
	var template = ['<div class="head input-group">',					
					'<input type="text" id="name_'+id+'" value="'+widget.options.name+'" class="form-control">',
					'<span class="input-group-btn">',
						'<button id="popTruckTrigger_'+id+'" type="button" class="btn  btn-white pull-right btn-xs" data-popover="truckPopover_'+id+'">' +truck + ' <i class="fa fa-truck"></i></button>',
					'</span>',
					'</div>'].join('');
	var titleTemp = $(template);
	var popTemplate = ['<div id="truckPopover_'+id+'" class="gpopover">',						
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
	var popover = $(popTemplate);

	widget._container.find(".head").append(titleTemp);

	widget._container.append(popover);

	$('#popTruckTrigger_'+id).gpopover({
		preventHide: true,
		width: '80px'
	});
	$("#truckSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-block", isOptional: true, isVertical: true})
		.on("change", function(){
			//var inputId = $(this).find(".active").attr("data-input-id");
			//console.log($(this).find("#" + inputId).val());
			widget._setOption('truck', $(this).val());
			console.log($(this).val());
		});
	/*$("#truckSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-xs", isOptional: true, isJustified: true});*/
	//$("#truckSelect_" + id).selectpicker();
	$("#truckSelect_" + id).find(".btn_input-" + truck).addClass("active");
}


function createStatus(status, widget){
	widget._container.find(".status").remove();
	var bg = statusColors(status);
	var color = "text-dark";
	if(bg){ color = "text-white";}
	var template = $('<div></div>').addClass("status " +color).text(status);
	widget._container.find(".foot").removeClass("bg-success bg-primary bg-warning bg-default").addClass(bg).append(template);
}
function createPopover(id, widget){
	widget._container.find("popover_"+id).remove();
	var popTemplate = ['<div id="popover_'+id+'" class="gpopover">',
						'<div class="form-group">',
							'<input id="inputName_'+id+'" type="text" value="'+widget.options.name+'" class="form-control" placeholder="Driver\'s name">',
						'</div>',
						'<div class="form-group">',							
							'<select id="methodSelect_'+id+'" class="form-control methodControl" data-style="btn-success" data-width="50%">',
							/*	'<option value="unnassigned">Location</option>',
								'<option value="north" >North</option>',
								'<option value="south">South</option>',
								'<option value="east">East</option>',
								'<option value="west">West</option>',
								'<option value="tulsa">Tulsa</option>',
								'<option vlaue="dallas">Dallas</option>',
								'<option value="stillwater">Stillwater</option>',
								'<option value="shawnee">Shawnee</option>',*/
							'</select>',
						'</div>',
						'<div class="form-group">',				
							'<div id="statusSelect_' + id + '">',
								'<input type="radio" id="Available" name="options" value="Available"><label for="Available"> Available</label>',
								'<input type="radio" id="Delivering" name="options" value="Delivering"><label for="Delivering"> Delivering</label>',
								'<input type="radio" id="Loading" name="options" value="Loading"> <label for="Loading"> Loading</label>',
							'</div>',
						'</div>',
						'<div class="form-group">',
							'<button class="btn btn-primary" id="done" data-popover="popover_'+id+'">Done</button>',
						'</div>',

					'</div>'].join('');
	var popover = $(popTemplate);
	var btn = $('<button id="popStatTrigger_'+id+'" type="button" data-popover="popover_'+id+'" class="btn btn-default pull-right btn-xs"><i class="fa fa-chevron-down" ></i></button>');
			/*.on("click", function(){
				$("#popover_" + id).gpopover("show");
			});*/
 
	widget._container.find(".body").prepend(btn);
	widget._container.append(popover);
	$('#popStatTrigger_'+id).gpopover({
		preventHide: true,
		viewportSideMargin: 10
	});
	$("#statusSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-xs", isOptional: true, isJustified: true})
		.on("change", function(){			
			console.log($(this).val());
		});
	$("#statusSelect_" + id).val(widget.options.status).find(".btn_input-" + widget.options.status).addClass("active");
	popover.find("#done").on("click", function(){
		var name = $("#inputName_" +id).val();
		var status = $("#statusSelect_" + id).val();
		var m_id = $("#methodSelect_" + id).val().split("-")[2];
		var method = $("#methodSelect_" + id).val().split("-")[1];
		var method_id = $("#methodSelect_" + id).val().split("-")[0];
		widget._setOption('name', name);		
		widget._setOption('status', status);
		widget._setOption('method', method);
		$(this).gpopover("hide");
		var data = {name: name, status: status, method: method, method_id : method_id, m_id:m_id};
		$Driver.update(data, widget.options.id);
	});


	//$("#statusSelect_" + id).bsFormButtonset('attach', {buttonClasses: "btn-default btn-xs", isOptional: true, isJustified: true});
	//$("#truckSelect_" + id).selectpicker();
	
	console.log(widget.options.status);
}
$.widget("nt.driverblock",  {
	options: {
		id: null,
		name: "",
		truck: 0,
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
		this.element.addClass('driver-block');
		this._container = $('<table></table>').addClass("driver-container table")
			.appendTo(this.element);
		this._headContainer = $('<td></td>').appendTo(this._container).addClass("head ").wrap('<tr></tr>');
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

		/*this.element.on('driverblock:setoption', function (event, data){
			if(data.option === 'truck'){
				createTruck(data.current)
			}
		});*/

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