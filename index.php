<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 27.05.2015
 * Time: 20:29
 */
include("config/setup.php");
include("config/bootstrap.php");

recurse(".");

function recurse($path){
    foreach(scandir($path) as $o){
        if($o != "." && $o != ".."){
            $full = $path . "/" . $o;
            echo $full;
            /*if(is_dir($full)){
                if(!file_exists($full . "/index.php")){
                    file_put_contents($full . "/index.php", "");
                }
                recurse($full);
            }*/
        }
    }
}
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "file") rrmdir($dir."/".$object); else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}