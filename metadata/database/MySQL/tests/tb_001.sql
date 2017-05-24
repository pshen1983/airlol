INSERT INTO airlol.user
(email, password, name, profile_img, birth_day, tel, whatsapp, wechat, preferred_language, preferred_currency, preferred_timezone, preferred_method, living_city, self_description, response_count, response_time, rate_trip_count, rate_trip_value, rate_good_count, rate_good_value, create_time)
VALUES
('tb_001_user_0001@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0001', NULL, '1982-01-03', '6040010001', NULL, 'wechat_tb001_user0001', 'CN_zh', 'CAD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0001', 3, 1, 1, 7, 0, 0, NOW()),
('tb_001_user_0002@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0002', NULL, '1982-02-03', '6040010002', NULL, 'wechat_tb001_user0002', 'CN_zh', 'USD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0002', 1, 0, 0, 0, 1, 9, NOW()),
('tb_001_user_0003@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0003', NULL, '1982-03-03', '6040010003', NULL, 'wechat_tb001_user0003', 'CN_zh', 'CAD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0003', 1, 2, 0, 0, 0, 0, NOW()),
('tb_001_user_0004@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0004', NULL, '1982-04-03', '6040010004', NULL, 'wechat_tb001_user0004', 'CN_zh', 'USD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0004', 1, 3, 0, 0, 0, 0, NOW()),
('tb_001_user_0005@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0005', NULL, '1982-05-03', '6040010005', NULL, 'wechat_tb001_user0005', 'CN_zh', 'CAD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0005', 1, 4, 0, 0, 0, 0, NOW()),
('tb_001_user_0006@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0006', NULL, '1982-06-03', '6040010006', NULL, 'wechat_tb001_user0006', 'CN_zh', 'USD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0006', 1, 2, 0, 0, 0, 0, NOW()),
('tb_001_user_0007@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0007', NULL, '1982-07-03', '6040010007', NULL, 'wechat_tb001_user0007', 'CN_zh', 'CAD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0007', 1, 3, 0, 0, 0, 0, NOW()),
('tb_001_user_0008@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0008', NULL, '1982-08-03', '6040010008', NULL, 'wechat_tb001_user0008', 'CN_zh', 'USD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0008', 1, 2, 0, 0, 0, 0, NOW()),
('tb_001_user_0009@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0009', NULL, '1982-09-03', '6040010009', NULL, 'wechat_tb001_user0009', 'CN_zh', 'CAD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0009', 1, 1, 0, 0, 0, 0, NOW()),
('tb_001_user_0010@cairyme.com', '4608008d816b02180a17c0a6c2f3f423', 'TB001 User0010', NULL, '1982-10-03', '6040010010', NULL, 'wechat_tb001_user0010', 'CN_zh', 'USD', 8, 1, 'Vancouver, BC', 'I am Test Bed 001 User 0010', 1, 0, 0, 0, 0, 0, NOW());


INSERT INTO airlol.trip
(user_id, departure_code, arrival_code, trip_date, space_type, weight, weight_unit, price, currency, active, create_time)
VALUES
(1, 'SHA', 'YVR', NOW() + INTERVAL 1 DAY, 1, 20, 1, 25, 'CAD', 'N', NOW()),
(2, 'YVR', 'SHA', NOW() + INTERVAL 2 DAY, 1, 23, 1, 30, 'USD', 'Y', NOW()),
(3, 'SHA', 'YVR', NOW() + INTERVAL 3 DAY, 2, 20, 1, 25, 'CAD', 'Y', NOW()),
(4, 'YVR', 'SHA', NOW() + INTERVAL 4 DAY, 1, 23, 1, 50, 'CAD', 'Y', NOW()),
(5, 'SHA', 'YVR', NOW() + INTERVAL 5 DAY, 2, 20, 1, 25, 'CAD', 'Y', NOW()),
(6, 'YVR', 'SHA', NOW() + INTERVAL 6 DAY, 2, 23, 1, 60, 'USD', 'Y', NOW()),
(7, 'SHA', 'YVR', NOW() + INTERVAL 7 DAY, 1, 20, 1, 25, 'CAD', 'Y', NOW()),
(8, 'YVR', 'SHA', NOW() + INTERVAL 8 DAY, 2, 23, 1, 75, 'CAD', 'Y', NOW()),
(9, 'SHA', 'YVR', NOW() + INTERVAL 9 DAY, 1, 20, 1, 25, 'USD', 'Y', NOW()),
(10, 'YVR', 'SHA', NOW() + INTERVAL 10 DAY, 2, 23, 1, 45, 'USD', 'Y', NOW());


