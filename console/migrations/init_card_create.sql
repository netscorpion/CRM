CREATE TABLE card (
  id int(11) NOT NULL AUTO_INCREMENT,
  gr_nomer decimal(10, 0) NOT NULL COMMENT 'Графический номер',
  pin int(11) DEFAULT NULL COMMENT 'ПИН код',
  flag_status tinyint(1) DEFAULT NULL COMMENT 'Статус карты',
  contract_id int(11) DEFAULT NULL COMMENT 'ИД договора',
  PRIMARY KEY (id, gr_nomer),
  CONSTRAINT FK_сards_contract_id FOREIGN KEY (contract_id)
  REFERENCES contract (id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Карты';