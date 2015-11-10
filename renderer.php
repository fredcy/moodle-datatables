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
// This file is included magically by the moodle core upon calling
// get_renderer('tool_datatables').

/**
 * Rendering functions.
 *
 * @package		tool_datatables
 * @copyright	2015 Frederick C. Yankowski
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class tool_datatables_renderer extends \plugin_renderer_base {
    /**
     * Render an example page that shows DataTables in use.
     *
     * @param array $data	User data to be displayed in table.
     * @return string		The rendered page content HTML.
     */
    public function test($data) {
        // Add a field to $data with lastaccess datetime in readable format for display.
        foreach ($data['users'] as $key => $user) {
            $accesstime = DateTime::createFromFormat('U', $user['lastaccess']);
            $data['users'][$key]['lastaccess_str'] = $accesstime->format('Y-m-d');
        }

        $out = $this->output->heading(get_string('Users', 'tool_datatables'));
        $out .= $this->output->render_from_template("tool_datatables/test", $data);
        return $out;
    }
}
