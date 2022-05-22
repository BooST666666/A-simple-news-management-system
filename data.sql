/*
MySQL Backup
Database: news
Backup Time: 2022-05-21 20:56:56
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `news`.`admin`;
DROP TABLE IF EXISTS `news`.`cartoon`;
DROP TABLE IF EXISTS `news`.`economics`;
DROP TABLE IF EXISTS `news`.`music`;
DROP TABLE IF EXISTS `news`.`review`;
DROP TABLE IF EXISTS `news`.`science`;
DROP TABLE IF EXISTS `news`.`sport`;
DROP TABLE IF EXISTS `news`.`users`;

CREATE Database news;
use news;

CREATE TABLE `admin` (
  `admin_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `apassword` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
CREATE TABLE `cartoon` (
  `news_id` int(10) NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `catagory_id` varchar(6) NOT NULL,
  `title` text NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `economics` (
  `news_id` int(10) NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `catagory_id` varchar(6) NOT NULL,
  `title` text NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `music` (
  `news_id` int(10) NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `catagory_id` varchar(6) NOT NULL,
  `title` text NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `review` (
  `review_qu` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `publish_time` datetime NOT NULL,
  `state` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `FK_review_users` (`user_id`) USING BTREE,
  KEY `FK_review_news` (`news_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
CREATE TABLE `science` (
  `news_id` int(10) NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `catagory_id` varchar(6) NOT NULL,
  `title` text NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `sport` (
  `news_id` int(10) NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `catagory_id` varchar(6) NOT NULL,
  `title` text NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `users` (
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
BEGIN;
LOCK TABLES `news`.`admin` WRITE;
DELETE FROM `news`.`admin`;
INSERT INTO `news`.`admin` (`admin_id`,`apassword`,`admin`) VALUES ('66', 'low666666', 'admin');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`cartoon` WRITE;
DELETE FROM `news`.`cartoon`;
INSERT INTO `news`.`cartoon` (`news_id`,`admin_id`,`catagory_id`,`title`,`picture`,`content`,`publish_time`,`address`) VALUES (1, '66', '动漫', '《关于我被绑架到大小姐学校当庶民样本这件事》番剧推荐', 'image/cartoon/1_1653120555348.jpg', '《关于我被绑架到大小姐学校当庶民样本这件事》（日语：俺がお嬢様学校に「庶民サンプル」として拉致られた件，台译：我被绑架到贵族女校当“庶民样本”）是由七月隆文创作，闰月戈负责插画的一部轻小说，并有漫画、电视动画等衍生作品。剧情：出身普通、学业普通、性格普通、运动普通、就读于普通高中的普通高中生神乐坂公人，某天早上突然在学校里被绑架了，绑架他的人居然是来自清华院女子学院这个名字超厉害的好不好[1]这个不为外人所知的大小姐学校。\r\n\r\n原来，在这个学院里就读的都是来自日本各地豪门的大小姐，她们从小到大从未接触过外界事物和男性，对庶民的生活有着无限的好奇心。为了让她们在毕业后能够融入社会，学院决定从外界选择一个“庶民样本”与她们一起生活学习，阴差阳错之下神乐坂公人被认定为喜欢肌肉男的同性恋普通高中生，因而被选中来到这个学校。\r\n\r\n庶民（城里人）与大小姐们（村里人）的生活就这样开始了。---来源于萌娘百科网', '2022-05-21 16:12:08', 'cartoon_content.php?news_id= '),(2, '66', '动漫', '《青春猪头少年不会梦到怀梦美少女》番剧推荐', 'image/cartoon/2_1653130180374.jpg', '《青春猪头少年不会梦到怀梦美少女》（日语：青春ブタ野郎はゆめみる少女の夢を見ない）是由鸭志田一原作、沟口凯吉插画的轻小说《青春猪头少年系列》第6、7卷改编的剧场版动画。2019年6月15日在日本上映。剧情：住在天空与海洋辉映的城镇“藤泽”的梓川咲太，就读高中二年级。\r\n他与既是学姐又是恋人的樱岛麻衣所度过的令人雀跃的日常，随着初恋对象牧之原翔子的出现而改变。\r\n不知为何，存在着“中学生”和“大人”两个翔子。\r\n出于无奈开始和翔子住在一起的咲太，受到“大人翔子”的捉弄，和麻衣的关系也变得尴尬。\r\n此时，“中学生翔子”身患重病的事实被发现，咲太的伤痕开始隐隐作痛——。', '2022-05-21 18:51:04', 'cartoon_content.php?news_id= '),(3, '66', '动漫', '《间谍过家家》番剧推荐', 'image/cartoon/3_1653133546351.jpg', '《间谍过家家》（英语：SPY×FAMILY；日语：スパイファミリー）是远藤达哉连载的漫画，并有动画、小说、音乐剧等衍生作品。剧情：干练间谍〈黄昏〉奉命组成「家庭」，以便潜入名校。\r\n然而他所找到的「女儿」是会读心的超能力者！ 「妻子」是暗杀者？\r\n互相隐瞒真实身份的临时家庭，挺身对抗考试与世界危机的痛快家庭喜剧！', '2022-05-21 19:47:28', 'cartoon_content.php?news_id= ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`economics` WRITE;
DELETE FROM `news`.`economics`;
INSERT INTO `news`.`economics` (`news_id`,`admin_id`,`catagory_id`,`title`,`picture`,`content`,`publish_time`,`address`) VALUES (1, '66', '经济', '显卡疯狂降价 矿卡横行的当下千万别傻乎乎地跳坑了！', 'image/economics/1_显卡.jpg', '最近显卡价格狂降，不知道你是否蠢蠢欲动了呢？当然这两年厂商们已经通过矿潮赚的盆满钵满，可惜贪心永无止境，在显卡回归原价和破发道路上，依旧有不少人在为小白们埋下一个一个深坑。前段时间显卡价格暴涨，商家会时不时举办促销或者原价抢购活动，但并不是所有促销就都是降价，也不是所有预约抢购都是回归原价。下面两款型号就是非常典型的案例，这两款显卡都是在同一天截的图。\r\n\r\n上面促销的RTX 3070价格4799元，与RTX 3070显卡原价3899元，还有很大差距。而下面日常售价的RTX 3070Ti算上满减到手4679元，反而更接近RTX 3070Ti原价4499元，甚至比上面促销的RTX 3070更便宜。而RTX 3070Ti性能还更强，比RTX 3070在3DMARK综合成绩提升约为8%。这种时候买上面促销的RTX 3070，真是太怨了。\r\n\r\n真正回归原价的显卡其实很少，价格跌的最快的也是偏冷门的型号，那些消费主力型号的价格距离原价依旧有不少差距，购买务必谨慎，促销抢购都要确认好价格再行动。当然除了各种涨价促销外，这个时间点最可怕的就是遇到各种锻炼后的显卡，前段时间某品牌回流显卡被查获，加上近期不少人遭遇过官方店买到矿卡的情况，让不少官方品牌也变得不可信起来。', '2022-05-21 15:49:17', 'economics_content.php?news_id= '),(2, '66', '经济', '美“荔”乡村迎丰收', 'image/economics/2_1128665138_16529451279111n.jpg', '5月19日，海南省澄迈县大丰镇的农民把刚采摘的荔枝装车，准备运往收购点。\r\n\r\n　　初夏时节，海南省澄迈县大丰镇的荔枝迎来丰收。目前，大丰镇种植妃子笑荔枝2000多亩，已形成颇具规模的荔枝产业集群。从生产、包装、销售，到开展荔枝为主题的乡村采摘游，大丰镇都已形成较完整的产业链，荔枝逐渐成为带动当地荔农增收致富的重要产业。\r\n---新华社记者 郭程 摄', '2022-05-21 19:29:15', 'economics_content.php?news_id= '),(3, '66', '经济', '罕见！特斯拉大多头倒戈 下调目标价近30%！', 'image/economics/3_u=2760667962,2559933177&fm=253&fmt=auto&app=138&f=JPEG.jpg', '罕见！特斯拉大多头倒戈 下调目标价近30%！“牛散”呼吁公司回购150亿美元。在股价持续下跌之际，特斯拉大多头突然倒戈。\r\n\r\n　　当地时间5月19日，华尔街投行Wedbush分析师Dan Ives将特斯拉目标价从1400美元下调至1000美元，下调幅度近30%。\r\n\r\n　　据数据，特斯拉股价4月5日盘中触及1152.87美元的阶段高点后便持续下跌，至今32个交易日内累计跌超38%，期间总市值蒸发4517.27亿美元，约合人民币30229亿元。\r\n\r\n　　对此，被称为特斯拉“最牛散户”的亿万富翁Leo Koguan(廖凯原)呼吁，希望特斯拉宣布总额150亿美元的股票回购计划，以拯救下跌的股价。\r\n\r\n　　特斯拉大多头大幅下调目标价\r\n\r\n　　对于下调目标价，Dan Ives给出的理由是，公司正面临疫情导致的更多生产放缓和供应链瓶颈。此外，马斯克对推特的收购是特斯拉股价的另一个潜在不利因素。\r\n\r\n　　不过，整体而言，Dan Ives仍看好这家电动汽车制造商的长期前景，因为奥斯汀和柏林的新工厂将推动特斯拉未来的增长。只不过，Dan Ives承认，“在不稳定的宏观背景下，特斯拉面临着诸多阻力”。\r\n\r\n　　记者梳理发现，就在一周前(当地时间5月13日)，Dan Ives表示，马斯克搁置推特交易对特斯拉股价有利，重申特斯拉“强于大盘”评级，目标价1400美元。\r\n\r\n　　Dan Ives今年1月份预测特斯拉在2022年的交付量将超过100万辆，“如果全球电动汽车需求仍能保持目前的增速，那么在十年内，特斯拉每年的交付量将能达到500万辆”。\r\n\r\n　　股价跌近四成\r\n\r\n　　事实上，在Dan Ives下调特斯拉目标价之前，特斯拉股价已经跌跌不休。\r\n\r\n　　据数据，特斯拉股价4月5日盘中触及1152.87美元的阶段高点后便持续下跌，至今32个交易日内累计跌超38%，期间总市值蒸发4517.27亿美元，约合人民币30229亿元。\r\n\r\n　　随着股价不断回调，被称为特斯拉“最牛散户”的亿万富翁Leo Koguan(廖凯原)当地时间5月19日在社交平台上呼吁，鉴于公司股价持续下跌，特斯拉应立即宣布回购150亿美元股票的计划。廖凯原还表示，特斯拉应使用其自由现金流为回购投入资金，从而避免动用公司现有的180亿美元现金储备。\r\n\r\n　　据媒体报道，廖凯原在新冠疫情暴发初期就大手笔押注特斯拉，通过做多赚了数十亿美元。但因为持股比例没有达到5%，廖凯原具体的持股数量和持股比例不需要对外公开。\r\n\r\n　　分析人士称，廖凯原并非特斯拉董事会成员，因此他能在多大程度上影响公司的决策仍有待观察。\r\n\r\n　　马斯克：无时无刻不想着特斯拉\r\n\r\n　　值得一提的是，特斯拉股价急跌的这段时间，正是马斯克高调收购推特的时间段。\r\n\r\n　　有网友在社交平台发声质疑马斯克是否因为推特而分心。马斯克当地时间5月19日在社交平台发文回应称，“我只花了不到5%的时间在收购推特上”“我无时无刻不在想着特斯拉”。\r\n\r\n　　据悉，马斯克日前称由于推特的虚假账户数目存疑，因此暂缓收购计划。马斯克表示，估计推特虚假账户占总体用户比例达到10%至15%，而不是公司声称的少于5%。\r\n\r\n　　对此，推特首席律师兼政策主管Vijaya Gadde当地时间5月19日说，与马斯克的440亿美元交易正在按计划推进，“不存在交易被搁置这回事”，且推特不会重新谈判商定的每股54.20美元的价格。---摘要于中国证券报', '2022-05-21 19:44:27', 'economics_content.php?news_id= ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`music` WRITE;
DELETE FROM `news`.`music`;
INSERT INTO `news`.`music` (`news_id`,`admin_id`,`catagory_id`,`title`,`picture`,`content`,`publish_time`,`address`) VALUES (1, '66', '音乐', '《プラスティック・ラブ 》（塑料般的爱）---city pop的神', 'image/music/1_plastic love.jpg', 'Plastic Love，即塑料般的爱情。 プラスティック・ラヴ是这首歌的原版，即日文版。 由日本女歌手竹内玛莉亚演唱。 我第一次听到它的前奏时，一下子就被吸引了，嗯是我想要听的歌的（已经单曲循环了好几天） 这是一首被爱伤过后游玩在情场中却又在寻找真爱的女子自嘲的歌。 结束完一整天的工作后，带着满身的疲倦在公交车上独自听这首歌，在浓重的夜色烘托下有种莫名的情感一点一点的涌上心头。 下意识地向车窗外眺望这个城市的夜景，却也只是徒增寂寞。明明窗外的霓虹灯那么热闹夺目，自己却始终无法被这热闹拥怀，只会增加虚无感。 渐渐地沉沦在这首歌所创造的意境中。 2. 这首歌当时的时代背景，正处于日本泡沫经济时代最巅峰的时期，在广场协议后，泡沫破灭。 而那时经济的迅速飞升给日本人民带来的生活上的翻天覆地的改变，随之还有观念的开放。几乎人人都富裕有余，甚至能在垃圾场找到一部能用的电脑。 音乐渐渐走向迷幻的风格，虚无缥缈。 在了解结合了这个背景之后，再细品，嘲讽的味道更加了。 而这首歌的歌词内容，无论放在哪个时代都不过时。 再高贵气派的服装、再漂亮的高跟鞋，即使拥有再多也只是寂寞的伙伴。 3. 距离这首歌发行的三十五年后，官方决定为“Plastic love”即塑料般的爱补拍MV。 并在去年5月16日发布了1分50秒的先行版MV。 个人感觉来说，我觉得可以哦，挺符合我对这首歌的想象。 仿复古的拍摄手法，暧昧的色调，没有对话，只有简单的眼神交流便叫人遐想连篇。\r\n', '2022-05-21 19:24:37', 'music_content.php?news_id= '),(2, '66', '音乐', '《Machi No Dorufin》---品味盛夏的风情', 'image/music/2_1277595749.jpg', '标准的city pop的感觉 专辑1982的日本夏天和哥们儿们在热闹的东京一起嗨皮，牛仔裤加阳帽，没有奶茶的油腻和商业区的死板的游览模式，清凉的矿泉水和街机厅，到了晚上在最爱的料理店和哥们儿们吃饭，回去的路上去海边看看东京美丽的夜景', '2022-05-21 19:26:22', 'music_content.php?news_id= '),(3, '66', '音乐', '《So Cute~ 》---蒸汽波毫不逊色', 'image/music/3_1722267482.jpg', 'So Cute~ 出自于音乐人Lopu$之手，采样于当山瞳-Cathy,该歌曲听而不腻，充满80年代日本泡沫经济感觉，复古动感，舒缓流畅，有水汽弥蒙之感。', '2022-05-21 19:38:27', 'music_content.php?news_id= ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`review` WRITE;
DELETE FROM `news`.`review`;
INSERT INTO `news`.`review` (`review_qu`,`user_id`,`user_name`,`news_id`,`content`,`publish_time`,`state`,`ip`) VALUES ('音乐', 'BooST66', 'BooST66', 1, '词曲是玛利亚自己，编曲制作是丈夫達郎', '2022-05-21 20:44:21', '已审核', '::1'),('音乐', 'BooST66', 'BooST66', 1, '这首歌的听歌在这：https://music.163.com/#/song?id=659423，竹内玛利亚yyds', '2022-05-21 20:11:32', '已审核', '::1');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`science` WRITE;
DELETE FROM `news`.`science`;
INSERT INTO `news`.`science` (`news_id`,`admin_id`,`catagory_id`,`title`,`picture`,`content`,`publish_time`,`address`) VALUES (1, '66', '科技', '我国成功发射3颗低轨通信试验卫星', 'image/science/1_fei.jpg', '北京时间2022年5月20日18时30分，我国在酒泉卫星发射中心使用长征二号丙运载火箭，采取一箭三星方式，成功将3颗低轨通信试验卫星发射升空。卫星顺利进入预定轨道，发射任务获得圆满成功。该低轨通信试验卫星主要用于开展在轨通信技术试验验证。\r\n\r\n　　此次任务是长征系列运载火箭第421次飞行。---来源央视网', '2022-05-21 16:03:40', 'science_content.php?news_id= '),(2, '66', '科技', '习近平时间｜为人类健康命运共同体筑起免疫长城', 'image/science/2_e21367909aa84c33881919010e321245.jpg', '2021年5月21日，习近平主席以视频方式在全球健康峰会上发表重要讲话强调，中国坚定不移推进抗疫国际合作，共同推动构建人类卫生健康共同体。新冠肺炎疫情发生以来，中国以“天下一家”的情怀、“生命至上”的理念，同世界各国守望相助、携手抗疫，为构筑人类健康命运共同体作出积极贡献。---摘要：中国科技网首页', '2022-05-21 19:32:22', 'science_content.php?news_id= '),(3, '66', '科技', '上海金山：两大特色产业园规上企业100%复工', 'image/science/3_be8df8b26aec48c79b955ad749411c43.jpg', '记者从上海市金山区经济委员会获悉，金山区汽车零部件、中央厨房两个特色产业园区有序复工，其中87家规模以上工业企业100%复工，企业产能已恢复到疫情前产能60%以上。\r\n\r\n作为金山区廊下镇“中央厨房”龙头企业，上海鑫博海农副产品加工有限公司目前每天要发出70余辆冷链物流汽车，为上海市内130余家食堂网点，以及全市多个方舱医院、便利店配送近20万份餐食。目前，企业员工已100%到岗，各岗位员工错时生产，企业机器24小时运转，各项工作井然有序。\r\n\r\n“中央厨房”特色产业园的另一家龙头企业——上海稻咏食品有限公司主要服务餐饮门店，此前经历了较长时间的停工停产。公司负责人张礼平介绍，近期随着复工复产复商复市的稳步推进，市商业网点陆续恢复营业，公司逐步恢复生产。“一方面，我们积极和当地的农业合作社联系，尽量做到源头采购廊下的绿色蔬菜、蘑菇、番茄等时令蔬果，减少物流运输成本，同时在区经委和廊下镇的帮助下，也办理了6张跨省通行证。目前，我们公司的产能已经恢复到50%以上。”\r\n\r\n截至目前，金山区廊下镇工业园区规上企业38家已实现100%复工，全镇企业复工复产审批通过率73.1%，复工企业在册员工返岗率64.25%。为了加强管理，廊下镇网格化管理工业区企业，企业提交复工申请后，在相关部门实地前置审核通过的前提下，第二天即可复工复产，复工后有专人督查指导企业每日做好防疫工作。\r\n\r\n与廊下镇毗邻的吕巷镇的汽车零部件特色产业园也一派繁忙。在吕巷汽车零部件有限公司厂区，几名运输工人驾驶叉车往来于机械加工车间和抛光车间，整个厂区秩序井然。该公司总经理夏益锋介绍，汽车行业涉及100多个上下游产业，少了哪个环节生产都会中断。随着园区内其他上下游汽车零配件供应商企业陆续复工，公司产能在稳步恢复。\r\n\r\n金山区经委经济运行科科长崔怀芳介绍，处于同一园区内的慧敏汽车配件、慧嵘五金配件、辉碟车镜、派休精密机械、韧恒电子等汽车零部件上下游企业同步复工，产业链区内循环的态势更加明显。\r\n\r\n---摘要于中国科技网', '2022-05-21 19:41:03', 'science_content.php?news_id= ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`sport` WRITE;
DELETE FROM `news`.`sport`;
INSERT INTO `news`.`sport` (`news_id`,`admin_id`,`catagory_id`,`title`,`picture`,`content`,`publish_time`,`address`) VALUES (1, 'sport部', '体育', '库里：佩顿本有机会大放异彩！狄龙的犯规太不应该了', 'image/sport/curry.png', '直播吧5月4日讯 \r\n今日NBA西部半决赛G2，勇士客场101-106不敌灰熊，双方总比分1比1打平。\r\n勇士球星库里赛后接受了采访。   \r\n谈到狄龙-布鲁克斯今日对佩顿的恶意犯规，\r\n库里说道：“当一位球员在完成上篮终结时，防守者做出这种动作只能用出格来形容。在那种情况下，可能发生的一切糟糕事情都发生了，狄龙让佩顿退出了比赛。”  “佩顿正要在这样的一轮系列赛中大放异彩，然后就发生了这种事。我为他感到非常难过。”  本场比赛，库里出战39分钟，25投11中，三分11中3，罚球2中2，砍下27分9板8助1断，但出现了5次失误。  （最佳第十五人）', '2022-05-07 13:20:34', 'sport_content.php?news_id= '),(2, '66', '体育', '库里：这场开局不利 胜利来得颇为不易', 'image/sport/2_2.jpg', '北京时间5月21日，西部决赛G2，勇士在一度落后19分的情况下，最终126-117逆转独行侠，将系列赛大比分改写为2-0。\r\n\r\n独行侠开局就打出了10-2的攻势，首节打完领先7分，半场战罢三分球27投15中，将领先优势扩大到了14分。\r\n\r\n“对手显然是有备而来的，他们在上半场重重地给了我们一拳，把我们打得晕头转向。中场休息时，我提醒球员们一定要冷静，只有冷静下来我们才能寻找到对手的破绽，才能有机会完成翻盘。”勇士主帅科尔赛后说。\r\n\r\n勇士在下半场确实找到了独行侠的破绽。见对手重点封锁外线，他们主攻内线，鲁尼第三节独取11分，全场斩获生涯新高的21分。末节比赛，鲁尼甚至收获了现场球迷MVP的呼声。\r\n\r\n“说真的，这让我有点受宠若惊，但我心里一直知道，湾区的球迷们非常宠爱我，他们给了我无穷的动力，让我总是想在场上毫无保留，拼尽全力。”鲁尼赛后说。\r\n\r\n三节打完，勇士将分差迫近至2分，末节他们再次掀起反击攻势，库里终场前1分钟的三分帮助勇士取得了两位数的领先，就此锁定胜局。全场战罢，库里21投11中，三分球10中6，轰下了32分8篮板5助攻。\r\n\r\n“这是一场充满戏剧性的比赛，我们在开局不利的情况下依然坚持比赛计划，没有人动摇，也没有人轻易放弃，这样的坚持给了我们回报，我们收获了一场非常艰难的胜利。”库里赛后说。', '2022-05-21 16:16:55', 'sport_content.php?news_id= '),(3, '66', '体育', '东契奇空砍42+8 勇士19分逆转独行侠2-0', 'image/sport/3_GettyImages-1398406112(1).jpg', '北京时间5月21日，NBA季后赛继续进行，金州勇士主场迎战独行侠，独行侠上半场飙进15记三分，最多领先达到19分；勇士从第三节掀起绝地反击，并在末节实现反超。此后勇士掌控着场上节奏，一度领先达到10分，最终126-117逆转独行侠，总比分2-0领先。全场比赛，勇士内线得分高达62分，独行侠仅有28分。\r\n\r\n勇士方面，库里32分8个篮板，普尔23分，卢尼21分12个篮板（得分生涯新高）；\r\n\r\n独行侠方面，东契奇42分5个篮板8次助攻，布伦森31分7个篮板5次助攻，布洛克21分。', '2022-05-21 16:20:16', 'sport_content.php?news_id= ');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `news`.`users` WRITE;
DELETE FROM `news`.`users`;
INSERT INTO `news`.`users` (`user_id`,`password`,`name`) VALUES ('BooST66', 'low666666', 'BooST66');
UNLOCK TABLES;
COMMIT;
