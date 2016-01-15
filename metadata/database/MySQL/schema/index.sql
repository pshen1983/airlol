-- user table
CREATE INDEX airlol_user_email ON airlol.user (email(60));
CREATE INDEX airlol_user_tel ON airlol.user (tel(14));

-- cms_item
CREATE INDEX airlol_cms_item_level ON airlol.cms_item (type);
CREATE INDEX airlol_cms_item_language ON airlol.cms_item (language(2));
CREATE INDEX airlol_cms_item_code ON airlol.cms_item (code(15));

-- cms_relation
CREATE INDEX airlol_cms_relation_parent ON airlol.cms_relation (parent_code(15));
CREATE INDEX airlol_cms_relation_child ON airlol.cms_relation (child_code(15));

-- trip
CREATE INDEX airlol_trip_user ON airlol.trip (user_id);
CREATE INDEX airlol_trip_departure ON airlol.trip (departure_id);
CREATE INDEX airlol_trip_arrival ON airlol.trip (arrival_id);
CREATE INDEX airlol_trip_date ON airlol.trip (trip_date);
CREATE INDEX airlol_trip_price ON airlol.trip (price);
CREATE INDEX airlol_trip_price_adjust ON airlol.trip (price_adjust(1));

-- good 
CREATE INDEX airlol_good_user ON airlol.good (user_id);
CREATE INDEX airlol_good_departure ON airlol.good (departure_id);
CREATE INDEX airlol_good_arrival ON airlol.good (arrival_id);
CREATE INDEX airlol_good_date ON airlol.good (trip_date);
CREATE INDEX airlol_good_price ON airlol.good (price);
CREATE INDEX airlol_good_price_adjust ON airlol.good (price_adjust(1));

-- rating
CREATE INDEX airlol_rating_trip ON airlol.rating (trip_id);
CREATE INDEX airlol_rating_user ON airlol.rating (user_id);
CREATE INDEX airlol_rating_rater ON airlol.rating (rater_id);
CREATE INDEX airlol_rating_type ON airlol.rating (type);
CREATE INDEX airlol_rating_rating ON airlol.rating (rating);
