<?php
$user = getUser();

/* Thông tin cấu hình bắt đầu tại đây */
// Thông tin mặc định
$row_config = array(
  "Sản phẩm & bài viết" => array(
    "Sản phẩm" => array("_product", "index.php?com=product&act=list"),
    "Bài viết" => array("_post", "index.php?com=post&act=list"),
    // "Đánh giá sản phẩm" => array("_review", "index.php?com=review&act=list"),
    "Thương hiệu" => array("brand_option", "index.php?com=option&act=list&type=brand&uri_enable=1"),
    // "Giới tính" => array("gender_option", "index.php?com=option&act=list&type=gender&uri_enable=1"),
    "Khoảng giá" => array("price_option", "index.php?com=option&act=list&type=price"),
    "Chất liệu" => array("masterial_option", "index.php?com=option&act=list&type=masterial"),
    "Phân loại mở rộng" => array("style_option", "index.php?com=option&act=list&type=style"),
    "Đồng hồ cặp đôi" => array("couple_option", "index.php?com=option&act=list&type=couple"),
    "Đơn hàng" => array("_order", "index.php?com=order&act=list"),
  ),
  // "Nội dung khác" => $row_extend,
  // "Hình ảnh & liên kết" => array(
  //   "Đối tác" => array("partner_option", "index.php?com=option&act=list&type=partner"),
  //   // "Video" => array("video_option", "index.php?com=option&act=list&type=video"),
  //   // "Thư viện ảnh" => array("gallery_option", "index.php?com=option&act=list&type=gallery"),
  //   "Hình ảnh trình chiếu" => array("slide_option", "index.php?com=option&act=list&type=slide"),
  //   "Liên kết mạng xã hội" => array("link_option", "index.php?com=option&act=list&type=link"),
  //   "Hotline top" => array("hotline-top_option", "index.php?com=option&act=list&type=hotline-top"),
  // ),
  "Giao diện" => array(
    "Thông tin chung" => array("layout-ui_graph", "index.php?com=graph&type=layout-ui"),
    "Trang chủ" => array("layout-index_graph", "index.php?com=graph&type=layout-index"),
    "Header" => array("layout-header_graph", "index.php?com=graph&type=layout-header"),
    "Footer" => array("layout-footer_graph", "index.php?com=graph&type=layout-footer"),
    "Phân loại danh mục" => array("classify_graph", "index.php?com=graph&type=classify"),
  ),
  "Tài khoản & tin liên hệ" => array(
    "Tin liên hệ" => array("contact_contact", "index.php?com=contact&act=list&type=contact"),
    // "Tài khoản cá nhân" => array("member_user", "index.php?com=user&act=list&type=member"),
    "Tài khoản quản trị" => array("_user", "index.php?com=user&act=list"),
  ),
  "Thiết lập" => array(
    "Quản lý themes" => array("_theme", "index.php?com=theme"),
    "Ngôn ngữ" => array("_language", "index.php?com=language&act=list", "master"),
    "Thông tin website" => array("_website", "index.php?com=website"),
    "Thông tin email" => array("_email", "index.php?com=email", "master"),
  ),
);
// Lấy thông tin từ thư mục theme (graph-sidebar.json)
if (is_file("./json/sidebar.json"))
  $row_config = getObjectVars(json_decode(file_get_contents("./json/sidebar.json")));
/* Thông tin cấu hình kết thúc tại đây */

?>
<ul class="nav nav-sidebar">
  <?php $row_com=array(); $i=1; foreach ($row_config as $k_config => $r_config): ?>
    <?php if (is_array($r_config) && !empty($r_config)): ?>
      <li class="active">
        <a style="background: #000; color: #fff;" data-toggle="collapse" href="#nav-<?= $i ?>" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> <?= $k_config ?><span class="fa arrow"></span></a>
      </li>
      <ul id="nav-<?= $i ?>" class="nav collapse">
      <?php foreach ($r_config as $k_c => $r_c): ?>
      	<?php if (is_array($r_c) && !empty($r_c) && (@$r_c[2]=="" || $user['type']==@$r_c[2])):
          $row_com[]=$r_c[0]."_".(count(explode("uri_enable=1", $r_c[1]))-1); ?>
	        <li>
	          <a style="background: #000; color: #fff;" data-id="#nav-<?= $i ?>" data-com="<?= $r_c[0] ?>" href="<?= $r_c[1] ?>"><?= $k_c ?></a>
	        </li>
        <?php endif ?>
      <?php endforeach ?>
      </ul>
    <?php $i++; endif ?>
  <?php endforeach;
  if (!in_array($_GET['com'], array( "", "category-extend", "product-extend", "post-extend" )) && !in_array($_GET['type']."_".$_GET['com']."_".intval($_GET['uri_enable']), $row_com)) show_error(); ?>
</ul>

<script type="text/javascript">
  $(document).ready(function() {
    $('a[data-toggle="collapse"]').click(function() {
      $(".nav.collapse:not(" + $(this).attr("href") + ")").collapse("hide");
    });
    $('[data-com="<?=$_GET['type']?>_<?=preg_replace('/(-+.*$)/', '', $com)?>"]').addClass("active");
    $($('[data-com="<?=$_GET['type']?>_<?=preg_replace('/(-+.*$)/', '', $com)?>"]').data("id")).collapse("show");
    if($("a.active").length == 0)
      $("#nav-1").collapse("show");
    $(window).resize(function () {
      setTimeout(function() {
        $("#content").css("min-height", ($(window).outerHeight() -
                $("#header").outerHeight()) + "px");
      });
    });
    $(window).trigger("resize");
  });
</script>

<style media="screen">
  .sidebar {
    position: relative;
    overflow: visible;
  }
  li.active {
    border-bottom: solid rgb(66,139,150) 1px;
  }
  ul.nav.collapse a.active {
    background: rgb(230,230,230);
  }
</style>
