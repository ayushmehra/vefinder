<?php 
	
	function sign($params, $api_key) {
		$flattened_params = flatten_params($params);
		ksort($flattened_params);
		$base = implode(" ", $flattened_params);
		
		return hash_hmac("sha256", $base, $api_key);
	}
	
	function flatten_params($obj, $result = array(), $path = array()) {
		if (is_array($obj)) {
			foreach ($obj as $k => $v) {
				$result = array_merge($result, flatten_params($v, $result, array_merge($path, array($k))));
				}
			} else {
			$result[implode("", array_map(function($p) { return "[{$p}]"; }, $path))] = $obj;
		}
		
		return $result;
	}	