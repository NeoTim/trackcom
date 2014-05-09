;(function($){
	
	function popoverTemp(id, widget){
		

		//return str;
	}

	function setTitle(title, widget){
		var id= widget.options.id;
		/*var str = [
			'<div  id="popoverMethod-'+id+'" class="gpopover">',
				'<div class="form-group">',
					'<input type="text" id="input-method-'+id+'" class="form-control" value="'+widget.options.title+'" placeholder="Title">',
				'</div>',
				'<div class="form-group">',
					'<select id="driverControl-'+id+'" class="s1 selectpicker driverControl driverControl_'+widget.options.id+' pull-right" data-container="body"  data-size="auto" data-style="btn-inverse" data-width="70%">'].join('');
					//'<select class="form-control" id="methodDriver-'+id+'">'].join('');
					_.each($Driver.list, function (item){

						str += '<option value="' +item.id+ '_'+item.bgColor+ '">' + item.name + '</option>';
						
					});
		str +=	[	'</select>',
				'</div>',
				'<div class="form-group">',
					'<button type="button" id="done-'+widget.options.id+'" class="done btn btn-primary">Done</button>',
				'</div>',
			'</div>',
			].join('');*/

		var popTemplate = ['<div id="methodPopover_'+id+'" class="gpopover">',
						'<div class="form-group">',
							'<input id="inputName_'+id+'" type="text" value="'+widget.options.title+'" class="form-control" placeholder="Driver\'s name">',
						'</div>',
						'<div class="clearfix">',
							'<div class="form-group">',
								'<label class="control-label">Method</label>',								
								'<select id="driverControl_'+id+'" class="s1 selectpicker driverControl driverControl_'+widget.options.id+' pull-right" data-container="body"  data-size="auto" data-style="btn-inverse" data-width="70%">'].join('');
									_.each($Method.list, function (item){
										popTemplate += '<option value="shawnee">'+item.title+'</option>';
									});
			popTemplate += ['</select>',
							'</div>',
						'</div>',
						/*'<div class="clearfix">',
							'<div class="form-group">',
								'<lable class="control-label "><i class="fa fa-truck"></i> Truck </label>',
								'<select id="truckControl-'+id+'" class="s1 selectpicker truckControl truckControl_'+widget.options.id+' pull-right" data-container="body"  data-size="auto" data-style="btn-inverse" data-width="50%">',								
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
						'</div>',		*/			
						'<hr>',
						'<div class="form-group">',
							'<button class="btn btn-primary pull-right done" id="done" data-popover="driverControl_'+id+'">Done</button>',
						'</div>',

					'</div>'].join('');
		//var inputGroup = $('<div class="input-group"><span class="input-group-btn"></span></div>');
		//var btn = $('<button id="popStatTrigger_'+id+'" type="button" data-popover="popover_'+id+'" class="btn btn-default pull-right btn-xs"><i class="fa fa-chevron-down" ></i></button>');		
		//widget._container.children().remove();		
		var popover = $(popTemplate);
		var PopBtn = $('<button id="popMethod_'+widget.options.id+'" class="btn btn-white btn-sm" data-popover="driverControl_'+widget.options.id+'"><i class="fa fa-chevron-down"></i></button>');
		widget._container.find(".head .input-group-btn").append(PopBtn);
		widget._container.append(popover);

		

		var input = $('<input class="form-control no-border east" type="text" id="input-'+widget.options.id+'" value="'+widget.options.title+'">');
		widget._container.find(".input-group").prepend(input);

		//var closeBtn = $('<button id="close-'+widget.options.id+'" class="'+widget.options.position+' btn btn-default btn-sm"><i class="fa fa-times"></i></button>');
				
		
		//widget.element.prepend(widget._container);



		$('#popMethod_'+widget.options.id).gpopover({
			preventHide:true,
			viewportSideMargin: 10,	
		});
			
		/*$('#selectDr-'+widget.options.id).bsFormButtonset('attach', {buttonClasses: "btn-warning btn-xs", isOptional: true, isJustified: true});*/
		//$("#selectDr-" + widget.options.id).val(widget.options.driver);

		popover.find("DataPopover_" + widget.options.id ).on('click', function(){
			$(".gpopover").gpopover("hide");
			/*var driver = $('#driverControl_'+widget.options.id).val().split("_")[0];
			var bgColor = $('#driverControl_'+widget.options.id).val().split("_")[1];
			console.log(driver);
			var title = $("#input-method-" +widget.options.id).val();
			widget._setOption("bgColor", bgColor);
			//widget._setOption("driver", driver);
			$Method.update({bgColor: bgColor}, widget.options.primaryId);*/
			//$("#popoverMethod-" + widget.options.id).gpopover("hide");
		});
		$(".driverControl").selectpicker('refresh');
	}

	$.widget("nt.dropPanel", {
		options: {
			primaryId: null,
			id: null,
			title: null,
			bgColor: "bg-default",			
			driver: null,
			status: null,
			position: "bot",

		},

		_create: function(){
			this.element.addClass('droppanel');
			this.element.addClass('driver-block');
			this._container = $("<div></div>").addClass("method-container")			
				.appendTo(this.element);
			this._headContainer = $('<td><div class="input-group"><div class="input-group-btn"></div></div></td>').appendTo(this._container).addClass("head ").wrap('<tr></tr>');
			this._bodyContainer = $('<td></td>').appendTo(this._container).addClass("body").wrap('<tr></tr>');
			//this._footContainer = $('<td></td>').appendTo(this._container).addClass("foot").wrap('<tr></tr>');		
			

			//this._method = this.options.title.toLowerCase();
			console.log(this.options);
			this._setOption({
				'title' : this.options.title,
				'driver': this.options.driver,
			});
			setTitle(this.options.title, this);
			
			
		},

		_setOption: function(key, value){
			var self = this,
			prev = this.options[key],
			fnMap = {
				'title' : function(){
					//createTitle(value, self);
					setTitle(value, self);
				},
				'driver' : function(){
					self._setDriver(value);
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
			this.element.removeClass('droppanel').empty();
			this.element.remove();
		},

	});

})(jQuery);