头条中添加 投票


1. 头条详情   展示
2. 体育圈     发布投票
3.  pc发布头条时   新增发布投票
4.  pc发布帖子时   新增发布投票

分享后的 头条和帖子

Zhao1234

 ZHAOhongyan0.



 新后台新增

 投票 
 体育圈 => 投票贴统计

投票表
 id 
 title
  end_time
 select  单选   多选
 status 未结束  已结束
 jion人
 实际_jion_人

 create_time
 update_time






问题: 
1. 投票记录在哪个位置
后台添加修改的票数

后台: 
面审名单中  发头条

投票详情展示接口
投票接口


新后台 - 新增投票管理模块, 功能: 
1.按开始和结束时间/头条id和标题/状态/单选/查询并导出数据
2.查看 
3.修改票数
4.查看投票记录


投票记录 查询和导出功能


发布头条     
发布帖子   
帖子详情  
头条详情
分享出帖子
分享出的头条  


PC - 发布头条
https://www.zhibo.tv/profile/addarticle
PC - 发布帖子
https://www.zhibo.tv/profile/34723990
13664769063

actionAdd


发布帖子

帖子详情 (需要增加  版本判断)
http://t100-sports-group.zhibo.tv/post/detail?sort=time_asc&bbsId=415&token=36fee6c61e29ea7326f12c91fb2930e6*6339507&statistics=android%7Csecalive-xiaomi%7C1.0%7C67391b31a7d589df%7C10%7C%7CWIFI%7C5.1.1%7C
对应接口文档: sports-group.zhibo.tv 下体育圈=>帖子详情

帖子分享页
http://t100-sports-group.zhibo.tv/pc-bbs/get-bbs-detail?bbsId=415

发布头条

头条详情
http://t100-dongtai.zhibo.tv/dong-tai-message/article-detail?isnewstyle=1&os=Android+10&msgid=747371&equipment=1&version=5112020&aid=67391b31a7d589df&token=36fee6c61e29ea7326f12c91fb2930e6*6339507
对应的接口文档 是 rest.zhibo.tv 下头条=>头条详情

头条页分享
https://dongtai.zhibo.tv/dong-tai-message/article-detail?msgid=747371



pc端 发帖
AddForPc
移动端 发帖
Add



REST_URL . "/dong-tai-message/add-article"

actionSendArticleNew



数据结构
voteInfo
{
    "voteStatus": 0,
    "voteSelection": [
        {
            "id": "262",
            "value": "超赞",
            "isChoose": 0,
            "voteResult": 0
        },
        {
            "id": "263",
            "value": "还可以奥",
            "isChoose": 0,
            "voteResult": 0
        },
        {
            "id": "264",
            "value": "一般般",
            "isChoose": 0,
            "voteResult": 0
        }
    ],
    "selectionMode": "1",
    "voteEndTime": "2020年12月08日投票结束",
    "voteNum": "0人参与投票",
    "status": 0
}

第一步 (体育圈) 发帖子

POST /post/check-exemption
POST /post/add

第二步 (体育圈) 帖子列表
GET /community/bbs-info-bbs-list?roomnum=140&name=140&pageSize=10&id=140&page=1&token=72eff21d88879ac5e7429970aede1d68*4469793&statistics=android%7Csecalive-xiaomi%7C1.0%7C67391b31a7d589df%7C10%7C%7CWIFI%7C5.1.3%7C&sid=140

第三步 (体育圈) 帖子详情
POST /post/detail-v510

第四步 (体育圈) 投票
/post/vote?selectionId=259&bbsId=11047&token=72eff21d88879ac5e7429970aede1d68*4469793&statistics=android%7Csecalive-xiaomi%7C1.0%7C67391b31a7d589df%7C10%7C%7CWIFI%7C5.1.3%7C 

第五步 返回详情,更新选项为结果,结束






feature/5.2.0-vote-module


发布头条
https://t100-rest.zhibo.tv/dong-tai-message/add-article

http://192.168.2.248:3000/project/10/interface/api/2960

头条详情和分享头条 
http://t100-dongtai.zhibo.tv/dong-tai-message/article-detail?isnewstyle=1&os=Android+10&msgid=747371&equipment=1&version=5112020&aid=67391b31a7d589df&token=36fee6c61e29ea7326f12c91fb2930e6*6339507

http://192.168.2.248:3000/project/10/interface/api/560

发布帖子(pc)
https://t100-sports-group.zhibo.tv/post/add-for-pc

http://192.168.2.248:3000/project/12/interface/api/2942
发布帖子(两端)
https://t100-sports-group.zhibo.tv/post/add

http://192.168.2.248:3000/project/12/interface/api/2951

13664769063

hsetnx

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



/backend/discover/edit/id/952816


   header('Location: '.$url);
重定向到后面的url地址，一个内部跳转


ALTER TABLE `dongtai`.`b8_dongtai_message` 
ADD COLUMN `is_vote` tinyint(1) NOT NULL COMMENT '是否有投票 0-无，1-有' AFTER `pass_time`;


pc端发帖入口
https://t100-sports-group.zhibo.tv/pc-bbs/send-bbs



发帖: 
1. pc发帖     addforpc   ok 
2. 移动端发帖   版本号    ok 根据版本号判断

3. pc发头条
4. 投票
5. pc编辑头条

6. 头条详情ok
7. 帖子详情ok 

通过id获取的数组      用queryOne()
通过条件查询获取数组   用query()

后台统计 ok


