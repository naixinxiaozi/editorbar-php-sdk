<?php
/**
 * @Author zhang
 */

class test1
{
    public function test(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client('b476c5f0fa3a4f0b98d8d68e5db9180c','6C76737733FCF64CFA9A32216C835162');
        $e = new EocUploadFileRequest();
        $e->setIdentifier('user008');
        $e->setFile(array(
            'type' => 'application/octet-stream',
            'name' => '123.jpg',
            'content' => file_get_contents(EOC_ROOT_PATH . '/123.jpg')
        ));
        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test2(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocListFieldRequest();
        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test3(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocOrdersCreateRequest();
        $e->setIdentifier('user008');
        $e->setType("1");
        $e->setFieldId(1);
        $e->setTitle('哈哈');
        $e->setAbstracts('简介');
        $e->setAuthor('张三');
        $e->setManuscriptAttachmentUrl('badiu.com');
        $e->setInvoice(["type"=>1]);
        $result = $c->execute($e);
        var_dump($result);
        exit();
    }
    public function test4(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocOrderDetailRequest();
        $e->setIdentifier('user008');
        $e->setOrderId('10970');
        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test5(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocPageOrderRequest();
        $e->setIdentifier('user008');
        $e->setPageNumber(1);
        $e->setPageSize(10);
        $e->setStatus(2);
        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test6(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocDownloadFileRequest();
        $e->setIdentifier('user008');
        $e->setUrl('/upload/partner/6175/2019/0908/334aaad7-e9fe-47f1-a2ab-eb7ee794a9da.jpg');
        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test7(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocAliPayOrderRequest();
        $e->setOrderId('10970');
        $e->setPayReturnUrl('www.baidu,com');
        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test8(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocAfterSaleRequest();
        $e->setIdentifier('user008');
        $e->setOrderId('10970');
        $e->setCause(1);
        $e->setAttachment('hahah');
        $result = $c->execute($e);
        var_dump($result);
        exit();
    }
    public function test9(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocQueryOrderStatusRequest();
        $e->setCode(123);

        $result = $c->execute($e,true);
        var_dump($result);
        exit();
    }
    public function test10(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocListInvoiceTypesRequest();

        $result = $c->execute($e);
        var_dump($result);
        exit();
    }
    public function test11(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocOrdersUpdateRequest();
        $e->setId('10970');
        $e->setIdentifier('user008');
        $e->setType("1");
        $e->setFieldId(1);
        $e->setTitle('哈哈');
        $e->setAbstracts('恒恶化静待花开');
        $e->setAuthor('张三');
        $e->setManuscriptAttachmentUrl('badiu.com');
        $e->setInvoice(["type"=>1]);
        $result = $c->execute($e);
        var_dump($result);
        exit();
    }
    public function test12(){
        echo "<pre>";
        include_once('./EocSdk.php');
        $c = new Client();
        $c->appkey = 'b476c5f0fa3a4f0b98d8d68e5db9180c';
        $c->secretKey = '6C76737733FCF64CFA9A32216C835162';
        $e = new EocNotifyPayedRequest();
        $e->setOrderCode('AE201909080011');
        $e->setPayedFee(123);
        $e->setRemark("1");
        $result = $c->execute($e);
        var_dump($result);
        exit();
    }

}
$test = new test1();

$test->test2();

//if(!empty($_FILES)) {
//
//    $test->test();
//}else{
//    echo '<form enctype="multipart/form-data" method="post"><input class="fl" type="file" id="imgPath" name="file" /><input class="fl" type="submit" value="提交"/> </form>';
//}

//$test->test12();
