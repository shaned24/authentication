<?php include('header.php'); ?>


<?php if (isset($rows)) foreach ($rows as $r) : ?>

    <div class="posts">
<div class="post-contents">
    	<div class="square" ><img class="profilePhoto" src="http://localhost/authentication/application/img/<?php echo $r->userIMG;?>"/></div>
        <img class="triangle" src=" http://localhost/authentication/application/img/triangle.png"></img>

        <div class="title">
            <h2><?php echo $r->title; ?></h2>
        </div>
            <div class="contents">
                <?php echo $r->contents; ?>
            </div>
        </div>


    </div>
    <br/>


<?php endforeach; ?>
<?php include ('footer.php'); ?>