# 表
#### 头条免审名单表
CREATE TABLE `dongtai`.`b8_dongtai_message_no_apply`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '头条免审名单',
  `user_id` int(11) COMMENT '用户id',
  `room_num` int(11) COMMENT '用户房间号',
  `user_name` varchar(150) COMMENT '用户昵称',
  `is_vote` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否可以发投票 1可以0不可以',
  `create_time` bigint(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` bigint(11) NOT NULL DEFAULT 0 COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uid_room`(`user_id`, `room_num`) USING BTREE COMMENT '联合索引'
);

#### 投票表
ALTER TABLE `sports_group`.`b8_vote_post` 
MODIFY COLUMN `bbs_id` int(11) NOT NULL DEFAULT 0 COMMENT '资源id' AFTER `id`,
ADD COLUMN `vote_end_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '投票结束时间' AFTER `create_time`,
ADD COLUMN `vote_type` int(4) NOT NULL DEFAULT 4000 COMMENT '投票类型' AFTER `vote_end_time`;
ADD COLUMN `vote_title` varchar(255) NOT NULL DEFAULT '' COMMENT '投票标题' AFTER `vote_type`;
ADD COLUMN `is_vote` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否展示投票 0 展示 1不展示' AFTER `vote_title`;

#### 投票记录表
ALTER TABLE `sports_group`.`b8_vote_post_log`
ADD COLUMN `vote_type` int(4) NOT NULL DEFAULT 4000 COMMENT '投票类型' AFTER `create_time`;

     * @Author <zhaohongyan@zhibo.tv>
     * @Date <2020-12-18>
     * @Since version 5.2.0


2020年12月08日投票结束  需要改


/profile/sendArticleNew 
/profile/addarticle


$noApply = DongTaiMessageService::self()->getDongtaiNoApply($user[0]["user_id"]);
            if(!isset($noApply['is_vote']) || !$noApply['is_vote']){
                $ret = [
                    "status"=>-1,
                    "data"=>"抱歉，您暂无发布投票的权限！"
                ];
                echo json_encode($ret);exit;
            }





1. 帖子新增投票(pc,app)    => ok
2. 帖子详情               => ok
3. 投票                   => ok
4. 头条新增投票(pc)       
5. 头条修改投票(老后台)
6. 头条详情               =>ok

is_vote 默认值为1 



 /**
     * 投票参数处理
     * @param $param
     * @return array
     * @Author <zhaohongyan@zhibo.tv>
     */
    private function dealVoteParam($voteType,$userInfo,$isEdit=true)
    {
        $selections = ComHelper::fString('selections');
        $voteTitle   = ComHelper::fString('voteTitle');
        $voteEndTime = strtotime(ComHelper::fInt('voteEndTime'));
        $selectionMode = ComHelper::fInt('selectionMode');
        $isVote = ComHelper::fInt('isVote');
        $selectionArr = explode(',',$selections);
        if($isEdit){
            $noApply = DongTaiMessageService::self()->getDongtaiNoApply($userInfo["userId"]);
            if(!isset($noApply['is_vote']) || !$noApply['is_vote']){
                ComHelper::returnJson('',-1,'抱歉，您暂无发布投票的权限！');
            }
        }
        if (!$voteTitle) {
            ComHelper::returnJson('',-1,'投票标题不能为空');
        }
        if ($voteEndTime - time() < BbsService::ONE_HOUR) {
            ComHelper::returnJson('',-1, '投票结束时间至少比发布时间晚一小时');
        }
        if (!(count($selectionArr) >= 2 && count($selectionArr) <= 8)) {
            ComHelper::returnJson('',-1, '至少包含两个选项,至多包含八个选项');
        }
        return [
            'token' => $userInfo["userToken"].'*'.$userInfo['userId'],
            'selections' => $selections,
            'selectionMode' => $selectionMode,
            'voteEndTime' => $voteEndTime,
            'voteType' => $voteType,
            'voteTitle' => $voteTitle,
            'isVote' => $isVote,
        ];
    }

    投票详情
    http://192.168.2.248:3000/project/12/interface/api/3014
    投票
    http://192.168.2.248:3000/project/12/interface/api/225





头条新增流程
1. 检查token , 看主播是否存在
2. 检查主播状态, 是否可以发头条 (没有被封杀,房间号正常) ifkill不能0   roomStatus = 



新增之前加一个资源查询, 如果已经有了,就不新增了


# 表
#### 头条免审名单表


CREATE TABLE `dongtai`.`b8_dongtai_message_no_apply`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '头条免审名单',
  `user_id` int(11) COMMENT '用户id',
  `room_num` int(11) COMMENT '用户房间号',
  `user_name` varchar(150) COMMENT '用户昵称',
  `is_vote` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否可以发投票 1可以0不可以',
  `create_time` bigint(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` bigint(11) NOT NULL DEFAULT 0 COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uid_room`(`user_id`, `room_num`) USING BTREE COMMENT '联合索引'
);


ALTER TABLE `sports_group`.`b8_vote_post` 
ADD COLUMN `vote_title` varchar(255) NOT NULL DEFAULT '' COMMENT '投票标题' AFTER `vote_type`;
ADD COLUMN `is_vote` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否展示投票 0 展示 1不展示' AFTER `vote_title`;

ALTER TABLE `sports_group`.`b8_vote_post_log`
ADD COLUMN `vote_type` int(4) NOT NULL DEFAULT 4000 COMMENT '投票类型' AFTER `create_time`;


    投票详情
    http://192.168.2.248:3000/project/12/interface/api/3014
    投票
    http://192.168.2.248:3000/project/12/interface/api/225 这是头条投票,你有时间把你的调用的假接口信息去掉就行