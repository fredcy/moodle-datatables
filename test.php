<?php
namespace tool_datatables;
require(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');

// Define an example page that shows DataTables in use.

// Get some data to load into an example table
$fields = "username,firstname,lastname,lastaccess,auth";
$firstinitial = '';
$lastinitial = 'k';             // limit results in testing
$page = '';
$recordsperpage = 9999;
$users = get_users(true, '', false, array(), 'lastname ASC',
                   $firstinitial, $lastinitial, $page, $recordsperpage, $fields);

// Convert from array-of-objects to array-of-arrays as needed by templates.
$usersa = array();
foreach ($users as $user) {
    $u = array('username'   => $user->username,
               'firstname'  => $user->firstname,
               'lastname'   => $user->lastname,
               'lastaccess' => $user->lastaccess,
               'auth'       => $user->auth,
    );
    $usersa[] = $u;
}

//////////////////

admin_externalpage_setup('datatables_test');
$title = get_string('pluginname', 'tool_datatables');
$PAGE->set_title($title);       // TITLE element value in HEAD
$PAGE->set_heading($title);     // just below logo

// Set up DataTable with passed options
$params = array("select" => true, "paginate" => false);
$params['buttons'] = array("selectAll", "selectNone");
$params['dom'] = 'Bfrtip';      // needed to position buttons; else won't display
$selector = '.datatable';
$PAGE->requires->js_call_amd('tool_datatables/init', 'init', array($selector, $params));

$PAGE->requires->css('/admin/tool/datatables/style/dataTables.bootstrap.css');
$PAGE->requires->css('/admin/tool/datatables/style/select.bootstrap.css');

echo $OUTPUT->header();

$renderer = $PAGE->get_renderer('tool_datatables');
echo $renderer->test(array('users' => $usersa));

echo $OUTPUT->footer();
