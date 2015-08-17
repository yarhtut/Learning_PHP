<?php require_once("includes/header.php");?>
<?php

    if($session->is_signed_in()){
        redirect("index.php");
    }

    if(isset($_POST['submit'])){
        $user_name = trim($_POST['user_name']);
        $user_password = trim($_POST['user_password']) ;

        /// Method to check database user
        $user_found = User::verify_user($user_name,$user_password);

        if($user_found){
            $session->login($user_found);
            redirect("index.php");
        }else{
            //will put in in the login Form this variable
            $the_message = "Your username and password are incorrect.";
            redirect("");
        }
        }
    //main ifstatement else
    else{
            $the_message="";
            $user_name = "";
            $user_password = "";

    }
?>
<div class="col-md-4 col-md-offset-3">
   <a class="anchor" href="../index.php"><em> >> back to the main website</em></a>
    <div class="bs-callout bs-callout-danger">
        <h4 class="bg-danger"><?php echo $the_message;?></h4>
    </div>


    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label class="text-info" for="username">Username</label>
            <input type="text" class="form-control" name="user_name" value="<?php echo htmlentities($user_name);?>" >

        </div>

        <div class="form-group">
            <label class="text-info" for="password">Password</label>
            <input type="password" class="form-control" name="user_password" value="<?php echo htmlentities($user_password);?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>
