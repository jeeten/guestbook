Readme

[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)

Requirement

	https://github.com/jeeten/guestbook/blob/master/Guestbook_Requirement.docx

Efforts

	https://github.com/jeeten/guestbook/blob/master/GuestBook_Task_Effort_Estimation.xlsx

Prerequisite

    	To set up this demo project, prerequisite should be met

	PHP --- pre installed and configured - version >= 7.x
	MySql  --- pre installed and configured - version >= 5.x


Install

	git clone https://github.com/jeeten/guestbook.git
	cd guestbook
	composer update
	Replace the vlaue of db_user, db_password,db_name, host, and port as per your system configuration as shown below in .env 
	@#DATABASE_URL=mysql://db_user:db_password@host:port/db_name
	php bin/console doctrine:database:create
	php bin/console make:migration
	php bin/console doctrine:migrations:migrate
	php bin/console server:run

Screens

	![Screenshot](https://github.com/jeeten/guestbook/blob/master/CreateanAccount.png)
	![Screenshot](https://github.com/jeeten/guestbook/blob/master/WelcometoGuestBook.png)
	![Screenshot](https://github.com/jeeten/guestbook/blob/master/ApprovedGuestList.png)
	![Screenshot](https://github.com/jeeten/guestbook/blob/master/Edit_Guest.png)

Validated Screens 

	![Screenshot](https://github.com/jeeten/guestbook/blob/master/CreateanAccountValidate.png)
	![Screenshot](https://github.com/jeeten/guestbook/blob/master/WelcometoGuestBookValidate.png)
	![Screenshot](https://github.com/jeeten/guestbook/blob/master/NewGuestValidate.png)





Note 
	
	1. Web-pack is not emplemented ( will do that ), it's following the traditional css and js.
	2. Twig Theme has been implemented by referring various tutorial
