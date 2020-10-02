CREATE TABLE settings (
    search_string varchar(255) NOT NULL,
    open_datetime int(13) NOT NULL,
    close_datetime int(13) NOT NULL
);

CREATE TABLE favourites (
	listing_id int(10) NOT NULL,
	title varchar(255) NOT NULL,
	end_datetime int(13) NOT NULL,
	PRIMARY KEY (listing_id)
);



