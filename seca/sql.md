#### 1.指定时间段内赠送礼物用户的基本信息

```
select gift_name,send_user_id,user_name,room_num,user_mobile, count(`gift_count`) as giftnum
from b8_gift_log left join  b8_user on  b8_gift_log.send_user_id = b8_user.user_id 
where gift_id = 20327 and b8_gift_log.insert_time BETWEEN UNIX_TIMESTAMP('2020-12-20 00:00:00') and UNIX_TIMESTAMP('2020-12-30 00:00:00')
GROUP BY  `send_user_id` limit 50;

```
https://www.cnblogs.com/cathyqq/p/5197626.html

- sql的日期格式化转化
https://www.cnblogs.com/gyadmin/p/8615115.html

```
SELECT FROM_UNIXTIME( `msg_datetime`), `msg_id`, `msg_content`   FROM `b8_dongtai_message` 
 ORDER BY  `msg_id` DESC  LIMIT 20  ;

```

- 阿里云日志服务 

```

  * | select from_unixtime(__time__),status,request_uri , http_referer,http_user_agent,* ,request_uri WHERE request_uri like '%live-num%' and status = 500 order by __time__  Desc

  * |
  select
    count(1) as pv,
    split_part(request_uri, '?', 1) as path
  group by
    path
  order by
    pv desc
  limit
    10




  status >= 400 |
  SELECT
    diff [1] AS c1,
    diff [2] AS c2,
    round(diff [1] * 100.0 / diff [2] - 100.0, 2) AS c3
  FROM
    (
      select
        compare(c, 3600) AS diff
      from
        (
          select
            count(1) as c
          from
            log
        )
    )


  * |
  select
    date_format(date_trunc('minute', __time__), '%m-%d %H:%i') as t, 
    request_uri,status, host ,
    count(*) as pv   where status = 500
  group by
    t,
    request_uri,status, host
  order by
    t asc
  limit
    10000

```
