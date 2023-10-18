<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua thong tin nhan vien - Tran Duy Vu</title>
</head>
<body>
    <?php
        //1. ket noi
        include("ketnoi_tdv.php");
        //doc du lieu can sua
        if(isset($_GET["PROID_TDV"])){
            // lay ma nhan vien can sua
            $PROID_TDV = $_GET["PROID_TDV"];
            // tao truy van doc du lieu tu banh nhan vien theo ma nhan vien
            $sql_edit_tdv = "SELECT * FROM `product_tdv` PROID_TDV WHERE ='$PROID_TDV'";
            // thuc thi cau lenh truy van
            $result_edit_tdv = $conn_tdv->query($sql_edit_tdv);
            // doc ban ghi tu ket qua
            $row_edit_tdv = $result_edit_tdv->fetch_array();
        }else{
            header("Location: product-list-tdv.php");
        }
        // doc du lieu tu phong ban
        $sql_pb_tdv = "SELECT * FROM `catalog_tdv` WHERE 1=1";
        $res_pb_tdv = $conn_tdv->query($sql_pb_tdv);
        // => hien thi trong dieu kien select

        // thuc hien them du lieu
        $error_messenger_tdv = "";
        if(isset($_POST["btnSubmit_TDV"])){
            // lay du lieu tren form
            $PROID_TDV = $_POST["PROID_TDV"];
            $PRONAME_TDV = $_POST["PRONAME_TDV"];
            $QUANTITY_TDV = $_POST["QUANTITY_TDV"];
            $PRICE_TDV = $_POST["PRICE_TDV"];
            $TRANGTHAI_TDV = $_POST["TRANGTHAI_TDV"];
            $CAT_TDV = $_POST["CAT_TDV"];

            
            $sql_update_tdv = "UPDATE product_tdv SET";
            $sql_update_tdv .=" PROID_TDV = '$PROID_TDV',";
            $sql_update_tdv .=" $PRONAME_TDV = '$PRONAME_TDV',";
            $sql_update_tdv .=" $QUANTITY_TDV = '$QUANTITY_TDV',";
            $sql_update_tdv .=" $PRICE_TDV = '$PRICE_TDV',";
            $sql_update_tdv .=" $TRANGTHAI_TDV = '$TRANGTHAI_TDV',";
            $sql_update_tdv .=" $CAT_TDV = '$CAT_TDV',";
            $sql_update_tdv .=" WHERE PROID_TDV = '$PROID_TDV',";


            if($conn_tdv->query($sql_insert_tdv)){
                header("Location: product-list-tdv.php");
            }else{
                $error_messenger_tdv="Loi sua du lieu " . mysqli_error($conn_tdv); 
            }
        }
    ?>
    <section>
        <h1>Sua thong tin nhan vien - Tran Duy Vu</h1>
        <form name="frm_tdv" method="post" action="">
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <tbody>
                    <tr>
                        <td>Ma SP</td>
                        <td>
                            <input type="text" name="PROID_TDV" id="PROID_TDV">
                        </td>
                    </tr>
                    <tr>
                        <td>Ten SP</td>
                        <td>
                            <input type="text" name="PRONAME_TDV" id="PRONAME_TDV">
                        </td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>
                            <input type="text" name="QUANTITY_TDV" id="QUANTITY_TDV">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>Gia</td>
                        <td>
                            <input type="text" name="PRICE_TDV" id="PRICE_TDV">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>Trang thai</td>
                        <td>
                            <select name="TRANGTHAI_TDV">
                                <option value="1">Hoat dong</option>
                                <option value="0">Khong hoat dong</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nguoi dung</td>
                        <td>
                            <!-- // doc du lieu tu bang san pham -->
                            <select name="CATALOG_TDV" id="CATALOG_TDV">
                                <?php
                                    while($row = $res_pd_tdv->fetch_array()):
                                ?>
                                    <option value="<?php echo $row["CATALOG_TDV"]?>">
                                        <?php echo $row["NAME_TDV"]?>
                                    </option>
                                    <?php
                                        endwhile;
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Them -Tran Duy Vu" name="btnSubmit_TDV">
                            <input type="reset" value="Lam lai -Tran Duy Vu" name="btnReset_TDV">
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <div>
                <?php echo $error_messenger_tdv; ?>
            </div>
        </form>
        <a href="nhanvien_list_tdv.php">Danh sach nhan vien</a>
    </section>
</body>
</html>