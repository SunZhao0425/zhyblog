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
6. sismembers 判断集合是否存在指定元素,存在返true , 不存在返 false
7. sPop    随机删除并返回集合中的一个元素
8. sRandMember  随机返回集合中的元素, 第二个参数决定返回的多少; n 大于集合内元素,则返回整个集合, n 是负数时,随机返回n的绝对值,数组内的元素会重复出现
9. srem    删除集合中指定的一个元素,元素不存在返0 删除成功返1,否则返0
10.sscan   模糊搜索相对的元素
11.sMove   将指定一个源集合里的值移动到一个目的集合,成功返回true, 失败或源集合不存在返false
12.sDiff   以第一个集合为标准,后面的集合对比,返回差集
13.sDiffStore  第一个集合为目标集合,存储缺少的值(三个集合相加,同样的字段覆盖,组合成一个新的集合),返回第一个参数锁增加的值
14.sInter  返回所有集合的相同值,必须所有集合都有,不存在的集合视为空集
15.sInterStore  目的集合已存在则覆盖它,返回交集元素个数,否则返回存储的交集
16.sUnion  将所有集合合并在一起并返回
17.sUnionStore  以第一个集合为目标,把后面的集合合并在一起,存储到第一个集合里面,如果已经存在则覆盖掉,并返回并集的个数




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
- mb_substr()      返回字符串的一部分
- array_column()   返回输入数组中某个单一列的值。 (https://blog.csdn.net/kelinfeng16/article/details/95243341)

### php 特殊函数

- create_function(string $args,string $code)  `string $args 声明的函数变量部分   string $code 执行的方法代码部分`
- call_user_func()  把第一个参数作为回调函数调用



### php 其他函数
- ceil()  向上舍入为最接近的整数。
- floor() 向下舍入为最接近的整数
- round() 对浮点数进行四舍五入


###  PHP PSR 标准规范

- https://learnku.com/docs/psr


# linux 

1. |  叫管道du符号。

	管道命令符的作用能用zhi一句话来概括：“dao把前一个命令原本要zhuan输出到屏幕的数据shu当作是后一个命令的标准输入



# git

1. git(https)设置长期保存密码
```
	git config --global credential.helper store

```
2.清除用户名密码
```
	git config --global credential.helper wincred
	git credential-manager uninstall

```
3.临时保存密码
```
    // 配置记住一小时
	git config credential.helper ‘cache –timeout=3600’

```


https://www.daixiaorui.com/manual/redis-zAdd.html





# cmd 中命令

1.打开计算器
calc

/usr/local/php/bin/php /opt/modules/cachetool/cachetool.phar opcache:reset --fcgi=127.0.0.1:9000





# yii2 框架

Yii 是一个高性能，基于组件的 PHP 框架，用于快速开发现代 Web 应用程序。 (极致简单与不断演变)







# 工具快捷键


## phpstorm
大小写切换： ctrl+shift+U
格式化代码： ctrl+alt+L
自动代码提示，补全:ctrl+j 
鼠标跳转到某一行： ctrl+G
查找类:CTRL+N
在当前窗口查找文本:ctrl+f
当前窗口替换文本:ctrl+r
全局搜索文件 ,优先文件名匹配的文件:ctrl+shift+n 
找变量的来源，跳到变量申明处 (ctrl+ 鼠标单击 也可以):cirl+b 
找到继承该接口或者父级 的所有子类, 统计	
​​​​
​​​​