INSERT INTO airlol.good
(user_id, departure_code, arrival_code, end_date, type, weight, weight_unit, description, price, currency, active, create_time)
VALUES
(1, 'YVR', 'SHA', NOW() + INTERVAL 1 MONTH, 1, 23, 1, 'test bed 001 good 0001', 25, 'CAD', 'Y', NOW()),
(2, 'SHA', 'YVR', NOW() + INTERVAL 1 MONTH, 2, 20, 1, 'test bed 001 good 0002', 45, 'USD', 'N', NOW()),
(3, 'YVR', 'SHA', NOW() + INTERVAL 1 MONTH, 1, 23, 1, 'test bed 001 good 0003', 25, 'CAD', 'Y', NOW()),
(4, 'SHA', 'YVR', NOW() + INTERVAL 1 MONTH, 2, 20, 1, 'test bed 001 good 0004', 65, 'CAD', 'Y', NOW()),
(5, 'YVR', 'SHA', NOW() + INTERVAL 1 MONTH, 2, 23, 1, 'test bed 001 good 0005', 25, 'CAD', 'Y', NOW()),
(6, 'SHA', 'YVR', NOW() + INTERVAL 1 MONTH, 1, 20, 1, 'test bed 001 good 0006', 15, 'USD', 'Y', NOW()),
(7, 'YVR', 'SHA', NOW() + INTERVAL 1 MONTH, 2, 23, 1, 'test bed 001 good 0007', 25, 'CAD', 'Y', NOW()),
(8, 'SHA', 'YVR', NOW() + INTERVAL 1 MONTH, 1, 20, 1, 'test bed 001 good 0008', 75, 'CAD', 'Y', NOW()),
(9, 'YVR', 'SHA', NOW() + INTERVAL 1 MONTH, 2, 23, 1, 'test bed 001 good 0009', 25, 'USD', 'Y', NOW()),
(10, 'SHA', 'YVR', NOW() + INTERVAL 1 MONTH, 1, 20, 1, 'test bed 001 good 0010', 25, 'CAD', 'Y', NOW());


INSERT INTO airlol.map_trip_good
(trip_id, good_id, create_time)
VALUES
(1, 2, NOW()),
(1, 4, NOW()),
(1, 6, NOW()),
(1, 8, NOW());


INSERT INTO airlol.map_user_message
(user_id, map_id, last_read)
VALUES
(1, 1, NOW()),
(2, 1, NOW()),
(1, 2, NOW()),
(4, 2, NOW()),
(1, 3, NOW()),
(6, 3, NOW()),
(1, 4, NOW()),
(8, 4, NOW());


INSERT INTO airlol.message
(trip_good_map_id, sender_id, receiver_id, type, comment, create_time)
VALUES
(1, 2, 1, 0, 'Hi Test message 001', NOW()),
(1, 1, 2, 0, 'Hi Test message 002', NOW()),
(1, 2, 1, 0, 'Hi Test message 003', NOW()),
(1, 1, 2, 0, 'Hi Test message 004', NOW()),
(2, 4, 1, 0, 'Hi Test message 005', NOW()),
(2, 1, 4, 0, 'Hi Test message 006', NOW()),
(3, 1, 6, 0, 'Hi Test message 007', NOW()),
(3, 6, 1, 0, 'Hi Test message 008', NOW()),
(4, 1, 8, 0, 'Hi Test message 007', NOW()),
(4, 8, 1, 0, 'Hi Test message 008', NOW()),
(4, 1, 8, 0, 'Hi Test message 007', NOW()),
(4, 8, 1, 0, 'Hi Test message 008', NOW());


INSERT INTO airlol.rating
(trip_good_map_id, user_id, rater_id, type, rating, comment, create_time)
VALUES
(1, 1, 2, 1, 7, 'TB001 User 0002 rate User 0001 on Trip', NOW()),
(1, 2, 1, 2, 9, 'TB001 User 0001 rate User 0002 on Good', NOW());