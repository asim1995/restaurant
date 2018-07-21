<!-- <html>
<body>
<form  name="contact_form" class="default-form" action="test.php" method="post" data-js-validate="true" data-js-highlight-state-msg="true">
                        <div class="form-group">
                            <label for="name">Name
                                    <span class="required">*</span>
                            </label>
                                    <input type="text" name="form_name" class="form-control" value="">
                        </div>
                          
                        <div class="form-group">
                             <label for="email">Email
                                     <span class="required">*</span>
                              </label>
                                    <input type="email" name="form_email" class="form-control required email" value="">
                        </div>
                         
                         <div class="form-group">
                                <label for="contact">Contact
                                    <span class="required">*</span>
                                </label>
                                    <input type="text" name="form_contact" class="form-control" value="" >
                         </div>
                       
                          <div class="form-group">
                                <label for="comment">Comment</label>
                                    <textarea name="form_comment" class="form-control textarea required" ></textarea>
                          </div>
                            
                         <div class="form-group">
                               <button class="btn" type="submit" name="submit" id="payBtn">Submit</button>  
                        </div>
                 </form> -->
<?php

    $Name=$_POST['name'];
	  $Email=$_POST['email'];
    $Subject=$_POST['subject'];
    $Message=$_POST['message'];

	require("classes/class.phpmailer.php");

	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail ->SMTPSecure = 'ssl';
  $mail ->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail ->IsHTML(true);// mail.smtp.com
	$mail->Username = "shaikhasim95@gmail.com";
	$mail->Password = "armaanmalik786!@#";
	$mail->SetFrom("shaikhasim95@gmail.com");
	$mail->Subject = "Enquiry";
    $mail->Body = " <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    
    }
    th, td {
    padding: 5px;
    text-align: left;    
    }
    </style>

    <table style='width:50%'>
    
    <tr><th>Name</th><td>$Name</td></tr>
    <tr><th>Email-Id</th><td>$Email</td></tr>
    <tr><th>Subject</th><td>$Subject</td></tr>
    <tr><th>Message</th><td>$Message</td></tr>
   
    
    </table> 
      ";
	$mail->AddAddress('shaikhasim95@gmail.com');   
   $pre_url = $_SERVER['HTTP_REFERER'];
if($mail->Send()) {
        echo "<script type='text/javascript'>
          location='$pre_url';
            </script>";
           // header('Location: Contact.html');
     
}
else{
    echo "<script type='text/javascript'>
          location='$pre_url';
            </script>";
}
?>
