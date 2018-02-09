<!--
	modify by Lynk
-->
<!DOCTYPE html>
<html>
<head>
<style> 
div#divchart2
{
padding:30px;
text-align:center;
valign:center;
border: 5px solid #dedede;
-moz-border-radius: 15px;      /* Gecko browsers */
-webkit-border-radius: 15px;   /* Webkit browsers */
border-radius:15px;            /* W3C syntax */
transform:scale(0.6,0.6);
-ms-transform:scale(0.6,0.6); /* IE 9 */
-moz-transform:scale(0.6,0.6); /* Firefox */
-webkit-transform:scale(0.6,0.6); /* Safari and Chrome */
-o-transform:scale(0.6,0.6); /* Opera */
}
div#divchart1
{
padding:-30px;
align:left;
valign:center;
border: 5px solid #dedede;
-moz-border-radius: 15px;      /* Gecko browsers */
-webkit-border-radius: 15px;   /* Webkit browsers */
border-radius:15px;            /* W3C syntax */
transform:scale(0.8,0.8);
-ms-transform:scale(0.8,0.8); /* IE 9 */
-moz-transform:scale(0.8,0.8); /* Firefox */
-webkit-transform:scale(0.8,0.8); /* Safari and Chrome */
-o-transform:scale(0.8,0.8); /* Opera */
}
</style>



<title>myWeather,small weather station</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="weather" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="css/graph.css">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery-1.11.0.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

