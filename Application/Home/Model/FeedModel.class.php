<?php
namespace Home\Model;
use Think\Model;
class FeedModel extends Model{

	public function get(){
	    $data = $this->select();
	    return $data;
	}
}