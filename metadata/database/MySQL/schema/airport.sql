-- America
INSERT INTO airlol.cms_item(language, content, code, create_time) VALUES 
('en', 'North America', "NORTHAMERICA", NOW()),
('en', 'Los Angoles', "LAX", NOW()),
('en', 'Chicago', "ORD", NOW()),
('en', 'Washington DC', "IAD", NOW()),
('en', 'New York', "JFK", NOW()),
('en', 'New York', "EWR", NOW()),
('en', 'San Francisco', "SFO", NOW()),
('en', 'Seattle', "SEA", NOW()),
('en', 'Detroit', "DTW", NOW()),
('en', 'Atlanta', "ATL", NOW()),
('en', 'Honululu', "HNL", NOW()),
('en', 'Vancouver', "YVR", NOW()),
('en', 'Toronto', "YYZ", NOW()),
('zh', '北美', "NORTHAMERICA", NOW()),
('zh', '洛杉矶', "LAX", NOW()),
('zh', '芝加哥', "ORD", NOW()),
('zh', '华盛顿', "IAD", NOW()),
('zh', '纽约', "JFK", NOW()),
('zh', '纽约', "EWR", NOW()),
('zh', '旧金山', "SFO", NOW()),
('zh', '西雅图', "SEA", NOW()),
('zh', '底特律', "DTW", NOW()),
('zh', '亚特兰大', "ATL", NOW()),
('zh', '檀香山', "HNL", NOW()),
('zh', '温哥华', "YVR", NOW()),
('zh', '多伦多', "YYZ", NOW());

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

-- Europe
INSERT INTO airlol.cms_item(language, content, code, create_time) VALUES 
('en', 'Europe', "EUROPE", NOW()),
('en', 'London', "LHR", NOW()),
('en', 'Paris', "CDG", NOW()),
('zh', '欧洲', "EUROPE", NOW()),
('zh', '伦敦', "LHR", NOW()),
('en', '巴黎', "CDG", NOW());

INSERT INTO airlol.cms_relation(parent_code, child_code, create_time) VALUES 
("EUROPE", 'LHR', NOW()),
("EUROPE", 'CDG', NOW());

-- China
INSERT INTO airlol.cms_item(language, content, code, create_time) VALUES 
('en', 'China', "CHINA", NOW()),
('en', 'Beijing', "PEK", NOW()),
('en', 'Shanghai', "PVG", NOW()),
('en', 'Guangzhou', "CAN", NOW()),
('en', 'Wuhan', "WUH", NOW()),
('en', 'Shenzhen', "SZX", NOW()),
('en', 'Xiamen', "XIY", NOW()),
('en', 'Chongqing', "CKG", NOW()),
('en', 'Chengdu', "CTU", NOW()),
('en', 'Nanjing', "NKG", NOW()),
('en', 'Hangzhou', "HGH", NOW()),
('zh', '中国', "CHINA", NOW()),
('zh', '北京', "PEK", NOW()),
('zh', '上海', "PVG", NOW()),
('zh', '广州', "CAN", NOW()),
('zh', '武汉', "WUH", NOW()),
('zh', '深圳', "SZX", NOW()),
('zh', '厦门', "XIY", NOW()),
('zh', '重庆', "CKG", NOW()),
('zh', '成都', "CTU", NOW()),
('zh', '南京', "NKG", NOW()),
('zh', '杭州', "HGH", NOW());

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
