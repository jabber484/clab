<style type="text/css">
.logo-big {
    max-width: 205px;
    height: auto;
    width: 100%;
    background: rgba(117, 117, 117, 0.75);
    padding: 36px 16px;
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
@media screen and (max-width: 767px) {
    .nav-header-big a>div, .big-button-word {
        font-size: 12px;
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
    font-family: 'Roboto', sans-serif;
    text-align: center;
    padding: 2px 0 0 0;
    margin-top: 75px;
    color: #f9fffd;
    text-shadow: 0px 1px 2px rgba(87, 87, 87, 0.6);
    background: #3c515d;
}
.nav-header-big>a>div:hover {
	color: #c3e0d5;
}
</style>

<div class="header">
	<div class="container-fluid">
		<div class="col-xs-7 col-sm-4 col-lg-2">
			<a href="/"><img class="logo-big" src="{{asset('asset/clablogo.svg')}}"></a>
		</div>	
		<div class="nav-header-big col-xs-12 col-lg-9">
			<div class="row">
				<a href="/about"><div class="col-xs-3">ABOUT</div></a>
				<a href="/catalogue"><div class="col-xs-3">CATALOGUE</div></a>
				<a href=""><div class="col-xs-3">PROJECTS</div></a>
				<a href="/contact"><div class="col-xs-3">CONTACT</div></a>
			</div>
		</div>
	</div>
</div>	
<div class="barY"></div>

<script>
	$(function(){
	    $('.nav-header-big a>div:even').css({
	    	"background": "rgba(255, 224, 92, 0.8)",
	    });
	    $('.nav-header-big a>div:odd').css({
	    	"background": "rgba(197, 224, 215, 0.8)",
	    });

	});
</script>