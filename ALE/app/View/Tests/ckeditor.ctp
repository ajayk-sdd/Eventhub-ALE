
<link href="/css/evol.colorpicker.css" rel="stylesheet" />
<script src="/js/ckeditor.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/evol.colorpicker.js" type="text/javascript"></script>

<link href="/css/sample.css" rel="stylesheet">
<style>

    .ui-widget-content {
        background-color: #F8F8F8;
        border: 1px solid #DDDDDD;
        color: #333333;
    }

</style>

<script>
    function backgroundColor(color) {
        $(".my_focus").css("background-color", color);
        $(".my_focus").removeClass("my_focus");

    }
    function borderColor(color) {
        $(".my_focus").css("border", "1px solid " + color);
        $(".my_focus").removeClass("my_focus");
    }
    function textColor(color) {
        $(".my_focus").css("color", color);
        $(".my_focus").removeClass("my_focus");
    }
    function fullBackgroundColor(color) {
        $(".fulckeditor").css("background-color", color);
        $(".my_focus").removeClass("my_focus");
    }
    function fullBorderColor(color) {
        $(".fulckeditor").css("border", "1px solid " + color);
        $(".my_focus").removeClass("my_focus");
    }
    function fullTextColor(color) {
        $(".fulckeditor").css("color", color);
        $(".my_focus").removeClass("my_focus");
    }


    $(document).ready(function()
    {
        $('.cpBoth').colorpicker();
    });
    $('body').click(function() {
        $(".my_focus").removeClass("my_focus");
        $(".cke_focus").addClass("my_focus");
    });

</script>
<section class="inner-content">
    <div class="center-block">
        <div class="clear"></div>




        <div class='left-panel-box'>
            <h2>Background Color</h2>
            <input class="cpBoth" value="#31859b" onchange="javascript:backgroundColor(this.value);"/>
            <br>
            <h2>Border Color</h2>
            <input class="cpBoth" value="#31859b" onchange="javascript:borderColor(this.value);"/>
            <br>
            <h2>Text Color</h2>
            <input class="cpBoth" value="#31859b" onchange="javascript:textColor(this.value);"/>
            <br>
            <h2>Full Background Color</h2>
            <input class="cpBoth" value="#31859b" onchange="javascript:fullBackgroundColor(this.value);"/>
            <br>
            <h2>Full Border Color</h2>
            <input class="cpBoth" value="#31859b" onchange="javascript:fullBorderColor(this.value);"/>
            <br>
            <h2>Full Text Color</h2>
            <input class="cpBoth" value="#31859b" onchange="javascript:fullTextColor(this.value);"/>
        </div>
        <div class="fulckeditor" style="width:76%; float: right;">
            <!--------------------------------- full editor ---------------------->

            <div id="container">
               <?php echo $data["EventTemplate"]["html"];?>
            </div>



            <!------------------------- full editor------------------------------------------------->

        </div>



    </div>
    <div class="clear"></div>
</section>