drop database if exists madinati_db;
create database if not exists madinati_db;
use madinati_db;

CREATE TABLE IF NOT EXISTS admins (
	id_admin int not null unique auto_increment,
    first_name varchar(45) not null,
	last_name varchar(45) not null,
    email varchar(200) unique not null,
	password varchar(100) not null,
	phone varchar(20) not null,
	address varchar(200)not null,
	PRIMARY KEY (id_admin)
);

CREATE TABLE IF NOT EXISTS users (
	id_user int not null unique auto_increment,
	first_name varchar(45) not null,
	last_name varchar(45) not null,
	email varchar(200) unique not null,
	gender char(1) not null,
	password varchar(100) not null,
	phone varchar(20) not null,
	address varchar(200)not null,
	CHECK (gender = "M" OR gender = "F" ),
  
	PRIMARY KEY (id_user)
);
    
CREATE TABLE IF NOT EXISTS tourist_guides (
	id_tourist_guide int not null unique auto_increment,
	first_name varchar(45) not null,
	last_name varchar(45) not null,
	email varchar(200) unique not null,
	gender char(1) not null,
	password varchar(100) not null,
    experience int not null,
	phone varchar(20) not null,
	address varchar(200)not null,
    status  varchar(16) not null default('NotActivated'),
	CHECK (gender = "M" OR gender = "F" ),
  
	PRIMARY KEY (id_tourist_guide)
);
CREATE TABLE IF NOT EXISTS scheduled_packages (
	id_scheduled_package int not null unique auto_increment,
    id_tourist_guide int not null,
    name varchar(60) not null,
    price int not null,
    details varchar(500) not null,
    photo_url varchar(200)not null,
    
    PRIMARY KEY (id_scheduled_package),
    CONSTRAINT scheduled_packages_fk1 FOREIGN KEY (id_tourist_guide) REFERENCES tourist_guides (id_tourist_guide) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tourist_guide_requests (
	id_guide_request int not null unique auto_increment,
    id_tourist_guide int not null,
    name varchar(60) not null,
    price int not null,
    details varchar(500) not null,
    date datetime not null,
    photo_url varchar(200)not null,
    status  varchar(16) not null,
    
    PRIMARY KEY (id_guide_request),
    CONSTRAINT tourist_guide_requests_fk1 FOREIGN KEY (id_tourist_guide) REFERENCES tourist_guides (id_tourist_guide) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS user_requests (
	id_user_request int not null unique auto_increment,
    id_user int not null,
    id_scheduled_package int not null,
    name varchar(60) not null,
    price int not null,
    details varchar(500) not null,
    date datetime not null,
    status  varchar(16) not null,
    
    PRIMARY KEY (id_user_request),
    CONSTRAINT user_requests_users_fk FOREIGN KEY (id_user) REFERENCES users (id_user) ON DELETE CASCADE,
    CONSTRAINT user_requests_scheduled_packages_fk FOREIGN KEY (id_scheduled_package) REFERENCES scheduled_packages (id_scheduled_package) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS feedbacks (
	id_feedback int not null unique auto_increment,
    id_user int not null,
    feedback_text varchar(1000)not null,
    
    PRIMARY KEY (id_feedback),
    CONSTRAINT feedbacks_users_fk FOREIGN KEY (id_user) REFERENCES users (id_user) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS reviews (
	id_review int not null unique auto_increment,
    id_user int not null,
    id_scheduled_package int not null,
    review_text varchar(500)not null,
    
    PRIMARY KEY (id_review),
    CONSTRAINT reviews_users_fk FOREIGN KEY (id_user) REFERENCES users (id_user) ON DELETE CASCADE,
    CONSTRAINT reviews_scheduled_packages_fk FOREIGN KEY (id_scheduled_package) REFERENCES scheduled_packages (id_scheduled_package) ON DELETE CASCADE
);

-- admins
INSERT INTO admins (first_name,last_name,email,password,phone,address)
VALUES('admin','admin','admin@gmail.com','admin@gmail.com','096665555444','lorem opessdas asadsa');
