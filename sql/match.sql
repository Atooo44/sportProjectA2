DELETE FROM match;

ALTER SEQUENCE match_id_match_seq RESTART;
INSERT INTO match (sport, max_player, date, length, price, score, best_player, mail, city) VALUES

('Volleyball', '5', '2022-11-30 01:11:59', 87,24,'0-0','undef','croger@faure.com','Toulouse' ),
('Volleyball', '22', '2022-12-06 21:28:48', 129,2,'0-0','undef','dbrunet@potier.net','Caen' ),
('Basketball', '17', '2022-11-14 23:28:09', 122,28,'0-0','undef','croger@faure.com','Tours' ),
('Tennis', '30', '2022-11-01 08:47:39', 165,22,'0-0','undef','eugenelebreton@voila.fr','Marseille' ),
('Tennis', '33', '2022-09-27 22:37:46', 83,12,'0-0','undef','thierry00@georges.com','Paris' ),
('Basketball', '21', '2022-08-02 06:12:28', 56,16,'0-0','undef','nbousquet@charpentier.fr','Toulouse' ),
('Tennis', '27', '2022-11-06 01:33:37', 103,25,'0-0','undef','andre42@hotmail.fr','Reims' ),
('Tennis', '24', '2022-10-06 11:07:36', 54,18,'0-0','undef','gaudinemmanuel@free.fr','Lyon' ),
('Football', '35', '2022-12-20 10:33:34', 57,22,'0-0','undef','timotheedupre@laposte.net','Vileurbanne' ),
('Football', '4', '2022-08-09 03:36:06', 65,12,'0-0','undef','denishamon@delahaye.com','Metz' ),
('Volleyball', '32', '2022-11-29 08:50:27', 170,27,'0-0','undef','thierry00@georges.com','Grenoble' ),
('Basketball', '23', '2022-12-06 14:25:41', 100,4,'0-0','undef','patricia24@hotmail.fr','Rennes' ),
('Tennis', '17', '2022-07-20 04:09:02', 172,10,'0-0','undef','pbouvier@couturier.fr','Grenoble' ),
('Volleyball', '21', '2022-07-15 09:34:56', 15,19,'0-0','undef','dufourvalentine@tele2.fr','Montpelier' ),
('Babyfoot', '3', '2022-07-07 16:19:09', 174,26,'0-0','undef','dbrunet@potier.net','Paris' ),
('Rugby', '25', '2022-11-09 04:20:32', 170,19,'0-0','undef','dbrunet@potier.net','Brest' ),
('Basketball', '27', '2022-12-23 10:06:43', 119,29,'0-0','undef','josephlejeune@perrin.com','Toulon' ),
('Rugby', '33', '2022-08-31 18:29:01', 88,1,'0-0','undef','monniercelina@gilbert.fr','Saint Denis' ),
('Volleyball', '14', '2022-10-15 22:38:45', 49,6,'0-0','undef','valentine56@philippe.com','Tours' ),
('Rugby', '30', '2022-08-10 21:00:16', 143,0,'0-0','undef','josetteguillou@fontaine.com','Paris' ),
('Tennis', '3', '2022-09-11 01:44:31', 12,30,'0-0','undef','gaudinemmanuel@free.fr','Tours' ),
('Rugby', '27', '2022-10-21 21:36:15', 14,23,'0-0','undef','launaydanielle@bourgeois.org','Tours' ),
('Tennis', '10', '2022-12-09 13:38:40', 63,11,'0-0','undef','antoine38@clerc.com','Reims' ),
('Rugby', '27', '2022-12-17 22:26:22', 19,15,'0-0','undef','charrieralphonse@yahoo.fr','Mans' ),
('Football', '33', '2022-11-07 21:28:07', 173,24,'0-0','undef','josetteguillou@fontaine.com','Montpelier' ),
('Rugby', '30', '2022-08-01 09:30:08', 37,30,'0-0','undef','pfabre@laporte.com','Saint Denis' ),
('Volleyball', '34', '2022-09-26 20:33:19', 18,16,'0-0','undef','andredias@lacombe.fr','Nîmes' ),
('Babyfoot', '22', '2022-07-28 23:55:11', 23,10,'0-0','undef','patricia24@hotmail.fr','Reims' ),
('Rugby', '15', '2022-08-26 16:22:39', 45,20,'0-0','undef','claudine79@bigot.fr','Caen' ),
('Tennis', '25', '2022-07-18 18:24:09', 22,7,'0-0','undef','antoine38@clerc.com','Mans' ),
('Football', '29', '2022-11-27 11:57:53', 88,9,'0-0','undef','andre42@hotmail.fr','Vileurbanne' ),
('Rugby', '35', '2022-09-02 09:20:16', 90,27,'0-0','undef','josephlejeune@perrin.com','Lile' ),
('Basketball', '2', '2022-08-07 07:42:05', 148,18,'0-0','undef','gregoireanais@coste.com','Nice' ),
('Tennis', '5', '2022-10-03 01:31:24', 165,0,'0-0','undef','paulbertin@orange.fr','Mans' ),
('Football', '27', '2022-08-27 15:20:07', 42,3,'0-0','undef','eugenelebreton@voila.fr','Grenoble' ),
('Football', '32', '2022-11-16 07:36:41', 131,5,'0-0','undef','timotheedupre@laposte.net','Reims' ),
('Football', '10', '2022-05-16 07:36:41', 120,5,'8-0','Ayoub Karine','bastien@gmail.com','Nantes' ),
('Babyfoot', '1', '2022-06-19 12:00:00', 180,0,'0-0','undef','bastien@gmail.com','Nantes' ),
('Basketball', '1', '2022-06-25 18:00:00', 80,3,'0-0','undef','bastien@gmail.com','Nantes' ),
('Volleyball', '3', '2022-07-10 10:00:00', 30,0,'0-0','undef','bastien@gmail.com','Nantes' ),
('Tennis', '3', '2022-06-02 14:00:00', 60,8,'1-3','Bastien Huard','gregoireanais@coste.com','Nantes' );

