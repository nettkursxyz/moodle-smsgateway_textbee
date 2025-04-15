<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace smsgateway_textbee;

use core_sms\hook\after_sms_gateway_form_hook;

/**
 * Hook listener for textbee sms gateway.
 *
 * @package    smsgateway_textbee
 * @copyright  2024 Santosh N. <santosh.nag2217@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_listener {

    /**
     * Hook listener for the sms gateway setup form.
     *
     * @param after_sms_gateway_form_hook $hook The hook to add to sms gateway setup.
     */
    public static function set_form_definition_for_textbee_sms_gateway(after_sms_gateway_form_hook $hook): void {
        if ($hook->plugin !== 'smsgateway_textbee') {
            return;
        }

        $mform = $hook->mform;

        $mform->addElement('static', 'information', get_string('textbee_information', 'smsgateway_textbee'));

        $gateways = [
            'textbee' => get_string('textbee', 'smsgateway_textbee'),
        ];
        $mform->addElement(
            'select',
            'gateway',
            get_string('gateway', 'smsgateway_textbee'),
            $gateways,
        );
        $mform->setDefault(
            elementName: 'gateway',
            defaultValue: 'textbee',
        );
        // Remove this if more gateway implemented.
        $mform->hardFreeze('gateway');

        $mform->addElement(
            'text',
            'from_number',
            get_string('textbee_number', 'smsgateway_textbee'),
            'maxlength="255" size="20"',
        );
        $mform->setType('from_number', PARAM_TEXT);
        $mform->addRule('from_number', get_string('maximumchars', '', 255), 'maxlength', 255);
        $mform->setDefault(
            elementName: 'from_number',
            defaultValue: '',
        );

        $mform->addElement(
            'text',
            'acc_sid',
            get_string('acc_sid', 'smsgateway_textbee'),
            'maxlength="255" size="20"',
        );
        $mform->setType('acc_sid', PARAM_TEXT);
        $mform->addRule('acc_sid', get_string('maximumchars', '', 255), 'maxlength', 255);
        $mform->setDefault(
            elementName: 'acc_sid',
            defaultValue: '',
        );
        $mform->addElement(
            'passwordunmask',
            'auth_token',
            get_string('auth_token', 'smsgateway_textbee'),
            'maxlength="255" size="20"',
        );
        $mform->setType('auth_token', PARAM_TEXT);
        $mform->addRule('auth_token', get_string('maximumchars', '', 255), 'maxlength', 255);
        $mform->setDefault(
            elementName: 'auth_token',
            defaultValue: '',
        );

    }

}
