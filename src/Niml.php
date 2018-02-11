<?php
define('NIML_PATH', dirname(__FILE__));
function __niml_autoload($className) {
    if (substr($className, 0, 5) === 'NIML_') {
        require_once NIML_PATH . str_replace('_', '/', preg_replace('/^NIML_/', '/', $className)) . '.php';
    }
}
spl_autoload_register('__niml_autoload');

/**
 * @class NIML
 * @desc New Idea Marked Language PHP Template Engine Object
 * 
 * @final
 * @author Jangts
 * @version 1.0.0
**/
abstract class NIML {
	use NIML_plugins_all;

	protected
	$nimlonly,
	$lefttime = 0,
	$data = [],
	$mime = 'text/html',
	$theme = 'default',
	$sourcedir = 'source/',
	$compileddir = 'compiled/';

	public
	$leftTAG = '{{',
	$rightTAG = '}}';

	public function assign($var=null, $val="", $prefix = '') {
		if($var!=null){
			if(is_string($var)||is_numeric($var)){
				$this->data[$prefix.$var] = $val;
			}elseif(is_array($var)){
				foreach($var as $index=>$item){
					$this->assign($index, $item, $val);
				}
			}
		}
	}

	public function unassign($var) {
		usset($this->data[$var]);
	}

	public function using($theme="default"){
		$this->theme = $theme;
		return $this;
	}

	public function showas($mime="text/html"){
		$this->mime = $mime;
		return $this;
	}

	protected function getFilenames($template, $is_include){
		return [$this->$sourcedir.$this->theme.'/'.$template, $this->$compileddir.hash('md4', $this->theme.'/'.$template).".php"];
	}

	final public function display($template, $nimlonly = true){
		if(!$template){
			exit('Template ['.$template.'] Not Found');
		}else{
			$filenames = $this->getFilenames($template);
			$this->nimlonly = $nimlonly;
			$this->check($filenames[0], $filenames[1], $nimlonly);
			$this->response($filenames[1]);
		}
	}

	private function including($template){
		if($template){
			$filenames = $this->getFilenames($template, true);
			$this->check($filenames[0], $filenames[1], $this->nimlonly);
			extract($GLOBALS);
			extract($this->data, EXTR_PREFIX_SAME, 'NIML');
			include $filenames[1];
		}
	}

	private function check($sourcefile, $compiledfile, $nimlonly){
		if(is_file($sourcefile)){
			if(!is_file($compiledfile)){
				$this->compile($sourcefile, $compiledfile, $this->theme, $nimlonly);
			}
			if(filemtime($sourcefile)>filemtime($compiledfile)){
				$this->compile($sourcefile, $compiledfile, $this->theme, $nimlonly);
			}
			return true;
		}
		exit('Template File ['.$sourcefile.'] Not Found');
	}

	protected function compile($source, $compiled, $theme, $nimlonly){
		if(is_file($source)){
			$translator = new NIML_Translator($this->leftTAG, $this->rightTAG);
			$compiler = new NIML_Compiler($translator->translate(file_get_contents($source), $nimlonly));
			$compiler->tokenizer();
			$compiler->LAR->parser();
			$compiler->GRR->transformer($theme);
			$compiler->GRR->coder();
			$contents = $compiler->outputter($compiled);
		}
	}

	private function response($file){
		extract($GLOBALS);
		extract($this->data, EXTR_PREFIX_SAME, 'NIML');
		header("Content-Type: ".$this->mime."; charset=UTF-8");
		include $file;
		exit;
	}
}
