<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mobi-Flirt</title>

<link href="<?=WEB_APP?>/resources/ico/favicon.ico" type="image/x-icon" rel="icon" />
<link href="<?=WEB_APP?>/resources/ico/favicon.ico" type="image/x-icon" rel="shortcut icon" />

<!-- <link href="<?=WEB_APP?>/resources/thirdpart/jquery/css/jquery-ui.min.css" rel="stylesheet">-->
<link href="<?=WEB_APP?>/resources/thirdpart/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <link href="<?=WEB_APP?>/resources/thirdpart/bootstrap/css/bootstrap-datepicker3.min.css" rel="stylesheet">-->
<link href="<?=WEB_APP?>/resources/thirdpart/bootstrap/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?=WEB_APP?>/resources/thirdpart/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<!-- <link href="<?=WEB_APP?>/resources/thirdpart/bootstrap/css/fileinput.min.css" rel="stylesheet">-->
<link href="<?=WEB_APP?>/resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=WEB_APP?>/resources/thirdpart/jquery/css/blueimp-gallery.min.css" rel="stylesheet">
<link href="<?=WEB_APP?>/resources/thirdpart/bootstrap/css/bootstrap-image-gallery.min.css" rel="stylesheet">
<link href="<?=WEB_APP?>/resources/thirdpart/jquery/css/jquery.Jcrop.min.css" rel="stylesheet">

<link href="<?=WEB_APP?>/resources/css/sidebar.css" rel="stylesheet">
<link href="<?=WEB_APP?>/resources/css/site.css" rel="stylesheet">

<script src="<?=WEB_APP?>/resources/js/components.js"></script>

<!--[if lt IE 9]> 
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    var contexPath = "<?=WEB_APP;?>";
    
    var reqTimeoutMsgCount = "<?=REQ_TIMEOUT_MESSAGE_COUNT;?>";
    var reqTimeoutUpdateVisit = "<?=REQ_TIMEOUT_UPDATE_VISIT;?>";
    var reqTimeoutNewMst = "<?=REQ_TIMEOUT_SHOW_NEW_MSG;?>";
</script>
</head>

<body>
	<div class="my-navbar">
		<div class="container">
            <?php if ($logged)
                include 'template_header_on.php';
            else
                include 'template_header_off.php';
            ?>
    	</div>
	</div>

	<div class="container">
		<div class="col-md-12 col-xs-12 no-right-spaces no-left-spaces">
			<?php include ($contentPage); ?>
		</div>
	</div>

	<script src="<?=WEB_APP?>/resources/thirdpart/jquery/js/jquery-1.11.3.min.js"></script>
	<!-- <script src="<?=WEB_APP?>/resources/thirdpart/jquery/js/jquery-ui.min.js"></script>-->
	<script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/bootstrap-datepicker.min.js"></script>-->
	<!-- <script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/bootstrap-datepicker.ru.min.js"></script>-->
	<script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/bootstrap-select.min.js"></script>
	<!-- <script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/fileinput.min.js"></script>-->
	<!-- <script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/fileinput_locale_ru.js"></script>-->
	<script src="<?=WEB_APP?>/resources/thirdpart/jquery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="<?=WEB_APP?>/resources/thirdpart/bootstrap/js/bootstrap-image-gallery.min.js"></script>
	<script src="<?=WEB_APP?>/resources/thirdpart/jquery/js/jquery.Jcrop.min.js"></script>

	<script src="<?=WEB_APP?>/resources/js/site.js"></script>
	<?php if ($logged) { ?>
		<script src="<?=WEB_APP?>/resources/js/subscribed.js"></script>
    <?php } ?>
    
	<?php if ($inChat) { ?>
		<script src="<?=WEB_APP?>/resources/js/messaging.js"></script>
    <?php } ?>

</body>
</html>

