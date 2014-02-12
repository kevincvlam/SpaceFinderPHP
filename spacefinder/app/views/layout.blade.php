<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SpaceFinder | Welcome</title>
    <link rel="stylesheet" href="<?php echo asset('static/css/foundation.css')?>"/>
    <link rel="stylesheet" href="<?php echo asset('static/css/spacefinder.css')?>"/>
    <link rel="stylesheet" href="<?php echo asset('static/css/foundation-icons.css')?>"/>
	<style>
	a.title:link {color:#EEEEEE;}      /* unvisited link */
	a.title:visited {color:#EEEEEE;}  /* visited link */
	a.title:hover {color:#EEEEEE;}  /* mouse over link */
	a.title:active {color:#EEEEEE;}  /* selected link */
	</style>
    <script src="<?php echo asset('/static/js/vendor/modernizr.js')?>"></script>
        
  </head>
  <body>

<div class="off-canvas-wrap">
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 style="
		margin-left:20px;"><a class="title" href="<?php echo asset('/')?>">
        
        SpaceFinder</a></h1>
      </section>

      </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>Quick Links</label></li>
        <li><a href="#">Libraries</a></li>
    	<li><a href="#">Bars</a></li>
    	<li><a href="#">Coffee Shops</a></li>
      </ul>
    </aside>

 

<section class="main-section">
<!-- Content -->  
<div class="contentheader">  
<div class="row">

      <div class="large-12 columns">
        <h3>SpaceFinder is an application that uses wireless network usage data to find open space in public venues.</h3>
      </div>  
</div>
</div>

<!-- Main Body -->

                
                
<div class="row">


  <div class="large-12 columns">
  
 @yield('content')
	
  </div>
  
  
  

  
</div>     
<!-- End Main Body -->      
 
 </section>

  <a class="exit-off-canvas"></a>

  </div>
</div>
<!-- End Content -->     

  <!-- Footer -->
 
  <footer class="">
    <div class="large-12 columns">
      <hr>
      <div class="row">
        <div class="large-6 columns">
          <p><strong>SpaceFinder</strong> created by a team of University of Toronto Engineering students: <strong>Kevin, Connor, Jing, & Laurence</strong></p>
        
        </div>
        <div class="large-6 columns">
          <ul class="inline-list right">
            <li><a href="#">How it Works</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
    
<!-- End Footer -->

    <script src="<?php echo asset('/static/js/vendor/jquery.js')?>"></script>
	<script src="<?php echo asset('/static/js/foundation.min.js')?>"></script>
    <script>
      $(document).foundation();
	</script>
    
  </body>
</html>
