<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Welcome to <?php Setting::get('system.schoolname') ?> Educational System.
        </title>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
        <style type="text/css">  
        @import url(http://fonts.googleapis.com/css?family=Metamorphous);
        h2#heading{
            font-family:'Metamorphous';
            color: #ccddss;
        }
        </style>
    </head>
    <body>
    <h2 id="heading">Welcome to <?php Setting::get('system.schoolname') ?>  Educational System.</h2>

    Hi <?php echo $fname.' '.$lname ?>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You have recently joined in our Online Educational Programme.
This educational programme provides you with facilities to submit assessments to your subjects.
You can contact us at anytime using this email address<a href="mailto:info@edlaraedu.com">info@edlara.com</a>
<br>
<?php
$url = Setting::get('app.url', 'https://laravel.dev/');
echo "<a href='".$url.'activateuser/'.$activation_code.'/'.$email."'>Click Here to Activate</a>";
?>
<p>Or</p>
<p>Copy and Paste following URL in Browser</p>
<?php
$url = Setting::get('app.url', 'https://laravel.dev/');
echo $url.'activateuser/'.$activation_code.'/'.$email;
?>
<br><p style="font-size:10px;">If You have not registered , it may be due to a typing error. Sorry for any inconveinience caused.</p>
<p style="align:right;">
    Thanks,<br>
    Edlara Team</p>
    </body>
</html>