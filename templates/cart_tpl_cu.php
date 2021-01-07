<?php //include _template."layout/breadcrumb.php"; ?>

<div class="table-cart-wrapper">

  <div class="container">

    <div class="row">

      <?php if (is_array($cart['product']) && !empty($cart['product'])): ?>

      <form action="" method="post" accept="utf-8" onsubmit="return cartSubmit();" style="max-width: 900px; display: block; margin: 15px auto; user-select: none; -webkit-user-select: none;">
        <div class="col-md-8 f col-xs-12 col-sm-12">
         <div class="title-footer text-uppercase">
          <span class="color-03">Thông Tin Đơn Hàng</span>
        </div>
        <div class="cart-table-container">

          <div class="cart-table">

           

            <div style="display: flex; margin-bottom: 10px;">
             <?php foreach ($cart['product'] as $k_product => $r_product): ?>
              <div>

                <a href="<?= getURL($r_product['uri']) ?>" class="thumbnail" style="width: 100px; height: 100px; text-align: center; margin-right: 10px; margin-bottom: 0;">


                  <img style="max-height: 100%;" src="<?= $r_product['thumbnail'] ?>">
                </a>

                <center style="width: 100px;">

                  <a href="javascript:void(0);" class=" btn btn-link text-danger" style="display: inline-block; color:red;" onclick="cartAjax({ action: 'removefromcart', id: '<?= $r_product['id'] ?>', msg: 'Đã xóa sản phẩm khỏi giỏ hàng!', lbl: 'label-danger' });">

                    <span style="color:red;" class="fa fa-trash-alt"></span>&nbsp;Xóa

                  </a>

                </center>

              </div>

              <div style="flex-grow: 1; position: relative; padding: 3px 5px 3px 0;">

                <div style="min-height: 50px; padding-bottom: 5px;">

                  <div style="color:#333;font-weight: bold; padding-bottom: 3px; max-width: calc(100% - 100px);"><?= $r_product['title'] ?></div>

                  <div class="text-muted"><?= $_SESSION['cart_type'][$r_product['id']] ?></div>

                  <span style="position: absolute; top: 3px; right: 5px; color: #f00; font-weight: bold;"><?= $r_product['price'] ?></span>

                  <del style="position: absolute; top: 24px; right: 5px; color: #777;"><?= $r_product['price_del'] ?></del>

                </div>

                <div>

                  <?php

                  $cid = explode("_", $r_product['id']);

                  $cid = $cid[0];

                  $db->query("select c.title as name, c.thumbnail as color, i.* from #_image c right join #_product_image i on c.id=i.color_id where i.product_id like '{$cid}'");

                  $colors = $db->result_array();

                  $r_color = getItems(array("table" => "image", "id" => intval(@$r_product['color_id'])));

                  if (!is_array($r_color) || empty($r_color))

                    $r_color = $colors[0];

                  $colors = array_merge(array(array(

                    "id" => "0",

                    "color_id" => intval(@$r_color['id']),

                    "color" => @$r_color['thumbnail'],

                    "name" => @$r_color['title'],

                    "thumbnail" => $r_product['thumbnail']

                  )), $colors);

                  foreach ($colors as $r_color) {

                    if(!is_array($r_product['colors'][$r_color['color_id']]))

                      $r_product['colors'][$r_color['color_id']] = array();

                    $r_product['colors'][$r_color['color_id']][] = array(

                      "title" => (@$r_color['name']!=""?$r_color['name']:"Mặc định"),

                      "color" => (@$r_color['color']!=""?$r_color['color']:"./assets/img/nocolor.png"),

                      "thumbnail" => $r_color['thumbnail']);

                  }

                  ?>

                                                  <!-- <select class="color-<?= $r_product['id'] ?> form-control" style="float: left; width: auto; height: 28px; padding: 0 10px;" onchange="$(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); cartAjax({ action: 'updatefromcart', id: '<?= $r_product['id'] ?>', msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', color_id: $(this).val() });">

                                                      <?php foreach ($r_product['colors'] as $k_c => $v_c): ?>

                                                          <option value="<?= $k_c ?>" <?= $_SESSION['cart_color'][$r_product['id']]==$k_c ? "selected" : "" ?>>

                                                              <?= $v_c[0]['title'] ?>

                                                          </option>

                                                      <?php endforeach ?>

                                                    </select> -->

                                                    <button type="button" class="btn" onclick="$(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); cartAjax({ action: 'updatefromcart', id: '<?= $r_product['id'] ?>', msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', quantity: Math.min(10, Number($(this).next().val())+1) });" style="float: right; border-radius: 0; height: 28px; width: 28px; padding: 0 0; text-align: center; font-weight: bold; padding: 5px 0; <?= intval($r_product['quantity'])>=10 ? "pointer-events: none; opacity: .5;" : ""; ?>">+</button>

                                                    <input type="text" class="form-control" readonly style="float: right; width: 44px; height: 28px; padding: 0 10px; text-align: center; background: transparent; border-radius: 0; cursor: default;" value="<?= $r_product['quantity'] ?>">

                                                    <button type="button" class="btn" onclick="$(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); cartAjax({ action: 'updatefromcart', id: '<?= $r_product['id'] ?>', msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', quantity: Math.max(1, Number($(this).prev().val())-1) });" style="float: right; border-radius: 0; height: 28px; width: 28px; padding: 0 0; text-align: center; font-weight: bold; padding: 5px 0; <?= intval($r_product['quantity'])<=1 ? "pointer-events: none; opacity: .5;" : ""; ?>">&minus;</button>

                                                  </div>

                                                </div>

                                              </div>

                                            <?php endforeach ?>

                                            <div style="display: flex;">

                                              <div style="flex-grow: 1;">Tổng tiền:</div>

                                              <div style="letter-spacing: 1px;"><?= $cart['total_price_del'] ?></div>

                                            </div>

                                            <div style="display: flex;">

                                              <div style="flex-grow: 1;">Giảm:</div>

                                              <div style="letter-spacing: 1px;">-<?= format(floatval(preg_replace('/\D/i', "", $cart['total_price_del'])) - floatval(preg_replace('/\D/i', "", $cart['total_price']))) ?>đ</div>

                                            </div>

                                            <div style="display: flex; font-size: 16px; font-weight: bold;">

                                              <div style="flex-grow: 1;">Cần thanh toán:</div>

                                              <div style="color: #f00; letter-spacing: 1px;"><?= $cart['total_price'] ?></div>

                                            </div>

                                          </div>

                                        </div>
                                      </div>
                                      

                                      <div class="col-md-6">
                                        <div >
                                          <div class="title-footer text-uppercase">
                                            <span class="color-03">Thông Tin Khách Hàng</span>
                                          </div>
                                          <div class="clearfix"></div>

                                          <span style="float: left; margin-right: 30px;">

                                            <input id="male" type="radio" name="gender" value="Nam" checked style="float: left; margin-top: 0; height: 20px; margin-right: 5px; cursor: pointer;">

                                            <label for="male" style="cursor: pointer;">Anh</label>

                                          </span>

                                          <span style="float: left;">

                                            <input id="famale" type="radio" name="gender" value="Nữ" style="float: left; margin-top: 0; height: 20px; margin-right: 5px; cursor: pointer;">

                                            <label for="famale" style="cursor: pointer;">Chị</label>

                                          </span>

                                          <div class="clearfix"></div>

                                        </div>

                                        <div style="margin-top: 10px; display: flex;">

                                          <input type="text" name="name" class="form-control" placeholder="Họ và tên" style="flex-grow: 1; margin-right: 5px;" required>

                                          <input type="text" name="tel" class="form-control" placeholder="Số điện thoại" style="flex-grow: 1; margin-left: 5px;" required>

                                        </div>

                                        <input type="text" name="email" class="form-control" placeholder="Nhập email" style="margin-top: 10px;">

                                        <div style="margin-top: 20px; display: flex; font-size: 16px;">

                                          <b>Để được phục vụ nhanh hơn,</b>&nbsp;hãy chọn thêm:

                                        </div>

                                        <div style="margin-top: 5px; display: flex;">

                                          <span style="float: left; margin-right: 30px;">

                                            <input id="delivery-1" data-target=".delivery-1" data-up=".delivery-2" type="radio" name="delivery" value="1" checked style="float: left; margin-top: 0; height: 20px; margin-right: 5px; cursor: pointer;">

                                            <label for="delivery-1" style="cursor: pointer;">Địa chỉ giao hàng</label>

                                          </span>

                           <!--  <span style="float: left;">

                                <input id="delivery-2" data-target=".delivery-2" data-up=".delivery-1" type="radio" name="delivery" value="2" style="float: left; margin-top: 0; height: 20px; margin-right: 5px; cursor: pointer;">

                                <label for="delivery-2" style="cursor: pointer;">Nhận hàng tại shop</label>

                              </span> -->

                              <div class="clearfix"></div>

                            </div>

                            <div style="margin-top: 10px; display: flex;">

                              <div class="delivery-1" style="background: #F0F0F0;-height: 500px; width: 100%;padding: 20px;position: relative;">

                                <div style="display: flex;">

                                  <select class="sel-province form-control" name="pid" id="province" style="margin-right: 5px; flex-grow: 1; width: auto;">

                                    <option value="">-- Chọn Tỉnh - Thành phố --</option>

                                    <?php $province = getItems(array("table" => "province"));?>

                                    <?php foreach ($province as $p): ?>

                                      <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>

                                    <?php endforeach ?>

                                  </select>

                                  <?php $district = getItems(array("table" => "district", "condition" => "where pid like '{$_SESSION['cart_pid']}'"));?>

                                  <div class="sel-district-container" style="margin-left: 5px; flex-grow: 1;">

                                  	<select class="sel-district form-control" name="did" id="district">

                                  		<option value="">-- Chọn Quận - Huyện --</option>

                                  		<?php foreach ($district as $d): ?>

                                  			<option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>

                                  		<?php endforeach ?>

                                  	</select>

                                  </div>

                                </div>

                                <input class="form-control" type="text" name="address" placeholder="Số nhà, tên đường, phường / xã" style="margin-top: 10px;">

                              <!-- <div style="margin-top: 15px;">

                              	<input id="staff" type="checkbox" name="staff" value="Yêu cầu nhân viên hỗ trợ kỹ thuật đi giao hàng" style="float: left; margin-right: 5px; margin-top: 0; height: 20px; cursor: pointer;">

                              	<label for="staff" style="cursor: pointer; margin-bottom: 0;">Yêu cầu nhân viên hỗ trợ kỹ thuật đi giao hàng</label>

                              </div> -->

                            </div>
