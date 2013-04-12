<html>

<title>
    Are we nuts tonight
</title>

<head>

</head>

<body>

<h2>Edit Post</h2>

<?php echo form_open('welcome/editPost/' . $a); ?>
<p>
    <?php
    echo form_label('title:', 'title');
    echo form_input('title', $b, 'id="title"');
    ?>
</p>

<p>
    <?php
    echo form_label('Contents:', 'contents');
    echo form_input('contents', $c, 'id="contents"');
    ?>
</p>

<p>
    <?php
    echo form_submit('submit', 'Submit');
    ?>
    <?php echo form_close(); ?>


</body>


</html>