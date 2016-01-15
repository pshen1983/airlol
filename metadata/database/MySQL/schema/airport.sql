INSERT INTO airlol.cms_item(type, language, content, code, create_time) VALUES 
(3, 'en', 'North America', "NORTHAMERICA", NOW()),
(3, 'en', 'Los Angoles', "LAX", NOW()),
(3, 'en', 'Chicago', "ORD", NOW()),
(3, 'en', 'Washington DC', "IAD", NOW()),
(3, 'en', 'New York', "JFK", NOW()),
(3, 'en', 'New York', "EWR", NOW()),
(3, 'en', 'San Francisco', "SFO", NOW()),
(3, 'en', 'Seattle', "SEA", NOW()),
(3, 'en', 'Detroit', "DTW", NOW()),
(3, 'en', 'Atlanta', "ATL", NOW()),
(3, 'en', 'Honululu', "HNL", NOW()),
(3, 'en', 'Vancouver', "YVR", NOW()),
(3, 'en', 'Toronto', "YYZ", NOW()),
(3, 'zh', '北美', "NORTHAMERICA", NOW()),
(3, 'zh', '洛杉矶', "LAX", NOW()),
(3, 'zh', '芝加哥', "ORD", NOW()),
(3, 'zh', '华盛顿', "IAD", NOW()),
(3, 'zh', '纽约', "JFK", NOW()),
(3, 'zh', '纽约', "EWR", NOW()),
(3, 'zh', '旧金山', "SFO", NOW()),
(3, 'zh', '西雅图', "SEA", NOW()),
(3, 'zh', '底特律', "DTW", NOW()),
(3, 'zh', '亚特兰大', "ATL", NOW()),
(3, 'zh', '檀香山', "HNL", NOW()),
(3, 'zh', '温哥华', "YVR", NOW()),
(3, 'zh', '多伦多', "YYZ", NOW());

INSERT INTO airlol.cms_relation(parent_code, child_code, create_time) VALUES 
("NORTHAMERICA", 'LAX', NOW()),
("NORTHAMERICA", 'ORD', NOW()),
("NORTHAMERICA", 'IAD', NOW()),
("NORTHAMERICA", 'JFK', NOW()),
("NORTHAMERICA", 'EWR', NOW()),
("NORTHAMERICA", 'SFO', NOW()),
("NORTHAMERICA", 'SEA', NOW()),
("NORTHAMERICA", 'DTW', NOW()),
("NORTHAMERICA", 'ATL', NOW()),
("NORTHAMERICA", 'HNL', NOW()),
("NORTHAMERICA", 'YVR', NOW()),
("NORTHAMERICA", 'YYZ', NOW());

INSERT INTO airlol.cms_item(type, language, content, code, create_time) VALUES 
(3, 'en', 'China', "CHINA", NOW()),
(3, 'en', 'Beijing', "PEK", NOW()),
(3, 'en', 'Shanghai', "PVG", NOW()),
(3, 'en', 'Guangzhou', "CAN", NOW()),
(3, 'en', 'Wuhan', "WUH", NOW()),
(3, 'en', 'Shenzhen', "SZX", NOW()),
(3, 'en', 'Xiamen', "XIY", NOW()),
(3, 'en', 'Chongqing', "CKG", NOW()),
(3, 'en', 'Chengdu', "CTU", NOW()),
(3, 'en', 'Nanjing', "NKG", NOW()),
(3, 'en', 'Hangzhou', "HGH", NOW()),
(3, 'zh', '中国', "CHINA", NOW()),
(3, 'zh', '北京', "PEK", NOW()),
(3, 'zh', '上海', "PVG", NOW()),
(3, 'zh', '广州', "CAN", NOW()),
(3, 'zh', '武汉', "WUH", NOW()),
(3, 'zh', '深圳', "SZX", NOW()),
(3, 'zh', '厦门', "XIY", NOW()),
(3, 'zh', '重庆', "CKG", NOW()),
(3, 'zh', '成都', "CTU", NOW()),
(3, 'zh', '南京', "NKG", NOW()),
(3, 'zh', '杭州', "HGH", NOW());

INSERT INTO airlol.cms_relation(parent_code, child_code, create_time) VALUES 
("CHINA", 'PEK', NOW()),
("CHINA", 'PVG', NOW()),
("CHINA", 'CAN', NOW()),
("CHINA", 'WUH', NOW()),
("CHINA", 'SZX', NOW()),
("CHINA", 'XMN', NOW()),
("CHINA", 'XIY', NOW()),
("CHINA", 'CKG', NOW()),
("CHINA", 'CTU', NOW()),
("CHINA", 'NKG', NOW()),
("CHINA", 'HGH', NOW());










