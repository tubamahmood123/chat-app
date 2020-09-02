<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>Page</title>

            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        </head>
        <body>

            
            <div id="appll">
                <page :title="'{{$title}}'" :author="{{$author}}">
                   
                </page>
                
            </div>
           <div id="applp">
                <message></message>
                <messageone></messageone>
                <messagetwo></messagetwo>  
               <!--- <messagethree></messagethree>--->  
                
            </div>

            
          <script type="text/javascript" src="js/page.js"></script>
          <script type="text/javascript" src="js/app.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/vue"></script>
         <img src="{{URL('/images/id.png')}}">
         <img src="{{URL('/images/id1.jpg')}}">
        </body>
    </html>