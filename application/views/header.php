<html>

<title>Snacks</title>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://localhost/authentication/application/js/settings.js"></script>
    <script src="http://localhost/authentication/application/js/ajaxfileupload.js"></script>
    <script src="http://localhost/authentication/application/js/pageLoader.js"></script>
</head>
<body>

  <!--  <div id="fixedc">

        <ul id="nav">

            <li><?php echo anchor("welcome/index/", 'Home','class="transition"'); ?></li>            
            <li><?php echo anchor("welcome/myBlog/", 'My Blog','class="transition"'); ?></li>
            <li><?php echo anchor("welcome/myBlog/", 'Projects','class="transition"'); ?></li>
            <li><?php echo anchor("welcome/myBlog/", 'Music','class="transition"'); ?></li>

        </ul>
            <a href='../welcome/myBlog' class="login-info"><?php echo $_SESSION['username']; ?></a>
            <?php echo anchor("welcome/create/", 'Create Post','class="create-post"'); ?>
            <?php echo anchor("profile/settings/", 'Settings','id="settingsButton"'); ?>
            <a class="login-button" href='../admin/logout'>Logout</a>

        </div>-->

        <div id="fadeDiv">

            <div id="loadedContent">
                <a href="#" id="closeLoadedContent">Close</a>
            </div>
        </div>
        <div id="container">

            
            <div id="underheadingWrap"><div id="siteHeading"></div></div>
            <div id="underheading" style="position:relative;">


                <div id="header">
                    <div id="navigatebar">
                        <li class="header headeridle" ><?php echo anchor("welcome/index/", 'Home','class="transition"'); ?></li>
                        <li class="header headeridle"><?php echo anchor("welcome/myBlog/", 'My Blog','class="transition"'); ?></li>
                        <li class="header headeridle"><?php echo anchor("welcome/myBlog/", 'Projects','class="transition"'); ?></li>
                        <li class="header headeridle"><?php echo anchor("welcome/myBlog/", 'Music','class="transition"'); ?></li>


                    </div>


                    <?php echo anchor("welcome/create/", 'Create Post','id="create_post" class="create-post"'); ?>
                    <?php echo anchor("profile/settings/", 'Settings','id="settingsButton"'); ?>
                    <a class="login-button" href='../admin/logout'>Logout</a>
                </div>

                <div id="profileheader">
                    <div id="currentLoginWrap"><a id="currentLogin"><?php echo $_SESSION['username'];?></a></div>
                </div>

                <div id="postContainer">
                    
                 <div id="settingsDropdown">
                    <a href="#" id="closeSettings">Close</a>
                    <div id="settingsBox"></div>

                </div>         

