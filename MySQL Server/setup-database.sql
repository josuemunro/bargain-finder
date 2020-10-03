CREATE TABLE settings (
    search_string varchar(255) NOT NULL,
    open_time TIME NOT NULL,
    close_time TIME NOT NULL
);

CREATE TABLE favourites (
	listing_id varchar(255) NOT NULL,
	title varchar(255) NOT NULL,
	end_datetime varchar(255) NOT NULL,
	PRIMARY KEY (listing_id)
);

INSERT INTO settings (search_string, open_time, close_time) 
VALUES ('house' ,'11:00', '2:00');



