;(function($){
	
	$.widget("nt.", {
		options: {


		},

		_create: function(){
			
			this.element.addClass('');
			this._container = $("<div></div>").appendTo(this.element);							

			this._setOption({
				'title' : this.options.title,
				'driver': this.options.driver,
			});			
			
			
		},

		_setOption: function(key, value){
			var self = this,
			prev = this.options[key],
			fnMap = {
				'title' : function(){
					//createTitle(value, self);
					
				},
				'driver' : function(){
					
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
			this.element.removeClass('').empty();
			this.element.remove();
		},

	});

})(jQuery);