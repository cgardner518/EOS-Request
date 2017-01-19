@extends('Labcoat::layouts/standard')
@section('page-title')

@endsection
@section('main-content')
      <style media="screen">
        .holdit{
          background: black;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          z-index: 1;
        }
        video{
          margin:auto;
          padding:0;
          height:82vh;
          z-index: 100;
        }
        iframe{
          position:absolute;
          z-index: -100000;
          left: -9000em;
          top: -100em;
        }
      </style>
    <div class='holdit'>
      <script src="/jq" charset="utf-8"></script>
      <script src="https://w.soundcloud.com/player/api.js" charset="utf-8"></script>
      <video src="http://a1.phobos.apple.com/us/r1000/000/Features/atv/AutumnResources/videos/b5-3.mov" autoplay playsinline loop type="video/mp4"></video>
      <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/235003862&amp;color=666666&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>

      <script type="text/javascript">
      var widget = SC.Widget($("iframe")[0]);

      // widget.bind(SC.Widget.Events.PLAY, function(){
      //     widget.seekTo(79000)
      // })

      widget.bind(SC.Widget.Events.FINISH, function(){
        widget.play()
      })
      </script>
    </div>
@stop
{{--
<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/235003862&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe> --}}
