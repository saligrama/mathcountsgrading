# Mathcountsgrading
Automated grading system for Mathcounts competition. Please see http://github.com/saligrama/MCGExpression for parsing and arithmetic comparison functionality.

## Screenshots

![](https://www.github.com/saligrama/mathcountsgrading/raw/master/image1.png)

![](https://www.github.com/saligrama/mathcountsgrading/raw/master/image2.png)

![](https://www.github.com/saligrama/mathcountsgrading/raw/master/image3.png)

![](https://www.github.com/saligrama/mathcountsgrading/raw/master/image4.png)


## Installation instructions

The system is designed to work on a LAMP stack, so make sure you have Apache, PHP, and MySQL installed first on your linux server that your intend to place the system on.

You can then clone the repo:

`git clone --recursive https://github.com/saligrama/mathcountsgrading.git`

Then, clear the directory where you wish to install the system (for apache serve
And the execute the following commands:   

`cd mathcountsgrading`

`sudo cp -rf var/www/* /var/www`

To put the files in place (make sure your Apache server is running from /var/www, with /var/www/public as the public directory)

Then, to set up the database:

`mysql`

And in the mysql prompt:

`CREATE DATABASE mathcountsgrading;`

`exit;`

Then, outside of the mysql prompt enter 

`mysql mathcountsgrading < scripts/dbcreate.sql` 

to create the tables, and your done!

## Usage instructions

### Create account

Upon directing your browser to your servers's index.html, you will see a form to create the first admin account, that controls the system and competition.

### Create competition

After creating your admin account, you can create the first competition by clicking 'Add competition' in admin.php.

In create.php, first create all the schools you will need by clicking on the 'New school' button and filling out the form.

After creating a school, you can create students in it through the 'Add student' panel on its edit page (click on the 'edit' button next to it in the list of schools in the create competition page).

Once you have your schools and students, select which ones you want to participate in the competition you're creating by checking the boxes next to them in their lists in create.php. 
Students selected as 'regular' have their score factored into their team score (they count), but alternates do not. However, alternates are still seperately ranked.

The edit competition page is very similar to create.php.

### Create graders

For each grader (teacher), you have to create an account with their name and school affiliation, etc. by clicking on the 'New User' tab in the navbar in admin.php. Make sure to tell them the email (username) and password you enter for their account so they can access it.

### Grading workflow

To manually grade a school or student as admin, click on the 'Grade Participants' tab in admin.php. This is also the page through which the graders grade their assigned students and schools.

### Current Competition Info

From admin.php you can see the following tabs:

#### Progress 

This show the grading progress, in percentage. A student is considered fully graded only after they have been graded by two or more graders or at least one admin and all the responses of the graders/admins are the same, OR there is a conflict in the responses but it has been resolved (see the conflict tab). In addition, a grader may only grade a student or school if it not already been graded by 2 other graders, but an admin can.

#### Student Conflicts

From here, you can resolve any conflicts in grader responses. Simply follow the text instructions.

The same goes for the team conflicts tab, except it is for the team round grading, instead of the individual rounds (sprint, target)

#### Current Standings

The student score is the sum of the scores in the individual rounds (sprint, target).

This tab shows the results of the grading so far: which school or student is doing the best. The team score is the score in team round plus the average of all the individual scores of the regular students of that school.
