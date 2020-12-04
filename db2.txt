CREATE TABLE users(
    user_id number(10) NOT NULL PRIMARY KEY,
    first_name varchar2(150),
    last_name varchar2(150),
    phone varchar2(20),
    email varchar2(150),
    password varchar2(150)
);
select * from users;
insert into users(user_id,first_name,last_name,phone,email,password) values(1,'Harold','Trew','+7707878545','harold@gmail.com','test12345');

CREATE TABLE log_reports(
    log_id number(10) NOT NULL PRIMARY KEY,
    user_id number(10) DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    log_date DATE,
    event varchar2(250)
);

CREATE TABLE cars (
    car_id number(10) NOT NULL PRIMARY KEY,
    user_id number(10) DEFAULT 1,
    query_id number(10),
    city varchar2(150),
    in_market NUMBER(1,0),
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(query_id) REFERENCES queries(query_id)
)
create table test12(
    test_id number)
describe test12;

CREATE TABLE inMarket(
    post_id number(10) NOT NULL PRIMARY KEY,
    car_id number(10) DEFAULT 1,
    post_name varchar2(100) NOT NULL,
    post_description varchar2(500),
    user_id number(10),
    views number(30),
    added_to_wishlist number(10),
    created_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (car_id) REFERENCES cars(car_id)
)

CREATE TABLE wishlist(
    user_id number(10) DEFAULT 1,
    post_id number(10) NOT NULL,
    created_date date,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (post_id) REFERENCES inMarket(post_id)
)

CREATE TABLE comments(
    comment_id number(10) NOT NULL PRIMARY KEY,
    post_id number(10),
    user_id number(10) DEFAULT 1,
    comments_content varchar(500),
    is_read NUMBER(1,0),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (post_id) REFERENCES inMarket(post_id)
)

CREATE TABLE replies(
    reply_id number(10) NOT NULL PRIMARY KEY,
    comment_id number(10), 
    user_id number(10) DEFAULT 1,
    comment_content varchar2(500),
    is_read NUMBER(1,0),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (comment_id) REFERENCES comments(comment_id)
)

CREATE TABLE prediction_feedback(
    user_id number(10) DEFAULT 1,
    post_id number(10) NOT NULL ,
    created_date date,
    rate_of_prediction number(10),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (post_id) REFERENCES inMarket(post_id)
)

CREATE TABLE photos(
    car_id number(10) NOT NULL,
    image varchar2(400),
    FOREIGN KEY (car_id) REFERENCES inMarket(car_id)
)


-- created_date

-- PL/SQL

-- Package DateTransform
CREATE OR REPLACE PACKAGE dateTransform AS
    FUNCTION getCurrentYear(current_date date) return VARCHAR2;
    FUNCTION getCurrentMonth(current_date date) return VARCHAR2;
    FUNCTION getCurrentDay(current_date date) return VARCHAR2;
    FUNCTION getCurrentHour(current_date date) return VARCHAR2;
    FUNCTION getCurrentMinutes(current_date date) return VARCHAR2;
    FUNCTION getCurrentSeconds(current_date date) return VARCHAR2;
END dateTransform;

CREATE OR REPLACE PACKAGE BODY dateTransform AS
    FUNCTION getCurrentYear(current_date date) 
    return VARCHAR2 AS 
        currentYear varchar2(20);
    BEGIN
        currentYear := to_char(current_date, 'YYYY');
        return currentYear;
    END;
    -- Mode 1 - Januar , 2 - 01
    FUNCTION getCurrentMonth(current_date date, date_mode number) 
    return VARCHAR2 AS 
        currentYear varchar2;
    BEGIN
        if date_mode = 1 then
            currentYear := to_char(sysdate, 'Month');
        else 
            currentYear := MONTH(sysdate);
        end if;
        return currentYear;
    END;
    
    FUNCTION getCurrentDay(current_date date)
    return VARCHAR2 AS 
        currentYear varchar2;
    BEGIN
        return 0;
    END;
    FUNCTION getCurrentHour(current_date date)
    return VARCHAR2 AS 
        currentYear varchar2;
    BEGIN
        return 0;
    END;
    FUNCTION getCurrentMinutes(current_date date)
    return VARCHAR2 AS 
        currentMinutes varchar2;
    BEGIN
        return 0;
    END;
    FUNCTION getCurrentSeconds(current_date date)
    return VARCHAR2 AS 
        currentSeconds varchar2;
    BEGIN
        return 0;
    END;

