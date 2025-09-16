<?php
$isHome = $pageName == "home" ? "selected" : "";
$isLoops = $pageName == "loops" ? "selected" : "";
$isCountdown = $pageName == "countdown" ? "selected" : "";
?><nav>
    <ul>
        <li class="<?=$isHome?>"><a href="/">Home</a></li>
        <li class="<?=$isLoops?>"><a href="/loops">Loops</a></li>
        <li class="<?=$isCountdown?>"><a href="/countdown">Countdown</a></li>
    </ul>
</nav>