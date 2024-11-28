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
6. Create a user account or use admin account.
7. Login with user/admin credentials
8. Go to Profile--> Preferences--> Multi-factor authentication preferences (example link http://www.yourdomain.com/admin/tool/mfa/user_preferences.php) and enter your mobile number with country code to register for MFA 
9. User will receive an SMS with 6-digit code.
10. Enter received 6-digit code to complete the MFA setup.
11. Logout the user and login again with credentials.
12. You will receive 6-digit code to complete the login process.

## Support
If you encounter issues or bugs, please open an issue in the official GitHub repository: [GitHub Issues](https://github.com/santoshndev/moodle-smsgateway_twilio/issues)

## Author
Santosh Nagargoje

Web profile: https://santoshnagargoje.in/