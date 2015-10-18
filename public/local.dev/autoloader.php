<?php
	function loadClass($className) {
		$fileName = '';
		$namespace = '';

		// Define include Path
		$includePath = dirname(__FILE__);

		if (false !== ($lastNsPos = strripos($className, '\\'))) {
			$namespace = substr($className, 0, $lastNsPos);
			/* Remove vendor name TODO: genealize */
			$namespace = substr($namespace, 4);
			$className = substr($className, $lastNsPos + 1);
			$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
		}
		$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		$fullFileName = $includePath . DIRECTORY_SEPARATOR . $fileName;

		if (file_exists($fullFileName)) {
			require $fullFileName;
		} else {
			echo 'Class "'.$className.'" does not exist.';
		}
	}
	spl_autoload_register('loadClass'); // Registers the autoloader
?>