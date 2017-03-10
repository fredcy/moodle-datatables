define(
  [
    "jquery",
    "tool_datatables/jquery.dataTables",
    "core/log",
    "tool_datatables/dataTables.bootstrap",
    "tool_datatables/dataTables.select",
    "tool_datatables/dataTables.buttons",
    "tool_datatables/buttons.bootstrap"
  ],
  function($, datatables) {
    return {
      test: function() {
        window.console.log("$.fn is:");
        window.console.log($.fn);
        window.console.log("datatables is:");
        window.console.log(datatables);
      },
      init: function(selector, params) {
        // Configure element matched by selector as a DataTable,
        // adding params to the default options.
        if (params.debug) {
          window.console.log(
            "tool_datatables:init.js/init(): ",
            selector,
            params
          );
        }
        var options = {
          autoWidth: false,
          paginate: false,
          order: [] // disable initial sort
        };
        $.extend(true, options, params); // deep-merge params into options
        if (params.debug) {
          window.console.log(
            "tool_datatables init.js/init(): options = ",
            options
          );
        }
        $(selector).DataTable(options);
      }
    };
  }
);