end dateTransform;

select to_char(sysdate, 'YYYY') from dual;

CREATE OR REPLACE PACKAGE setters AS
    PROCEDURE addQuery(p_name varchar2,p_year number, p_shell varchar2, 
        p_mileage number, p_transmission varchar2, p_rudder varchar2, p_color varchar2, 
        p_gear varchar2, p_c_clear varchar2, p_typeengine varchar2, p_price number);

    PROCEDURE addCar(p_user_id number, p_query_id number, p_city varchar2, p_in_market number);
    
    PROCEDURE addToMarket(car_id number, post_name varchar2, post_description varchar2, user_id number, views number, added_to_wishlist number);

    PROCEDURE addComment(post_id number, user_id number, comment_content varchar2, is_read number);
    
    PROCEDURE addReply (comment_id number, user_id number, comment_content varchar2, is_read number);
    
    PROCEDURE addWishlist(user_id number , post_id number);
    
    PROCEDURE addLog(user_id number, log_date DATE, event varchar2);
    
    PROCEDURE addFeedback(user_id number, post_id number, rate_of_predict number);
    
    
end setters;

CREATE OR REPLACE PACKAGE BODY setters AS
    -- Insert query
    PROCEDURE addQuery
    (p_name varchar2,p_year number, p_shell varchar2, p_mileage number, p_transmission varchar2, p_rudder varchar2, p_color varchar2, p_gear varchar2, p_c_clear varchar2, p_typeengine varchar2, p_price number) 
    IS
    BEGIN
    -- QUestion should in queries be CITY?
        INSERT INTO queries(name, year, shell, volume, mileage, transmission, rudder, color, gear, customscleared, typeengine, price) 
        VALUES(p_name, p_year, p_shell, p_mileage, p_transmission, p_rudder, p_color, p_gear, p_c_clear, p_typeengine, p_price);
        COMMIT;
    END;
    -- Inser car
    PROCEDURE addCar
    (p_user_id number, p_query_id number, p_city varchar2, p_in_market number)
    IS
    BEGIN
        INSERT INTO cars(user_id, query_id, shell, city, in_market) 
        VALUES(p_user_id, p_query_id, p_shell, p_city, p_in_market);
        COMMIT;
    END;
    -- Insert to market
    PROCEDURE addToMarket
    (p_car_id number, p_post_name varchar2, p_post_description varchar2, 
    p_user_id number, p_views number, p_added_to_wishlist number)
    IS
    BEGIN
        INSERT INTO inMarket(car_id, post_name, post_description, 
        user_id, views, added_to_wishlist) 
        VALUES(p_car_id, p_post_name, p_post_description, p_user_id, p_views, p_added_to_wishlist);
        COMMIT;
    END;
    -- Insert to comment
    PROCEDURE addComment
    (p_post_id number, p_user_id number, p_comment_content varchar2, p_is_read number)    
    IS
    BEGIN
        INSERT INTO comments(post_id, user_id, comment_content, is_read) 
        VALUES(p_post_id , p_user_id , p_comment_content , p_is_read);
        COMMIT;
    END;
    -- Insert to reply
    PROCEDURE addReply
    (p_comment_id number, p_user_id number, p_comment_content p_varchar2, p_is_read number)    
    IS
    BEGIN
        INSERT INTO replies(comment_id , user_id , comment_content , is_read ) 
        VALUES(p_comment_id , p_user_id , p_comment_content , p_is_read );
        COMMIT;
    END;
    -- Insert to Wishlish
    PROCEDURE addWishlist
    (p_user_id number , p_post_id number)    
    IS
    BEGIN
        INSERT INTO wishlist(user_id  , post_id ) 
        VALUES(p_user_id  , p_post_id );
        COMMIT;
    END;
    -- Insert to addLog
    PROCEDURE addLog
    (p_user_id number, p_log_date DATE, p_event varchar2)    
    IS
    BEGIN
        INSERT INTO log_reports(user_id , log_date , event ) 
        VALUES(p_user_id , p_log_date , p_event );
        COMMIT;
    END;
    -- Insert to addFeedback
    PROCEDURE addFeedback
    (p_user_id number, p_post_id number, p_rate_of_predict number)    
    IS
    BEGIN
        INSERT INTO prediction_feedback(user_id , post_id , rate_of_predict ) 
        VALUES(p_user_id , p_post_id , p_rate_of_predict );
        COMMIT;
    END;
    
    -- SEQUENCES
    -- password done
    -- card data done
    -- face done 
    
    
