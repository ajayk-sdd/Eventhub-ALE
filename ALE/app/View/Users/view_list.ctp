<style>
    .tableclass td, .tableclass th {
        border: 1px solid;
        height: 40px;
        width: 126px;
        text-align: center;
    }

</style>
<div class="repo-list reli-II">
<h2>List Detail</h2>
    <dl>
        <dt>Date of Last Send:</dt>  
        <dd><?php
            if (isset($listdetail["MyList"]["last_send"])) {
                echo date("l, F d, Y", strtotime($listdetail["MyList"]["last_send"]));
            } else {
                echo "N/A";
            }
            ?></dd>

        <dt># Contacts on List: </dt>
        <dd><?php echo $listdetail['MyList']["total_mail"]; ?>
        </dd>

        <dt>Opens: </dt>
        <dd><?php
            if ($listdetail["MyList"]["total_over_all"] > 0) {
                echo round((($listdetail["MyList"]["open_mail"] / $listdetail["MyList"]["total_over_all"]) * 100), 2) . "%";
            } else {
                echo "0%";
            }
            ?>
        </dd>

        <dt>Clicks: </dt>
        <dd><?php
            if ($listdetail["MyList"]["total_over_all"] > 0) {
                echo round((($listdetail["MyList"]["click_mail"] / $listdetail["MyList"]["total_over_all"]) * 100), 2) . "%";
            } else {
                echo "0%";
            }
            ?>
        </dd>

        <dt>Bounce: </dt>
        <dd><?php
            if ($listdetail["MyList"]["total_over_all"] > 0) {
                echo round((($listdetail["MyList"]["bounce_mail"] / $listdetail["MyList"]["total_over_all"]) * 100), 2) . "%";
            } else {
                echo "0%";
            }
            ?>
        </dd>

        <dt>Sent: </dt>
        <dd><?php
            if ($listdetail["MyList"]["total_over_all"] > 0) {
                echo round((($listdetail["MyList"]["sent_mail"] / $listdetail["MyList"]["total_over_all"]) * 100), 2) . "%";
            } else {
                echo "0%";
            }
            ?>
        </dd>

    </dl>
    <div class="clear"></div>

</div>
<div class="repo-list reli-II">
    <?php if(isset($lists) && !empty($lists))
    { ?>
    <table class="tableclass" style="width:100%">
        <tr>
            <th><b style="color: #006699;">Month</b></th>
            <th><b style="color: #006699;">Manual</b></th>
            <th><b style="color: #006699;">Import</b></th>
            <th><b style="color: #006699;">Existing</b></th>
            <th><b style="color: #006699;">Total</b></th>
        </tr>
        <?php
        foreach ($lists as $key => $val) {
            $sum = 0;
            ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php
                    if (isset($val[1])) {
                        echo $val[1];
                        $sum = $sum + $val[1];
                    } else {
                        echo 0;
                    }
                    ?>
                </td>
                <td><?php
                    if (isset($val[2])) {
                        echo $val[2];
                        $sum = $sum + $val[2];
                    } else {
                        echo 0;
                    }
                    ?>
                </td>
                <td><?php
                    if (isset($val[3])) {
                        echo $val[3];
                        $sum = $sum + $val[3];
                    } else {
                        echo 0;
                    }
                    ?>
                </td>
                <td><?php
                    echo $sum;
                    ?>
                </td>
            </tr>
        <?php }
        ?>
    </table>
    <?php }
    else
    {
        echo "<center>No Record Available for this List.</center>";
    }
        ?>
</div>  