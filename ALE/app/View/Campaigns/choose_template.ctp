<style>
    .box1-outer{ width:18%; margin:10px 10px; float:left;}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox-1.3.4.css" media="screen" />
<section class="inner-content">
    <div class="center-block">

        <div class="em-sec profile-whole">
            <h1>Create New Campaign</h1>
            <div class="breadcrumb">
                <ul>
                    <li class="active">Step 1: Template</li>
                    <li>Step 2: Design</li>
                    <li >Step 3: Recipients</li>
                    <li>Step 4: Preview</li>
                </ul>
            </div>


            <div class="createnewcampaign">
                <?php if($this->Session->check("CampaignEvent")){?>
                <p>You have choose <b><?php echo $this->Session->read("CampaignType");?></b> event <b><?php
                $arr = $this->Session->read("CampaignEvent");
                foreach ($arr as $ar){
                    echo $ar.",";
                }
                ?></b></p><br>
                <?php
                if($this->Session->check("CampaignType") && $this->Session->read("CampaignType")=="single")
                {
                    echo $this->Html->link("Change",array("controller"=>"Campaigns","action"=>"chooseEventSingle"),array("class"=>"smlpink_button"))."<br>";
                }
                else
                {
                    echo $this->Html->link("Change",array("controller"=>"Campaigns","action"=>"chooseEventMultiple"),array("class"=>"smlpink_button"))."<br>";
                }
                ?>
               
                <?php }?>
                <h3 class="title-text">Choose campaign template from below, or alternatively.</h3>
                <div style="border:1px solid #ccc;padding:10px"><h3><b>Custom HTML </b></h3>If you want to upload your own custom html code for an email that you have already designed. Click on &nbsp;
                <?php echo $this->Html->link("Upload HTML", 'javascript:void(0);', array("class"=>"smlpink_button", "onclick"=>"javascript:$('#myHTML').toggle();")); ?>
                <div style="display:none;" id = "myHTML">
                    <?php echo $this->Form->create("Template",array("action"=>"uploadCustomHtml"));
                          echo $this->Form->input("html",array("type"=>"textarea","label"=>FALSE,"div"=>FALSE,"placehoder"=>"Paste your html here","required","style"=>"width:100%;margin-top:10px;margin-bottom:10px"));
                          echo $this->Form->submit("Submit",array("class"=>"smlpink_button"));
                          echo $this->Form->end();
                    ?>
                </div>
                </div>
                <?php foreach ($datas as $data) { ?>
                    <div class="box1-outer">
                        <div class="box1">
                            <h5>
                            <?php if (strlen($data["EventTemplate"]["name"]) > 14) {
                                                        echo substr($data["EventTemplate"]["name"], 0, 10) . "..";
                                                    } else {
                                                        echo $data["EventTemplate"]["name"];
                                                    }
                                                     ?>
                            </h5>
                            <a class="imageOpen" href='<?php echo PARENT_URL."/img/template/large/".$data["EventTemplate"]["image"]; ?>'>
                            <?php echo $this->html->image(PARENT_URL."/img/template/small/" . $data["EventTemplate"]["image"],array("style"=>"width:200px;height:169px")); ?>
                            </a>
                        </div>
                        <?php echo $this->Html->link("Select", '/Campaigns/chooseTemplate/'.base64_encode($data["EventTemplate"]["id"]), array("class"=>"smlpink_button")); ?>
                        
                        &nbsp;&nbsp;
                        
                        <?php echo $this->Html->link("Preview", PARENT_URL."/img/template/large/".$data["EventTemplate"]["image"], array("class"=>"imageOpen smlpink_button","style"=>"margin-right:12px")); ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
<style>
    #displayImage{
        margin-left: 30%;
        opacity: 1;
        position: absolute;
        z-index: 99999;
    }
</style>
<script>
    $(".imageOpen").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none'
    });
</script>