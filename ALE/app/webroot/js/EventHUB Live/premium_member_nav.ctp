<nav class="nav-rw">
    <div class="nav nav-afterlogin">
        <div class="center-block">
            <ul>
                <li class="active-li dropdown"> <a href="javascript:void(0);">MY HUB <span>p</span></a> 
                    <ul>
                        <li><a href="<?php echo BASE_URL; ?>/Events/calendar"> <img src="/img/front/calender-icon.png">Calendar</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/events/createEvent"> <img src="/img/front/create-icon.png">Create</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/users/viewProfile"> <img src="/img/front/manage-icon.png">Manage</a></li>
                        <li><a href="<?php echo BASE_URL; ?>javascript:void(0);"> <img src="/img/front/marketing-icon.png">Marketing</a></li>
                        <li><a href="<?php echo BASE_URL; ?>javascript:void(0);"> <img src="/img/front/email-icon.png">Email</a></li>
                    </ul>
                </li>
                <li class="active-li dropdown"> <a href="#">EVENTS <span>p</span></a> 
                    <ul>


                        <li><a href="<?php echo BASE_URL; ?>/Events/calendar">Browse Events</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/Events/myCalendar">My Calendar</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/Events/createEvent">Add an Event</a></li>
                        <?php if ($count_my_event > 0) { ?> 
                            <li><a href="<?php echo BASE_URL; ?>/Events/MyEventList">My Added Events</a></li>
                        <?php } ?>
                            
                        <?php
                        $log_user = $this->Session->read('Auth.User');
                        if (isset($log_user['role_id']) && $log_user['role_id'] == 4) {
                            ?>
                            <li><a href="<?php echo BASE_URL; ?>/Events/myWpplugin">My Wordpress Plugin</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);">SERVICES <span>p</span></a> 
                    <ul>
                        <li><a href="<?php echo BASE_URL; ?>/Services/promotionalPackages">Alist Promotion Packages </a></li>
                        <li><a href="<?php echo BASE_URL; ?>/Services/alacartePromotionalService">Alist A La Carte Services </a></li>
                        <li><a href="<?php echo BASE_URL; ?>/MyLists/premiumList">Available Public Lists </a></li>
                    </ul>
                </li>
                <li> 
<!--                    <a href="/Services/exchangeMarket">EXCHANGE MARKETPLACE </a> -->

                </li>
                <!--                <li> <a href="/Events/ticketGiveawayMultiple">GIVE AWAYS</a> </li>-->
            </ul>
        </div>
    </div>
</nav>