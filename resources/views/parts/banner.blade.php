<style type="text/css">
.logo-big {
    max-width: 205px;
    height: auto;
    width: 100%;
    background: #292929;
    padding: 40px 16px;
}
.header{
	background-image: url({{asset('asset/home/banner/banner.jpg')}});
    background-repeat: no-repeat;
    background-position: center -332px;
    background-size: cover;
}
@media screen and (max-width: 992px) {
	.header {
	    background-position: center;
	}
	.logo-big {
		padding-bottom: 24px;
	}
}
@media screen and (max-width: 1200px) {
	.nav-header-big a>div {
    	margin-top: 42px !important;
	}
}
.logo-big-wrapper {
    padding: 24px 0;
    width: auto;
}
.login-btn:hover {
	opacity: 1;
	background-color: #fce999;
}
.school-logo {
	font-size: 20px;
	left: 5px;
	position: absolute;
	top: 5px;
}
.nav-header-big a>div {
    text-align: center;
    padding: 2px 0 0 0 ;
    margin-top: 75px;
    color: white;
    background: #292929;
}
.nav-header-big>a>div:hover {
	color: #c3e0d5;
}
</style>

<div class="header">
	<div class="container-fluid">
		<div class="col-xs-7 col-sm-4 col-lg-2">
			<img class="logo-big" src="{{asset('asset/home/logo.png')}}">
		</div>	
		<div class="nav-header-big col-xs-12 col-lg-9">
			<div class="row">
				<a href=""><div class="col-xs-3">ABOUT</div></a>
				<a href=""><div class="col-xs-3">ITINERARY</div></a>
				<a href=""><div class="col-xs-3">PROJECTS</div></a>
				<a href=""><div class="col-xs-3">CONTACT</div></a>
			</div>
		</div>
	</div>
</div>	
<div class="barY"></div>
