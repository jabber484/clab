<style type="text/css">
.logo-big {
	height: auto;
	width: 100%;
}
.logo-bg {
	position: absolute;
	background: url('https://scontent.fhkg3-1.fna.fbcdn.net/v/t31.0-8/17622062_1245400578909106_2309705076789943737_o.jpg?oh=22d6c3639a44144ba208bc4c602bb3c0&oe=59A0BA4F');
	background-position: center;
	filter: blur(1px) sepia(50%);
  	z-index: -1;  
  	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
}
.banner-wrapper {
	height: 180px;
	overflow: hidden;
	position: relative;
	text-align: center;
}
.logo-big-wrapper {
	margin-left: auto;
	margin-right: auto;
	margin-top: 0px;
	max-width: 300px;
}
.login-btn {
	font-size: 15px;
	position: absolute;
	right: 5px;
	top: 5px;
	width: 150px;
}
.school-logo {
	left: 5px;
	position: absolute;
	font-size: 20px;
	top: 5px;
}
</style>

<div style="height:8px;background-color: #fedf5a"></div>
<div class="barG"></div>
<div class="banner-wrapper">
	<div class="school-logo">
		<img style="max-width:100px;" src="https://clab.wys.cuhk.edu.hk/sites/all/themes/utopia/img/CUHK_LOGO.png">
		<img style="max-width:80px;background:white" src="https://clab.wys.cuhk.edu.hk/sites/all/themes/utopia/img/WYS_LOGO.png">
	</div>
	<button class="btn btn-success login-btn"><span class="glyphicon glyphicon-user"></span> <b>Login</b></button>
	<div class="logo-bg"></div>
	<div class="logo-big-wrapper">
		<div><img class="logo-big animated bounceInDown" src="asset/home/logo_up.png"></div>
		<div><img class="logo-big animated bounceInUp" src="asset/home/logo_down.png"></div>
	</div>
</div>
<div class="barY"></div>

<script type="text/javascript">
	$('.logo-big').click(function(event) { //logo bounce
		$(this).removeClass('animated bounceInUp bounceInDown').addClass('animated bounce').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      	$(this).removeClass('animated bounce');
    	});
	});
</script>