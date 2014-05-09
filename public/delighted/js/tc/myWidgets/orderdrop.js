;(function($){

	
// irving.josh@gmail.com;



	function setMethod(val, widget){

		widget.element.attr("data-method", val);
		widget.element.appendTo("#drop-" + val);
	}
	$.widget('nt.orderdrop', {
		options: {
			id: null,
			number: 0,
			customer: null,
			bgColor: 'bg-default',
			color: 'text-dark',
			method: null,
			driver: null,
			popover: null,
			products: {}

		},

		_create: function(){
			var that = this;
			this.element.addClass('external-order label '+this.options.bgColor+' ui-draggable order-drop').attr("id", "order_drop-" + this.options.id);
			
			this._container = $('<table></table>').addClass('order-drop-table').html('<tr></tr>')
				.appendTo(this.element);

			this._setContainer();
			
			//console.log(this.element);

			this._setOption({
				'number': this.options.number,
				'customer': this.options.customer,
				'method': this.options.method,
				'bgColor': this.options.bgColor,
				'popover': this.options.popover,
			});
			this.element.appendTo("#drop-" + this.options.method);


			//this.resetMethod;
			//$("#truckSelect_" + item.id).bsFormButtonset('attach', {buttonClasses: "btn-white btn-sm", isOptional: true, isJustified: true});
			$("#truckSelect_" + this.options.id).bsFormButtonset('attach', {buttonClasses: "btn-block btn-default", isOptional: true, isJustified: true}).on("change", function(){
				$Order.update({bgColor: $(this).val()}, that.options.id);
			});
			$("#order_pop_" + this.options.id).gpopover({
				preventHide :true,
				width:800,
			});

		},

		_setContainer: function(){
			var popTemp = ['<div id="order_popover_'+this.options.id+'" class="gpopover">',
				'<div id="truckSelect_' + this.options.id + '">',
					'<input type="radio" data-class="btn-primary" id="bg-primary" name="options" value="bg-primary"><label for="bg-primary"></label>',
					'<input type="radio" data-class="btn-danger" id="bg-danger" name="options" value="bg-danger"><label for="bg-danger"> </label>',
					'<input type="radio" data-class="btn-success" id="bg-success" name="options" value="bg-success"><label for="bg-success"> </label>',
					'<input type="radio" data-class="btn-warning" id="bg-warning" name="options" value="bg-warning"><label for="bg-warning"></label>',
					'<input type="radio" data-class="btn-info" id="bg-info" name="options" value="bg-info"><label for="bg-info"></label>',
					'<input type="radio" data-class="btn-default" id="bg-default" name="options" value="bg-default"><label for="bg-default"> </label>',
				'</div>',
				'</div>'].join('');
			var popover = $(popTemp);
			var formWrap = $('<div></div>');
			var icon1 = $('<i class="fa fa-check"></i>');
			var icon2 = $('<i class="fa fa-circle-o"></i>');
			var icon3 = $('<i class="fa fa-chevron-down"></i>');
			var check = $('<td></td>').addClass('check').append(icon2);
			var number = $('<td></td>').addClass('number').append(this.options.number);
			var popBtn = $('<button id="order_pop_'+this.options.id+'" data-popover="order_popover_'+this.options.id+'"><i class="fa fa-chevron-down"></i></button>').addClass('btn btn-xs btn-clear ');
			var pop = $('<td></td>').addClass('pop').append(popBtn);
			this._container.find('tr').append(check).append(number).append(pop);
			this._container.find(".pop").append(popover);
			var formNumber = $('<input type="text">').addClass("form-control").css("border", "1px solid #ddd").val(this.options.number).wrap(formWrap).appendTo(this._container.find(".gpopover"));
			
			/*$("#order_pop_" + this.options.id).on("click", function(){
				console.log("hello");
				$("#order_popover_" + this.options.id).gpopover("show");
			});*/
			
		},	

		_setOption: function(key, value){
			var self = this,
			prev = this.options[key],
			fnMap = {
				'number' : function(){
					//createTitle(value, self);
					this._setNumber(value);
				},
				'customer' : function(){
					this._setCustomer(value);
				},
				'method': function(){
					setMethod(value, self);
				},
				'driver': function(){
					self._setDriver(value);
				},
				'bgColor': function(){
					self.element.removeClass("bg-default bg-primary bg-danger bg-success bg-warning bg-info").addClass(value);
				},
				'popover' : function(){
					
				}
			};
			this._super(key, value);

			if(key in fnMap){
				fnMap[key]();
			}
			this._triggerOptionChanged(key, prev, value);
		},
		
		_setNumber: function(val){
			var self = this;
			this._container.find('.number').text(val);
		},
		_setCustomer: function(val){

		},
		_setDriver: function(val){

		},
		_setMethod: function(val){
			//console.log(val);
			this.element.attr("data-method", val);
			this.elements.appendTo("#drop-" + val);
			//$(document).find("#order_drop-" + this.options.id);
			//$(document).find("#drop-" + this.val).append(this.element);
		},

		
		_triggerOptionChanged: function(optionKey, previouseValue, currentValue){
			this._trigger('setOption', {type: 'setOption'}, {
				option: optionKey,
				previous: previouseValue,
				current: currentValue
			});
		},

		_destroy: function(){
			this.element.removeClass('external-order label label-primary ui-draggable order-drop').empty();
			this.element.remove();
		},

	});
})(jQuery);