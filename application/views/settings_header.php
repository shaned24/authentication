<html>

<title>Snacks</title>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/posts.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/settings.css">


</head>
<body>
    <div id="fixedc">

        <ul id="nav">

            <li><?php echo anchor("welcome/index/", 'Home','class="transition"'); ?></li>            
            <li><?php echo anchor("welcome/myBlog/", 'My Blog','class="transition"'); ?></li>
            <li><?php echo anchor("welcome/myBlog/", 'Projects','class="transition"'); ?></li>
            <li><?php echo anchor("welcome/myBlog/", 'Music','class="transition"'); ?></li>

        </ul>
            <a class="login-info">Welcome: <?php echo $_SESSION['username']; ?></a>
            <?php echo anchor("welcome/create/", 'Create Post','class="create-post"'); ?>
            <?php echo anchor("profile/settings/", 'Settings','class="settings"'); ?>
            <a class="login-button" href='../admin/logout'>Logout</a>

    </div>

    <div id="container">
    <div id="heading"></div>
    <div id="underheadingSettings">