<?php include (_template."layout/titlebar.php") ?>

<section class="container-fluid padd_0im" style="margin-top: 40px;">
	<div id="content"> 								
		<main class="padding-top-mobile">
			<div id="blog-template" class="blog-template">
				<div class="pad1 padd_0im">
					<div class="row mar_0">
						<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
								<!-- Begin: Nội dung blog -->   
							<div class="content-post items">
							<?php foreach($row_post as $value) : ?>
								<div class="item">
									<h2> <a href="<?=getURL($value['uri'])?>"> <?=$value['title']?> </a> </h2>
									<div class="img" style="margin: 40px 0;">
										<img src="<?=$value['thumbnail']?>" alt="">
									</div>

									<p class="description">
										<?= $value['description'] ?>
									</p>

									<p class="read-more">
										<a href="<?=getURL($value['uri'])?>"> Read more <span class="dot">...</span> </a>
									</p>
								</div>
							<?php endforeach ?>
							</div>
						</div>
						<!--tin tuc moi nhât-->
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="row">
								<!-- <div class="post-new col-lg-12 col-md-6 col-sm-12 col-xs-12">
									<h2 class="title-post"> TIN TỨC MỚI NHẤT </h2>
									<ul class="list-post-new">
										<?php $post_new = getItems(array('table'=>'post','condition'=>'where enable > 0 and popular2 > 0')) ?>
										<?php foreach($post_new as $value) : ?>
											<li class="item-post item-post-new">
												<div class="img-post-new img-post-right">
													<a href="<?=getURL($value['uri'])?>"><img src="<?=$value['thumbnail']?>" alt=""></a>
												</div>
												<div class="title-post-new title-post-right">
													<a href="<?=getURL($value['uri'])?>"> <?=substr($value['description'], 0 , 40). '[...]' ?> </a>
												</div>
											</li>
										<?php endforeach ?>
									</ul>
									<?php if(count($post_new) >=4) { ?>
										<p class="show-more" >
											<a id="see-more-post-new" href="javascript:void(0);" style="text-align: center;"> 
												<b style="color: blue;"> Xem thêm  <i class="fas fa-sort-down"></i> </b>
											</a>
										</p>
										<style>
											.list-post-new{
												height: 350px;
											}
										</style>
									<?php } ?>
								</div> -->

								<div class="category_hot col-lg-12 col-md-6 col-sm-6 col-xs-12">
									<h2 class="title-post"> DANH MỤC NỔI BẬT </h2>
									<ul class="category_hot">
										<?php foreach($layout['index']['category_post_hot'] as $value) : ?>
											<li>
												<a href=""> <?=$value['title']?> </a>
											</li>
										<?php endforeach ?>
									</ul>
								</div>

								<div class="post-hot col-lg-12 col-md-6 col-sm-6 col-xs-12" >
									<h2 class="title-post"> TIN TỨC NỔI BẬT </h2>
									<ul class="list-post-hot">
										<?php $post_hot = getItems(array('table'=>'post','condition'=>'where enable > 0 and popular > 0')) ?>
										<?php foreach($post_hot as $value) : ?>
											<li class="item-post item-post-new">
												<div class="img-post-new img-post-right">
													<a href="<?=getURL($value['uri'])?>"> <img src="<?=$value['thumbnail']?>" alt=""> </a>
												</div>
												<div class="title-post-new title-post-right">
													<a href="<?=getURL($value['uri'])?>">
														<?=substr($value['description'], 0 , 40). '[...]' ?>
													</a>
												</div>
											</li>
										<?php endforeach ?>
									</ul>

									<?php if(count($post_hot) >=4) { ?>
										<p class="show-more" >
											<a id="see-more-post-hot" href="javascript:void(0);" style="text-align: center;"> 
												<b style="color: blue;"> Xem thêm  <i class="fas fa-sort-down"></i> </b>
											</a>
										</p>
										<style>
											.list-post-hot{
												height: 350px;
											}
										</style>
									<?php } ?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</section>
<style>
	.post-new{
		margin-bottom: 60px;
	}

	.category_hot{
		list-style: none;
		margin-top: 30px;
		padding-left: 15px;
	}

	.category_hot li a{
		color: black;
		padding: 5px;
		display: inline-block;
		width: 100%;
		text-decoration: none;
	}

	.category_hot li a:hover{
		background-color: #f0f0f0;
	}


	.item-post-main{
		margin-bottom: 50px;
	}

	.title-post{
		font-size: 16px;
		color: #000;
		font-weight: bold;
		position: relative;
	}

	.title-post:before{
		content: '';
		width: 15%;
		height: 2px;
		background: red;
		position: absolute;
		bottom: -15px;
		left: 0;
	}

	.item-post{
		display: flex;
		padding: 15px 0;
		border-bottom: 1px dotted #000;
	}

	.img-post-right{
		max-width: 30%;
		margin-right: 15px;
	}

	.title-post-right a{
		color: #111;
		font-size: 13px;
		text-decoration: none;
	}

	.title-post-right a:hover{
		color: #444;
	}

	.list-post-new, .list-post-hot{
		background: #f0f0f0;
		padding: 10px;
		border-radius: 5px;
		overflow: hidden;
	}

</style>

<script>
        $( document ).ready(function() {
            $("#see-more-post-new").click(function(){
                $('.list-post-new').css('height','auto');

                $(this).parent().css('display','none');
			})
			
			$("#see-more-post-hot").click(function(){
                $('.list-post-hot').css('height','auto');

                $(this).parent().css('display','none');
            })
        });
    </script>