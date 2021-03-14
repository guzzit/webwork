<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      @include('inc.navbar')
      @include('inc.messages')
        <main class="py-4">
          <div class="container">
            @yield('content')
          </div>
        </main>
    </div>
    
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <!--<script>
          CKEDITOR.replace( 'article-ckeditor' );
      </script>-->
      <script>
        setTimeout(function(){
          CKEDITOR.replace( 'article-ckeditor' );
        },0          
        )

        function five_tag_check(){
        
        var tags = document.getElementById("five_tag_summation").value;
        var commaSeparator = tags.split(',');
        var spaceSeparator = tags.split(' ');
        var postTag = "";
         if((commaSeparator.length>5)||(spaceSeparator.length>5)){
            commaSeparator.forEach(function breakArray(item){
		        item = item.trim();
            item = "<p class='badge badge-warning' style='margin-right:3px'>" + item +  "</p>";
		      	postTag = postTag + item;
        })
	        document.getElementById('post_tag').innerHTML = postTag;
           document.getElementById("tag_warning").innerHTML="You must not have more than five tags";
           return false;
         }
         else{
             return true;
         }
     }
    </script>
      <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
