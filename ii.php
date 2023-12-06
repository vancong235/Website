

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
    </head>
    <body>
    <?php
    require_once "http://localhost:82/Website/system/lib/session.php";
    require_once "http://localhost:82/Website/app/config/config.php";
    require_once "http://localhost:82/Website/system/lib/main.php";
    require_once "http://localhost:82/Website/system/lib/controller.php";
    require_once "http://localhost:82/Website/system/lib/database.php";
    require_once "http://localhost:82/Website/system/lib/model.php";
    require_once "http://localhost:82/Website/system/lib/load.php";
    require_once "http://localhost:82/Website/system/lib/Carbon-2.57.0/autoload.php";
  ?>
        <?php 
        require_once(dirname(dirname(dirname(__DIR__))) . '/config/config_vnpay.php');
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                    // Kiểm tra xem cookie có tồn tại không
                                    if (isset($_COOKIE['order_data'])) {
                                        // Giải mã chuỗi JSON thành mảng
                                        $orderData = json_decode($_COOKIE['order_data'], true);

                                        // Truy cập và sử dụng dữ liệu trong mảng
                                        $ma_dh = $orderData['ma_dh'];
                                        $ten_k = $orderData['ten_k'];
                                        $sdt_k = $orderData['sdt_k'];
                                        $ma_km = $orderData['ma_km'];
                                        $gioitinh_k = $orderData['gioitinh_k'];
                                        $diachi_k = $orderData['diachi_k'];
                                        $hinhthuc_thanhtoan = $orderData['hinhthuc_thanhtoan'];
                                        $tonggia_dh = $orderData['tonggia_dh'];
                                        $matkhau_k = $orderData['matkhau_k'];
                                        $donhang = new donhang();
                                        $donhang->dathangWithCookie($ma_dh, $ten_k, $sdt_k, $ma_km, $gioitinh_k, $diachi_k, $hinhthuc_thanhtoan, $tonggia_dh, $matkhau_k);

                                    }
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        echo "<br><br><br><a href='http://localhost:82/Website/giohang/giohang' class='button' style='background-color: red; color: white; padding: 10px 20px; text-decoration: none;'>Trở lại giỏ hàng</a>";
                        ?>
                    </label>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
