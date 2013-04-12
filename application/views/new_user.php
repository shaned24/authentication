<link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/signup.css">


<div class="signup-form">
    <div class="forms-header"><h2>Create a new account</h2></div>

<?php echo form_open('admin/new_user'); ?>


<table class="signup">
<tr>
    <td><?php echo form_label('Enter your first name:', 'first_name');?></td>
    <td><?php echo form_input('first_name', '', 'id="first_name"');?></td>
</tr>

<tr>
    <td><?php echo form_label('Enter your last name:', 'last_name');?></td>
    <td><?php echo form_input('last_name', '', 'id="last_name"');?></td>
</tr>

<tr>
    <td><?php echo form_label('Enter your email address:', 'email_address');?>
    <td><?php echo form_input('email_address', '', 'id="email_address"');?></td>
</tr>

<tr>
    <td><?php echo form_label('Enter your password password:', 'password');?></td>
    <td><?php echo form_password('password', '', 'id="password"');?></td>
</tr>

<tr>
    <td><?php echo form_label('Please confirm your password:', 'confirm_password');?></td>
    <td> <?php echo form_password('comfirm_password', '', 'id="confirm_password"');?></td>

</tr>
</table>
<p>
    <?php echo form_submit('submit', 'Create Account');
    echo anchor('admin/index', 'Back')
    ?>
    <?php echo form_close(); ?>

<div class="errors"><?php echo validation_errors(); ?> </div>

</div>
<?php include('footer.php'); ?>