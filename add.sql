USE 23bcs009;

CREATE TABLE users(username varchar(30) PRIMARY KEY, PASSWORD varchar(30) NOT NULL);

INSERT INTO users VALUES("Aditi","Aditi08");

CREATE TABLE customer (
  customer_name VARCHAR(15) NOT NULL,
  customer_street VARCHAR(15),
  customer_city VARCHAR(15) NOT NULL,
  PRIMARY KEY (customer_name)
);

CREATE TABLE branch (
  branch_name VARCHAR(15) NOT NULL,
  branch_city VARCHAR(15) NOT NULL,
  assets INTEGER(8) NOT NULL,
  PRIMARY KEY (branch_name)
);

CREATE TABLE account (
  account_number INTEGER(8) NOT NULL,
  branch_name VARCHAR(15) NOT NULL,
  balance INTEGER(8) NOT NULL,
  date DATE NOT NULL,
  PRIMARY KEY (account_number),
  FOREIGN KEY (branch_name) REFERENCES branch(branch_name)
);

CREATE TABLE loan (
  loan_number INTEGER(8) NOT NULL,
  branch_name VARCHAR(15) NOT NULL,
  amount INTEGER(8) NOT NULL,
  PRIMARY KEY (loan_number),
  FOREIGN KEY (branch_name) REFERENCES branch(branch_name)
);

CREATE TABLE depositor (
  customer_name VARCHAR(15) NOT NULL,
  account_number INTEGER(8) NOT NULL,
  PRIMARY KEY (customer_name, account_number),
  FOREIGN KEY (customer_name) REFERENCES customer(customer_name),
  FOREIGN KEY (account_number) REFERENCES account(account_number)
);

CREATE TABLE borrower (
  customer_name VARCHAR(15) NOT NULL,
  loan_number INTEGER(8) NOT NULL,
  PRIMARY KEY (customer_name, loan_number),
  FOREIGN KEY (customer_name) REFERENCES customer(customer_name),
  FOREIGN KEY (loan_number) REFERENCES loan(loan_number)
);


-- Insert data into customer table
INSERT INTO customer (customer_name, customer_street, customer_city) VALUES
  ("Amit", "Sarafa", "Patna"),
    ("Bani","Civil Lines", "Delhi"),
    ("Charu", NULL, "Raipur"),
     ("Jai", "South Street", "Mumbai"),
     ("Rahul", "Vijay Nagar", "Jabalpur"),
     ("Priya", "Main Street", "Bangalore"),
     ("Yash", "Hill Road", "Nagpur"),
     ("Vinay", "Main Street", "Banglore"),
     ("Anjali", "Mall Road", "Patna"),
     ("Divya", NULL, "Raipur"),
     ("Rohit", "Sadar", "Jabalpur"),
     ("Sakshi", "Park Street", "Kolkata");

-- Insert data into branch table
INSERT INTO branch (branch_name, branch_city, assets) VALUES
  ("Stadium", "Delhi", 710000),
    ("Wright Town", "Delhi", 9000000),
    ("Meghawan", "Hyderabad", 400000),
    ("North Town", "Raipur", 3700000),
    ("S Street", "Hyderabad", 1700000),
    ("Pownal", "Bilaspur", 300000),
    ("Cross Square", "Nagpur", 2100000),
    ("Napier Town", "Hyderabad", 8000000);


-- Insert data into account table
INSERT INTO account (account_number, branch_name, balance, date) VALUES
    (101,"Wright Town", 500, "2011-05-02"),
    (215,"Meghawan", 700, "2012-07-03"),
    (102,"S Street", 400, "2010-08-06"),
    (305,"Napier Town", 350, "2009-06-04"),
    (201,"Stadium", 900, "2010-04-09"),
    (222,"Cross Square",700, "2011-11-08"),
    (217,"Stadium", 750, "2012-10-12");

-- Insert data into loan table
INSERT INTO loan (loan_number, branch_name, amount) VALUES
  (11, 'Napier Town', 900),
  (14, 'Wright Town', 1500),
  (15, 'S Street', 1500),
  (16, 'S Street', 1300),
  (17, 'Wright Town', 1000),
  (23, 'Cross Square', 2000),
  (93, 'Meghawan', 500);

-- Insert data into depositor table
INSERT INTO depositor (customer_name, account_number) VALUES
  ("Priya", 102),
    ("Yash", 101),
    ("Yash", 201),
    ("Vinay", 217),
    ("Anjali", 222),
    ("Divya", 217),
    ("Rohit", 305);

-- Insert data into borrower table
INSERT INTO borrower (customer_name, loan_number) VALUES
  ("Amit", 16),
  ("Charu", 93),
  ("Priya", 15),
  ("Yash", 14),
  ("Vinay", 17),
  ("Divya", 11),
  ("Divya", 23),
  ("Sakshi", 17);