HOW TO USE THE API :

Clone the project in C:\xampp\htdocs\GoGreen (or use something else than xampp)
Launch Apache and MySQL and go to hhtp://localhost/phpmyadmin
Create a database called "covoit"

Go to "http://localhost/GoGreen/reset_db.php" to reset / create the tables

-------------------

API spec :

URL : http://localhost/GoGreen/

Pages :
	user.php
		GET [no parameters]
	        Returns the list of the users and their informations
	    PUT [query parameters : name, surname, login, pass, address, company, phoneNumber]
	        Add a user with encrypted password

	bid.php
		GET [no parameters]
	        Returns the list of the bids and their informations
	    PUT [query parameters : car, departureTime, fromCompany]
	        Add a bid

	car.php
	    GET [no parameters]
    	    Returns the list of the cars and their informations
        PUT [query parameters : driver, numberSeats, licencePlate]
    	    Add a car

	login.php
	    POST [form parameters : login, pass]
	        Returns the user's database ID if correct, false is password incorrect

	passenger.php
        GET [no parameters]
	        Returns the list of the passengers and their informations
	    PUT [query parameters : bid, passenger]
	        Add a passenger

	reset_db.php
	    GET [no parameters]
    	        Empties database and adds Company1