<!--start-smoth-scrolling-->
<!--animated-css-->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
<!--animated-css-->  
</head>
<body>
	<!--start-banner-->
		<div class="banner" id="home">
			<div  id="top" class="callbacks_container">
			     <ul class="rslides" id="slider4">
			       <li>
	    				<div class="banner-1">
						</div>
					</li>
					 <li>
	    				<div class="banner-2">
						</div>
					</li>
					<li>
	    				<div class="banner-3">
						</div>
					</li>
			     </ul>
			</div>
			<div class="clearfix"> </div>
			<div class="header">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>
				<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a href="index.php">HOME</a><span>|</span></li>
						<li><a href="#weather" class="scroll">WEATHER</a><span>|</span></li>
						<li><a href="#contact" class="scroll">CONTACT</a><span>|</span></li>
						<li><a  class="scroll"> <?php echo $_GET["city"];  ?></a></li>

					</ul>
					<p>&nbsp;</p>
					<p style="color:white;">This is a small website to show you something about weather, more cities pliease contact our admin.</p>
				</div>
				<div class="clearfix"> </div>
				<p  align="right" style="color:white;"><small>made by Lynk&nbsp;&nbsp;&nbsp;&nbsp;</small></p>
				<p  align="right" style="color:white;"><small>Shanghai Jiao Tong University&nbsp;&nbsp;&nbsp;&nbsp;</small></p>
			</div>
			<div class="banner-bottom">
				<ul>
					
					<li><a href="https://twitter.com/lynkzhang"><span class="twt"> </span></a></li>
					<!--i don'y need
					<li><a href="#"><span class="t"> </span></a></li>-->
					<li><a href="https://plus.google.com/"><span class="g"> </span></a></li>
				
				</ul>
			</div>
		</div>	


	<!-- script-for-menu -->

		 <script>
				$("span.menu").click(function(){
					$(" ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->
		<!--Slider-Starts-Here-->
				<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: false,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
	<!--end-banner-->	


	<!--start-free-->	 
	<div class="free wow bounce" data-wow-delay="0.1s">
		<div class="container">
			<div class="free-main">
				<h1>Recent Days</h1>
			<div id="divchart1"><br/>
				<p><sup><img src="images/quote-1.png" alt=""></sup>
				<?php include("advice.php");  ?>
				<?php include("advice2.php");  ?>
				<sub><img src="images/quote-2.png" alt=""></sub> </p>
		
			<br/><br/></div>
			</div>
		</div>
		

	</div>
	<!--end-free-->	 
	<table id="weather"  border = "0">
			
			<tr>

                                <td>
					<div id="divchart1">
					<?php
                                        $city = $_GET["city"];
                                        $txt=sprintf( "<iframe src=\"/tempplot.php?city= %s \" frameborder=\"0\" width=\"700\" height=\"400\"></iframe>",$city);
                                        echo $txt;
                                        ?>

					
					</div>
				</td>
				<td>
					<H3>HISTORY TEMP PLOT</H3>	
					<p>This chart shows the most recent 7 days' temperature variation tendency. <br/>You can read the deatailed data when you put your mouse on the plot.<br/> Also you can check the bar diagram by clicking the button in<br/>the top right corner of the chart. </p>
				</td>
			</tr>
			<tr>
				<td style='text-align:right'>
					<H3>WEATHER PIE CHART</H3>
					<p>This chart shows different weather appear in shanghai in history. <br/>
					You can read the particular weather name <br/>
					when you put your mouse on the chart.
	
				</td>
                                <td  style='text-align:left'>
					<div id="divchart2">
					<?php 
					$city = $_GET["city"];
					$txt=sprintf( "<iframe src=\"/pieplot.php?city= %s \" frameborder=\"0\" width=\"700\" height=\"700\"></iframe>",$city);
					echo $txt;                 
					?>
					</div>
				</td>
                        </tr>

		</table>
	
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<script type="text/javascript">
$(function () {
	
	var filterList = {
	
		init: function () {
		
			// MixItUp plugin
		// http://mixitup.io
		$('#portfoliolist').mixitup({
			targetSelector: '.portfolio',
			filterSelector: '.filter',
			effects: ['fade'],
			easing: 'snap',
			// call the hover effect
			onMixEnd: filterList.hoverEffect()
		});				
	
	},
	
	hoverEffect: function () {
	
		// Simple parallax effect
		$('#portfoliolist .portfolio').hover(
			function () {
				$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
				$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
			},
			function () {
				$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
				$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
			}		
		);				
	
	}

};

// Run the show!
	filterList.init();
	
});	
</script>
<!--Blog-Starts-Here-->
	<div class="blog">
		<div class="container">
			<div class="blog-main">
				<div class="col-md-4 blog-left">
					<div class="blog-one wow bounceInLeft" data-wow-delay="0.4s">
						<img src="images/temp.png" alt="" />
						<h3>TEMP</h3>
						<?php 
						include("todaytemp.php");
						?>
					</div>
				</div>
				<div class="col-md-4 blog-left">
					<div class="blog-one wow bounce" data-wow-delay="0.1s">
						<img src="images/wind.png" alt="" />
						<h3>WIND</h3>
						<?php 
						include("todaywind.php");
						?>
					</div>
				</div>
				<div class="col-md-4 blog-left">
					<div class="blog-one wow bounceInRight" data-wow-delay="0.4s">
						<img src="images/other.png" alt="" />
						<h3>WEATHER</h3>
						<?php 
						include("todayweather.php");
						?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!--Blog-Ends-Here-->




<!--Contact-Starts-Here-->
	<div class="contact" id="contact">
		<div class="container">
			<div class="contact-main">
				<div class="col-md-6 contact-left wow bounceInLeft" data-wow-delay="0.4s">
					<h3>Contact Me:</h3>
					<h1>Lynk Zhang</h1>
					<p>
						Shanghai Jiao Tong University<br/>
						800 Dongchuan Rd. <br/>
						Minhang Disrict<br/>
						Shanghai, China<br/>
						200240<br/>
						
					</p>
					<ul>
						<li><p>T:18817818317 </p></li>
						<li><p><a href="mailto:Lynkzhang@sjtu.edu.cn"> E: Lynkzhang@sjtu.edu.cn </a></p></li>
						<li><p>F:<a href="https://www.facebook.com/profile.php?id=100004250560095"> facebook.com/Lynkzhang</a></p></li>
					</ul>
				</div>
				<div class="col-md-6 contact-left wow bounceInRight" data-wow-delay="0.4s">
					<form action="ok.php" method="get">
					<input type="text" name="yourname" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"/>
					<input type="text" name="yourmail" value="Email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address';}" />
					<div class="contact-textarea">
						<textarea name="youradvice" value="Your question" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your question';}">Your question</textarea>
					</div>
					<div class="contact-but">
						<input type="submit" value="SEND" />
					</div>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!--Contact-Ends-Here-->



<!--Footer-Starts-Here-->
	<div class="footer">
		<div class="conatiner">
			<div class="footer-text wow bounce" data-wow-delay="0.1s">
				<p>THANKS TO <a href="http://w3layouts.com/"> W3LAYOUTS</a></p>
				<ul>
					<li><a href="https://twitter.com/lynkzhang"><span class="twt"> </span></a></li>
					<!--i don't have this
					<li><a href="#"><span class="t"> </span></a></li>-->
					<li><a href="https://plus.google.com/"><span class="g"> </span></a></li>
				</ul>
			</div>
		</div>
		 <script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!--Footer-Ends-Here-->
</body>
</html>
