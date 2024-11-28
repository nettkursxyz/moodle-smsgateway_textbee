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

namespace smsgateway_twilio;

use core_sms\hook\after_sms_gateway_form_hook;

/**
 * Hook listener for twilio sms gateway.
 *
 * @package    smsgateway_twilio
 * @copyright  2024 Santosh N. <santosh.nag2217@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_listener {

    /**
     * Hook listener for the sms gateway setup form.
     *
     * @param after_sms_gateway_form_hook $hook The hook to add to sms gateway setup.
     */
    public static function set_form_definition_for_twilio_sms_gateway(after_sms_gateway_form_hook $hook): void {
        if ($hook->plugin !== 'smsgateway_twilio') {
            return;
        }

        $mform = $hook->mform;

        $mform->addElement('static', 'information', get_string('twilio_information', 'smsgateway_twilio'));

        $gateways = [
            'twilio' => get_string('twilio', 'smsgateway_twilio'),
        ];
        $mform->addElement(
            'select',
            'gateway',
            get_string('gateway', 'smsgateway_twilio'),
            $gateways,
        );
        $mform->setDefault(
            elementName: 'gateway',
            defaultValue: 'twilio',
        );
        // Remove this if more gateway implemented.
        $mform->hardFreeze('gateway');

        $mform->addElement(
            'text',
            'from_number',
            get_string('twilio_number', 'smsgateway_twilio'),
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
            get_string('acc_sid', 'smsgateway_twilio'),
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
            get_string('auth_token', 'smsgateway_twilio'),
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
