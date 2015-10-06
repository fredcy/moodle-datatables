<?php
defined('MOODLE_INTERNAL') || die;
if (! $hassiteconfig)
    return;

$category = new admin_category('datatables', 'Datatables');

// Put the new pages into that category. The name values below (first arg) have
// to match the name values in the admin_externalpage_setup() calls for the
// various pages.
$category->add('datatables', new admin_externalpage('datatables_test',
                                                    "Datatables " . get_string('test', 'tool_datatables'),
                                                    "$CFG->wwwroot/$CFG->admin/tool/datatables/test.php"));

// Link the category itself into the admin menu structure
$ADMIN->add('server', $category);
