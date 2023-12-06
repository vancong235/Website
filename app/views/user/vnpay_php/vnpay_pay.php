
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    html, body {
        height: 100%;
        background:#e9ecef;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>
</head>

<body>
    <?php require_once(dirname(dirname(dirname(__DIR__))) . '/config/config_vnpay.php'); ?>
    <?php
        $_SESSION['username'] = 'JohnDoe';

    ?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
        <div class="table-responsive p-5" style="background:white; border-radius: 20px; border: gray 1px solid;">
                <form action="http://localhost:82/Website/app/views/user/vnpay_php/vnpay_create_payment.php" id="frmCreateOrder" method="post">
                    <div class="form-group">
                        <h5 for="amount">Số tiền cần thanh toán:</h5>
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="<?= $data['tonggia_dh']; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="language1" name="language" value="vn" checked>
                            <label class="form-check-label" for="language1">Tiếng Việt</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="language2" name="language" value="en">
                            <label class="form-check-label" for="language2">Tiếng Anh</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Chuyển hướng đến cổng thanh toán VNPay</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>