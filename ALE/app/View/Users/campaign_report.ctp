<div class="repo-list reli-II">
                
                <?php if (!empty($campaign)) { ?>
                    <dl>
                        <dt>Delivered</dt>
                        <dd><?php echo date('l, F d, Y', strtotime($campaign["Campaign"]["date_to_send"])); ?>
                        </dd>

                        <dt>Status</dt>
                        <dd><?php
                            $today = date("Y/m/d");
                            if ($campaign['Campaign']['date_to_send'] > $today) {
                                echo "Upcoming";
                            } else {
                                echo "Sent";
                            }
                            ?>
                        </dd>

                        <dt>Recipients</dt>
                        <dd><?php echo $campaign["Campaign"]["total_mail"]; ?>
                        </dd>

                        <dt>Open Rate</dt>
                        <dd><?php
                            if ($campaign["Campaign"]["total_mail"] > 0) {
                                echo round((($campaign["Campaign"]["open_mail"] / $campaign["Campaign"]["total_mail"]) * 100), 2) . "%";
                            } else {
                                echo "0%";
                            }
                            ?>
                        </dd>

                        <dt>Bounce Rate</dt>
                        <dd><?php
                            if ($campaign["Campaign"]["total_mail"] > 0) {
                                echo round((($campaign["Campaign"]["bounce_mail"] / $campaign["Campaign"]["total_mail"]) * 100), 2) . "%";
                            } else {
                                echo "0%";
                            }
                            ?>
                        </dd>

                        <dt>Click Rate</dt>
                        <dd><?php
                            if ($campaign["Campaign"]["total_mail"] > 0) {
                                echo round((($campaign["Campaign"]["click_mail"] / $campaign["Campaign"]["total_mail"]) * 100), 2) . "%";
                            } else {
                                echo "0%";
                            }
                            ?>
                        </dd>

                    </dl>
                    <?php
                } else {
                    echo "<span style='color:red;'>Data Not Found</span>";
                }
                ?>
                
                <div class="clear"></div>
                
            </div>