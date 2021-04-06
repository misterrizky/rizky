<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Happy Anniversary Dwi Oktavia</title>
    <link rel="stylesheet" href="{{asset('css/anniversary.css')}}" type="text/css" />
    <link rel="icon" href="{{ asset('images/icon.png') }}">
</head>
<body>
    <section id="loader" style="pointer-events:none;">
        <div class="container"> 
          <div class="os-phrases" id="os-phrases">
            <h2>Welcome</h2>
          </div>
        </div><!-- /container -->
    </section>
    <section id="login">
      <div id="login-box">
        <div>      
          <center><h1>Welcome Dwi Oktavia</h1></center>
          <h1>Please Enter Your Password</h1>
          <input type="password" placeholder="Password" name="password">
        </div>
      </div>
    </section>
    <section>
    <div class="content">
       <div class="lyrics"></div>
    </div>
    </section>
    <div class="envelope">
      <input class="envelope__check" type="checkbox"/>
      <div class="envelope__flap envelope__flap--inside"></div>
      <div class="envelope__flap"></div>
      <div class="envelope__letter">
        <div class="letter">
          <div class="letter__content">
            <h3 class="topic" style="margin-bottom:10px;"><span class="small">FOR MY DEAR:</span><br>DWI OKTAVIA</h3>
            <p style="font-size:30px;margin:0;">Happy Anniversary!</p>
          </div>
          <div class="letter__content"></div>
          <div class="letter__content">
            <div class="back text-center">
              <p style="margin-top:0;">You always have my heart</p>
              <div class="heart"></div>
              <p style="margin:0;margin-top:10px;">You know I'll always love you till the end of time.</p>
    </div>
          </div>
        </div>
      </div>
      <div class="envelope__back"></div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
      $(document).ready(function() {
        var a = document.querySelector('.envelope__check');
        a.addEventListener("click",function(){
        if(a.checked){var b =document.querySelector('.envelope__letter');setTimeout(()=>{b.classList.add("zoom-in");},600);document.querySelector('body').style.background="pink";}else{var b = document.querySelector('.envelope__letter');b.classList.remove("zoom-in");document.querySelector('body').style.background="white";}
        });
    
        $('#login input').on('keyup',function(){
        var password = $('#login input[name="password"]').val();
        if(password === "iloveyoumaseky"){
            $('#login').css("opacity","0");
            $('#login').css("pointer-events","none");
        }
        });
        $("#os-phrases > h2").css('opacity', 1).lettering('words').children("span").lettering().children("span").lettering(); 
        function hideLoader(){
        $('#loader').css("display","none");
        }
        setTimeout(hideLoader,5500);
      });
    </script>
</body>
</html>