<?php include('header.php'); ?>

<h2>Edit Post</h2>




<?php echo form_open('welcome/editPost/' . $a); ?>
 <div class="create-contents">
                        
            <div class="title">
                <label for="title">Title: </label></br>
                <input style="display:none;" type="text" value="<?php echo $a;?>" name="id" />
                <input id='style' type="text" value="<?php echo $b;?>" name="title" />

                <div class="contents">
                
                    <label for="title" >Contents: </label></br>
    <!--<input type="text" name="contents" id="contents" /> -->
                <textarea id="style" name="contents"><?php echo $c;?></textarea>

                </div>
                <input type="submit" value="Submit"/>
            </div>

        
        <?php echo form_close(); ?>