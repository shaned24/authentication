<html>

<title>Snacks</title>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/authentication/application/css/posts.css">


</head>
<body>
    <div id="fixedc">

        <ul id="nav">
            <li><a href="index" class="transition">Home</a></li>
            <li><a href="myBlog" class="transition">My Blog</a></li>
            <li><a href="class" class="transition">kaad</a></li>
            <li><a href="index" class="transition">Blog</a></li>

        </ul>
            <a class="login-info">Welcome: <?php echo $_SESSION['username']; ?></a>
            <a class="create-post" href='create'>Create Post</a>
            <a class="login-button" href='../admin/logout'>Logout</a>

    </div>

    <div id="container">
    <div id="heading"></div>
    <div id="underheading">