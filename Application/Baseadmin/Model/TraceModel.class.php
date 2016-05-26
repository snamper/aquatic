<?php
namespace Baseadmin\Model;
use Think\Model;
class TraceModel extends Model{

	public function search_breed(){

        if(IS_POST) {
           
          $params = I('post.');
          var_dump($params);die;
  	   	  $map['stocking_pool_id'] = $params['pool_id'];
  	   	  $map['stocking_base_id'] = $params['batch'];
  	   	  $map['trace_finish_time'] = array(array('elt', $params['end_time']),array('egt',$params['start_time']));
  	   	  $data = $this->where($map)->select();
          foreach ($data as $key => $value) {
          	 $res = M("sale")->where(array('sale_id' => $value['trace_sale_id']))->find();
          	 $data[$key]['trace_fry_id'] = M('fry')->getFieldByfry_id($data[$key]['trace_fry_id'],'fry_name');
          	 $data[$key]['number'] = $res['sale_number'];
             $data[$key]['weight'] = $res['sale_weight'];
             $data[$key]['univalent'] = $res['sale_univalent'];
             $rres = M('record')->where(array('record_id' => $res['sale_record_id']))->find();
             $data[$key]['batch'] = $rres['record_batch'];
             $data[$key]['rowid'] = M('cage')->getFieldBycage_id($rres['record_cage_id'], 'cage_rowid');

          }
          return $data;
        }else {

        }
	}
	public function search_batch(){

		if(IS_POST) {
        
          $params = I('post.');
          //var_dump($params);die;
          $map['stocking_pool_id'] = $params['pool_id'];
          $map['stocking_base_id'] = $params['batch'];
          $map['_finish_time'] = array(array('elt', $params['end_time']),array('egt',$params['start_time']));
          $data = $this->where($map)->select();
          foreach ($data as $key => $value) {
             $res = M("sale")->where(array('sale_id' => $value['trace_sale_id']))->find();
             $data[$key]['trace_fry_id'] = M('fry')->getFieldByfry_id($data[$key]['trace_fry_id'],'fry_name');
             $data[$key]['number'] = $res['sale_number'];
             $data[$key]['weight'] = $res['sale_weight'];
             $data[$key]['univalent'] = $res['sale_univalent'];
             $rres = M('record')->where(array('record_id' => $res['sale_record_id']))->find();
             $data[$key]['batch'] = $rres['record_batch'];
             $data[$key]['rowid'] = M('cage')->getFieldBycage_id($rres['record_cage_id'], 'cage_rowid');

          }
          return $data;
		}else {
        
		}
	}
	public function search_sale(){
	   
	   if(IS_POST) {
	   	  $params = I('post.');
	   	  $map['trace_pool_id'] = $params['pool_id'];
	   	  $map['trace_base_id'] = $params['base_id'];
	   	  $map['trace_finish_time'] = array(array('elt', $params['end_time']),array('egt',$params['start_time']));
	   	  $data = $this->where($map)->select();
          foreach ($data as $key => $value) {
          	 $res = M("sale")->where(array('sale_id' => $value['trace_sale_id']))->find();
          	 $data[$key]['trace_fry_id'] = M('fry')->getFieldByfry_id($data[$key]['trace_fry_id'],'fry_name');
          	 $data[$key]['number'] = $res['sale_number'];
             $data[$key]['weight'] = $res['sale_weight'];
             $data[$key]['univalent'] = $res['sale_univalent'];
             $rres = M('record')->where(array('record_id' => $res['sale_record_id']))->find();
             $data[$key]['batch'] = $rres['record_batch'];
             $data[$key]['rowid'] = M('cage')->getFieldBycage_id($rres['record_cage_id'], 'cage_rowid');

          }
          return $data;
          
	   }else {
          
	   }
	}
	
}