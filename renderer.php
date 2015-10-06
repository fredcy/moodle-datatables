<?php
// This file is included magically by the moodle core upon calling
// get_renderer('tool_datatables').

defined('MOODLE_INTERNAL') || die();

class tool_datatables_renderer extends \plugin_renderer_base {
    public function test($data) {
        // Add field with lastaccess datetime in readable format for display.
        foreach ($data['users'] as $key => $user) {
            $accesstime = DateTime::createFromFormat('U', $user['lastaccess']);
            $data['users'][$key]['lastaccess_str'] = $accesstime->format('Y-m-d');
        }

        $out = $this->output->heading(get_string('Users', 'tool_datatables'));
        $out .= $this->output->render_from_template("tool_datatables/test", $data);
        #$out .= ('<pre>' . print_r($data, true) . '</pre>');
        return $out;
    }
}
