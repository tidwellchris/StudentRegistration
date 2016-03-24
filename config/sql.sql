--First Insert Statement
insert into students
(student_id
,last_name
,first_name
,middle_name
,name_suffix
,gender
,common_name
,birthdate
,language
,custom_11
,email
,phone
,last_updated
,custom_10)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'students')
, 'Tidwell'
, 'Sam'
, 'T'
, null
, 'Male'
, null
, '1989-11-12'
, 'English'
, null
, 'tidwell@gmail.com'
, '770-443-4433'
, (select now())
, 'Preaching Certificate');

--Second insert Statement
--We will setup the schools in PHP so that the number is passed instead of school name
--School ID will be what is passed from the dropdown campus selection to the statement
Insert into student_enrollment
(id
, syear
, school_id
, student_id
, grade_id
, start_date
, enrollment_code
, next_school
, calendar_id
, last_updated)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_enrollment')
, (select max(syear) from school_years)
, (select id from schools where title = 'Marietta Campus')
, (select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
, (select year(curdate()))
, (Select curdate())
, 2
, (select id from schools where title = 'Marietta Campus')
, (select calendar_id from school_calendars where school_id =2 and default_calendar ='Y')
, (select now()));

--Insert into People
Insert into people
(staff_id
,current_school_id
,first_name
,last_name
,home_phone
,cell_phone
,email
,profile
,profile_id
,last_updated
)
Values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_enrollment')
,(select id from schools where title = 'Marietta Campus')
,'Fname'
,'lname'
,'ephone'
,'epphone2'
,'email'
,'parent'
,4
,(select now()));

--Insert Addresses 1
Insert into Student_address
(id
,student_id
,syear
,school_id
,street_address_1
,city
,state
,zipcode
,type
,last_updated
)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address')
,(select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
,(select max(syear) from school_years)
,(select id from schools where title = 'Marietta Campus')
,'streetaddress'
,'city'
,'state'
,'zip'
,'Home Address'
,(select now()));

--Insert Addresses 2
Insert into Student_address
(id
,student_id
,syear
,school_id
,street_address_1
,city
,state
,zipcode
,type
,last_updated
)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address')
,(select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
,(select max(syear) from school_years)
,(select id from schools where title = 'Marietta Campus')
,'streetaddress'
,'city'
,'state'
,'zip'
,'Mail'
,(select now()));

--Insert Addresses 3
Insert into Student_address
(id
,student_id
,syear
,school_id
,street_address_1
,city
,state
,zipcode
,type
,people_id
,last_updated
)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address')
,(select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
,(select max(syear) from school_years)
,(select id from schools where title = 'Marietta Campus')
,'streetaddress'
,'city'
,'state'
,'zip'
,(select staff_id from people where first_name ='efname' and last_name = 'elname')
,'Secondary'
,(select now()));

--Insert Addresses 4
Insert into Student_address
(id
,student_id
,syear
,school_id
,street_address_1
,city
,state
,zipcode
,type
,people_id
,last_updated
)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_address')
,(select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
,(select max(syear) from school_years)
,(select id from schools where title = 'Marietta Campus')
,'streetaddress'
,'city'
,'state'
,'zip'
,'Primary'
,(select staff_id from people where first_name ='efname' and last_name = 'elname')
,(select now()));

--Insert Medical
Insert into Student_medical_alerts
(id
,student_id
,title
,alert_date
,last_updated
)
values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_medical_alerts')
,(select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
,'MEDICAL INFO'
,(Select curdate())
,(Select now()));



--Last insert statement
Insert into login_authentication
(id
, user_id
, profile_id
, username
, password
, last_updated)
Values
((SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'student_enrollment')
, (select student_id from students where last_name='Tidwell' and Birthdate='1989-11-12')
, 3
, 'tidwellchris'
, (md5('myname84$'))
, (select now()));
