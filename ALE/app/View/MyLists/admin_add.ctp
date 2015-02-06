<?php //pr($this->data);            ?>
<!--Content Wrapper Starts-->
<section id="cont_wrapper">
    <!--Content Starts-->
    <section class="content">
        <!--Main Heading Starts-->
        <h1 class="main_heading"> <?php echo $this->Html->link('Lists', '/admin/Lists/list'); ?></h1>
        <!--Main Heading Ends-->
        <!--Conetnt Info Starts Here-->
        <section class="content_info">
            <?php
            echo $this->Session->flash();
            echo $this->Form->create("MyList", array("action" => "add", "id" => "addListForm", 'enctype' => 'multipart/form-data'));
            echo $this->Form->input("MyList.id", array("type" => "hidden"));
            ?>
            <ul class="form">
                <li>
                    <?php echo $this->Form->input("MyList.user_id", array('type' => 'select', 'empty' => 'Select', 'options' => $user, 'div' => false, 'label' => "Owner", 'class' => 'validate[required] form_input')); ?>
                </li>
                <li>
                    <?php echo $this->Form->input("MyList.list_name", array("type" => "text", "label" => "List Name:*", "div" => false, "class" => "validate[required] form_input", "id" => "list_name")); ?>
                </li>
                <li>
                    <?php echo $this->Form->input("MyList.list_status", array('type' => 'select', 'empty' => 'Select', 'options' => array("Public" => "Public", "Private" => "Private", "public - Pending Approval" => "public - Pending Approval"), 'div' => false, 'label' => "Status", 'class' => 'validate[required] form_input')); ?>
                </li>



                <li>
                    <?php echo $this->Form->input("MyList.dedicated_send_points", array("type" => "text", "label" => "Dedicated Send Points:*", "div" => false, "class" => "validate[required] form_input", "id" => "specify")); ?>
                </li>
                <li>
                    <?php echo $this->Form->input("MyList.multi_event_points", array("type" => "text", "label" => "multi Event Points:*", "div" => false, "class" => "validate[required] form_input")); ?>
                </li>
                <li>
                    <?php echo $this->Form->input("MyList.max_email_per_week", array("type" => "text", "label" => "Max Email Per Week:*", "div" => false, "class" => "validate[required] form_input")); ?>
                </li>
                <?php
                // so that this field will not shown on edit time
                if (!isset($this->data["MyList"]["id"])) {
                    ?>
                    <li>
                        <table>	
                            <tr id="tickets">

                                <td>
                                    <?php echo $this->Form->input("ListEmail.email.", array("type" => "text", "label" => "Email*", "div" => false, "class" => "validate[required] form_input", "id" => "ticket_price"));
                                    ?>
                                </td>
                            </tr>
                            <tr style="display:block;" id="add">
                                <td>
                                    <?php echo $this->Html->link("+Add more emails", "javascript:void(0);", array('escape' => false, 'id' => 'add_more_single_row', 'id' => 'add_more')); ?>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <?php
                } else {
                    echo "<li><ul class='list-email'><li><label>Email</label></li>";
                    $list_email = $this->data["ListEmail"];
                    ?>

                    <?php
                    $f = 1;
                    foreach ($list_email as $lm) {
                        ?>
                        <li>
                            <?php
                            if ($f != 1) {
                                echo "<label></label>";
                            }
                            ?>
                            <label><?php echo $this->Form->input("ListEmail.email", array("id" => $lm["id"], "value" => $lm["email"], "label" => false, "div" => "false", "class" => "form_input", "onchange" => "javascript:edit_email(this.id,this.value);")); ?>
                                <span class="loader" id="load_<?php echo $lm['id']; ?>"><?php echo $this->html->image('/img/admin/loader.gif'); ?></span>
                            </label>
                        </li>
                        <?php
                        $f++;
                    }
                    ?> </ul></li>
<?php }
?>
            <li>
                <label>Categories (choose as many as you think apply)</label>
                <?php
                $j = 0;
                if (!empty($this->data["ListCategory"])) {
                    foreach ($this->data["ListCategory"] as $ec) {
                        $eve_cate[] = $ec["category_id"];
                    }
                } else {
                    $eve_cate = array();
                }
                foreach ($categories as $cat):
                    if (in_array($cat['Category']['id'], $eve_cate))
                        echo $this->Form->input("ListCategory.category_id", array("checked" => true, "name" => "data[ListCategory][category_id][]", "type" => "checkbox", "label" => $cat['Category']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $cat['Category']['id']));
                    else
                        echo $this->Form->input("ListCategory.category_id", array("name" => "data[ListCategory][category_id][]", "type" => "checkbox", "label" => $cat['Category']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $cat['Category']['id']));
                    $j++;
                    if ($j % 4 == 0)
                        echo "</li><li><label></label>";
                endforeach;
                ?>
            </li>
            <li>
                <label>Vibes (choose as many as you think apply)</label>
                <?php
                $i = 0;
                if (!empty($this->data["ListVibe"])) {
                    foreach ($this->data["ListVibe"] as $ev) {
                        $eve_vib[] = $ev["vibe_id"];
                    }
                } else {
                    $eve_vib = array();
                }
                foreach ($vibes as $vibe):
                    if (in_array($vibe['Vibe']['id'], $eve_vib))
                        echo $this->Form->input("ListVibe.vibe_id", array("checked" => true, "name" => "data[ListVibe][vibe_id][]", "type" => "checkbox", "label" => $vibe['Vibe']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $vibe['Vibe']['id']));
                    else
                        echo $this->Form->input("ListVibe.vibe_id", array("name" => "data[ListVibe][vibe_id][]", "type" => "checkbox", "label" => $vibe['Vibe']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $vibe['Vibe']['id']));
                    $i++;
                    if ($i % 4 == 0)
                        echo "</li><li><label></label>";

                endforeach;
                ?>
            </li>
            <li>
                <label>Regions (choose as many as you think apply)</label>
                <?php
                $i = 0;
                if (!empty($this->data["ListRegion"])) {
                    foreach ($this->data["ListRegion"] as $re) {
                        $eve_region[] = $re["region_id"];
                    }
                } else {
                    $eve_region = array();
                }
                foreach ($regions as $region):
                    if (in_array($region['Region']['id'], $eve_region))
                        echo $this->Form->input("ListRegion.region_id", array("checked" => true, "name" => "data[ListRegion][region_id][]", "type" => "checkbox", "label" => $region['Region']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $region['Region']['id']));
                    else
                        echo $this->Form->input("ListRegion.region_id", array("name" => "data[ListRegion][region_id][]", "type" => "checkbox", "label" => $region['Region']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $region['Region']['id']));
                    $i++;
                    if ($i % 4 == 0)
                        echo "</li><li><label></label>";

                endforeach;
                ?>
            </li>

            <section class="login_btn">
                <span class="blu_btn_lt">
                    <?php echo $this->Form->input("Reset", array("type" => "reset", "label" => false, "div" => false, "class" => "blu_btn_rt")); ?>
                </span>
                <span class="blu_btn_lt">
                <?php echo $this->Form->input("Submit", array("type" => "submit", "label" => false, "div" => false, "class" => "blu_btn_rt")); ?>
                </span>
            <?php echo $this->Form->end(); ?>
            </section>

            <?php if (isset($this->data["MyList"]["id"])) { ?>
                <h1>Import Emails using third party(eg Gmail, Yahoo, Hotmail, Facebook)</h1>
                <?php
                echo $this->Form->create("MyList", array("action" => "import", "id" => "addEmailForm", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden"));
                ?>
                <li>
                    <?php echo $this->Form->input("email", array('type' => 'text', "label" => "Email", "div" => false, "class" => "validate[required] form_input")); ?>
                </li>
                <li>
    <?php echo $this->Form->input("password", array("type" => "password", "label" => "Password:*", "div" => false, "class" => "validate[required] form_input", "id" => "list_name")); ?>
                </li>
                <li>
                    <label>Choose Service Provider</label>
                    <select  name='data[MyList][provider]' class="validate[required] form_input"><option value=''></option><optgroup label='Email Providers'><option value='abv'>Abv</option><option value='aol'>AOL</option><option value='apropo'>Apropo</option><option value='atlas'>Atlas</option><option value='aussiemail'>Aussiemail</option><option value='azet'>Azet</option><option value='bigstring'>Bigstring</option><option value='bordermail'>Bordermail</option><option value='canoe'>Canoe</option><option value='care2'>Care2</option><option value='clevergo'>Clevergo</option><option value='doramail'>Doramail</option><option value='evite'>Evite</option><option value='fastmail'>FastMail</option><option value='fm5'>5Fm</option><option value='freemail'>Freemail</option><option value='gawab'>Gawab</option><option value='gmail'>GMail</option><option value='gmx_net'>GMX.net</option><option value='graffiti'>Grafitti</option><option value='hotmail'>Live/Hotmail</option><option value='hushmail'>Hushmail</option><option value='inbox'>Inbox.com</option><option value='india'>India</option><option value='indiatimes'>IndiaTimes</option><option value='inet'>Inet</option><option value='interia'>Interia</option><option value='katamail'>KataMail</option><option value='kids'>Kids</option><option value='libero'>Libero</option><option value='linkedin'>LinkedIn</option><option value='lycos'>Lycos</option><option value='mail2world'>Mail2World</option><option value='mail_com'>Mail.com</option><option value='mail_in'>Mail.in</option><option value='mail_ru'>Mail.ru</option><option value='meta'>Meta</option><option value='msn'>MSN</option><option value='mynet'>Mynet.com</option><option value='netaddress'>Netaddress</option><option value='nz11'>Nz11</option><option value='o2'>O2</option><option value='operamail'>OperaMail</option><option value='plaxo'>Plaxo</option><option value='pochta'>Pochta</option><option value='popstarmail'>Popstarmail</option><option value='rambler'>Rambler</option><option value='rediff'>Rediff</option><option value='sapo'>Sapo.pt</option><option value='techemail'>Techemail</option><option value='terra'>Terra</option><option value='uk2'>Uk2</option><option value='virgilio'>Virgilio</option><option value='walla'>Walla</option><option value='web_de'>Web.de</option><option value='wpl'>Wp.pt</option><option value='xing'>Xing</option><option value='yahoo'>Yahoo!</option><option value='yandex'>Yandex</option><option value='youtube'>YouTube</option><option value='zapak'>Zapakmail</option></optgroup><optgroup label='Social Networks'><option value='badoo'>Badoo</option><option value='bebo'>Bebo</option><option value='bookcrossing'>Bookcrossing</option><option value='brazencareerist'>Brazencareerist</option><option value='cyworld'>Cyworld</option><option value='eons'>Eons</option><option value='facebook'>Facebook</option><option value='faces'>Faces</option><option value='famiva'>Famiva</option><option value='fdcareer'>Fdcareer</option><option value='flickr'>Flickr</option><option value='flingr'>Flingr</option><option value='flixster'>Flixster</option><option value='friendfeed'>Friendfeed</option><option value='friendster'>Friendster</option><option value='hi5'>Hi5</option><option value='hyves'>Hyves</option><option value='kincafe'>Kincafe</option><option value='konnects'>Konnects</option><option value='koolro'>Koolro</option><option value='lastfm'>Last.fm</option><option value='livejournal'>Livejournal</option><option value='lovento'>Lovento</option><option value='meinvz'>Meinvz</option><option value='mevio'>Mevio</option><option value='motortopia'>Motortopia</option><option value='multiply'>Multiply</option><option value='mycatspace'>Mycatspace</option><option value='mydogspace'>Mydogspace</option><option value='myspace'>MySpace</option><option value='netlog'>NetLog</option><option value='ning'>Ning</option><option value='orkut'>Orkut</option><option value='perfspot'>Perfspot</option><option value='plazes'>Plazes</option><option value='plurk'>Plurk</option><option value='skyrock'>Skyrock</option><option value='tagged'>Tagged</option><option value='twitter'>Twitter</option><option value='vimeo'>Vimeo</option><option value='vkontakte'>Vkontakte</option><option value='xanga'>Xanga</option><option value='xuqa'>Xuqa</option></optgroup></select>
                </li>
                <?php echo $this->Form->input("Submit", array("type" => "submit", "label" => false, "div" => false, "class" => "blu_btn_rt")); ?>
                <?php
                echo $this->Form->end();
            }
            ?>
            <?php if (isset($this->data["MyList"]["id"])) { ?>
                <h1>Import Emails using CSV file</h1>
                <?php
                echo $this->Form->create("MyList", array("action" => "importCsv", "id" => "addCsvForm", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden"));
                ?>
                <li>
                <?php echo $this->Form->input("file", array('type' => 'file', "label" => "File", "div" => false, "class" => "validate[required] form_input")); ?>
                </li>
                <?php echo $this->Form->input("Submit", array("type" => "submit", "label" => false, "div" => false, "class" => "blu_btn_rt")); ?>
                <?php
                echo $this->Form->end();
            }
            ?>
            </ul>


            <section class="clr_bth"></section>
        </section>
        <!--Conetnt Info Ends Here-->
    </section>
    <!--Content Ends-->
</section>
<!--Content Wrapper Ends-->
<?php
echo $this->Html->script("/js/admin/tiny_mce/tiny_mce");
echo $this->Html->script('/js/admin/List/admin_add');
?>
