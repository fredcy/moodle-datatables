define(['jquery', 'tool_datatables/jquery.dataTables', 'tool_datatables/dataTables.bootstrap',
	'tool_datatables/dataTables.select', 'tool_datatables/dataTables.buttons',
	'tool_datatables/buttons.bootstrap'],
       function ($, datatables) {
	   return {
	       test: function() {
		   window.console.log('$.fn is:'); window.console.log($.fn);
		   window.console.log('datatables is:'); window.console.log(datatables);
	       },
	       init: function(params) {
		   var options = {
		       'autoWidth': false,
		       'paginate': false,
		       'order': [],		// disable initial sort
		   };
		   $.extend(true, options, params); // deep-merge params into options
		   for (var attrname in params) {
		       options[attrname] = params[attrname];
		   }
		   if (options.debug) {
		       window.console.log('options = ', options);
		   }
		   $('.datatable').DataTable(options);
	       },
	   };
       }
      );
