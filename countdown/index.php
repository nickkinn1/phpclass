<?php

//Time Math.
$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;

//Current Time in seconds.
$now = time();

//End of semester time in seconds.
$endOfSemester = mktime(12, 0, 0, 12, 20, 2025);

//# of seconds between now and end of semester.
$seconds = $endOfSemester - $now;

//# of Years
$years = floor($seconds/$secPerYear);
$seconds = $seconds - ($years * $secPerYear);

//# of Days
$days = floor($seconds/$secPerDay);
$seconds = $seconds - ($days * $secPerDay);

//# of Hours
$hours = floor($seconds/$secPerHour);
$seconds = $seconds - ($hours * $secPerHour);

//# of Minutes
$minutes = floor($seconds/$secPerMin);
$seconds = $seconds - ($minutes * $secPerMin);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nick's Website</title>
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
    <div class="content">
        <?php include "../includes/navigation.php"; ?>
        <main class="countdown-page">
            <h2>Countdown to end of semester</h2>
            <section class="countdown">
                <div>
                    <p><?=$years?></p>
                    <p>Years</p>
                </div>

                <div>
                    <p><?=$days?></p>
                    <p>Days</p>
                </div>

                <div>
                    <p><?=$hours?></p>
                    <p>Hours</p>
                </div>

                <div>
                    <p><?=$minutes?></p>
                    <p>Minutes</p>
                </div>

                <div>
                    <p><?=$seconds?></p>
                    <p>Seconds</p>
                </div>
            </section>
            <!-- <h3>| Years <?=$years?> | Days <?=$days?> | Hours <?=$hours?> | Minutes <?=$minutes?> | Seconds <?=$seconds?> |</h3> -->
        </main>
    </div>
    <?php include "../includes/footer.php"; ?>
</body>
</html>