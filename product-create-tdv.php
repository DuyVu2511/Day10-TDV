<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them moi thong tin san pham- Tran Duy Vu</title>
</head>
<body>
    <?php
        //1. ket noi
        include("ketnoi_tdv.php");
        //2. tao truy van doc du lieu tu bang
        $sql_pd_tdv = "SELECT * FROM `catalog_tdv` WHERE 1=1";
        $res_pd_tdv = $conn_tdv->query($sql_pd_tdv);
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

            //thuc hien them moi
            $sql_insert_tdv = "INSERT INTO `product_tdv` (`PROID_TDV`, `PRONAME_TDV`, `QUANTITY_TDV`, `PRICE_TDV`, `TRANGTHAI_TDV`, `CAT_TDV`)";
            $sql_insert_tdv .=" VALUES ('$PROID_TDV', '$PRONAME_TDV', '$QUANTITY_TDV', '$PRICE_TDV', '$TRANGTHAI_TDV', '$CAT_TDV')";

            if($conn_tdv->query($sql_insert_tdv)){
                header("Location: product-list-tdv.php");
            }else{
                $error_messenger_tdv="Loi them moi " . mysqli_error($conn_tdv); 
            }
        }
    ?>
    <section>
        <h1>Them moi thong tin san pham - Tran Duy Vu</h1>
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
        <a href="product-list-tdv.php">Danh sach san pham</a>
    </section>
</body>
</html>