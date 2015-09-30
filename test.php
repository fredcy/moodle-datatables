<?php

namespace tool_datatables;
require(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
#require_once(__DIR__ . '/lib.php');

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
/*
$PAGE->requires->js_amd_inline(js_datatables());
foreach ($css_urls as $url) {
    $PAGE->requires->css(new \moodle_url($url));
}
*/
$PAGE->requires->js_call_amd('tool_datatables/init', 'test', array());
echo $OUTPUT->header();

echo "Hello from datatables plugin";
$renderer = $PAGE->get_renderer('tool_datatables');
echo $renderer->test(array('users' => $usersa));

echo $OUTPUT->footer();
