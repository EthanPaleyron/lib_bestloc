CREATE DATABASE IF NOT EXISTS Bestloc;
USE Bestloc;

CREATE TABLE contract (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_uid VARCHAR(255) NOT NULL,
    customer_uid VARCHAR(255) NOT NULL,
    sign_date DATETIME NOT NULL,
    loc_begin_date DATETIME NOT NULL,
    loc_end_date DATETIME NOT NULL,
    returning_date DATETIME,
    price DECIMAL(10, 2) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE billing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contract_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_billing_contract_id FOREIGN KEY (contract_id) REFERENCES contract(id)
) ENGINE = InnoDB;

ALTER TABLE billing
  ADD CONSTRAINT billing_ibfk_1 FOREIGN KEY (contract_id) REFERENCES contract (id) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;