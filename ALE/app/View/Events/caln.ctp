

<style type="text/css">
	#examplecontainer {height:450px;  position:relative}

	#show2up { position:absolute;clear:both;cursor:pointer;}
	#show1up { position:absolute;clear:both;cursor:pointer;}

	#cal3Container { display:none; position:absolute; left:52px; top:32px; z-index:2}
	#cal2Container { display:none; position:absolute; left:52px; z-index:1}
        #startdate
        {
            padding: 6px;
            margin-right: 4px;
        }
        #enddate
        {
            padding: 6px;
            margin-right: 4px;
            margin-left: 3px;
        }
         .ui-widget
                        {
                            font-size:12px !important;
                        }
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
<div class="yui-skin-sam">

<script type="text/javascript">
	YAHOO.namespace("example.calendar");

	YAHOO.example.calendar.init = function() {
            
     

	var startdate = YAHOO.util.Dom.get("startdate");
        var enddate = YAHOO.util.Dom.get("enddate");
        
        var startDiv = YAHOO.util.Dom.get("cal3Container");
        var endDiv = YAHOO.util.Dom.get("cal2Container");
        
        //var eLog = YAHOO.util.Dom.get("evtentriess");
        
      /* function logEvent(date) {
			eLog.innerHTML = '<div class="entry" id="entry'+date+'"><br>Start Time: <input type="text" name="data[EventDate][start_time][]" id="start_timeE" class="starttimepick" placeholder="8:00" value="8:00">&nbsp;<select name="data[EventDate][start_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>&nbsp;&nbsp;&nbsp;&nbsp;End Time: <input type="text" name="data[EventDate][end_time][]" id="end_timeE" class="starttimepick" placeholder="8:00">&nbsp;<select name="data[EventDate][end_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>'+'</div>' + eLog.innerHTML;
			//eCount++;
		}*/
function dateToLocaleString(dt, cal) {
                	var wStr = cal.cfg.getProperty("WEEKDAYS_LONG")[dt.getDay()];
                	var dStr = dt.getDate();
                	var mStr = cal.cfg.getProperty("MONTHS_LONG")[dt.getMonth()];
               	 	var yStr = dt.getFullYear();
                	return (wStr + ", " + dStr + " " + mStr + " " + yStr);
		}
                
	function StartDate(type,args,obj) {
			var selected = args[0];
			var selDate = this.toDate(selected[0]);
                        var aa = String(args);
                        var a = aa.replace(",", "-").replace(",", "-");
                                              
                         if(enddate.value!=''){
                         
                         var stDateVal = aa.replace(",", "/").replace(",", "/");
                         var sDateVal = Math.round(+new Date(stDateVal)/1000);
                       
                         var endVal = enddate.value;
                         var endDateVal = endVal.replace("-", "/").replace("-", "/");
                         var eDateVal = Math.round(+new Date(endDateVal)/1000);
                         
                         if (eDateVal<sDateVal) {
                            alert("Start Date should be lesser then End End.");
                            return false;
                         }
                         
                        
                         }
                       startdate.value=a;
                        startDiv.style.display="none";
                        return true;
                       
	}
	function EndDate(type,args,obj) {
			var selected = args[0];
			var selDate = this.toDate(selected[0]);
                        var aa = String(args);
                        var a = aa.replace(",", "-").replace(",", "-");
                        var strt = startdate.value;
                        var stDate = strt.replace("-", "/").replace("-", "/");
                        var enDate = aa.replace(",", "/").replace(",", "/");
                      
                       // var sd = Date.parse(stDate)/1000;
                       // var ed = Date.parse(enDate)/1000;
                     var sd = Math.round(+new Date(stDate)/1000);
                     var ed = Math.round(+new Date(enDate)/1000);
                   
                        if (sd>ed) {
                            alert("End Date should be greater then Start End.");
                            return false;
                        }
                        
                        enddate.value=a;
                        endDiv.style.display="none";
                        return true;
			
	}
        
		YAHOO.example.calendar.cal3 = new YAHOO.widget.Calendar("cal3","cal3Container", { title:"Choose a Start Date:", close:true, mindate: "<?php echo date('m/d/Y'); ?>" } );
		YAHOO.example.calendar.cal3.selectEvent.subscribe(StartDate, YAHOO.example.calendar.cal3, true);
		
		YAHOO.example.calendar.cal3.render();

		// Listener to show the 2 page Calendar when the button is clicked
		YAHOO.util.Event.addListener("show2up", "click", YAHOO.example.calendar.cal3.show, YAHOO.example.calendar.cal3, true);

		YAHOO.example.calendar.cal2 = new YAHOO.widget.Calendar("cal2","cal2Container", { title:"Choose a End Date:", close:true, mindate: "<?php echo date('m/d/Y'); ?>" } );
		YAHOO.example.calendar.cal2.selectEvent.subscribe(EndDate, YAHOO.example.calendar.cal2, true);
		
		YAHOO.example.calendar.cal2.render();

		// Listener to show the 1-up Calendar when the button is clicked
		YAHOO.util.Event.addListener("show1up", "click", YAHOO.example.calendar.cal2.show, YAHOO.example.calendar.cal2, true);
	}

	YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
        
     
                
        function addList() {
            var sst = document.getElementById("startdate").value;
            var eet = document.getElementById("enddate").value;
            var rec = document.getElementById("reccuring").value;
            var daily_dayss = document.getElementById("daily_days").value;
            if (sst==''||eet=='') {
                alert("You need to select Start Date/End Date first.");
                return false;
            }
            var myNode = document.getElementById("evtentriess");
while (myNode.firstChild) {
    myNode.removeChild(myNode.firstChild);
}
             var stDate = sst.replace("-", "/").replace("-", "/");
             var enDate = eet.replace("-", "/").replace("-", "/");
              var stDateP = sst.replace("-", ",").replace("-", ",");
              
             var sd = Math.round(+new Date(stDate)/1000);
                     var ed = Math.round(+new Date(enDate)/1000);
                     //alert(unix);
                     //alert(sd);
                    // alert(ed);
                   // alert();
                   // logEvent(sst);
                   var msg;
                   var datess;
                   datess = new Date(stDate);
                   msg = getWeekDay(datess); 
                   var selectBox = document.getElementById("evtentriess");
                    selectBox.innerHTML = '<div class="entry" id="entry'+stDateP+'">'+msg+'<br>Start Time: <input type="text" name="data[EventDate][start_time][]" id="start_timeE" class="starttimepick" placeholder="8:00" value="8:00">&nbsp;<select name="data[EventDate][start_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>&nbsp;&nbsp;&nbsp;&nbsp;End Time: <input type="text" name="data[EventDate][end_time][]" id="end_timeE" class="starttimepick" placeholder="8:00">&nbsp;<select name="data[EventDate][end_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select><input type="hidden" name="data[EventDate][start_date][]" id="data[EventDate][start_date][]" value="'+stDateP+'">'+'</div>' + selectBox.innerHTML;
			//alert(stDate); 
                    while (ed>sd) {
                         var sDate=new Date(stDate);
                       // daily_dayss = document.getElementById("daily_days").value;
                        //alert(daily_dayss);
                        sDate.setDate(sDate.getDate()+parseInt(daily_dayss));
                       
                    // format a date
                    var stDate = sDate.getFullYear() + '/' + ("0" + (sDate.getMonth() + 1)).slice(-2) + '/' + sDate.getDate();
                   datess = new Date(stDate);
                   msg = getWeekDay(datess);
                   //var sd = Math.round(+new Date(stDate)/1000);
                 // alert(ed);
                 var stDateP = stDate.replace("-", ",").replace("-", ",");
                  sd = Math.round(+new Date(stDate)/1000);
                   //alert(sd);
                   if (ed>=sd) {
                    
                   
                    selectBox.innerHTML = '<div class="entry" id="entry'+stDateP+'">'+msg+'<br>Start Time: <input type="text" name="data[EventDate][start_time][]" id="start_timeE" class="starttimepick" placeholder="8:00" value="8:00">&nbsp;<select name="data[EventDate][start_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>&nbsp;&nbsp;&nbsp;&nbsp;End Time: <input type="text" name="data[EventDate][end_time][]" id="end_timeE" class="starttimepick" placeholder="8:00">&nbsp;<select name="data[EventDate][end_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select><input type="hidden" name="data[EventDate][start_date][]" id="data[EventDate][start_date][]" value="'+stDateP+'">'+'</div>' + selectBox.innerHTML;
		}
                
                  
                  // alert("dfgdfg");
                    }
                     return true;  
           // alert(sst);
           // alert(eet);
        }
        
         function addListWeekly() {
            var sst = document.getElementById("startdate").value;
            var eet = document.getElementById("enddate").value;
            var rec = document.getElementById("reccuring").value;
           // var repeat_day = document.getElementById("repeat_day").value;
           // alert(repeat_day);
            if (sst==''||eet=='') {
                alert("You need to select Start Date/End Date first.");
                return false;
            }
            var checkedDay = [];
            for (count=0;count<7;count++) {
               if(addEvent.repeat_day[count].checked)
               {
               checkedDay.push(addEvent.repeat_day[count].value);
               
               }
            }
            if (checkedDay.length == 0)
            {
                alert("Atleast one day you need to checked.");
                return false;
            }
            document.getElementById("weekRepeatDay").value=checkedDay;
            var weekday = [sst,eet,checkedDay];
             
             
              $.post(base_url+'/Events/findWeekDay', {"data[dateDetail]": weekday}, function(data) {
          var datDate = JSON.parse(data);
          var cntday = datDate.length;
           if (cntday == 0)
            {
                alert("No date is in your search criteria.");
                return false;
            }
             var myNode = document.getElementById("evtentriess");
                while (myNode.firstChild) {
                    myNode.removeChild(myNode.firstChild);
                }
          var s;
          for (s=0;s<cntday;s++) {
             var stDate = datDate[s].replace("-", "/").replace("-", "/");
            var msg;
                   var datess;
                   datess = new Date(stDate);
                   msg = getWeekDay(datess); 
             var selectBox = document.getElementById("evtentriess");
                    selectBox.innerHTML = '<div class="entry" id="entry'+datDate[s]+'">'+msg+'<br>Start Time: <input type="text" name="data[EventDate][start_time][]" id="start_timeE" class="starttimepick" placeholder="8:00" value="8:00">&nbsp;<select name="data[EventDate][start_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>&nbsp;&nbsp;&nbsp;&nbsp;End Time: <input type="text" name="data[EventDate][end_time][]" id="end_timeE" class="starttimepick" placeholder="8:00">&nbsp;<select name="data[EventDate][end_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select><input type="hidden" name="data[EventDate][start_date][]" id="data[EventDate][start_date][]" value="'+datDate[s]+'">'+'</div>' + selectBox.innerHTML;
	
          }
           return true;
           });
              
          return true;  
           // alert(sst);
           // alert(eet);
        }
       
        function addListMonthly() {
            var sst = document.getElementById("startdate").value;
            var eet = document.getElementById("enddate").value;
            var rec = document.getElementById("reccuring").value;
           // var repeat_day = document.getElementById("repeat_day").value;
           // alert(repeat_day);
            if (sst==''||eet=='') {
                alert("You need to select Start Date/End Date first.");
                return false;
            }
            var checkedDay = [];
            for (count=0;count<2;count++) {
               if(addEvent.month_mode[count].checked)
               {
               checkedDay.push(addEvent.month_mode[count].value);
               
               }
            }
            
            if (checkedDay.length == 0)
            {
                alert("Need to check monthly mode.");
                return false;
            }
            //document.getElementById("weekRepeatDay").value=checkedDay;
           var month_day =  document.getElementById("month_day1").value;
           var monthly_period =  document.getElementById("monthly_period").value;
           var monthly_pattern_day =  document.getElementById("monthly_pattern_day").value;
            if (checkedDay=="mode1") {
                var monthday = [sst,eet,month_day];
                var action = "findNoOfDay";
            }
            else
            {
                var monthday = [sst,eet,monthly_period,monthly_pattern_day];
                var action = "dayOfMounth";
            }
            
             
             
              $.post(base_url+'/Events/'+action, {"data[dateDetail]": monthday}, function(data) {
         if (data==0) {
            alert("Please Enter correct day (between 1-30).");
            return false;
         }
          var datDate = JSON.parse(data);
          //console.log(datDate);
          var cntday = datDate.length;
           if (cntday == 0)
            {
                alert("No date is in your search criteria.");
                return false;
            }
             var myNode = document.getElementById("evtentriess");
                while (myNode.firstChild) {
                    myNode.removeChild(myNode.firstChild);
                }
          var s;
          for (s=0;s<cntday;s++) {
             var stDate = datDate[s].replace("-", "/").replace("-", "/");
            var msg;
                   var datess;
                   datess = new Date(stDate);
                   msg = getWeekDay(datess); 
             var selectBox = document.getElementById("evtentriess");
                    selectBox.innerHTML = '<div class="entry" id="entry'+datDate[s]+'">'+msg+'<br>Start Time: <input type="text" name="data[EventDate][start_time][]" id="start_timeE" class="starttimepick" placeholder="8:00" value="8:00">&nbsp;<select name="data[EventDate][start_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select>&nbsp;&nbsp;&nbsp;&nbsp;End Time: <input type="text" name="data[EventDate][end_time][]" id="end_timeE" class="starttimepick" placeholder="8:00">&nbsp;<select name="data[EventDate][end_timeF][]"  class="starttimepick"><option value="am">am</option><option value="pm">pm</option></select><input type="hidden" name="data[EventDate][start_date][]" id="data[EventDate][start_date][]" value="'+datDate[s]+'">'+'</div>' + selectBox.innerHTML;
	
          }
           return true;
           });
              
          return true;  
           // alert(sst);
           // alert(eet);
        }
       
        function getWeekDay(date) {
	  var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
	  var month = ['January','February','March','April','May','June','July','August','September','October','November','December']
	 var day = days[ date.getDay() ];
         var mon = month[ date.getMonth() ];
         var dates = day+', '+date.getDate()+' '+mon+' '+date.getFullYear();
          return dates;
	}
        
        function reccurings(mode) {
            if (mode=="d") {
               document.getElementById("daily").style.display = "block";
                document.getElementById("weekly").style.display = "none";
                document.getElementById("monthly").style.display = "none";
                document.getElementById("examplecontainer").style.height = "486px";
            }
            else if(mode=="w") {
               document.getElementById("daily").style.display = "none";
                document.getElementById("weekly").style.display = "block";
                 document.getElementById("monthly").style.display = "none";
                 document.getElementById("examplecontainer").style.height = "452px";
            }
             else if(mode=="m") {
               document.getElementById("daily").style.display = "none";
                document.getElementById("weekly").style.display = "none";
                 document.getElementById("monthly").style.display = "block";
                 document.getElementById("examplecontainer").style.height = "522px";
            }
            else
            {
                document.getElementById("daily").style.display = "none";
                document.getElementById("weekly").style.display = "none";
                document.getElementById("monthly").style.display = "none";
                document.getElementById("examplecontainer").style.height = "452px";
            }
           
        }
         
         
