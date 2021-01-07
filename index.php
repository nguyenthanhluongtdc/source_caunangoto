<?php
   //error_reporting(0);
   // var_dump(123);
   // exit();
   session_start();
   date_default_timezone_set("Asia/Ho_Chi_Minh");
   @define('_template', './templates/');
   @define('_source', './sources/');
   @define('_lib', './lib/');
   include_once _lib."config.php";
   include_once _lib."functions.php";
   include_once _lib."class.database.php";
   include_once _lib."pagination.php";
   include_once _lib."file_requick.php";
   $alt = $title;
   if (@$_SESSION['member']['username']!="") {
   	$r_member = getItem("account", null, "where username like '{$_SESSION['member']['username']}'");
   }
   ?>
<!doctype html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <base href="<?=$config_url?>/" />
      <title>
         <?=$title?>
      </title>
      <?php if ($template != "index"): ?>
      <meta name="robots" content="noindex">
      <?php endif ?>
      <meta name="keywords" content="<?=$seo['keyword']?>" />
      <meta name="description" content="<?=$seo['desc']?>" />
      <meta property="og:title" content="<?=$title?>" />
      <meta property="og:description" content="<?=$seo['desc']?>" />
      <meta property="og:type" content="website" />
      <meta property="og:site_name" content="<?=$title?>" />
      <meta property="og:url" content="<?=getHostURL().getURL($_GET['param-1'])?>" />
      <meta property="og:image" content="<?=getHostURL().getBaseURL(true).$seo['thumbnail']?>" />
      <meta name="twitter:card" content="<?=$information['title']?>" />
      <meta name="twitter:site" content="<?=getHostURL().getURL($_GET['param-1'])?>" />
      <meta name="twitter:title" content="<?=$title?>" />
      <meta name="twitter:description" content="<?=$seo['desc']?>" />
      <meta name="twitter:image" content="<?=getHostURL().getBaseURL(true).$seo['thumbnail']?>" />
      <link rel="canonical" href="<?=getHostURL().getURL($_GET['param-1'])?>" />
      <meta name="copyright" content="<?=$information['title']?>" />
      <meta name="author" content="<?=$information['title']?>" />
      <meta name="GENERATOR" content="<?=$information['title']?>" />
      <meta name="DC.title" content="<?=$information['title']?>" />
      <meta name="DC.identifier" content="<?=getHostURL().getURL($_GET['param-1'])?>" />
      <meta name="DC.description" content="<?=$information['description']?>" />
      <meta name="DC.subject" content="<?=$information['keyword']?>" />
      <meta name="DC.language" scheme="ISO639-1" content="vi" />
      <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <link rel="shortcut icon" href="<?=getHostURL().getBaseURL(true).$information['favicon']?>">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i">
      <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i"> -->
      <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"> -->
     
       <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      

      <link href="./assets/less/styles.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/header.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/home.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/product_detail.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/post_detail.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/footer.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/cart.less" rel="stylesheet/less" type="text/css" />
      <link href="./assets/less/post.less" rel="stylesheet/less" type="text/css" />

      <link href="./assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" />   
      <link href="./assets/less/responsive.less" rel="stylesheet/less" type="text/css" />
      <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@200;400&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
      
      <style type="text/css">
         :root {
         --maux: #FFB400;
         --mauhover: #db9c05;
         --mauy: #314150;
         }
      </style>
      <?php include (_lib."style.php"); ?>
      <?php include (_template."layout/cart.php"); ?>
      <?=$information['script_head']?>
      <!-- schema.org starts -->
      <script type="application/ld+json">
         {
         	"@context": "http://schema.org",
         	"@type": "Organization",
         	"url": "<?=$config_url?>",
         	"contactPoint": [{
         		"@type": "ContactPoint",
         		"telephone": "<?='+84'.preg_replace('/^0/', "", preg_replace('/(\D)/i', "", $information['hotline']))?>",
         		"contactType": "customer service"
         	}]
         }
      </script>
      <script type="application/ld+json">
         {
         	"@context": "https://schema.org",
         	"@type": "WebSite",
         	"url": "<?= $config_url ?>",
         	"potentialAction": {
         		"@type": "SearchAction",
         		"target": "<?= $config_url ?>/<?= $classify['search'][0]['uri'] ?>/{search_term_string}.html",
         		"query-input": "required name=search_term_string"
         	}
         }
      </script>
      <?= $breadcrumb_string ?>

      <script src="./assets/js/less.min.js" type="text/javascript"></script>
      <script src="./assets/js/jquery.min.js" type="text/javascript"></script>
      <script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="./assets/js/owl.carousel.min.js"></script>
      <script src="./assets/js/swiper-override.js"></script>
      <script type="text/javascript" src="./assets/js/jquery.ez-plus.js"></script>
      <script type="text/javascript" src="./assets/js/web.js?m=20100203"></script>
   </head>
   <body class="<?= $template ?>">
      <?=$information['script_body']?>
         <!-- <div id="body"> -->
            <?php include (_template."layout/header.php") ?>
            <?php include (_template.$template."_tpl.php") ?>
            <?php include (_template."layout/footer.php") ?>
         <!-- </div> -->
      <?php include (_template."layout/hotline.php") ?>
      <?php include (_template."layout/backtotop.php") ?>
      <?= $information['livechat'] ?>
      <!--Microformats start-->
      <span class="geo" style="display: none;">
      <span class="latitude"><?php $temp=explode(",", $information['location']); echo $temp[0] ?></span>,
      <span class="longitude"><?php $temp=explode(",", $information['location']); echo $temp[0] ?></span>
      </span>
      <!--Microformats end-->
      <h1 style="display: none;"><?= $tag['h1'] ?></h1>
      <h2 style="display: none;"><?= $tag['h2'] ?></h2>
      <h3 style="display: none;"><?= $tag['h3'] ?></h3>

      
      <script type="text/javascript">
         // Url
         var assetsUrl = '/assets/bdf9a2ca';
         var uploadUrl = '/upload';
         var sendContactUrl = '/ajax/sendContact?lang=vi';
         var contactUrl = '/vi/lien-he.html';
         var newsUrl = '/vi/tin-tuc.html';
         var ajaxDownloadUrl = '/ajax/download?lang=vi';
         var searchUrl = '/vi/tim-kiem.html';
         var projectUrl = '/vi/du-an.html';
         var productUrl = '/home/product?lang=vi';
         var sendRecruimentUrl = '/ajax/recruiment?lang=vi';
         var ajaxNewsLetter = '/ajax/newsLetter?lang=vi';
         
         // Message
         var please_type_email = 'Vui lòng nhập email !';
         var email_invalid = 'Email không hợp lệ, vui lòng kiểm tra lại !';
         var please_type_name = 'Vui lòng nhập họ tên !';
         var please_type_phone = 'Vui lòng nhập số điện thoại !';
         var phone_invalid = 'Số điện thoại không hợp lệ, vui lòng kiểm tra lại !';
         var phone_range_require = 'Số điện thoại chỉ được phép từ 10 đến 15 số !';
         var please_type_title = 'Vui lòng nhập tiêu đề';
         var please_type_content = 'Vui lòng nhập nội dung !';
         var please_type_keyword = 'Vui lòng nhập từ khóa !';
         var keyword_least = 'Vui lòng nhập ít nhất 3 kí tự !';
         var please_type_username = 'please_type_username';
         var please_type_password = 'please_type_password';
         var please_type_position = 'Vui lòng nhập vị trí tuyển dụng !';
         var invalid_url = 'Liên kết không hợp lệ !';
      </script>
      
      <style type="text/css">
         .menu__main ul.nav-ul > li.active > a {
         color: #ffdb5d !important;
         }
         em {
         font-style: italic !important;
         }
      </style>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-120735097-1');
      </script>

      <script>
         $('.node-cart').click(function(){
            $(this).parent().find('.go-cart').css({
                  'opacity':'1',
                  'pointer-events':'all'
            })
         })
      </script>
      
   </body>
</html>