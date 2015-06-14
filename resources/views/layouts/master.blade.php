<html>
	<head>
		<title> @yield('title')</title>
		<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

        {!! HTML::style('css/lippystyler.css') !!}
	</head>
	<body>
		<header>
            <a href="{{URL::to('/')}}"><img src="img/LippyLogored.png" class="logo"/></a>
            <h6 class="search_terms">Popular Search Terms: NARS, MAC, Urban Decay, all.</h6>
        {!! Form::model(null, array('route' => array('posts.search'))) !!}
            <input type="text" id="searchinput" name="searchinput" class="search" placeholder="Search..." >
            </input>
            {!! Form::close('Search') !!}
    </header>
        <div id="content">
             @yield('content')
        </div>
    <footer>
       <h6>© Lippy - 2015</h6>
    </footer>
	</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    {!! HTML::script('js/LippyScript.js'); !!}
</html>