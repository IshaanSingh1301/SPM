<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone))
{
    $host = "database";
    $dbUsername = "love";
    $dbPassword = "123456";
    $dbname = "sysprov";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    }
    else
    {
        $sql = "CREATE TABLE studentrecord (
        username  VARCHAR(30),
        password VARCHAR(30) NOT NULL,
        gender VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE,
        phoneCode INT(10),
        phone INT(20)
        ) ";

        if ($conn->query($sql) === true)
        {
            echo "Table StudentRecord created successfully \n";
            echo "<br>";
            
        }
        else
        {
            echo "Editing into the Student Record: " ;
            echo "<br>";
        }
        
        
        
        $sql="INSERT INTO studentrecord (username, password, gender, email, phoneCode, phone) VALUES ('.$_POST[username]','.$_POST[password]', '.$_POST[gender]' , '.$_POST[email]', '.$_POST[phoneCode]', '.$_POST[phone]')";
        
        if ($conn->query($sql) === true)
        {
            echo "Student Record Added To Database \n";
            echo "<br>";
        }
        else
        {
            echo "STUDENT WITH THIS EMAIL ALREADY EXISTS ";
            echo "<br>";
        }
       }
     }
?>

