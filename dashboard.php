<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboardstyle.css">
    <title>Dashboard</title>
</head>
<body>

<header>
    <div class="logo">
        <img src="logo.png" alt="Website Logo">
    </div>
    <div class="user-profile">
        <img src="avatar.png" alt="User Avatar">
        <span class="user-name">John Doe</span>
    </div>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</header>

<main>
    <div class="sidebar">
        <button id="button1" onclick="loadPage('page1.html')">Page 1</button>
        <button id="button2" onclick="loadPage('page2.html')">Page 2</button>
        <button id="button3" onclick="loadPage('page3.html')">Page 3</button>
        <button id="button4" onclick="loadPage('page4.html')">Page 4</button>
    </div>

    <div class="content">
        <iframe id="iframe" src="default.html" frameborder="0"></iframe>
    </div>
</main>

<footer>
    <p>About Us: Your Company Name</p>
</footer>

<script>
    function loadPage(url) {
        document.getElementById('iframe').src = url;
    }
</script>

</body>
</html>
