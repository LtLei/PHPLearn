<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>
        <meta charset="utf-8">
        <title>欢迎您学习PHP语言</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="/Public/Home/css/reset.css">
        <link rel="stylesheet" href="/Public/Home/css/supersized.css">
        <link rel="stylesheet" href="/Public/Home/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>Regist</h1>
            <form action="<?php echo U('Index/regist');?>" method="post" id="form">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="text" name="phone" class="phone" placeholder="Phone">
                <input type="email" name="email" class="email" placeholder="Email">
                <input type="text" name="sex" class="sex" placeholder="Sex : 男请输入0，女请输入1">
                <input type="password" name="password" class="password" placeholder="Password">
                <input type="password" name="password2" class="password2" placeholder="Ensure Password">
                <button type="button" class="register">Regist</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>

        <!-- Javascript -->
        <script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
        <script src="/Public/Home/js/supersized.3.2.7.min.js"></script>
        <script src="/Public/Home/js/supersized-init.js"></script>

        <script>
            $('.username').blur(function () {
                if ($('.username').val()==''){return;}
                $.ajax({
                    type: "POST",
                    url:"<?php echo U('Index/checkValid');?>",
                    data:$('.username').serialize(),// 序列化表单值
                    async: true,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        if(data.code==1){
                            alert(data.message);
                        }else{
                            alert(data.message);
                        }
                    }
                });
            });

            $('.register').click(function(){
                var user_name = $('.username').val();
                var phone = $('.phone').val();
                var email = $('.email').val();
                var sex = $('.sex').val();
                var user_pass = $('.password').val();
                var user_pass2 = $('.password2').val();

                if(user_name == '') {
                    $('.error').fadeOut('fast', function(){
                        $(this).css('top', '27px');
                    });
                    $('.error').fadeIn('fast', function(){
                        $('.username').focus();
                    });
                    return ;
                }
                if(phone == '') {
                    $('.error').fadeOut('fast', function(){
                        $(this).css('top', '96px');
                    });
                    $('.error').fadeIn('fast', function(){
                        $('.phone').focus();
                    });
                    return ;
                }
                if(email == '') {
                    $('.error').fadeOut('fast', function(){
                        $(this).css('top', '165px');
                    });
                    $('.error').fadeIn('fast', function(){
                        $('.email').focus();
                    });
                    return ;
                }
                if(sex == '') {
                    $('.error').fadeOut('fast', function(){
                        $(this).css('top', '234px');
                    });
                    $('.error').fadeIn('fast', function(){
                        $('.sex').focus();
                    });
                    return ;
                }
                if(user_pass == '') {
                    $('.error').fadeOut('fast', function(){
                        $(this).css('top', '303px');
                    });
                    $('.error').fadeIn('fast', function(){
                        $('.password').focus();
                    });
                    return ;
                }
                if(user_pass2 == '') {
                    $('.error').fadeOut('fast', function(){
                        $(this).css('top', '372px');
                    });
                    $('.error').fadeIn('fast', function(){
                        $('.password2').focus();
                    });
                    return ;
                }

                if (user_pass!=user_pass2){
                    alert("两次输入的密码不一致！")
                    return;
                }

                $.ajax({
                    type: "POST",
                    url:$('#form').attr('action'),
                    data:$('#form').serialize(),// 序列化表单值
                    async: true,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        if(data.code==1){
                            alert(data.message);
                            window.location.href = "<?php echo U('Index/home');?>";
                        }else{
                            alert(data.message);
                        }
                    }
                });
            });
        </script>
    </body>

</html>