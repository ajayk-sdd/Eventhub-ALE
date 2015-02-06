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
                    </style>

                    <link rel="stylesheet" type="text/css" href="/yui/build/fonts/fonts-min.css" />
                    <link rel="stylesheet" type="text/css" href="/yui/build/calendar/assets/skins/sam/calendar.css" />
                    <script type="text/javascript" src="/yui/build/yahoo-dom-event/yahoo-dom-event.js"></script>
                    <script type="text/javascript" src="/yui/build/calendar/calendar-min.js"></script>

                    <!--there is no custom header content for this example-->

                    <!--begin custom header content for this example-->
                    <style type="text/css">


                        #caleventlog {
                            float:left;
                            width:35em;
                            margin:1em;
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
                        }
                        #caleventlog .entry {
                            margin:0;	
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


                                        function logEvent(msg) {
                                            eLog.innerHTML = '<div class="entry" id="entry"><strong>' + eCount + ').</strong> ' + msg + '</div>' + eLog.innerHTML;
                                            eCount++;
                                        }

                                        function dateToLocaleString(dt, cal) {
                                            var wStr = cal.cfg.getProperty("WEEKDAYS_LONG")[dt.getDay()];
                                            var dStr = dt.getDate();
                                            var mStr = cal.cfg.getProperty("MONTHS_LONG")[dt.getMonth()];
                                            var yStr = dt.getFullYear();
                                            return (wStr + ", " + dStr + " " + mStr + " " + yStr);
                                        }

                                        function mySelectHandler(type, args, obj) {
                                            var selected = args[0];
                                            var selDate = this.toDate(selected[0]);
                                            //selectedDate += [selected[0]]+'-';
                                            //alert(selectedDate);
                                            //dateListArray('SL',selected[0]);
                                            logEvent("SELECTED: " + dateToLocaleString(selDate, this));

                                            var mi = document.createElement("input");
                                            mi.setAttribute("type", "text");
                                            mi.setAttribute("value", selected[0]);
                                            mi.setAttribute("name", "date" + selected[0]);
                                            mi.setAttribute("id", "date" + selected[0]);

                                            var foo = document.getElementById("entry");

                                            //Append the element in page (in span).
                                            foo.appendChild(mi);


                                        }
                                        ;

                                        function myDeselectHandler(type, args, obj) {
                                            var deselected = args[0];
                                            //alert(deselected);
                                            var deselDate = this.toDate(deselected[0]);
                                            //alert(obj);
                                            //dateListArray('DS',deselected[0]);

                                            (elems = document.getElementById("entry")).parentNode.removeChild(elems);
                                            eCount--;
                                            //logEvent("DESELECTED: " + dateToLocaleString(deselDate, this));
                                        }
                                        ;
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
                                        YAHOO.example.calendar.cal1 =
                                                new YAHOO.widget.CalendarGroup("cal1", "cal1Container", {MULTI_SELECT: true, PAGES: 2});

                                        YAHOO.example.calendar.cal1.selectEvent.subscribe(mySelectHandler, YAHOO.example.calendar.cal1, true);
                                        YAHOO.example.calendar.cal1.deselectEvent.subscribe(myDeselectHandler, YAHOO.example.calendar.cal1, true);

                                        YAHOO.example.calendar.cal1.render();
                                    }

                                    YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
                        </script>
                        <div id="caleventlog" class="eventlog">
                            <div class="hd">Select/Deselect Events</div>
                            <div id="evtentries" class="bd">

                            </div>
                        </div>
                        <div style="clear:both"></div>

                        <div style="clear:both" ></div>

                        <!--END SOURCE CODE FOR EXAMPLE =============================== -->
                    </div>


                    <!-------------New Date Time End Here ---------------------->



