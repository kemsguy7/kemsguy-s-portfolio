<?php include '../db.php'; ?>
<?php

  if(isset($_POST['submit']))  {

    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $subject = clean($_POST['subject']);
    $message = $name . "This is you message:" . "" .clean($_POST['message']);
    
    if(!empty($name) || !empty($email) || !empty($message) || !empty($message) ){

      

      echo "<script> alert('Form Validation Succesful and details submited Succesfully'); </script>";

/* For email sending
      $to = $email;
      $subject = $subject;
      $txt = $message;
      $headers = "From: mattidungafa@gmail.com" . "\r\n" .$email;

      mail($to,$subject,$txt,$headers); //send the mail */


    /*$query = "INSERT INTO messages(name, email, subject, message) VALUES ('$name','$email','$subject','$message')";

      $result = mysqli_query($connection, $query);

      if($result) {
        echo "<script> alert('insert query Succesfull! Please click ok to continue!'); </script>";
      //  header("Location: ../index.php");
      } else {
        echo "Failed to insert into database".mysqli_error($connection);
      } 
*/
    

    } else { //f any of the fields is empty, echo an error message
      echo"<script> alert('All fields are Required! Please click ok to continue and fill in all your details!'); </script>";
    } 

  }//end of if submit conditional

  

  

  function clean($string) { //This function sanitizes the strings to be sent
    global $connection;
    return trim(htmlspecialchars(mysqli_real_escape_string($connection, $string)));
  }
?>

