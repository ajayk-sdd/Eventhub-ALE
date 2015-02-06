                   <!------------ New Date Time Start Here ----------------->

                    <style type="text/css">
                        /*margin and padding on body element
                          can introduce errors in determining
                          element position and are not recommended;
                          we turn them off as a foundation for YUI
                          CSS treatments. */
                        body {
                            margin:0;
                            padding:0;
                        }
                        .ui-widget
                        {
                            font-size:12px !important;
                        }
                    </style>
                    
      
                   <!--script type="text/javascript" src="/yui/build/yahoo-dom-event/yahoo-dom-event.js"></script>
                    <script type="text/javascript" src="/yui/build/calendar/calendar-min.js"></script-->

                    <!--there is no custom header content for this example-->

                    <!--begin custom header content for this example-->
                    <style type="text/css">


                        #caleventlog {
                            float:left;
                            margin-bottom: 1em;
                            margin-right: 1em;
                            margin-top: 1em;
                            width: 100%;
                            background-color:#eee;
                            border:1px solid #000;
                        }
                        #caleventlog .bd {
                            overflow:auto;
                            height:20em;
                            padding:5px;
                        }
                        #caleventlog .hd {
                            background-color:#aaa;
                            border-bottom:1px solid #000;
                            font-weight:bold;
                            padding:2px;
                            color: #333333;
                        }
                       #caleventlog .entry {
                            border: 1px solid #D1D1D1;
                            margin: 0 0 8px;
                            padding: 10px;
                        }
                        .starttimepick
                        {
                            width: 70px;
                            padding: 5px !important;
                        }
                    </style>

                    <!--end custom header content for this example-->
                    <div class="yui-skin-sam">
                        <!--BEGIN SOURCE CODE FOR EXAMPLE =============================== -->

                        <div id="cal1Container"></div>

                
<script type="text/javascript">
	YAHOO.namespace("example.calendar");

	YAHOO.example.calendar.init = function() {
		
		var eLog = YAHOO.util.Dom.get("evtentries");
		var eCount = 1;
		var selectedDate = '';
		var array = '';
		
		
		function logEvent(msg,date) {
			eLog.innerHTML = '<div class="entry" id="entry'+date+'">' + msg + '<br>Start Time: <input type="text" name="data[EventDate][start_time][]" id="start_timeE" class="starttimepick" placeholder="8:00" value="8:00">&nbsp;<select name="data[EventDate][start_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>&nbsp;&nbsp;&nbsp;&nbsp;End Time: <input type="text" name="data[EventDate][end_time][]" id="end_timeE" class="starttimepick" placeholder="8:00">&nbsp;<select name="data[EventDate][end_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>'+'</div>' + eLog.innerHTML;
			eCount++;
		}

		function dateToLocaleString(dt, cal) {
                	var wStr = cal.cfg.getProperty("WEEKDAYS_LONG")[dt.getDay()];
                	var dStr = dt.getDate();
                	var mStr = cal.cfg.getProperty("MONTHS_LONG")[dt.getMonth()];
               	 	var yStr = dt.getFullYear();
                	return (wStr + ", " + dStr + " " + mStr + " " + yStr);
		}

		function mySelectHandler(type,args,obj) {
			var selected = args[0];
			var selDate = this.toDate(selected[0]);
			//selectedDate += [selected[0]]+'-';
			//alert(selectedDate);
			//dateListArray('SL',selected[0]);
			logEvent(dateToLocaleString(selDate, this),selected[0]);
			
			var mi = document.createElement("input");
			   mi.setAttribute("type", "hidden");
			   mi.setAttribute("value", selected[0]);
                           mi.setAttribute("name", "data[EventDate][start_date][]");
			   mi.setAttribute("id", "data[EventDate][start_date][]");
			 
			var foo = document.getElementById("entry"+selected[0]);
 
			//Append the element in page (in span).
			foo.appendChild(mi);
 
			
		};

		function myDeselectHandler(type, args, obj) {
			var deselected = args[0];
			//alert(deselected);
			var deselDate = this.toDate(deselected[0]);
			//alert(obj);
			//dateListArray('DS',deselected[0]);
			
			(elems=document.getElementById("entry"+deselected[0])).parentNode.removeChild(elems);
			eCount--;
			//logEvent("DESELECTED: " + dateToLocaleString(deselDate, this));
		};
               /* function dateListArray(type,date) {
			if (type=="DS") {
				array = array.replace(date+'-',"");
			}
			else
			{
			 array += date+'-';
			}
			 alert(array);
		}*/
               
                <?php
                  if (!empty($this->data['EventDate'])) {
                         
                            foreach ($this->data['EventDate'] as $dates):
                            $del_date[] = date("n/j/Y",strtotime($dates['date']));
               //$s = "9/25/2014,9/15/2014,8/22/2014,8/9/2014,8/21/2014";
              
                            endforeach;
                            $dateDel = implode(',',$del_date);
                            $selected = ',selected:"'.$dateDel.'"';
                        }
                        else
                        {
                            $selected='';
                        }
               ?>   
		YAHOO.example.calendar.cal1 =
			new YAHOO.widget.CalendarGroup("cal1","cal1Container", { MULTI_SELECT: true,PAGES:2, mindate: "<?php echo date('m/d/Y'); ?>"<?php echo $selected; ?> } );

		YAHOO.example.calendar.cal1.selectEvent.subscribe(mySelectHandler, YAHOO.example.calendar.cal1, true);
		YAHOO.example.calendar.cal1.deselectEvent.subscribe(myDeselectHandler, YAHOO.example.calendar.cal1, true);

		YAHOO.example.calendar.cal1.render();
	}

	YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
