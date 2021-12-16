<?php 
include('languages/lang_config.php');
require 'config/config.php';
$settings = $connect->query("SELECT * FROM `settings`")->fetch();
?>
<!doctype html>
<html lang="en" dir="<?= $lang['dir'] ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="logo/logo.png">
    <title><?php echo $settings['title'] ?></title>
  </head>

      <style>

   @font-face {
    font-family: 'Cairo';
    src: url('https://fonts.gstatic.com/s/cairo/v10/SLXLc1nY6Hkvalrub46O59ZMaA.woff2');
    font-style: normal;

     }

    body {

    font-family: 'Cairo',sans-serif !important;

     }

   * { color:#fff; text-decoration: none;}


  .new {
    background: <?php echo $settings['color'] ?>;
    color: #FFF;
  border-radius: 14px;
  }

    </style>

  <body class="new">
  <div class="container-fluid my-5">
      <div class="row my-5">
          <div class="col-md-12 text-center my-5 ">
              <img <?php $file ="adminAPI/logo/".$settings['file'];?> src="<?php echo $file ?>" width="340" height="320">
              <h3><?php echo $settings['title'] ?></h3>
                <h4>
                  <div class="typewrite" data-period="2000" data-type='[ "The site is temporarily closed", "الموقع مغلق مؤقتا حاول مجددا  ", "Le site est temporairement fermé ", "El sitio está cerrado temporalmente" ]'>
                      <span class="wrap"></span>
                   </div>
                </h4>
                <a href="index">
                  <button type="button" class="btn btn-secondary">حاول مجددا </button>
                </a>
          </div>
      </div>
  </div>
  </body>

<script>
    //made by vipul mirajkar thevipulm.appspot.com
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>
</html>