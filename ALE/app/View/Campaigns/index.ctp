<section class="inner-content">
    <div class="center-block">
        <div class="em-sec profile-whole">
            <h1>My Campaigns</h1>

            <div class="content_outer">
                <?php echo $this->Html->link("Create Campaign", array("controller" => "Campaigns", "action" => "campaignDesign"), array("class" => "mhrn_button bottom_mrgn", "title" => "Create New Campaign")) . '<div style="clear: both;"></div>'; ?>
                <div id="div1" class="content">
                    <?php echo $this->Session->flash(); ?>

                    <!------------------------------------------------------------------------------------------>
                    <div class="clm-wrap mailList">
                        <table style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width:30%;"><?php echo $this->Paginator->sort('Campaign.subject_line', 'Name'); ?></th>
                                    <th style="width:10%;">Subscriber</th>
                                    <th style="width:10%;">Open</th>
                                    <th style="width:10%;">Click</th>
                                    <th style="width:16%;">Status</th>
                                    <th style="width:18%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($campaigns as $campaign): ?>
                                    <tr>
                                        <td><?php
                                            if (isset($campaign['Campaign']['title']) && !empty($campaign['Campaign']['title'])) {
                                                echo $campaign['Campaign']['title'];
                                            } else {
                                                echo $campaign['Campaign']['subject_line'];
                                            } echo "<br>" . date('l, F d, Y', strtotime($campaign["Campaign"]["created"]));
                                            ?></td>
                                        <td><?php echo $campaign["Campaign"]["total_mail"]; ?></td>
                                        <td><?php
                                            if ($campaign["Campaign"]["total_mail"] > 0) {
                                                echo round((($campaign["Campaign"]["open_mail"] / $campaign["Campaign"]["total_mail"]) * 100), 2) . "%";
                                            } else {
                                                echo "0%";
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($campaign["Campaign"]["total_mail"] > 0) {
                                                echo round((($campaign["Campaign"]["click_mail"] / $campaign["Campaign"]["total_mail"]) * 100), 2) . "%";
                                            } else {
                                                echo "0%";
                                            }
                                            ?></td>
                                        <td>
                                            <?php
                                            $today = date("Y/m/d");
                                            if ($campaign['Campaign']['mail_status'] == 1) {
                                                echo "Upcoming";
                                            } elseif ($campaign['Campaign']['mail_status'] == 2) {
                                                echo "Sent";
                                            } else {
                                                echo "Not to be Send";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $this->html->link('View Report', array("controller" => "Campaigns", "action" => "reportCampaign", base64_encode($campaign["Campaign"]["id"])), array('escape' => false, "class" => "", "title" => "View Report")); ?>
                                            <?php echo $this->html->link('View/Edit', array("controller" => "Campaigns", "action" => "previewCampaign", base64_encode($campaign["Campaign"]["id"])), array('escape' => false, "class" => "", "title" => "View/Edit")); ?>          
                                            <br><br>
                                            <?php echo $this->Html->link('Delete', array("controller" => "admin/Commons", "action" => "Delete", base64_encode($campaign['Campaign']['id']), 'Campaign'), array('escape' => false, 'title' => 'Delete', 'class' => "", 'onclick' => "return confirm('Are you sure you want to delete this campaign ?');" , "title" => "Delete")); ?>
                                            <?php echo $this->Html->link('Replicate', array("controller" => "Campaigns", "action" => "replicateEvent", base64_encode($campaign['Campaign']['id']), 'Campaign'), array('escape' => false, 'title' => 'Delete', 'class' => "", 'onclick' => "return confirm('Are you sure you want to replicate this campaign ?');" , "title" => "Replicate")); ?>
                                        </td>    
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                    <div class="event-pagination paginate-list">
                        <span class="peginationTxt"><?php echo $this->Paginator->counter(array('format' => 'Campaigns %start% - %end% of %count%')); ?></span>
                        <?php
                            echo $this->Paginator->first('', array("title" => "First"), null, array());
                            echo $this->Paginator->prev('', array("title" => "Previous"), null, array());
                            echo $this->Paginator->next('', array("title" => "Next"), null, array());
                            echo $this->Paginator->Last('', array("title" => "Last"), null, array());
                            //echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
                        ?>
                        <div class="clear"></div>
                    </div>
                    <!------------------------------------------------------------------------------------------>
                </div>

            </div>


        </div>
    </div>
</section>
<?php echo $this->Html->script("Front/ajaxform"); ?>