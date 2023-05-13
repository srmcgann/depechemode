<?
  $url = $_GET['url'];
  $s = file_get_contents(str_replace(' ', '%20', $url));
  echo $s;
?>
