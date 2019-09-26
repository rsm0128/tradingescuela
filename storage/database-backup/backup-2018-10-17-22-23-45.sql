

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admins VALUES("1","Alex Doe","admin","admin@gmail.com","1523439979.jpg","$2y$10$vzmtdYksO06ie0BS2ylbD.15.QBEdP5ebZpOUv2PYXu7e5fDI6Ay2","aKQqXNoikxbji2JRZviRSmuy1vIa9ndSejuqhNBgio8Hg3kVvwRHQKXge16F","","2018-04-11 15:46:19");
INSERT INTO admins VALUES("2","Lone Due","hellohasan","hellomrhasan@gmail.com","1516745190.png","$2y$10$tEEfh1NRmbsv2bjFeH4NK.5uzbh6/mdxFkRWRsc51bm1Jv9jA/N6O","fKVhdSTImg3JXiNXFn5op8VUpX2iSDdYX8IkIZpwPa2HdS6mhqhHbVa8OqPX","","2018-01-24 04:06:31");





CREATE TABLE IF NOT EXISTS `basic_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_status` tinyint(1) NOT NULL DEFAULT '0',
  `telegram_status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verify` tinyint(1) NOT NULL DEFAULT '0',
  `phone_verify` tinyint(1) NOT NULL DEFAULT '0',
  `register_status` tinyint(1) NOT NULL DEFAULT '0',
  `google_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic` blob,
  `meta_tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat` blob,
  `captcha_status` tinyint(1) NOT NULL DEFAULT '0',
  `captcha_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `captcha_site` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribe_bg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter_bg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_bg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` blob NOT NULL,
  `terms` blob NOT NULL,
  `short_about_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` blob NOT NULL,
  `email_body` blob NOT NULL,
  `sms_tem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` blob NOT NULL,
  `telegram_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tw_api` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO basic_settings VALUES("1","cryptoSignal","f69021","+123-56985-9988","support@cryptoexpertpro.com","Jalabad, Sonkor Road, Malasia 1260","USD","$","1","1","1","1","1","<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3331687710743!2d90.36636621538977!3d23.806748892537406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6f1d99d03%3A0xcd82050166bb03db!2sMirpur+10+Bus+Stopage!5e0!3m2!1sen!2sbd!4v1510782736980\" width=\"1900\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>","<script>\n  //Google Analytics scripts code here\n</script>","support@cryptoexpertpro.com,php scripts, cryptoexpertpro","author@gmail.com","This is Description","<!--Start of Tawk.to Script-->\n<script>\n  //Live Script scripts code here\n</script>\n<!--End of Tawk.to Script-->","1","6LdLbDwUAAAAAAJxk9AAI0HkNDAN865s-TSEZNbj","6LdLbDwUAAAAAONd5PuyVZloSLxh3x86tirXpNGx","breadcrumb_1514383161.jpg","subscribe_1509795019.jpg","counter_1512834741.jpg","speciality_1510523084.jpg","<div style=\"text-align: justify;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br style=\"margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; line-height: 24px; font-family: DauphinPlain; font-size: 24px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div></div>","<div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><span style=\"font-weight: 700; margin: 0px; padding: 0px;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" center;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0);\"><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>","sallhlpSaOvBzywNkuU4.png","About Company","What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page&nbsp;","<div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><span style=\"font-weight: 700; margin: 0px; padding: 0px;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" center;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0);\"><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where does it come from?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0);\"><h2 style=\"font-family: DauphinPlain; line-height: 24px; margin-top: 0px; margin-right: 0px; margin-left: 0px; font-size: 24px; padding: 0px;\">Where can I get some?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>","<p>&nbsp;</p>\n<div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\">\n<table style=\"border-collapse: collapse; table-layout: fixed; color: #b8b8b8; font-family: Ubuntu,sans-serif;\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"preheader__snippet\" style=\"padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\n<td class=\"preheader__webversion\" style=\"text-align: right; padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<table id=\"emb-email-header-container\" class=\"header\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto;\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"padding: 0; width: 600px;\">\n<div class=\"header__logo emb-logo-margin-box\" style=\"font-size: 26px; line-height: 32px; color: #c3ced9; font-family: Roboto,Tahoma,sans-serif; margin: 6px 20px 20px 20px;\">\n<div id=\"emb-email-header\" class=\"logo-left\" style=\"font-size: 0px !important; line-height: 0 !important;\" align=\"left\"><img style=\"height: auto; width: 100%; border: 0; max-width: 312px;\" src=\"https://i.imgur.com/GYloTas.png\" alt=\"\" width=\"312\" height=\"44\"></div>\n</div>\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"column\" style=\"padding: 0px; text-align: left; vertical-align: top; color: rgb(96, 102, 109); line-height: 21px; font-family: sans-serif; width: 600px;\">\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px; margin-top: 24px;\">\n<div style=\"line-height: 10px; font-size: 1px;\">&nbsp;</div>\n</div>\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px;\">\n<h2>Hi {{name}},</h2>\n<p><strong>{{message}}</strong></p>\n</div>\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px;\"><br></div>\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">\n<p class=\"size-14\" style=\"margin-top: 0px; margin-bottom: 0px; line-height: 21px;\"><font size=\"3\"><b>Thanks,</b></font><br> <strong style=\"font-size: 14px;\">{{site_title}}</strong></p>\n</div>\n</td>\n</tr>\n</tbody>\n</table><br>\n</div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div>\n<br>\n<br>\n<br>","New Trading Signal Send to You. Please check.","https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=SoftwareZON&SMSText={{message}}&GSM={{number}}&type=longSMS","520114925:AAGIwms5iE0c4rt2ZmEGUeHCXbulce4P_L8","http://t.me/cryptotsignalTokenBot","JEo5CHsHbjMeNpETZSR7eLFw8Tfmajre","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy. Lorem Ipsum is simply dummy text of the printing typesetting industry Lorem Ipsum is simply.","1503148676.jpg","2017 � All Copyright Reserved By <a href=\"http://softwarezon.com\" title=\"SoftwareZon\" target=\"_blank\">SOFTWAREZON</a>.","","2018-07-10 16:30:17");





CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categories VALUES("1","Cryipto","cryipto","1","2017-11-19 16:51:20","2017-12-09 09:14:57");
INSERT INTO categories VALUES("2","Forex","forex","1","2017-11-19 16:55:34","2017-11-28 03:18:25");
INSERT INTO categories VALUES("3","Bitcoin","bitcoin","1","2017-11-19 16:56:34","2017-11-28 03:18:39");
INSERT INTO categories VALUES("4","International","international","1","2017-11-19 16:57:01","2017-11-28 04:35:27");
INSERT INTO categories VALUES("5","Market","market","1","2017-11-28 04:35:46","2017-11-28 04:35:46");
INSERT INTO categories VALUES("6","Currency Exchange","currency-exchange","1","2017-11-28 04:36:11","2017-11-28 04:36:11");
INSERT INTO categories VALUES("7","Trading","trading","1","2017-11-28 04:36:29","2017-11-28 04:36:29");
INSERT INTO categories VALUES("8","Freelance","freelance","1","2017-11-28 04:37:29","2017-11-28 04:37:29");
INSERT INTO categories VALUES("9","Local Market","local-market","1","2017-11-28 04:38:22","2017-11-28 04:38:22");
INSERT INTO categories VALUES("10","Analysis","analysis","1","2017-11-28 04:38:42","2017-11-28 04:38:42");
INSERT INTO categories VALUES("11","LightCoin","lightcoin","1","2017-12-27 19:42:56","2018-01-24 22:14:45");





CREATE TABLE IF NOT EXISTS `database_backups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE IF NOT EXISTS `email_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_status` tinyint(4) NOT NULL DEFAULT '0',
  `email_body` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO email_settings VALUES("1","smtp","hellomrhasan@gmail.com","Hasan Rahman","mail.cliquepede.com.br","587","comercial@cliquepede.com.br","anakarina@2018","tls","1","<p>&nbsp;</p>\n<div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\">\n<table style=\"border-collapse: collapse; table-layout: fixed; color: #b8b8b8; font-family: Ubuntu,sans-serif;\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"preheader__snippet\" style=\"padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\n<td class=\"preheader__webversion\" style=\"text-align: right; padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<table id=\"emb-email-header-container\" class=\"header\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto;\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"padding: 0; width: 600px;\">\n<div class=\"header__logo emb-logo-margin-box\" style=\"font-size: 26px; line-height: 32px; color: #c3ced9; font-family: Roboto,Tahoma,sans-serif; margin: 6px 20px 20px 20px;\">\n<div id=\"emb-email-header\" class=\"logo-left\" style=\"font-size: 0px !important; line-height: 0 !important;\" align=\"left\"><img style=\"height: auto; width: 100%; border: 0; max-width: 312px;\" src=\"https://i.imgur.com/GYloTas.png\" alt=\"\" width=\"312\" height=\"44\"></div>\n</div>\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"column\" style=\"padding: 0px; text-align: left; vertical-align: top; color: rgb(96, 102, 109); line-height: 21px; font-family: sans-serif; width: 600px;\">\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px; margin-top: 24px;\">\n<div style=\"line-height: 10px; font-size: 1px;\">&nbsp;</div>\n</div>\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px;\">\n<h2>Hi {{name}},</h2>\n<p><strong>{{message}}</strong></p>\n</div>\n<div style=\"font-size: 14px; margin-left: 20px; margin-right: 20px;\"><br></div>\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">\n<p class=\"size-14\" style=\"margin-top: 0px; margin-bottom: 0px; line-height: 21px;\"><font size=\"3\"><b>Thanks,</b></font><br> <strong style=\"font-size: 14px;\">{{site_title}}</strong></p>\n</div>\n</td>\n</tr>\n</tbody>\n</table><br>\n</div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div><div class=\"wrapper\" style=\"background-color: rgb(242, 242, 242); height: auto; min-height: 100%;\"><br></div>\n<br>\n<br>\n<br>","","2018-10-17 15:52:43");





CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instragram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO members VALUES("1","Habiba Himu","You can relay on our amazing features list and also our customer services will be great experience.","member_1512838077.jpg","CEO","#","#","#","#","2017-12-09 16:40:54","2017-12-27 19:21:15");
INSERT INTO members VALUES("3","Pump_Dizzel","You can relay on our amazing features list and also our customer services will be great experience.","member_1512978136.jpg","CEO, Softhouse","#","#","#","#","2017-12-11 13:42:18","2017-12-27 19:21:24");
INSERT INTO members VALUES("4","Harun Rahman","You can relay on our amazing features list and also our customer services will be great experience.","member_1512978158.jpg","CEO, Softhouse","#","#","#","#","2017-12-11 13:42:38","2017-12-27 19:21:31");
INSERT INTO members VALUES("5","RFL Boss","You can relay on our amazing features list and also our customer services will be great experience.","member_1512978178.jpg","CEO, Softhouse","#","#","#","#","2017-12-11 13:42:58","2017-12-27 19:21:38");





CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO menus VALUES("1","Menu 1","menu-1","<h2>What is Lorem Ipsum?<br></h2><div>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div>","2017-01-11 14:28:02","2017-11-27 07:56:05");
INSERT INTO menus VALUES("2","Menu 2","menu-2","<h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<div><br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></div><div><h2 style=\"color: rgb(51, 51, 51);\">What is Lorem Ipsum?</h2>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions<br></div>","2017-11-19 05:19:01","2017-11-27 08:00:33");





CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES("1","2014_10_12_000000_create_users_table","1");
INSERT INTO migrations VALUES("2","2014_10_12_100000_create_password_resets_table","1");





CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO partners VALUES("1","RFL","partner_1512846249.png","2017-11-18 19:04:26","2017-12-09 19:04:09");
INSERT INTO partners VALUES("2","RFL","partner_1512846257.png","2017-11-18 19:04:37","2017-12-09 19:04:17");
INSERT INTO partners VALUES("3","RFL","partner_1512846264.png","2017-11-18 19:04:47","2017-12-09 19:04:24");
INSERT INTO partners VALUES("4","RFL","partner_1512846272.png","2017-11-18 19:04:54","2017-12-09 19:04:32");
INSERT INTO partners VALUES("5","RFL","partner_1512846214.png","2017-11-18 19:05:06","2017-12-09 19:03:35");





CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE IF NOT EXISTS `payment_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_id` tinyint(4) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_acc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO payment_logs VALUES("1","23","4","2oTu6HhKOo5sFg5o","200","200","","","1","2018-07-10 15:53:17","2018-07-10 15:53:58");





CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `val1` text COLLATE utf8_unicode_ci NOT NULL,
  `val2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `val3` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO payment_methods VALUES("1","PAYPAL","paypal_1511850437h3.png","1","admin@softwarezon.com","","","1","","2017-12-25 01:42:56");
