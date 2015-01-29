TRUNCATE `{prefix}_board_q`;
TRUNCATE `{prefix}_board_r`;
TRUNCATE `{prefix}_category`;
TRUNCATE `{prefix}_comment`;
TRUNCATE `{prefix}_index`;
TRUNCATE `{prefix}_index_detail`;
TRUNCATE `{prefix}_menus`;
TRUNCATE `{prefix}_modules`;
INSERT INTO `{prefix}_board_q` (`id`, `module_id`, `category_id`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `topic`, `detail`) VALUES ('1','4','2','','1','admin@goragod.com','171.5.250.37','1379218043','1379218043','220','1','1','admin@localhost.com','0','1379219259','','0','0','0','0','0','0','0','','กระทู้แรกของคุณ','นี่คือ กระทู้แรกของคุณ');
INSERT INTO `{prefix}_board_r` (`id`, `module_id`, `index_id`, `detail`, `sender`, `member_id`, `email`, `ip`, `last_update`, `picture`, `pictureW`, `pictureH`) VALUES ('1','4','1','นี่คือความคิดเห็นจากบุคคลทั่วไป','','0','admin@localhost.com','171.5.250.37','1379219259','','0','0');
INSERT INTO `{prefix}_category` (`id`, `module_id`, `category_id`, `group_id`, `config`, `c1`, `c2`, `topic`, `detail`, `icon`) VALUES ('1','3','1','0','published=1\ncan_reply=0','1','0','a:1:{s:0:"";s:36:"บทความทั่วไป";}','a:1:{s:0:"";s:76:"บทความทั่วไป แหล่งเรียนรู้";}','');
INSERT INTO `{prefix}_category` (`id`, `module_id`, `category_id`, `group_id`, `config`, `c1`, `c2`, `topic`, `detail`, `icon`) VALUES ('2','3','2','0','published=1\ncan_reply=0','1','1','a:1:{s:0:"";s:12:"ข่าว";}','a:1:{s:0:"";s:54:"ข่าวสารจากเว็บไซต์";}','');
INSERT INTO `{prefix}_category` (`id`, `module_id`, `category_id`, `group_id`, `config`, `c1`, `c2`, `topic`, `detail`, `icon`) VALUES ('3','4','1','0','can_post=0,2,1\ncan_view=-1,0,2,1\ncan_reply=0,2,1\nmoderator=2,1\nimg_upload_size=500\nimg_law=0\nimg_upload_type=jpg','0','0','a:1:{s:0:"";s:18:"ทั่วไป";}','a:1:{s:0:"";s:52:"ถาม-ตอบปัญหาทั่วไป";}','');
INSERT INTO `{prefix}_category` (`id`, `module_id`, `category_id`, `group_id`, `config`, `c1`, `c2`, `topic`, `detail`, `icon`) VALUES ('4','4','2','0','can_post=-1,0,2,1\ncan_view=-1,0,2,1\ncan_reply=-1,0,2,1\nmoderator=2,1\nimg_upload_size=500\nimg_law=0\nimg_upload_type=jpg','1','1','a:1:{s:0:"";s:27:"แจ้งปัญหา";}','a:1:{s:0:"";s:78:"แจ้งปัญหาการใช้งานเว็บไซต์";}','');
INSERT INTO `{prefix}_comment` (`id`, `module_id`, `index_id`, `detail`, `sender`, `member_id`, `email`, `ip`, `last_update`, `picture`, `pictureW`, `pictureH`) VALUES ('1','3','6','นี่คือความคิดแรกของคุณ','','1','admin@goragod.com','171.5.250.37','1379217942','','0','0');
INSERT INTO `{prefix}_comment` (`id`, `module_id`, `index_id`, `detail`, `sender`, `member_id`, `email`, `ip`, `last_update`, `picture`, `pictureW`, `pictureH`) VALUES ('2','3','7','<img alt="laugh" height="20" src="http://demo.gcms.in.th/ckeditor/plugins/smiley/images/teeth_smile.gif" title="laugh" width="20" />','','1','admin@goragod.com','171.5.250.37','1379219933','','0','0');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('1','1','1','0','','','1','','223.206.32.8','0','1416556163','5979','0','0','','0','0','','0','0','0','0','1','1','1','','2013-06-22','GCMS Ajax CMS');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('2','1','2','0','','','1','','49.48.206.73','0','1367724891','392','0','0','','0','0','','0','0','0','0','1','0','0','','2013-06-22','เกี่ยวกับเรา - ติดต่อเรา');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('3','1','3','0','','','0','','','0','0','0','0','0','','0','0','','0','0','0','0','1','0','0','','2013-06-22','บทความ แหล่งเรียนรู้ :: Knowledge');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('4','1','4','0','','','0','','','0','0','1','0','0','','0','0','','0','0','0','0','1','0','0','','2013-06-22','GCMS บอร์ด');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('5','0','3','1','','','1','','171.5.251.149','1379217826','1390276091','151','0','0','','0','0','','0','0','0','0','1','0','0','','2013-09-15','บทความแรกของคุณ');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('6','0','3','2','','','1','','171.5.250.37','1379217882','1379217882','140','1','1','admin@goragod.com','1','1379217942','','0','0','0','1','1','0','0','','2013-09-15','ข่าวแรกของคุณ');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('7','1','8','0','','','0','','','0','0','0','0','0','','0','0','','0','0','0','0','1','0','0','','0000-00-00','');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('8','1','5','0','','','0','','','0','0','0','0','0','','0','0','','0','0','0','0','1','0','0','','0000-00-00','');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('9','1','6','0','','','0','','','0','0','0','0','0','','0','0','','0','0','0','0','1','0','0','','0000-00-00','');
INSERT INTO `{prefix}_index` (`id`, `index`, `module_id`, `category_id`, `language`, `sender`, `member_id`, `email`, `ip`, `create_date`, `last_update`, `visited`, `comments`, `comment_id`, `commentator`, `commentator_id`, `comment_date`, `picture`, `pictureW`, `pictureH`, `hassubpic`, `can_reply`, `published`, `pin`, `locked`, `related`, `published_date`, `alias`) VALUES ('11','1','8','0','','','0','','','0','0','0','0','0','','0','0','','0','0','0','0','1','0','0','','0000-00-00','');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('2','2','','เกี่ยวกับเรา - ติดต่อเรา','เกี่ยวกับเรา ติดต่อเรา About Us','{WIDGET_CONTACT_admin@demo.com}','เกี่ยวกับเรา ติดต่อเรา About Us','เกี่ยวกับเรา ติดต่อเรา About Us');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('3','3','','บทความ แหล่งเรียนรู้ :: Knowledge','บทความ แหล่งเรียนรู้ Knowledge goragod.com','','บทความ แหล่งเรียนรู้ Knowledge goragod.com','บทความ แหล่งเรียนรู้ Knowledge goragod.com');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('4','4','','GCMS บอร์ด','เว็บบอร์ด GCMS Board ถามตอปัญหาคาใจ www.gcms.in.th','','เว็บบอร์ด GCMS Board ถามตอปัญหาคาใจ www.gcms.in.th','เว็บบอร์ด GCMS Board ถามตอปัญหาคาใจ www.gcms.in.th');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('5','3','','บทความแรกของคุณ','นี่คือบทความแรกของคุณ คุณ สามารถ ลบ หรือ แก้ไขมันได้','นี่คือบทความแรกของคุณ คุณ สามารถ ลบ หรือ แก้ไขมันได้','บทความแรกของคุณ','บทความแรกของคุณ');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('6','3','','ข่าวแรกของคุณ','นี่คือข่าวแรกของคุณ คุณสามารถ ลบ หรือ แก้ไขได้','นี่คือข่าวแรกของคุณ คุณสามารถ ลบ หรือ แก้ไขได้','ข่าวแรกของคุณ','ข่าวแรกของคุณ');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('7','3','','ทดสอบครับ','ทดสอบครับ ทดสอบครับ','ทดสอบครับ ทดสอบครับ','ทดสอบครับ','ทดสอบครับ');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('8','5','','Download','','','','');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('9','6','','Gallery','','','','');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('11','8','','Video','','','','');
INSERT INTO `{prefix}_index_detail` (`id`, `module_id`, `language`, `topic`, `description`, `detail`, `keywords`, `relate`) VALUES ('1','1','','กองบังคับการปราบปรามการกระทำผิดเกี่ยวกับการค้ามนุษย์','กองบังคับการปราบปรามการกระทำผิดเกี่ยวกับการค้ามนุษย์','<h1>ยินดีต้อนรับสู่ GCMS</h1>\r\n\r\n<div>\r\n<p style="margin-bottom: 10px;">ขณะนี้คุณได้ติดตั้ง GCMS เป็นที่เรียบร้อยแล้ว และนี่คือหน้าแรกของคุณ</p>\r\n\r\n<p style="margin-bottom: 10px;">GCMS เป็น Ajax CMS สมบูรณ์แบบ ที่พัฒนาโดยคนไทยทั้งระบบ เพื่อให้การใช้งาน CMS แบบ Ajax เป็นเรื่องที่ง่ายขึ้น และแก้ปัญหาของ Ajax ที่เป็นที่กังวล ทั้งในเรื่องการรองรับหลายบราวเซอร์, การปิดการใช้งาน Javascript, การ Refresh หน้า, การ Bookmark, การใช้งานปุ่ม History ของบราวเซอร์ และที่สำคัญคือ SEO</p>\r\n\r\n<p style="margin-bottom: 10px;">GCMS เหมาะสมสำหรับการทำเว็บไซต์ทั่วไป ทั้งเว็บไซต์ส่วนบุคคล หน่วยงานราชการ หรือเว็บไซต์อื่นๆ ตั้งแต่ขนาดเล็ก ไปจนถึงเว็บไซต์ขนาดใหญ่ ด้วยการออกแบบที่เน้นอิสระในการปรับปรุงหน้าเว็บ ไม่มุ่งเน้นไปที่เว็บไซต์แบบใดแบบหนึ่งโดยเฉพาะ และมีคุณสมบัติเบื้องต้นต่อการออกแบบเว็บไซต์ทั่วไปได้ง่าย นอกจากนี้ GCMS ยังเหมาะสมเป็นอย่างยิ่ง สำหรับผู้ที่ชอบออกแบบเว็บด้วยตัวเอง ด้วยการใช้ GCMS เป็นพื้นฐานของเว็บเนื่องจาก GCMS มีระบบพื้นฐานครบถ้วน และออกแบบโมดูลตามความต้องการเพื่อใช้งานร่วมกับ GCMS ซึ่งทำให้ประหยัดเวลาในการออกแบบเว็บลงเป็นอย่างมาก</p>\r\n\r\n<p style="margin-bottom: 10px;">หากคุณมีข้อสงสัย ข้อเสนอแนะ หรือต้องการความช่วยเหลือเกี่ยวกับ GCMS คุณสามารถหาความช่วยเหลือนั้นได้ที่ <a href="http://www.goragod.com" rel="nofollow">http://www.goragod.com</a> และคุณสามารถแสดงความคิดเห็นของคุณต่อ GCMS รวมถึงปัญหาในการใช้งาน ตลอดจนข้อผิดพลาดต่างๆ ของ GCMS ได้ ความคิดเห็นของคุณจะช่วยผมในการพัฒนา GCMS ให้ดียิ่งขึ้นในโอกาศต่อไป</p>\r\n\r\n<p style="text-align: right; margin-bottom: 10px;">ด้วยความขอบคุณ<br>\r\n<strong>กรกฎ วิริยะ</strong></p>\r\n\r\n<p style="font-weight: bold; margin-bottom: 10px;">ข้อตกลงการนำ GCMS ไปใช้งาน</p>\r\n\r\n<ul style="padding: 0px 0px 0px 40px;">\r\n	<li>GCMS เป็น Ajax CMS ชนิด Open Source ที่แจกจ่ายให้กับทุกคนสามารถนำไปใช้งานได้ ฟรี โดยมีเงื่อนไขว่า <strong>ต้องติดข้อความหรือเครื่องหมายของผู้พัฒนาไว้เสมอ </strong>(<a href="http://www.goragod.com" rel="nofollow">http://www.goragod.com</a> และ <a href="http://www.webshopready.com" rel="nofollow">http://www.webshopready.com</a>)</li>\r\n	<li>ห้ามนำ GCMS หรือ ส่วนหนึ่งส่วนใดของ GCMS ไป จำหน่าย จ่าย แจก หรือ ใช้งานกับบุคคลที่สาม เว้นแต่จะได้รับความยินยอมจากผู้พัฒนา</li>\r\n	<li>คุณสามารถพัฒนาต่อยอด เพิ่มเติม แก้ไข หรือ ดัดแปลง GCMS ได้เพื่อการใช้งานส่วนบุคคล โดยต้องติดข้อความหรือโลโกของผู้พัฒนาไว้เสมอไม่ว่าจะเปลี่ยนแปลงไปมากน้อยแค่ไหนก็ตาม</li>\r\n	<li>คุณสามารถพัฒนา โมดูลเสริม หรือ วิดเจ็ท หรือ ส่วนประกอบอื่นใด (นอกจากที่มีแจกจ่ายโดยผู้พัฒนาอยู่แล้ว) เพื่อใช้หรือเพื่อจำหน่าย จ่าย แจกได้ โดยให้สิทธิ์เป็นของผู้พัฒนาเอง (ขายหรือแจกเฉพาะโมดูล)</li>\r\n	<li>หากคุณต้องการนำ GCMS ไปใช้กับบุคลที่สาม หรือ เพื่อขาย หรือต้องการนำเครื่องหมายหรือข้อความของผู้พัฒนาออก คุณสามารถติดต่อกับผู้พัฒนาได้โดยตรง ตามที่อยู่ใน <a href="http://www.goragod.com/about.html" rel="nofollow">http://www.goragod.com/about.html</a></li>\r\n</ul>\r\n</div>\r\n','กองบังคับการปราบปรามการกระทำผิดเกี่ยวกับการค้ามนุษย์','');
INSERT INTO `{prefix}_menus` (`id`, `index_id`, `parent`, `level`, `language`, `menu_text`, `menu_tooltip`, `accesskey`, `menu_order`, `menu_url`, `menu_target`, `alias`, `published`) VALUES ('1','1','MAINMENU','0','','หน้าหลัก','หน้าหลัก :: Home','','1','','','','1');
INSERT INTO `{prefix}_menus` (`id`, `index_id`, `parent`, `level`, `language`, `menu_text`, `menu_tooltip`, `accesskey`, `menu_order`, `menu_url`, `menu_target`, `alias`, `published`) VALUES ('2','0','MAINMENU','1','','GCMS','เว็บหลัก GCMS','','4','http://gcms.in.th','','','1');
INSERT INTO `{prefix}_menus` (`id`, `index_id`, `parent`, `level`, `language`, `menu_text`, `menu_tooltip`, `accesskey`, `menu_order`, `menu_url`, `menu_target`, `alias`, `published`) VALUES ('3','3','MAINMENU','0','','บทความ','บทความ แหล่งเรียนรู้','','2','','','','1');
INSERT INTO `{prefix}_menus` (`id`, `index_id`, `parent`, `level`, `language`, `menu_text`, `menu_tooltip`, `accesskey`, `menu_order`, `menu_url`, `menu_target`, `alias`, `published`) VALUES ('4','4','MAINMENU','0','','บอร์ด','เว็บบอร์ด :: GCMS Board','','3','','','','1');
INSERT INTO `{prefix}_menus` (`id`, `index_id`, `parent`, `level`, `language`, `menu_text`, `menu_tooltip`, `accesskey`, `menu_order`, `menu_url`, `menu_target`, `alias`, `published`) VALUES ('5','2','MAINMENU','0','','About Us','ติดต่อเรา :: About Us','','5','','','','1');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('1','index','home','');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('2','index','about','');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('3','document','knowledge','icon_w=32\nicon_h=32\ndefault_icon=modules/document/img/document-icon.png\nicon_width=75\nicon_height=75\nimg_typies=jpg\nlist_per_page=20\nnews_count=15\nnews_sort=0\ncategory_display=1\ncan_view=-1,0,2,1\nviewing=0\nnew_date=604800\nmoderator=2,1\ncan_reply=0,1,2\npublished=1\nsort=0\ncan_config=1\ncan_write=2,1');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('4','board','forum','icon_w=32\nicon_h=32\ndefault_icon=modules/board/img/board-icon.png\nicon_width=32\nicon_height=32\nicon_category_type=jpg,gif,png\nlist_per_page=20\ncategory_display=1\nnews_count=10\ncan_view=0,2,1\nviewing=1\nnew_date=604800\nmoderator=2,1\ncan_config=1\ncan_reply=0,2,1\nimg_upload_size=500\nimg_law=0\nthumb_width=16\nimg_upload_type=jpg\ncan_post=0,2,1');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('5','download','download','');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('6','gallery','gallery','');
INSERT INTO `{prefix}_modules` (`id`, `owner`, `module`, `config`) VALUES ('8','video','video','');