<?php include ('login-header.php'); ?>

    <div class="forms">
        <div class="forms-header">
            <h2>Login</h2>
        </div>


        <?php echo form_open('admin'); ?>

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
        <p>


        </p>

        <p>

        </p>
        <?php
        echo form_submit('submit', 'Login');
        echo anchor('admin/new_user', 'Create Account')
        ?>

        <?php echo form_close(); ?>
        <div class="errors"><?php echo validation_errors(); ?> </div>
    </div>
<?php include ('footer.php'); ?>