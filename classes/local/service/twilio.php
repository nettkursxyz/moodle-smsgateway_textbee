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

namespace smsgateway_twilio\local\service;

use core_sms\message_status;
use smsgateway_twilio\local\twilio_sms_service_provider;
use stdClass;

/**
 * Twilio SMS service provider.
 *
 * @package    smsgateway_twilio
 * @copyright  2024 Santosh N. <santosh.nag2217@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class twilio implements twilio_sms_service_provider {

    /**
     * Include the required calls.
     */
    private static function require(): void {
        global $CFG;
        require_once($CFG->dirroot . '/.extlib/twilio-php/src/Twilio/autoload.php');
    }

    #[\Override]
    public static function send_sms_message(
        string $messagecontent,
        string $phonenumber,
        stdclass $config,
    ): message_status {
        self::require();

        // Setup client params and instantiate client.
        $client = new \Twilio\Rest\Client($config->acc_sid, $config->auth_token);

        try {

            // Actually send the message.
            $client->messages->create(
                $phonenumber,
                [
                    'from' => $config->from_number,
                    'body' => $messagecontent,
                ]
            );
            return \core_sms\message_status::GATEWAY_SENT;
        } catch (\Aws\Exception\AwsException $e) {
            return \core_sms\message_status::GATEWAY_NOT_AVAILABLE;
        }
    }
}
