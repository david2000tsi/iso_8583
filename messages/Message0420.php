<?php

require_once('../ISO8583.php');

class Message0420 {
	const MTI = "0420"; // MTI of ISO8583:1987: 0420 message.

	private $isoMsg;

	private $field_002;
	private $field_003;
	private $field_004;
	private $field_007;
	private $field_011;
	private $field_012;
	private $field_013;
	private $field_022;
	private $field_041;
	private $field_042;
	private $field_090;

	public function __construct()
	{
		$this->isoMsg = new ISO8583(ISO8583::ISO8583_1987);

		$this->field_003 = "";
		$this->field_004 = "";
		$this->field_007 = "";
		$this->field_011 = "";
		$this->field_012 = "";
		$this->field_013 = "";
		$this->field_038 = "";
		$this->field_039 = "";
		$this->field_041 = "";
		$this->field_042 = "";
		$this->field_062 = "";
	}

	public function setField002(string $value) { $this->field_002 = $value; }
	public function setField003(string $value) { $this->field_003 = $value; }
	public function setField004(string $value) { $this->field_004 = $value; }
	public function setField007(string $value) { $this->field_007 = $value; }
	public function setField011(string $value) { $this->field_011 = $value; }
	public function setField012(string $value) { $this->field_012 = $value; }
	public function setField013(string $value) { $this->field_013 = $value; }
	public function setField022(string $value) { $this->field_022 = $value; }
	public function setField041(string $value) { $this->field_041 = $value; }
	public function setField042(string $value) { $this->field_042 = $value; }
	public function setField090(string $value) { $this->field_090 = $value; }

	public function getField002() { return $this->field_002; }
	public function getField003() { return $this->field_003; }
	public function getField004() { return $this->field_004; }
	public function getField007() { return $this->field_007; }
	public function getField011() { return $this->field_011; }
	public function getField012() { return $this->field_012; }
	public function getField013() { return $this->field_013; }
	public function getField022() { return $this->field_022; }
	public function getField041() { return $this->field_041; }
	public function getField042() { return $this->field_042; }
	public function getField090() { return $this->field_090; }

	public function getMessage()
	{
		$ret = $this->isoMsg->success();
		if($ret)
		{
			$ret &= $this->isoMsg->setMti(self::MTI);
			$ret &= strlen($this->field_002) ? $this->isoMsg->addField( 2, $this->field_002) : false;
			$ret &= strlen($this->field_003) ? $this->isoMsg->addField( 3, $this->field_003) : false;
			$ret &= strlen($this->field_004) ? $this->isoMsg->addField( 4, $this->field_004) : false;
			$ret &= strlen($this->field_007) ? $this->isoMsg->addField( 7, $this->field_007) : false;
			$ret &= strlen($this->field_011) ? $this->isoMsg->addField(11, $this->field_011) : false;
			$ret &= strlen($this->field_012) ? $this->isoMsg->addField(12, $this->field_012) : false;
			$ret &= strlen($this->field_013) ? $this->isoMsg->addField(13, $this->field_013) : false;
			$ret &= strlen($this->field_022) ? $this->isoMsg->addField(22, $this->field_022) : false;
			$ret &= strlen($this->field_041) ? $this->isoMsg->addField(41, $this->field_041) : false;
			$ret &= strlen($this->field_042) ? $this->isoMsg->addField(42, $this->field_042) : false;
			$ret &= strlen($this->field_090) ? $this->isoMsg->addField(90, $this->field_090) : false;
		}

		if($ret)
		{
			return $this->isoMsg->generateMessage();
		}

		return false;
	}

	public function decodeMessage(string $message)
	{
		$this->isoMsg->decodeMessage($message, ISO8583::ISO8583_1987);

		$this->field_002 = $this->isoMsg->getField( 2);
		$this->field_003 = $this->isoMsg->getField( 3);
		$this->field_004 = $this->isoMsg->getField( 4);
		$this->field_007 = $this->isoMsg->getField( 7);
		$this->field_011 = $this->isoMsg->getField(11);
		$this->field_012 = $this->isoMsg->getField(12);
		$this->field_013 = $this->isoMsg->getField(13);
		$this->field_022 = $this->isoMsg->getField(22);
		$this->field_041 = $this->isoMsg->getField(41);
		$this->field_042 = $this->isoMsg->getField(42);
		$this->field_090 = $this->isoMsg->getField(90);
	}
}
