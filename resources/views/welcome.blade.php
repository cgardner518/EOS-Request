<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        {{-- skrip --}}
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        {{-- <script src="http://www.christophergardner.net/jquery-2.2.4.min.js"></script> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,700" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                /*font-weight: 100;*/
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .stigz{
              /*border: 2px solid firebrick;*/
              height: 15em;
              margin-top: 5em;
              overflow: hidden;
              padding-left: 5em;
              padding-right: 5em;
            }
            .m-b-md {
                margin-bottom: -30px;
            }
            /*http://38.media.tumblr.com/108fd2ce30625b793f302b7b1346e4a1/tumblr_nvi1z1zoVX1s1ey34o1_400.gif*/
            /*https://68.media.tumblr.com/3b9427ad8ba6006f461fcd8b91cc6080/tumblr_obc8k4v3l01rctpomo1_400.gif*/
            /*http://data.whicdn.com/images/64940340/original.gif*/
            /*https://media.giphy.com/media/14hS1ZEmSfKdTW/giphy.gif*/
            /*https://media.giphy.com/media/Xp4E5EvYUJ0nm/giphy.gif*/
            /*https://media.giphy.com/media/xb68TojBVb42s/giphy.gif*/
            /*https://media.giphy.com/media/8IZCR0wzEIQms/giphy.gif*/
            /*https://media.giphy.com/media/REoZelIzrsb7O/giphy.gif*/
            /*https://media.giphy.com/media/yhScPwKdCTuZW/giphy.gif*/
            /*https://media.giphy.com/media/IKy3MWMTUoX4Y/giphy.gif*/
            /*https://media.giphy.com/media/fRZn2vraBGiA0/giphy.gif*/
            /*https://media.giphy.com/media/10bbPvzEG1NZWU/giphy.gif*/

            h3{
              background: url('https://media.giphy.com/media/IKy3MWMTUoX4Y/giphy.gif') no-repeat center;
              background-size: cover;
              -webkit-text-fill-color: transparent;
              -webkit-background-clip: text;
              font-size: 1em;
              padding:0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  <h3>Laravel</h3>
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <?php echo date('Y-m-d', strtotime('second tuesday of march')); ?>
                <div class="stigz">
                  <h3>
                    {{ Route::currentRouteName() }}
                  </h3>
                  <div class="slidemcowboy">

                  </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $newVal = 1;
          $('body').on('mousewheel',function(evt){
            if(evt.originalEvent.deltaY > 0){
              $newVal += 1;
              $('h3').css('transform','perspective(600px) rotateY('+($newVal*7)+'deg)')
            }else{
              $newVal -= 1;
              $('h3').css('transform','perspective(600px) rotateY('+($newVal*7)+'deg)')
            }
          })
          $.get(window.location.origin+'/stigz',{}, function(res){
            // $('.slidemcowboy').css('left','-1000px')
            var stigRay = []
            $.each(res.stig.findings, function(i,v){
              stigRay.push(v)
              // console.log(v.fixtext);
            })
            $.each(stigRay, function(i,v){
              if(v.severity == "high"){
              console.log(v);
            }
            })

              var count = 0
              var eachDeez = setInterval(function(){
                // console.log(stigRay[count].fixtext);
                // $('.slidemcowboy').hide()
                $('.slidemcowboy').html(stigRay[count].fixtext)
                $('.slidemcowboy').hide().animate({width:'toggle'}, 400);
                count ++;
                if(count == stigRay.length){
                  // clearInterval(eachDeez)
                  count = 0
                }
              }, 10000);
          });
        </script>
    </body>
</html>
