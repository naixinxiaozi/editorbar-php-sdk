<?php

/**
 *  入参检测
 **/

class EocCheckRequest
{
    /**
     * 校验字段 fieldName 的值$value非空
     *
     **/
    public static function checkNotNull($value,$fieldName) {

        if(self::checkEmpty($value)){
            throw new Exception("缺少参数: " .$fieldName , 40);
        }
    }

    /**
     * 检验字段fieldName的值value 的长度
     *
     **/
    public static function checkMaxLength($value,$maxLength,$fieldName){
        if(!self::checkEmpty($value) && mb_strlen($value , "UTF-8") > $maxLength){
            throw new Exception("[" .$fieldName . "] 长度不得超过 " . $maxLength . "." , 41);
        }
    }

    /**
     * 检验字段fieldName的值value的最大列表长度
     *
     **/
    public static function checkMaxListSize($value,$maxSize,$fieldName,$delimiter=',') {

        if(self::checkEmpty($value))
            return ;

        $list=preg_split("/{$delimiter}/",$value);
        if(count($list) > $maxSize){
            throw new Exception("[". $fieldName . "]分隔后长度不得超过 " . $maxSize . " ." , 41);
        }
    }

    /**
     * 检验字段fieldName的值value 的最大值
     *
     **/
    public static function checkMaxValue($value,$maxValue,$fieldName){

        if(self::checkEmpty($value))
            return ;

        self::checkNumeric($value,$fieldName);

        if($value > $maxValue){
            throw new Exception("[" . $fieldName . "] 值不得大于 " . $maxValue ." ." , 41);
        }
    }

    /**
     * 检验字段fieldName的值value 的最小值
     *
     **/
    public static function checkMinValue($value,$minValue,$fieldName) {

        if(self::checkEmpty($value))
            return ;

        self::checkNumeric($value,$fieldName);

        if($value < $minValue){
            throw new Exception("[ " . $fieldName . "] 值不得小于 " . $minValue . " ." , 41);
        }
    }

    /**
     * 检验字段fieldName的值value是否是number
     *
     **/
    public static function checkNumeric($value,$fieldName) {
        if(!is_numeric($value))
            throw new Exception("[" . $fieldName . "] 不是一个数字 : " . $value . " ." , 41);
    }

    public static function checkArray($value,$fieldName) {
        if(!is_array($value))
            throw new Exception("[" . $fieldName . "] 不是一个数组 : " . $value . " ." , 41);
    }

    /**
     * 校验$value是否非空
     *  if not set ,return true;
     *	if is null , return true;
     *
     *
     **/
    public static function checkEmpty($value) {
        if(!isset($value))
            return true ;
        if($value === null )
            return true;
        if(is_array($value) && count($value) == 0)
            return true;
        if(is_string($value) &&trim($value) === "")
            return true;

        return false;
    }

}
?>