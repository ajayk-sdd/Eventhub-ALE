<!--Content Wrapper Starts-->
<section id="cont_wrapper">
    <!--Content Starts-->
    <section class="content">
        <!--Main Heading Starts-->
        <h1 class="main_heading"> <?php //echo $this->Html->link('Campaigns', '/admin/Campaigns/add');  ?></h1>
        <!--Main Heading Ends-->
        <!--Conetnt Info Starts Here-->
        <section class="content_info">
            <?php
                echo $this->Session->flash();
            ?>
            <ul class="form">
                <li>
                    <label>Title :</label><label><?php echo $campaign['Campaign']['title']; ?></label>
                </li>
                <li>
                    <label>Subject :</label><label><?php echo $campaign['Campaign']['subject_line']; ?></label>
                </li>
                <li>
                    <label>Username :</label><label><?php echo $campaign['User']['username']; ?></label>
                </li>
                <li>
                    <label>From Name :</label><label><?php echo $campaign['Campaign']['from_name']; ?></label>
                </li>
                <li>
                    <label>From Email :</label><label><?php echo $campaign['Campaign']['from_email']; ?></label>
                </li>
                <li>
                    <label>Reply To :</label><label><?php echo $campaign['Campaign']['reply_email']; ?></label>
                </li> <li>
                    <label>Date To Send :</label><label><?php echo date("l, F d y", strtotime($campaign['Campaign']['date_to_send'])); ?></label>
                </li> <li>
                    <label>Status :</label><label><?php
                        if (!empty($campaign['Campaign']['status']))
                            if ($campaign['Campaign']['status'] == 1)
                                echo 'Active';
                            else
                                echo 'Inactive';
                        else
                            echo "N/A";
                        ?></label>
                </li> <li>
                    <label>Current Status :</label><label><?php
                        $today = date("Y/m/d");
                        if ($campaign['Campaign']['date_to_send'] > $today) {
                            echo "Upcoming";
                        } else {
                            echo "Done";
                        }
                        ?></label>
                </li><li>
                    <label>Created Date :</label><label><?php echo date("l, F d y", strtotime($campaign['Campaign']['created'])); ?></label>
                </li><li>
                    <label>Modified Date :</label><label><?php echo date("l, F d y", strtotime($campaign['Campaign']['modified'])); ?></label>
                </li>


                <li>
                    <span class="blu_btn_lt">
                        <input type="reset" id="CampaignReset" class="blu_btn_rt" onclick="javascript:history.back();" value="Go Back"></span>
                </li>
            </ul>

            <section class="clr_bth"></section>
        </section>
        <!--Conetnt Info Ends Here-->
    </section>
    <!--Content Ends-->
</section>
<!--Content Wrapper Ends-->
<?php echo $this->Html->script('/js/admin/Campaigns/admin_add'); ?>