INSERT INTO payment_methods VALUES("2","PERFECT MONEY","perfect_1511850445h4.png","1","U16741300","2B45ZL02BMveaziGzVBtiaebk","","1","","2018-01-27 00:42:49");
INSERT INTO payment_methods VALUES("3","BITCOIN - (BLOCKCHAIN)","btc_1516988916h5.png","1","382688a1-f034-45ab-9972-808f70b83ba8","xpub6DAmnCaQKkCAoHPvfCUsqNWLHSwHqRBnYYKD3YbwAk2jzDSfrEzhBCkGehUq7oqkwq1XZwcV74qJMrpaD95u3AgPzPjyoUyJnU6QwZtikhv","","1","","2018-01-26 23:48:36");
INSERT INTO payment_methods VALUES("4","STRIPE - (CARD)","stripe_1511858583h6.png","1","sk_test_aat3tzBCCXXBkS4sxY3M8A1B","pk_test_AU3G7doZ1sbdpJLj0NaozPBu","","1","","2018-01-10 03:23:56");
INSERT INTO payment_methods VALUES("5","SKRILL","skrill_1516266573h7.png","1","merchant-email@example.com","AU3G7doZ1sbdpJLj0NaozPBu","","1","2018-01-05 00:00:00","2018-01-18 15:09:33");
INSERT INTO payment_methods VALUES("6","CoinPayment","coin_1516266580h7.png","1","669e817074849967cad1ba0313ea8b3b","ba0313ea8b3b","http://localhost/softwarezon_signal_mod/coinpayment-ipn","1","","2018-01-18 15:09:40");





CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_type` tinyint(1) NOT NULL DEFAULT '0',
  `price_type` tinyint(1) DEFAULT '0',
  `telegram_status` tinyint(1) NOT NULL DEFAULT '0',
  `duration` int(11) DEFAULT NULL,
  `sms_status` tinyint(1) NOT NULL DEFAULT '0',
  `coaching_status` tinyint(1) NOT NULL DEFAULT '0',
  `call_status` tinyint(1) NOT NULL DEFAULT '0',
  `email_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `support` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO plans VALUES("1","Basic","0","ion-ios-basketball-outline","0","0","0","7","0","0","0","0","1","None","2017-11-23 13:10:18","2017-12-26 03:13:38");
INSERT INTO plans VALUES("2","Silver","49","ion-ios-baseball-outline","0","1","1","45","1","0","1","1","1","24X7","2017-11-23 13:20:49","2018-01-25 01:47:34");
INSERT INTO plans VALUES("3","Bronze","99","ion-ios-flower-outline","0","1","1","60","0","0","0","0","1","Premium","2017-11-23 13:24:43","2017-12-09 17:46:57");
INSERT INTO plans VALUES("4","Economy","30","ion-ios-paw","0","1","1","60","1","1","1","1","1","Premium","2017-11-23 13:25:26","2017-12-18 19:07:07");
INSERT INTO plans VALUES("5","Gold","129","ion-paper-airplane","1","1","1","80","1","0","1","1","1","Pemium","2017-12-11 13:44:16","2017-12-26 03:26:48");
INSERT INTO plans VALUES("6","Diamond","200","ion-radio-waves","1","1","1","90","1","1","1","1","1","Pemium","2017-12-11 13:45:41","2017-12-13 16:08:13");





CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `fetured` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO posts VALUES("1","1","1","But I must explain to mistaken","but-i-must-explain-to-mistaken","kd8UqzYTO1Me8AaZZdAU.jpg","a,asd,asdasd,asdas,sad,asdfa,sada","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","26","2017-11-19 17:36:45","2018-01-26 16:31:05");
INSERT INTO posts VALUES("2","1","1","\'Doing daily chores can help older women live longer\'","doing-daily-chores-can-help-older-women-live-longer","YGDdu0zhCnEHoJRSBzUB.jpg","as,adsasd,sadsad,asdsad","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","103","2017-11-19 17:38:08","2017-12-30 02:00:56");
INSERT INTO posts VALUES("3","1","1","What is Lorem Ipsum?","what-is-lorem-ipsum","AxkYblZe86xPIAkf43uS.jpg","a,asd,asdasd,asdas,sad,asdfa,sada","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","0","1","4","2017-11-19 17:39:08","2017-12-09 09:25:19");
INSERT INTO posts VALUES("4","1","1","Where does it come from?","where-does-it-come-from","oRZu9uQR1ayT9PQpcQTb.jpg","a,asd,asdasd,asdas,sad,asdfa,sada","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","23","2017-11-19 17:40:01","2017-12-30 02:34:47");
INSERT INTO posts VALUES("5","1","1","Bitcoin Price Tops $9,000","bitcoin-price-tops-9000","fUwGNqrLWmy5kCR4tmPk.png","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>","1","1","8","2017-11-19 17:45:16","2017-12-30 02:00:39");
INSERT INTO posts VALUES("6","1","1","As Price Eyes $10,000, Bitcoin","as-price-eyes-10000-bitcoin","XJZ9mTzNjWhX7OQjQueL.jpg","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><div><br></div>","1","1","42","2017-11-19 17:46:19","2017-12-30 02:00:31");
INSERT INTO posts VALUES("7","1","3","1914 translation by H. Rackham","1914-translation-by-h-rackham","awiiUaeknABaPKZD51wT.jpg","sef,asd,aedwqr,wqerwqr,qwrdwqer","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><div><br></div>","1","0","4","2017-11-19 17:47:13","2017-12-30 02:00:24");
INSERT INTO posts VALUES("8","1","1","Bitcoin, Ether Prices Surge to Fresh All-Time Highs","bitcoin-ether-prices-surge-to-fresh-all-time-highs","VeSm5vEJ7AIBWe1rNYpt.jpg","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><div><br></div>","1","1","19","2017-11-19 17:48:19","2018-01-28 16:32:59");
INSERT INTO posts VALUES("9","1","3","$10,000 Today? Bitcoin Price Looks Primed to Break Barrier","10000-today-bitcoin-price-looks-primed-to-break-barrier","oPGyi2FhuhDlGfeRLCWS.jpg","softwarezon,softwarezon.com.","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","1","20","2017-11-27 08:03:19","2017-12-25 04:28:14");
INSERT INTO posts VALUES("10","1","3","$300 Billion: Bitcoin Price Boosts Crypto","300-billion-bitcoin-price-boosts-crypto","OqyocokyhwqhNzhE6MvX.jpg","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","1","37","2017-11-27 08:04:14","2018-01-26 16:24:00");
INSERT INTO posts VALUES("11","1","4","cumque nihil impedit quo minus id quod maxime","cumque-nihil-impedit-quo-minus-id-quod-maxime","sumhFnGGvS5WKQzo3T3v.jpg","ass,as,d,er,ert","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","0","4","2017-11-27 08:05:40","2018-01-28 03:56:53");
INSERT INTO posts VALUES("12","1","3","Bitcoin Price Tops $10,000 on Korean Exchanges","bitcoin-price-tops-10000-on-korean-exchanges","jK6aw4awklQnqvlOvAMp.png","softwarezon,softwarezon.com","<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><div><br></div>","1","1","17","2017-11-27 08:06:23","2018-07-11 09:31:37");
INSERT INTO posts VALUES("13","2","3","Sample Post With Featured Image","sample-post-with-featured-image","VrWkLuFW9Yep8T4R5SCK.jpg","hasan,softwarezon","What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>","1","1","7","2017-12-09 08:44:51","2018-01-24 21:45:50");





CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `speciality_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality_description` text COLLATE utf8mb4_unicode_ci,
  `currency_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_description` text COLLATE utf8mb4_unicode_ci,
  `currency_live` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_cal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trading_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trading_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trading_script` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_description` text COLLATE utf8mb4_unicode_ci,
  `about_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertise_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertise_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_title` varchar(121) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_description` text COLLATE utf8mb4_unicode_ci,
  `testimonial_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_description` text COLLATE utf8mb4_unicode_ci,
  `blog_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sections VALUES("1","Why We are Special","You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time","CRYPTO CURRENCY","You can relay on our amazing features list and also our customer services will be greatexperience for you without doubt and in no-time and with great quality for design.","<script type=\"text/javascript\">\n                            baseUrl = \"https://widgets.cryptocompare.com/\";\n                            var scripts = document.getElementsByTagName(\"script\");\n                            var embedder = scripts[ scripts.length - 1 ];\n                            (function (){\n                                var appName = encodeURIComponent(window.location.hostname);\n                                if(appName==\"\"){appName=\"local\";}\n                                var s = document.createElement(\"script\");\n                                s.type = \"text/javascript\";\n                                s.async = true;\n                                var theUrl = baseUrl+\'serve/v1/coin/multi?fsyms=BTC,ETH,LTC,DASH&tsyms=USD,EUR,CNY,GBP\';\n                                s.src = theUrl + ( theUrl.indexOf(\"?\") >= 0 ? \"&\" : \"?\") + \"app=\" + appName;\n                                embedder.parentNode.appendChild(s);\n                            })();\n                        </script>","<script type=\"text/javascript\">\n                            crypt_calc_border_width = 0;\n                            crypt_calc_font_family = \"Tahoma\";\n                        </script>\n                        <script type=\"text/javascript\" src=\"http://www.cryptonator.com/ui/js/widget/calc_widget.js\"></script>","Live Trading Status","Maecenas ut lectus a ipsum gravida ornare. Cras scelerisque in mauris id pretium. Praesent convallis neque quis erat lobortis gravida id et dolor.","<!-- TradingView Widget BEGIN -->\n                    <script type=\"text/javascript\" src=\"https://s3.tradingview.com/tv.js\"></script>\n                    <script type=\"text/javascript\">\n                        new TradingView.widget({\n                            \"width\": 980,\n                            \"height\": 610,\n                            \"symbol\": \"NASDAQ:AAPL\",\n                            \"interval\": \"D\",\n                            \"timezone\": \"Etc/UTC\",\n                            \"theme\": \"Light\",\n                            \"style\": \"1\",\n                            \"locale\": \"en\",\n                            \"toolbar_bg\": \"#f1f3f6\",\n                            \"enable_publishing\": false,\n                            \"allow_symbol_change\": true,\n                            \"hideideas\": true\n                        });\n                    </script>\n                    <!-- TradingView Widget END -->","Why we extra Ordinary","You can relay on our amazing features list and also our customer services will be greatexperience for you without doubt and in no-time and with great quality for design.You can relay on our amazing features list and also our customer services will be greatexperience for you without doubt and in no-time and with great quality for design.relay on our amazing features list and also our customer services will be greatexperience for you without doubt and in no-time and with great quality for design. relay on our amazing features list and also our customer services will be greatexperience for you without doubt and in no-time and with great quality for design.doubt and in no-time and with great quality for design. relay on our amazing features list and also our customer services will be greatexperience for you without doubt and in no-time and with great quality for design.","about_image.png","counter_image.jpg","100% Trusted Crypto Trading Sending Platform","We have most experienced Crypto Currency Expert. They always analysis crypto trading signal and help you to make your profit.","Experienced & Professional Team","You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time","Subscribe To Our Newsletter","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s.","Simple Pricing Plan","We offer 100% satisafaction and Money back Guarantee","Check what our Customers are Saying","You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time","Awesome with Extra Ordinary Flexibility","You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time","","2018-07-11 09:31:21");





