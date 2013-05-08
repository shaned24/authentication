<?php include('header.php'); ?>


<?php if (isset($rows)) foreach ($rows as $r) : ?>

    <div class="posts">
    <div class="post-contents">
    	<div class="square" ><img class="profilePhoto" src="http://localhost/authentication/application/img/<?php echo $r->userIMG;?>"/></div>
        <img class="triangle" src=" http://localhost/authentication/application/img/triangle.png"></img>

        <div class="title">
            <div class="postDelete">
                    <?php
                    if(isset($_SESSION['uid']) && $_SESSION['uid'] == $r->uid )
                    {
                     echo anchor("welcome/edit/" . $r->id, '<img src="http://localhost/authentication/application/img/editpen.png"/>');     
                     echo anchor("welcome/deletePost/" . $r->id, '<img src="http://localhost/authentication/application/img/thrash.png"/>');
                    }
                    ?> 
                </div> 
            <div class="author"><a><?php echo $r->first_name, " ", $r->last_name; ?></a></div>
            <h2><?php echo $r->title; ?></h2>
        
            <div class="contents">
                <?php echo $r->contents; ?>
            </div>
        </div>
        </div>


    </div>
    <br/>


<?php endforeach; ?>
<?php include ('footer.php'); ?>