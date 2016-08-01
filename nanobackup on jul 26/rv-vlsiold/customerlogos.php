<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>imageScroller Image Carousel</title>
    <style type="text/css">
	/* js-disabled class - set image sizes so they all fit in the viewer */
.js-disabled img { width:100px; height:100px; display:block; float:left; margin:30px 0 0; border:0px; }
#outerContainer { width:950px; height:220px; margin:auto; position:relative;}
#imageScroller { width:950px; height:220px; position:relative; background:#EFEFEF;}
#viewer { width:930px; height:200px; overflow:hidden; margin:auto; position:relative; top:10px; }
</style>
  </head>
  <body>
		<div id="outerContainer">
			<div id="imageScroller">
				<div id="viewer" class="js-disabled">
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/1.png" border="0"></a>
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/2.png" border="0"></a>
			<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/3.png" border="0"></a>
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/4.png" border="0"></a>
                    		<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/5.png" border="0"></a>
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/6.png" border="0"></a>
			<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/7.png" border="0"></a>
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/8.png" border="0"></a>
                    		<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/9.png" border="0"></a>
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/10.png" border="0"></a>
			<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/11.png" border="0"></a>
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/12.png" border="0"></a>
                    		<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/13.png" border="0"></a>
                    
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/14.png" border="0"></a>
                    		<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/15.png" border="0"></a>
                    		<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/16.png" border="0"></a>
                    
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/17.png" border="0"></a>
				<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/12.png" border="0"></a>
                    		<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/13.png" border="0"></a>
                    
					<a class="wrapper" href="javascript:;"><img class="logo" src="images/customerlogos/double/14.png" border="0"></a>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
		<script type="text/javascript">
			$(function() {
			
			  //remove js-disabled class
				$("#viewer").removeClass("js-disabled");
			
			  //create new container for images
				$("<div>").attr("id", "container").css({ position:"absolute"}).width($(".wrapper").length * 170).height(170).appendTo("div#viewer");
			  	
				//add images to container
				$(".wrapper").each(function() {
					$(this).appendTo("div#container");
				});
				
				//work out duration of anim based on number of images (1 second for each image)
				var duration = $(".wrapper").length * 2000;
				
				//store speed for later (distance / time)
				var speed = (parseInt($("div#container").width()) + parseInt($("div#viewer").width())) / duration;
								
				//set direction
				var direction = "rtl";
				
				//set initial position and class based on direction
				(direction == "rtl") ? $("div#container").css("left", $("div#viewer").width()).addClass("rtl") : $("div#container").css("left", 0 - $("div#container").width()).addClass("ltr") ;
				
				//animator function
				var animator = function(el, time, dir) {
				 
					//which direction to scroll
					if(dir == "rtl") {
					  
					  //add direction class
						el.removeClass("ltr").addClass("rtl");
					 		
						//animate the el
						el.animate({ left:"-" + el.width() + "px" }, time, "linear", function() {
												
							//reset container position
							$(this).css({ left:$("div#imageScroller").width(), right:"" });
							
							//restart animation
							animator($(this), duration, "rtl");
							
							//hide controls if visible
							($("div#controls").length > 0) ? $("div#controls").slideUp("slow").remove() : null ;			
											
						});
					} else {
					
					  //add direction class
						el.removeClass("rtl").addClass("ltr");
					
						//animate the el
						el.animate({ left:$("div#viewer").width() + "px" }, time, "linear", function() {
												
							//reset container position
							$(this).css({ left:0 - $("div#container").width() });
							
							//restart animation
							animator($(this), duration, "ltr");
							
							//hide controls if visible
							($("div#controls").length > 0) ? $("div#controls").slideUp("slow").remove() : null ;			
						});
					}
				}
				
				//start anim
				animator($("div#container"), duration, direction);
				
				//pause on mouseover
				$("a.wrapper").live("mouseover", function() {
				  
					//stop anim
					$("div#container").stop(true);
					
					//show controls
					($("div#controls").length == 0) ? $("<div>").attr("id", "controls").appendTo("div#outerContainer").css({ opacity:0.7 }).slideDown("slow") : null ;
					($("a#rtl").length == 0) ? $("<a>").attr({ id:"rtl", href:"#", title:"rtl" }).appendTo("#controls") : null ;
					($("a#ltr").length == 0) ? $("<a>").attr({ id:"ltr", href:"#", title:"ltr" }).appendTo("#controls") : null ;
					
					//variable to hold trigger element
					var title = $(this).attr("title");
					
					//add p if doesn't exist, update it if it does
					($("p#title").length == 0) ? $("<p>").attr("id", "title").text(title).appendTo("div#controls") : $("p#title").text(title) ;
				});
				
				//restart on mouseout
				$("a.wrapper").live("mouseout", function(e) {
				  
					//hide controls if not hovering on them
					(e.relatedTarget == null) ? null : (e.relatedTarget.id != "controls") ? $("div#controls").slideUp("slow").remove() : null ;
					
					//work out total travel distance
					var totalDistance = parseInt($("div#container").width()) + parseInt($("div#viewer").width());
														
					//work out distance left to travel
					var distanceLeft = ($("div#container").hasClass("ltr")) ? totalDistance - (parseInt($("div#container").css("left")) + parseInt($("div#container").width())) : totalDistance - (parseInt($("div#viewer").width()) - (parseInt($("div#container").css("left")))) ;
					
					//new duration is distance left / speed)
					var newDuration = distanceLeft / speed;
				
					//restart anim
					animator($("div#container"), newDuration, $("div#container").attr("class"));

				});
												
				//handler for ltr button
				$("#ltr").live("click", function() {
				 					
					//stop anim
					$("div#container").stop(true);
				
					//swap class names
					$("div#container").removeClass("rtl").addClass("ltr");
										
					//work out total travel distance
					var totalDistance = parseInt($("div#container").width()) + parseInt($("div#viewer").width());
					
					//work out remaining distance
					var distanceLeft = totalDistance - (parseInt($("div#container").css("left")) + parseInt($("div#container").width()));
					
					//new duration is distance left / speed)
					var newDuration = distanceLeft / speed;
					
					//restart anim
					animator($("div#container"), newDuration, "ltr");
				});
				
				//handler for rtl button
				$("#rtl").live("click", function() {
										
					//stop anim
					$("div#container").stop(true);
					
					//swap class names
					$("div#container").removeClass("ltr").addClass("rtl");
					
					//work out total travel distance
					var totalDistance = parseInt($("div#container").width()) + parseInt($("div#viewer").width());

					//work out remaining distance
					var distanceLeft = totalDistance - (parseInt($("div#viewer").width()) - (parseInt($("div#container").css("left"))));
					
					//new duration is distance left / speed)
					var newDuration = distanceLeft / speed;
				
					//restart anim
					animator($("div#container"), newDuration, "rtl");
				});
			});
		</script>
  </body>
</html>