
<?php

//check if user coming from A request
   if ($_SERVER['REQUEST_METHOD']=='POST') {

      //assign variabes
    $user =filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $mail=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $mobile=filter_var($_POST['mobile'],FILTER_SANITIZE_NUMBER_INT);
    $message=filter_var($_POST['message'],FILTER_SANITIZE_STRING);
    echo $user;
    

        
   $formErrors =array();

       if(strlen($user) <= 3  ){
        $formErrors[] ='Username must be not <strong> Empty</strong> ';

      }

      if(strlen($message) <= 10  ){
        $formErrors[] ='message must be not <strong> Empty</strong>  ';

      }

      if(strlen($mail) <= 10  ){
        $formErrors[] ='mail must be not <strong> Empty</strong>  ';

      }
        $headers='from'.$mail.'\r\n'; 
      // no error send email mai(to,subject,message,from) to use it need smtp progrm like fiezille
      if(empty($formErrors)){

        mail('mahmoudatif22@gmail.com', 'contact form', $message,$headers);
        $user='';
        $mail='';
        $mobile='';
        $message='';
        $sucess='<div class="alert alert-success">we have recived your sms</div>';
      }

}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- internet e-->
	<meta name="viewport" content="width=device-width,initial-scale=1"><!-- mobile -->
        <title>contact form</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet"  href="css/contact.css">
        
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/.../css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/.../font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900,900i" rel="stylesheet">
        
    </head>
    <body>   
         <!-- start form -->
        <div class="container">
           
            <h1 class="text-center">Contact Me</h1>
           
        
          <form class="contact-form"  method="POST" action="<?PHP echo $_SERVER['PHP_SELF']?>" >
              
          <?php

              if (! empty( $formErrors)) {  ?>
              <div class="alert alert-danger"  role="start">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> 
                
                <?php
                foreach($formErrors as $errors) {
                    echo $errors . '<br>';
                }
                ?>
               </div>
            <?php  }?>
            <?php if (isset($sucess)) {//mail
              echo "sucess";
            } ?>
              <div class="form-group">
                  <input class=" username form-control" type="text" name="username" placeholder="Type your username" value="<?php if(isset($user)){
                    echo$user;
                  } ?>">
                  <i class="fa fa-user fa-fw"></i>
                  <span class="asterisx">*</span>
                  <div class="alert alert-danger custom-alert">
                    Username must be larger than <strong> 3</strong> characters
                  </div>
              </div>
              <div class="form-group">
                 <input class="email form-control" type="email" name="email" placeholder="Type your email" value="<?php if(isset($mail)){
                    echo$mail;} ?>">   
                 <i class="fa fa-envelope fa-fw"></i>
                 <span class="asterisx">*</span>
                 <div class="alert alert-danger custom-alert">
                    Email cannot be <strong>Empty</strong> 
                  </div>
            </div>

            <input class="form-control" type="text" name="mobile" placeholder="Type your mobile" value="<?php if(isset($mobile)){
                    echo$mobile;} ?>">  
            <i class="fa fa-phone fa-fw"></i>
            <div class="form-group">
            <textarea 
            class=" message form-control" name="message" placeholder="your message..!"><?php if(isset($message)){
                    echo $message;} ?></textarea>
                    <div class="alert alert-danger custom-alert">
                      Message cann't be less than 10 characters 
                    </div>
            </div>
            <input class=" btn btn-success " type="submit" value="send message" name="submit"/>
              <i class="fas fa-hand-point-right send-icon"></i>

          </form>      
        
        
        </div>
        
        
        
         <!-- end form -->
        
        
        
        
        
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        
    </body>
</html>



