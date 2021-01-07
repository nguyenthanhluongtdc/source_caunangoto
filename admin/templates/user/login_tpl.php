<canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></canvas></div>
<div id="particles-js">
    <div class="login-panel panel panel-primary" style="position: fixed; top: 40%; left: 50%; width: 30%; min-width: 300px; z-index: 99999; -webkit-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); -o-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <div class="panel-heading">
            <h3 class="panel-title">Vui lòng đăng nhập</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control required" placeholder="Tên đăng nhập" id="username" name="username" type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control required" placeholder="Mật khẩu" id="password" name="password" type="password" value="">
                    </div>
                    <div class="checkbox">
                        <label style="display: flex; align-items: center;">
                            <input id="showpassword" type="checkbox" style="margin-left: 0; margin-top: 0; position: unset; float: left; margin-right: 5px; width: 18px; height: 18px;">
                            <span style="user-select: none; -webkit-user-select: none; font-size: 15px; font-weight: bold;">Hiện mật khẩu</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                </fieldset>
            </form>
            <h5 class="label label-danger" <?=@$error!="" ? '' : 'style="display:none;"'?>><?=@$error?></h5>
        </div>
    </div>
</div>

<script src="../assets/js/particles.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#showpassword").change(function() {
        if($("#showpassword").is(":checked"))
            $("#password").attr("type", "text");
        else
            $("#password").attr("type", "password");
    });
});
</script>

<style>
    html, body {
        width: 100%;
        height: 100%;
        background: #F9F9F9;
    }
    canvas{
        display:block;
        vertical-align:bottom;
        position: absolute;
        top: 0;
        left: 0;    
    }
    .count-particles{
        background: #000022;
        position: absolute;
        top: 48px;
        left: 0;
        width: 80px;
        color: #13E8E9;
        font-size: .8em;
        text-align: left;
        text-indent: 4px;
        line-height: 14px;
        padding-bottom: 2px;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }
    .js-count-particles{
        font-size: 1.1em;
    }
    #stats,
    .count-particles{
        -webkit-user-select: none;
        margin-top: 5px;
        margin-left: 5px;
    }
    #stats{
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }
    .count-particles{
        border-radius: 0 0 3px 3px;
    }
    #particles-js{
        width: 100%;
        height: 100%;
        /*background-color: #b61924;*/
        background-image: url('');
        background-size: cover;
        background-position: 50% 50%;
        background-repeat: no-repeat;
    }
    .panel {
        background: rgba(255,255,255,.8);
    }
</style>

<script>
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 40,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#777"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 1,
                    "color": "#000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 5,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 200,
                "color": "#777",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 100
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true,
        "config_demo": {
            "hide_card": false,
            "background_color": "#000",
            "background_image": "",
            "background_position": "50% 50%",
            "background_repeat": "no-repeat",
            "background_size": "cover"
        }
    });
</script>