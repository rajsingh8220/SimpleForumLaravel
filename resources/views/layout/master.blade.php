<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="{{URL::to('js/main.js')}}"></script>
        <link rel="stylesheet" href="{{URL::to('css/style.css')}}" />
    </head>
    <body style="color: #585555">
       
            @include('layout.header')
        
       <div class="container" style="min-height: 400px">
            
            <div class="row">
                
                <div class="col-md-1"></div>
                
                <div class="col-md-10" style="border: 1px solid #d9d2d2; border-radius: 2px;"> 
                    
                    <h3 id="inner_title">@yield('inner_page_title')</h3>
                    <div id="search_result">
                    @yield('content')
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        
            
        <footer>
             @include('layout.footer')
        </footer>
           
            
    </body>
</html>
