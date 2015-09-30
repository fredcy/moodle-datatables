define(['jquery'], function ($) {
    return {
	test: function() {
	    window.alert('datatables test function called on ' + $('title').text());
	}
    };
});
