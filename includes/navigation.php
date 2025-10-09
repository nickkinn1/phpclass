<?php
$isHome = $_SERVER["REQUEST_URI"] == "/" ? "selected" : "";
$isLoops = $_SERVER["REQUEST_URI"] == "/loops/" ? "selected" : "";
$isCountdown = $_SERVER["REQUEST_URI"] == "/countdown/" ? "selected" : "";
$isMagic8Ball = $_SERVER["REQUEST_URI"] == "/magic-8ball/" ? "selected" : "";
$isDice = $_SERVER["REQUEST_URI"] == "/dice/" ? "selected" : "";
$isMovieList = $_SERVER["REQUEST_URI"] == "/movie-list/" ? "selected" : "";
$isCustomers = $_SERVER["REQUEST_URI"] == "/customers/" ? "selected" : "";

$svg = array("");
include $_SERVER['DOCUMENT_ROOT']."/images/svgs.php"

?><nav>
    <h1><a href="/">Nick's Website</a></h1>

    <ul>
        <li class="<?=$isHome?>"><a href="/"><?=$svg["home"]?><p>Home</p></a></li>
        <li class="<?=$isLoops?>"><a href="/loops"><?=$svg["loops"]?><p>Loops</p></a></li>
        <li class="<?=$isCountdown?>"><a href="/countdown"><?=$svg["countdown"]?><p>Countdown</p></a></li>
        <li class="<?=$isMagic8Ball?>"><a href="/magic-8ball"><?=$svg["magic"]?><p>Magic 8 Ball</p></a></li>
        <li class="<?=$isDice?>"><a href="/dice"><?=$svg["dice"]?><p>Dice</p></a></li>
        <li class="<?=$isMovieList?>"><a href="/movie-list"><?=$svg["movie"]?><p>Movie List</p></a></li>
        <li class="<?=$isCustomers?>"><a href="/customers"><?=$svg["customers"]?><p>Customers</p></a></li>

    </ul>
</nav>