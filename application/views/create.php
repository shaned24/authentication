<?php include('header.php'); ?>

<h2 style="color:white; font-family:verdana;">Create New Post</h2>

<?php echo form_open('welcome/createPost'); ?>



        <div class="create-contents">
    			        
            <div class="title">
                
    			<input id='inputTitle' type="text" placeholder="Title" name="title" id="title"/>

                <div class="contents">
                
    			<textarea id="textarea"  placeholder="Contents..."name="contents"></textarea>

                </div>
                <input type="submit" value="Submit"/>
            </div>

        </div>
    







    
</p>

<?php echo form_close(); ?>


<?php include('footer.php');?>