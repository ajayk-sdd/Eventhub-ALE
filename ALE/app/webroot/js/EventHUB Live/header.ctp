<div class="center-block">
    <div class="logo"> <?php echo $this->Html->link($this->Html->image('../img/front/logo.png'), array("controller" => "Users", "action" => "index"), array('escape' => false)); ?> </div>
    <div class="signup-block">
        <?php if (!AuthComponent::user('id')) { ?>
            <a data-toggle="modal" data-target="#sign_up" class="signup-link" id="headSignUp" href="javascript:void(0);" style="display:none">Sign Up or Sign In</a>
            <a data-toggle="modal" data-target="#sign_in" class="signup-link last" id="headSignIn" href="javascript:void(0);">Sign Up or Sign In</a>
        <?php } else {
            ?>
            <?php echo $this->html->link(AuthComponent::user("username"),array("controller"=>"Users","action"=>"viewProfile"),array("class"=>"signup-link"));?>
            <!--<a class="signup-link" href="/users/viewProfile"><?php echo AuthComponent::user("username"); ?></a>-->
            <?php echo $this->html->link("Log Out",array("controller"=>"Users","action"=>"logout"),array("class"=>"signup-link"));?>
            <!--<a class="signup-link" href="/users/logout">Log Out</a>-->
            <a class="signup-link last" href="javascript:void(0);"><?php echo $ALH_point; ?> Points</a>
        <?php }
        ?>
        <?php
        echo $this->Html->link($this->Html->image('../img/front/cart-icon.png'), array("controller"=>"Users","action"=>"cart"), array('escape' => false, 'class' => "cart-link"));
        ?>
    </div>
    <div class="clear"></div>
</div>
<div class="mobile-block">
    <div class="center-block"> <?php echo $this->Html->link('Nav 1', 'javascript:void(0);', array('class' => 'mobile-nav')); ?></div>
</div>
<!------------------------ nav below -------------------------------------------->
<?php
if (!AuthComponent::user('id')) {
    echo $this->Element('front/logged_out_nav');
} else {
    if (AuthComponent::user("role_id") == 2) {
        echo $this->Element('front/premium_member_nav');
    } else if (AuthComponent::user("role_id") == 3) {
        echo $this->Element('front/premium_member_nav');
    } else if (AuthComponent::user("role_id") == 4) {
        echo $this->Element('front/premium_member_nav');
    } else if (AuthComponent::user("role_id") == 1) {
        echo $this->Element('front/premium_member_nav');
    } else {
        echo $this->Element('front/premium_member_nav');
    }
}
?>
<!------------------------ nav above --------------------------------------------->


