
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="couco seth">
    <title>Post data to database</title>


    <!-- Bootstrap core CSS -->
<link href="bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet" >


  </head>
  <body>

  <div class="container mt-5">
  <div class="row">

    <div class="col-3">
      <!-- this div creates empty space to the left of the form -->
    </div>

    <div class="col-6">
<!-- space to display message after submit button is clicked -->
<?php
/* beginners in php are advised to skip this code from start of ** <?php ** to end tag ** ?> **
let this be the last piece of code you read.
Advised to skip and go to beginning of ** <form> ** tag
*/
            // put the url in a variable since it also consists of feedback message from upload.php file
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "post=success") == true){
                    echo '<div class="alert alert-success" role="alert" >Successfully posted to database</div>';
                }else if(strpos($fullUrl, "post=fileuploadfailed") == true){
                    echo '<div class="alert alert-danger" role="alert">File Upload Failed, Try again later</div>';
                }else if(strpos($fullUrl, "post=notset") == true){
                    echo '<div class="alert alert-danger" role="alert">Click Submit Button to continue</div>';
                }
    // end of php tag
 ?>

<!-- start of our data form -->
    <form class="form-signin" action="upload.php" method="post" enctype="multipart/form-data">
<!-- in the form tag, the enctype="multipart/form-data" allows file upload, without that line we
wont be able to upload files -->
<!-- the "action" attribute in the form tag specifies that the data picked should be redirected 
to the upload.php file for processing -->
  <h1 class="h3 mb-2 font-weight-normal">Post data from various form elements easily</h1>
  <label class="col-form-label">Small text</label>
  <input type="text" name="texts" class="form-control mb-1" placeholder="couco seth" required autofocus>
  <!-- every form element has to have a name attribute because php uses this attribute to know that specific
   data belongs to an element when picking all the data from a form -->
  <label class="col-form-label">Email address</label>
  <input type="email" name="email" class="form-control mb-1" placeholder="Email address" required>
  <label class="col-form-label">Password</label>
  <input type="password" name="password" class="form-control mb-1" placeholder="Password" required>
  <label class="col-form-label">Select option</label>
  <select name="choose" class="custom-select mb-1">
  <option selected>Select an option...</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
<label class="col-form-label">Text area</label>
<textarea name="message" class="form-control mb-1" placeholder="write some large data" rows="4"></textarea>
<label class="col-form-label">File(image,document,pdf,music,video)</label>
<input type="file" name="upload" class="form-control-file mb-1">
  <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Post to database</button>

</form>
<!-- end of our data form -->

    </div>

    <div class="col-3">
      <!-- this div creates empty space to the right of the form -->
    </div>

    <!-- end of .row -->
  </div>
  <!-- end of .container -->
</div>

</body>
</html>
