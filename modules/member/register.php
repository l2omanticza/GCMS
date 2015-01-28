<?php
	// modules/member/register.php
	if (defined('MAIN_INIT')) {
		// title
		$title = $lng['LNG_REGISTER_TITLE'];
		// breadcrumbs
		$breadcrumb = gcms::loadtemplate('', '', 'breadcrumb');
		$breadcrumbs = array();
		// หน้าหลัก
		$breadcrumbs['HOME'] = gcms::breadcrumb('icon-home', WEB_URL.'/index.php', $install_modules[$module_list[0]]['menu_tooltip'], $install_modules[$module_list[0]]['menu_text'], $breadcrumb);
		// url ของหน้านี้
		$breadcrumbs['MODULE'] = gcms::breadcrumb('', gcms::getURL('register'), $lng['LNG_REGISTER_TITLE'], $lng['LNG_REGISTER_TITLE'], $breadcrumb);
		if (!empty($config['custom_register']) && is_file(ROOT_PATH.$config['custom_register'])) {
			// custom register form
			include (ROOT_PATH.$config['custom_register']);
		} else {
			// antispam
			$register_antispamchar = gcms::rndname(32);
			$_SESSION[$register_antispamchar] = gcms::rndname(4);
			// แสดงฟอร์ม registerfrm.html
			$patt = array('/{BREADCRUMS}/', '/<PHONE>(.*)<\/PHONE>/isu', '/<IDCARD>(.*)<\/IDCARD>/isu', '/<INVITE>(.*)<\/INVITE>/isu',
				'/{(LNG_[A-Z0-9_]+)}/e', '/{ANTISPAM}/', '/{WEBURL}/', '/{MODAL}/', '/{INVITE}/');
			$replace = array();
			$replace[] = implode("\n", $breadcrumbs);
			$replace[] = gcms::getVars($config, 'member_phone', 0) ? '' : '\\1';
			$replace[] = gcms::getVars($config, 'member_idcard', 0) ? '' : '\\1';
			$replace[] = gcms::getVars($config, 'member_invitation', 0) ? '' : '\\1';
			$replace[] = 'gcms::getLng';
			$replace[] = $register_antispamchar;
			$replace[] = WEB_URL;
			$replace[] = isset($_POST['action']) && $_POST['action'] != 'modal' ? 'false' : 'true';
			$replace[] = empty($_COOKIE[PREFIX.'_invite']) ? '' : $_COOKIE[PREFIX.'_invite'];
			$content = gcms::pregReplace($patt, $replace, gcms::loadtemplate('member', 'member', 'registerfrm'));
		}
	}
