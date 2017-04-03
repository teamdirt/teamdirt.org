<style type="text/css">
#style_selector{
	position:fixed;
	right: 0;
	top:0px;
	z-index:100000;
	height:100%;
}
#style_selector_container{
	-webkit-box-shadow: -3px 0px 50px -2px rgba(0, 0, 0, 0.14);
	-moz-box-shadow: -3px 0px 50px -2px rgba(0, 0, 0, 0.14);
	box-shadow: -3px 0px 50px -2px rgba(0, 0, 0, 0.14);
	border-right: 1px solid #ddd;
	width:280px;
	height:100%;
	padding: 0px 30px; padding-top: 58px;
	float: left;
	background:#fff;
	-webkit-transition: all 0.5s;
	transition: all 0.5s;
}
#style_selector .style-toggle{
    width:52px;
    height:56px;
	cursor:pointer;
	border-left: 1px solid #ddd; border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
}
#style_selector .style-toggle {
	opacity: 1;
    background: #FFFFFF;
    -moz-border-radius: 5px 0px 0px 5px;
    -webkit-border-radius: 5px 0px 0px 5px;
    border-radius: 5px 0px 0px 5px;
    float: left;
    position: absolute;
    left: -52px;
    margin-top: 100px;
}
#style_selector .style-toggle:before {
    color: #333333;
    content: "\f013";
    font-family: fontawesome;
    font-size: 23px;
    font-weight: lighter !important;
    line-height: 56px;
    text-align: center;
    padding-left: 15px;
}
.ss-title {
	font-size: 15px;
	color: #333333;
	text-transform: uppercase;
	text-align: center;
	display: block;
	margin-bottom: 20px;
}
.ss-content{
	border-bottom: 1px solid #ddd;
	padding-bottom: 30px;
	margin-bottom: 30px;
}
.ss-desc {
	font-size: 13px;
	color: #747474;
	line-height: 20px;
	margin-bottom: 20px;
	display: inline-block;
}
.ss-button {
	width: 103px;
	height: 30px;
	text-align: center;
	line-height: 30px;
	font-size: 13px;
	color: #333333;
	text-transform: uppercase;
	display: inline-block;
	float: left;
	border: 1px solid #ddd;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}
.ss-button.active, .ss-button:hover {
	background: #eaeaea;
	color: #333333;
}
.wide-button { margin-right: 12px; }

#style_selector .images a { background: url(<?php echo get_template_directory_uri(); ?>/images/style-selector.png?version=2) no-repeat top left; display: inline-block; margin-bottom: 6px; margin-right: 6px; float: left; }

#style_selector .images .bkgd1 { background-position: -126px 0; width: 25px; height: 24px; }
#style_selector .images .bkgd2 { background-position: -171px 0; width: 25px; height: 24px; }
#style_selector .images .bkgd3 { background-position: -216px 0; width: 25px; height: 24px; }
#style_selector .images .bkgd4 { background-position: -261px 0; width: 25px; height: 24px; }

#style_selector .images .pattern1 { background-position: -621px 0; width: 25px; height: 24px; }
#style_selector .images .pattern2 { background-position: -718px 0; width: 25px; height: 24px; }
#style_selector .images .pattern3 { background-position: -769px 0; width: 25px; height: 24px; }
#style_selector .images .pattern4 { background-position: -829px 0; width: 25px; height: 24px; }
#style_selector .images .pattern5 { background-position: -879px 0; width: 25px; height: 24px; }
#style_selector .images .pattern6 { background-position: -929px 0; width: 25px; height: 24px; }
#style_selector .images .pattern7 { background-position: -1030px 0; width: 25px; height: 24px; }
#style_selector .images .pattern8 { background-position: -1080px 0; width: 25px; height: 24px; }
#style_selector .images .pattern9 { background-position: -1134px 0; width: 25px; height: 24px; }
#style_selector .images .pattern10 { background-position: -668px 0; width: 25px; height: 24px; }

#style_selector .demo-sites a { float: left; width: 104px; height: 78px;
	border: 5px solid #f6f6f6;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	text-align: center;
	margin-right: 10px;
	margin-bottom: 10px;
	position: relative;
}
#style_selector .demo-sites .agency-demo { margin-right: 0; }
#style_selector .demo-sites span { background: url(<?php echo get_template_directory_uri(); ?>/images/style-selector.png?version=2) no-repeat top left; display: inline-block; position: relative; top: 50%; }
#style_selector .demo-sites .classic-demo span { background-position: -1325px 0; width: 84px; height: 33px; margin-top: -17px; }
#style_selector .demo-sites .agency-demo span { background-position: -1429px 0; width: 77px; height: 67px; margin-top: -34px; }
#style_selector .demo-sites .coming-soon-demo span { background-position: -1526px 0; width: 51px; height: 30px; margin-top: -15px; }
#style_selector .demo-sites .holder {
	display: none;
	position: absolute; bottom: 75%; right: 85px;
	z-index: 2;
	border: 10px solid #fff; /* stroke */
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px; /* border radius */
	background-color: #fff; /* layer fill content */
	-moz-box-shadow: -2px 1px 54px rgba(23,24,25,.14); /* drop shadow */
	-webkit-box-shadow: -2px 1px 54px rgba(23,24,25,.14); /* drop shadow */
	box-shadow: -2px 1px 54px rgba(23,24,25,.14); /* drop shadow */
	width: 460px;
}
#style_selector .demo-sites a:hover .holder {
	display: block;
}

