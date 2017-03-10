<?php
// This file is part of Moodle - http://moodle.org/
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 * Create test admin page showing DataTables in use.
 *
 * @package		tool_datatables
 * @copyright	2015 Frederick C. Yankowski
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_datatables;
require(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');

// Define an example page that shows DataTables in use.

// Get some data to load into an example table.
$fields = "username,firstname,lastname,lastaccess,auth";
$firstinitial = '';
$lastinitial = '';             // Limit results in testing.
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

admin_externalpage_setup('datatables_test');
$title = get_string('pluginname', 'tool_datatables');
$PAGE->set_title($title);
$PAGE->set_heading($title);

// Set up DataTable with passed options.
$params = array("select" => true, "paginate" => false);
$params['buttons'] = array("selectAll", "selectNone");
$params['dom'] = 'Bfrtip';      // Needed to position buttons; else won't display.
$selector = '.datatable';
$PAGE->requires->js_call_amd('tool_datatables/init', 'init', array($selector, $params));

$PAGE->requires->css('/admin/tool/datatables/style/dataTables.bootstrap.css');
$PAGE->requires->css('/admin/tool/datatables/style/select.bootstrap.css');

echo $OUTPUT->header();

$renderer = $PAGE->get_renderer('tool_datatables');
echo $renderer->test(array('users' => $usersa));

echo $OUTPUT->footer();
