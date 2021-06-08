-- 新建数据库
CREATE DATABASED:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2myshop             CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

-- 获取一个随机数
SELECT * FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            
WHERE id >= (SELECT floor( RAND() * ((SELECT MAX(id) FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            )-(SELECT MIN(id) FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            )) + (SELECT MIN(id) FROMD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2b8_shops_orders            ))) 
ORDER BY id LIMIT 1;
-- 更改表字段
ALTER TABLED:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2activity            .            b8_shops_goods             
ADD COLUMND:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2is_del             tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品是否删除 0不删除 1删除                 AFTERD:\phpStudy\PHPTutorial\WWW\aly-www\zhibo-v2vip_price_update_time            ;

