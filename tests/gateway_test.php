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

use core_sms\message;

/**
 * Twilio SMS gateway tests.
 *
 * @package    smsgateway_twilio
 * @category   test
 * @copyright  2024 Santosh N. <santosh.nag2217@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \smsgateway_twilio\gateway
 */
class gateway_test extends \advanced_testcase {

    public function test_update_message_status(): void {
        $this->resetAfterTest();

        $config = new \stdClass();
        $config->acc_sid = 'test_api_key';
        $config->auth_token = 'test_auth_token';
        $config->from_number = '+1234567890';

        $manager = \core\di::get(\core_sms\manager::class);
        $gw = $manager->create_gateway_instance(
            classname: gateway::class,
            name: 'twilio',
            enabled: true,
            config: $config,
        );
        $othergw = $manager->create_gateway_instance(
            classname: gateway::class,
            name: 'twilio',
            enabled: true,
            config: $config,
        );

        $message = new message(
            recipientnumber: '1234567890',
            content: 'Hello, world!',
            component: 'smsgateway_twilio',
            messagetype: 'test',
            recipientuserid: null,
            issensitive: false,
            gatewayid: $gw->id,
        );
        $message2 = new message(
            recipientnumber: '1234567890',
            content: 'Hello, world!',
            component: 'smsgateway_twilio',
            messagetype: 'test',
            recipientuserid: null,
            issensitive: false,
            gatewayid: $gw->id,
        );

        $updatedmessages = $gw->update_message_statuses([$message, $message2]);
        $this->assertEquals([$message, $message2], $updatedmessages);

        $this->expectException(\coding_exception::class);
        $othergw->update_message_status($message);
    }
}
