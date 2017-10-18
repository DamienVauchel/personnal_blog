# Personnal Blog

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f9ae14de-5178-4b1b-80b3-f7b6ad561a8f/small.png)](https://insight.sensiolabs.com/projects/f9ae14de-5178-4b1b-80b3-f7b6ad561a8f)

## Project's origins
This project is linked to the OpenClassRooms Da PHP/Symfony's studies. It is the 5th project in which it is asked to create a blog from A to Z in PHP without signup/login system.

## Prerequisite

* PHP 7
* MySQL
* Apache or IIS depend of your OS

More easy, you can download MAMP, WAMP or WAMPP depend of your OS

## Installation

Download project or clone it in the htdocs or www depend of your OS
If you are using Linux, check your permissions:
```
    $sudo /opt/lampp/htdocs/ ls
```
Change permissions to everybody to be able to update informations in every repository's folders.

Open the file app/Database.php and put your parameters like this:

* $dbHost: "localhost"
* $dbName: "personnal_blog"
* $dbUser: type your username to access MySQL databases ("root" by default)
* $dbUserPassword: type your password to access MySQL databases ("root" or "" by default)

Now, create the database:
1. Go on URL localhost/phpmyadmin
2. Click "New Database"
3. Type "personnal_blog" and click 'Create'
4. Click on your new databe "personnal_blog" and then "Import"
5. Load the folder's root's database.sql to have some test datas
6. Click 'Go'

Now, you can go on the URL:

http://localhost/personnal_blog

If you have any question, you can contact me

Thanks!