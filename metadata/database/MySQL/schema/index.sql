-- user
CREATE INDEX airlol_user_email ON airlol.user (email(60));
CREATE INDEX airlol_user_tel ON airlol.user (tel(14));

-- cookie_token
CREATE INDEX airlol_cookie_token_type ON airlol.cookie_token (type);
CREATE INDEX airlol_cookie_token_value ON airlol.cookie_token (value(64));
CREATE INDEX airlol_cookie_token_expires ON airlol.cookie_token (expires);

-- cms_item
CREATE INDEX airlol_cms_item_language ON airlol.cms_item (language(2));
CREATE INDEX airlol_cms_item_code ON airlol.cms_item (code(15));

-- cms_relation
CREATE INDEX airlol_cms_relation_type ON airlol.cms_relation (type(8));
CREATE INDEX airlol_cms_relation_parent ON airlol.cms_relation (parent_code(15));
CREATE INDEX airlol_cms_relation_child ON airlol.cms_relation (child_code(15));

-- trip
CREATE INDEX airlol_trip_user ON airlol.trip (user_id);
CREATE INDEX airlol_trip_departure ON airlol.trip (departure_code(15));
CREATE INDEX airlol_trip_arrival ON airlol.trip (arrival_code(15));
CREATE INDEX airlol_trip_date ON airlol.trip (trip_date);
CREATE INDEX airlol_trip_price ON airlol.trip (price);
CREATE INDEX airlol_trip_space_type ON airlol.trip (space_type);
CREATE INDEX airlol_trip_price_adjust ON airlol.trip (currency(3));
CREATE INDEX airlol_trip_active ON airlol.trip (active(1));
CREATE INDEX airlol_trip_time ON airlol.trip (create_time);

-- good 
CREATE INDEX airlol_good_user ON airlol.good (user_id);
CREATE INDEX airlol_good_departure ON airlol.good (departure_code(15));
CREATE INDEX airlol_good_arrival ON airlol.good (arrival_code(15));
CREATE INDEX airlol_good_date ON airlol.good (end_date);
CREATE INDEX airlol_good_price ON airlol.good (price);
CREATE INDEX airlol_good_type ON airlol.good (type);
CREATE INDEX airlol_good_price_adjust ON airlol.good (currency(1));
CREATE INDEX airlol_good_active ON airlol.good (active(1));
CREATE INDEX airlol_good_time ON airlol.good (create_time);

-- rating
CREATE INDEX airlol_rating_trip ON airlol.rating (trip_good_map_id);
CREATE INDEX airlol_rating_user ON airlol.rating (user_id);
CREATE INDEX airlol_rating_rater ON airlol.rating (rater_id);
CREATE INDEX airlol_rating_type ON airlol.rating (type);
CREATE INDEX airlol_rating_rating ON airlol.rating (rating);

-- map
CREATE INDEX airlol_map_trip_good_tid ON airlol.map_trip_good (trip_id);
CREATE INDEX airlol_map_trip_good_gid ON airlol.map_trip_good (good_id);

-- map user message
CREATE INDEX airlol_map_user_message_uid ON airlol.map_user_message (user_id);
CREATE INDEX airlol_map_user_message_mid ON airlol.map_user_message (map_id);

-- message
CREATE INDEX airlol_message_sid ON airlol.message (sender_id);
CREATE INDEX airlol_message_rid ON airlol.message (receiver_id);
CREATE INDEX airlol_message_type ON airlol.message (type);
