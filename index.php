<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function/route.php';
?>
<!doctype html>
<html lang=''>
<head>
	<title>Luppy Shop</title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- JQUERY LIB -->
	<script src="<?php echo base_url ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap-theme.min.css" >
	<script src="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.js"></script>

	<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url.'assets/'?>plugin/select2/dist/css/select2.min.css">
  <!-- Select2 -->
	<script src="<?php echo base_url.'assets/'?>plugin/select2/dist/js/select2.full.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/style.css">

	<!-- FONT AWESOME -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/font-awesome/css/font-awesome.min.css">
	<!-- NPROGRESS -->
	<script src="<?php echo base_url.'assets/'?>plugin/nprogress/nprogress.js"></script>
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url.'assets/'?>plugin/nprogress/nprogress.css">

	<script src="<?php echo base_url.'assets/'?>plugin/moment/moment.js"></script>
	<script src="<?php echo base_url.'assets/'?>plugin/moment/moment-with-locales.js"></script>
</head>
<body>
	<header>
		<div class="container-logo">
			<span class="lg-large"><b>LUPPY</b></span><span class="lg-medium">Shop</span>
		</div>
		<?php include "view/component/main-menu.php" ?>
	</header>
	<section id="main">
		<div id="container">
			<div class="content">
				<?php
					$page = (isset($_GET['page']))? $_GET['page'] : "main";
					route($page);
				?>
			</div>
		</div>
	</section>
	<footer>
		<div class="footer-container">
			<small>Copyright &copy; <?php echo date("Y") ?> - Luppy Shop</small>
		</div>
	</footer>
	<script type="text/javascript">
		$(document).ajaxSend(function(event, request, settings) {
			NProgress.start();
		});
		$(document).ajaxComplete(function(event, request, settings) {
			NProgress.done();
		});
	function ind(nStr) {
	    nStr += '';
	    x = nStr.split('.');
	    x1 = x[0];
	    x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	        x1 = x1.replace(rgx, '$1' + '.' + '$2');
	    }
	    return 'Rp. ' +x1 + x2;
	}
</script>
</body>
</html>

<!-- <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div> -->