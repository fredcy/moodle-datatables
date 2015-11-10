Description of DataTables third-party code included in this DataTables plugin.

The files in this directory are exactly as downloaded from
https://datatables.net in October 2015.

The Makefile in the parent directory has rules to transform these files into
corresponding files in the amd/src directory. Those files in amd/src and the
generated files in amd/build are the ones actually used by pages that employ the
API provided by this plugin.

The Makefile rules transform the downloaded DataTables javascript to comply with
the RequireJS scheme used in Moodle. In particular, we remove the embedded
module name from the main DataTables module so that it gets its name from its
location in Moodle. We update the secondary DataTables javascript modules, which
depend on the primary DataTables module, to change the name of the dependency
module. We also add comments to suppress extraneous warning messages from the
jshint pass run when building via grunt.
