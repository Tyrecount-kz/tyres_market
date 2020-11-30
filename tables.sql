CREATE SEQUENCE USER_SEQ START WITH 100 increment by 1;

create table users(
    user_id number(20) DEFAULT USER_SEQ.NEXTVAL constraint user_id_pk primary key,
    first_name varchar2(20) constraint user_fn_nn not null,
    last_name varchar2(20) constraint user_ln_nn not null,
    phone number(11) constraint user_phone_nn not null, 
    email varchar2(50) CHECK(REGEXP_LIKE(email,'.+@gmail\.com$')),
    password varchar2(50) CHECK(REGEXP_like(password,'[A-Za-z0-9._%+-]{5,12}'))
);
                    
INSERT INTO USERS VALUES(default,'Bekzat','Admin','Almaty',87083527432,'gimtimes@gmail.com','tyres');         
INSERT INTO USERS VALUES(default,'Donald','Duck','Almaty',87022319612,'donaldtheduck@gmail.com','ZXCvbn456');
INSERT INTO USERS VALUES(default,'Trisha','Vang','Almaty',77788787507,'trishavang@gmail.com','heyyotrisha112'); 

CREATE SEQUENCE CAR_SEQ START WITH 100 increment by 1;

create table cars(
    car_id number(20) DEFAULT CAR_SEQ.NEXTVAL constraint car_id_pk primary key,
    user_id number(20) not null,
    query_id number(20),
    city varchar2,
    in_market number(1, 0) default 0
);
                    
INSERT INTO cars VALUES(default, 1, null, 'Алматы', 0);
INSERT INTO cars VALUES(default, 2, null, 'Алматы', 0);

CREATE SEQUENCE QUERY_SEQ START WITH 1000 increment by 1;                    
create table queries(
    query_id number(20) DEFAULT QUERY_SEQ.NEXTVAL constraint query_id_pk primary key,
    car_id number(20) not null,
    car_model varchar2(20) not null,
    release_year varchar2(20) not null,
    shell varchar2(20) not null,
    mileage varchar2(20) not null,
    transmission varchar2(20) not null,
    rudder varchar2(20) not null,
    color varchar2(20) not null,
    gear varchar2(20) not null,
    custom_clear varchar2(20) not null,
    engine_volume varchar2(20) not null,
    created_date DATE DEFAULT SYSDATE,
    price NUMBER(32) DEFAULT 0
);     

CREATE SEQUENCE MARKET_SEQ START WITH 100 increment by 1; 
create table inMarket(
    post_id number(20) DEFAULT MARKET_SEQ.NEXTVAL primary key,
    car_id number(20) not null,
    user_id number(20) not null,
    post_name varchar2(255),
    post_description varchar2(255),
    photo BLOB,
    created_date DATE default SYSDATE,
    interested number(20) DEFAULT 0,
    views number(20) default 0
); 

CREATE SEQUENCE COMMENT_SEQ START WITH 100 increment by 1; 
create table comments(
    comment_id number(20) DEFAULT COMMENT_SEQ.NEXTVAL primary key,
    post_id number(20) not null,
    user_id number(20) not null,
    comment_content varchar2(255) not null,
    is_read number(1, 0) default 0
); 

create table wishlist(
    post_id number(20) not null,
    user_id number(20) not null,
    created_date DATE default SYSDATE
); 

create table prediction_feedback(
    post_id number(20) not null,
    user_id number(20) not null,
    rate_of_prediction number(5) default 3,
    created_date DATE default SYSDATE
); 

commit;