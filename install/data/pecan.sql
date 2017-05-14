USE arkblog;


CREATE TABLE `ark_user` (
  `id_ark_user` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(16) DEFAULT NULL,
  `nickname` varchar(16) DEFAULT NULL, 
  `password` varchar(32) DEFAULT NULL,
  `role_id`  varchar(32) DEFAULT NULL,
  `status`   tinyint(4) DEFAULT NULL,
  `token`   varchar(32) DEFAULT NULL,
  `reg_ip` varchar(32) DEFAULT NULL,
  `regtime`  datetime DEFAULT NULL,
  `log_ip`   varchar(32) DEFAULT NULL,
  `logtime`  datetime DEFAULT NULL,
  `del_tag`   tinyint(1) DEFAULT NULL
);

ALTER TABLE `ark_user` ADD UNIQUE INDEX IndexName(`username`);


CREATE TABLE `ark_role` (
  `id_ark_role` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `role_name` varchar(16) DEFAULT NULL,
  `permission_list` text DEFAULT NULL,
  `status`   tinyint(4) DEFAULT NULL,
  `del_tag`   tinyint(1) DEFAULT NULL
);

ALTER TABLE `ark_role` ADD UNIQUE INDEX IndexName(`role_name`);

CREATE TABLE `ark_permission` (
  `id_ark_permission` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `permission_name` varchar(128) DEFAULT NULL,
  `permission_path` varchar(128) DEFAULT NULL,
  `status`   tinyint(4) DEFAULT NULL,
  `del_tag`   tinyint(3) DEFAULT NULL
);

ALTER TABLE `ark_permission` ADD UNIQUE INDEX IndexName(`permission_path`);

CREATE TABLE `ark_post` (
  `id_ark_post` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `md_content` text DEFAULT NULL,
  `abstract` text DEFAULT NULL,
　`refer`　varchar(512) DEFAULT NULL,
  `category` varchar(32) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `view` int(16) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `key` varchar(32) DEFAULT NULL,
  `draft_tag` tinyint(1) DEFAULT NULL,
  `del_tag` tinyint(1) DEFAULT NULL,
  `pubtime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL
);
ALTER TABLE ark_post　ADD `refer`　varchar(512) DEFAULT NULL;

CREATE TABLE `ark_category` (
  `id_ark_category` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `parent_id` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `category_name` varchar(32) DEFAULT NULL
);

CREATE TABLE `ark_tag` (
  `id_ark_tag` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `tag_name` varchar(32) DEFAULT NULL
);

alter table ark_post  convert to character set utf8;
alter table ark_category  convert to character set utf8;
alter table ark_tag  convert to character set utf8;
alter table ark_user  convert to character set utf8;
alter table ark_role  convert to character set utf8;
alter table ark_permission  convert to character set utf8;
alter table ark_nessus_scan  convert to character set utf8;
alter table ark_nessus_report convert to character set utf8;
alter table ark_sys_var convert to character set utf8;


INSERT INTO `ark_category` VALUES (1,0,1,'默认分类'),(2,0,1,'安全工具');

CREATE TABLE `ark_nessus_report` (
  `id_ark_nessus_report` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `report_id` varchar(128) DEFAULT NULL,
  `plugin_id` int(11) DEFAULT 0,
  `cve`  varchar(32) DEFAULT 0,
  `cvss` varchar(32) DEFAULT NULL,
  `risk` varchar(32) DEFAULT NULL,
  `host` varchar(32) DEFAULT NULL,
  `protocol` varchar(128) DEFAULT NULL,
  `port` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `synopsis` TEXT DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `solution` TEXT DEFAULT NULL,
  `output` TEXT DEFAULT NULL
);

扫描ID 	扫描名称 	扫描目标 	状态 	扫描结果 	计划任务 	用户 	操作

CREATE TABLE `ark_nessus_scan` (
  `id_ark_nessus_scan` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `report_id` varchar(128) DEFAULT NULL,
  `nessus_scan_id` int(11) DEFAULT NULL ,
  `scan_name` varchar(128) DEFAULT 0,
  `scan_target`  TEXT ,
  `status` varchar(32) DEFAULT NULL,
  `result` varchar(32) DEFAULT NULL,
  `schedule` varchar(32) DEFAULT NULL,
  `user_id` varchar(2) DEFAULT NULL,
  `del_tag` varchar(2) DEFAULT NULL
);

CREATE TABLE `ark_sys_var` (
  `id_ark_sys_var` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(128) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  `del_tag` varchar(2) DEFAULT NULL
);

alter table `ark_nessus_report` rename column `id_ark_nessus_scan` to `id_ark_nessus_report`;
alter table ark_nessus_report change id_ark_nessus_scan id_ark_nessus_report int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY


CREATE TABLE `ark_asset_ip` (
  `id_ark_sys_var` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `ip_type` varchar(128) DEFAULT NULL,
  `is_range` int(1) DEFAULT 0,
  `description` varchar(512) DEFAULT NULL,
  `organization` varchar(128) DEFAULT NULL,
  `principal` varchar(128) DEFAULT NULL,
  `del_tag` varchar(2) DEFAULT NULL
);


CREATE TABLE `ark_asset_domain` (
  `id_ark_sys_var` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(128) DEFAULT NULL,
  `domain_name` varchar(512) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `organization` varchar(128) DEFAULT NULL,
  `principal` varchar(128) DEFAULT NULL,
  `del_tag` varchar(2) DEFAULT NULL
);



