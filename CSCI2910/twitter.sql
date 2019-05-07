DROP TABLE IF EXISTS user;
CREATE TABLE user (username VARCHAR(16) NOT NULL PRIMARY KEY, password VARCHAR(32) NOT NULL, firstname VARCHAR(16) NULL, lastname VARCHAR(16) NULL, email VARCHAR(30) NOT NULL);
INSERT INTO user VALUES ('rohdej',   "5f4dcc3b5aa765d61d8327deb882cf99", 'Joe', 'Rohde', 'jrhode@domain.com');
INSERT INTO user VALUES ('martianm', "5f4dcc3b5aa765d61d8327deb882cf99", 'Marvin the', 'Martian', 'martianm@mars.com');
INSERT INTO user VALUES ('lohanl',   "5f4dcc3b5aa765d61d8327deb882cf99", 'Lindsay', 'Lohan', 'lohan@rehab.com');
INSERT INTO user VALUES ('hiltonp',  "5f4dcc3b5aa765d61d8327deb882cf99", 'Paris', 'Hilton', 'philton@hilton.com');
INSERT INTO user VALUES ('jobss',    "5f4dcc3b5aa765d61d8327deb882cf99", 'Steve', 'Jobs', 'steve@apple.com');
INSERT INTO user VALUES ('pittb',    "5f4dcc3b5aa765d61d8327deb882cf99", 'Brad', 'Pitt', 'pittstain@gmail.com');
INSERT INTO user VALUES ('presleye', "5f4dcc3b5aa765d61d8327deb882cf99", 'Elvis', 'Presley', 'theKing@graceland.com');
INSERT INTO user VALUES ('samy',     "5f4dcc3b5aa765d61d8327deb882cf99", 'Yosemite', 'Sam', 'yosemite@wb.com');
INSERT INTO user VALUES ('dduck',    "5f4dcc3b5aa765d61d8327deb882cf99", 'Donald', 'Duck', 'donald@duck.com');
INSERT INTO user VALUES ('mmouse',   "5f4dcc3b5aa765d61d8327deb882cf99", 'Mickey', 'Mouse', 'mouse@disney.com');
INSERT INTO user VALUES ('gwwhitney', "5f4dcc3b5aa765d61d8327deb882cf99", 'Gary', 'Whitney', 'whitney@domain.com' );

# "5f4dcc3b5aa765d61d8327deb882cf99" = password

DROP TABLE IF EXISTS tweets;
CREATE TABLE tweets (
  id int(10) NOT NULL AUTO_INCREMENT,
  tweet VARCHAR(140),
  user_id VARCHAR(16), 
  time_created DATETIME,
  PRIMARY KEY (id)
  );

INSERT INTO tweets (tweet, user_id, time_created) VALUES ("It's cold outside", "gwwhitney", DATE_SUB(NOW(), INTERVAL 11 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Oh boy, Pluto!", "mmouse", DATE_SUB(NOW(), INTERVAL 10 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Maybe I'm just a duck, but I'm human!", "dduck", DATE_SUB(NOW(), INTERVAL 9 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Great horny toads, I’m up North! Gotta burn my boots, they touched Yankee soil!", "samy", DATE_SUB(NOW(), INTERVAL 8 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Wrapping up my latest movie", "pittb", DATE_SUB(NOW(), INTERVAL 7 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Just literally died", "presleye", DATE_SUB(NOW(), INTERVAL 6 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Just stole another idea that I'll call 'revolutionary'", "jobss", DATE_SUB(NOW(), INTERVAL 5 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("I like turtles", "rohdej", DATE_SUB(NOW(), INTERVAL 4 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("I'm going to take over the world!", "martianm", DATE_SUB(NOW(), INTERVAL 3 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("Anyone know a good coke dealer?", "lohanl", DATE_SUB(NOW(), INTERVAL 2 HOUR));
INSERT INTO tweets (tweet, user_id, time_created) VALUES ("I'm so basic I can't even", "hiltonp", DATE_SUB(NOW(), INTERVAL 1 HOUR));
  
DROP TABLE IF EXISTS follows;
CREATE TABLE follows (
  following BOOLEAN, 
  follower_id VARCHAR(16), 
  followed_id VARCHAR(16)
  );
