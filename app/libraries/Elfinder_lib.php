<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder/elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder/elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder/elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder/elFinderVolumeLocalFileSystem.class.php';

class Elfinder_lib 
{
	public function __construct($opts) 
	{
		$connector = new elFinderConnector(new elFinder($opts));
		$connector->run();
	}
}	