</script>

<div id="caleventlog" class="eventlog">
                            <div class="hd">Select/Deselect Events</div>
                            <div id="evtentries" class="bd">
 <?php
                        if (!empty($this->data['EventDate'])) {
                            $i = 0;
                            foreach ($this->data['EventDate'] as $date):
                                                       $ev_date = str_replace("-",",",date("Y,n,j",strtotime($date['date'])));
                           $sam_pm =substr($date['start_time'],-2);
                           $stime =str_replace($sam_pm,"",$date['start_time']);
                           
                            $eam_pm =substr($date['end_time'],-2);
                           $etime =str_replace($eam_pm,"",$date['end_time']);
                         
                                ?>
                                <div id="entry<?php echo $ev_date; ?>" class="entry"><?php echo date('l, d F Y', strtotime($date['date'])); ?><br>Start Time: <input type="text" class="starttimepick" id="start_timeE" name="data[EventDate][start_time][]" value="<?php echo $stime; ?>">
                                <select name="data[EventDate][start_timeF][]"  class="starttimepick"><option <?php if($sam_pm=="am") { echo 'selected';} ?> value="am">am</option><option <?php if($sam_pm=="pm") { echo 'selected';} ?> value="pm">pm</option></select>
                                &nbsp;&nbsp;
                                End Time: <input type="text" value="<?php echo $etime; ?>" class="starttimepick" id="end_timeE" name="data[EventDate][end_time][]"><input type="hidden" value="<?php echo $ev_date; ?>" name="data[EventDate][start_date][]" id="data[EventDate][start_date][]">
                              <select name="data[EventDate][end_timeF][]"  class="starttimepick"><option <?php if($eam_pm=="am") { echo 'selected';} ?> value="am">am</option><option <?php if($eam_pm=="pm") { echo 'selected';} ?> value="pm">pm</option></select>
                              
                            </div>
                                <?php
                                $i++;
                            endforeach;
                        }
                    ?>
                                                        </div>
                        </div>
                        <div style="clear:both"></div>

                        <div style="clear:both" ></div>

                        <!--END SOURCE CODE FOR EXAMPLE =============================== -->
                    </div>


                    <!-------------New Date Time End Here ---------------------->

