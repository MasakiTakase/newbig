<?php

setlocale(LC_ALL,'ja_JP.UTF-8');
ini_set( 'display_errors', 0 );//エラー非表示
const SENDTO_EMAIL = "businessprogram.jx@gmail.com";//送信先
const FROM_EMAIL = "businessprogram.jx@gmail.com";//発信元
const FROM_NAME = 'ビジネス研修プログラム JX';//発信者名

if($_POST['mode']=='send'):

    include('./qdmail/qdmail.php');

    $mail = new Qdmail();
    $mail->to($_POST['f_mail'],$_POST['f_name'].'様');
$mail->subject($_POST['f_name'].'様 ビジネス研修説明会にご応募ありがとうございます');

$mailBody = file_get_contents('./forUser.txt');
$sendData = array(
    "@name" => $_POST['f_name'],
    "@mail" => $_POST['f_mail'],
    "@school" => $_POST['f_school'],
    "@day" => $_POST['f_day'],
    "@line" => $_POST['f_line'],
    "@text" => $_POST['f_text'],
);
$mailBody = strtr($mailBody ,$sendData );
$mail->text($mailBody);
$mail->from(FROM_EMAIL,FROM_NAME);
$mail->send();//ユーザへ送信

$mail->to(SENDTO_EMAIL,'管理者様へ');
$mail->subject('ウェブサイトから説明会へのお申込みがありました');

$mailBody = file_get_contents('./forAdmin.txt');
$mailBody = strtr($mailBody ,$sendData );
$mail->mtaOption('-f '.SENDTO_EMAIL);
$mail->text($mailBody);
$mail->from(FROM_EMAIL ,FROM_NAME);
$mail->send();//運営へ送信

else:
    echo 'error';exit();
endif;
?><!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>お申し込みありがとうございます！</title>
        <!--<meta name="viewport" content="width=1000, initial-scale=1">-->
				<meta name="viewport" content="width=1000">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-add.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <!--<script src="js/vendor/modernizr-2.8.3.min.js"></script>-->
        <script src="js/jquery.meanmenu.min.js">
        <script src="js/jquery.smooth-scroll.min">
        <script src="js/script.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-62030043-1', 'auto');

  ga('send', 'pageview');
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '124269027934585');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=124269027934585&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</head>
<body>



 		<div id="content-wrap">
<div class="contents">
<div class="tC">
  <div id="topimage">

    <div id="herothanks" class="clearfix">
        <div id="topcopythanks">ビジネス研修説明会JX<br>研修説明会エントリー</div>
        <!--<div id="topdescription">学生起業をされていた大手ゲーム会社の方をお呼びして勉強会をします。</div>-->

    </div>
</div>
<br><br><br>
<div id="tokucho">説明会のお申し込みありがとうございます！</div>

<br>
<br>
この勇気ある一歩に全力でお応えします！<br>
説明会でお会いできるのを楽しみにしております！<br>
<br>
スグにご案内のメールがアドレスに届きます。<br>
もし届かない場合は、迷惑フォルダをご確認ください。<br>
そちらにもない場合は、下記のメールアドレスまで直接お問合せ下さい。<br>
お手数ですがよろしくお願い致します。<br>
<br>
これからよろしくお願いします。<br>
<br>
businessprogram.jx@gmail.com<br>
ビジネス研修プログラムJX</div>
</div>
<br><br><br>
<footer>
      <div class="recommend">
      <img src="images/creative.jpg" style="margin-bottom: 10px">
       <p><strong>IT/Creativeで自己実現できる優秀な人材を作る</strong><br></p>

[運営Community]<br>
The Creativeでは上記を理念に掲げ、東京・大阪で若手社会人に対して<br>
マーケティング×ITを用いた自己実現のサポートを目的に活動しています。<br>
<br>
大阪では、開始1年目から15人ほどのフリーランスが生まれました。<br>
東京でも、多くの大学生や若手社会人にマーケティング×ITで就職、転職活動で大手内定を貰っています。<br>
まだまだ立ち上がったばかりの小さな100人規模のコミュニティですが、<br>
これから多くの学生や若手社会人の自己実現のサポートができたらとおもいます。
<br>
<br>

</div>
<div class="copy">©2017 ビジネス研修プログラムJX, All Rights Reserved</div>
</footer>

    </body>

</html>
