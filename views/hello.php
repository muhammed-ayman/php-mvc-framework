<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro page</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <nav>
        <a class="logo" href=""><img src="assets/logo.svg" alt=""></a>
        <img id="menu" src="assets/icon-menu.svg" alt="">
        <ul class="nav-list" id="navbar">
            <img class="close-nav" src="assets/icon-close-menu.svg" alt="" id="close-btn">
            <li class="nav-item">
                <a href="#" id="features">Features <img src="assets/icon-arrow-down.svg" alt="" id="feature-arrow"></a>
                <ul class="nav-item-list" id="features-list">
                    <li class="item-inside">
                        <a href=""><img src="assets/icon-todo.svg" alt=""><span>Todo List</span> </a>
                    </li>
                    <li class="item-inside"><a href=""><img src="assets/icon-calendar.svg" alt=""><span>Calendar</span>
                        </a></li>
                    <li class="item-inside"><a href=""><img src="assets/icon-reminders.svg"
                                alt=""><span>Reminders</span> </a></li>
                    <li class="item-inside"><a href=""><img src="assets/icon-planning.svg" alt=""><span>Planning</span>
                        </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" id="companies">Company <img src="assets/icon-arrow-down.svg" alt="" id="company-arrow"></a>
                <ul class="nav-item-list" id="companies-list">
                    <li class="item-inside"><a href="">History</a></li>
                    <li class="item-inside"><a href="">Our Team</a></li>
                    <li class="item-inside"><a href="">Blog</a></li>
                </ul> 
            </li>
            <li class="nav-item">
                <a href="">Careers</a>
            </li>
            <li class="nav-item">
                <a href="">About</a>
            </li>
            <ul class="nav-list-right">
                <li class="nav-item"><a href="">Login</a></li>
                <li class="nav-item"><button>Register</button></li>
            </ul>
        </ul>
        
    </nav>
    <header>
        <div class="hero-desc">
            <h1 class="hero-h">Make remote work</h1>
            <p class="hero-p">Get your team in sync, no matter your location. Streamline processes, create team rituals, and watch productivity soar.</p>
            <button class="hero-btn">Learn more</button>
            <div class="logos-list">
                <img src="assets/client-databiz.svg" alt="">
                <img src="assets/client-audiophile.svg" alt="">
                <img src="assets/client-meet.svg" alt="">
                <img src="assets/client-maker.svg" alt="">
            </div>
        </div>
        <img src="assets/image-hero-desktop.png" alt="" class="hero-img">
        <img src="assets/image-hero-mobile.png" alt="" class="hero-img-mobile">
    </header>
    <script src="script.js"></script>
</body>
</html>