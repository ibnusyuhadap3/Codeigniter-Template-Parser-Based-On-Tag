<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ciparser 
{
	// This is parse function based on special html tag for codeigniter
	// Created by Ibnu Syuhada <ibnusyuhadap3@gmail.com>
	// Version 1.0
	
	// new parse function
	// $template is template path
	// $data is data for module view
	// $key is module name
	// $embed_template is module view path
	
	public function new_parse($template, $key, $embed_template, $data = '')
	{
		// this is to make $this php variable works
		// with this, then you can call standard codeigniter tutorials, such as $this->load->view() from other file
		$CI =& get_instance();
		foreach (get_object_vars($CI) as $_ci_key => $_ci_var)
		{
			if ( ! isset($this->$_ci_key))
			{
				$this->$_ci_key =& $CI->$_ci_key;
			}
		}
				
		// to make load view is work, then we add '' on third params on view() below
		$template = $this->load->view($template,'',true);
		$this->_new_parse($template, $data, $key, $embed_template);
	}
	
	// ready to parsing a tag
	private function _new_parse($template, $data, $key, $embed_template)
	{
		$keys = explode('_',$key);
		$module_place = $keys[0];
		$module_name = $keys[1];
		$this->_new_parse_single($data, $module_place, $module_name, $embed_template, $template);
	}
	
	// now parsing a tag
	private function _new_parse_single($data, $module_place, $module_name, $embed_template, $string)
	{
		// find ci:doc tag on view
		$regex = '#<ci:doc type( =|=|= )("|\')('.$module_place.')("|\')( \/|\/)>#';
		
		// replace ci:doc tag with view file of selected module
		$replace = realpath(APPPATH . '/' . $module_place . '/' . $module_name .'/views/' . $embed_template . '.php');
		$replace = file_get_contents($replace);
		if(is_array($data))
		{
			foreach($data as $getkey => $info)
			{
				$$getkey = $data[$getkey];
			}
		}
		ob_start();		
		echo eval('?>'.preg_replace($regex,$replace,$string));
		global $OUT;
		$OUT->append_output(ob_get_contents());
		@ob_end_clean();
	}
}
