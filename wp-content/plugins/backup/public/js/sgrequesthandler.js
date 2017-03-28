function sgRequestHandler(action, data, params){
    this.action = action;
    this.url = '';
    this.data = data;
    this.callback = '';
    this.type = 'POST';
    this.dataType = 'JSON';
    this.dataIsObject = true;
    this.params = params;
};

sgRequestHandler.prototype.prepareData = function() {

}

sgRequestHandler.prototype.run = function(){
    var that = this;
    that.prepareData();
    var settings = {
        url: that.url,
        data: that.data,
        type: that.type,
        dataType: that.dataType,
        success: function(response){
            if(jQuery.isFunction(that.callback)){
                that.callback(response, false);
            }
        },
        error: function (e, textStatus) {
            if(jQuery.isFunction(that.callback)){
                that.callback(false, textStatus);
            }
        }
    };

    if (typeof this.params === 'undefined') this.params = {};

    jQuery.extend(settings, this.params);

    return jQuery.ajax(settings);
};