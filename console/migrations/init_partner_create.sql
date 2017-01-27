CREATE TABLE partner (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL COMMENT 'Название',
  fullname varchar(255) DEFAULT NULL COMMENT 'Полное название',
  inn bigint(20) UNSIGNED NOT NULL COMMENT 'ИНН',
  kpp int(11) UNSIGNED NOT NULL COMMENT 'КПП',
  legal_address varchar(255) DEFAULT NULL COMMENT 'Юридический адрес',
  actual_address varchar(255) DEFAULT NULL COMMENT 'Фактический адрес',
  mail_address varchar(255) DEFAULT NULL COMMENT 'Почтовый Адрес',
  phone varchar(20) DEFAULT NULL COMMENT 'Телефон',
  fax varchar(20) DEFAULT NULL COMMENT 'Факс',
  email varchar(50) DEFAULT NULL COMMENT 'E-mail',
  ogrn varchar(255) DEFAULT NULL COMMENT 'ОГРН',
  okvjed varchar(50) DEFAULT NULL COMMENT 'Код ОКВЕД',
  okpo decimal(8, 0) UNSIGNED DEFAULT NULL COMMENT 'Код ОКПО',
  okato decimal(11, 0) UNSIGNED DEFAULT NULL COMMENT 'Код ОКАТО',
  PRIMARY KEY (id, inn)
)
  ENGINE = INNODB
  AUTO_INCREMENT = 1
  CHARACTER SET utf8
  COLLATE utf8_general_ci
  COMMENT = 'Контрагенты';