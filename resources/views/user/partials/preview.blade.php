
<?php
  if($u->is_admin){
    $class= "btn-urc-account sunset";
  }
  else if($u->is_approved){
    $class= "btn-urc-account blue";
  }
  else {
    $class= "btn-urc-account dawn";
  }

 ?>

  <a class="btn {{$class}}" href="{{ route('user.edit', $u) }}">
      <div class="account-name">{{ $u->name }}</div>

      <span class="subtext">{{ $u->affiliation }}</span>

  </a>
