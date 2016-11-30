--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No information',
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No information',
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No information',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no-user-photo.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

