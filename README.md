# Email Handling Task - ThemeXpert
## _By- Rayhanur Rahaman Rubel_




This is an assesment task for Md. Rayhanur Rahaman Rubel by ThemeExpert
The task is successfully done by me(Rayhanur Rahaman Rubel) and the project is here to test/judge.

Project Requirement:
- Need to handle mails
- Incoming mails will be stored to database
- Incoming mails should be viewed from a page/dashboard
- User can send response/reply to a mail from the system and and email will be sent to the incoming mail sender.

## Project Target

- Need to handle/track incoming mails to particular mailboxs.
- Need to read the incoming mail's data and store them to database
- Show the data to a page in a well-organized way
- Implement reponse to mail feature
- Send response message as email

# Description
The incoming mail handling could be done in two ways.
1. By directly reading mailbox emails
2. Pipe incoming mails to php script

I have used the 2nd way as I was told to handle by postfix. Emails are piped to php script.
**Emails are piped to Laravel Artisan Command here.**
I have skipped all validations in this project.



## Technical Procedure

Whenever an email comes to the mail server (Postfix or any other mail server), it is piped to a laravel's PHP artisan command. As a result a command/script is executed which processes the request/email.

- Email piping configured to mail server (postfix/cpanel)
- A laravel command is created to handle the request/event
- Laravel reads email data from **php://stdin**
- Laravel receives raw email content from here
- Extracted email data in formatted way by using **php-mime-mail-parser** package. It can also be extracted manually by I used the package for better output.
- Extracted data is stored to MySQL database
- Eails collection are displayed is homepage
- By clicking/selecting an email it's details can be viewed
- Under the mail's details there is an input box from where any message can be send as response to the mail.
- The response message is sent as email to the email address in a formatted view
- All responses are displayed under mail body


## Requirements
 > PHP 7.2 or greater
 > php mailparse extension enabled
 > MySQL Database
 
php mailparse is required by the **php-mime-mail-parser** package.

## Installation

Copy the project and set /public as document root directory.
Configure the .env file according to your server credentials
Configure the .env file according to your smtp credentials for outgoint mail
Follow basic configuration procedure for Laravel.


## Live Project URL
http://mailtask.rrrlab.com

> You can send email to any of the following email address. They will be available on the hompage within minutes (as mails are not reched to destination instantly).
info@rrrlab.com
info@retadesk.com
test@rrrlab.com

If found any issue then please call @ +8801723858781, +8801873967699 or send email to rayhan.rrrbd@gmail.com

Thank You.
## License

MIT
