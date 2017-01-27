CREATE TABLE contract (
  id int(11) NOT NULL AUTO_INCREMENT,
  number varbinary(50) NOT NULL COMMENT 'Номер договора',
  name varchar(50) DEFAULT NULL COMMENT 'Название',
  date_finish date DEFAULT NULL COMMENT 'Срок окончания',
  alfresco_link varchar(255) DEFAULT NULL COMMENT 'Ссылка на электронную копию',
  flag_status tinyint(1) DEFAULT NULL COMMENT 'Статус',
  partner_id int(11) DEFAULT NULL COMMENT 'ИД Контрагента',
  PRIMARY KEY (id, number),
  CONSTRAINT FK_contract_partner_id FOREIGN KEY (partner_id)
  REFERENCES partner (id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Договоры';