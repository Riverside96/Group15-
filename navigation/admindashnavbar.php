<!DOCTYPE html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Navbar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="admindashnavbar.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">

    </head>
    <body>

    <div class="navbar">
        <header>
            <a class="logo" href="/"><img src="../images/logo.svg" width="45" height="45" alt="logo"></a>
            <a class="logo2" href="/"><img src="../images/alpha.svg" width="60" height="60" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="../pages/adminviewticket.php" class="link1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tickets</a></li>
                    <li><a href="#" class="link2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metrics</a></li>
                    <li><a href="../pages/accounts.php" class="link3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accounts</a></li>
                    <li><a href="#" class="link4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Settings</a></li>
                </ul>
            </nav>
            <a class="cta" href="../pages/home.php">&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>
            <p class="menu cta">Menu</p>
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Services</a>
                <a href="#">Projects</a>
                <a href="#">About</a>
            </div>
        </div>
    </div>

    </body>
</html>