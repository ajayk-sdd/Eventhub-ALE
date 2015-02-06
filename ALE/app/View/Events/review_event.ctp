<?php
//pr($event);
echo $this->Html->css('front/gallery');
?>


<div class="center-block">
    <div class="em-sec">
        <br> <br>
        <div class="breadcrumb">
            <ul>
                <li>Step 1: Event Details</li>
                <li class="active">Step 2: Confirm Details</li>
                <li>Step 3: Event Marketing</li>
                <li>Step 4: Share Your Event</li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="em-sec-inner viewevent-inner" style="margin-top:20px;">
            <form name="event-detail" class="event-form" action="#" method="post">
                <div class="emsi-part em-pa-lt confirm-event-left">
                    <div class="ev-des-box event-pemp ">
                        <h1 class="event-title"><?php echo $event["Event"]["title"]; ?></h1>
                        <h2 class="event-subtitle"><?php echo $event["Event"]["sub_title"]; ?></h2>
                        <span><?php
                            if (!empty($event["EventDate"])) {

                                foreach ($event["EventDate"] as $ed) {
                                    echo "<span style='text-transform:none;'>" . date('l, F d, Y', strtotime($ed["date"])) . "    " . date('g:i A', strtotime($ed['start_time'])) . " - " . date('g:i A', strtotime($ed['end_time'])) . "</span><br/>";
                                }
                            }
                            ?></span>
                        <p><?php echo $event["Event"]["short_description"]; ?></p>
                        <span><?php
                            $str = "";
                            foreach ($event['TicketPrice'] as $tcktPrice):
                                $tp = str_replace("$", "", $tcktPrice['ticket_price']);
                                $str .= $tcktPrice['ticket_label'] . ' $' . $tp . "<br />";
                            endforeach;
                            echo $str;
                            ?>

                        </span>
                        <a href="<?php echo $event["Event"]["ticket_vendor_url"]; ?>" class="btn-buyTicket" target="_blank">Buy Tickets</a>
                        <a href="<?php echo $event["Event"]["website_url"]; ?>" class="btn-eventWeb" target="_blank">Event Website</a>
                    </div>

                    <div class="ev-des-box map-detail-box">
                        <div class="map-content">
                            <address>
                                <?php
                                echo "<b>" . $event["Event"]["specify"] . "</b><br>";
                                $event_address = explode(",", $event["Event"]["event_address"]);
                                echo "<b>" . $event_address[0] . "</b><br/>";
                                echo $event_address[1] . "<br/>";
                                echo $event["Event"]["cant_find_city"] . " , " . $event["Event"]["cant_find_state"] . "<br/>";
                                echo $event["Event"]["cant_find_zip_code"] . "<br>";
                                //echo $event["Event"]["main_info_phone_no"];
                                ?>
                            </address>
                        </div>
                        <div class="event-map">

                            <div class = "map">
<?php //echo $this->html->image("map.jpg", array("style" => "width:184px; height:184px;"));    ?>
                                <div id="googleMap"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="ev-des-box">
                        <p><?php echo $event["Event"]["description"]; ?></p>
                        <?php
                        if ($event["Event"]["event_from"] != "facebook") {
                            ?>
                            <h3>Event Category:</h3>
                            <p><?php
                                foreach ($event['EventCategory'] as $evt) {
                                    echo @$evt['Category']['name'] . ",";
                                }
                                ?></p>

                            <h3>Event Vibes:</h3>
                            <p><?php
                                foreach ($event['EventVibe'] as $evt) {
                                    echo @$evt['Vibe']['name'] . ",";
                                }
                                ?></p>
<?php } ?>
                    </div>
                </div>
                <div class="emsi-part confirm-event-right" >

                    <div class="social-share-box">

                    </div>
                     <!------------------------------------------------------------------------------------------------------------>
                   <div id="container">
                     <?php
                        if ($event["Event"]["event_from"] == "facebook")
                        {
                           echo $this->html->image($event["Event"]["image_name"]);
                           
                        } else {
                              if(empty($event["EventImages"]))
                            {
                                  echo $this->html->image("/img/EventImages/large/".$event["Event"]["image_name"]);
                            }
                            else
                            {
                            ?>
				<!-- Start Advanced Gallery Html Containers -->				
				
				<div class="content">
					<div class="slideshow-container">
						<div id="controls" class="controls"></div>
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container">
						<div class="photo-index"></div>
					</div>
				</div>
                <div class="navigation-container">
					<div id="thumbs" class="navigation">
						<a class="pageLink prev" style="visibility: hidden;" href="#" title="Previous Page"></a>
					
						<ul class="thumbs noscript">
                         <li>
                            <a class="thumb" name="slide0" href="/img/EventImages/large/<?php echo $event['Event']['image_name']; ?>" title="Title #0"><?php echo $this->html->image("EventImages/small/" . $event['Event']['image_name'], array("style" => "width:50px;height:54px;", "alt"=>"Title #0")); ?></a>
                          </li>
                         <?php
                            $i = 1;
                            foreach ($event["EventImages"] as $event_image) {
                                ?>
                        <li>
								<a class="thumb" name="leaf" href="/img/EventImages/large/<?php echo $event_image["image_name"]; ?>" title="Title #<?php echo $i; ?>"><?php echo $this->html->image("EventImages/small/" . $event_image["image_name"], array("style" => "width:50px;height:54px;", "alt"=>"Title #".$i)); ?>
									
								</a>
								
							</li>
	 <?php
                                $i++;
                            }
                            ?>
							
						</ul>
						<a class="pageLink next" style="visibility: hidden;" href="#" title="Next Page"></a>
					</div>
				</div>
				<!-- End Gallery Html Containers -->
				<div style="clear: both;"></div>
                                 <?php
                        }
                        }
                        ?>
			</div>
                   <!------------------------------------------------------------------------------------------------------------>

                   

                    <?php /*
                      //pr($_SESSION);
                      if (isset($event['Event']['facebook_url']) && !empty($event['Event']['facebook_url'])) {
                      $fb_event_id = explode("/", $event['Event']['facebook_url']);
                      if (isset($fb_event_id[4])) {
                      ?>

                      <a id="fb_event" onclick="javascript:fbEventAttend(<?php echo $fb_event_id[4]; ?>);" href="javascript:void(0);" class="fb-link-btn">Facebook Events Attending</a>

                      <div class="fb-fl-box">
                      <p>FB Friends who are following this event</p>
                      <div class="fb-fc">
                      <ul>
                      <?php
                      if (isset($_SESSION['event_attend']) && !empty($_SESSION['event_attend'])) {
                      foreach ($_SESSION['event_attend']['data'] as $event_attend) {
                      ?>
                      <li><a href="http://www.facebook.com/<?php echo $event_attend['id']; ?>" target="_blank"><img src="<?php echo $event_attend['picture']['data']['url']; ?>" alt="<?php echo $event_attend['name']; ?>" /></a><br><?php //echo $event_attend['name'];        ?></li>
                      <?php
                      }
                      }
                      ?>
                      </ul>
                      </div>
                      <a href="<?php echo $event['Event']['facebook_url']; ?>" target="_blank" class="fb-btn-link">View this Event's Facebook Page</a>
                      <a href="<?php echo $event['Event']['facebook_url']; ?>" target="_blank" class="fb-btn-link float-right">FB - I'm Going!</a>
                      </div>
                      <?php
                      }
                      } */
                    ?>
