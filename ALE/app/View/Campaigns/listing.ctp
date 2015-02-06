<section class="inner-content">
    <div class="center-block">
        <div class="em-sec profile-whole">
            <h1>My Account</h1>
            <ul class="tabs profile-tabs">
            <li>
                    <?php echo $this->Html->link('Profile & Preferences', '/Users/viewProfile'); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Added Events', '/Events/MyEventList'); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('List Subscriptions', '/brands/brandList'); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Billing Info', '/Users/BillingInfo'); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Order History', '/Sales/orderList'); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Track', '/Users/track'); ?>
                </li>
                 <li class="active">
                    <?php echo $this->Html->link('My Campaign', '/Campaigns/listing'); ?>
                </li>
            </ul>
            <div class="content_outer">
                <div id="div1" class="content">
                                    <?php echo $this->Session->flash(); ?>

                    <!------------------------------------------------------------------------------------------>
                    <div class="clm-wrap">
                        <table style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width:25%;"><?php echo $this->Paginator->sort('Campaign.title', 'Title'); ?></th>
                                    <th style="width:25%;"><?php echo $this->Paginator->sort('Campaign.date_to_send', 'Schedule Date'); ?></th>
                                    <th style="width:25%;"><?php echo $this->Paginator->sort('Campaign.status', 'Status'); ?></th>
                                    <th style="width:25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($campaigns as $campaign): ?>
                                    <tr>
                                        <td><?php echo $campaign['Campaign']['title']; ?></td>
                                        <td><?php 
                                    echo date('l, F d, Y', strtotime($campaign["Campaign"]["date_to_send"]));
                                ?></td>
                                        <td>
                                            <?php
                                            $today = date("Y/m/d");
                                            if ($campaign['Campaign']['date_to_send'] > $today) {
                                                    echo "Upcoming";                                                
                                            } else {
                                                echo "Done";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $this->html->link('View', array("controller" => "Campaigns", "action" => "viewCampaign", base64_encode($campaign["Campaign"]["id"])), array('escape' => false, "class" => "")); ?>
                                            <?php echo $this->html->link('Edit', array("controller" => "Campaigns", "action" => "previewCampaign", base64_encode($campaign["Campaign"]["id"])), array('escape' => false, "class" => "")); ?>          
                                            <?php echo $this->Html->link('Delete', array("controller" => "admin/Commons", "action" => "Delete", base64_encode($campaign['Campaign']['id']), 'Campaign'), array('escape' => false, 'title' => 'Delete', 'class' => "", 'onclick' => "return confirm('Are you sure you want to delete this campaign ?');")); ?>
                                            <span class="loader" id="load_<?php echo $campaign['Campaign']['id']; ?>" style="display: none;"><img src="/img/admin/loader.gif" alt=""></span>

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
                            echo $this->Paginator->first('', null, null, array());
                            echo $this->Paginator->prev('', null, null, array());
                            echo $this->Paginator->next('', null, null, array());
                            echo $this->Paginator->Last('', null, null, array());
                            //echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
                        ?>
                        <div class="clear"></div>
                    </div>

                </div>

            </div>


        </div>
    </div>
</section>
<?php echo $this->Html->script("Front/ajaxform"); ?>