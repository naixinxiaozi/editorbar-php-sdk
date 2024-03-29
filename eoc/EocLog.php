<?php
class EocLog
{
	public $conf = array(
		"separator" => "\t",
		"log_file" => ""
	);

	private $fileHandle;

	protected function getFileHandle()
	{
		if (null === $this->fileHandle) {
			if (empty($this->conf["log_file"])) {
				trigger_error("未指定日志文件.");
			}
			$logDir = dirname($this->conf["log_file"]);
			if (!is_dir($logDir)) {
				mkdir($logDir, 0777, true);
			}
			$this->fileHandle = fopen($this->conf["log_file"], "a");
		}
		return $this->fileHandle;
	}

	public function log($logData)
	{
		if ("" == $logData || array() == $logData)
		{
			return false;
		}
		if (is_array($logData))
		{
			$logData = implode($this->conf["separator"], $logData);
		}
		$logData =  $logData. PHP_EOL . "-----------------------------------------------------" . PHP_EOL;
		fwrite($this->getFileHandle(), $logData);
	}
}
?>