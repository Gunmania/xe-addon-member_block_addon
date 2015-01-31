<?php
	if(!defined("__XE__")) exit();
	
	if($called_position == '') {
	}

	if($called_position == 'after_module_proc') {
		if(Context::get('document_list') && !Context::get('document_srl')) {
			$docu_list = Context::get('document_list');
			$logged_info = Context::get('logged_info');
			$blocked_list = explode(",",$logged_info->block_list);
			foreach($docu_list as $key => $val) {
				if(in_array($val->get('nick_name'), $blocked_list)) {
					if($logged_info->except_block != "N")
						unset($docu_list[$key]);
					else {
						$temp = $val;
						$arr->title="[차단한 회원이 작성한 글입니다]";
						$temp->variables = (array) $arr;
						$docu_list[$key] = $temp;
					}
				}
			}
			Context::set('document_list',$docu_list);
		}

		if(Context::get('document_srl')) {
			$document_srl = Context::get('document_srl');
			$logged_info = Context::get('logged_info');
			$blocked_list = explode(",",$logged_info->block_list);
			$oDocumentModel = &getModel('document');
			$oDocument = $oDocumentModel->getDocument($document_srl);
			if(in_array($oDocument->get('nick_name'), $blocked_list)) {
				header("Content-Type: text/html; charset=UTF-8");
				echo '<script>alert("차단한 회원이 작성한 글입니다.");</script>';
				if($_SERVER['HTTP_REFERER'])
					echo '<script>window.location.href = "'.$_SERVER['HTTP_REFERER'].'";</script>';
				else
					echo '<script>window.location.href = "'.getUrl().'";</script>';
			}
		}

		if(Context::get('message_list') && !Context::get('message_srl')) {
			$msg_list = Context::get('message_list');
			$logged_info = Context::get('logged_info');
			$blocked_list = explode(",",$logged_info->block_list);
			foreach($msg_list as $key => $val) {
				if(in_array($val->nick_name, $blocked_list))
					if($logged_info->except_block != "N")
						unset($msg_list[$key]);
					else {
						$temp = $val;
						$temp->title="[차단한 회원이 보낸 쪽지입니다]";
						$temp->nick_name="";
						$msg_list[$key] = $temp;
					}
						
			}
			Context::set('message_list',$msg_list);
		}
		
		if(Context::get('message_srl')) {
			$msg_srl = Context::get('message_srl');
			$logged_info = Context::get('logged_info');
			$blocked_list = explode(",",$logged_info->block_list);
			$oCommunicationModel = &getModel('communication');			
			$oMessage = $oCommunicationModel->getSelectedMessage($msg_srl);
			if(in_array($oMessage->nick_name, $blocked_list)) {
				header("Content-Type: text/html; charset=UTF-8");
				echo '<script>alert("차단한 회원이 보낸 쪽지입니다.");</script>';
				if($_SERVER['HTTP_REFERER'])
					echo '<script>window.location.href = "'.$_SERVER['HTTP_REFERER'].'";</script>';
				else
					echo '<script>window.location.href = "'.getUrl().'";</script>';
			}
		}
		
		if(Context::get('ncenterlite_list')) {
			if($this->act == "dispNcenterliteNotifyList") {
				$noti_list = Context::get('ncenterlite_list');
				$logged_info = Context::get('logged_info');
				$blocked_list = explode(",",$logged_info->block_list);
				foreach($noti_list as $key => $val) {
					if(in_array($val->target_nick_name, $blocked_list)) {
						if($logged_info->except_block != "N")
							unset($noti_list[$key]);
						else {
							$temp = $val;
							$temp->text="[차단한 회원과 관련된 알림입니다]";
							$temp->target_nick_name="";
							$temp->target_url="";
							$noti_list[$key] = $temp;
						}
					}
				}
				Context::set('ncenterlite_list',$noti_list);
			}
		}
	}
