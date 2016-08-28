<?php
// trip
register('GET',  '/search/trips', new SearchTripController());
register('POST', '/trip/:tripid', new UpdateTripController());
register('POST', '/trip',         new CreateTripController(), new CreateTripValidator());

// good
register('GET',  '/search/goods', new SearchGoodController());
register('POST', '/good/:goodid', new UpdateGoodController());
register('POST', '/good',         new CreateGoodController(), new CreateGoodValidator());

// message
register('GET',  '/search/message', new SearchMessageController());
register('POST', '/message',        new CreateMessageController(), new CreateMessageValidator());
?>