select * from user_;

insert into user_ values(4, "tebello", "mokoena", 10, "scandal", "learner");
delete from user_ where id=6;

create database nails_by_dion_database ;

create table appointments(appointmentID int auto_increment primary key, userID varchar(15), dateBooked datetime, scheduledDateTime datetime,stylist varchar(15), sessions int, status_ varchar(15), serviceID varchar(10) );
insert into appointments values(appointmentID, "userName", "2024-08-08 20:30", "2024-08-08 20:30","Dion",2, "unconfirmed", "hair");
insert into appointments values(appointmentID, "userName2", "2024-08-12", "20:27", "unconfirmed", "Eyes");
insert into appointments values(appointmentID, "userName3", "2024-08-12", "21:35", "unconfirmed", "Eyes");
select * from appointments order by appointmentID asc;
select * from appointments;



UPDATE appointments SET stylist="Vusi" ,sessions=8  WHERE appointmentID=35;
delete from appointments;
drop table appointments;

create table notifications(notificationID int auto_increment primary key, dateTime_ datetime, message varchar(300), status_ varchar(10), userID int, constraint userIDFK foreign key(userID) references appointments(appointmentID));
insert into notifications values(notificationID, "2024-08-08 20:27", "This is a message one", "approved", 102);
insert into notifications values(notificationID, "2024-03-15 22:27", "This is a message two", "approved", 101);
insert into notifications values(notificationID, "2024-05-26 08:27", "This is a message three", "approved", 102);
select dateTime_, message from notifications;
delete from notifications;

drop table notifications;

select * from appointments;
select *from notifications;

delete from appointments;
delete from notifications;