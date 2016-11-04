USE arkblog;

CREATE TABLE `ark_post` (
  `id_ark_post` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(16) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `md_content` text DEFAULT NULL,
  `category` varchar(32) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `view` int(16) DEFAULT NULL,
  `pubtime` datetime DEFAULT NULL
);

alter table ark_post  convert to character set utf8;
