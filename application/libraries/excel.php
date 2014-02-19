<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class excel{
	function to_excel($array, $filename, $title = '') {
		header('Content-Disposition: attachment; filename='.$filename.'.xls');
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');

		print "\xEF\xBB\xBF"; // UTF-8 BOM
		print date("m/d/Y h:i:s a", time()) . ' tarihli ' . $title . ' Listesi';
		$h = array();

		foreach($array as $row){
			foreach($row as $key=>$val){
				if(!in_array($key, $h)){
					$h[] = $key;
				}
			}
		}

		echo '<table><tr>';
		foreach($h as $key) {
			$key = ucwords($key);
			echo '<th style="float: left;">'.$key.'</th>';
		}

		echo '</tr>';

		foreach($array as $row){
			echo '<tr>';
			foreach($row as $val)
				$this->writeRow($val);
		}

		echo '</tr>';
		echo '</table>';
	}

	function writeRow($val) {
		echo '<td>'.$val.'</td>';
	}
}

?>