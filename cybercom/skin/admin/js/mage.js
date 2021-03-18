var Base = function() {
	
}

Base.prototype =  {
	alert : function()
	{
		
	},
	url : null,
	params : {},
	method : 'post',
	setUrl : function(url){
		this.url = url;
		return this;
	},
	getUrl : function(){
		return this.url;
	},
	setMethod : function(method){
		this.method = method;
		return this;
	},
	getMethod : function(){
		return this.method;
	},
	setParams : function(params){
		this.params = params;
		return this;
	},
	getParams : function(key){
		if (typeof key === 'undefined') {
			return this.params;
		}
		if (typeof this.params[key] != 'undefined' ) {
			return this.params[key]
		}
		return null;
		
	},
	addParam : function(key, value){
		this.params[key] = value;
		return this;
	},
	removeParms : function(){
		if (typeof this.params[key] != 'undefined' ) {
			delete this.params[key]
		}
		return this;
	},
	resetParms : function()
	{
		this.params = {};
		return this;
	},
	setForm : function(form){
		this.setMethod($(form).attr('method'));
		this.setUrl($(form).attr('action'));
		this.setParams($(form).serializeArray());
		return this;

	},
	load : function()
	{
		jQuery.ajax({
			url: this.getUrl(),
			method: this.getMethod(),
			data: this.getParams(),
			success:function(response){
				// $("#message").load(" #message > *");
				// $("#message").fadeIn(4000);
				// $("#message").fadeOut(4000);

				jQuery.each(response.elements,function(i, element){
					jQuery(element.selecter).html(element.html);
				});
			}
		});
	},
	upload : function()
	{
		jQuery.ajax({
			url: this.getUrl(),
			method: this.getMethod(),
			data: this.getParams(),
			processData: false,
        	contentType: false,
			success:function(response){
				jQuery.each(response.elements,function(i, element){
					jQuery(element.selecter).html(element.html);
				});
			}
		});
	}

};

var object = new Base();

