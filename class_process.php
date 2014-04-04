<?php
class Process {
	var $level	= 0;
	var $uid	= '';
	var $pid	= 0;
	var $ppid	= 0;
	var $cmd	= '';
	var $children = array();

	function insert($process, $level) {
		if ($process->ppid == $this->pid) {
			$process->level = ($this->level + 1);
			$this->push($this->children, $process);
			$GLOBALS['insert_success'] = true;
		} else {
			foreach($this->children as $child) {
				$child->insert($process, ($this->level));
			}
		}
	}

	function push(&$array, &$object){
	   $array[] =& $object;
	}

	function print_children() {
		$process = array();
		$process['PID'] = $this->pid;
		$process['PPID'] = $this->ppid;
		$process['UID'] = $this->uid;
		$process['NAME'] = $this->cmd;
		$process['level'] = $this->level - 1;
		if ($this->pid != 0) array_push($GLOBALS['processes'], $process);

		for ($i = 0; $i < count($this->children); $i++) {
			$this->children[$i]->print_children();
		}
	}
}
?>