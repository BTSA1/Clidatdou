<footer>
<?php 

$version = fopen('version.txt', 'r');
echo fgets($version);
fclose($version);

?>
</footer>