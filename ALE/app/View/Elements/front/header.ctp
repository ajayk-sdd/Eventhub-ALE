<div class="center-block">
    <div class="logo"> <?php echo $this->Html->link($this->Html->image('../img/front/logo.png'), array("controller" => "Users", "action" => "index"), array('escape' => false)); ?> </div>
    <div class="signup-block">
        <?php
        if (!AuthComponent::user('id'))
        { 
            if ($this->name == 'Users' && $this->action == 'index')
            { 
                echo $this->Html->link('Create Campaign', 'javascript:void(0);', array('class' => 'signup-link',"data-toggle"=>"modal", "data-target"=>"#sign_in"));
                echo $this->Html->link('Create List', 'javascript:void(0);', array('class' => 'signup-link',"data-toggle"=>"modal", "data-target"=>"#sign_in"));
            }
                echo $this->Html->link('Sign Up or Sign In', 'javascript:void(0);', array('class' => 'signup-link',"data-toggle"=>"modal", "data-target"=>"#sign_up","id"=>"headSignUp","style"=>"display:none"));
                echo $this->Html->link('Sign Up or Sign In', 'javascript:void(0);', array('class' => 'signup-link last',"data-toggle"=>"modal", "data-target"=>"#sign_in","id"=>"headSignIn"));
        
        }
        else
        {
        ?>
            <a class="signup-link" href="/users/viewProfile"><?php echo AuthComponent::user("username"); ?></a>
            <a class="signup-link" href="/users/logout">Log Out</a>
            <a class="signup-link last" href="javascript:void(0);"><?php if (isset($ALH_point))
            echo $ALH_point;
        else
            echo "N/A";
            ?> Points</a>
        <?php
        }
        ?>
        <?php
            echo $this->Html->link($this->Html->image('../img/front/cart-icon.png'), 'javascript:void(0);', array('escape' => false, 'class' => "cart-link"));
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
     if ($this->name != 'Users' && $this->action != 'index') { 
    echo $this->Element('front/logged_out_nav');
     }
} else {
    if (AuthComponent::user("role_id") == 2) {
        echo $this->Element('front/premium_member_nav');
    } else if (AuthComponent::user("role_id") == 3) {
        echo $this->Element('front/premium_member_nav');
    } else if (AuthComponent::user("role_id") == 4) {
        echo $this->Element('front/premium_member_nav');
    } else if (AuthComponent::user("role_id") == 1) {
        echo $this->Element('front/premium_member_nav');
    }
}
echo $this->Html->css('jquery-ui');
?>
<!------------------------ nav above --------------------------------------------->

<style>
    .ui-dialog{z-index: 9999999;}
</style>
<div id="dialog" title="Basic dialog" style="z-index: 999999;display: none;">
<p>Please click on Fetch Event button if you want to fetch your Facebook Event.</p>
</div>