</script>

<div id="examplecontainer" style="height:486px">
 
   <div class="StartDate"> Start Date: <input type="text" name="start_date" id="startdate" value="<?php if(isset($this->data['Event']['start_date'])) { echo $this->data['Event']['start_date']; } ?>">
    <button id="show2up" type="button"><img width="18" height="18" src="/yui/assets/calbtn.gif" alt="Calendar"></button>
    <div id="cal3Container"></div>
   </div>
    <div class="EndDate">
 End Date: <input type="text"  name="end_date" id="enddate" value="<?php  if(isset($this->data['Event']['end_date'])) { echo $this->data['Event']['end_date']; }?>">
    <button id="show1up" type="button"><img width="18" height="18" src="/yui/assets/calbtn.gif" alt="Calendar"></button>
    <div id="cal2Container"></div>
    </div>
    <div>
        <br><hr><br>
        <?php
       
        if(isset($this->data['Event']['recurring_type']))
        {
        $rec_type = $this->data['Event']['recurring_type']; 
        }
        else
        {
        $rec_type = '';
        }
        if(isset($this->data['Event']['edate_extra']))
        {
        $edate_extra = unserialize($this->data['Event']['edate_extra']);
        }
        else
        {
          $edate_extra = '';  
        }
        if(isset($edate_extra['rec_mode']) && $edate_extra['rec_mode']=="d")
        {
            $day_count = $edate_extra['daily_days'];
        }
        else
        {
            $day_count = 1;
        }

        if(isset($edate_extra['rec_mode']) && $edate_extra['rec_mode']=="w")
        {
            $day_selected = $edate_extra['rept_days'];
            $day_selected_hidden = explode(",",$edate_extra['rept_days']);
        }
        else
        {
            $day_selected = '';
            $day_selected_hidden[] = '';
        }
        
        if(isset($edate_extra['rec_mode']) && $edate_extra['rec_mode']=="m")
        {
            $mode_selected = $edate_extra['month_mode'];
            if($mode_selected=="mode1")
            {
            $month_day = $edate_extra['month_day1'];
            $monthly_period = '';
            $monthly_pattern_day = '';
            }
            else
            {
             $month_day = '1';
             $monthly_period = $edate_extra['monthly_period'];
             $monthly_pattern_day = $edate_extra['monthly_pattern_day'];
            }
        }
        else
        {
            $mode_selected = 'mode1';
            $month_day = '1';
            $monthly_period = '';
            $monthly_pattern_day = '';
        }
        //pr($day_selected_hidden);
        ?>
        
        
        
        <div style="float:left">
 
    <select name="data[Event][recurring_type]" id="reccuring" onchange="reccurings(this.value)">
        <option value="">Reccuring Mode</option>
        <option value="d" <?php if($rec_type=="d") { echo "selected"; } ?>>Daily</option>
        <option value="w" <?php if($rec_type=="w") { echo "selected"; } ?>>Weekly</option>
        <option value="m" <?php if($rec_type=="m") { echo "selected"; } ?>>Monthly</option>
    </select></div>
        <?php
        if($rec_type=="d")
        {
             $dis = "display:block;";
             $disweek = "display:none;";
             $dismonth = "display:none;";
        }
        elseif($rec_type=="w")
        {
             $dis = "display:none;";
             $disweek = "display:block;";
             $dismonth = "display:none;";
        }
         elseif($rec_type=="m")
        {
             $dis = "display:none;";
             $disweek = "display:none;";
             $dismonth = "display:block;";
        }
        else
        {
        $dis = "display:none;";
        $disweek = "display:none;";
        $dismonth = "display:none;";
        }
        ?>
    <div class="daily" id="daily" style="<?php echo $dis; ?>"> * Repeat every (Days): <input type="text" name="data[Event][daily_days]" id="daily_days" value="<?php echo $day_count; ?>">
    <br><br>
    <div><a href="javascript:void(0)" onclick="addList();" class="add-more-tt">Add Date in List</a></div></div>
     
    
    <div class="weekly" id="weekly" style="<?php echo $disweek; ?>">
    <input type="hidden" name="data[Event][weekRepeatDay]" id="weekRepeatDay" value="<?php echo $day_selected; ?>">
 
        <input type="checkbox" value="7" name="repeat_day" id="repeat_day[]" <?php if(in_array('7', $day_selected_hidden)) { echo "checked"; } ?>> Su
        <input type="checkbox" value="1" name="repeat_day"  id="repeat_day[]" <?php if(in_array('1', $day_selected_hidden)) { echo "checked"; } ?>> M
        <input type="checkbox" value="2" name="repeat_day"  id="repeat_day[]" <?php if(in_array('2', $day_selected_hidden)) { echo "checked"; } ?>> T
        <input type="checkbox" value="3" name="repeat_day"  id="repeat_day[]" <?php if(in_array('3', $day_selected_hidden)) { echo "checked"; } ?>> W
        <input type="checkbox" value="4" name="repeat_day" id="repeat_day[]" <?php if(in_array('4', $day_selected_hidden)) { echo "checked"; } ?>> Th
        <input type="checkbox" value="5" name="repeat_day" id="repeat_day[]" <?php if(in_array('5', $day_selected_hidden)) { echo "checked"; } ?>> F
        <input type="checkbox" value="6" name="repeat_day" id="repeat_day[]" <?php if(in_array('6', $day_selected_hidden)) { echo "checked"; } ?>> Sa
   <br><br>
    <div>
        <a href="javascript:void(0)" onclick="addListWeekly();" class="add-more-tt">Add Date in List</a>
    </div>
    </div>

      <div class="monthly" id="monthly" style="<?php echo $dismonth; ?>">
       <input type="radio" name="month_mode" id="month_mode1" value="mode1" <?php if($mode_selected=="mode1") { echo 'checked'; } ?>>
        On Day <input type="text" value="<?php echo $month_day; ?>" name="month_day1" size="10" id="month_day1"> of every month 
        <br>
        <input type="radio" name="month_mode" id="month_mode2" value="mode2"  <?php if($mode_selected=="mode2") { echo 'checked'; } ?>>
         On the  <select id="monthly_period" name="monthly_period">
                    <option value="first" <?php if($monthly_period=='first') { echo 'selected'; } ?>>First</option>
                    <option value="second" <?php if($monthly_period=='second') { echo 'selected'; } ?>>Second</option>
                    <option value="third" <?php if($monthly_period=='third') { echo 'selected'; } ?>>Third</option>
                    <option value="fourth" <?php if($monthly_period=='fourth') { echo 'selected'; } ?>>Fourth</option>
                </select>
                
                <select id="monthly_pattern_day" name="monthly_pattern_day">
                    <option value="sunday" <?php if($monthly_pattern_day=='sunday') { echo 'selected'; } ?>>Sunday</option>
                    <option value="monday" <?php if($monthly_pattern_day=='monday') { echo 'selected'; } ?>>Monday</option>
                    <option value="tuesday" <?php if($monthly_pattern_day=='tuesday') { echo 'selected'; } ?>>Tuesday</option>
                    <option value="wednesday" <?php if($monthly_pattern_day=='wednesday') { echo 'selected'; } ?>>Wednesday</option>
                    <option value="thursday" <?php if($monthly_pattern_day=='thursday') { echo 'selected'; } ?>>Thursday</option>
                    <option value="friday" <?php if($monthly_pattern_day=='friday') { echo 'selected'; } ?>>Friday</option>
                    <option value="saturday" <?php if($monthly_pattern_day=='saturday') { echo 'selected'; } ?>>Saturday</option>
                </select>       
   <br><br>
    <div>
        <a href="javascript:void(0)" onclick="addListMonthly();" class="add-more-tt">Add Date in List</a>
    </div>
    </div>

   </div>
    <div>&nbsp;</div>
    
    <div id="caleventlog" class="eventlog">
                            <div class="hd">Select/Deselect Events</div>
                            <div id="evtentriess" class="bd">
 <?php
                        if (!empty($this->data['EventDate'])) {
                            $i = 0;
                            foreach ($this->data['EventDate'] as $daten):
                           
                            $ev_date = str_replace("-",",",date("Y,n,j",strtotime($daten['date'])));
                           //$ev_date = $date['date'];
                           $sam_pm =substr($daten['start_time'],-2);
                           $stime =str_replace($sam_pm,"",$daten['start_time']);
                           
                            $eam_pm =substr($daten['end_time'],-2);
                           $etime =str_replace($eam_pm,"",$daten['end_time']);
                         
                                ?>
                                <div id="entry<?php echo $ev_date; ?>" class="entry"><?php echo date('l, d F Y', strtotime($daten['date'])); ?><br>Start Time: <input type="text" class="starttimepick" id="start_timeE" name="data[EventDate][start_time][]" value="<?php echo $stime; ?>">
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
<div>
    
    
</div>

<!--END SOURCE CODE FOR EXAMPLE =============================== -->
</div>