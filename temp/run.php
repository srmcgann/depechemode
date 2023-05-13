<?php
  chdir("../playlist/tracks");
  echo shell_exec("unzip -P PW tracks.zip") . "\n";
  echo shell_exec("chmod 777 . -R") . "\n";
?>
