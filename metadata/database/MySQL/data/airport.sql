-- America
INSERT INTO airlol.cms_item(language, type, content, code, create_time) VALUES 
('en', 1, 'North America', 'NORTHAMERICA', NOW()),
('en', 2, 'Los Angoles', 'LAX', NOW()),
('en', 2, 'Chicago', 'ORD', NOW()),
('en', 2, 'Washington DC', 'IAD', NOW()),
('en', 2, 'New York', 'NYC', NOW()),
('en', 2, 'San Francisco', 'SFO', NOW()),
('en', 2, 'Seattle', 'SEA', NOW()),
('en', 2, 'Detroit', 'DTW', NOW()),
('en', 2, 'Atlanta', 'ATL', NOW()),
('en', 2, 'Honululu', 'HNL', NOW()),
('en', 2, 'Vancouver', 'YVR', NOW()),
('en', 2, 'Toronto', 'YYZ', NOW()),
('zh', 1, '北美', 'NORTHAMERICA', NOW()),
('zh', 2, '洛杉矶', 'LAX', NOW()),
('zh', 2, '芝加哥', 'ORD', NOW()),
('zh', 2, '华盛顿', 'IAD', NOW()),
('zh', 2, '纽约', 'NYC', NOW()),
('zh', 2, '旧金山', 'SFO', NOW()),
('zh', 2, '西雅图', 'SEA', NOW()),
('zh', 2, '底特律', 'DTW', NOW()),
('zh', 2, '亚特兰大', 'ATL', NOW()),
('zh', 2, '檀香山', 'HNL', NOW()),
('zh', 2, '温哥华', 'YVR', NOW()),
('zh', 2, '多伦多', 'YYZ', NOW());

INSERT INTO airlol.cms_relation(type, parent_code, child_code, create_time) VALUES 
('AIRPORT', 'NORTHAMERICA', 'LAX', NOW()),
('AIRPORT', 'NORTHAMERICA', 'ORD', NOW()),
('AIRPORT', 'NORTHAMERICA', 'IAD', NOW()),
('AIRPORT', 'NORTHAMERICA', 'NYC', NOW()),
('AIRPORT', 'NORTHAMERICA', 'SFO', NOW()),
('AIRPORT', 'NORTHAMERICA', 'SEA', NOW()),
('AIRPORT', 'NORTHAMERICA', 'DTW', NOW()),
('AIRPORT', 'NORTHAMERICA', 'ATL', NOW()),
('AIRPORT', 'NORTHAMERICA', 'HNL', NOW()),
('AIRPORT', 'NORTHAMERICA', 'YVR', NOW()),
('AIRPORT', 'NORTHAMERICA', 'YYZ', NOW());

-- Europe
INSERT INTO airlol.cms_item(language, type, content, code, create_time) VALUES 
('en', 1, 'Europe', 'EUROPE', NOW()),
('en', 2, 'London', 'LHR', NOW()),
('en', 2, 'Paris', 'CDG', NOW()),
('zh', 1, '欧洲', 'EUROPE', NOW()),
('zh', 2, '伦敦', 'LHR', NOW()),
('zh', 2, '巴黎', 'CDG', NOW());

INSERT INTO airlol.cms_relation(type, parent_code, child_code, create_time) VALUES 
('AIRPORT', 'EUROPE', 'LHR', NOW()),
('AIRPORT', 'EUROPE', 'CDG', NOW());

-- China
INSERT INTO airlol.cms_item(language, type, content, code, create_time) VALUES 
('en', 1, 'China', 'CHINA', NOW()),
('en', 2, 'Beijing', 'PEK', NOW()),
('en', 2, 'Shanghai', 'PVG', NOW()),
('en', 2, 'Guangzhou', 'CAN', NOW()),
('en', 2, 'Wuhan', 'WUH', NOW()),
('en', 2, 'Shenzhen', 'SZX', NOW()),
('en', 2, 'Xiamen', 'XIY', NOW()),
('en', 2, 'Chongqing', 'CKG', NOW()),
('en', 2, 'Chengdu', 'CTU', NOW()),
('en', 2, 'Nanjing', 'NKG', NOW()),
('en', 2, 'Hangzhou', 'HGH', NOW()),
('zh', 1, '中国', 'CHINA', NOW()),
('zh', 2, '北京', 'PEK', NOW()),
('zh', 2, '上海', 'PVG', NOW()),
('zh', 2, '广州', 'CAN', NOW()),
('zh', 2, '武汉', 'WUH', NOW()),
('zh', 2, '深圳', 'SZX', NOW()),
('zh', 2, '厦门', 'XIY', NOW()),
('zh', 2, '重庆', 'CKG', NOW()),
('zh', 2, '成都', 'CTU', NOW()),
('zh', 2, '南京', 'NKG', NOW()),
('zh', 2, '杭州', 'HGH', NOW());

INSERT INTO airlol.cms_relation(type, parent_code, child_code, create_time) VALUES 
('AIRPORT', 'CHINA', 'PEK', NOW()),
('AIRPORT', 'CHINA', 'PVG', NOW()),
('AIRPORT', 'CHINA', 'CAN', NOW()),
('AIRPORT', 'CHINA', 'WUH', NOW()),
('AIRPORT', 'CHINA', 'SZX', NOW()),
('AIRPORT', 'CHINA', 'XIY', NOW()),
('AIRPORT', 'CHINA', 'CKG', NOW()),
('AIRPORT', 'CHINA', 'CTU', NOW()),
('AIRPORT', 'CHINA', 'NKG', NOW()),
('AIRPORT', 'CHINA', 'HGH', NOW());
