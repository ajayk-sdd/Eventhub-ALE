<?php
if ($data["status"] == "OK") {
    ?>
    <ul>
        <?php
        $i = 0;
        foreach ($data["results"] as $dt) {
            $i++;
            $address_detail = explode(",", $dt["formatted_address"]);
            if ($address_detail[0]) {
                $full_address = $address_detail[0];
            } else {
                $full_address = "";
            }
            if ($address_detail[1]) {
                $city = $address_detail[1];
            } else {
                $city = "";
            }
            if ($address_detail[2]) {
                $state = $address_detail[2];
            } else {
                $state = "";
            }
            if ($address_detail[3]) {
                $country = $address_detail[3];
            } else {
                $country = "";
            }
            if ($dt["geometry"]["location"]["lat"]) {
                $lat = $dt["geometry"]["location"]["lat"];
                $lng = $dt["geometry"]["location"]["lng"];
            } else {
                // united states lat lng
                $lat = "38.8833";
                $lng = "77.0167";
            }
            if ($dt["name"]) {
                $name = $dt["name"];
            } else {
                $name = "";
            }
            ?>
            <li>
                <!--h5><?php //echo $i; ?></h5-->
                <p>
                    <?php
                    if ($dt["icon"]) {
                        echo $this->Html->image($dt["icon"], array("style" => "height:50px; width:50px;", "alt" => $i));
                    }
                    ?>


                    <a href="javascript:void(0);" onclick='javascript:getDetail(<?php echo '"' . $name . '","' . $full_address . '","' . $city . '","' . $state . '","' . $country . '","' . $lat . '","' . $lng . '"'; ?>);'><?php echo $dt["formatted_address"]; ?></a>
                    <br><?php echo $dt["name"]; ?>
                </p>
                <a class ="add-more-tt" href="javascript:void(0);" onclick='javascript:getDetail(<?php echo '"' . $name . '","' . $full_address . '","' . $city . '","' . $state . '","' . $country . '","' . $lat . '","' . $lng . '"'; ?>);'>Select</a>
            </li>
            <hr>
    <?php } ?>
    </ul>
    <?php
} else {
    echo $data["status"];
}