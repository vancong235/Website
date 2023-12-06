<div id="wrapper">
  <div class="content-page card-box">
    <div class="alert alert-success title_page" role="alert">
      Thêm thông tin loại sản phẩm
    </div>
    <form action="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham_insert" method="POST"
      autocomplete="off">
      <table class="table">
        <tbody>
          <tr>
            <th scope="row" class="title_table">Tên: </th>
            <td class="was-validated">
              <input type='text' class='form-control input_table' required autofocus name="ten_lsp">
            </td>
          </tr>
          <tr>
            <th scope="row">Danh mục: </th>
            <td class="was-validated">
              <select class="custom-select input_table" id="gender2" name="ma_dm">
                <option >Chọn danh mục</option>
                <?php
                  foreach ($data['danhmuc_sanpham'] as $key => $dm){
                    ?>
                      <option value="<?php echo $dm['ma_dm'] ?>"><?php echo $dm['ten_dm'] ?></option>
                    <?php
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row">Icon: </th>
            <td class="was-validated">
              <input type='text' class='form-control input_table' required name="icon_lsp">
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <button type="submit" class="btn btn-outline-success font-weight-bold"
                name="insert_lsp">
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
          Thông tin loại sản phẩm
        </div>
        <div class="col-6">
          <form class="d-flex" action="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham_timkiem"
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
          <th scope="col">Tên</th>
          <th scope="col">Danh mục</th>
          <th scope="col">Icon</th>
          <th scope="col">Quản lý</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i=0;
          foreach($data['loai_sanpham'] as $key => $lsp){
            $i++;
            ?>
            <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $lsp['ten_lsp'] ?></td>
              <td><?php echo $lsp['ten_dm'] ?></td>
              <td><?php echo $lsp['icon_lsp'] ?></td>
              <td>
                <a href="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham_edit/<?php echo $lsp['ma_lsp'] ?>">
                  <button type="button" class="btn sua">
                    <i class="fas fa-edit"></i>
                  </button>
                </a>
                <a onclick="return confirm('Bạn có muốn xóa <?php echo $lsp['ten_lsp'] ?> không?')"
                  href="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham_delete/<?php echo $lsp['ma_lsp'] ?>">
                  <button type="button" class="btn xoa">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </a>
              </td>
            </tr>
            <?php
          }
          echo '<p class="text-warning" style="font-weight: bold;">Tổng: '.$i.'</p>';
          $level=session::get('level');
          if($level == 1){
            ?>
              <a onclick="return confirm('Bạn có muốn xóa tất cả không?')" href="<?php echo BASE_URL ?>loai_sanpham/loai_sanpham_deleteAll">
                <button type="button" class="btn" style="background-color: red; font-weight: bold; margin-bottom: 10px;">
                  <i class="fas fa-trash-alt"></i> Xoá tất cả
                </button>
              </a>
            <?php
          }
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
</div>