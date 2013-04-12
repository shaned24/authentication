<?php include('header.php'); ?>

<body>

<?php  if (isset($rows)) foreach ($rows as $r) : ?>

    <div class="posts">
        <div class="post-contents">
            <div class="square" ><img class="profilePhoto" src="http://localhost/authentication/application/img/<?php echo $r->userIMG;?>"/></div>
            <img class="triangle" src=" http://localhost/authentication/application/img/triangle.png"></img>
            <div class="title">
                <h2><?php echo $r->title; ?></h2>        
                <div class="contents">
                <?php echo $r->contents; ?>
                </div>
            </div>
        </div>

        <?php echo anchor("welcome/deletePost/" . $r->id, 'Delete Post','class="deletePost"'); ?>
        <?php echo anchor("welcome/edit/" . $r->id, 'Edit Post','class="editPost"'); ?>
    </div>
    <br/>

<?php endforeach; ?>

<?php include ('footer.php'); ?>