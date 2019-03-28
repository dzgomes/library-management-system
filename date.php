<?php
  function due_date($weekstr) {
  $start = new DateTime('today');
  $startstr = $start->format('Y-m-d');
  echo $startstr;
  echo "</br>";
  $weekstr = date('Y-m-d', strtotime('+ 7 days'));
  echo "amor";
  
  $week = new DateTime($weekstr);

  $due_date = $week->diff($start);
  echo "</br>";
  $due_datestr = $due_date->format('%d days');
  // echo $due_date->format('%d days');
  echo $due_datestr;
  }

  ?>