CREATE TABLE transaction (
  id int(11) NOT NULL AUTO_INCREMENT,
  date_of datetime NOT NULL COMMENT 'Дата операции',
  date_in datetime NOT NULL COMMENT 'Дата импорта транзакци',
  trans int(11) NOT NULL COMMENT 'Операция',
  amount decimal(10, 2) NOT NULL COMMENT 'Количество',
  price decimal(10, 2) NOT NULL COMMENT 'Цена',
  price_discount decimal(10, 2) DEFAULT NULL COMMENT 'Цена со скидкой',
  price_delta decimal(10, 2) DEFAULT NULL COMMENT 'Дельта цены',
  sum decimal(10, 2) NOT NULL COMMENT 'Сумма',
  sum_discont decimal(10, 2) DEFAULT NULL COMMENT 'Сумма со скидкой',
  sum_delta decimal(10, 2) DEFAULT NULL COMMENT 'Дельта суммы',
  flag_discount tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Наличие дисконта',
  adress varchar(255) DEFAULT NULL COMMENT 'Адрес',
  guid binary(32) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0' COMMENT 'GUID',
  service_id int(11) DEFAULT NULL COMMENT 'ИД Услуги',
  service_name varchar(10) NOT NULL COMMENT 'Услуга',
  card_id int(11) NOT NULL COMMENT 'Карта',
  contract_buyer_id int(11) NOT NULL COMMENT 'Договор покупателя',
  contract_seller_id int(11) NOT NULL COMMENT 'Договор продовца',
  PRIMARY KEY (id, guid),
  CONSTRAINT FK_transaction_card_gr_nomer FOREIGN KEY (card_id)
  REFERENCES card(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_transaction_contract_buyer_id FOREIGN KEY (contract_buyer_id)
  REFERENCES contract(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_transaction_contract_seller_id FOREIGN KEY (contract_seller_id)
  REFERENCES contract(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
  ENGINE = INNODB
  AUTO_INCREMENT = 1
  CHARACTER SET utf8
  COLLATE utf8_general_ci
  COMMENT = 'Транзакции';