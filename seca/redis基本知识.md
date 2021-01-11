# redis
### hash(哈希)
1. hGetAll 返回哈希表中，所有的字段和值。
2. hMset   同时将多个 field-value (字段-值)对设置到哈希表中
3. hGet    返回哈希表中指定字段的值
```
$redis->multi(\Redis::PIPELINE)
            ->hMset($key, ['roomNum'=>$roomNum])
            ->expire($key, 300)
            ->exec();
```
4. hScan   用于迭代哈希表中的键值对 
5. hDel    删除key中的一个或多个指定字段
6. hLen    

### 集合

1. sCard  返回集合中元素的数量
2. zCard  计算集合中元素的数量
3. sAdd   将一个或多个成员元素加入到集合中，已经存在于集合的成员元素将被忽略
4. zRange 返回有序集合中指定区间内的成员
5. sMembers 返回集合中的所有的成员。 不存在的集合 key 被视为空集合




### 事物

MULTI 标记一个事物的开始

redis学习笔记 - Pipeline与事务

Subscribe 命令用于订阅给定的一个或多个频道的信息

### 分步式锁
1. setnx
<!-- LockRedis::self()->lock($lockKey)
	 LockRedis::self()->unLock($lockKey); 
-->

# php

### php 字符串函数

- ucwords() - 把每个单词的首字符转换为大写
- ucfirst() - 把字符串中的首字符转换为大写
- lcfirst() - 把字符串中的首字符转换为小写
- strtoupper() - 把字符串转换为大写
- strtolower() - 把字符串转换为小写

- is_numeric() 检测变量是否为数字或数字字符串。
- str_repeat() 把字符串重复指定的次数
- ord() 返回字符串的首个字符的 ASCII 值
- chr() 从指定的 ASCII 值返回字符

### php 数组函数

- array_intersect() 用于比较两个（或更多个）数组的键值，并返回交集
- array_combine()   通过合并两个数组来创建一个新数组;其中的一个数组元素为键名，另一个数组的元素为键值。 注释：键名数组和键值数组的元素个数必须相同！
- array_map()      为数组的每个元素应用回调函数
- array_filter()   用回调函数过滤数组中的单元
- array_reduce()   用回调函数迭代地将数组简化为单一的值
- array_walk()     使用用户自定义函数对数组中的每个元素做回调处理
- array_unshift()  用于向数组插入新元素。新数组的值将被插入到数组的开头。
- array_sum()      返回数组中所有值的和
- shuffle()        把数组中的元素按随机顺序重新排列

### php 特殊函数

- create_function(string $args,string $code)  `string $args 声明的函数变量部分   string $code 执行的方法代码部分`
- call_user_func()  把第一个参数作为回调函数调用



### php 其他函数
- ceil()  向上舍入为最接近的整数。
- floor() 向下舍入为最接近的整数
- round() 对浮点数进行四舍五入



# linux 

1. |  叫管道du符号。

	管道命令符的作用能用zhi一句话来概括：“dao把前一个命令原本要zhuan输出到屏幕的数据shu当作是后一个命令的标准输入