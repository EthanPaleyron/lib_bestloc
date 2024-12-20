USE Bestloc;

-- Insertion dans la table contract
INSERT INTO contract (vehicule_uid, customer_uid, sign_date, loc_begin_date, loc_end_date, returning_date, price)
VALUES
('VH001', 'CU001', '2024-01-01 09:00:00', '2024-01-02 08:00:00', '2024-01-03 10:00:00', '2024-01-03 12:30:00', 300.00),
('VH002', 'CU001', '2024-01-05 10:30:00', '2024-01-06 09:00:00', '2024-01-06 17:00:00', '2024-01-06 19:30:00', 450.00),
('VH003', 'CU002', '2024-02-10 14:00:00', '2024-02-11 08:00:00', '2024-02-12 18:00:00', '2024-02-12 20:15:00', 500.00),
('VH004', 'CU003', '2024-03-01 12:00:00', '2024-03-02 08:30:00', '2024-03-03 19:00:00', '2024-03-03 19:30:00', 600.00),
('VH005', 'CU004', '2024-04-01 09:00:00', '2024-04-02 08:00:00', '2024-04-03 18:00:00', '2024-04-03 18:45:00', 350.00),
('VH006', 'CU005', '2024-05-01 08:00:00', '2024-05-02 07:30:00', '2024-05-03 20:00:00', NULL, 400.00),
('VH007', 'CU001', '2024-06-01 10:00:00', '2024-06-02 09:00:00', '2024-06-03 17:30:00', NULL, 420.00);

-- Vérifiez les IDs générés
SELECT id, vehicule_uid, customer_uid FROM contract;

-- Adaptez les IDs dans la table billing
INSERT INTO billing (contract_id, amount)
VALUES
(1, 300.00),
(2, 450.00),
(3, 500.00),
(4, 600.00),
(5, 350.00),
(6, 400.00),
(7, 420.00);
