<?php

// filter the input to help avoid XSS
foreach ($_SERVER as $key => $value) {
    $_SERVER[$key] = filter_input(INPUT_SERVER, $key, FILTER_SANITIZE_STRING);
}
 

$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

if ( isset($_SERVER['REDIRECT_QUERY_STRING']) && strtolower(str_replace('/', NULL, $_SERVER['REDIRECT_QUERY_STRING'])) == 's' ) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/plain");
    print $ip;
    exit;
}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0">
        <title>Can I Haz IP</title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="author" content="Alan Wynn">
        <link rel="author" href="https://plus.google.com/115740274620323745694">
        <meta name="apple-mobile-web-app-title" content="Can I Haz IP">
        <style type="text/css">
            * { margin, padding: 0; }

            body {
                background-color: #474747;
                margin: 70px;
            }

            h1 a {
                display: block; text-decoration: none;
                font: 90px Helvetica, Arial, Sans-Serif; letter-spacing: -5px;
                text-align: center;
                color: #999; text-shadow: 0px 3px 8px #2a2a2a;
             }
                h1 a:hover {
                    color: #a0a0a0; text-shadow: 0px 5px 8px #2a2a2a;
                }

            h2 {
                font: 15px Tahoma, Helvetica, Arial, Sans-Serif;
                text-align: center;

                color: #222; text-shadow: 0px 2px 3px #555;
            }
            h2 a {
                    font: 15px Tahoma, Helvetica, Arial, Sans-Serif;
                    text-align: center;

                    color: #222; text-shadow: 0px 2px 3px #555;
            }
                h2 a:hover {
                    color: #a0a0a0; text-shadow: 0px 5px 8px #2a2a2a;
                }

            pre {
                width: 500px; margin: 0 auto; background: #222; padding: 20px;
                font-size: 22px; color: #555; text-shadow: 0px 2px 3px #171717;

                -webkit-box-shadow: 0px 2px 3px #555;
                -moz-box-shadow: 0px 2px 3px #555;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
            }

            .container {
                display: block;
                margin: auto;
                position: absolute;
                top: 0; left: 0; bottom: 0; right: 0;
                height: 300px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1><a>Canihazip.com</a></h1>
            <pre><center>IP: <?= $ip ?></center></pre>
            <br /></br />
            <h2><a href="./s">Simpler Version</a> for Scripts and Slow Connections</h2>
        </div>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-43083558-1', 'canihazip.com');
            ga('send', 'pageview');
        </script>
    </body>
</html>
