<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap">
            <h1>Members: Sign In Here</h1>
            <div class="repo-list reli-II">
		 <?php
			if(isset($_GET['from']) && !empty($_GET['from']))
			  {
				  echo "<p  style='text-align: center; color: green; margin-bottom: 10px;'>You have been Successfully registered. Please check your mail and confirm your Email-id!</p>";
			  }
		
			if(isset($_GET['error']) && !empty($_GET['error']))
			  {
				  echo "<p  style='text-align: center; color: red; margin-bottom: 10px;'>".base64_decode($_GET['error'])."</p>";
			  }
		
			if(isset($_GET['succ']) && !empty($_GET['succ']))
		          {
		 		  echo "<p  style='text-align: center; color: green; margin-bottom: 10px;'>".base64_decode($_GET['succ'])."</p>";
			  }

		  ?>

                <?php
                echo $this->Session->flash();
                echo $this->Form->create("User", array("action" => "login", "id" => "addEvent"));
                echo $this->Form->input("list", array("type" => "hidden", "div" => false, "value" => "roles"));
                echo $this->Form->input("User.id", array("type" => "hidden"));
               if(isset($_GET['red']))
               {
                $red = $_GET['red'];
                echo $this->Form->input("red", array("type" => "hidden", "div" => false, "value" => $red));
               }
             
                  
               
               
                ?>
                <dl>
                    <div class="clear"></div>
                   <div align="center">
                    <a onclick="javascript:facebookLogin('/Users/index'),loader_open();" href="javascript:void(0);"><img alt="" src="/img/front/fb_icon.png"><img src="/img/front/loginfb.png"></a>
                     <div class="loader" id="loader_logins" style="font-size: 13px;display: none;float: left; width: 100%;">Please Wait..<br><img src="/img/admin/loader.gif" alt=""></div>
		     <h3>Or</h3>
                   </div>
                    <div class="clear"></div>
                    <dt>Username / Email-Id</dt>
                    <dd><?php echo $this->Form->input('username', array("placeholder" => "Username / Email","label" => '', 'class' => 'validate[required,minSize[3],maxSize[50]] input', 'div' => false, 'id' => 'adminUser', 'value' => $unameCookie, 'maxlength' => 50)); ?></dd>

                    <dt>Password</dt>
                    <dd><?php echo $this->Form->input('password', array('placeholder' => "Password","label" => '', 'class' => 'validate[required] input', 'div' => false, 'id' => 'adminPass', 'value' => $passCookie));  ?>
                    </dd>
                   <dt  class="empty-btm-dt">&nbsp;</dt>
                   <dd><?php echo $this->Form->checkbox('rememberme', array('value' => 1)) . "<span> Remember Me</span>"; ?>
                   <a data-toggle="modal" data-target="#forgot_password" class=" signup-link last underline" id="modal-forgot" href="javascript:void(0);" style="">Forgot your Password ?</a>
                   </dd>
                </dl>
                
 
                <dl><dt  class="empty-btm-dt">&nbsp;</dt><dd >
                    <?php echo $this->Form->submit('Login', array('class' => 'blu_btn_rt', "div"=>false)); ?>
                    <input type="button" onclick="javascript:history.back();" value="Go Back">
                    <a href="javascript:void(0);" class="sign-up btn-new">Sign Up</a>
                    
                </dd></dl>
                <div class="clear"></div>
                <?php echo $this->Form->end(); ?>
               
                 
                 <div class="fb-connect-button-wrapper fb-wrapper">

					

					</div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
function loader_open() {
    
   $("#loader_logins").show();
}
</script>

<?php echo $this->Html->script('/js/Front/facebook'); 
 echo $this->Html->script('/js/Front/Events/createEvent'); ?>