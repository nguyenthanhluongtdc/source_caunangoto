<?php if(@$action == "") $action = "edit"; ?>
<a href="<?=@$disabled!=""?"javascript:void(0);":str_replace("&act=list", "&act={$action}", getCurrentPageURL())?>" class="btn btn-success" <?=@$disabled!='' ? "disabled" : ""?>>Thêm mới</a>
