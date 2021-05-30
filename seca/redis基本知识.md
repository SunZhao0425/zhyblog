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

# MYSQL

## explain
- expain出来的信息有10列，分别是id、select_type、table、type、possible_keys、key、key_len、ref、rows、Extra

- https://www.cnblogs.com/tufujie/p/9413852.html

概要描述:

```
	id:选择标识符
	select_type:表示查询的类型。
	table:输出结果集的表
	partitions:匹配的分区
	type:表示表的连接类型
	possible_keys:表示查询时，可能使用的索引
	key:表示实际使用的索引
	key_len:索引字段的长度
	ref:列与索引的比较
	rows:扫描出的行数(估算的行数)
	filtered:按表条件过滤的行百分比
	Extra:执行情况的描述和说明

```

# php

```
	https://segmentfault.com/a/1190000017179932/
```

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


## 魔法常量
- __ LINE__  文件中的当前行号
- __ FILE__  文件的完整路径和文件名.
- __ DIR__   文件所在的目录.
- __ FUNCTION__ 函数名称
- __ CLASS__    类的名称
- __ TRAIT__    实现代码复用的一个方法. 用于实现多继承关键字
```
	PHP中的Traits用法详解 
	https://www.cnblogs.com/phpper/p/8978098.html
	<?php
		trait Drive {
		    public $carName = 'BMW';
		    public function driving() {
		        echo "driving {$this->carName}\n";
		    }
		}
		class Person {
		    public function age() {
		        echo "i am 18 years old\n";
		    }
		}
		class Student extends Person {
		    use Drive;
		    public function study() {
		        echo "Learn to drive \n";
		    }
		}
		$student = new Student();
		$student->study();
		$student->age();
		$student->driving();
	?>
```
- __ METHOD__   类的方法名
- __ NAMESPACE__ 当前命名空间的名称

###  魔术方法
```
	php 十六个魔术方法详解
	https://segmentfault.com/a/1190000007250604

```

- __construct()，类的构造函数
- __destruct()，类的析构函数
- __call()，在对象中调用一个不可访问方法时调用
- __callStatic()，用静态方式中调用一个不可访问方法时调用
- __get()，获得一个类的成员变量时调用
- __set()，设置一个类的成员变量时调用
- __isset()，当对不可访问属性调用isset()或empty()时调用
- __unset()，当对不可访问属性调用unset()时被调用。
- __sleep()，执行serialize()时，先会调用这个函数
- __wakeup()，执行unserialize()时，先会调用这个函数
- __toString()，类被当成字符串时的回应方法
- __invoke()，调用函数的方式调用一个对象时的回应方法
- __set_state()，调用var_export()导出类时，此静态方法会被调用。
- __clone()，当对象复制完成时调用
- __autoload()，尝试加载未定义的类
- __debugInfo()，打印所需调试信息

### php 其他函数
- ceil()  向上舍入为最接近的整数。
- floor() 向下舍入为最接近的整数
- round() 对浮点数进行四舍五入


###  PHP PSR 标准规范

- https://learnku.com/docs/psr


# javaScript
## 运算
- 平方    x**y/math.pow(x,y)
- 开平方  Math.sqrt( x ) ;

# linux 

1. |  叫管道du符号。

	管道命令符的作用能用zhi一句话来概括：“dao把前一个命令原本要zhuan输出到屏幕的数据shu当作是后一个命令的标准输入

2.  部署
```
	/usr/local/php/bin/php /opt/modules/cachetool/cachetool.phar opcache:reset --fcgi=127.0.0.1:9000 

```



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

- .打开计算器
	calc
- 查看是否配置cdn  
	nslookup  域名


# yii2 框架

Yii 是一个高性能，基于组件的 PHP 框架，用于快速开发现代 Web 应用程序。 (极致简单与不断演变)


## 自动生成代码 
- 入口地址 域名 + /index.php/gii  例如:local-backend.zhibo.tv/index.php/gii
- Yii2.0 Gii工具的使用   https://blog.csdn.net/hanyunpiaoyu/article/details/78070087

# 网络
## Tcp 

## udp



# 工具快捷键

## phpStorm
- 大小写切换： ctrl+shift+u
- 格式化代码： ctrl+alt+l
- 自动代码提示，补全:ctrl+j 
- 鼠标跳转到某一行： ctrl+g
- 查找类: ctrl+n
- 在当前窗口查找文本: ctrl+f
- 当前窗口替换文本: ctrl+r
- 全局搜索文件 ,优先文件名匹配的文件: ctrl+shift+n 
- 找变量的来源，跳到变量申明处 (ctrl+ 鼠标单击 也可以): cirl+b 
- 找到继承该接口或者父级 的所有子类, 统计	
​​​​

## sublimeText
1. alt + m  使.md文件直接在浏览器中预览生成的html文件
2. ctrl + ku    改为大写
3. ctrl + kl    改为小写



# 常用工具
1. 流程图绘制工具 : https://processon.com/
2. 代码管理工具 : gitLab
3. 远程工具 : 向日葵
4. 运维自动化: jenkins 
```
	构建项目
	https://www.cnblogs.com/yingjiyu/p/12297322.html
	戏子的运维笔记
	https://www.kancloud.cn/yjscloud/linux/726344
	Jenkins详细教程
	https://www.jianshu.com/p/5f671aca2b5a

```
5. 接口文档工具: yapi
6. xshell
7. 代码提交工具 :  git + svn
8. 阿里云 (服务器 + 数据库 + redis + elasticsearch  +oss + 负载均衡 + cdn + 日志服务)

## CDN 

```
    原理 CDN加速原理
	https://blog.csdn.net/yicaifenchen8/article/details/104064263
```
- 定义
- 操作
- 指标
- 流程

