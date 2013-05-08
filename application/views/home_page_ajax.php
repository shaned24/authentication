<div id="posts_ajax" style="display:none">
<?php if (isset($rows)) foreach ($rows as $r) : ?>

    <div class="posts">
    <div class="post-contents">
    	<div class="square" ><img class="profilePhoto" src="http://localhost/authentication/application/img/<?php echo $r->userIMG;?>"/></div>
        <img class="triangle" src=" http://localhost/authentication/application/img/triangle.png"></img>

        <div class="title">
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
</div>