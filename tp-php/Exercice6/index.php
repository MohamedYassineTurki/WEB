<?php

include_once "Repository.php";

$repo = new Repository("utilisateur");
echo ($repo->findById(1))["email"];

echo "<br>";

echo ($repo->findAll())[0]["email"];

echo "<br>";

echo $repo->create(array("username" => "Khalil", "email" => "khalilammarr@gmail.com", "password" => "yeswecan", "role" => "admin")) ;

echo "<br>";

echo $repo->delete(2);

?>