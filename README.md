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

UnitTest ![Description](Anonymous user ---- Checking user access and availablity of page as per HTTP codee.)
	
	Email Id Password Authontication Method	   Path	 	   Expected HTTP  
	N/A	 N/A	  Anonymous	 ANY	   /dashbord	    302 Redirect
	N/A	 N/A	  Anonymous	 GET	   /guest/ 	    200 Ok
	N/A	 N/A	  Anonymous	 GET|POST  /guest/new	    302 Redirect
	N/A	 N/A  	  Anonymous	 GET	   /guest/{id}	    302 Redirect
	N/A	 N/A	  Anonymous	 GET|POST  /guest/{id}/edit 302 Redirect
	N/A	 N/A	  Anonymous	 DELETE	   /guest/{id}	    Need to check
	N/A	 N/A	  Anonymous	 GET|POST  /register	    200 Ok
	N/A	 N/A	  Anonymous	 GET|POST  /login	    200 Ok
	N/A	 N/A	  Anonymous	 GET	   /logout	    302 Redirect
	N/A	 N/A	  Anonymous	 ANY	   /	            200 Ok
	N/A	 N/A	  Anonymous	 ANY	   /login	    200 Ok
	
 	Command :                    
		php bin/phpunit # To run all the test cases                  
		php bin/phpunit tests/Page/PageHttpStatusTest.php # To run the specif test cases  
		
	Site Url : http://127.0.0.1:8000/ 
	Description : Anonymous user ---- Checking user access and availablity of page as per HTTP codee.
	Status : Done   
	Testing Type : Functional Testing 
	File : https://github.com/jeeten/guestbook/blob/master/tests/Page/PageHttpStatusTest.php					
	

Note 
	
	1. Web-pack is not emplemented ( will do that ), it's following the traditional css and js.
	2. Twig Theme has been implemented by referring various tutorial
