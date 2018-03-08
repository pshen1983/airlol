INSERT INTO airlol.cms_item(language, type, content, code, create_time) VALUES 
('en', 10, 'CairyME | Home Page', 'HOME', NOW()),
('zh', 10, 'CairyME | 主页', 'HOME', NOW());

INSERT INTO airlol.cms_item(language, type, content, code, create_time) VALUES 
('en', 11, 'I am traveling', 'I_AM_TRAVLING', NOW()),
('zh', 11, '我的旅程', 'I_AM_TRAVLING', NOW()),
('en', 11, 'I have a package', 'I_HAVE_A_PACKAGE', NOW()),
('zh', 11, '我的包裹', 'I_HAVE_A_PACKAGE', NOW());

INSERT INTO airlol.cms_relation(type, parent_code, child_code, create_time) VALUES 
('LABEL', 'HOME', 'I_AM_TRAVLING', NOW()),
('LABEL', 'HOME', 'I_HAVE_A_PACKAGE', NOW());