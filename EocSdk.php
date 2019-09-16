<?php
//******************** EOC SDK 入口文件********************//

/**
 * 定义常量开始
 * 请在引入EocSdk.php文件前定义这些常量,方便维护升级
 * @Author zhang
 */


/**
 * 是否开启日志
 */
if (!defined("EOC_LOG_ON")) {
    define("EOC_LOG_ON", true);
}

/**
 *  当前目录
 */
if (!defined("EOC_ROOT_PATH")) {
    define("EOC_ROOT_PATH", dirname(__FILE__));
}

/**
 * 日志存放目录
 */
if (!defined("EOC_LOG_DIR")) {
	define("EOC_LOG_DIR", EOC_ROOT_PATH ."/log/");
}

/**
* 注册autoLoader
**/
require("Autoloader.php");