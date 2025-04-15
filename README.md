# TextBee.dev SMS Gateway
SMS Gateway Plugin for Textbee.dev Integration

## Introduction
This is a sms gateway plugin to integrate Textbee sms gateway with Moodle.

## What is TextBee.dev
TextBee is an open-source solution that turns your Android device into a powerful SMS gateway. Send SMS effortlessly through your applications.

## Features
1. Integrate TextBee.dev SMS Gateway.
2. Send SMS to a specific phone number.

## Supported Moodle Versions
Moodle 4.5 and above

## Installation
1. Download the zip file from Github repository or moodle plugin directory.
2. Extract the zip file and copy to /sms/gateway folder or Install it from Moodle's install plugin admin feature.

## How to use

1. Register at TextBee.dev or run your own platform
2. Connect your phone
3. Generate/Copy API Key (Account SID and Auth Token)

5. Enable SMS mobile phone MFA from Admin Tools and configure TextBee.dev as SMS gateway from its settings.
6. Create a user account or use admin account.
7. Login with user/admin credentials
8. Go to Profile--> Preferences--> Multi-factor authentication preferences (example link http://www.yourdomain.com/admin/tool/mfa/user_preferences.php) and enter your mobile number with country code to register for MFA 
9. User will receive an SMS with 6-digit code.
10. Enter received 6-digit code to complete the MFA setup.
11. Logout the user and login again with credentials.
12. You will receive 6-digit code to complete the login process.

## Support
If you encounter issues or bugs, please send a bug report to nettkursxyz@gmail.com

## Author
Santosh Nagargoje: https://santoshnagargoje.in
Forked and rewritten by Lars Aamodt @ https://nettkurs.xyz
