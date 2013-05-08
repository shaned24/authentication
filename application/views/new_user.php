<link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/signup.css">


<div class="signup-form">
    <div class="forms-header"><h2>Create a new account</h2></div>

<?php echo form_open('admin/new_user'); ?>




<fieldset> 
    <legend>Personal Information</legend>   
    <?php echo form_input('first_name', '', 'id="first_name" class="fields", placeholder="First Name"');?></td>
    <?php echo form_input('last_name', '', 'id="last_name" class="fields", placeholder="Last Name"');?></td>
</fieldset>
<fieldset>
    <legend>Login Info</legend>
    <?php echo form_input('email_address', '', 'id="email_address" class="fields", placeholder="Email Address"');?></td>
    <?php echo form_password('password', '', 'id="password" class="fields", placeholder="Password"');?></td>
    <?php echo form_password('comfirm_password', '', 'id="confirm_password" class="fields", placeholder="Confirm Password"');?></td>
</fieldset>


    <?php echo form_submit('submit', 'Create Account', 'id="submit"');
    echo anchor('admin/index', 'Back')
    ?>

    <?php echo form_close(); ?>

<div class="errors"><?php echo validation_errors(); ?> </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function () {
 /* $('#submit').click(function() {
    
    var name = $('#first_name').val();
    
    if (!name || name == 'First Name') {
        alert('Please enter your name');
        return false;
    }
    })
  var firstTime = 0;
  var firstname = $("#first_name").val(),
      firstname1 = $("#first_name"),
      lastname = $("#last_name"),
      email = $("#email_address"),
      password = $("#password"),
      confirm_password = $("#confirm_password");
   
//clear text from fields
  $('.fields').on("click",function()
    {
       
        var textBoxContents = $(this).val(),
        textBox = $(this);
        if(firstTime == 0)
        {
        $(textBox).val("").css("color","black");
        firstTime = 1;
        }

        $(textBox).on("focus", function()
        {
            console.log(this);
            if($(textBox).val() == textBoxContents)
            {
                $(textBox).val("").css("color","black");
            }
        })

       $('.fields').on("blur", function(){
            if($(textBox).val() == "")
            {
                $(textBox).val(textBoxContents).css("color","grey");
                firstTime = 0;
            }
        })
   });*/


/*$.each( ['a','b','c'], function(i, l){
   alert( "Index #" + i + ": " + l );
 });*/
    

</script>
<?php include('footer.php'); ?>