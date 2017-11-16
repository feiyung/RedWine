/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : redwine

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-16 11:01:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `ad_password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `login_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `is_super` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为超级管理员，1是，0不是',
  `is_normal` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否正常，1正常，0不正常',
  `group_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '所属权限分组，0表示无权限分组',
  `son_access` text COMMENT '子菜单',
  `parent_access` text COMMENT '父菜单',
  `update_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='红酒系统管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'maojianghong', 'd2c4625b184a89dbd990d593efa5c7f2', '1507687426', '1510797947', '39', '1', '1', '0', '[\"3\",\"4\",\"6\"]', '[\"1\",\"5\"]', '1510796671');

-- ----------------------------
-- Table structure for adminlog
-- ----------------------------
DROP TABLE IF EXISTS `adminlog`;
CREATE TABLE `adminlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_name` varchar(50) NOT NULL DEFAULT '' COMMENT '操作名',
  `create_time` int(11) unsigned DEFAULT '0' COMMENT '操作时间',
  `ad_name` varchar(20) NOT NULL DEFAULT '' COMMENT '操作人名',
  `ad_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作人id',
  `act_ip` varchar(20) NOT NULL COMMENT '操作ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of adminlog
-- ----------------------------
INSERT INTO `adminlog` VALUES ('1', 'maojianghong：登录成功！', '1510797947', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('2', '添加红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6667', '1510798008', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('3', '添加客户易硕成功！', '1510798357', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('4', '创建订单成功,订单号：2017111645031，客户名:易硕', '1510798537', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('5', '创建订单成功,订单号：2017111633385，客户名:易硕', '1510799023', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('6', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6667', '1510799160', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('7', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6667', '1510799252', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('8', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6668', '1510799272', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('9', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6665', '1510799886', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('10', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6665', '1510800183', 'maojianghong', '1', '192.168.9.152');
INSERT INTO `adminlog` VALUES ('11', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：6665', '1510800291', 'maojianghong', '1', '192.168.9.152');
INSERT INTO `adminlog` VALUES ('12', '编辑红酒成功！编号：1，红酒名：红酒，单价：130元，库存：4958', '1510800336', 'maojianghong', '1', '192.168.9.153');
INSERT INTO `adminlog` VALUES ('13', '创建订单成功,订单号：2017111639964，客户名:易硕数量：10', '1510800352', 'maojianghong', '1', '192.168.9.153');

-- ----------------------------
-- Table structure for admin_access
-- ----------------------------
DROP TABLE IF EXISTS `admin_access`;
CREATE TABLE `admin_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL COMMENT '权限名称',
  `url` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否正常，1正常，0不正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户权限表';

-- ----------------------------
-- Records of admin_access
-- ----------------------------
INSERT INTO `admin_access` VALUES ('1', '0', '管理员管理', '', '1507526065', '1507540342', '1');
INSERT INTO `admin_access` VALUES ('2', '1', '用户管理', 'admin/adminlist', '1507526981', '1507539725', '1');
INSERT INTO `admin_access` VALUES ('3', '1', '权限管理', 'admin/accesslist', '1507527127', '1507539739', '1');
INSERT INTO `admin_access` VALUES ('4', '1', '分组管理', '', '1507539776', '1507540426', '1');
INSERT INTO `admin_access` VALUES ('5', '0', '红酒管理', 'admin/winelist', '1509075078', '1509075078', '1');
INSERT INTO `admin_access` VALUES ('6', '5', '添加红酒', 'admin/addwine', '1509075159', '1509075159', '1');

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(15) NOT NULL COMMENT '角色名',
  `ad_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `son_access` text COMMENT '子权限',
  `parent_access` text COMMENT '父权限',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1正常，0不正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admin_role
-- ----------------------------
INSERT INTO `admin_role` VALUES ('1', '1', '0', null, null, '1507599664', '1507599664', '1');
INSERT INTO `admin_role` VALUES ('2', '超级管理员', '0', null, null, '1507600013', '1507600013', '1');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(10) NOT NULL COMMENT '客户名',
  `cus_tel` varchar(11) DEFAULT NULL COMMENT '联系方式',
  `cus_addr` varchar(80) DEFAULT '' COMMENT '地址',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', '易硕', '18602316494', '', '1510798357', '1510798357');

-- ----------------------------
-- Table structure for order_online
-- ----------------------------
DROP TABLE IF EXISTS `order_online`;
CREATE TABLE `order_online` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(30) NOT NULL COMMENT '订单号',
  `total_price` varchar(15) NOT NULL DEFAULT '0',
  `goods_name` varchar(50) DEFAULT '' COMMENT '商品名',
  `goods_num` int(10) unsigned NOT NULL COMMENT '商品数量',
  `real_pay` varchar(15) NOT NULL DEFAULT '0' COMMENT '实际支付金额',
  `freight` varchar(10) NOT NULL DEFAULT '0' COMMENT '运费',
  `receiver_name` varchar(10) NOT NULL DEFAULT '' COMMENT '收货人',
  `address` varchar(50) NOT NULL DEFAULT '' COMMENT '收货地址',
  `send_way` varchar(10) NOT NULL DEFAULT '' COMMENT '运输方式',
  `mobile` varchar(12) NOT NULL DEFAULT '' COMMENT '联系电话',
  `order_cretime` varchar(25) NOT NULL DEFAULT '' COMMENT '订单创建时间',
  `order_paytime` varchar(25) NOT NULL DEFAULT '' COMMENT '订单付款时间',
  `logistics_num` varchar(30) DEFAULT '' COMMENT '物流单号',
  `logistics_company` varchar(20) DEFAULT '' COMMENT '物流公司',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of order_online
-- ----------------------------
INSERT INTO `order_online` VALUES ('1', '86578237804274805', '146.99', null, '1', '146.99', '0', '吴佳', '北京 北京市 顺义区 光明街道绿港家园三期 3号楼 2单元301(101300)', '快递', '13671078285', '2017-11-12 16:01:30', '2017-11-12 16:02:17', null, null, '1510800538', '1510800538');

-- ----------------------------
-- Table structure for redwine
-- ----------------------------
DROP TABLE IF EXISTS `redwine`;
CREATE TABLE `redwine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wine_name` varchar(30) DEFAULT NULL COMMENT '酒名',
  `class_id` int(10) unsigned DEFAULT NULL COMMENT '分类id',
  `property_id` int(10) unsigned DEFAULT NULL COMMENT '属性id',
  `sales_num` int(10) unsigned DEFAULT '0' COMMENT '销量',
  `sku_num` int(10) unsigned DEFAULT NULL COMMENT '库存',
  `create_time` int(11) unsigned DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT NULL,
  `price_line` int(10) unsigned DEFAULT NULL COMMENT '线上价',
  `price_c` int(10) unsigned DEFAULT NULL COMMENT '经销商价',
  `price` int(10) unsigned DEFAULT NULL COMMENT '价格',
  `description` varchar(255) DEFAULT NULL COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='红酒表';

-- ----------------------------
-- Records of redwine
-- ----------------------------
INSERT INTO `redwine` VALUES ('1', '红酒', null, null, '10', '4958', '1510798008', '1510800336', '1', '228', '150', '130', '');

-- ----------------------------
-- Table structure for sku
-- ----------------------------
DROP TABLE IF EXISTS `sku`;
CREATE TABLE `sku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wine_id` int(10) unsigned NOT NULL COMMENT '酒id',
  `property_id` int(10) unsigned NOT NULL COMMENT '库存属性id',
  `price` int(10) unsigned DEFAULT NULL COMMENT '价格',
  `sku_num` int(10) unsigned DEFAULT NULL COMMENT '库存数量',
  `sales_num` int(10) unsigned DEFAULT NULL COMMENT '销量',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sku
-- ----------------------------

-- ----------------------------
-- Table structure for wineorder
-- ----------------------------
DROP TABLE IF EXISTS `wineorder`;
CREATE TABLE `wineorder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_num` varchar(30) NOT NULL COMMENT '订单号',
  `wine_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `wine_name` varchar(30) NOT NULL COMMENT '商品名称',
  `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '单价',
  `wine_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品数量',
  `total_price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单总价',
  `debt_price` int(10) unsigned DEFAULT '0' COMMENT '欠款金额',
  `san_num` varchar(20) DEFAULT '' COMMENT '三联单号',
  `sendway` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1自提，2快递',
  `pay_way` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付方式1支付宝，2现金，3赊账',
  `ad_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单创建者id',
  `ad_name` varchar(20) NOT NULL COMMENT '创建者名称',
  `buy_id` int(10) unsigned NOT NULL COMMENT '客户id',
  `buy_name` varchar(10) NOT NULL COMMENT '买家名',
  `buy_tel` varchar(11) NOT NULL DEFAULT '' COMMENT '买家电话',
  `buy_addr` varchar(80) DEFAULT '' COMMENT '地址',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态0未付款，1已付款，2退货退款，3撤销订单',
  `create_time` int(11) unsigned DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wineorder
-- ----------------------------
INSERT INTO `wineorder` VALUES ('1', '2017111645031', '1', '红酒', '130', '24', '3120', '3120', '0027702', '1', '0', '1', 'maojianghong', '1', '易硕', '18602316494', '', '0', '1510798537', '1510798537');
INSERT INTO `wineorder` VALUES ('2', '2017111633385', '1', '红酒', '130', '12', '1560', '1560', '027703', '1', '0', '1', 'maojianghong', '1', '易硕', '18602316494', '', '0', '1510799023', '1510799023');
INSERT INTO `wineorder` VALUES ('3', '2017111639964', '1', '红酒', '130', '10', '1300', '1300', '0027710', '1', '0', '1', 'maojianghong', '1', '易硕', '18602316494', '', '0', '1510800352', '1510800352');
