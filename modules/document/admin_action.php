<?php
	// modules/document/admin_action.php
	header("content-type: text/html; charset=UTF-8");
	// inint
	include '../../bin/inint.php';
	// referer, member
	if (gcms::isReferer() && gcms::isMember()) {
		if (empty($_SESSION['login']['account']) || $_SESSION['login']['account'] != 'demo') {
			// ค่าที่ส่งมา
			if (isset($_POST['data'])) {
				list($action, $module, $id) = explode('-', $_POST['data']);
			} elseif (preg_match('/^category_([0-9]+)$/', $_POST['id'], $match)) {
				// เลือก category ตอน เขียน
				$action = 'changecategory';
				$module = $match[1];
				$value = gcms::getVars($_POST, 'value', 0);
			} else {
				$action = gcms::getVars($_POST, 'action', '');
				$id = gcms::getVars($_POST, 'id', '');
				$value = gcms::getVars($_POST, 'value', 0);
				$module = gcms::getVars($_POST, 'module', 0);
			}
			// โมดูลที่เรียก
			$index = $db->getRec(DB_MODULES, $module);
			if ($index) {
				// config
				gcms::r2config($index['config'], $index);
				// ผู้ดูแล
				$moderator = gcms::canConfig($index, 'moderator');
				// แอดมิน
				$admin = gcms::canConfig($index, 'can_config');
				if ($moderator && $action == 'delete') {
					// ลบ (บทความ)
					$sql = "SELECT `picture` FROM `".DB_INDEX."` WHERE `id` IN($id) AND `module_id`='$index[id]' AND `picture`<>''";
					foreach ($db->customQuery($sql) AS $item) {
						@unlink(DATA_PATH."document/$item[picture]");
					}
					$db->query("DELETE FROM `".DB_COMMENT."` WHERE `index_id` IN ($id) AND `module_id`='$index[id]'");
					$db->query("DELETE FROM `".DB_INDEX."` WHERE `id` IN ($id) AND `module_id`='$index[id]'");
					$db->query("DELETE FROM `".DB_INDEX_DETAIL."` WHERE `id` IN ($id) AND `module_id`='$index[id]'");
					// อัปเดทจำนวนเรื่อง และ ความคิดเห็น ในหมวด
					$sql1 = "SELECT COUNT(*) FROM `".DB_INDEX."` WHERE `category_id`=C.`category_id` AND `module_id`='$index[id]' AND `index`='0'";
					$sql2 = "SELECT `id` FROM `".DB_INDEX."` WHERE `category_id`=C.`category_id` AND `module_id`='$index[id]' AND `index`='0'";
					$sql2 = "SELECT COUNT(*) FROM `".DB_COMMENT."` WHERE `index_id` IN ($sql2) AND `module_id`='$index[id]'";
					$sql = "UPDATE `".DB_CATEGORY."` AS C SET C.`c1`=($sql1),C.`c2`=($sql2) WHERE C.`module_id`='$index[id]'";
					$db->query($sql);
				} elseif ($moderator && $action == 'news') {
					// show_news (บทความ)
					$db->query("UPDATE `".DB_INDEX."` SET `show_news`='$value' WHERE `id` IN($id) AND `module_id`='$index[id]'");
				} elseif ($moderator && $action == 'published') {
					// published (บทความ)
					$db->query("UPDATE `".DB_INDEX."` SET `published`='$value' WHERE `id` IN($id) AND `module_id`='$index[id]'");
				} elseif ($moderator && $action == 'canreply') {
					// can_reply (บทความ)
					$db->query("UPDATE `".DB_INDEX."` SET `can_reply`='$value' WHERE `id` IN($id) AND `module_id`='$index[id]'");
				}
			}
		}
	}
