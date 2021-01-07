<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta name="robots" content="noindex" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Thông báo</title>
</head>
<style>
	.clock {
		width: 800px;
		margin: 0 auto;
		padding: 30px;
		color: #fff;
	}
	#Date {
		font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
		font-size: 36px;
		text-align: center;
		text-shadow: 0 0 5px #00c6ff;
	}
	ul {
		width: 800px;
		margin: 0 auto;
		padding: 0px;
		list-style: none;
		text-align: center;
	}
	ul li {
		display: inline;
		font-size: 10em;
		text-align: center;
		font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
		text-shadow: 0 0 5px #00c6ff;
	}
	#point {
		position: relative;
		-moz-animation: mymove 1s ease infinite;
		-webkit-animation: mymove 1s ease infinite;
		padding-left: 10px;
		padding-right: 10px;
	}
	@-webkit-keyframes mymove {
		0% {opacity: 1.0;
			text-shadow: 0 0 20px #00c6ff;
		}
		50% {
			opacity: 0;
			text-shadow: none;
		}
		100% {
			opacity: 1.0;
			text-shadow: 0 0 20px #00c6ff;
		}
	}
	@-moz-keyframes mymove {
		0% {
			opacity: 1.0;
			text-shadow: 0 0 20px #00c6ff;
		}
		50% {
			opacity: 0;
			text-shadow: none;
		}
		100% {
			opacity: 1.0;
			text-shadow: 0 0 20px #00c6ff;
		};
	}
</style>
<script type="text/javascript" src="./assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
		var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
		var newDate = new Date();
		newDate.setDate(newDate.getDate());
		$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
		setInterval( function() {
			var seconds = new Date().getSeconds();
			$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
		setInterval( function() {
			var minutes = new Date().getMinutes();
			$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		},1000);
		setInterval( function() {
			var hours = new Date().getHours();
			$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		}, 1000);
	});
</script>
<body background="dangcapnhat.png" style="text-align:center;">
	<!-- <h1 style="margin:auto; color:#FFFFFF; margin-top:30px;">Webite đã hết hạn !</h1>
	<h1 style="margin:auto; color:#FFFFFF;">Vui lòng liên hệ 028 6680 3758 (PTIT) để được hỗ trợ !</h1> -->
	<h1 style="margin:auto; color:#FFFFFF; margin-top:30px;">Webite đang cập nhật !</h1>
	<h1 style="margin:auto; color:#FFFFFF;">Vui lòng quay lại sau !</h1>
	<div class="clock">
		<div id="Date"></div>
		<ul>
			<li id="hours"></li>
			<li id="point">:</li>
			<li id="min"></li>
			<li id="point">:</li>
			<li id="sec"></li>
		</ul>
	</div>
</body>
</html>
