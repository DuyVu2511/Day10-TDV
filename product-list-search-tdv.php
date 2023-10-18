<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH SẢN PHẨM - TRẦN DUY VŨ</title>
</head>
<body>
    <?php 
        // Đọc dữ liệu và hiển thị
        //1. kết nối
        include("ketnoi_tdv.php");
        //2. tạo truy vấn đọc dữ liệu từ bảng
        $sql_tdv = "SELECT * FROM PRODUCT_TDV WHERE 1=1 ";
        // xử lý khi tìm kiếm
        if(isset($_GET["btnSearch"])){
            $keyword = $_GET["keyword"];
            if(isset($keyword)){
                $sql_tdv .=" and PRONAME_TDV like '%$keyword%'";
            }
        }
        //3. Thực thi câu lệnh truy vấn
        $result_tdv = $conn_tdv->query($sql_tdv);
        //4. duyệt và hiển thị -> tbody

    ?>
    <section>
        <h1>DANH SÁCH SẢN PHẨM - TRẦN DUY VŨ</h1>
        <hr/>
        <form action="" method="get">
            <div>
                <label for="keyword">Tên sản phẩm</label>
                <input type="search" name="keyword" value="" id="keyword" placeholder="Nhập tên cần tìm..."/>
                <input type="submit" name="btnSearch" value="Tìm kiếm" />
            </div>
        </form>
        <table width="100%" border="1px">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Trạng thái</th>
                    <th>Mã loại</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($result_tdv->num_rows>0){
                        $stt=0;
                        while($row_tdv=$result_tdv->fetch_array()):
                            $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $row_tdv["PROID_TDV"]; ?></td>
                        <td><?php echo $row_tdv["PRONAME_TDV"]; ?></td>
                        <td><?php echo $row_tdv["QUANTITY_TDV"]; ?></td>
                        <td><?php echo $row_tdv["QUANTITY_TDV"]*$row_tdv["PRICE_TDV"]; ?></td>
                        <td><?php echo $row_tdv["PRICE_TDV"]; ?></td>
                        <td><?php echo $row_tdv["TRANGTHAI_TDV"]; ?></td>
                        <td><?php echo $row_tdv["CATID_TDV"]; ?></td>
                        <td>
                            <a href="product-edit-tdv.php?proid_tdv=<?php echo $row_tdv["PROID_TDV"];?>">
                                Sửa
                            </a>
                            |
                            <a href="product-list-tdv.php?proid_tdv=<?php echo $row_tdv["PROID_TDV"];?>"
                                onclick="if(confirm('Bạn có muốn xóa không')){return true;}else{return false;}">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php 
                        endwhile;
                    }else{
                ?>
                    <tr>
                        <td colspan="9">Chưa có dữ liệu</td>
                    </tr>
                <?php
                    };
                ?>
            </tbody>
        </table>
    </section>

    <?php 
        //  xử lý với chức năng xóa
        if(isset($_GET["proid_tdv"])){
            // thực hiện xóa sản phẩm theo proid_tdv
            $proid_tdv = $_GET["proid_tdv"];
            // tạo truy vấn xóa
            $sql_delete_tdv = "DELETE FROM PRODUCT_TDV WHERE PROID_TDV='$proid_tdv'";
            // Thực thi truy vấn
            if($conn_tdv->query($sql_delete_tdv)){
                header("Location:product-list-tdv.php");
            }else{
                echo "<script> alert('lỗi xóa'); </script>";
            }
        }
    ?>
</body>
</html>