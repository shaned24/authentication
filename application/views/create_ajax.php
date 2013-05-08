
<div id="create_post_ajax" style="display:none;">


<?php echo form_open('welcome/createPost'); ?>
<form action="POST" 



        <div class="create-contents">
    			        
            <div class="title">
                
    			<input id='inputTitle' type="text" placeholder="Title" name="title" id="title"/>

                <div class="contents">
                
    			<textarea id="textarea"  placeholder="Contents..."name="contents"></textarea>

                </div>
                <input type="submit" id="submit_post" value="Submit"/>
            </div>

        </div>

<?php echo form_close(); ?>
</div>