<!-- 
                          <div class="delivery-2" style="display: none;background: #F0F0F0;-height: 500px; width: 100%;padding: 20px;position: relative;">

                              <div style="display: flex;">

                                  <input class="form-control" type="date" name="receive_date" min="<?= date("Y-m-d", time()) ?>" value="<?= date("Y-m-d", time()) ?>" style="margin-right: 5px; flex-grow: 1; width: auto;" required>

                                  <select class="form-control" name="store" style="margin-left: 5px; flex-grow: 1; width: auto;">

                                      <?php $store = getItems(array("table" => "image", "condition" => "where type like 'store' and enable>0 order by `index`"));?>

                                      <option value="">-- Chọn địa chỉ shop --</option>

                                       <?php foreach ($store as $s): ?>

                                          <option value="<?= $s['title'] ?>"><?= $s['title'] ?></option>

                                      <?php endforeach ?>

                                  </select>

                              </div>

                            </div> -->

                            <script>

                              $(document).ready(function () {

                                $('input[name="delivery"]').change(function () {

                                  if(this.checked) {

                                    $($(this).data("target")).fadeIn(500);

                                    $($(this).data("up")).fadeOut(0);

                                  }

                                });

                                $(".sel-province").change(function () {

                                	$.post("<?= getAjaxURL() ?>ajax_getdistrict.php", { pid: this.value }, function (res) {

                                		$(".sel-district-container").load(" .sel-district-container .sel-district");

                                	});

                                });

                                $(".sel-province").trigger("change");

                              });

                            </script>

                          </div>

                          <div style="margin-top: 10px; display: flex;">

                           <textarea class="form-control" name="content" rows="3" placeholder="Yêu cầu khác (không bắt buộc)" style="min-height: 74px; margin-top: 10px;" ></textarea>

                         </div>

                         <div style="margin-top: 20px; display: flex; justify-content: center;">

                          <button type="submit" name="orderbtn" class="btn btn-success" style="padding: 10px 20px;">

                            <p class="text-uppercase"><b>Thanh toán khi nhận hàng</b></p> 

                            <p>( Xem hàng trước, không mua không sao )</p>

                          </button>

                        </div>
                      </div>


                    </form>

                    <?php else: ?>

                      <div class="alert alert-warning" style="padding: 50px;">Giỏ hàng của bạn chưa có sản phẩm nào<br><br><a href="./" class="small">Bạn hãy mua hàng ngay nhé</a>

                      </div>

                    <?php endif ?>

                  </div>

                </div>

              </div>

              <style>

                body.cart #body {

                  background: #fff;

                }

                .table-cart th,

                .table-cart td {

                  vertical-align: middle !important;

                }

                .table-cart img {

                  margin: auto;

                }

                .btn >p 

                {

                  margin: 0;

                }

                .delivery-1:before

                {

                  content: '';

                  border-right: 12px solid transparent;

                  border-left: 12px solid transparent;

                  border-bottom: 14px solid #F0F0F0;

                  position: absolute;

                  bottom: 100%;

                  left: 61px;

                }

                .delivery-2:before

                {

                  content: '';

                  border-right: 12px solid transparent;

                  border-left: 12px solid transparent;

                  border-bottom: 14px solid #F0F0F0;

                  position: absolute;

                  bottom: 100%;

                  left: 216px;

                }

                .sel-province,.sel-district

                {

                  height: 38px;

                  -width: calc(100% - 100px);

                  flex-grow: 1;

                }

              </style>