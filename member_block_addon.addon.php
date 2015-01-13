<?php
	if(!defined("__XE__")) exit();

	if($called_position == 'after_module_proc') {
		if(Context::get('document_list')) {
			$docu_list = Context::get('document_list');
			$logged_info = Context::get('logged_info');
			$blocked_list = explode(",",$logged_info->block_list);
			foreach($docu_list as $key => $val) {
				if(in_array($val->get('nick_name'), $blocked_list))
					unset($docu_list[$key]);
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

		if(Context::get('message_list')) {
			$msg_list = Context::get('message_list');
			$logged_info = Context::get('logged_info');
			$blocked_list = explode(",",$logged_info->block_list);
			foreach($msg_list as $key => $val) {
				if(in_array($val->nick_name, $blocked_list))
					unset($msg_list[$key]);
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
	}
