<div class="div15">
            <div >
                <H3 class="h2-color">DANH MỤC SẢN PHẨM</H3>
                <div class="div17">
                    <div class="div19">
                       <ul class="ul-list">
                        <?php foreach($layout['index']['left'] as $cat ): ?>
                          <li class="li-list" <?= $cat['active'] == 1?'active':'' ?> > <a href="<?= getURL($cat['uri']) ?>" class="a-list"><?= $cat['title']?></a></li>
                        <?php endforeach ?>  
                       </ul>
                    </div>
                </div>
            </div>
            <div class="div-martop">
                <H3 class="h2-color">VIDEO</H3>
               
                <?php for ($i=1;$i<=3;$i++): ?> 
                   <div class="div22">
                    <div>
                        <?= $layout['index']['video_'.$i]['iframe'] ?>
                    </div>
                  </div>
                <?php endfor; ?> 
            </div>
            <div>
               <div class="div22">
                  <iframe src="https://www.facebook.com/plugins/page.php?href=<?= $layout['index']['facebook']['value'] ?>&tabs=timeline&width=240&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=469524270532474" width="250px" height="380px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
              </div>
            </div>
</div>