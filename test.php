<?php

namespace tool_datatables;
require(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once(__DIR__ . '/lib.php');

// Get some data to load into an example table
$fields = "username,firstname,lastname,lastaccess,auth";
$lastinitial = 'k';             // limit results in testing
$users = get_users(true, '', false, array(), 'lastname ASC',
                   '', $lastinitial, '', '', $fields);
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

$params = array("select" => true, "paginate" => false);
$params['buttons'] = array("selectAll", "selectNone");
$params['dom'] = 'Bfrtip';
$PAGE->requires->js_call_amd('tool_datatables/init', 'init', array($params));
$PAGE->requires->css('/admin/tool/datatables/style/dataTables.bootstrap.css');
$PAGE->requires->css('/admin/tool/datatables/style/select.bootstrap.css');

echo $OUTPUT->header();

$renderer = $PAGE->get_renderer('tool_datatables');
echo $renderer->test(array('users' => $usersa));

echo $OUTPUT->footer();
