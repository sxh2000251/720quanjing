<?php
 /**
 *	[�������⸽��--����ת����(threed_pan.{modulename})] (C)2014-2099 Powered by 3D�����.
 *	Version: ��ҵ��
 *	Date: 2014-12-3 21:54
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_threed_pan extends discuz_table
{
	public function __construct() {
		$this->_table = 'threed_pan';
		$this->_pk = 'id';
		parent::__construct();
	}
}

?>