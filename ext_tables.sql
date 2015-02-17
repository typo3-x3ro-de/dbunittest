CREATE TABLE tx_dbunittest (
  uid int(11) NOT NULL auto_increment,
  page_id int(11) DEFAULT '0' NOT NULL,

  data text NOT NULL,

  PRIMARY KEY (uid)
) ENGINE=InnoDB;
