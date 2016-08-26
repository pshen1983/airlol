-- America
INSERT INTO airlol.cms_item(language, content, code, create_time) VALUES 
('en', 'North America', 'NORTHAMERICA', NOW()),
('en', 'Los Angoles', 'LAX', NOW()),
('en', 'Chicago', 'ORD', NOW()),
('en', 'Washington DC', 'IAD', NOW()),
('en', 'New York', 'JFK', NOW()),
('en', 'New York', 'EWR', NOW()),
('en', 'San Francisco', 'SFO', NOW()),
('en', 'Seattle', 'SEA', NOW()),
('en', 'Detroit', 'DTW', NOW()),
('en', 'Atlanta', 'ATL', NOW()),
('en', 'Honululu', 'HNL', NOW()),
('en', 'Vancouver', 'YVR', NOW()),
('en', 'Toronto', 'YYZ', NOW()),
('zh', '北美', 'NORTHAMERICA', NOW()),
('zh', '洛杉矶', 'LAX', NOW()),
('zh', '芝加哥', 'ORD', NOW()),
('zh', '华盛顿', 'IAD', NOW()),
('zh', '纽约', 'JFK', NOW()),
('zh', '纽约', 'EWR', NOW()),
('zh', '旧金山', 'SFO', NOW()),
('zh', '西雅图', 'SEA', NOW()),
('zh', '底特律', 'DTW', NOW()),
('zh', '亚特兰大', 'ATL', NOW()),
('zh', '檀香山', 'HNL', NOW()),
('zh', '温哥华', 'YVR', NOW()),
('zh', '多伦多', 'YYZ', NOW());

INSERT INTO airlol.cms_relation(type, parent_code, child_code, create_time) VALUES 
('AIRPORT', 'NORTHAMERICA', 'LAX', NOW()),
('AIRPORT', 'NORTHAMERICA', 'ORD', NOW()),
('AIRPORT', 'NORTHAMERICA', 'IAD', NOW()),
('AIRPORT', 'NORTHAMERICA', 'JFK', NOW()),
('AIRPORT', 'NORTHAMERICA', 'EWR', NOW()),
('AIRPORT', 'NORTHAMERICA', 'SFO', NOW()),
('AIRPORT', 'NORTHAMERICA', 'SEA', NOW()),
('AIRPORT', 'NORTHAMERICA', 'DTW', NOW()),
('AIRPORT', 'NORTHAMERICA', 'ATL', NOW()),
('AIRPORT', 'NORTHAMERICA', 'HNL', NOW()),
('AIRPORT', 'NORTHAMERICA', 'YVR', NOW()),
('AIRPORT', 'NORTHAMERICA', 'YYZ', NOW());

-- Europe
INSERT INTO airlol.cms_item(language, content, code, create_time) VALUES 
('en', 'Europe', 'EUROPE', NOW()),
('en', 'London', 'LHR', NOW()),
('en', 'Paris', 'CDG', NOW()),
('zh', '欧洲', 'EUROPE', NOW()),
('zh', '伦敦', 'LHR', NOW()),
('zh', '巴黎', 'CDG', NOW());

INSERT INTO airlol.cms_relation(type, parent_code, child_code, create_time) VALUES 
('AIRPORT', 'EUROPE', 'LHR', NOW()),
('AIRPORT', 'EUROPE', 'CDG', NOW());

-- China
INSERT INTO airlol.cms_item(language, content, code, create_time) VALUES 
('en', 'China', 'CHINA', NOW()),
('en', 'Beijing', 'PEK', NOW()),
('en', 'Shanghai', 'PVG', NOW()),
('en', 'Guangzhou', 'CAN', NOW()),
('en', 'Wuhan', 'WUH', NOW()),
('en', 'Shenzhen', 'SZX', NOW()),
('en', 'Xiamen', 'XIY', NOW()),
('en', 'Chongqing', 'CKG', NOW()),
('en', 'Chengdu', 'CTU', NOW()),
('en', 'Nanjing', 'NKG', NOW()),
('en', 'Hangzhou', 'HGH', NOW()),
('zh', '中国', 'CHINA', NOW()),
('zh', '北京', 'PEK', NOW()),
('zh', '上海', 'PVG', NOW()),
('zh', '广州', 'CAN', NOW()),
('zh', '武汉', 'WUH', NOW()),
('zh', '深圳', 'SZX', NOW()),
('zh', '厦门', 'XIY', NOW()),
('zh', '重庆', 'CKG', NOW()),
('zh', '成都', 'CTU', NOW()),
('zh', '南京', 'NKG', NOW()),
('zh', '杭州', 'HGH', NOW());

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
