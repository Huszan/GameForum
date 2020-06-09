
      @extends('layouts.app')
      
      @section('content')
      
      <div class="jumbotron text-center">
            <h1>{{$title}}</h1>
            <p>This is an site in which You can post things about Your favorite games. Every gamer is welcome here! </p>
            <br><br><br>
 
                  <h2><span style="color:rgba(18, 91, 175, 0.575)">Forum rules</span></h2>
                  <br>
                  <p class="bg-info"><span style="color:rgba(18, 91, 175, 0.575)">1. Do not post "offensive" links, posts or images</span></p>
                  <p class="bg-info"><span style="color:rgba(18, 91, 175, 0.575)">2. Do not cross post questions</span></p>
                  <p class="bg-info"><span style="color:rgba(18, 91, 175, 0.575)">3. Remain respectful of other members at all times</span></p>
                  <p class="bg-info"><span style="color:rgba(18, 91, 175, 0.575)">4. Do not post anything off the topic of the forum</span></p>

            <br><br><br>
            @if(Auth::guest())
                  <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
            @endif
      </div>

      @endsection
        


