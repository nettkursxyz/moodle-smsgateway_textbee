# Twilio SMS Gateway
SMS Gateway Plugin for Twilio Integration

## Introduction
This is a sms gateway plugin to integrate Twilio sms gateway with Moodle.

## Features
1. Integrate Twilio SMS Gateway.
2. Send SMS to a specific phone number.

## Supported Moodle Versions
Moodle 4.5 and above

## Installation
1. Download the zip file from Github repository or moodle plugin directory.
2. Extract the zip file and copy to /sms/gateway folder or Install it from Moodle's install plugin admin feature.

## How to use
1. Register for [Twilio](https://twilio.com) account.
2. Buy a Twilio Phone number.
3. Generate/Copy Test/Live Credentials (Account SID and Auth Token) [from here](https://console.twilio.com/us1/account/keys-credentials/api-keys)
4. Create New SMS Gateway from Site Administration --> Plugins --> SMS --> Manage SMS Gateways
5. Enable SMS mobile phone MFA from Admin Tools and configure twilio as SMS gateway from its settings.
6. Create a user with valid phone number.
7. Try login with user credentials and User will receive an SMS with 6-digit code.
8. Enter received 6-digit code to complete the login process.

## Support
If you encounter issues or bugs, please open an issue in the official GitHub repository: [GitHub Issues](https://github.com/santoshndev/moodle-smsgateway_twilio/issues)

## Author
Santosh Nagargoje

Web profile: https://santoshnagargoje.in/