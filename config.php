<?php
/* Hello . This code written by Muhammad Aliff Muazzam bin Jaafar .
*
*  Feel free to checkout .
*  Built with love <3 .
*
*  http://www.facebook.com/Tester2009
*  https://github.com/alepcat1710
*  http://www.twitter.com/mambj2009
*  http://www.twitter.com/alepcat1710
*  http://kamisukagodam.blogspot.com
*  http://about.me/Tester2009
*  sulakecorporation1232@gmail.com
*  - Tester2009 -
*
*/

// okay . now connect to database .
// general setup . should done first .
$error="Lulz . Error connection to database . Do hosting problem?"; // error screen show if mysql fail to connect database or selecting database .
$server=""; // put your mysql server here .
$user=""; // put your mysql username here .
$pass=""; // put your mysql password here .
$db=""; // put your mysql database here .
mysql_connect($server, $user, $pass) or die($error);
mysql_select_db($db) or die ($error);



// this code i do not own . google search :D
//get user ip.
function getuserip()
// With CloudFlare reverse IP support
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  elseif (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
  {
   $ip=$_SERVER["HTTP_CF_CONNECTING_IP"];
  } else {
 $ip=$_SERVER['REMOTE_ADDR'];
}
  return $ip;
}



// count from zero .
function countrow() {
	$query=mysql_query("SELECT * FROM counter ORDER BY id DESC LIMIT 1");
	while ($row=mysql_fetch_array($query)) {
		$list=$row['id'];
	}
	return $list;
}



// now fill in to database .
function nowdetect() {
	$count=countrow(); // count from zero . from database .
	$id=$count+1;
	$ip=getuserip();
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	$time=date('d/m/Y h:i:s a', time());
	$query="INSERT INTO counter (id,ip,useragent,time) VALUES('$id', '$ip', '$useragent', '$time')";
	mysql_query($query) or die('error');
}



// show result .
function showResult() {
	$query=mysql_query("SELECT * FROM counter ORDER BY id DESC");
	while ($row=mysql_fetch_array($query, MYSQL_ASSOC)) {
		$id=$row['id'];
		$ip=$row['ip'];
		$useragent=$row['useragent'];
		$time=$row['time'];
		echo 'ID: '.$id.'<br />IP: '.$ip.'<br />User Agent: '.$useragent.'<br />Time: '.$time.'<br /><br />';
	}
}


// visitor hit . show to user !
function countStats() {
// Activated users only
// Query the database and get the count 
$result = mysql_query("SELECT * FROM counter"); 
$num_rows = mysql_num_rows($result); 
// Display the results 
echo ''.$num_rows.' visitor visited this page .';
}


?>