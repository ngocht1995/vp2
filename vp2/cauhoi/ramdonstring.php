<?php

function random_string($str, $length, $ranges = array('0-9','a-z','A-Z'))
  {
        $string="";
	foreach ($ranges as $r) $s .= implode(range(array_shift($r = explode('-', $r)), $r[1]));
    while (strlen($s) < $length) $s .= $s;
    $string = $str.substr(date("A"),0,1).substr(str_shuffle($s), 0, $length);
	return  $string;
  }
  $today = substr(date("A"),0,1); 
  echo $today. "\n";
  echo random_string("O",4,array('0-9'));

?>

<?php
function time_stamp($time_ago)
{
$cur_time=time();
$time_elapsed = $cur_time - $time_ago;
$seconds = $time_elapsed ;
$minutes = round($time_elapsed / 60 );
$hours = round($time_elapsed / 3600);
$days = round($time_elapsed / 86400 );
$weeks = round($time_elapsed / 604800);
$months = round($time_elapsed / 2600640 );
$years = round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60)
{
echo " Cách đây $seconds giây ";
}
//Minutes
else if($minutes <=60)
{
if($minutes==1)
{
echo " Cách đây 1 phút ";
}
else
{
echo " Cách đây $minutes phút";
}
}
//Hours
else if($hours <=24)
{
if($hours==1)
{
echo "Cách đây 1 tiếng ";
}
else
{
echo " Cách đây  $hours tiếng ";
}
}
//Days
else if($days <= 7)
{
if($days==1)
{
echo " Ngày hôm qua ";
}
else
{
echo " Cách đây  $days ngày ";
}
}
//Weeks
else if($weeks <= 4.3)
{
if($weeks==1)
{
echo " Cách đây 1 tuần ";
}
else
{
echo " Cách đây  $weeks tuần";
}
}
//Months
else if($months <=12)
{
if($months==1)
{
echo " Cách đây 1 tháng ";
}
else
{
echo " Cách đây $months tháng";
}
}
//Years
else
{
if($years==1)
{
echo " Cách đây 1 năm ";
}
else
{
echo " Cách đây $years năm ";
}
}
}
?>