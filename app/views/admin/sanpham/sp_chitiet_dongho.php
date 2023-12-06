<div id="wrapper">
  <div class="content-page card-box">
    <div class="alert alert-success title_page" role="alert">
      Thêm thông tin chi tiết: Đồng hồ
    </div>
    <form action="<?php echo BASE_URL ?>sanpham/sp_chitiet_dongho_insert" method="POST" autocomplete="off">
      <table class="table">
        <tbody>
          <tr>
            <th scope="row">Sản phẩm: </th>
            <td class="was-validated">
              <select class="custom-select input_table" id="gender2" name="ma_sp">
                <option>Chọn sản phẩm</option>
                <?php
                  foreach ($data['sanpham_ma_dm'] as $key => $sp) {
                    ?>
                      <option value="<?php echo $sp['ma_sp'] ?>"><?php echo $sp['ten_sp'] ?></option>
                    <?php
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row">Đối tượng sử dụng</th>
            <td class="was-validated">
              <select class="custom-select input_table" id="gender2" name="doituong_sudung">
                <option>Chọn</option>
                <option value="1">Nữ</option>
                <option value="2">Nam</option>
                <option value="3">Trẻ em</option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row" class="title_table">Đường kính mặt: </th>
            <td class="was-validated">
              <input type='text' class='form-control input_table' required name="duongkinh_mat">
            </td>
          </tr>
          <tr>
            <th scope="row">Chất liệu mặt kinh</th>
            <td class="was-validated">
              <select class="custom-select input_table" id="gender2" name="chatlieu_kinh">
                <option>Chọn</option>
                <option value="1">Kính Sapphire</option>
                <option value="2">Kính khoáng (Mineral)</option>
                <option value="3">Nhựa Resin</option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row">Chất liệu dây</th>
            <td class="was-validated">
              <select class="custom-select input_table" id="gender2" name="chatlieu_day">
                <option>Chọn</option>
                <option value="1">Da thật</option>
                <option value="2">Da tổng hợp</option>
                <option value="3">Gốm sứ (Ceramic)</option>
                <option value="4">Thép không gỉ</option>
                <option value="5">Kim loại</option>
                <option value="6">Hợp kim</option>
                <option value="7">Vải</option>
                <option value="8">Silicone/Cao su</option>
                <option value="9">Nhựa</option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row" class="title_table">Chống nước: </th>
            <td class="was-validated">
              <input type='text' class='form-control input_table' required name="chongnuoc">
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <button type="submit" class="btn btn-outline-success font-weight-bold"
                name="insert_sp">
                <i class="fas fa-plus-square"></i>
                Thêm
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <div class="alert alert-success title_page" role="alert">
      <div class="row">
        <div class="col-6 mt-2">
          Thông tin chi tiết: Đồng hồ
        </div>
        <div class="col-6">
          <form class="d-flex" action="<?php echo BASE_URL ?>sanpham/sp_chitiet_dongho_timkiem"
            method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
              name="tukhoa">
            <button class="btn btn-success btn_search" type="submit"><i
                class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr class="tr_table">
          <th scope="col">STT</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Chi tiêt</th>
          <th scope="col">Quản lý</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        foreach ($data['sp_chitiet_dongho_list'] as $key => $ctsp) {
          $i++;
          ?>
        <tr>
          <th scope="row" style="width: 10%;"><?php echo $i ?></th>
          <td style="width: 30%;"><?php echo $ctsp['ten_sp'] ?></td>
          <td style="width: 45%;">
            <div class="row ">
              <div class="col-md-12">
                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                  style="height: 100px; overflow: auto;">
                  <p>
                    <b>Đối tượng sử dụng:</b>  
                      <?php 
                        if($ctsp['doituong_sudung'] == 1){
                          echo 'Nữ';
                        } else if($ctsp['doituong_sudung'] == 2){
                          echo 'Nam';
                        }else if($ctsp['doituong_sudung'] == 3){
                          echo 'Trẻ em';
                        }else{
                          echo ' ';
                        }
                      ?> <br>
                    <b>Đường kính mặt:</b>  <?php echo $ctsp['duongkinh_mat'] ?> <br>
                    <b>Chất liệu mặt kính:</b> 
                    <?php
                      if($ctsp['chatlieu_kinh'] == 1){
                        echo 'Kính Sapphire';
                      }else if($ctsp['chatlieu_kinh'] == 2){
                        echo 'Kính khoáng (Mineral)';
                      }else if($ctsp['chatlieu_kinh'] == 3){
                        echo 'Nhựa Resin';
                      }
                    ?> <br>
                    <b>Chất liệu dây:</b> 
                    <?php 
                      if($ctsp['chatlieu_day'] == 1){
                        echo 'Da thật';
                      }else if($ctsp['chatlieu_day'] == 2){
                        echo 'Da tổng hợp';
                      }else if($ctsp['chatlieu_day'] == 3){
                        echo 'Gốm sứ (Ceramic)';
                      }else if($ctsp['chatlieu_day'] == 4){
                        echo 'Thép không gỉ';
                      }else if($ctsp['chatlieu_day'] == 5){
                        echo 'Kim loại';
                      }else if($ctsp['chatlieu_day'] == 6){
                        echo 'Hợp kim';
                      }else if($ctsp['chatlieu_day'] == 7){
                        echo 'Vải';
                      }else if($ctsp['chatlieu_day'] == 8){
                        echo 'Silicone/Cao su';
                      }else if($ctsp['chatlieu_day'] == 9){
                        echo 'Nhựa';
                      }
                    ?> <br>
                    <b>Chống nước:</b> <?php echo $ctsp['chongnuoc'] ?> <br>
                  </p>
                </div>
              </div>
            </div>
          </td>
          <td style="width: 15%;">
            <a href="<?php echo BASE_URL ?>sanpham/sp_chitiet_dongho_edit/<?php echo $ctsp['ma_ctsp'] ?>">
              <button type="button" class="btn sua">
                <i class="fas fa-edit"></i>
              </button>
            </a>
            <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $ctsp['ten_sp'] ?> không?')"
              href="<?php echo BASE_URL ?>sanpham/sp_chitiet_dongho_delete/<?php echo $ctsp['ma_ctsp'] ?>">
              <button type="button" class="btn xoa">
                <i class="fas fa-trash-alt"></i>
              </button>
            </a>
          </td>
        </tr>
        <?php
        }
        echo '<p class="text-warning" style="font-weight: bold;">Tổng: ' . $i . '</p>';
        ?>
      </tbody>
    </table>
  </div>
  <!-- Vendor js -->
  <script src="<?php echo BASE_URL ?>public/assets\js\vendor.min.js"></script>

  <script src="<?php echo BASE_URL ?>public/assets\libs\morris-js\morris.min.js"></script>
  <script src="<?php echo BASE_URL ?>public/assets\libs\raphael\raphael.min.js"></script>

  <script src="<?php echo BASE_URL ?>public/assets\js\pages\dashboard.init.js"></script>

  <!-- App js -->
  <script src="<?php echo BASE_URL ?>public/assets\js\app.min.js"></script>
  <!-- trình soạn thảo  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
  <script>
  CKEDITOR.replace('thongtin_sp');
  </script>
  <!--  -->
</div>