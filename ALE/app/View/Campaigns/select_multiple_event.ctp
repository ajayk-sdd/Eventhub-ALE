<h2>Events in this Email:</h2><br>
<?php
//pr($this->Session->read("CampaignEvent"));

if ($this->Session->check("CampaignEvent")) {
    $arr = $this->Session->read("CampaignEvent");
    if(!empty($arr))
    {
    echo "<ul  class='sp-hide-content show-hide-panel'>";
    foreach ($arr as $key => $ar) {
        //pr($ar);die;
        ?>
        <li><?php echo $ar["title"]; ?><a href="javascript:void(0);" onclick='javascript:selectThisEvent(<?php echo $key; ?>, "<?php echo $ar['title']; ?>", "<?php echo $ar['class']; ?>");'>Remove</a></li>
        <?php
    }
    echo "</ul>";
    echo '<div align="right" style="width: 100%; float: right; margin-top: 25px;">';
    if ($this->Session->check("campaign_edit")) {
        echo $this->Html->link("Save & Continue", array("controller" => "Campaigns", "action" => "chooseTemplate", base64_encode($this->Session->read("campaign_edit"))), array("class" => "clear-search"));
    } else {
        echo $this->Html->link("Save & Continue", array("controller" => "Campaigns", "action" => "chooseTemplate"), array("class" => "clear-search"));
    }
    echo '</div>';
}
else {
    echo "<b style='color:red;'>No Event Selected Yet</b>";
}
}else {
    echo "<b style='color:red;'>No Event Selected Yet</b>";
}
?>