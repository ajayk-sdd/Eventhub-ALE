<nav class="nav-rw">
    <div class="nav nav-afterlogin">
        <div class="center-block">
            <ul>
                <li class="active-li dropdown">
                     <?php echo $this->Html->link('Campaigns', BASE_URL."/Campaigns"); ?>
                </li>
                <li class="active-li dropdown">
                     <?php echo $this->Html->link('Templates', "javascript:void(0);"); ?>
                </li>
                <li>
                     <?php echo $this->Html->link('Lists', BASE_URL."/MyLists/myList"); ?>
                </li>
                <li>
                     <?php echo $this->Html->link('Reports', "javascript:void(0);"); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
