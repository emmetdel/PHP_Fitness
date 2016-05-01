<?php # Script 9.2 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_USER', 'emmet');
DEFINE ('DB_PASSWORD', 'tuckerscut07');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'fitness_centre');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
// The function call is preceded by @ (the error suppression character)
// This means any error will not be displayed in the web browser
// Instead we handle it in the Or Die clause
// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
