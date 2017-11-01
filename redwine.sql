/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : redwine

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-01 16:44:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zy_admin
-- ----------------------------
DROP TABLE IF EXISTS `zy_admin`;
CREATE TABLE `zy_admin` (
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
-- Records of zy_admin
-- ----------------------------
INSERT INTO `zy_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1507687426', '1509500385', '30', '1', '1', '0', '[\"3\",\"4\",\"6\"]', '[\"1\",\"5\"]', '1509093920');
INSERT INTO `zy_admin` VALUES ('2', '黄飞', 'e10adc3949ba59abbe56e057f20f883e', '1507778588', '1509094778', '5', '0', '1', '0', '[\"2\",\"3\",\"4\"]', '[\"1\"]', '1509331958');
INSERT INTO `zy_admin` VALUES ('3', '刘翔', 'e10adc3949ba59abbe56e057f20f883e', '1509085888', '0', '0', '0', '1', '0', null, null, '1509085888');

-- ----------------------------
-- Table structure for zy_adminlog
-- ----------------------------
DROP TABLE IF EXISTS `zy_adminlog`;
CREATE TABLE `zy_adminlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_name` varchar(50) NOT NULL DEFAULT '' COMMENT '操作名',
  `create_time` int(11) unsigned DEFAULT '0' COMMENT '操作时间',
  `ad_name` varchar(20) NOT NULL DEFAULT '' COMMENT '操作人名',
  `ad_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作人id',
  `act_ip` varchar(20) NOT NULL COMMENT '操作ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zy_adminlog
-- ----------------------------
INSERT INTO `zy_adminlog` VALUES ('1', '查看红酒列表', '1508309240', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('2', '查看红酒列表', '1508309359', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('3', '编辑红酒信息', '1508309536', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('4', '创建订单成功', '1508309663', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('5', '创建订单成功', '1508314015', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('6', '创建订单成功', '1508402804', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('7', '创建订单成功', '1508461939', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('8', '创建订单成功,订单号：2017102028407', '1508465568', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('9', '订单号：2017102028407现金收款：50元，未付金额：！50元', '1508466907', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('10', '订单号：2017102028407现金收款：50元，已付所有金额！', '1508466938', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('11', '订单号：2017102028407,退货退款!', '1508468377', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('12', '添加客户刘翔成功！', '1508469664', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('13', '创建订单成功,订单号：2017102060659，客户名:刘翔', '1508469926', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('14', '更新客户信息成功！客户编号：1', '1508470191', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('15', '添加红酒成功！编号：1，红酒名：娃哈哈，单价：5，库存：100', '1508470506', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('16', '添加红酒成功！编号：6，红酒名：脉动，单价：10，库存：100', '1508470567', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('17', '编辑红酒成功！编号：6，红酒名：脉动，单价：8，库存：100', '1508470779', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('18', '订单号：2017102060659，现金收款：40元，已付完所有金额！', '1508471140', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('19', '订单号：2017102038475，赊账，未付金额：1200元', '1508471326', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('20', '订单号：2017101712245，现金收款：50元，未付金额：50元', '1508471803', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('21', '订单号：2017101712245，现金收款：10元，未付金额：40元', '1508471821', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('22', '订单号：2017101394134,退货退款!', '1508811437', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('23', '订单号：2017101394134,退货退款!', '1508811519', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('24', '订单号：2017101394134,退货退款!', '1508811606', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('25', '订单号：2017102060659,退货退款成功,20瓶AD钙奶返回库存!', '1508811989', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('26', '订单号：2017102060659,退货退款成功,20瓶AD钙奶返回库存!', '1508812272', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('27', '创建订单成功,订单号：2017102441681，客户名:刘翔', '1508812377', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('28', '编辑红酒成功！编号：1，红酒名：拉菲，单价：10000元，库存：50', '1508828623', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('29', '创建订单成功,订单号：2017102442278，客户名:刘翔', '1508828648', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('30', '订单号：2017101874944,退货退款成功,1瓶AD钙奶返回库存!', '1508899188', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('31', '订单号：2017101712245，现金收款：40元，未付金额：10元', '1508914682', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('32', '订单号：2017101712245，现金收款：10元，已付完所有金额！', '1508914723', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('33', '订单号：2017101822589，现金收款：3元，已付完所有金额！', '1508914723', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('34', '订单号：2017101871368，现金收款：2元，已付完所有金额！', '1508914723', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('35', '订单号：2017101821079，现金收款：1元，已付完所有金额！', '1508914723', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('36', '订单号：2017101996155，现金收款：300元，已付完所有金额！', '1508914723', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('37', '订单号：2017102038475，现金收款：1200元，未付金额：0元', '1508914723', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('38', '订单号：2017101871368，现金收款：2元，已付完所有金额！', '1508920934', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('39', '订单号：2017101821079，现金收款：1元，未付金额：1元', '1508920934', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('40', '订单号：2017101821079，现金收款：1元，未付金额：1元', '1508921141', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('41', '订单号：2017101821079，现金收款：1元，未付金额：1元', '1508921200', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('42', '订单号：2017101821079，现金收款：1元，未付金额：1元', '1508921244', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('43', '订单号：2017101821079，现金收款：1元，已付完所有金额！', '1508921306', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('44', '订单号：2017101996155，现金收款：1000元，已付完所有金额！', '1508921306', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('45', '订单号：2017102038475，现金收款：2000元，已付完所有金额！', '1508921306', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('46', '订单号：2017101712245,退货退款成功,1瓶长城干红返回库存!', '1508921435', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('47', '订单号：2017101821079，现金收款：1元，未付金额：1元', '1508982940', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('48', '订单号：2017101821079，赊账，未付金额：1元', '1508983421', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('49', '创建订单成功,订单号：2017102628310，客户名:刘翔', '1508984786', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('50', '订单号：2017102628310，现金收款：10元，未付金额：40元', '1508984806', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('51', '订单号：2017102441681，现金收款：1元，未付金额：79元', '1508984842', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('52', '订单号：2017102628310，赊账，未付金额：40元', '1509345202', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('53', '订单号：2017102628310，现金收款：20元，未付金额：20元', '1509345216', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('54', '添加红酒成功！编号：8，红酒名：111，单价：111元，库存：11', '1509419612', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('55', '编辑红酒成功！编号：8，红酒名：1112，单价：111元，库存：11', '1509420181', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('56', '创建订单成功,订单号：2017103192703，客户名:黄飞', '1509420823', 'admin', '1', '127.0.0.1');
INSERT INTO `zy_adminlog` VALUES ('57', '编辑红酒成功！编号：8，红酒名：1112，单价：1110元，库存：10', '1509516014', 'admin', '1', '127.0.0.1');

-- ----------------------------
-- Table structure for zy_admin_access
-- ----------------------------
DROP TABLE IF EXISTS `zy_admin_access`;
CREATE TABLE `zy_admin_access` (
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
-- Records of zy_admin_access
-- ----------------------------
INSERT INTO `zy_admin_access` VALUES ('1', '0', '管理员管理', '', '1507526065', '1507540342', '1');
INSERT INTO `zy_admin_access` VALUES ('2', '1', '用户管理', 'admin/adminlist', '1507526981', '1507539725', '1');
INSERT INTO `zy_admin_access` VALUES ('3', '1', '权限管理', 'admin/accesslist', '1507527127', '1507539739', '1');
INSERT INTO `zy_admin_access` VALUES ('4', '1', '分组管理', '', '1507539776', '1507540426', '1');
INSERT INTO `zy_admin_access` VALUES ('5', '0', '红酒管理', 'admin/winelist', '1509075078', '1509075078', '1');
INSERT INTO `zy_admin_access` VALUES ('6', '5', '添加红酒', 'admin/addwine', '1509075159', '1509075159', '1');

-- ----------------------------
-- Table structure for zy_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `zy_admin_role`;
CREATE TABLE `zy_admin_role` (
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
-- Records of zy_admin_role
-- ----------------------------
INSERT INTO `zy_admin_role` VALUES ('1', '1', '0', null, null, '1507599664', '1507599664', '1');
INSERT INTO `zy_admin_role` VALUES ('2', '超级管理员', '0', null, null, '1507600013', '1507600013', '1');

-- ----------------------------
-- Table structure for zy_customer
-- ----------------------------
DROP TABLE IF EXISTS `zy_customer`;
CREATE TABLE `zy_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(10) NOT NULL COMMENT '客户名',
  `cus_tel` varchar(11) NOT NULL COMMENT '联系方式',
  `cus_addr` varchar(80) DEFAULT '' COMMENT '地址',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zy_customer
-- ----------------------------
INSERT INTO `zy_customer` VALUES ('1', '黄飞', '15223408636', '重庆渝北区', '1508228704', '1508470191');
INSERT INTO `zy_customer` VALUES ('2', '黄飞鸿', '15223408636', '重庆江北区', '1508291724', '1508315731');
INSERT INTO `zy_customer` VALUES ('3', '黄飞虎', '15223408636', '重庆沙坪坝区', '1508297981', '1508315756');
INSERT INTO `zy_customer` VALUES ('4', '刘翔', '15223408636', '重庆江北', '1508469664', '1508469664');

-- ----------------------------
-- Table structure for zy_redwine
-- ----------------------------
DROP TABLE IF EXISTS `zy_redwine`;
CREATE TABLE `zy_redwine` (
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='红酒表';

-- ----------------------------
-- Records of zy_redwine
-- ----------------------------
INSERT INTO `zy_redwine` VALUES ('1', '拉菲', null, null, '70', '30', '1507615977', '1508828623', '1', null, null, '10000', '拉菲拉菲拉菲');
INSERT INTO `zy_redwine` VALUES ('2', '波尔多干红', null, null, '11', '90', '1507618839', '1507618839', '1', null, null, '500', '');
INSERT INTO `zy_redwine` VALUES ('3', '长城干红', null, null, '56', '44', '1507620284', '1507620336', '1', null, null, '100', '干红');
INSERT INTO `zy_redwine` VALUES ('4', 'AD钙奶', null, null, '9', '91', '1507860126', '1508309536', '1', null, null, '2', '儿时回忆');
INSERT INTO `zy_redwine` VALUES ('5', '娃哈哈', null, null, '10', '90', '1508470506', '1508470506', '1', null, null, '5', '');
INSERT INTO `zy_redwine` VALUES ('6', '脉动', null, null, '10', '90', '1508470567', '1508470779', '1', null, null, '8', '');
INSERT INTO `zy_redwine` VALUES ('8', '1112', null, null, '1', '10', '1509419612', '1509516014', '1', '11', '1', '1110', '');

-- ----------------------------
-- Table structure for zy_sku
-- ----------------------------
DROP TABLE IF EXISTS `zy_sku`;
CREATE TABLE `zy_sku` (
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
-- Records of zy_sku
-- ----------------------------

-- ----------------------------
-- Table structure for zy_wineorder
-- ----------------------------
DROP TABLE IF EXISTS `zy_wineorder`;
CREATE TABLE `zy_wineorder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_num` varchar(30) NOT NULL COMMENT '订单号',
  `wine_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `wine_name` varchar(30) NOT NULL COMMENT '商品名称',
  `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '单价',
  `wine_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品数量',
  `total_price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单总价',
  `debt_price` int(10) unsigned DEFAULT '0' COMMENT '欠款金额',
  `pay_way` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付方式1支付宝，2现金，3赊账',
  `ad_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单创建者id',
  `ad_name` varchar(10) NOT NULL COMMENT '创建者名称',
  `buy_id` int(10) unsigned NOT NULL COMMENT '客户id',
  `buy_name` varchar(10) NOT NULL COMMENT '买家名',
  `buy_tel` varchar(11) NOT NULL DEFAULT '' COMMENT '买家电话',
  `buy_addr` varchar(80) DEFAULT '' COMMENT '地址',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态0未付款，1已付款，2退货退款，3撤销订单',
  `create_time` int(11) unsigned DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of zy_wineorder
-- ----------------------------
INSERT INTO `zy_wineorder` VALUES ('1', '1111111111', '1', '拉菲', '100', '10', '1000', '1000', '0', '1', '', '0', '', '', '', '0', '0', '0');
INSERT INTO `zy_wineorder` VALUES ('2', '2017101070611', '3', '长城干红', '100', '12', '1200', '1200', '1', '1', '0', '0', '123', '123', '', '0', '1507626089', '1507626089');
INSERT INTO `zy_wineorder` VALUES ('3', '2017101178845', '2', '波尔多干红', '500', '50', '25000', '400', '0', '1', 'admin', '0', 'admin', '1', '', '0', '1507689814', '1507689814');
INSERT INTO `zy_wineorder` VALUES ('4', '2017101176088', '1', '拉菲', '10000', '1', '10000', '1000', '0', '1', 'admin', '0', '1', '1', '', '0', '1507691297', '1507691297');
INSERT INTO `zy_wineorder` VALUES ('5', '2017101140850', '1', '拉菲', '10000', '1', '10000', '8000', '0', '1', 'admin', '0', '1', '15223408636', '', '0', '1507691703', '1507691703');
INSERT INTO `zy_wineorder` VALUES ('6', '2017101138578', '1', '拉菲', '10000', '1', '10000', '5000', '0', '1', 'admin', '0', '1', '15223408636', '', '0', '1507691869', '1507691869');
INSERT INTO `zy_wineorder` VALUES ('7', '2017101131131', '1', '拉菲', '10000', '1', '10000', '5000', '0', '1', 'admin', '0', '1', '15223408636', '', '0', '1507691919', '1507691919');
INSERT INTO `zy_wineorder` VALUES ('8', '2017101158030', '1', '拉菲', '10000', '1', '10000', '10000', '0', '1', 'admin', '0', '1', '15223408636', '', '0', '1507692043', '1507692043');
INSERT INTO `zy_wineorder` VALUES ('9', '2017101104306', '2', '波尔多干红', '500', '10', '5000', '5000', '0', '1', 'admin', '0', 'admin', '15223408636', '', '0', '1507692109', '1507692109');
INSERT INTO `zy_wineorder` VALUES ('10', '2017101157817', '3', '长城干红', '100', '25', '2500', '1000', '3', '1', '', '0', '黄飞', '15223408636', '', '0', '1507709217', '1507709217');
INSERT INTO `zy_wineorder` VALUES ('11', '2017101223822', '1', '拉菲', '10000', '49', '490000', '10000', '2', '1', '', '0', '111', '15223408636', '', '2', '1507774247', '1507774247');
INSERT INTO `zy_wineorder` VALUES ('12', '2017101394134', '2', '波尔多干红', '500', '1', '500', '0', '2', '2', '黄飞鸿', '1', '黄飞', '15223408636', '', '2', '1507859400', '1507859400');
INSERT INTO `zy_wineorder` VALUES ('13', '2017101712245', '3', '长城干红', '100', '1', '100', '0', '2', '1', 'admin', '1', '黄飞', '15223408636', '', '2', '1508228704', '1508228704');
INSERT INTO `zy_wineorder` VALUES ('14', '2017101874944', '4', 'AD钙奶', '2', '1', '2', '0', '2', '1', 'admin', '2', '黄飞鸿', '15223408636', '', '2', '1508292056', '1508292056');
INSERT INTO `zy_wineorder` VALUES ('15', '2017101822589', '4', 'AD钙奶', '2', '2', '4', '0', '2', '1', 'admin', '1', '黄飞', '15223408636', '', '1', '1508297408', '1508297408');
INSERT INTO `zy_wineorder` VALUES ('16', '2017101842804', '4', 'AD钙奶', '2', '5', '10', '10', '0', '1', 'admin', '3', '黄飞飞', '15223408636', '', '0', '1508298031', '1508298031');
INSERT INTO `zy_wineorder` VALUES ('17', '2017101871368', '4', 'AD钙奶', '2', '1', '2', '0', '2', '1', 'admin', '1', '黄飞', '15223408636', '', '1', '1508309663', '1508309663');
INSERT INTO `zy_wineorder` VALUES ('18', '2017101821079', '4', 'AD钙奶', '2', '1', '2', '1', '3', '1', 'admin', '1', '黄飞', '15223408636', '重庆渝中区', '0', '1508314015', '1508314015');
INSERT INTO `zy_wineorder` VALUES ('19', '2017101996155', '3', '长城干红', '100', '10', '1000', '1000', '2', '1', 'admin', '1', '黄飞', '15223408636', '重庆渝中区', '0', '1508402804', '1508402804');
INSERT INTO `zy_wineorder` VALUES ('20', '2017102038475', '3', '长城干红', '100', '20', '2000', '500', '2', '1', 'admin', '1', '黄飞', '15223408636', '重庆渝中区', '0', '1508461939', '1508461939');
INSERT INTO `zy_wineorder` VALUES ('21', '2017102028407', '3', '长城干红', '100', '1', '100', '0', '2', '1', 'admin', '1', '黄飞', '15223408636', '重庆渝中区', '2', '1508465568', '1508465568');
INSERT INTO `zy_wineorder` VALUES ('22', '2017102060659', '4', 'AD钙奶', '2', '20', '40', '0', '2', '1', 'admin', '4', '刘翔', '15223408636', '重庆江北', '2', '1508469926', '1508469926');
INSERT INTO `zy_wineorder` VALUES ('23', '2017102441681', '6', '脉动', '8', '10', '80', '79', '2', '1', 'admin', '4', '刘翔', '15223408636', '重庆江北', '0', '1508812377', '1508812377');
INSERT INTO `zy_wineorder` VALUES ('24', '2017102442278', '1', '拉菲', '10000', '20', '200000', '200000', '0', '1', 'admin', '4', '刘翔', '15223408636', '重庆江北', '0', '1508828647', '1508828647');
INSERT INTO `zy_wineorder` VALUES ('25', '2017102628310', '5', '娃哈哈', '5', '10', '50', '20', '1', '1', 'admin', '4', '刘翔', '15223408636', '重庆江北', '0', '1508984786', '1508984786');
INSERT INTO `zy_wineorder` VALUES ('26', '2017103192703', '8', '1112', '11', '1', '11', '11', '0', '1', 'admin', '1', '黄飞', '15223408636', '重庆渝北区', '0', '1509420823', '1509420823');
