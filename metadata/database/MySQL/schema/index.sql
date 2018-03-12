-- user
CREATE INDEX cairyme_user_email ON cairyme.user (email(60));
CREATE INDEX cairyme_user_tel ON cairyme.user (tel(14));

-- cookie_token
CREATE INDEX cairyme_cookie_token_type ON cairyme.cookie_token (type);
CREATE INDEX cairyme_cookie_token_value ON cairyme.cookie_token (value(64));
CREATE INDEX cairyme_cookie_token_expires ON cairyme.cookie_token (expires);

-- cms_item
CREATE INDEX cairyme_cms_item_language ON cairyme.cms_item (language(2));
CREATE INDEX cairyme_cms_item_code ON cairyme.cms_item (code(64));

-- cms_relation
CREATE INDEX cairyme_cms_relation_type ON cairyme.cms_relation (type(8));
CREATE INDEX cairyme_cms_relation_parent ON cairyme.cms_relation (parent_code(64));
CREATE INDEX cairyme_cms_relation_child ON cairyme.cms_relation (child_code(64));

-- trip
CREATE INDEX cairyme_trip_user ON cairyme.trip (user_id);
CREATE INDEX cairyme_trip_departure ON cairyme.trip (departure_code(15));
CREATE INDEX cairyme_trip_arrival ON cairyme.trip (arrival_code(15));
CREATE INDEX cairyme_trip_date ON cairyme.trip (trip_date);
CREATE INDEX cairyme_trip_price ON cairyme.trip (price);
CREATE INDEX cairyme_trip_space_type ON cairyme.trip (space_type);
CREATE INDEX cairyme_trip_price_adjust ON cairyme.trip (currency(3));
CREATE INDEX cairyme_trip_active ON cairyme.trip (active(1));
CREATE INDEX cairyme_trip_time ON cairyme.trip (create_time);

-- good 
CREATE INDEX cairyme_good_user ON cairyme.good (user_id);
CREATE INDEX cairyme_good_departure ON cairyme.good (departure_code(15));
CREATE INDEX cairyme_good_arrival ON cairyme.good (arrival_code(15));
CREATE INDEX cairyme_good_date ON cairyme.good (end_date);
CREATE INDEX cairyme_good_price ON cairyme.good (price);
CREATE INDEX cairyme_good_type ON cairyme.good (type);
CREATE INDEX cairyme_good_price_adjust ON cairyme.good (currency(1));
CREATE INDEX cairyme_good_active ON cairyme.good (active(1));
CREATE INDEX cairyme_good_time ON cairyme.good (create_time);

-- rating
CREATE INDEX cairyme_rating_trip ON cairyme.rating (trip_good_map_id);
CREATE INDEX cairyme_rating_user ON cairyme.rating (user_id);
CREATE INDEX cairyme_rating_rater ON cairyme.rating (rater_id);
CREATE INDEX cairyme_rating_type ON cairyme.rating (type);
CREATE INDEX cairyme_rating_rating ON cairyme.rating (rating);

-- map
CREATE INDEX cairyme_map_trip_good_tid ON cairyme.map_trip_good (trip_id);
CREATE INDEX cairyme_map_trip_good_gid ON cairyme.map_trip_good (good_id);

-- map user message
CREATE INDEX cairyme_map_user_message_uid ON cairyme.map_user_message (user_id);
CREATE INDEX cairyme_map_user_message_mid ON cairyme.map_user_message (map_id);

-- message
CREATE INDEX cairyme_message_sid ON cairyme.message (sender_id);
CREATE INDEX cairyme_message_rid ON cairyme.message (receiver_id);
CREATE INDEX cairyme_message_type ON cairyme.message (type);