CREATE TABLE IF NOT EXISTS `signal_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `signal_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO signal_comments VALUES("1","20","14","Is do currently. Please Confirm Me.","2018-01-21 05:10:37","2018-01-21 05:10:37");
INSERT INTO signal_comments VALUES("2","20","14","Lorem Ipsum is simply dummy text of the printing and typesetting industry.","2018-01-21 05:13:18","2018-01-21 05:13:18");
INSERT INTO signal_comments VALUES("3","0","25","Nothing To say. Awesome.","2018-01-21 05:58:34","2018-01-21 05:58:34");
INSERT INTO signal_comments VALUES("4","0","14","That is Awesome.","2018-01-21 05:59:24","2018-01-21 05:59:24");
INSERT INTO signal_comments VALUES("5","20","28","Awesome This Signal.","2018-01-21 15:33:14","2018-01-21 15:33:14");
INSERT INTO signal_comments VALUES("6","20","41","This is can help us.","2018-07-10 15:37:26","2018-07-10 15:37:26");





CREATE TABLE IF NOT EXISTS `signal_ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `signal_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO signal_ratings VALUES("1","20","14","5","Awesome Signal. I like It.","2018-01-21 05:24:44","2018-01-21 05:24:44");
INSERT INTO signal_ratings VALUES("2","20","25","4","Not So Good Signal.","2018-01-21 05:46:15","2018-01-21 05:46:15");
INSERT INTO signal_ratings VALUES("3","0","25","4","Awesone Signal","2018-01-21 05:57:40","2018-01-21 05:57:40");
INSERT INTO signal_ratings VALUES("4","0","14","5","Nice Signal., Like It.","2018-01-21 06:02:37","2018-01-21 06:02:37");
INSERT INTO signal_ratings VALUES("5","20","28","5","Awesome","2018-01-21 07:27:57","2018-01-21 07:27:57");
INSERT INTO signal_ratings VALUES("6","20","18","1","Not Good.","2018-01-21 15:34:20","2018-01-21 15:34:20");
INSERT INTO signal_ratings VALUES("7","0","34","5","Awesome","2018-01-22 02:31:08","2018-01-22 02:31:08");
INSERT INTO signal_ratings VALUES("8","0","36","5","Awesome","2018-01-25 02:52:40","2018-01-25 02:52:40");
INSERT INTO signal_ratings VALUES("9","20","41","3","May be. it work","2018-07-10 15:37:47","2018-07-10 15:37:47");





CREATE TABLE IF NOT EXISTS `signals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `telegram` blob NOT NULL,
  `publish_status` tinyint(1) NOT NULL DEFAULT '0',
  `publish_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO signals VALUES("5","Anim pariatur cliche reprehenderit","1;2;3;4","Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.","","0","","1","2017-12-09 13:49:09","2017-12-09 13:49:09");
