

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `image` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `src` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `base64` text,
  `status` tinyint(1) DEFAULT NULL,
  `imageFiles` text,
  `imageFile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `orderId` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT &#039;订单索引id&#039;,
  `orderSn` bigint(20) unsigned NOT NULL COMMENT &#039;订单编号&#039;,
  `pId` int(11) DEFAULT &#039;0&#039; COMMENT &#039;父ID&#039;,
  `kind` tinyint(1) DEFAULT &#039;0&#039; COMMENT &#039;订单类型（0：正常；1：补货；2：重提）&#039;,
  `orderCommand` varchar(20) DEFAULT NULL COMMENT &#039;订单口令&#039;,
  `vendorCode` varchar(20) NOT NULL DEFAULT &#039;&#039; COMMENT &#039;加盟商编号&#039;,
  `buyerName` varchar(24) NOT NULL DEFAULT &#039;&#039; COMMENT &#039;买家姓名&#039;,
  `buyerMobile` varchar(20) NOT NULL DEFAULT &#039;&#039; COMMENT &#039;买家手机&#039;,
  `orderType` tinyint(4) DEFAULT &#039;1&#039; COMMENT &#039;订单类型&#039;,
  `orderAmount` decimal(10,2) unsigned NOT NULL DEFAULT &#039;0.00&#039; COMMENT &#039;订单总价格&#039;,
  `discountAmount` decimal(10,2) DEFAULT NULL COMMENT &#039;折后金额&#039;,
  `discount` decimal(10,2) DEFAULT &#039;100.00&#039; COMMENT &#039;折扣&#039;,
  `discountReason` varchar(500) DEFAULT NULL COMMENT &#039;打折原因&#039;,
  `customDiscountAmount` decimal(10,2) DEFAULT &#039;0.00&#039; COMMENT &#039;客户折扣金额&#039;,
  `earnest` decimal(10,2) unsigned NOT NULL DEFAULT &#039;0.00&#039; COMMENT &#039;订单定金&#039;,
  `earnestState` tinyint(4) NOT NULL DEFAULT &#039;0&#039; COMMENT &#039;定金状态，0待付，1已付&#039;,
  `orderState` tinyint(4) NOT NULL DEFAULT &#039;0&#039; COMMENT &#039;订单状态&#039;,
  `orderStateLog` varchar(2000) DEFAULT &#039;&#039; COMMENT &#039;订单状态信息&#039;,
  `isDel` tinyint(4) NOT NULL DEFAULT &#039;0&#039; COMMENT &#039;删除状态:0未删除，1删除&#039;,
  `orderFrom` tinyint(4) NOT NULL DEFAULT &#039;1&#039; COMMENT &#039;1PC,2Ipad,3Terminal&#039;,
  `finnshedTime` int(11) unsigned NOT NULL DEFAULT &#039;0&#039; COMMENT &#039;订单完成时间&#039;,
  `subOrderCount` int(6) DEFAULT &#039;0&#039; COMMENT &#039;子订单总任务数&#039;,
  `finishSubCount` int(6) DEFAULT &#039;0&#039; COMMENT &#039;完成的任务数&#039;,
  `salesId` int(11) NOT NULL DEFAULT &#039;0&#039; COMMENT &#039;导购id&#039;,
  `deliveryAddress` text COMMENT &#039;收货地址&#039;,
  `creater` char(24) DEFAULT &#039;&#039; COMMENT &#039;创建人&#039;,
  `created` int(11) DEFAULT &#039;0&#039; COMMENT &#039;创建时间&#039;,
  `modifier` char(24) DEFAULT &#039;&#039; COMMENT &#039;修改人&#039;,
  `modified` int(11) DEFAULT &#039;0&#039; COMMENT &#039;修改时间&#039;,
  `isPurchases` int(1) DEFAULT &#039;0&#039; COMMENT &#039;是否已采购 0：否 1：是&#039;,
  `relationOrdersSn` bigint(20) DEFAULT NULL COMMENT &#039;关联主材包&#039;,
  `receiveName` varchar(24) DEFAULT NULL COMMENT &#039;客户地址收货人&#039;,
  `receiveMobile` varchar(20) DEFAULT NULL COMMENT &#039;客户地址收货电话&#039;,
  `orderBusinessType` tinyint(2) DEFAULT &#039;0&#039; COMMENT &#039;主材包业务类型（0:398业务，1:518业务）&#039;,
  `purchasesType` tinyint(2) DEFAULT &#039;0&#039; COMMENT &#039;采购类型 0:常规集采 1:仓库破损补货&#039;,
  PRIMARY KEY (`orderId`),
  UNIQUE KEY `orderSn` (`orderSn`),
  KEY `buyerName` (`buyerName`) USING BTREE,
  KEY `buyerMobile` (`buyerMobile`) USING BTREE,
  KEY `orderType` (`orderType`) USING BTREE,
  KEY `vendorCode` (`vendorCode`) USING BTREE,
  KEY `orderState` (`orderState`) USING BTREE,
  KEY `salesId` (`salesId`) USING BTREE,
  KEY `orderFrom` (`orderFrom`) USING BTREE,
  KEY `created` (`created`) USING BTREE,
  KEY `isDel` (`isDel`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18691 DEFAULT CHARSET=utf8 COMMENT=&#039;订单主表&#039;;

CREATE TABLE `setting` (
  `name` varchar(20) NOT NULL,
  `value` varchar(50) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT &#039;用户Id&#039;,
  `name` char(24) NOT NULL DEFAULT &#039;&#039; COMMENT &#039;用户名&#039;,
  `password` char(255) DEFAULT &#039;&#039; COMMENT &#039;用户密码&#039;,
  `mobile` char(20) DEFAULT &#039;&#039; COMMENT &#039;用户手机&#039;,
  `status` tinyint(1) DEFAULT &#039;0&#039; COMMENT &#039;用户状态 0 正常 1 停用 2 锁定&#039;,
  `type` tinyint(1) DEFAULT &#039;0&#039; COMMENT &#039;用户类型 1 客服 2 加盟商 3 供应商&#039;,
  `remark` char(255) DEFAULT &#039;&#039; COMMENT &#039;用户备注&#039;,
  `avatar` char(255) DEFAULT &#039;&#039; COMMENT &#039;用户头像&#039;,
  `role` tinyint(1) DEFAULT &#039;0&#039; COMMENT &#039;用户角色&#039;,
  `creater` char(24) DEFAULT &#039;&#039; COMMENT &#039;创建人&#039;,
  `created` int(11) unsigned DEFAULT &#039;0&#039; COMMENT &#039;创建时间&#039;,
  `modifier` char(24) DEFAULT &#039;&#039; COMMENT &#039;修改人&#039;,
  `modified` int(11) unsigned DEFAULT &#039;0&#039; COMMENT &#039;修改时间&#039;,
  `isDel` tinyint(1) DEFAULT &#039;0&#039; COMMENT &#039;软删除 0 未删除 1 删除&#039;,
  `refId` int(11) unsigned DEFAULT &#039;0&#039; COMMENT &#039;外键链接&#039;,
  `lockTime` int(11) DEFAULT &#039;0&#039; COMMENT &#039;用户锁定时间&#039;,
  `access_token` varchar(100) DEFAULT NULL COMMENT &#039;认证密钥&#039;,
  `auth_key` varchar(255) DEFAULT NULL,
  `belong` char(36) DEFAULT &#039;&#039; COMMENT &#039;归属&#039;,
  `group` tinyint(1) DEFAULT &#039;0&#039; COMMENT &#039;导购分组&#039;,
  `email` varchar(128) DEFAULT &#039;&#039; COMMENT &#039;用户邮箱&#039;,
  `searchConfig` text NOT NULL COMMENT &#039;采购搜索条件&#039;,
  `version` varchar(10) DEFAULT NULL COMMENT &#039;系统版本号&#039;,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_mobile` (`mobile`) USING BTREE COMMENT &#039;用户手机&#039;,
  KEY `index_status` (`status`) USING BTREE COMMENT &#039;用户状态 0 正常 1 停用 2 锁定&#039;,
  KEY `index_type` (`type`) USING BTREE COMMENT &#039;用户类型 1 客服 2 加盟商 3 供应商&#039;,
  KEY `index_created` (`created`) USING BTREE COMMENT &#039;创建时间&#039;,
  KEY `index_modified` (`modified`) USING BTREE,
  KEY `index_role` (`role`) USING BTREE,
  KEY `index_isDel` (`isDel`) USING BTREE,
  KEY `index_refId` (`refId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1296 DEFAULT CHARSET=utf8 COMMENT=&#039;后台登陆用户表&#039;;

CREATE TABLE `widget` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT &#039;小部件名称&#039;,
  `author` varchar(20) DEFAULT NULL COMMENT &#039;作者&#039;,
  `status` tinyint(1) DEFAULT NULL COMMENT &#039;状态：1启用，0禁用，2卸载&#039;,
  `routeName` varchar(50) DEFAULT NULL COMMENT &#039;小部件路由&#039;,
  `params` text COMMENT &#039;配置参数&#039;,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

COMMIT;SET FOREIGN_KEY_CHECKS = 1;

