--
-- Структура таблицы `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `track_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `track_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `track_distance` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `track_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `track_template` varchar(4000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '<div class="user-track"> 				<div class="track-title"><span class="icon-right icon-bike"></span><a href="#">%TRACKNAME%</a></div> 				<div class="track-map" id="track-map"></div> 				<div class="track-dst"><span class="icon-right icon-ruler"></span>%TRACKDISTANCE%</div> 				<div class="track-time"><span class="icon-right icon-time"></span>%TRACKTIME%</div> 			</div>',
  `track_data` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;
