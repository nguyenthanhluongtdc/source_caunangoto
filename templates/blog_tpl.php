<section class="container-fluid">
	<div class="container">
	      <div class="row">
	          <div style="margin: 40px">
	          		<div style="width: 100%;padding: 20px;margin: auto;">
	          			<div class="col-sm-7 col-sm-12">
	          				<div class="table">
	          					<ul style="border-bottom: none;display: flex;">
	          						<?php $dm_post = getItems(array('table'=>'category','condition'=>'where enable > 0 and type = "post" ') ) ?>  
	          						<?php foreach ($dm_post as $key): ?>
	          							<li class="li_blog" <?= $category['id'] == $key['id']?'active':'' ?> ><a class="a_blog" href="<?= getURL($key['uri'] )?>"><?= $key['title'] ?></a></li>
	          						<?php endforeach ?>
	          					</ul>
	          				</div>
	          			</div>
	          		</div>
	          		<section class="content_blog">
	          			<?php $post = getItems(array('table'=>'post','condition'=>'where enable > 0' )) ?>
	          			<?php foreach ($post as $cat => $post_list): ?>
	          			<div class="col-md-6 col-xs-12 ">
	          				<article class="item_blog">
	          					<div>
	          						<a href="<?= getURL($post_list['uri']) ?>">
	          							<img class="img_blog" src="<?= getResizedImageURL($post_list['thumbnail'],520,350,1,0) ?>" alt="">
	          						</a>
	          						<div class="post_blog">
	          							<h2>
	          								<a href="<?= getURL($post_list['uri']) ?>">
	          									<?= $post_list['title'] ?> 
	          								</a>
	          							</h2>
	          							<div>
	          								<span><?= date("d/m/yy",$post_list['create_date']); ?></span>
	          							</div>
	          							<p class="description_blog">
	          								<?= $post_list['description'] ?> 
	          							</p>
	          						</div>
	          					</div>
	          				</article>
	          			</div>
	          			<?php endforeach ?>
	          		</section>
	          </div>
	      </div>
	</div>
	<div class="see_blog">
		<button onclick="myFunction()" id="myBtn">Xem thêm</button>
	</div>
</section>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Xem thêm"; 
    moreText.style.display = "none";
  } else {
    }
}
</script>