#style_selector .clear_style_selector { width: 100%; }
</style>
<script type="text/javascript">
boxed_style_selector_change = function(current) {
	if(current == 'Boxed') {
		jQuery('#wrapper').wrap('<div id="boxed-wrapper"></div>');

		var html = 'body{background-color:#d7d6d6;background-image:url("http://isharis.dnsalias.com/wp-content/themes/Avada/images/patterns/pattern1.png");background-repeat:repeat;}#wrapper{background:#fff;max-width:1200px;margin:0 auto;}#boxed-wrapper{margin: 0 auto; max-width: 1450px;}#side-header{left: auto !important; margin-left: -265px !important;}';
		
		if( jQuery( '#sliders-container .tfs-slider' ).data( 'parallax' ) == 1 ) {
			html = html + '#sliders-container .tfs-slider{left:50% !important; margin-left:-460px !important;}';
		}
		
		jQuery('head').append('<style type="text/css" id="ss"></style>');
		jQuery('style#ss').append(html);
	} else {
		jQuery('style#ss').empty();
		jQuery('body').attr('style', '');
	}
};
pattern_style_selector = function(current, name) {
	if(current == 'Boxed') {
		if(name == 'bkgd1' || name == 'bkgd2' || name == 'bkgd3' || name == 'bkgd4' || name == 'bkgd5') {
			jQuery('body').css('background', 'url(<?php echo get_template_directory_uri(); ?>/images/patterns/'+name+'.jpg) no-repeat center center fixed');
			jQuery('body').css('background-size', 'cover');
		} else {
			jQuery('body').css('background', 'url(<?php echo get_template_directory_uri(); ?>/images/patterns/'+name+'.png) repeat center center scroll');
			jQuery('body').css('background-size', 'auto');
		}
	} else {
		alert('Select boxed layout');
	}
};
jQuery(document).ready(function() {
	/*!
	 * jQuery Cookie Plugin v1.3.1
	 * https://github.com/carhartl/jquery-cookie
	 *
	 * Copyright 2013 Klaus Hartl
	 * Released under the MIT license
	 */
	(function(d){"function"===typeof define&&define.amd?define(["jquery"],d):d(jQuery)})(function(d){function k(a){return e.raw?a:decodeURIComponent(a.replace(n," "))}function l(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));a=k(a);try{return e.json?JSON.parse(a):a}catch(c){}}var n=/\+/g,e=d.cookie=function(a,c,b){if(void 0!==c){b=d.extend({},e.defaults,b);if("number"===typeof b.expires){var f=b.expires,h=b.expires=new Date;h.setDate(h.getDate()+f)}c=e.json?JSON.stringify(c):
	String(c);return document.cookie=[e.raw?a:encodeURIComponent(a),"=",e.raw?c:encodeURIComponent(c),b.expires?"; expires="+b.expires.toUTCString():"",b.path?"; path="+b.path:"",b.domain?"; domain="+b.domain:"",b.secure?"; secure":""].join("")}c=document.cookie.split("; ");b=a?void 0:{};f=0;for(h=c.length;f<h;f++){var g=c[f].split("="),m=k(g.shift()),g=g.join("=");if(a&&a===m){b=l(g);break}a||(b[m]=l(g))}return b};e.defaults={};d.removeCookie=function(a,c){return void 0!==d.cookie(a)?(d.cookie(a,"",
	d.extend({},c,{expires:-1})),!0):!1}});

	jQuery('#style_selector .wide-button').click(function() {
		var current = 'Wide';

		jQuery.removeCookie('boxed_style_selector', {path:'/'});
		jQuery.cookie('boxed_style_selector', current, {path:'/'});

		jQuery(this).addClass('active');
		jQuery('#style_selector .boxed-button').removeClass('active');

		boxed_style_selector_change(current);
	});

	jQuery('#style_selector .boxed-button').click(function() {
		var current = 'Boxed';

		jQuery.removeCookie('boxed_style_selector', {path:'/'});
		jQuery.cookie('boxed_style_selector', current, {path:'/'});

		jQuery(this).addClass('active');
		jQuery('#style_selector .wide-button').removeClass('active');

		boxed_style_selector_change(current);
	});

	if(jQuery.cookie('boxed_style_selector')) {
		boxed_style_selector_change(jQuery.cookie('boxed_style_selector'));

		if(jQuery.cookie('boxed_style_selector') == 'Boxed') {
			jQuery('#style_selector .boxed-button').addClass('active');
			jQuery('#style_selector .wide-button').removeClass('active');
		}
	}

	if(jQuery.cookie('style_selector_status') == 'disabled') {
		jQuery("body").removeClass('ss-close');
		jQuery("body").addClass('ss-open');
	} else {
		jQuery("body").removeClass('ss-open');
		jQuery("body").addClass('ss-close');
		
		jQuery('#style_selector').css( "right", "0px" );
	}

	jQuery('#style_selector .style-toggle').click(function(e) {
		e.preventDefault();

		if(jQuery('body').hasClass('ss-close')) {
			jQuery("body").removeClass('ss-close');
			jQuery("body").addClass('ss-open');

			jQuery('#style_selector').animate({"right": "-279px"}, "slow");

			jQuery.removeCookie('style_selector_status', {path:'/'});
			jQuery.cookie('style_selector_status', 'disabled', {path:'/'});
		} else {
			jQuery("body").removeClass('ss-open');
			jQuery("body").addClass('ss-close');

			jQuery('#style_selector').animate({"right": "0px"}, "slow");

			jQuery.removeCookie('style_selector_status', {path:'/'});
			jQuery.cookie('style_selector_status', 'enabled', {path:'/'});
		}
	});

	jQuery('.patterns a').click(function(e) {
		e.preventDefault();

		var current = jQuery('.wide-button.active, .boxed-button.active').text();
		var name = jQuery(this).attr('name');

		jQuery.removeCookie('pattern_style_selector_current', {path:'/'});
		jQuery.cookie('pattern_style_selector_current', current, {path:'/'});

		jQuery.removeCookie('pattern_style_selector_name', {path:'/'});
		jQuery.cookie('pattern_style_selector_name', name, {path:'/'});

		pattern_style_selector(current, name);
	});

	if(jQuery.cookie('boxed_style_selector') == 'Boxed' && jQuery.cookie('pattern_style_selector_current') && jQuery.cookie('pattern_style_selector_name')) {
		pattern_style_selector(jQuery.cookie('pattern_style_selector_current'), jQuery.cookie('pattern_style_selector_name'));
	}

	jQuery('.clear_style_selector').click(function(e) {
		e.preventDefault();

		jQuery.removeCookie('boxed_style_selector', {path:'/'});
		jQuery.removeCookie('pattern_style_selector_current', {path:'/'});
		jQuery.removeCookie('pattern_style_selector_name', {path:'/'});
		jQuery.removeCookie('style_selector_status', {path:'/'});

		document.location.reload(true);
	});

	jQuery('#style_selector .demo-sites a').hover(function() {
		var image = jQuery(this).data('image');
		jQuery(this).find('.holder img').attr('src', image);
	});
});
</script>
<div id="style_selector" style="right: -279px;">
	<div class="style-toggle"></div>
	<div id="style_selector_container">
		<span class="ss-title">Layout</span>
		<div class="ss-content clearfix">
			<a href="#" class="active wide-button ss-button">Wide</a>
			<a href="#" class="boxed-button ss-button">Boxed</a>
		</div>
		<span class="ss-title">Boxed Mode Backgrounds</span>
		<div class="ss-content clearfix">
			<div class="images patterns">
				<a href="#" class="bkgd bkgd1 active" name="bkgd1"></a>
				<a href="#" class="bkgd bkgd2" name="bkgd2"></a>
				<a href="#" class="bkgd bkgd3" name="bkgd3"></a>
				<a href="#" class="bkgd bkgd4" name="bkgd4"></a>
				<a href="#" class="pattern1" name="pattern1"></a>
				<a href="#" class="pattern2" name="pattern2"></a>
				<a href="#" class="pattern3" name="pattern3"></a>
				<a href="#" class="pattern4" name="pattern4"></a>
				<a href="#" class="pattern5" name="pattern5"></a>
				<a href="#" class="pattern6" name="pattern6"></a>
				<a href="#" class="pattern7" name="pattern7"></a>
				<a href="#" class="pattern8" name="pattern8"></a>
				<a href="#" class="pattern9" name="pattern9"></a>
				<a href="#" class="pattern10" name="pattern10"></a>
			</div>
		</div>
		<span class="ss-title">Demo Samples</span>
		<span class="ss-desc">Avada's powerful setup allows you to easily create unique looking sites. Here are a few included examples that can be installed with one click.</span>
		<div class="ss-content clearfix">
			<div class="demo-sites clearfix">
				<a href="http://demo.theme-fusion.com" class="classic-demo" data-image="<?php echo get_template_directory_uri(); ?>/images/classic.jpg?version=2">
					<span></span>
					<div class="holder fusion-animated fadeInUp"><img /></div>
				</a>
				<a href="http://theme-fusion.com/avada_demos/agency/" class="agency-demo" data-image="<?php echo get_template_directory_uri(); ?>/images/agency.jpg?version=2">
					<span></span>
					<div class="holder fusion-animated fadeInUp"><img /></div>
				</a>
				<a href="#" class="coming-soon-demo">
					<span></span>
				</a>
				<a href="#" class="coming-soon-demo" style="margin-right: 0;">
					<span></span>
				</a>
			</div>
		</div>
		<a href="#" class="clear_style_selector ss-button">Clear Styles</a>
	</div>
</div>