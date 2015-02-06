<section class="inner-content inner-contentnew">
    <div class="em-sec">  
        <h1>Dashboard
            <p class="button_listing">
            <?php
            echo $this->html->link("Create New Campaign", array("controller" => "Campaigns", "action" => "campaignDesign"), array("class" => "btn-all"));
    
            echo $this->html->link("Create New List", array("controller" => "MyLists", "action" => "add"), array("class" => "btn-all", "style" => "margin-left:20px;"));
            ?>
        </p>
        </h1>
        <br>
    </div>
    <div class="outer_cont fl_lt">
    	<h2>Recent Campaigns</h2>
        <section class="inner_cont">
			<?php echo $this->Form->input("campaign", array("type" => "select", "div" => FALSE, "label" => FALSE, "options" => $campaigns)); ?>
            <a onclick="viewReport()"  href="javascript:void(0);" class="btn-all"><span>View Report</span></a>
            <span style='display: none; float: left !important;' id='load' class='loader'><img alt='' src='/img/admin/loader.gif' title='Loading'></span>
        </section>
    </div>
    <div class="outer_cont fl_rt">
        <h2>My Lists</h2>
        <div class="inner_cont">
            <?php echo $this->Form->input("list", array("type" => "select", "div" => FALSE, "label" => FALSE, "options" => $MyLists)); ?>
            <a onclick="viewList()"  href="javascript:void(0);" class="btn-all"><span>View Report</span></a>
            <span style='display: none; float: left !important;' id='load_list' class='loader'><img alt='' src='/img/admin/loader.gif' title='Loading'></span>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div id="viewReport"  style="float: left; width: 49%;"></div>
    <div id="viewList"  style="float: right; width: 49%;"></div>
</section>


<script>
    function viewReport() {
        var campaign_id = $("#campaign").val();
        $('#load').show();
        jQuery.ajax({
            url: '/Users/campaignReport/' + campaign_id,
            success: function(data) {
                $('#load').hide();
                $("#viewReport").html(data);
            }
        });
    }

    function viewList() {
        var list_id = $("#list").val();
        $('#load_list').show();
        jQuery.ajax({
            url: '/Users/viewList/' + list_id,
            success: function(data) {
                $('#load_list').hide();
                $("#viewList").html(data);
            }
        });
    }
</script>
