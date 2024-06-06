use madinati_db;

-- users
INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
VALUES('user','user','user@gmail.com','user@gmail.com','096665555444','lorem opessdas asadsa','M');
INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
VALUES('user1','user1','user1@gmail.com','12345678','096665555444','lorem opessdas asadsa','M');
INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
VALUES('user2','user2','user2@gmail.com','12345678','096665555444','lorem opessdas asadsa','M');
INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
VALUES('user3','user3','user3@gmail.com','12345678','096665555444','lorem opessdas asadsa','F');
INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
VALUES('user4','user4','user4@gmail.com','12345678','096665555444','lorem opessdas asadsa','F');
INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
VALUES('user5','user5','user5@gmail.com','12345678','096665555444','lorem opessdas asadsa','F');

-- tourist_guides
INSERT INTO tourist_guides (first_name,last_name,email,password,phone,address,gender,experience)
VALUES('guide','guide','guide@gmail.com','guide@gmail.com','096665555444','lorem opessdas asadsa','M',5);
 INSERT INTO tourist_guides (first_name,last_name,email,password,phone,address,gender,experience)
VALUES('guide1','guide1','guide1@gmail.com','12345678','096665555444','lorem opessdas asadsa','M',1);
INSERT INTO tourist_guides (first_name,last_name,email,password,phone,address,gender,experience)
VALUES('guide2','guide2','guide2@gmail.com','12345678','096665555444','lorem opessdas asadsa','M',4);
INSERT INTO tourist_guides (first_name,last_name,email,password,phone,address,gender,experience)
VALUES('guide3','guide3','guide3@gmail.com','12345678','096665555444','lorem opessdas asadsa','M',3);
INSERT INTO tourist_guides (first_name,last_name,email,password,phone,address,gender,experience)
VALUES('guide4','guide4','guide4@gmail.com','12345678','096665555444','lorem opessdas asadsa','F',6);
INSERT INTO tourist_guides (first_name,last_name,email,password,phone,address,gender,experience)
VALUES('guide5','guide5','guide5@gmail.com','12345678','096665555444','lorem opessdas asadsa','F',2);    


   
-- scheduled_packages
insert into scheduled_packages (id_tourist_guide,name,price,details,photo_url)
VALUES (1,'باكج الثلاثة أيام',0,'يوم 1: وصولهم إلى المدينة المنورة مع استقبال حار من قبل المرشد السياحي ومساعدتك في ايجاد فندق مناسب ( اذا لم يتم الحجز مسبقاً ) ثم بدأ الرحة ( إذا أرادوا ذلك ) 
يوم 2-3: جولة سياحية ممتعة في المدينة المنورة برفقة مرشد سياحي محترف، إلى الأماكن السياحية المختارة من قبل السائح وتكون ( دينية/ ترفيهية/تاريخية ) مع أخذهم لمطاعم للإفطار/والغداء/العشاء.','public/images/packages/t1.jfif');

insert into scheduled_packages (id_tourist_guide,name,price,details,photo_url)
VALUES (1,'باكج الخمسة أيام',0,'يوم 1: وصولهم إلى المدينة المنورة مع استقبال حار من قبل المرشد السياحي ومساعدتك في ايجاد فندق مناسب ( اذا لم يتم الحجز مسبقاً ) ثم بدأ الرحة ( إذا أرادوا ذلك ) 
يوم 2-5: جولة سياحية ممتعة في المدينة المنورة برفقة مرشد سياحي محترف، إلى الأماكن السياحية المختارة من قبل السائح وتكون ( دينية/ ترفيهية/تاريخية ) مع أخذهم لمطاعم للإفطار/والغداء/العشاء..','public/images/packages/t3.jfif');


insert into scheduled_packages (id_tourist_guide,name,price,details,photo_url)
values(1,'باكج يومين',555,'يوم 1: وصولهم إلى المدينة المنورة مع استقبال حار من قبل المرشد السياحي ومساعدتك في ايجاد فندق مناسب ( اذا لم يتم الحجز مسبقاً ) ثم بدأ الرحة ( إذا أرادوا ذلك ) 
يوم 2-3: جولة سياحية ممتعة في المدينة المنورة برفقة مرشد سياحي محترف، إلى الأماكن السياحية المختارة من قبل السائح وتكون ( دينية/ ترفيهية/تاريخية ) مع أخذهم لمطاعم للإفطار/والغداء/العشاء.','public/images/packages/t4.jfif');


-- feedbacks
insert into feedbacks (id_user,feedback_text) values(1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(2,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(3,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(3,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(3,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(4,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(4,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(2,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');
insert into feedbacks (id_user,feedback_text) values(5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa doloremque id provident! Perspiciatis');

-- tourist_guide_requests
insert into tourist_guide_requests (id_tourist_guide,name,price,details,date,photo_url,status)
values(1,'باكج السبعة أيام',850,'يوم 1: وصولهم إلى المدينة المنورة مع استقبال حار من قبل المرشد السياحي ومساعدتك في ايجاد فندق مناسب ( اذا لم يتم الحجز مسبقاً ) ثم بدأ الرحة ( إذا أرادوا ذلك ) 
يوم 2-3: جولة سياحية ممتعة في المدينة المنورة برفقة مرشد سياحي محترف، إلى الأماكن السياحية المختارة من قبل السائح وتكون ( دينية/ ترفيهية/تاريخية ) مع أخذهم لمطاعم للإفطار/والغداء/العشاء.',now(),'public/images/packages/t1.jfif','WaitingAccept');
insert into tourist_guide_requests (id_tourist_guide,name,price,details,date,photo_url,status)
values(2,'رحلة المدينة',500,'يوم 1: وصولهم إلى المدينة المنورة مع استقبال حار من قبل المرشد السياحي ومساعدتك في ايجاد فندق مناسب ( اذا لم يتم الحجز مسبقاً ) ثم بدأ الرحة ( إذا أرادوا ذلك ) 
يوم 2-5: جولة سياحية ممتعة في المدينة المنورة برفقة مرشد سياحي محترف، إلى الأماكن السياحية المختارة من قبل السائح وتكون ( دينية/ ترفيهية/تاريخية ) مع أخذهم لمطاعم للإفطار/والغداء/العشاء..',now(),'public/images/packages/t2.jfif','WaitingAccept');


