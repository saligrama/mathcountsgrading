<?php

    require("../includes/functions.php")

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $username = $_POST["username"];
        
        $email = $_POST["email"];
    
        if (empty($_POST["username"] || empty($_POST["password"])))
            echo "Username or password empty. Please try again."
            
        else {
            
            $link = mysqli_connect("localhost", "root", "password", "mathcounts")
        
            if (mysqli_connect_errno())
                echo "Connection to database failed: " . mysqli_connect_errno() . " " . mysqli_connect_error();
            
        
            $userdata = mysqli_query($link, "SELECT * FROM users WHERE username = '$username' AND email = '$email'");
            if (mysqli_num_rows($userdata) == 0)
                echo "Username not found."
            
            else {
            
                $user = $userdata[0];
                
                if (crypt($_POST["password"], $user["password_hash"]) == $user["password_hash"]) {

                    $_SESSION["user_id"] = $user["user_id"];
                    $_SESSION["role"] = $user["role"];
                    $_SESSION["affiliation"] = $user["affiliation"];
                    
                    if ($_SESSION["role"] == "grader")
                        header('Location: /index-grader.php');
                    else
                        header('Location: /index-admin.php');
      
                }
                
                else {
                
                    echo "Bad password";
                    
                    sleep(2);
                    
                    header('Location: /login.php');
                
                }
            
            }
        
        }
    
    }
    
    else {
    
        render("login_form.php", ["title" => "Log In"]);
    
    }

?>
