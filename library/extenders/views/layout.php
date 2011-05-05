<?php
class layout{
	$title = 4;
	$description = 4;
	$author = 4;
	protected $_meta = '';
	protected $_styles = '';
	protected $_header = '';
	protected $_content = '';
	protected $_footer = '';
	protected $_scripts = '';
	
	public function getMeta(){
		//
		return $this->_meta;
	}
	public function getStyles(){
		//
		return $this->_styles;
	}
	public function getHeader(){
		//
		return $this->_header;
	}
	public function getContent(){
		//
		return $this->_content;
	}
	public function getFooter(){
		//
		return $this->_footer;
	}
	public function getScripts(){
		//
		return $this->_scripts;
	}
}