INSERT INTO signals VALUES("6","Anim pariatur cliche reprehenderit","1;2;3;4","hhhhhhhhhhhhhhhhhhh","","0","","1","2017-12-11 02:54:15","2017-12-11 02:54:15");
INSERT INTO signals VALUES("7","Wonder Full India Activition","1;2","zdsadasdasd","","0","","1","2017-12-13 14:18:42","2017-12-13 14:23:43");
INSERT INTO signals VALUES("8","Anim pariatur cliche reprehenderit","1;2;3;4;5;6","<div>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&nbsp; &nbsp;</div><div><br></div><div>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&nbsp; &nbsp;</div><div><br></div><div>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.&nbsp; &nbsp;</div><div><br></div><div>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.&nbsp; &nbsp;</div><div><br></div><div>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.&nbsp; &nbsp;</div><div><br></div><div>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</div>","","0","","1","2017-12-15 21:56:58","2017-12-15 21:56:58");
INSERT INTO signals VALUES("9","Anim pariatur cliche reprehenderit","1;2;3;4;5;6","<div>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&nbsp; &nbsp;</div><div><br></div><div>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&nbsp; &nbsp;</div><div><br></div><div>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.&nbsp; &nbsp;</div><div><br></div><div>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.&nbsp; &nbsp;</div><div><br></div><div>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.&nbsp; &nbsp;</div><div><br></div><div>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</div>","","0","","1","2017-12-15 21:58:01","2017-12-15 21:58:01");
INSERT INTO signals VALUES("10","Anim pariatur cliche reprehenderit","1;2;3;4;5;6","test","","0","","1","2017-12-18 16:16:37","2017-12-18 16:16:37");
INSERT INTO signals VALUES("11","Anim pariatur cliche reprehenderit","1;2;3;4;5;6","sdsadadasdada","","0","","1","2017-12-18 16:34:34","2017-12-18 16:34:34");
INSERT INTO signals VALUES("12","Anim pariatur cliche reprehenderit","2;3;4;5;6","https://www.tradingview.com/chart/GLDBTC/hJ1t7Ukr-GoldCoin-GLD-Buy-Signal-450-Earnings-Potential/<br>","","0","","1","2017-12-18 22:52:03","2017-12-18 22:52:03");
INSERT INTO signals VALUES("13","Wonder Full India Activition","2;3;4;5;6","https://www.tradingview.com/chart/GLDBTC/hJ1t7Ukr-GoldCoin-GLD-Buy-Signal-450-Earnings-Potential/<br>","","0","","1","2017-12-18 22:55:20","2017-12-18 22:55:20");
INSERT INTO signals VALUES("14","Anim pariatur cliche reprehenderit","2;3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/","","0","","1","2017-12-19 01:09:51","2017-12-19 01:09:51");
INSERT INTO signals VALUES("15","SoftwareZon eCommerce","1;2;3;4;5;6","asdasdasd","","0","","1","2017-12-31 21:27:33","2017-12-31 21:27:33");
INSERT INTO signals VALUES("16","SoftwareZon eCommerce","1;2;3;4;5;6","asdasdasd","","0","","1","2017-12-31 21:33:40","2017-12-31 21:33:40");
INSERT INTO signals VALUES("17","SoftwareZon eCommerce","1;2;3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/<br>","","0","","1","2017-12-31 21:53:36","2017-12-31 21:53:36");
INSERT INTO signals VALUES("18","SoftwareZon eCommerce","1;2;3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/<br>","","0","","1","2017-12-31 21:57:19","2017-12-31 21:57:19");
INSERT INTO signals VALUES("19","SoftwareZon eCommerce","1;2;3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/<br>","","0","","1","2017-12-31 21:58:24","2017-12-31 21:58:24");
INSERT INTO signals VALUES("20","SoftwareZon eCommerce","3;4;6","asdsadas","","0","","1","2017-12-31 21:59:09","2017-12-31 21:59:09");
INSERT INTO signals VALUES("21","SoftwareZon eCommerce","3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/","","0","","1","2017-12-31 22:04:35","2017-12-31 22:04:35");
INSERT INTO signals VALUES("22","SoftwareZon eCommerce","3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/","","0","","1","2017-12-31 22:07:38","2017-12-31 22:07:38");
INSERT INTO signals VALUES("23","SoftwareZon eCommerce","3;4;5;6","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/","","0","","1","2017-12-31 22:12:55","2017-12-31 22:12:55");
INSERT INTO signals VALUES("24","Crypto Trading Signal","1;2;3;4;5;6","<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>","","1","2018-01-21 02:16:26","1","2018-01-21 02:16:37","2018-01-22 02:52:19");
INSERT INTO signals VALUES("25","Crypto Trading Signal","1;2;3;4;5;6","<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>","","1","2018-01-21 03:13:43","1","2018-01-21 03:13:58","2018-01-22 02:52:25");
INSERT INTO signals VALUES("26","Crypto Trading Signal","1;2;3;4;5;6","<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>","","0","2018-01-21 07:11:36","1","2018-01-21 07:11:45","2018-01-21 07:11:45");
INSERT INTO signals VALUES("27","Crypto Trading Signal","1;2;3;4;5;6","<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>","","0","2018-01-21 07:11:36","1","2018-01-21 07:14:09","2018-01-21 07:14:09");
INSERT INTO signals VALUES("28","SoftwareZon New CMS","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/</p>","","0","2018-01-21 07:17:19","1","2018-01-21 07:17:27","2018-01-21 07:17:27");
INSERT INTO signals VALUES("29","Crypto Trading Signal","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/</p>","https://www.tradingview.com/chart/DCRUSD/JgbsHhJ8-Decred-DCR-Adding-to-the-Portfolio/","0","","1","2018-01-22 02:00:07","2018-01-22 02:00:07");
INSERT INTO signals VALUES("30","Litecoin (LTC) vs Bitcoin: Tracking Litecoin\'s Movement + News","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/</p>","https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/","0","2018-01-22 02:30:00","1","2018-01-22 02:09:45","2018-01-22 02:19:53");
INSERT INTO signals VALUES("31","Litecoin (LTC) vs Bitcoin: Tracking Litecoin\'s Movement + News","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/</p>","https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/","0","2018-01-22 02:09:00","1","2018-01-22 02:19:21","2018-01-22 02:32:15");
INSERT INTO signals VALUES("32","Litecoin (LTC) vs Bitcoin: Tracking Litecoin\'s Movement + News","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/</p>","https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/","0","2018-01-22 02:30:00","1","2018-01-22 02:19:46","2018-01-22 02:31:44");
INSERT INTO signals VALUES("33","Litecoin (LTC) vs Bitcoin: Tracking Litecoin\'s Movement + News52","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/</p>","https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/","0","2018-01-22 02:30:00","1","2018-01-22 02:19:53","2018-01-22 02:22:23");
INSERT INTO signals VALUES("34","Litecoin (LTC) vs Bitcoin: Tracking Litecoin\'s Movement + News52","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/</p>","https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/","0","2018-01-22 02:30:00","1","2018-01-22 02:22:23","2018-01-22 02:22:31");
INSERT INTO signals VALUES("35","Bitcoin USD Buy-in/Re-buy Levels (End of Correctoin + Altcoins)","3;4;5;6","<h1>Bitcoin USD Buy-in/Re-buy Levels (End of Correctoin + Altcoins)</h1>\n\n<p><a href=\"https://www.tradingview.com/symbols/BTCUSD/\">Bitcoin / Dollar</a>&nbsp;(<a href=\"https://www.tradingview.com/symbols/BTCUSD/\">BITFINEX:BTCUSD</a>)&nbsp;11127.0&nbsp;-1604.0&nbsp;-12.60%</p>\n\n<p>https://www.tradingview.com/chart/BTCUSD/KRIcrA27-Bitcoin-USD-Buy-in-Re-buy-Levels-End-of-Correctoin-Altcoins/</p>","https://www.tradingview.com/chart/BTCUSD/KRIcrA27-Bitcoin-USD-Buy-in-Re-buy-Levels-End-of-Correctoin-Altcoins/","0","2018-01-22 09:36:26","1","2018-01-22 02:37:10","2018-01-22 02:38:13");
INSERT INTO signals VALUES("36","Crypto Trading Signal","1;2;3;4;5;6","<h1>Master Analysis! Ripple Headed 2 Morgue! Punishing Haters! (XRP)</h1>\n\n<p><a href=\"https://www.tradingview.com/symbols/XRPUSD/\">Ripple / Dollar</a>&nbsp;(<a href=\"https://www.tradingview.com/symbols/XRPUSD/\">BITSTAMP:XRPUSD</a>)&nbsp;1.36435&nbsp;-0.20741&nbsp;-13.20%</p>\n\n<p>&nbsp;</p>\n\n<p>https://www.tradingview.com/chart/XRPUSD/X0jDpIZo-Master-Analysis-Ripple-Headed-2-Morgue-Punishing-Haters-XRP/</p>","What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","0","2018-01-22 04:31:19","1","2018-01-22 04:31:45","2018-01-22 04:58:04");
INSERT INTO signals VALUES("37","Symmetrical Triangle ON WATCH","4;5;6","<h1>Symmetrical Triangle ON WATCH</h1>\n\n<p>https://www.tradingview.com/chart/DDD/gDA7y1r2-Symmetrical-Triangle-ON-WATCH/</p>","Symmetrical Triangle ON WATCH \nhttps://www.tradingview.com/chart/DDD/gDA7y1r2-Symmetrical-Triangle-ON-WATCH/","0","2018-01-27 04:11:52","0","2018-01-27 04:14:00","2018-01-27 04:14:00");
INSERT INTO signals VALUES("38","Symmetrical Triangle ON WATCH","4;5;6","<h1>Symmetrical Triangle ON WATCH</h1>\n\n<p>https://www.tradingview.com/chart/DDD/gDA7y1r2-Symmetrical-Triangle-ON-WATCH/</p>","Symmetrical Triangle ON WATCH \nhttps://www.tradingview.com/chart/DDD/gDA7y1r2-Symmetrical-Triangle-ON-WATCH/","0","2018-01-27 04:11:52","1","2018-01-27 04:15:33","2018-01-27 04:15:48");
INSERT INTO signals VALUES("39","Undervalued Buying Opportunity","1;2;3;4;5;6","<h1>Undervalued Buying Opportunity</h1>\n\n<p>https://www.tradingview.com/chart/IAG/QtNehftd-Undervalued-Buying-Opportunity/</p>","Undervalued Buying Opportunity\nhttps://www.tradingview.com/chart/IAG/QtNehftd-Undervalued-Buying-Opportunity/","0","2018-01-27 04:18:31","1","2018-01-27 04:18:48","2018-01-27 04:19:06");
INSERT INTO signals VALUES("40","Undervalued Buying Opportunity","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/IAG/QtNehftd-Undervalued-Buying-Opportunity/</p>","https://www.tradingview.com/chart/IAG/QtNehftd-Undervalued-Buying-Opportunity/","0","2018-01-27 04:25:58","1","2018-01-27 04:26:11","2018-01-27 04:26:28");
INSERT INTO signals VALUES("41","LONG Ascending triangle forming","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-01-27 04:30:34","1","2018-01-27 04:30:47","2018-01-27 04:31:05");
INSERT INTO signals VALUES("42","Ascending triangle forming","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-07-10 15:46:16","1","2018-07-10 15:47:07","2018-07-10 15:47:21");
INSERT INTO signals VALUES("43","Ascending triangle forming","1;4;5;6","<p>https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-07-10 15:56:24","1","2018-07-10 15:57:01","2018-07-10 15:57:17");
INSERT INTO signals VALUES("44","myMart - Premium Mart shop or Retail shop Management PHP Script","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-07-10 15:57:17","1","2018-07-10 15:58:26","2018-07-10 15:58:46");
INSERT INTO signals VALUES("45","Ascending triangle forming","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-07-10 16:21:54","1","2018-07-10 16:22:03","2018-07-10 16:22:21");
INSERT INTO signals VALUES("46","myMart - Premium Mart shop or Retail shop Management PHP Script","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-07-10 16:30:31","1","2018-07-10 16:30:40","2018-07-10 16:31:08");
INSERT INTO signals VALUES("47","myMart - Premium Mart shop or Retail shop Management PHP Script","1;2;3;4;5;6","<p><a href=\"https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/\" target=\"_blank\">https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/</a></p>","https://www.tradingview.com/chart/GURE/MgxkcZGN-Ascending-triangle-forming/","0","2018-07-10 16:31:09","1","2018-07-10 16:58:06","2018-07-10 16:58:30");
INSERT INTO signals VALUES("48","Litecoin (LTC) vs Bitcoin: Tracking Litecoin\'s Movement + Newsa","1;2;3;4;5;6","<p>https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/</p>","https://www.tradingview.com/chart/LTCBTC/NdNNWehz-Litecoin-LTC-vs-Bitcoin-Tracking-Litecoin-s-Movement-News/","0","2018-07-11 10:12:47","1","2018-07-11 23:13:29","2018-07-11 23:13:52");





CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sliders VALUES("26","slider_1516750515.jpg","Bit e-Commerce","Premium Crypto Signal","Lorem Ipsum is simply dummy text of the printing and typesetting industry.","2018-01-24 05:35:16","2018-01-24 05:35:16");
INSERT INTO sliders VALUES("27","slider_1517104781.jpg","Trading Signal","Crypto Trading Signal here","Lorem Ipsum is simply dummy text of the printing and typesetting industry.","2018-01-28 07:59:41","2018-01-28 07:59:41");





CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO socials VALUES("3","Facebook","<i class=\"fa fa-facebook\" aria-hidden=\"true\"></i>","https://www.facebook.com/softwarezon","2017-08-19 18:25:30","2017-12-01 15:44:54");
INSERT INTO socials VALUES("5","twitter","<i class=\"fa fa-twitter\" aria-hidden=\"true\"></i>","https://softwarezon.com/","2017-08-19 18:29:52","2017-12-01 15:45:17");
INSERT INTO socials VALUES("6","linkedin","<i class=\"fa fa-linkedin\" aria-hidden=\"true\"></i>","https://softwarezon.com/","2017-08-19 18:30:23","2017-12-01 15:45:23");
INSERT INTO socials VALUES("7","Google plus","<i class=\"fa fa-google-plus\" aria-hidden=\"true\"></i>","https://softwarezon.com/","2017-08-19 18:32:35","2017-12-01 15:45:29");
INSERT INTO socials VALUES("8","Instragram","<i class=\"fa fa-instagram\" aria-hidden=\"true\"></i>","#","2017-12-09 04:38:45","2017-12-09 04:39:06");





