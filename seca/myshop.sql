-- 新建数据库
CREATE DATABASED:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2myshop             CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

-- 获取一个随机数
SELECT * FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            
WHERE id >= (SELECT floor( RAND() * ((SELECT MAX(id) FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            )-(SELECT MIN(id) FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            )) + (SELECT MIN(id) FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            ))) 
ORDER BY id LIMIT 1;
-- 更改表字段
ALTER TABLED:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2activity            .            b8_shops_goods             
ADD COLUMND:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2is_del             tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品是否删除 0不删除 1删除                 AFTERD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2vip_price_update_time            ;

-- 建立表
CREATE TABLED:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shop_goods_delivery             (
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2id             int(11) unsigned NOT NULL AUTO_INCREMENT,
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2type             tinyint(1) unsigned DEFAULT '0' COMMENT '投递方式 1 频道投递 2 主题投递          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2goods_id             int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2channel_id             int(11) unsigned NOT NULL DEFAULT '0' COMMENT '频道ID，只有频道投递才生效          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2title             varchar(255)                    投放标题          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2start_time             bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '投放开始时间          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2end_time             bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '投放结束时间          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2is_offline             tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否下线 0 否 1 是          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2operator             varchar(255)                    操作人          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2operate_time             bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间          
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2update_time             datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 D:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2create_time             datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (            id            )
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='频道投递商品表';