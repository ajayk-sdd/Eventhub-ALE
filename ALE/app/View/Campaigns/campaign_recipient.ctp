<section class="inner-content">
    <div class="center-block">
        <div class="em-sec profile-whole">
            <h1>Select Events for Campaign</h1>
            <div class="breadcrumb">
                <ul>
                    <li>Step 1: Design</li>
                    <li>Step 2: Set Up</li>
                    <li>Step 3: Preview</li>
                    <li class="active">Step 4: Recipients</li>
                </ul>
            </div>
            <div class="createnewcampaign">
                <div class="eventsinthismail eventcampaign">
                    <h3>Choose Lists to Send To:</h3>
                    <ul id = "addedEvent">
                        <?php
                        echo $this->Form->create("Campaign", array("action" => "campaignList"));
                        if (!empty($myList)) {
                            foreach ($myList as $mlKey => $mlValue) {
                                echo "<li>" . $this->Form->input("MyList.id.", array("type" => "checkbox", "div" => FALSE, "label" => "<span>" . $mlValue . "</span>", "value" => $mlKey)) . "</li>";
                            }
                        }
                        echo $this->Form->input("Campaign.id", array("value" => $campaign_id, "type" => "hidden"));
                        ?>

                    </ul>
                    <?php
                    echo $this->Form->submit("Continue", array("class" => "violet_button"));
                    echo $this->Form->end();
                    ?>
                </div>
                <div style="clear:both;"></div>
       
                <!-- search panel start here -->
                 <div class="createnewlist">
                    <h3>Create New List to Send To:</h3>
                    <div class="allcontacts-whole">

                        <h3><label>All Contacts(<?php echo $this->Paginator->counter(array('format' => '%count%')); ?>)</label>   
                            <select id="changeList" >
                                <option value="Choose List to View..." >Choose List to View...</option>
                                <?php
                                foreach ($mylists_link as $myl_list) {
                                    echo "<option value='" . base64_encode($myl_list['MyList']['id']) . "'>" . $myl_list['MyList']['list_name'] . "</option>";
                                }
                                ?>

                            </select>
                        </h3>
                        <div class="searchfilter searchfilterinnr ">
                            <?php echo $this->Form->create("Campaign", array("action" => "campaignRecipient/" . $list_id, 'enctype' => 'multipart/form-data', "novalidate" => "novalidate")); ?>


                            <span>Search and Filtering</span>
                            <?php echo $this->Html->link("Show", 'javascript:void(0);', array("class"=>"bn-hide-show smlpink_button")); ?>
                            <div class="sp-inner">
                                <ul class="sp-hide-content <?php //echo $clss;               ?>" >
                                    <li>

                                        <?php echo $this->Form->input('ListEmail.email', array('type' => 'text', 'label' => "List Email:", 'div' => false, 'maxlength' => '150', 'autocomplete' => 'off', 'placeholder' => 'Enter Email'));
                                        ?>


                                    </li>


                                    <li>
                                        <?php
                                        echo $this->Form->input("Search", array('type' => 'submit', 'div' => false, 'label' => false, "onclick" => "javascript:document.search_form.submit();"));
                                        echo $this->html->link('Clear Search', array('controller' => 'MyLists', 'action' => 'view/' . $list_id), array("class" => "clear-search"));
                                        ?> &nbsp;&nbsp; <?php
                                        echo $this->html->link('Download CSV', array('controller' => 'MyLists', 'action' => 'exportCsv/' . $list_id), array("class" => "clear-search"));
                                        ?>

                                    </li>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <?php echo $this->Session->flash(); ?>

                <!-- search panel start here -->

                <div class="clm-wrap">
                    <?php echo $this->Form->create('admin/Common', array('users', 'action' => 'selectMultiple?model=ListEmail')); ?>

                    <table>
                        <thead>
                            <tr>
                                <th style="width:2%"><?php echo $this->Form->checkbox('selectAll', array('type' => 'checkbox', 'class' => 'textbox', 'label' => '', 'id' => 'selectall', 'name' => 'selectAll')); ?></th>
                                <th style="width:14%;"><?php echo $this->Paginator->sort('ListEmail.email', 'Email'); ?>
                                    <span class="<?php echo ('ListEmail.email' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "email ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span>
                                       <?php echo $this->Html->link("Add them", 'javascript:void(0);', array("onclick"=>"javascript:checkfind();","style"=>"float:right;")); ?>
                                    
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_emails as $listemail) { ?>
                                <tr>
                                    <td><?php echo $this->Form->checkbox('checkbox', array('type' => 'checkbox', 'class' => 'textbox case', 'label' => '', 'value' => $listemail['ListEmail']['id'], 'name' => 'IDs[]')); ?></td>
                                    <td><div class="list-editUser"><?php echo $listemail["ListEmail"]["email"]; ?>
                                        </div><div> 
                                        </div>
                                    </td>


                                </tr>	
                            <?php } ?>
                        </tbody></table>


                    <br/>

                    <?php echo $this->Form->end(); ?>
                    <div class="clear"></div>

                    <div class="event-pagination paginate-list mar-bot30">
                        <span class="peginationTxt"><?php echo $this->Paginator->counter(array('format' => 'List %start% - %end% of %count%')); ?></span>
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
                <div class="clear"></div>
            </div>
            <div class="clear"></div><br><br>
            <div class="breadcrumb">
                <ul>
                    <li>Step 1: Design</li>
                    <li>Step 2: Set Up</li>
                    <li>Step 3: Preview</li>
                    <li class="active">Step 4: Recipients</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.bn-hide-show').click(function() {
            $('.sp-hide-content').toggleClass('show-hide-panel');
            $(this).text(($(this).text() == 'Show' ? 'Hide' : 'Show'))
        });

        $('.show-more').click(function() {
            $('.more-option').toggleClass('show-more-option');
        });

        $('.btn-changeLoc').click(function() {
            $('.findByNum').css('display', 'block');
            $('.btn-changeLoc').css('display', 'none');
        });

        $('.ld-view').change(function() {
            $('.event-container .event-box').toggleClass('event-list-view');
        });
        $('.show-more-vibes').click(function() {
            $('.vibes-more-option').toggleClass('show-more-option');
        });
        $('.show-more-categories').click(function() {
            $('.categories-more-option').toggleClass('show-more-option');
        });

    });

    function setLimit(limit) {
        $("#limit").val(limit);
        document.search_form.submit();
    }

    $('#changeList').change(function() {
        // set the window's location property to the value of the option the user has selected
        window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/Campaigns/campaignRecipient/<?php echo base64_encode($campaign_id); ?>/" + $(this).val();
    });

    function checkfind() {
        var my_array = [];
        $(document).find(".case:checked").each(function() {
            my_array.push($(this).val());
        });
        jQuery.ajax({
            url: '/Campaigns/addRecipient/' + my_array, success: function(data) {
                if (data == 1) {
                    alert("Added successfully.");
                } else {
                    alert("A problem occured");
                }
            }
        });
    }
</script>