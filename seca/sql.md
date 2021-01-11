#### 1.指定时间段内赠送礼物用户的基本信息

```
select gift_name,send_user_id,user_name,room_num,user_mobile, count(`gift_count`) as giftnum
from b8_gift_log left join  b8_user on  b8_gift_log.send_user_id = b8_user.user_id 
where gift_id = 20327 and b8_gift_log.insert_time BETWEEN UNIX_TIMESTAMP('2020-12-20 00:00:00') and UNIX_TIMESTAMP('2020-12-30 00:00:00')
GROUP BY  `send_user_id` limit 50;

```
https://www.cnblogs.com/cathyqq/p/5197626.html