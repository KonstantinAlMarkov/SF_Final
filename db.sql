CREATE type user_state as enum('active','disabled');
CREATE type program_state as enum('active','disabled');
CREATE type subscription_state as enum('active','disabled');

CREATE TABLE users (
	user_id serial NOT NULL,
    user_name varchar(30),
    user_surname varchar(30),
	user_login varchar(30) NOT NULL,
	user_password varchar(32) NOT NULL,
	user_hash varchar(32) NOT NULL DEFAULT ''::character varying,
    user_image varchar(50),
    user_status user_state DEFAULT 'active',
    persent int DEFAULT 5,
	wallet float DEFAULT 0,
	user_ip int,
	CONSTRAINT unique_login UNIQUE (user_login),
	CONSTRAINT users_pkey PRIMARY KEY (user_id),
    constraint valid_persent_100 check (persent < 100),
    constraint valid_persent_0 check (persent >= 0),
    constraint valid_wallet check (wallet >= 0)	      
);

CREATE TABLE roles (
	role_id serial NOT NULL,
	role_name varchar(30) NOT NULL,
	CONSTRAINT roles_pkey PRIMARY KEY (role_id)
);

CREATE TABLE rolesmap (
	role_id int4 NOT NULL,
	user_id int4 NOT NULL,
	CONSTRAINT rolesmap_pkey PRIMARY KEY (role_id, user_id)
);

CREATE TABLE programs (
	program_id serial NOT NULL,   
    owner int4 NOT NULL,
    program_name varchar(30) NOT NULL,
 	description  varchar(150),
 	url varchar(150) NOT NULL,
    price real NOT NULL,
    image varchar(50),
    date_start DATE,
    date_end DATE,
    program_status program_state DEFAULT 'active',
    CONSTRAINT programs_pkey PRIMARY KEY (program_id)
);

CREATE TABLE subscriptions (
	subsription_id serial NOT NULL,
	user_id int4 NOT NULL,
    program_id int4 NOT NULL,
	link varchar(150) NOT NULL,
	CONSTRAINT subscriptions_pkey PRIMARY KEY (subsription_id)  
);

CREATE TABLE transactions (
	transaction_id  serial NOT NULL, 
	subsription_id int4 NOT NULL,    
    append_date DATE, 
    price real NOT NULL,
    tax real NOT NULL,    
	CONSTRAINT transaction_pkey PRIMARY KEY (transaction_id)           
);

CREATE TABLE frauds (
	fraud_id serial NOT NULL,
	program_id int4 NOT NULL,
	webmaster_id int4 NOT NULL,	
    append_date DATE,	
	CONSTRAINT frauds_pkey PRIMARY KEY (fraud_id)
);

ALTER TABLE frauds ADD CONSTRAINT fk_fraudusr FOREIGN KEY (webmaster_id) REFERENCES users(user_id);
ALTER TABLE frauds ADD CONSTRAINT fk_fraudprograms FOREIGN KEY (program_id) REFERENCES programs(program_id);



-- rolesmap foreign keys
ALTER TABLE rolesmap ADD CONSTRAINT fk_roles FOREIGN KEY (role_id) REFERENCES roles(role_id);
ALTER TABLE rolesmap ADD CONSTRAINT fk_users FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE programs ADD CONSTRAINT fk_programs_usr FOREIGN KEY (owner) REFERENCES users(user_id);

ALTER TABLE subscriptions ADD CONSTRAINT fk_subscriprions_usr FOREIGN KEY (user_id) REFERENCES users(user_id);
ALTER TABLE subscriptions ADD CONSTRAINT fk_subscriprions_prog FOREIGN KEY (program_id) REFERENCES programs(program_id);

ALTER TABLE transactions ADD CONSTRAINT fk_transction_sub FOREIGN KEY (subsription_id) REFERENCES subscriptions(subsription_id);

INSERT INTO roles(role_name)
VALUES ('Администратор');
INSERT INTO roles(role_name)
VALUES ('Вебмастер');
INSERT INTO roles(role_name)
VALUES ('Клиент');

INSERT INTO users(user_name,user_surname,user_login, user_password)
VALUES ('admin','admin','admin','123');

INSERT INTO rolesmap(role_id,user_id)
VALUES (1,1);