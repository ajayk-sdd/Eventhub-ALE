<?php
//pr($report_setting);die;
ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
$filename = "User_list.xls"; //create a file
$xls_file = fopen('php://output', 'w');
//header('Content-type: application/vnd.ms-excel');
header('Content-type: application/excel');
header('Content-Disposition: attachment; filename="' . $filename . '"');
?>

<table>
    <tr>
        <td colspan="3" bgcolor="#246F97"></td>
        <td colspan="2" bgcolor="#246F97"><b><font color="#FFFFFF" size = "3;">Users Records</font></b></td>
        <td colspan="3" bgcolor="#246F97"></td>   
    </tr>
    <tr>
        <td><b><font color = "#246F97">Sr. No</font></b></td>
        <td><b><font color = "#246F97">Username</font></b></td>
        <td colspan="2"><b><font color = "#246F97">Email</font></b></td>
        <td><b><font color = "#246F97">Role</font></b></td>
        <td><b><font color = "#246F97">Status</font></b></td>
        <td><b><font color = "#246F97">Created Date</font></b></td>
        <td><b><font color = "#246F97">Modified Date</font></b></td>
    </tr>
    <?php
    $i = 0;
    foreach ($users as $user) {
        $i++;
        ?>
        <tr>
            <td bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php echo $i; ?></td>
            <td bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php
                if (!empty($user['User']['username']))
                    echo $user['User']['username'];
                else
                    echo "N/A";
                ?></td>
            <td colspan="2" bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php
                if (!empty($user['User']['email']))
                    echo $user['User']['email'];
                else
                    echo "N/A";
                ?></td>
            <td bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php
                if (!empty($user['Role']['name']))
                    echo $user['Role']['name'];
                else
                    echo "N/A";
                ?></td>
            <td bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php
                if ($user['User']['status'] == 1)
                    echo "Active";
                else
                    echo "Inactive";
                ?></td>
            <td bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php
                if (!empty($user['User']['created']))
                    echo date('m/d/Y', strtotime($user['User']['created']));
                else
                    echo "N/A";
                ?></td>
            <td bgcolor = "<?php if($i%2 == 0) echo '#d4d4d4'; else echo '#FFFFFF'; ?>"><?php
                if (!empty($user['User']['modified']))
                    echo date('m/d/Y', strtotime($user['User']['modified']));
                else
                    echo "N/A";
                ?></td>

        </tr>                 
        <?php
    }
    ?>
</table>
<?php
fclose($xls_file);
exit;
?>