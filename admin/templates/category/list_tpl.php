<div class="well"><span>Danh mục (<?=$pagination->count_item?>)</span></div>
    
<table class="table table-striped table-bordered text-center">
  <tbody><tr>
      <td class="text-left" colspan="15">
        <?php $action="quick_add"; include _template."input/add.php"; ?>
        <?php include _template."input/delall.php"; ?>
      </td>
    </tr>
    <tr>
      <td colspan="15" class="text-left">
        <form method="post" onsubmit="getFilter('<?=$filterStr?>'); return false;">
          &nbsp;&nbsp;&nbsp;<span class="text-muted">Lọc theo:</span>&nbsp;&nbsp;
          <input id="title" type="text" class="filter form-control" placeholder="Từ khóa" style="width: auto; display: inline-block; background: white;" autofocus value="<?=@$_SESSION[$filterStr]['title']?>">
          <select id="parent_id" class="filter form-control" style="width: auto; display: inline-block; background: white;" onchange="getFilter('<?=$filterStr?>');">
            <option value="">-- Danh mục cha --</option>
              <?php foreach ($filter_items as $fi): ?>
                <option value="<?=$fi['id']?>" <?=$fi['id']==@$_SESSION[$filterStr]['parent_id'] ? "selected" : ""?>>
                      <?=$fi['title']?>
                </option>
              <?php endforeach ?>
          </select>
          <button type="submit" class="btn btn-success" style="margin-top: -3px;">Lọc</button>
          <button class="btn btn-danger" onclick="$('.filter').val(''); getFilter('<?=$filterStr?>');" style="margin-top: -3px;">Xóa lọc</button>
        </form>
      </td>
    </tr>
    <tr>
      <th><input class="selallbox" type="checkbox" onclick="$('.selbox').trigger('click');"></th>
      <th>STT</th>
      <th>Tên danh mục</th>
      <?php if ($attribute_enable['list']['thumbnail'] == true): ?>
        <th>Ảnh đại diện</th>
      <?php endif ?>
      <?php foreach ($attribute_enable['list']['category'] as $k_attr => $v_attr): ?>
        <th><?= $v_attr ?></th>
      <?php endforeach ?>
      <!--<th>Mô-đun</th>-->
      <!-- <th>Đường dẫn</th> -->
      <?php foreach ($attribute_enable['list']['child'] as $k_attr => $v_attr): ?>
        <th style="white-space: nowrap;">Danh sách <?= $v_attr ?></th>
      <?php endforeach ?>
      <th>Thứ tự hiển thị</th>
      <th>Sửa</th>
      <th>Hiển thị</th>
      <?php foreach ($attribute_enable['list']['popular'] as $r_attribute): ?>
        <th><?= $r_attribute ?></th>
      <?php endforeach ?>
      <th>Xóa</th>
      <th>Nhân đôi</th>
    </tr>
    <?php $u=($pagination->current-1)*$pagination->max_item; foreach ($items as $value) { $u++; ?>
    <tr>
      <td>
        <?php include _template."input/checkbox.php"; ?>
      </td>
      <td><?=$u?></td>
      <td><b>
        <?php
        $url = getURL($value['uri'], true);
        $text = $value['title'];
        $current_page = false;
        include _template."input/link.php";
        ?>
      </b></td>
      <?php if ($attribute_enable['list']['thumbnail'] == true): ?>
        <td>
          <?php include _template."input/thumbnail.php" ?>
        </td>
      <?php endif ?>
      <?php foreach ($attribute_enable['list']['category'] as $k_attr => $v_attr): ?>
        <td>
          <?php
          if(intval(@$value[$k_attr]) > 0):
            $ptitle = getTranslate("category", $row_language[0]['id'], $value[$k_attr]);
            if(is_array($ptitle) && !empty($ptitle))
              echo getCategoryPath($value[$k_attr]);
            else
              echo '<b class="text-danger">Không có hoặc đã xóa danh mục!</b>';
          else:
            echo "...";
          endif;
          ?>
        </td>
      <?php endforeach ?>
      <!-- <td>
        <?php
        // $url = getURL($value['uri'], true);
        // $text = "Liên kết";
        // $current_page = false;
        // include _template."input/link.php";
        ?>
      </td> -->
      <?php foreach ($attribute_enable['list']['child'] as $k_attr => $v_attr): ?>
        <td>
          <?php
          $url = "index.php?com=category-{$k_attr}&act=list&type={$_GET['type']}&category_id=".$value['id'];
          $text = "Xem {$v_attr}";
          $current_page = true;
          include _template."input/link.php";
          ?>
        </td>
      <?php endforeach ?>
      <td><?= $value['index'] ?></td>
      <td>
        <?php $action="quick_add"; include _template."input/edit.php"; ?>
      </td>
      <td>
        <?php include _template."input/enable.php"; ?>
      </td>
      <?php foreach ($attribute_enable['list']['popular'] as $k_attribute => $r_attribute): ?>
        <td>
          <?php $column=$k_attribute; include _template."input/popular.php"; ?>
        </td>
      <?php endforeach ?>
      <td>
      	<?php include _template."input/delete.php"; ?>
      </td>
      <td>
      	<?php include _template."input/duplicate.php"; ?>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="15">
        <?php $act="quick_add"; include _template."input/add.php"; ?>
        <?php include _template."input/delall.php"; ?>
      </td>
    </tr>
</tbody></table>
      
<style type="text/css">
  .well {
    font-size: 30px;
    color: darkred;
    font-weight: bold;
    text-align: center;
  }
  .table th {
    text-align: center;
  }
  
  .table td {
    vertical-align: middle !important;
  }
</style>