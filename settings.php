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

defined('MOODLE_INTERNAL') || die;
if (! $hassiteconfig) {
    return;
}

$category = new admin_category('datatables', 'Datatables');

// Put the new pages into that category. The name values below (first arg) have
// to match the name values in the admin_externalpage_setup() calls for the
// various pages.
$category->add('datatables', new admin_externalpage('datatables_test',
                                                    "Datatables " . get_string('test', 'tool_datatables'),
                                                    "$CFG->wwwroot/$CFG->admin/tool/datatables/test.php"));

// Link the category itself into the admin menu structure.
$ADMIN->add('server', $category);
