<?php
  $current_name= \Route::currentRouteName();

  $pages= [
    "background"=>"Background",
    "approach" => "Implementation Science Approach",
    "findings" => "Findings",
    "implications" => "Implications",
    "review" => "Review"
  ];

?>
<nav class="navbar navbar-default navbar-centered" id="progress-bar">

  <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        <?php
          foreach($pages as $route => $title):
            $class="";
            if($current_name === $route){
              $class=" active";
            }?>
            <li><a class="{{ $class }}" href="{{ $route }}">{{ $title }}</a></li>
          <?php
          endforeach;
        ?>
      </ul>

  </div>
</nav>
