<?php
/**
 * 订单创建
 * @author zhang
 */
class EocOrdersCreateRequest
{
	/** 
	 * 用户标识
	 **/
	private $identifier;
	
	/** 
	 * 订单类型
	 **/
	private $type;
	
	/** 
	 * 研究领域ID
	 **/
	private $fieldId;
	
	/** 
	 * 稿件题目
	 **/
	private $title;
	
	/** 
	 * 稿件摘要
	 **/
	private $abstracts;

    /**
     * 通讯作者
     **/
    private $author;

    /**
     * 用户上传的附件
     **/
    private $manuscriptAttachmentUrl;

    /**
     * 稿件状态
     **/
    private $state;

    /**
     * 论文专业
     **/
    private $major;

    /**
     * 拟投期刊
     **/
    private $journal;

    /**
     * 致客服的重要信息
     **/
    private $messageToStaff;

    /**
     * 用户标识名
     **/
    private $identifierName;

    /**
     * 是否需要发票
     **/
    private $needInvoice;

    /**
     * 发票信息
     **/
    private $invoice;

    public $format = "json";

    public $isNeedConvert = true;

    private $apiParas = array();
	
	public function setIdentifier($identifier)
	{
		$this->identifier = $identifier;
		$this->apiParas["identifier"] = $identifier;
	}

	public function getIdentifier()
	{
		return $this->identifier;
	}

    public function setType($type)
    {
        $this->type = $type;
        $this->apiParas["type"] = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;
        $this->apiParas["fieldId"] = $fieldId;
    }

    public function getFieldId()
    {
        return $this->fieldId;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        $this->apiParas["title"] = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setAbstracts($abstracts)
    {
        $this->abstracts = $abstracts;
        $this->apiParas["abstracts"] = $abstracts;
    }

    public function getAbstracts()
    {
        return $this->abstracts;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        $this->apiParas["author"] = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setManuscriptAttachmentUrl($manuscriptAttachmentUrl)
    {
        $this->manuscriptAttachmentUrl = $manuscriptAttachmentUrl;
        $this->apiParas["manuscriptAttachmentUrl"] = $manuscriptAttachmentUrl;
    }

    public function getManuscriptAttachmentUrl()
    {
        return $this->manuscriptAttachmentUrl;
    }

    public function setState($state)
    {
        $this->state = $state;
        $this->apiParas["state"] = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setMajor($major)
    {
        $this->major = $major;
        $this->apiParas["major"] = $major;
    }

    public function getMajor()
    {
        return $this->major;
    }

    public function setJournal($journal)
    {
        $this->journal = $journal;
        $this->apiParas["journal"] = $journal;
    }

    public function getJournal()
    {
        return $this->journal;
    }

    public function setMessageToStaff($messageToStaff)
    {
        $this->messageToStaff = $messageToStaff;
        $this->apiParas["messageToStaff"] = $messageToStaff;
    }

    public function getMessageToStaff()
    {
        return $this->messageToStaff;
    }

    public function setIdentifierName($identifierName)
    {
        $this->identifierName = $identifierName;
        $this->apiParas["identifierName"] = $identifierName;
    }

    public function getIdentifierName()
    {
        return $this->identifierName;
    }

    public function setNeedInvoice($needInvoice)
    {
        $this->needInvoice = $needInvoice;
        $this->apiParas["needInvoice"] = $needInvoice;
    }

    public function getNeedInvoice()
    {
        return $this->needInvoice;
    }

    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
        $this->apiParas["invoice"] = $invoice;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function getApiMethodName(){
        return "POST";
    }

    public function getInterfaceAddress(){
        return "orders/create";
    }
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
	    EocCheckRequest::checkNotNull($this->identifier,'identifier');
	    EocCheckRequest::checkNotNull($this->type,'type');
	    EocCheckRequest::checkNotNull($this->fieldId,'fieldId');
	    EocCheckRequest::checkNotNull($this->title,'title');
	    EocCheckRequest::checkNotNull($this->abstracts,'abstracts');
	    EocCheckRequest::checkNotNull($this->author,'author');
	    EocCheckRequest::checkNotNull($this->manuscriptAttachmentUrl,'manuscriptAttachmentUrl');
	    EocCheckRequest::checkNumeric($this->type,'type');
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
