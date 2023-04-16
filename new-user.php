<?php
    session_start();
    setcookie("cookieid", "rand(1, 5000)"); 
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!-- cs328 class HTML template: by Sharon Tuttle, last modified 2023-02-22 -->

<!--
    by: Gracie Ceja
    last modified: April 15, 2023

    you can run this using the URL: https://nrs-projects.humboldt.edu/~glc47/hackathon/new-user.php
 
-->

<head>
    <title>HSU Dating Website: New User &hearts; </title>
    <meta charset="utf-8" />

    <!-- favicon for this website -->
    <link href="favicon3.png" type="image/x-icon" rel="icon">

	<!-- default css to make the webpage look nearly the same on all browsers -->
    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
          type="text/css" rel="stylesheet" />

    <!-- css for this website  -->
    <link href="main.css" type="text/css" rel="stylesheet" />


</head>

<body>
    <h1>Humboldt Students of University Dating Website &hearts; </h1>
    <nav> <a href="index.html">Home</a> <a href="about.html">About</a> 
        <a href="profiles.php">View Profiles</a> <a href="current-user.php">Login/out & Account Info</a> 
        <a href="new-user.php">Sign up/Create Account</a> </nav>

    
    <?php
    /* user has yet to submit the form */
    if ($_SERVER["REQUEST_METHOD"] == "GET" || !isset($_COOKIE["cookieid"]) || $_SESSION["state"] == "new")
    {
    ?>
    <h2>Welcome, New User!</h2>
    <p> To create a new account, please fill in this form below. But, keep this in mind: 
        you must use your university username (but NOT your university password!) to create an account, 
        so we can use your university email to verify your account. Your email is not shown to other users 
        (unless you say so). It is used to verify that you are actually a student.
    </p>

    <form method="post" action="new-user.php" class="flexform">
        <fieldset>
            <legend>Required Info:</legend>
            <div>
                <label for="usrnm">Username:</label>
                <input type="text" name="username" id="usrnm" placeholder="abc123" />
            </div>

            <div>
                <label for="pswd">Password:</label>
                <input type="text" name="password" id="pswd" />
            </div>

        
            <div>
                <label for="perfilavailable">Do you want your profile to be publicly available 
                    (visible to those who are not logged in)?
                </label>
                <select name="profile-availability" id="perfilavailable">
                    <option value="y">Yes</option>
                    <option value="n" selected="selected">No</option>
                </select>
            </div>

        
            <div>
                <label for="emailavailable">Do you want your username to be visible to others on the website, 
                (whether they are logged in or not)?
                </label>
                <select name="hsu-email-availability" id="emailavailable">
                    <option value="y">Yes</option>
                    <option value="n" selected="selected">No</option>
                </select>
            </div>

            <div>
                <label for="edad">Please enter your age (must be at least 18):</label>
                <input type="number" name="age" id="edad" placeholder="20" min="18" max="99" step="1" />
            </div>

            <div>
                <label for="fnym">Please enter your first name:</label>
                <input type="text" name="fname" id="fnym" placeholder="Bob" />
            </div>
        </fieldset>
        <p>Other info may be added later, after your account is created.</p>


        <div>
        <input type="submit" value="Create Account" />
        </div>
    </form>
    <?php
        $_SESSION["state"] = "attempt";
    }   // end of if
    elseif($_SESSION["state"] == "attempt"){
        $username = striptags($_POST["username"]);  // sanitize input
        $passhash = password_hash($_POST["username"], PASSWORD_BCRYPT);     // hash password
        $profile_avail = striptags($_POST["profile-availability"]);
        $usrnm_vis = striptags($_POST["hsu-email-availability"]);
        $age = striptags($_POST["age"]);
        $fname = striptags($_POST["fname"]);

        



    }   // end of elseif
    ?>      


    <footer>
        <hr />
        <p>NOTE: This is NOT an official product/website/app of Cal Poly Humboldt, 
            this a Hackathon project by a student. &copy; 2023 Gracie Ceja </p>
    </footer>
</body>
</html>