end setters;

CREATE OR REPLACE PACKAGE updaters AS
    PROCEDURE updateQuery(p_columns varchar2, p_values varchar2, p_cond varchar2);

    PROCEDURE updateCar(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateMarket(p_columns varchar2, p_values varchar2, p_cond varchar2);

    PROCEDURE updateComment(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateReply(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateWishList(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateLog(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateFeedback(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
end updaters;

CREATE OR REPLACE PACKAGE BODY updaters AS
    PROCEDURE updateQuery(p_column varchar2, p_value varchar2, p_cond varchar2) AS
        v_block varchar(500);
        BEGIN
            SAVEPOINT;
            v_block := 'BEGIN UPDATE queries SET' || p_column || '=' || p_value || ' where ' || p_cond || ' END;';
            EXECUTE IMMEDIATE
        END;

    PROCEDURE updateCar(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateMarket(p_columns varchar2, p_values varchar2, p_cond varchar2);

    PROCEDURE updateComment(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateReply(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateWishList(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateLog(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
    PROCEDURE updateFeedback(p_columns varchar2, p_values varchar2, p_cond varchar2);
    
end updaters;



CREATE OR REPLACE PROCEDURE addLike(p_user_id number, p_post_id number) AS
begin
    UPDATE inMarket
    set likes = likes + 1
    where user_id = p_user_id and post_id = p_post_id;
end;

CREATE OR REPLACE PROCEDURE deleteLike(p_user_id number, p_post_id number) AS
begin
    UPDATE inMarket
    set likes = likes - 1
    where user_id = p_user_id and post_id = p_post_id;
end;


-- SEQUUENCES

CREATE SEQUENCE query_id_seq;
    
CREATE SEQUENCE post_id_seq;
    
CREATE SEQUENCE car_id_seq;

CREATE SEQUENCE reply_id_seq;

CREATE SEQUENCE comment_id_seq;

CREATE SEQUENCE log_id_seq;

CREATE SEQUENCE user_id_seq;
-- Need to log in as another user such as tyres and grant him all priviliges
-- GRANT ALL PRIVILEGES TO tyres;
-- DONT CREATE IT AS SYS or SYSTEM!
    -- TRIGGERS 
CREATE OR REPLACE TRIGGER updateCarId
    BEFORE INSERT 
    ON cars
    FOR EACH ROW
        
    BEGIN 
        SELECT car_id_seq.NEXTVAL
        INTO :new.car_id
        from dual;
    END;
    
CREATE OR REPLACE TRIGGER updatePostId
    BEFORE INSERT 
    ON inMarket
    FOR EACH ROW
        
    BEGIN 
        SELECT post_id_seq.NEXTVAL
        INTO :new.post_id
        from dual;
    END;
CREATE OR REPLACE TRIGGER updateQueryId
    BEFORE INSERT 
    ON queries
    FOR EACH ROW
        
    BEGIN 
        SELECT query_id_seq.NEXTVAL
        INTO :new.query_id
        from dual;
    END;

CREATE OR REPLACE TRIGGER updateCommentId
    BEFORE INSERT 
    ON comments
    FOR EACH ROW
        
    BEGIN 
        SELECT comment_id_seq.NEXTVAL
        INTO :new.comment_id
        from dual;
    END;


CREATE OR REPLACE TRIGGER updateLogId
    BEFORE INSERT 
    ON log_reports
    FOR EACH ROW
        
    BEGIN 
        SELECT log_id_seq.NEXTVAL
        INTO :new.log_id
        from dual;
    END;

CREATE OR REPLACE TRIGGER updateReplyId
    BEFORE INSERT 
    ON replies
    FOR EACH ROW
        
    BEGIN 
        SELECT reply_id_seq.NEXTVAL
        INTO :new.reply_id
        from dual;
    END;

CREATE OR REPLACE TRIGGER updateUserId
    BEFORE INSERT 
    ON users
    FOR EACH ROW
        
    BEGIN 
        SELECT user_id_seq.NEXTVAL
        INTO :new.user_id
        from dual;
    END;

-- Need to add triggers (they will invoked before insert and increment id automaticaly with sequences
-- Transaction
-- Cursors
-- 
CREATE OR REPLACE FUNCTION getCurrentMonthT(current_date date, date_mode number) 
    return VARCHAR2 AS 
        currentYear varchar2(20);
    BEGIN
        if date_mode = 1 then
            currentYear := to_char(sysdate, 'Month');
        else 
            select to_char(MONTH(sysdate)) from dual into currentYear;
        end if;
        return currentYear;
    END;
/
set serveroutput on;



CREATE OR REPLACE TYPE report IS 

-- Get cars older than some date
function carOlderThan(p_date date, 
-- Get reports of specific user for specific date

CREATE OR REPLACE PROCEDURE getUserLogs(p_date date, p_user_id number) AS
    CURSOR user_logs is (select log_id, log_date, event from log_reports);
    c_user_logs log_reports%rowtype;
BEGIN
    
END;

CREATE OR REPLACE PROCEDURE getReports(p_user_id number , p_date date) IS
    cursor c_list_reports is select log_id, log_date, event from log_reports where user_id = p_user_id and log_date = p_date; 
    v_list_reports c_list_reports%rowtype;
    begin
        open c_list_reports;
        LOOP
            FETCH c_list_reports INTO v_list_reports;
            EXIT WHEN c_list_reports%notfound;
            DBMS_OUTPUT.put_line('Log ID: ' || v_list_reports.log_id || '| Event: ' || v_list_reports.event || '| Date: ' || v_list_reports.log_date); 
        END LOOP;
    end getReports;
    
CREATE OR REPLACE FUNCTION getCommentRepliesCount(p_comment_id number)RETURN NUMBER AS
    commentReplies replies%rowtype;
    BEGIN
        select * into commentReplies from replies where comment_id = p_comment_id;
        return sql%rowcount;
    END;

CREATE OR REPLACE FUNCTION getUnreadCommentsCount(p_user_id number) RETURN NUMBER AS
    unreadComments comments%rowtype;
    BEGIN
        select * into unreadComments from comments where is_read = 0 and user_id = p_user_id;
        return sql%rowcount;
    END;


        
select * from queries;
create table queries(query_id number(10), query_name varchar2(200))      
insert into queries(query_id,car_model, release_year, shell, mileage, transmission, rudder, color, gear, custom_clear, price, engine_volume, created_date) values(1,'BMW','2000','Some shell',2343,'TRANSMISSION', 'RUDDER', 'COLOR', 'GEAR', 'CUTO','9343 4394','34', sysdate);
begin
updateQueryT('mileage',100,'query_id = 1');
end;
/