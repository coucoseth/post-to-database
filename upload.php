<?php
// isset() function checks wether our button to submit the form was actually clicked or not
/* make sure the word "submit" inside ** isset($_POST["submit"]) ** below matches the word you
used via the name attribute of our button in the index.php file
*/
if(isset($_POST["submit"])) {

    // connect to database
    include_once "db_connection.php";

    //pick data from the form
    /* we use ** stripcslashes() ** and ** mysqli_real_escape_string() ** functions below for security, 
    to prevent sql injection
    */
    $texts = stripcslashes($_POST['texts']);
    /* the word "texts" in ** stripcslashes($_POST['texts']); ** must match the word in the name attribute
    of the form element whose data we want to pick
    */
    $email = stripcslashes($_POST['email']);
    $password = stripcslashes($_POST['password']);
    $choose = stripcslashes($_POST['choose']);
    $message = stripcslashes($_POST['message']);

    $texts = mysqli_real_escape_string($conn,$_POST['texts']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $choose = mysqli_real_escape_string($conn,$_POST['choose']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    //for more security lets encrypt our password instead of sending plain text to database
    $password = md5($password);

    //get the file for upload
    $file_name = $_FILES["upload"]["name"];
    $upload_folder = "uploads/";
    $upload_file_dir = $upload_folder . basename($file_name);

    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $upload_file_dir)) {
        //if file is uploaded successfully then lets store the information to database
        $sql="INSERT INTO posts(smalltext,email,passwords,selectoption,textarea,files) 
        VALUES('$texts','$email','$password',$choose,'$message','$file_name')";
        mysqli_query($conn,$sql);

        header('location: index.php?post=success');
        exit();
    
    } else {
        //when file upload has failed redirect to page with error message in url
        header('location: index.php?post=fileuploadfailed');
	exit();
    }
    
}else{
    //if submit button was not clicked redirect to page with error message in url
    header('location: index.php?post=notclicked');
	exit();
}
?>