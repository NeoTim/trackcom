;(function($){
	function upCheck(num){
		
		//var num = new Number(number);
		if(num === 100){
			return {status: 100, color: "success", label: "Complete"};	

		} else if(num === 75){
			return {status: 100, color: "success", label: "Complete"};	

		} else if(num === 50){			
			return {status: 75, color: "info", label: "Filling"};

		} else if(num === 25){
			return {status: 50, color: "primary", label: "Lab"};

		} else if(num === 10){
			return {status: 25, color: "warning", label: "Production"};			
		}
		
	} 
	function downCheck(num){			
		result = {};
		if(num === 100){
			return result = {status: 75, color: "info", label: "Filling"};
		} else if(num === 75){
			return result = {status: 50, color: "primary", label: "Lab"};
		} else if(num === 50){
			return result = {status: 25, color: "warning", label: "Production"};
		} else if(num === 25){
			return result =  {status: 10, color: "danger", label: "Hold"};
		} else if(num === 10){
			return result = {status: 10, color: "danger", label: "Hold"};
		}
		
		
	}
	function setPriority(priority, w){
	}
	function setOrder(order, w){
		var c = $(w._container1);
		var s = $(w._container7)
		//c.html("");
		//console.log(orderId);
		
		
		c.text(order);
		
		s.children().remove();
		s.append($('<div id="statusBar_'+w.options.id+'"></div>').addClass('progress active dropStatus').wrap('<div class="col-md-12"></div>'));
		var progress = $('<div class="progress-bar" role="progressbar" aria-waluemin="10" aria-valuemax="100"></div>').attr('aria-valuenow', w.options.status.status).addClass('progress-bar-' + w.options.status.color).css({"width": w.options.status.status + "%"})
			.html(status.label + " &nbsp; &nbsp; " + w.options.status.status + "%").appendTo(s.find(".progress"));


	}
	function setSku(sku, w){
		//console.log("SKU set");
		//var id = w.options.id
		var c = $(w._container2);
		c.html("");				
		
		c.html(sku);
	}
	function setReadyDate(d, w){
		var c = $(w._container3);
		c.html("");
		c.html(d);
	}
	function setBatch(batch, w){
		var c = $(w._container4);
		//console.log('Batch Set', batch)
		c.html("");
		c.html(batch);
		


	}
	function configureContainers(containers, w){configureContainers
		var id = w.options.id
		var c = $(w._container5);
		var q = $(w._container6);
		//c.children().remove();
		//q.children().remove();
		//console.log('Containers Set', containers)
		_.each(containers, function (item, index){
			if(item.size){
				ind = index+1;
				//console.log(item.size);
				//$("#entry_containers_input_" + id).find("tr").eq(index).show().find("input").first().val(item.size).parent().parent().find("input").last().val(item.qty);
				c.find("p").eq(ind).html(item.size).addClass('container' + item.id);
				q.html(item.qty).addClass('qty' + item.id);
				//var temp = tableTemp.clone().attr("id", "input_container_"+ ind +"_" + id);
				//temp.find("input").first().val(item.size);
				///temp.find("input").last().val(item.qty);
				//t.append(temp);
			/*	var td1 = $("<td></td>").append($("<input>").attr({"class": "form-control input_size_" + index + "_" + id, "type": "text", "placeholder":"size"}));
				var td2 = $("<td></td>").append($("<input>").attr({"class": "form-control input_qty_" + index + "_" + id, "type": "text", "placeholder":"quantity"}));
				var tr = $("<tr></tr>").append(td1).append(td2);
				t.append(tr);*/
			} else {
				//$("#entry_containers_input_" + id).find("tr").eq(index).hide();
				
			}
		});
	}
	function setContainers(containers, w){
		var id = w.options.id
		var c = $(w._container5);
		var q = $(w._container6);
		c.children().remove();
		q.children().remove();
		var t = $("#entry_containers_input_" + id);
		var input;
		var batch;
		var date;
		var group;
		var conts = [];
		var ind;
		var tableTemp = $('<tr class="input_container"><td> <input type="text" class="size form-control no-border" placeholder="Size"> </td><td> <input type="text" class="qty form-control no-border" placeholder="Quantity"> </td></tr>');

		//console.log('Containers Set', containers)
		_.each(containers, function (item, index){
			if(item.size){
				ind = index+1;
				//console.log(item.size);
				//$("#entry_containers_input_" + id).find("tr").eq(index).show().find("input").first().val(item.size).parent().parent().find("input").last().val(item.qty);
				c.append($('<p></p>').addClass('container' + item.id).append(item.size));
				q.append($('<p></p>').addClass('qty' + item.id).append(item.qty));
				var temp = tableTemp.clone().attr("id", "input_container_"+ ind +"_" + id);
				temp.find("input").first().val(item.size);
				temp.find("input").last().val(item.qty);
				t.append(temp);
			/*	var td1 = $("<td></td>").append($("<input>").attr({"class": "form-control input_size_" + index + "_" + id, "type": "text", "placeholder":"size"}));
				var td2 = $("<td></td>").append($("<input>").attr({"class": "form-control input_qty_" + index + "_" + id, "type": "text", "placeholder":"quantity"}));
				var tr = $("<tr></tr>").append(td1).append(td2);
				t.append(tr);*/
			} else {
				$("#entry_containers_input_" + id).find("tr").eq(index).hide();
				
			}
		});

		$("#entry_sku_input_" + id).on("change", function(){input = $(this).val();});
		$("#entry_batch_input_" + id).on("change", function(){input = $(this).val();});

		$("#add_container_"+id).click(function(){
			var index = ind+1;
			var temp = tableTemp.clone().attr("id", "input_container_" + index + "_" + id).appendTo(t);
		});
		$("#delete_container_"+id).click(function(){			
			t.find("tr").last().remove();
		});



	}
	function setStatus(status, w){
		var c = $(w._container7);
		var b = $(w._container8);
		var ss = status.status;
		var upBtn = $("#status_up_" + w.options.id);
		var downBtn = $("#status_down_" + w.options.id);
		//b.find("button.down, button.up").attr("data-status", status.status);



		upBtn.removeData('status');
		downBtn.removeData('status');
		upBtn.attr("data-status", status.status);
		downBtn.attr("data-status", status.status);
		c.find(".progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-primary progress-bar-info progress-bar-success ").addClass("progress-bar-" + status.color).css({"width": status.status + "%"})
			.html(status.label + " &nbsp; &nbsp; " + w.options.status.status + "%").appendTo(c.find(".progress"));


		
	}
	function setSettings(status, w){
		//console.log('settings');
		var id = w.options.id;
		var self = w;
		var c = $(w._container8);
		var s = $(w._container0);
		c.children().remove();
		
		var popTemplate =['<div id="entry_popover_'+id+'" class="gpopover">',
							'<div class="row">',
								'<div class="col-md-8">',
									'<div class="row">',									
										'<div class="col-md-6">',
											'<div class="form-group">',
												'<input class="form-control" type="text" id="entry_sku_input_'+id+'" placeholder="SKU" value="'+w.options.sku+'" />',
											'</div>',
										'</div>',
										'<div class="col-md-6">',
											'<div class="form-group">',
												'<input class="form-control" type="text" id="entry_batch_input_'+id+'" placeholder="Batch" value="'+w.options.batch+'" />',
											'</div>',
										'</div>',
									'</div>',									
									'<div class="form-group">',
										'<textarea class="form-control" id="entry_input_decr_' + id + '" style=" height:100px;"></textarea>',
									'</div>',
									'<table class="table table-bordered table-condensed text-center"><thead><tr>',
										'<th>Size</th><th>Qunatity',
											
										'</th>',
									'</tr></thead><tbody id="entry_containers_input_'+ id +'">',
										/*'<tr><td> <input type="text" class="form-control no-border" id="input_container_size_1_' + id + '" </td>',
											'<td> <input type="text" class="form-control no-border" id="input_container_qty_1_' + id + '" </td></tr>',
										'<tr><td> <input type="text" class="form-control no-border" id="input_container_size_2_' + id + '" </td>',
											'<td> <input type="text" class="form-control no-border" id="input_container_qty_2_' + id + '" </td></tr>',
										'<tr><td> <input type="text" class="form-control no-border" id="input_container_size_3_' + id + '" </td>',
											'<td> <input type="text" class="form-control no-border" id="input_container_qty_3_' + id + '" </td></tr>',*/
									'</tbody></table>',
									'<div class="row">',
										'<div class="col-md-12">',
											'<div class="form-group" style="margin-bottom:0;">',
												'<button class="btn btn-danger btn-sm" id="delete_container_' + id + '"><i class="fa fa-minus"></i></button>',
												'<button class="btn btn-primary btn-sm pull-right" id="add_container_' + id + '"><i class="fa fa-plus"></i></button>',
											'</div>',
										'</div>',
									'</div>',
								'</div>',
								'<div class="col-md-4">',
									'<div class="form-group">',
										'<div id="jqxWidget_cal_'+id+'"></div>',
									'</div>',
									'<div class="form-group">',
										'<input type="checkbox" id="entry_group_switch_'+id+'" name="mycheck" />',
										'<button class="btn btn-primary btn-sm pull-right" id="submit_entry_'+id+'">Done</button>',
									'</div>',
								'</div>',
							'</div>',								
							'</div>'].join('');
		var popover = $(popTemplate);
		
		var Dicon = $('<i></i>').addClass("fa fa-chevron-left");
		var Uicon = $('<i></i>').addClass("fa fa-chevron-right");
		var Sicon = $('<i></i>').addClass("fa fa-cogs");
		
		var upBtn = $('<button id="status_up_'+id+'"></button>').addClass("btn btn-primary btn-sm up").html(Uicon);
		var downBtn = $('<button id="status_down_'+id+'"></button>').addClass("btn btn-danger btn-sm down").html(Dicon);
		var entryPop = $('<button id="entry_pop_'+id+'" data-popover="entry_popover_'+id+'"></button>').addClass('btn btn-white btn-sm').html(Sicon);
		c.append($('<div id="buttons_'+id+'"></div>').addClass('btn-group dropBtns').append(downBtn).append(upBtn));
		c.append(entryPop);
		c.append(popover);
		$("#jqxWidget_cal_" + id).jqxCalendar({theme:"highblue", rowHeaderWidth: 25, showWeekNumbers: true, width: "100%", height: 220})
				.on("change", function(){
					var value = $(this).val().toLocaleDateString();
					//console.log(value);
				    w._setOption("date", value);
				});
		$("#entry_pop_"+ id).gpopover({
			preventHide: true,
			width: 800
		});
		$("#submit_entry_" + id).on("click", function(){
			var s = $("#entry_popover_" + id);
			var con = $("#entry_containers_input_" + id);
			var data = {};
			containers = [];
			data.sku = s.find("input").first().val();
			data.batch = s.find("input").eq(1).val();
			data.desc1 = s.find("textarea").val();
			data.ready_date = w.options.date;

			_.each(con.find("tr"), function(el){
				containers.push({size: $(el).find("input").first().val(), qty: $(el).find("input").last().val() });
			});
			data.containers = JSON.stringify(containers);
			$("#entry_pop_"+ id).gpopover("hide");
			//console.log(data);
			$Product.update(data, id);


		});

	}
	$.widget("nt.prodFilter", {
		options: {
			id: null,
			ptype: null,
			groupBy: null,
			priority: 1,
			order: null,
			sku: null,
			date: null,
			batch: null,
			containers:[],		
			status : {},
			settings: true,
		},

		_create: function(){
			var op = this.options
			var id = this.options.id;
			//this._item = {id: op.id, groupBy: op.groupBy, sku: op.sku, date: op.date, batch: op.batch, containers: op.containers};
			this.element.addClass('table_tr_' + id, + " sortable")
				.appendTo('#tbody_' + this.options.ptype);
				//console.log(this.options.ptype);
			this._status = this.options.status;
			this._container0 = $("<td></td>").addClass('optionSelect');
			this._container1 = $("<td></td>").addClass('entryOrder');
			this._container2 = $("<td></td>").addClass('entrySku ' + this.options.sku);
			this._container3 = $("<td></td>").addClass('entryDate');
			this._container4 = $("<td></td>").addClass('entryBatch');
			this._container5 = $("<td></td>").addClass('entryContainers');
			this._container6 = $("<td></td>").addClass('entryQtys');
			this._container7 = $("<td></td>").addClass('entryStatus');
			this._container8 = $("<td></td>").addClass('entrySettings');
			this.element
				.append(this._container0)
				.append(this._container1)
				.append(this._container2)
				.append(this._container3)
				.append(this._container4)
				.append(this._container5)
				.append(this._container6)
				.append(this._container7)
				.append(this._container8);				

			this._setOptions({
				'priority' : this.options.priority,
				'order': this.options.order,
				'sku': this.options.sku,
				'date': this.options.date,
				'settings': this.options.status,
				'batch': this.options.batch,
				'containers': this.options.containers,
				'status': this.options.status,
			});

			var upBtn = $("#status_up_" + id);
			var downBtn = $("#status_down_" + id);

			upBtn.on("click", function(){			
				var stat = upCheck($(this).data('status'));
				$Product.update(stat, id);
				
				//w._setOption("status", stat)
				//$Product.update(stat, w.options.id);
			});
			downBtn.on("click", function(){			

				var stat = downCheck($(this).data('status'));
				
				$Product.update(stat, id);
				//w._setOption("status", stat)								
				//$(this).attr('data-status', newstatus.status);
			});
			var checked = true;
			/*if(self.options.status === "true"){
				checked = true;
			} else if(self.options.status === "false"){
				checked = false;
			}*/
			
			$('#entry_group_switch_' + id).bootstrapSwitch({
				state: true,
				onColor: "warning",
				offColor: "success",
				onText: "Out",
				offText: "Ready",			
			}).on('switchChange.bootstrapSwitch', function(event, state) {
			  		  
			  //console.log(state); // true | false
			  //$Driver.update({status: state}, self.options.id);
			});
			
			if(this.options.groupBy){
				$("#groupBody_"+this.options.ptype).append(this.element);
			}			
		},
		_setOption: function(key, value){
			var self = this,
			prev = this.options[key],
			fnMap = {
				'priority' : function(){
					setPriority(value, self);
				},
				'order' : function(){
					setOrder(value, self);
				},
				'sku' : function(){
					setSku(value, self);
					
				},
				'batch' : function(){
					setBatch(value, self);
					
				},
				'date' : function(){
					setReadyDate(value, self);
				},
				'settings': function(){
					if(value){
						setSettings(value, self);
						//configureContainers(self.options.containers, self);
					}
				},
				'containers' : function(){
					setContainers(value, self);

				},
				'status' : function(){
					self._status = value;
					setStatus(value, self);
				},
				
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
			this.element.removeClass('').empty();
			this.element.remove();
		},

	});

})(jQuery);