create database 星哲摄影;
use 星哲摄影;
SET SQL_SAFE_UPDATES = 0;
-- 建表
  CREATE TABLE `星哲摄影`.`contact` (
    `idcontact` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `email` VARCHAR(100) NOT NULL CHECK(email like "%@%" and email like "%.com"),
    `posts` VARCHAR(45) NULL,
    `info` VARCHAR(650) NOT NULL,
    PRIMARY KEY (`idcontact`));


  CREATE TABLE `星哲摄影`.`user` (
    `uno` INT NOT NULL AUTO_INCREMENT,
    `uname` VARCHAR(45) NOT NULL,
    `email` VARCHAR(100) NOT NULL CHECK(email like "%@%" and email like "%.com"),
    `password` VARCHAR(45) NOT NULL,
    `posts` VARCHAR(45) NOT NULL DEFAULT 'user',
    `umoney` INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`uno`),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
    UNIQUE INDEX `uno_UNIQUE` (`uno` ASC) VISIBLE);


  CREATE TABLE `星哲摄影`.`fee` (
    `fno` INT NOT NULL,
    `fmoney` INT NOT NULL,
    `fname` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`feeno`));

  CREATE TABLE `星哲摄影`.`reserve` (
    `rno` INT NOT NULL AUTO_INCREMENT,
    `rdate` DATE NOT NULL,
    `rtime` TIME NOT NULL,
    `fname` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `reserve_statement` VARCHAR(20) NOT NULL DEFAULT 1,
    PRIMARY KEY (`rno`));

  CREATE TABLE `星哲摄影`.`history` (
  `hno` INT NOT NULL,
  `stime` DATETIME NOT NULL,
  `etime` VARCHAR(45) NOT NULL,
  `fno` INT NOT NULL,
  `uno_pay` INT NOT NULL,
  `uno_gain` INT NOT NULL,
  `paided` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`hno`));



  INSERT INTO `星哲摄影`.`user` (`uname`, `email`, `password`, `posts`) VALUES ('李思达', '1936588711@qq.com', '123456', '摄影');
  INSERT INTO `星哲摄影`.`user` (`uname`, `email`, `password`, `posts`) VALUES ('毛杨杨', '2995027181@qq.com', '123456', '摄影');
  INSERT INTO `星哲摄影`.`user` (`uname`, `email`, `password`, `posts`) VALUES ('吴方祺', '2843334761@qq.com', '123456', '后期');

  INSERT INTO `星哲摄影`.`contact` (`name`, `email`, `posts`, `info`) VALUES ('jojo', '2076847566@qq.com', '数据分析师', '我很喜欢这个职位，具有一定的工作经验，拥有CDA证书，精通Python/R以及mysql，熟悉报表软件的使用，希望能加入贵公司。');

  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('1', '199', '后期制作');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('2', '358', '单人写真');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('3', '588', '双人写真');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('4', '438', '棚拍/校外单人写真');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('5', '668', '棚拍/校外双人写真');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('6', '499', '视频跟拍');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('7', '499', '会议记录');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('8', '399', '产品拍摄');
  INSERT INTO `星哲摄影`.`fee` (`feeno`, `fmoney`, `fname`) VALUES ('9', '398', '宠物摄影');