CREATE TABLE IF NOT EXISTS `specialities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO specialities VALUES("2","Analytics","<i class=\"fa fa-line-chart speciality-fa\"></i>","Duis autem vel eum iriure dolor in in vulputate velit esse molestie consequat.","2017-11-24 00:40:49","2018-01-28 04:30:57");
INSERT INTO specialities VALUES("3","Comfort","<i class=\"fa fa-indent\"></i>","Duis autem vel eum iriure dolor in in vulputate velit esse molestie consequat.","2017-11-24 00:42:19","2018-01-28 04:31:14");
INSERT INTO specialities VALUES("4","Professional","<i class=\"fa fa-sliders\" aria-hidden=\"true\"></i>","Pixel prefect design is our exprtize. We are looking for the wow!","2017-12-11 13:36:34","2018-01-28 04:31:25");
INSERT INTO specialities VALUES("5","Experience","<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>","Our clients is the target and the inspiration of our work! We care .","2017-12-11 13:37:30","2018-01-28 04:31:37");
INSERT INTO specialities VALUES("6","Building","<i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i>","Our clients is the target and the inspiration of our work! We care","2017-12-11 13:38:12","2017-12-25 04:03:03");
INSERT INTO specialities VALUES("7","Awesome","<i class=\"fa fa-cogs\" aria-hidden=\"true\"></i>","<span style=\"color: rgb(141, 151, 173); font-family: Montserrat, sans-serif; font-size: 16px;\">Our clients is the target and the inspiration of our work! We care&nbsp;</span><br>","2017-12-11 13:39:14","2017-12-25 04:02:39");





CREATE TABLE IF NOT EXISTS `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subscribes VALUES("1","admin@gmail.com","2017-11-24 02:32:56","2017-11-24 02:32:56");
INSERT INTO subscribes VALUES("2","admin@admin.com","2017-11-24 02:34:12","2017-11-24 02:34:12");
INSERT INTO subscribes VALUES("3","user@gmail.com","2018-01-28 03:30:55","2018-01-28 03:30:55");





CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` blob NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO testimonials VALUES("3","Alex","testimonial_1517079811.jpg","Web Developer","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.","0","2017-11-27 07:42:10","2018-01-28 01:03:31");
INSERT INTO testimonials VALUES("4","Paul","testimonial_1512798645.png","Cummins","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.","0","2017-11-27 07:43:13","2018-01-28 01:02:48");
INSERT INTO testimonials VALUES("5","Masud Rana","testimonial_1517079621.jpg","CEO, MoniasoftHouse","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.","0","2018-01-28 01:00:21","2018-01-28 01:00:21");





CREATE TABLE IF NOT EXISTS `transaction_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO transaction_logs VALUES("52","JU8C85SLC4ZB","20","1","10","10","For Signal Provide","2018-01-27 04:26:11","2018-01-27 04:26:11");
INSERT INTO transaction_logs VALUES("53","AYGKLV7OUDPZ","20","1","5","15","For Signal Provide","2018-01-27 04:30:47","2018-01-27 04:30:47");





CREATE TABLE IF NOT EXISTS `user_signals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `signal_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_expire` datetime DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT '0',
  `phone_expire` datetime DEFAULT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_status` tinyint(1) DEFAULT '0',
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `plan_id` int(11) NOT NULL,
  `plan_status` tinyint(1) NOT NULL DEFAULT '0',
  `coupon_status` tinyint(1) DEFAULT '0',
  `signal_status` tinyint(1) NOT NULL DEFAULT '0',
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `expire_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("7","Staff Rahman","","staff@gmail.com","","01716199668088","","","VTTXIR","","0","","","0","0","5","0","0","0","0","1","0","$2y$10$7J5Z2bj9Gyd47/S8YLAA3unTrM0TrGJNT79wwlN1bLFCG7xbT1fh6","XOxpMXvQ34f6lE3aGYQF64h3tG5qnCb36FeRc85564V9CNfY7h0mN5BVHG2k","2017-12-10 21:14:56","2017-12-10 21:14:56");
INSERT INTO users VALUES("20","Staff Rahman","1516986241.png","user@gmail.com","880","1974447300","3wtzC6vlGmjYh9hM","468822649","WVRFTB","2018-01-26 17:43:36","1","2018-01-26 17:45:34","84797","1","15","5","1","1","1","0","1","0","$2y$10$U/kExeKhbcEJ.V6uztl7f.b6RwxqJ2bJLcoeFadv7AiDGpgEOqh0a","DgSDydvSS7Z2EvliWCidPcAGEzvH0NhK5HXMpOO6BNCO1IITOP02A8dt7KbP","2017-12-19 01:04:42","2018-01-27 04:30:47");
INSERT INTO users VALUES("23","Habibur Rahman","","hellomrhabib2@gmail.com","880","171619966874","FU5JRNKIMPHWR6EWKVPQIXEXMPGXNS3","585226712","93IXNJ","2018-07-10 15:55:23","1","2018-07-10 15:55:26","82861","1","0","6","1","0","0","0","1","0","$2y$10$6.6k6MFOc6/e8D66nwqDJuo9oAKFYouVyKn1bLhHVbVEXmINZ54wi","VoXQ4hRONee1VOKeM6xwv27Us2cUg3I34AYEpIZ6zYekiFqExZRsVKlQaZcZ","2018-07-10 15:52:23","2018-07-10 16:57:19");



