<h1>My AList Calendar</h1>
<div class = "calendar_list">
    <?php
    $i = 1;
    foreach ($lists as $list) {
        $i++;
        if ($i % 2 == 0) {
            ?>
            <div class = "medium_list left">
                <div class = "calendar_img left"><?php echo $this->html->image("brand/small/" . $list['User']["Brand"]["logo"]); ?></div>
                <div class = "calender_detail left">
                    <b><?php echo $list["MyList"]["list_name"]; ?></b><br/>
                  
                  
                </div>
                <div class = "calendar_action right">
                    <?php echo $this->html->link("Make an Offer", array("controller" => "Events", "action" => "viewEvent", base64_encode($list["MyList"]["id"])), array("class" => "action_link")); ?>
                   
                    <br/>
                </div>
            </div>
    <?php } else { ?>
            <div class = "medium_list right">
                <div class = "calendar_img left"><?php echo $this->html->image("brand/small/" . $list["User"]["Brand"]["logo"]); ?></div>
                <div class = "calender_detail left">
                    <b><?php echo $list["MyList"]["list_name"]; ?></b><br/>
                  
                </div>
                <div class = "calendar_action right">
        <?php echo $this->html->link("Make an Offer", array("controller" => "Events", "action" => "viewEvent", base64_encode($list["MyList"]["id"])), array("class" => "action_link")); ?>
             
                    <br/>
                </div>
            </div><br/>
            <?php
        }
    }
    ?>
</div>
<script>
    // for getting latitude and longitude from IP address
    $.get("http://ipinfo.io", function(response) {
        $("#lat_long").val(response.loc);
    }, "jsonp");
</script>