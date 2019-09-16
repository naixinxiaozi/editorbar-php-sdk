<?php

class Autoloader{
  
  /**
     * 类库自动加载
     * @param string $class 对象类名
     * @return void
     */
    public static function autoload($class) {
        $name = $class;
        if(false !== strpos($name,'\\')){
          $name = strstr($class, '\\', true);
        }
        
        $filename = EOC_ROOT_PATH."/eoc/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = EOC_ROOT_PATH."/eoc/request/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = EOC_ROOT_PATH."/eoc/helper/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }
    }
}

spl_autoload_register('Autoloader::autoload');
?>