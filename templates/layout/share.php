<div id="share"><iframe class="share-facebook" src="https://www.facebook.com/plugins/like.php?href=<?=urlencode(getCurrentPageURL())?>&width=112&layout=button&action=like&size=small&show_faces=false&share=true&height=20&appId=1493644617398477" width="112" height="20" style="border:none;overflow:hidden;text-align:right" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe><a class="share-messenger" href="#messenger_modal" data-toggle="modal"><img src="./assets/img/messenger.png" alt=""></a></div><div id="messenger_modal" class="modal fade" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><iframe src="https://www.facebook.com/plugins/page.php?href=<?=urlencode($information['facebook'])?>&tabs=messages&width=300&height=350&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=1493644617398477" width="300" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div></div></div><script>$(document).ready(function(){$("#messenger_modal .modal-dialog").css("top",(($(window).outerHeight()-350)/2)+"px")});</script><style type="text/css">#share{margin-top:10px;float:left}#messenger_modal .modal-dialog{width:max-content;width:-webkit-max-content;width:-moz-max-content;height:350px;overflow:hidden}#messenger_modal .modal-dialog .modal-content{border:0;box-shadow:none}#messenger_modal .modal-dialog button.close{position:absolute;top:5px;right:10px;font-size:30px;color:white;opacity:1}#share .share-facebook{float:left;height:20px;margin-top:2px;margin-right:3px}</style>