<?php 
/**
 * Tests trait: to provide testing functionalities inside classes.
 */
namespace Core\Helpers;

use Exception;

trait Tests {

    protected static function test_file_exists($file){

        try {
            if(!file_exists($file)){
                throw new \Exception("The following file was not found: $file");
            }
        } catch (\Exception $error) {
            echo "<table>" . $error->xdebug_message . "</table>";
            die;
        }

        return true;
    }
}