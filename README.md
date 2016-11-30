# Mathcountsgrading
Automated grading system for Mathcounts competition. Please see http://github.com/saligrama/MCGExpression for parsing and arithmetic comparison functionality.

## Installation instructions

The system is designed to work on a LAMP stack, so make sure you have Apache, PHP, and MySQL installed first on your linux server that your intend to place the system on.

You can then clone the repo:
`git clone https://github.com/saligrama/mathcountsgrading.git`

And the execute the following commands:   

`cd mathcountsgrading`   

`git submodule init`    

`git submodule update`

`sudo cp -rf var/www/* /var/www`

To put the files in place (make sure your Apache serveris running from /var/www, with /var/www/public as the public directory)

Then, to set up the database:

`mysql`

And in the mysql prompt:

`CREATE DATABASE mathcountsgrading;`

`exit;`

Outside of the mysql prompt enter `mysql mathcountsgrading < scripts/dbcreate.sql` to create the tables
