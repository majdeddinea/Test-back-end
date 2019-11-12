<?php

use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;

require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

// $kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
// $request = Request::createFromGlobals();
// $response = $kernel->handle($request);
// $response->send();
//$kernel->terminate($request, $response);

/*Parser (reading from YAML)*/
$Yam = new Parser();
$arr = Yaml::parseFile(("C:\Users\Majd\quick_tour\public\organizations.yaml"));


   /* This code is to add an organizations */
  // $arr["organizations"][3]["name"] = "Oracle";

  /* This code is to delete organizations*/
  // unset($arr["organizations"][2]);
  // unset($arr["organizations"][3]);


// echo $arr["organizations"][0]["users"][0]["name"];

 /* This code to View HTML table, names and descriptions of organizations*/
 $i = 0;
 if(is_array($arr)){
    foreach ($arr as $key => $value)
        foreach ($value as $key1 => $value1) {

           echo $key . " :" ;
           echo '<table><tr1>Name</tr1><tr2>escription</tr2><tr3>Users</tr3>';
           echo '<tr1><td>'.$value1["name"] . "<br>".'</td></tr1>';
           // echo '<form><input type="submit" id="clickies" name="clickies" value="Update" />';
           // echo '</form>';
           echo '<tr2><td>'.$value1["description"] . "<br>".'</td></tr2>';

           foreach ($value1["users"] as $key2 => $value2) {
             echo '<tr3><td>'.$value2["name"] . "<br>".'</td></tr3>';

             foreach ($value2["role"] as $value3) {
               echo '<tr3><td>'.$value3 . "-".'</td></tr3>';
             }
             echo "<br>" ;
             echo '<tr3><td>'.$value2["password"] ."<br>".'</td></tr3>';

           }
           $i++;
        }
      }
  echo '</table>';



?>
  <!-- Update Facebook -->
  <form action="index1.php" method="POST">
   Update Facebook : <input type="submit" id="clickies1" name="clickies1" value= "'.$i.'" style="color: buttonface;"/>

 </form>

 <!-- Update Google -->
 <form action="index2.php" method="POST2">
  Update Google : <input type="submit" id="clickies2" name="clickies2" value="$i" style="color: buttonface;"/>

</form>

<!-- Update Youtube -->
<form action="index3.php" method="POST3">
 Update Youtube : <input type="submit" id="clickies3" name="clickies3" value="$i" style="color: buttonface;"/>

</form>
