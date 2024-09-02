CREATE TABLE customer(
	customer_id SERIAL PRIMARY KEY,
	customer_name text,
	customer_phone_no INT,
	customer_address text
);
CREATE TABLE Employee2(
	Employee_id SERIAL PRIMARY KEY,
	Employee_name text,
	Employee_phone_no INT,
	Employee_address text,
	Employee_DOB INT ,
	Employee_salary INT 
);
CREATE TABLE Branches(
	Branch_id SERIAL PRIMARY KEY,
	Branch_manager_name text,
	Branch_phone_no INT,
	Branch_Location text,
	Branch_no_of_employees INT 
);
 drop table customer;
 drop table Employee2;
 drop table Branches;
alter table Employee2 add constraint fkey1 foreign key(customer_id) references
customer(customer_id );


