create database if not exists miniyoutube;
use miniyoutube;
create table users(
	id int(255) auto_increment not null,
	role varchar(20),
	name varchar(255),
	surname varchar(255),
	email varchar(255),
	password varchar(255),
	image varchar(255),
	created_at datetime ,
	updated_at datetime,
	remember_token varchar(255),
	constraint pk_users primary key(id)
)engine=InnoDb;

create table videos(
	id int(255) auto_increment not null,
	userId int(255) not null,
	title varchar(255),
	description text,
	status varchar(20),
	image varchar(255),
	video_path varchar(255),
	created_at datetime,
	updated_at datetime,
	constraint pk_videos primary key(id),
	constraint fk_videos_users foreign key(userId) references users(id)
)engine=InnoDb;

create table comentarios(
	id int(255) auto_increment not null,
	userId int(255) not null,
	videoId int(255) not null,
	body text,
	created_at datetime ,
	updated_at datetime,
	constraint pk_comentarios primary key(id),
	constraint fk_comentarios_videos foreign key(videoId) references videos(id),
	constraint fk_comentarios_users foreign key(userId) references users(id)
)engine=InnoDb;