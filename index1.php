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



    //Parser (reading from YAML)
    $Yam = new Parser();
    $arr = Yaml::parseFile(("C:\Users\Majd\quick_tour\public\organizations.yaml"));


    /*This code to edit the Facebook organization, name, description, list of users (in the YAML file)*/
    if($_SERVER['REQUEST_METHOD'] == "POST") {

          if (isset($_POST['clickies1'])) {
            foreach ($arr as $key => $value)
                foreach ($value as $key1 => $value1) {
                  if ($_POST['clickies1'] = 0) {
                     $id_facebook = $arr -> getElementById("clickies1");
                      // echo $id_facebook;


                      /*If it is Google it will be$value1["name"][1] = $_POST['text1'];
                      $value1["description"][1] = $_POST['text2'];  and also if it is youtubleit will be $value1["name"][2] = $_POST['text1'];
                      $value1["description"][2] = $_POST['text2'];*/
                      $array = [$_POST['text1'], $_POST['text2']];
                       $value1["name"][0] = $_POST['text1'];
                       $value1["description"][0] = $_POST['text2'];

                      $dumper = new Dumper();
                      // $yaml = $dumper->dump($array);
                      $yaml = $dumper->dump($arr);
                      // echo $dumper->dump($array, 1);
                      echo $arr;
                      file_put_contents('C:\Users\Majd\quick_tour\public\organizations.yaml', $yaml);
                    }
                  }

            // $yaml = Yaml::dump($arr1);
            //
            // file_put_contents('C:\organizations.yaml', $yaml);
       }
     }


?>
<form action="" method="POST">
       <!-- Name : <input name="text1" id="text1" type="text" value="'.$_POST($arr["organizations"][i]).'" /> -->
       Name : <input name="text1" id="text1" type="text" value="" />
       Description : <input name="text2" id="text2" type="text" value="" />

       <input type="submit" id="clickies1" name="clickies1" value="Submit" />
    </form>
