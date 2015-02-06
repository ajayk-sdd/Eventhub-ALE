<section class="inner-content">
    <div class="center-block">
        <div class="em-sec">
            <h1>Preview Compaign</h1>
            <div class="breadcrumb">
                <ul>
                    <li>Step 1: Design</li>
                    <li>Step 2: Set Up</li>
                    <li class="active">Step 3: Preview</li>
                    <li>Step 4: Recipients</li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="mo-sec-inner previewcampaign-whole">

                    <div class="previewcampgn-inner">
                    	<h3>Please review the details of your campaign before sending:</h3>
                        <table>
                        	<thead>
                            	<th>Events Choosen</th>

                            </thead>
                            
                            <tbody>
                                <?php foreach ($event as $key => $value): ?>
                            	<tr>
                                    <td><?php echo $this->Html->link($value, 'javascript:void(0);', array("class"=>"evntchoosen","id"=>"addedEvent_".$key)); ?></td>

                                </tr>
                                <?php endforeach; ?>
                                
                                
                            </tbody>
                        </table>
                        
                        <div class="previewinner-sbmt-btn">
                         <?php echo $this->Html->link("Change", 'javascript:void(0);', array("class"=>"violet_button")); ?>
                        </div>
                    </div>
              
            </div>
            
            <?php echo $this->Html->link("Back", "/Campaigns/setUp/".base64_encode($campaign['Campaign']['id']), array("class"=>"violet_button")); ?>
	    <?php echo $this->Html->link("Next", "/Campaigns/campaignRecipient/".base64_encode($campaign['Campaign']['id']), array("class"=>"violet_button")); ?>
            <br/>
            
            <div class="offer-ld previewcampaign-img">
            	<h3>Preview Email</h3>
			<?php echo $campaign["Campaign"]["html"] ?>
                    
                </div>
            
            
            <span>Preview</span><br>
            <div style="border: 1px solid blueviolet; width: 640px; height: auto; padding: 20px;">
                <?php echo $campaign["Campaign"]["html"] ?>
            </div>

            <div class="clear"></div>
            <div class="breadcrumb">
                <ul>
                    <li>Step 1: Design</li>
                    <li>Step 2: Set Up</li>
                    <li class="active">Step 3: Preview</li>
                    <li>Step 4: Recipients</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Bottom Details Section Ends-->
<script>
    function remove_event(id) {
        jQuery.ajax({
            url: '/Campaigns/removeEvent/' + id,
            success: function(data) {
                if (data == 1) {
                    $("#addedEvent_" + id).remove();
                } else {
                    alert(data);
                }


            }
        });
    }
</script>