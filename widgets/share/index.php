<?php
	// widgets/share/index.php
	if (defined('MAIN_INIT')) {
		// share on tweeter & facebook
		$widget[] = '<div class=widget_share>';
		$widget[] = '<a class="fb_share icon-facebook" title="Facebook Share"></a>';
		$widget[] = '<a class="twitter_share icon-twitter" title="Twitter"></a>';
		$widget[] = '<a class="gplus_share icon-googleplus" title="Google Plus"></a>';
		if (!empty($config['google_profile'])) {
			$widget[] = '<a rel=nofollow href="http://plus.google.com/'.$config['google_profile'].'" class="google_profile icon-google" target=_blank title="Google Profile"></a>';
		}
		$widget[] = '<a class="line_share icon-comments" title="LINE it!"></a>';
		$widget[] = '<a class="email_share icon-email" title="{LNG_SHARE_TITLE}"></a>';
		$widget[] = '<script>';
		$widget[] = '$G(window).Ready(function(){';
		$widget[] = 'inintShareButton(document);';
		$widget[] = '});';
		$widget[] = '</script>';
		$widget[] = '</div>';
		$widget = implode("\n", $widget);
	}
