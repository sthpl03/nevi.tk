<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d3af94a0a4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel='icon' href='../images/Nevi.ico'>
    <meta name='theme-color' content='#007ed3'>
    <meta property='og:site_name' content='Nevi'>
    <meta property='og:title' content='Nevi - Manage, moderate and customize'>
    <meta property='og:image' content='https://nevi.tk/images/Nevi.png'>
    <meta property='og:description' content='Nevi is a discord bot that will let you customize, moderate and manage your discord server to your liking and provides you a lot of features and commands that you can use for either server or general purposes.'>
    <meta name='description' content='Nevi is a discord bot that will let you customize, moderate and manage your discord server to your liking and provides you a lot of features and commands that you can use for either server or general purposes.'>
    <meta name='keywords' content='discord bot that can delete messages, discord bot to assign roles, discord bot that can change nicknames, nevi discord bot, nevi bot, nevi'>
    <script src="https://hcaptcha.com/1/api.js?onload=captchaLoad&render=explicit" async defer></script>
    <title>Nevi - Verification</title>
</head>
<body class='darkMode'>
    <nav>
        <p>Nevi</p>
        <button id='menu'><i class="fas fa-bars"></i></button>
        <ul id='nav-links'>
            <li><a href='../'>Home</a></li>
            <li><a href="../invite">Invite</a></li>
            <li><a href="../commands">Commands</a></li>
        </ul>
    </nav>
    <div class="verification">
        <?php
            $dbHost = 'localhost';
            $dbUser = 'root';
            $dbPassword = '';
            $database = 'nevi';

            $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $database);
            $token = $_GET['token'];
            $escapedToken = mysqli_real_escape_string($conn, $token);
            $verifications = mysqli_query($conn, 'SELECT * FROM verification WHERE token = \''.$escapedToken.'\'');

            if(!mysqli_num_rows($verifications)) echo '<div id=\'invalid\'><i class="fas fa-times-circle"></i><p>Invalid or expired token.</p></div>';
        ?>
        <form name='verify-form' action="http://test-domain.com:4000" method='POST'>
            <h1>Verification</h1>
            <p>This is a verification process used to prevent bots by checking whether you're a human or not with a captcha... Beep Boop?</p>
            <div id='h-captcha'></div>
            <?php
                function clean($string) {
                    $string = str_replace(' ', '-', $string);
                    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                }
                
                if($token) echo '<input type=\'hidden\' name=\'token\' value=\''.clean($token).'\'>';
            ?>
            <button type='submit'>Verify</button>
            <a href='../'>Go back home</a>
            <p id='warning'>Please complete the captcha.</p>
        </form>
    </div>
    <footer>
        <img src='../images/Nevi.svg' alt='Nevi'>
        <div class="box">
            <h2>Links</h2>
            <ul>
                <li><a href="../invite">Invite Me!</a></li>
                <li><a href="https://top.gg/bot/703042010352713729/vote">Vote Me!</a></li>
                <li><a href="https://discord.gg/HErGxFK">Community & Support Server</a></li>
                <li><a href="https://top.gg/servers/685975487109136385/vote">Vote The Server!</a></li>
            </ul>
        </div>
        <div class="box">
            <h2>Options</h2>
            <ul>
                <li><p>Dark Mode</p></li>
                <li><label class='toggle'><input type="checkbox"><span class='slider'></span></label></li>
            </ul>
        </div>
    </footer>
    <script src='../js/darkMode.js'></script>
    <script src='../js/navbar.js'></script>
    <script src='./js/validate.js'></script>
</body>
</html>