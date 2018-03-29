
<?php
  if($u->is_admin){
    $class= "btn-urc-account btn-urc-accent1";
  }
  else if($u->is_approved){
    $class= "btn-urc-account btn-urc-secondary";
  }
  else {
    $class= "btn-urc-account btn-urc-accent3";
  }

 ?>

  <a class="btn {{$class}}" href="{{ route('user.edit', $u) }}">
      <div class="account-name">{{ $u->name }}</div>

      <span class="subtext">{{ $u->affiliation }}</span>

  </a>
