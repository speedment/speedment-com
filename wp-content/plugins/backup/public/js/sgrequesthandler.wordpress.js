sgRequestHandler.prototype.prepareData = function() {
    this.url = getAjaxUrl();

    if(typeof this.data === 'undefined') {
        if (this.dataIsObject === true) this.data = {};
        else this.data = '';
    }

    var action = 'backup_guard_'+this.action;
    if (this.dataIsObject === true) {
        //if formdata
        if(this.data instanceof FormData){
            this.data.append('action', action);
        }
        else {
            this.data['action'] = action;
        }
    }
    else {
        if (this.data !== '') this.data += '&';
        this.data += 'action='+action;
    }
}
