<html>

<title>
    Are we nuts tonight
</title>

<head>

</head>

<body>

<h2>Create Post</h2>

<?php echo form_open('welcome/createPost'); ?>

<p>
    <label for="title">Title: </label></br>
    <input type="text" name="title" id="title"/>
</p>

<p>
    <label for="title">Contents: </label></br>
    <!--<input type="text" name="contents" id="contents" /> -->
    <textarea rows="10" cols="25" name="contents" id="contents"></textarea>
</p>

<p>

    <input type="submit" value="Submit"/>
</p>

<?php echo form_close(); ?>


</body>


</html>