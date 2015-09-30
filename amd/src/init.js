define(['jquery', 'tool_datatables/jquery.dataTables', 'tool_datatables/dataTables.bootstrap'],
       function ($, datatables) {
	   return {
	       test: function() {
		   window.console.log('$.fn is:'); window.console.log($.fn);
		   window.console.log('datatables is:'); window.console.log(datatables);
	       },
	       init: function(params) {
		   window.console.log('params = ', params);
		   var options = {
		       'autoWidth': false,
		       'paginate': false,
		       'order': [],		// disable initial sort
		   };
		   for (var attrname in params) {
		       options[attrname] = params[attrname];
		   }
		   window.console.log('options = ', options);
		   $('.datatable').DataTable(options);
	       },
	   };
       }
      );
