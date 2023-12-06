<div id="wrapper">
  <div class="content-page card-box">
    <div class="alert alert-success title_page" role="alert">
      Đơn hàng mới
    </div>
    <table class="table table-hover">
      <thead>
        <tr class="tr_table">
          <th scope="col">STT</th>
          <th scope="col">Thông tin khách</th>
          <th scope="col">Mã đơn hàng</th>
          <th scope="col">Tổng giá</th>
          <th scope="col">Thời gian đặt</th>
          <th scope="col">Tình trạng đơn hàng</th>
          <th scope="col">Quản lý</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        foreach ($data['donhang_moi'] as $key => $dh) {
          $i++;
          ?>
            <tr>
              <th scope="row" ><?php echo $i ?></th>
              <td >
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20" style="height: 100px; overflow: auto;">
                      <p>
                        <b>Tên:</b> <?php echo $dh['ten_k'] ?> <br>
                        <b>Số điện thoại:</b> <?php echo $dh['sdt_k'] ?> <br>
                        <b>Giới tính:</b>
                        <?php
                        if ($dh['gioitinh_k'] == 1) {
                          echo 'Nam';
                        } else if ($dh['gioitinh_k'] == 2) {
                          echo 'Nữ';
                        } else {
                          echo '';
                        }
                        ?> <br>
                        <b>Địa chỉ:</b> <?php echo $dh['diachi_k'] ?> <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td ><?php echo $dh['ma_dh'] ?></td>
              <td ><?php echo number_format($dh['tonggia_dh'], 0, ',', '.') . ' <sup>đ</sup>' ?></td>
              <td ><?php echo $dh['ngaylap_dh'] . '  ' . $dh['giolap_dh'] ?></td>
              <td ><?php echo $dh['hinhthuc_thanhtoan'] ?></td>
              <td >
                <a href="<?php echo BASE_URL ?>donhang/chitiet_donhang/<?php echo $dh['ma_dh'] ?>">
                  <button type="button" class="btn sua" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chi tiết đơn hàng">
                    <i class="fa-solid fa-circle-info"></i>
                  </button>
                </a>
                <a href="<?php echo BASE_URL ?>donhang/inhoadon/<?php echo $dh['ma_dh'] ?>" target="_blank">
  <button type="button" class="btn in-hoa-don" data-bs-toggle="tooltip" data-bs-placement="bottom" title="In hóa đơn">
    <i class="fas fa-file-invoice"></i>
  </button>
</a>
                <?php
                if ($dh['tinhtrang_dh'] == 0) {
                ?>
                  <a href="<?php echo BASE_URL ?>donhang/xuly_m/<?php echo $dh['ma_dh'] ?>">
                    <button type="button" class="btn moi" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Xử lý đơn hàng">
                      <i class="fa-solid fa-circle-plus"></i>
                    </button>
                  </a>
                  <a onclick="return confirm('Bạn có muốn huỷ đơn hàng không?')" href="<?php echo BASE_URL ?>donhang/huy_m/<?php echo $dh['ma_dh'] ?>">
                    <button type="button" class="btn xoa" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Huỷ đơn hàng">
                      <i class="fa-solid fa-ban"></i>
                    </button>
                  </a>
                <?php
                } else if ($dh['tinhtrang_dh'] == 1) {
                ?>
                 
                <?php
                } else if ($dh['tinhtrang_dh'] == 2) {
                ?>
                
                <?php
                }
                ?>
              </td>
            </tr>
          <?php
        }
        echo '<p class="text-warning" style="font-weight: bold;">Tổng: ' . $i . ' đơn hàng' . '</p>';
        ?>
      </tbody>
    </table>
  </div>
</div>