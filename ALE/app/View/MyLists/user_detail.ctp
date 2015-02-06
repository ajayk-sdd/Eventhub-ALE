<?php
#pr($listUserDetail);
?>
<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap">
            <h1>User Detail</h1>
            <div class="repo-list reli-II" style="float:left;">
                
                <dl>
                  
                    <div class="clear"></div>
                    <dt>Email-Id</dt>
                    <dd><?php echo $listUserDetail['ListEmail']['email']; ?></dd>

                    <dt>First Name</dt>
                    <dd>
                    <?php
                    if(!empty($listUserDetail['ListEmail']['first_name']))
                        {
                            echo $listUserDetail['ListEmail']['first_name'];
                        }
                    else
                        {
                            echo '--'; 
                        }
                    ?>
                    </dd>

                    <dt>Last Name</dt>
                    <dd>
                    <?php
                    if(!empty($listUserDetail['ListEmail']['last_name']))
                        {
                            echo $listUserDetail['ListEmail']['last_name'];
                        }
                    else
                        {
                            echo '--'; 
                        }
                    ?>
                    </dd>
                   
                    <dt>Phone</dt>
                    <dd>
                    <?php
                    if(!empty($listUserDetail['ListEmail']['phone']))
                        {
                            echo $listUserDetail['ListEmail']['phone'];
                        }
                    else
                        {
                            echo '--'; 
                        }
                    ?>
                    </dd>
                                       
                    <dt>Categories</dt>
                    <dd>
                    <?php
                    if(!empty($listUserDetail['ListEmail']['categories']))
                        {
                            echo $listUserDetail['ListEmail']['categories'];
                        }
                    else
                        {
                            echo '--'; 
                        }
                    ?>
                    </dd>
                                       
                    <dt>Vibes</dt>
                    <dd>
                    <?php
                    if(!empty($listUserDetail['ListEmail']['vibes']))
                        {
                            echo $listUserDetail['ListEmail']['vibes'];
                        }
                    else
                        {
                            echo '--'; 
                        }
                    ?>
                    </dd>
                   
                    <dt>Regions</dt>
                    <dd>
                    <?php
                    if(!empty($listUserDetail['ListEmail']['regions']))
                        {
                            echo $listUserDetail['ListEmail']['regions'];
                        }
                    else
                        {
                            echo '--'; 
                        }
                    ?>
                    </dd>
                   
                   
                </dl>
                <div style="text-align:center;">
                   
                    <input type="button" onclick="javascript:history.back();" value="Go Back"> 
                </div>
            </div>
        </div>
    </div>
</section>