<?php if (!empty($event['Event']['video'])) { ?>
                        <div class="event-video" >
                            <iframe width="385" height="254" src="//www.youtube.com/embed/<?php echo $event['Event']['video']; ?>" frameborder="0" allowfullscreen></iframe><br><br>
                        </div>

                        <br><br>
<?php } ?>
                    <div class="ev-des-box event-flyer">
                        <img src="/img/flyerImage/large/<?php echo $event['Event']['flyer_image']; ?>" alt="">
                    </div>


                </div>
                <div class="clear"></div>
                <br>
                <?php
                echo $this->Html->link("Edit Detail", array("controller" => "Events", "action" => "createEvent", base64_encode($event["Event"]["id"])), array("class" => "anc_link"));
                echo $this->Html->link("Save And Continue", array("controller" => "Events", "action" => "eventMarketing", base64_encode($event["Event"]["id"])), array("class" => "anc_link"));
                ?>

            </form>
        </div>
        <div class="clear"></div>
        <div class="breadcrumb">
            <ul>
                <li>Step 1: Event Details</li>
                <li class="active">Step 2: Confirm Details</li>
                <li>Step 3: Event Marketing</li>
                <li>Step 4: Share Your Event</li>
            </ul>
        </div>
    </div>
</div>







<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });
</script>

<script>
    var lat = "<?php if(empty($event["Event"]["lat"])) echo $zip['Zip']['lat']; else echo $event["Event"]["lat"]; ?>";
    var lng = "<?php if(empty($event["Event"]["lng"])) echo $zip['Zip']['lng']; else echo $event["Event"]["lng"]; ?>";
    // function define in custom js and google js calls in frontend layout
    getmapdata(lat, lng);
</script>
<script type="text/javascript" src="/js/jquerypp.custom.js"></script>
<script type="text/javascript" src="/js/jquery.elastislide.js"></script>

<link rel="stylesheet" href="/css/galleriffic-5.css" type="text/css" />


               
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="/js/slider/jquery.history.js"></script>
		<script type="text/javascript" src="/js/slider/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="/js/slider/jquery.opacityrollover.js"></script>



<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 6,
					preloadAhead:              5,
					enableTopPager:            false,
					enableBottomPager:         false,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              '',
					pauseLinkText:             '',
					prevLinkText:              '&lsaquo; Previous',
					nextLinkText:              'Next &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 true,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);

						// Update the photo index display
						this.$captionContainer.find('div.photo-index')
							.html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
						var nextPageLink = this.find('a.next').css('visibility', 'hidden');
						
						// Show appropriate next / prev page links
						if (this.displayedPage > 0)
							prevPageLink.css('visibility', 'visible');

						var lastPage = this.getNumPages() - 1;
						if (this.displayedPage < lastPage)
							nextPageLink.css('visibility', 'visible');

						this.fadeTo('fast', 1.0);
					}
				});

				/**************** Event handlers for custom next / prev page links **********************/

				gallery.find('a.prev').click(function(e) {
					gallery.previousPage();
					e.preventDefault();
				});

				gallery.find('a.next').click(function(e) {
					gallery.nextPage();
					e.preventDefault();
				});

				/****************************************************************************************/

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;

					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script>
