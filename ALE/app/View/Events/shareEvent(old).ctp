<?php
//pr($my_list);
//echo $url;    
?>
<p>Promotional text about sharing an event and the benefits of doing so, along with an explanation of how the various methods of sharing work, at least at a very broad-stroke level Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
<br/>
<label>My Event URL</label><br/>
<input type = "text" value = "<?php echo $url; ?>" readonly="readonly">
<br/>
<label>Invite my friends via emails</label><br/>
<input type = "button" value = "Share via email" onclick="javascript:$('#openinviter').show(600);">
<br/>
<div id = "openinviter" style="display:none;">
    <h1>Import Emails using third party(eg Gmail, Yahoo, Hotmail, Facebook)</h1>
    <br/>
    <ul>
        <li>
            <input type = "email" placeholder="Enter Email" id = "email_fetch">
        </li>
        <li>
            <input type = "password" placeholder="Enater Password" id = "password_fetch">
        </li>
        <li>
            <label>Choose Service Provider</label>
            <select id = "provider_fetch"><option value='' ></option><optgroup label='Email Providers'><option value='abv'>Abv</option><option value='aol'>AOL</option><option value='apropo'>Apropo</option><option value='atlas'>Atlas</option><option value='aussiemail'>Aussiemail</option><option value='azet'>Azet</option><option value='bigstring'>Bigstring</option><option value='bordermail'>Bordermail</option><option value='canoe'>Canoe</option><option value='care2'>Care2</option><option value='clevergo'>Clevergo</option><option value='doramail'>Doramail</option><option value='evite'>Evite</option><option value='fastmail'>FastMail</option><option value='fm5'>5Fm</option><option value='freemail'>Freemail</option><option value='gawab'>Gawab</option><option value='gmail'>GMail</option><option value='gmx_net'>GMX.net</option><option value='graffiti'>Grafitti</option><option value='hotmail'>Live/Hotmail</option><option value='hushmail'>Hushmail</option><option value='inbox'>Inbox.com</option><option value='india'>India</option><option value='indiatimes'>IndiaTimes</option><option value='inet'>Inet</option><option value='interia'>Interia</option><option value='katamail'>KataMail</option><option value='kids'>Kids</option><option value='libero'>Libero</option><option value='linkedin'>LinkedIn</option><option value='lycos'>Lycos</option><option value='mail2world'>Mail2World</option><option value='mail_com'>Mail.com</option><option value='mail_in'>Mail.in</option><option value='mail_ru'>Mail.ru</option><option value='meta'>Meta</option><option value='msn'>MSN</option><option value='mynet'>Mynet.com</option><option value='netaddress'>Netaddress</option><option value='nz11'>Nz11</option><option value='o2'>O2</option><option value='operamail'>OperaMail</option><option value='plaxo'>Plaxo</option><option value='pochta'>Pochta</option><option value='popstarmail'>Popstarmail</option><option value='rambler'>Rambler</option><option value='rediff'>Rediff</option><option value='sapo'>Sapo.pt</option><option value='techemail'>Techemail</option><option value='terra'>Terra</option><option value='uk2'>Uk2</option><option value='virgilio'>Virgilio</option><option value='walla'>Walla</option><option value='web_de'>Web.de</option><option value='wpl'>Wp.pt</option><option value='xing'>Xing</option><option value='yahoo'>Yahoo!</option><option value='yandex'>Yandex</option><option value='youtube'>YouTube</option><option value='zapak'>Zapakmail</option></optgroup><optgroup label='Social Networks'><option value='badoo'>Badoo</option><option value='bebo'>Bebo</option><option value='bookcrossing'>Bookcrossing</option><option value='brazencareerist'>Brazencareerist</option><option value='cyworld'>Cyworld</option><option value='eons'>Eons</option><option value='facebook'>Facebook</option><option value='faces'>Faces</option><option value='famiva'>Famiva</option><option value='fdcareer'>Fdcareer</option><option value='flickr'>Flickr</option><option value='flingr'>Flingr</option><option value='flixster'>Flixster</option><option value='friendfeed'>Friendfeed</option><option value='friendster'>Friendster</option><option value='hi5'>Hi5</option><option value='hyves'>Hyves</option><option value='kincafe'>Kincafe</option><option value='konnects'>Konnects</option><option value='koolro'>Koolro</option><option value='lastfm'>Last.fm</option><option value='livejournal'>Livejournal</option><option value='lovento'>Lovento</option><option value='meinvz'>Meinvz</option><option value='mevio'>Mevio</option><option value='motortopia'>Motortopia</option><option value='multiply'>Multiply</option><option value='mycatspace'>Mycatspace</option><option value='mydogspace'>Mydogspace</option><option value='myspace'>MySpace</option><option value='netlog'>NetLog</option><option value='ning'>Ning</option><option value='orkut'>Orkut</option><option value='perfspot'>Perfspot</option><option value='plazes'>Plazes</option><option value='plurk'>Plurk</option><option value='skyrock'>Skyrock</option><option value='tagged'>Tagged</option><option value='twitter'>Twitter</option><option value='vimeo'>Vimeo</option><option value='vkontakte'>Vkontakte</option><option value='xanga'>Xanga</option><option value='xuqa'>Xuqa</option></optgroup></select>
        </li>
        <li>
            <input type="button" value="Submit" onclick="javascript:fetchEmail();">
            <span id="load" class="loader" style="display:none"><img alt="" src="/img/loader.gif"></span>
    </ul>
</div>
<span id="result"></span>
<br/>
<label>OR</label><br/>
<label>Share via facebook</label><br/>
<div class="fb-share-button" data-href="<?php echo $url; ?>" data-type="button"></div>
<br/>
<label>OR</label><br/>
<label>Share via List</label><br/>
<?php
echo $this->Form->create("Event", array("action" => "inviteFromList"));
echo $this->Form->input("message", array("type" => "textarea", "value" => $url, "div" => false, "label" => false));
echo $this->Form->input("list", array("type" => "select", "div" => false, "label" => false, "options" => $my_list));
echo $this->Form->input("Invite", array("type" => "submit", "div" => false, "label" => false));
echo $this->Form->end();
?>
<script>
    function fetchEmail() {
        $("#load").show();
        var email = $("#email_fetch").val();
        var password = $("#password_fetch").val();
        var provider = $("#provider_fetch").val();
        if (email.trim() == "" || password.trim() == "" || provider.trim() == "") {
            alert("Please fill all details");
            $("#load").hide();
        } else {
            jQuery.ajax({
                url: "/Events/fetch/" + email + "/" + password + "/" + provider,
                type: "post",
                success: function(result) {
                    $("#load").hide();
                    $("#result").html(result);
                    $("#message").val("<?php echo $url; ?>");
                    $("#event_provider").val(provider);
                }
            });
        }


    }
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=657012471042663&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
               