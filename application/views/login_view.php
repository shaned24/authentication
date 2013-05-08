<?php include ('login-header.php'); ?>
<style>
#form_message{
  display:none;
  text-align:center;
  margin-left:40px;
  margin-top:-400px;
  padding:10px;
  background: red;
  width : 400px;
  -webkit-border-radius:40px;

}

</style>
<link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/signup.css">
<div id="insert"></div>
    <div class="forms">
        <div class="forms-header">
            <h2>Login</h2>
        </div>

<!-- ............................................This is the login form............................................. -->
        <?php echo form_open('admin/login'); ?>
        <fieldset>
            <legend>Login Credentials</legend>
        <table class="table">
            <tr>
                <td><?php echo form_label('Email Address:', 'email_address');?></td>
                <td><?php echo form_input('email_address', set_value('email_address'), 'id="email_address"');?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Password:', 'password');?></td>
                <td><?php echo form_password('password', '', 'id="password"');?></td>
            </tr>
        </table>
        </fieldset>
        
        <?php
        echo form_submit('submit', 'Login' , 'id="login_submit"');
        echo anchor('#', 'Create Account', "class='new_account'");
        ?>

        <?php echo form_close(); ?>
        <div class="errors"><?php echo validation_errors(); ?> </div>
    </div>

<div class="signup-form">
    <div class="forms-header"><h2>Create a new account</h2></div>


<!-- .......................This is the signup form............................................................. -->

<form id="myForm" action="post" name="new-user">
<fieldset> 
    <legend>Personal Information</legend>  
    <input type="text" id="first_name" class="fields" placeholder="First Name"/>
    <input type="text" id="last_name" class="fields" placeholder="Last Name"/>
    
</fieldset>

<fieldset>
    <legend>Login Info</legend>
    <input type="text" id="email_address" class="fields" placeholder="Email Address"/>
    <input type="password" id="password" class="fields" placeholder="Password"/>
    <input type="password" id="confirm_password" class="fields" placeholder="Confirm Password"/>
    
</fieldset>
    <input type="submit" id="submit_data" value="Create Account"/>
    <a href="#" class="back" >Back</a>

    </form>

<div class="errors"><?php echo validation_errors(); ?> </div>

</div>
    <div id="form_message"></div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function ()
{
    var signup_form = $(".signup-form");
    signup_form.hide();
    var create_new = $(".new_account"),
        back = $(".back");

    create_new.on("click", function (e)
    {
        e.preventDefault();
        $(".forms").slideUp(300);
        signup_form.insertAfter("div#insert").slideDown(300);
    });

    back.on("click", function(e)
    {
        e.preventDefault();
        signup_form.slideUp(300);
        $(".forms").slideDown(300);
        $("#form_message").fadeOut(300);

    });
    
    $("#submit_data").on("click" , function()
    {
        
        var form_data = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email_address: $('#email_address').val(),
            password: $('#password').val(),
            confirm_password: $('#confirm_password').val()              
        };
       
     /*   if(form_data.first_name == "")
        {
            $("#first_name").css("border", "solid 1px red").fadeIn(2000);
            return false;
        }*/
        // AJAX CALL RIGHT HERE YO
        $.ajax(
        {
            url: " http://localhost/authentication/index.php/admin/new_user",
            type: 'POST',
            dataType: "text",           
            data: form_data,                  
            success: function(data) 
            {
                console.log(data);
               
                              
                $("#form_message").html(data).css({'background-color' : data.bg_color},{'width' : '500px'}).fadeIn('slow');
                console.log("sweet games");
                
                if(data == "Created Account Sucessfully.")
                {
                $(".signup-form").slideUp(300);
                $(".forms").slideDown(300);
                }
            }
        }); 
        return false;
       /* $.post("admin/new_user", form_data, function(r) {
            //do something with r... log it for example.
            console.log(r);
        });*/
        
    });

});

</script>
