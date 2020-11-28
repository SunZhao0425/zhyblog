-- 新建数据库
CREATE DATABASE `myshop` CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

-- 获取一个随机数
SELECT * FROM `b8_shops_orders`
WHERE id >= (SELECT floor( RAND() * ((SELECT MAX(id) FROM `b8_shops_orders`)-(SELECT MIN(id) FROM `b8_shops_orders`)) + (SELECT MIN(id) FROM `b8_shops_orders`))) 
ORDER BY id LIMIT 1;
-- 更改表字段
ALTER TABLE `activity`.`b8_shops_goods` 
ADD COLUMN `is_del` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品是否删除 0不删除 1删除  ' AFTER `vip_price_update_time`;

-- 建立表
CREATE TABLE `b8_shop_goods_delivery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned DEFAULT '0' COMMENT '投递方式 1 频道投递 2 主题投递',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `channel_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '频道ID，只有频道投递才生效',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '投放标题',
  `start_time` bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '投放开始时间',
  `end_time` bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '投放结束时间',
  `is_offline` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否下线 0 否 1 是',
  `operator` varchar(255) NOT NULL DEFAULT '' COMMENT '操作人',
  `operate_time` bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='频道投递商品表';