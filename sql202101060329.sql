create table movie
(
	movie_id varchar(255) not null,
	movie_info LONGTEXT not null,
	primary key(movie_id)
);
create table theater
(
	theater_id varchar(255) not null,
	theater_info LONGTEXT not null,
	primary key(theater_id)
);
create table the_user
(
	user_id varchar(255) not null,
	password_hash varchar(255) not null,
	money int,
	primary key(user_id)
);

create table a_show
(
	show_id varchar(255) not null,
	movie_id varchar(255) not null,
	theater_id varchar(255) not null,
	location varchar(255) not null,
	start_time varchar(255) not null,
	end_time varchar(255) not null,
	foreign key(movie_id) references movie(movie_id) on delete no action,
	foreign key(theater_id) references theater(theater_id) on delete no action,
	primary key(show_id)
);
create table seat
(
	seat_id varchar(255) not null,
	show_id varchar(255) not null,
	user_id varchar(255),
	price int,
	foreign key(show_id) references a_show(show_id) on delete no action,
	foreign key(user_id) references the_user(user_id) on delete no action,
	primary key(seat_id,show_id)
);





INSERT INTO `movie`(`movie_id`, `movie_info`) 
VALUES ("神力女人 1984","故事設定於1980年代美國與蘇聯互相對抗的冷戰時期，「神力女超人」黛安娜·普林斯對上了兩位全新勁敵——頂級掠食者豹女，以及掌控著能改變世界力量的神秘人麥斯威爾·洛德。");
INSERT INTO `movie`(`movie_id`, `movie_info`) 
VALUES ("鬼滅之刃劇場版　無限列車篇","《鬼滅之刃》是家人慘遭鬼殺害的少年－竈門炭治郎，為了讓化為鬼的妹妹禰豆子恢復回人 類，自願加入「鬼殺隊」的故事。以人鬼間的悲痛故事、驚心動魄的劍戰，以及偶然穿插的 滑稽場景，贏得廣大人氣，不僅紅遍日本，更掀起全球觀眾的熱烈討論。

								緊接在電視版動畫《竈門炭治郎‧立志篇》之後的故事《無限列車篇》，即將登上大銀幕。 炭治郎等人完成「蝴蝶屋」的訓練，下一個目的地是開往黑暗的「無限列車」。
								
								以多人行蹤不明的這輛列車為舞台，炭治郎帶著禰豆子與善逸、伊之助一行人，與鬼殺隊最 強劍士〝柱〞其中之一「炎柱‧煉獄杏壽郎」會合， 新的任務即將開始！");
INSERT INTO `movie`(`movie_id`, `movie_info`) 
VALUES ("返校　習維尼的恐懼","《返校》是一部於2019年上映的臺灣校園懸疑歷史驚悚片。 改編自赤燭遊戲的同名電腦遊戲，由華納兄弟發行。 此電影由徐漢強執導，王淨、傅孟柏、曾敬驊、蔡思韵及朱宏章主演，講述在臺灣白色恐怖時期的山區高中裡，一群不願服從威權體制的左派份子受到政府懲治的故事。");
INSERT INTO `movie`(`movie_id`, `movie_info`) 
VALUES ("波多野結衣","波多野結衣，是一位出身於日本京都府的AV女優、模特兒以及演員，出道於2008年，隸屬於經紀公司 T-poweres.。其外貌與台灣著名模特兒林志玲相似，因而在該地網路社群被給予「AV界林志玲」、「暗黑林志玲」的稱號，進而使其在華人圈為人所知。自2011年起，波多野結衣亦在海外發展非AV性質的演藝活動。");







INSERT INTO `theater`(`theater_id`, `theater_info`) 
VALUES ("大台西劇院","我到底嗑了三小");
INSERT INTO `theater`(`theater_id`, `theater_info`) 
VALUES ("南半球劇院","最靠近南半球的劇院");
INSERT INTO `theater`(`theater_id`, `theater_info`) 
VALUES ("順成劇院","不要");
INSERT INTO `theater`(`theater_id`, `theater_info`) 
VALUES ("北半球劇院","最靠近北半球的劇院");







INSERT INTO `the_user` (`user_id`, `password_hash`, `money`) 
VALUES ('root', '12345678', '99999');

INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級1',"波多野結衣","大台西劇院","A廳","8:00","10:00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級2',"鬼滅之刃劇場版　無限列車篇","大台西劇院","A廳","10:00","12:00");

INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級3',"波多野結衣　無限列車篇","南半球劇院","B廳","8:00","10;00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級4',"鬼滅之刃劇場版　無限列車篇","南半球劇院","C廳","10:00","12:00");

INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級5',"鬼滅之刃劇場版　無限列車篇","順成劇院","B廳","10:00","12:00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級6',"鬼滅之刃劇場版　無限列車篇","順成劇院","C廳","8:00","10;00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級7',"返校　習維尼的恐懼","順成劇院","A廳","15:00","17:00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級8',"波多野結衣","順成劇院","B廳","15:00","17;00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級9',"鬼滅之刃劇場版　無限列車篇","順成劇院","B廳","19:00","21:00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級10',"波多野結衣","順成劇院","A廳","22:00","24:00");

INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級11',"返校　習維尼的恐懼","北半球劇院","A廳","12:00","14;00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級12',"波多野結衣","北半球劇院","C廳","10:00","12:00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)
VALUES ('普遍級13',"波多野結衣","北半球劇院","B廳","22:00","24;00");
INSERT INTO `a_show` (`show_id`,`movie_id`,`theater_id`,`location`,`start_time`,`end_time`)


INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,0]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,1]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[0,2]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,0]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,1]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[1,2]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,0]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,1]', '普遍級13', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級1', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級2', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級3', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級4', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級5', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級6', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級7', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級8', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級9', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級10', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級11', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級12', NULL, '200.00');
INSERT INTO `seat` (`seat_id`, `show_id`, `user_id`,`price`)
VALUES ('[2,2]', '普遍級13', NULL, '200.00');
