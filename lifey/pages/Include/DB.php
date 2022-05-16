
<?php

// define constant variables
define('DB_NAME', '170204067_170204115');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

try{

    // connection variable
   $ConnectingDB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // encoded language
    mysqli_set_charset($ConnectingDB, 'utf8');


}catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}


// Use sql code for creating database

// CREATE DATABASE lifey
// CREATE TABLE user_registration(
//                userID int not null PRIMARY KEY AUTO_INCREMENT,
//                firstName varchar(255),
//               lastName varchar(255),
//               email varchar(255) not null,
//              password varchar(200) not null,
//             token varchar(255),
//             active varchar(255),
//             profileImage varchar(255),
//             registerDate datetime,
//             admin_active int default 0
// );


// CREATE TABLE contact_form(
//                contactID int not null PRIMARY KEY AUTO_INCREMENT,
//                name varchar(255),
//               email varchar(255),
//              contactno varchar(255),
//              country varchar(255),
//               subject text,
//              message text,
//              messageDate datetime,
//              reply text,
//              replyDate datetime,
//              status int default 0
// );

//
// CREATE TABLE home_text(
//                textID int not null PRIMARY KEY AUTO_INCREMENT,
//                text_category varchar(255),
//               text text
//
// );

//
//INSERT INTO `home_text`(`text_category`, `text`)
//VALUES ('h1','Lifey: Lifey is life'),
//        ('h2','SECURE LIFE'),
//        ('h3'," Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("h4","SIGN IN"),
//        ("s1t1","Lifey"),
//        ("s1t2","Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s1t3"," Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s2t1","Our registered Clint"),
//        ("s2t2","it means to be full of life"),
//        ("s3t1","Download Our App"),
//        ("s3t2","Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s4t1","What our Clint Say about us"),
//        ("s4t2","Lifey has several possible meanings"),
//        ("s4t3","Dr.Strange"),
//        ("s4t4","Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s4t5","MBBS FCPS"),
//        ("s4t6","DHAKA MEDICAL"),
//        ("s4t7","ABUL MAL"),
//        ("s4t8","Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s4t8","Cancer"),
//        ("s4t9","Noakhali"),
//        ("s4t10","Sokina"),
//        ("s4t11","Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s4t12","Tummy sickness"),
//        ("s4t13","Cumilla"),
//        ("s4t14","Business man"),
//        ("s4t15","Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."),
//        ("s4t16","Business Man"),
//        ("s4t17","Under Cover Agent")
//

// CREATE TABLE home_image(
//                imageID int not null PRIMARY KEY AUTO_INCREMENT,
//                image_src varchar(255),
//                image_category varchar(255)
//
//
// );


//
//INSERT INTO home_image(image_src,image_category)
//VALUES ('../assets/home_image/banner_download.png','banner')
