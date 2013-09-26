

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `suggestions` ;
DROP TABLE IF EXISTS `statuts` ;
DROP TABLE IF EXISTS `arrondissement` ;
DROP TABLE IF EXISTS `quartier` ;
DROP TABLE IF EXISTS `budget` ;
DROP TABLE IF EXISTS `categories` ;
DROP TABLE IF EXISTS `sous_categories` ;
DROP TABLE IF EXISTS `sous_categories2` ;

DROP TABLE IF EXISTS `contributeurs_avis_utiles` ;
DROP TABLE IF EXISTS `contributeurs_aiment_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_aiment_pas_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_wish_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_follow_enseignes` ;
DROP TABLE IF EXISTS `contributeurs_aiment_objets` ;
DROP TABLE IF EXISTS `contributeurs_aiment_pas_objets` ;
DROP TABLE IF EXISTS `contributeurs_wish_objets` ;
DROP TABLE IF EXISTS `objets` ;
DROP TABLE IF EXISTS `contributeurs_follow_contributeurs` ;


ALTER TABLE `enseignes` DROP `sscategorie_enseigne`
, DROP `id_quartier`
, DROP `id_budget`
, DROP `box_enseigne`
, DROP `slide1_enseigne`
, DROP `slide2_enseigne`
, DROP `slide3_enseigne`
, DROP `slide4_enseigne`
, DROP `slide5_enseigne`
, DROP `x1`
, DROP `y1`
, DROP `y2`
, DROP `y3`
, DROP `y4`
, DROP `y5`
, DROP `video_enseigne`
, DROP `fb_enseigne`
, DROP `tw_enseigne`
, DROP `goog_enseigne` ;

ALTER TABLE `contributeurs` DROP `date_inscription`
, DROP `slide1_contributeur`
, DROP `slide2_contributeur`
, DROP `slide3_contributeur`
, DROP `slide4_contributeur`
, DROP `slide5_contributeur`
, DROP `y1`
, DROP `y2`
, DROP `y3`
, DROP `y4`
, DROP `y5`
, DROP `profession_contributeur`
, DROP `descriptif_contributeur` ;

ALTER TABLE `contributeurs` ADD `date_inscription` datetime DEFAULT NULL
, ADD `slide1_contributeur` varchar(45) DEFAULT NULL
, ADD `slide2_contributeur` varchar(45) DEFAULT NULL
, ADD `slide3_contributeur` varchar(45) DEFAULT NULL
, ADD `slide4_contributeur` varchar(45) DEFAULT NULL
, ADD `slide5_contributeur` varchar(45) DEFAULT NULL
, ADD `y1` int(10) DEFAULT 0
, ADD `y2` int(10) DEFAULT 0
, ADD `y3` int(10) DEFAULT 0
, ADD `y4` int(10) DEFAULT 0
, ADD `y5` int(10) DEFAULT 0
, ADD `profession_contributeur` varchar(45) DEFAULT NULL
, ADD `descriptif_contributeur` longtext DEFAULT NULL ;

UPDATE `contributeurs` SET groupes_permissions_id_permission = 4 WHERE id_contributeur = 2825 ;
UPDATE `contributeurs` SET groupes_permissions_id_permission = 4 WHERE id_contributeur = 4866 ;

ALTER TABLE `enseignes` ADD `sscategorie_enseigne` int(10) unsigned NOT NULL
, ADD `id_quartier` int(10) unsigned DEFAULT NULL
, ADD `id_budget` int(10) unsigned NOT NULL
, ADD `slide1_enseigne` varchar(45) DEFAULT NULL
, ADD `slide2_enseigne` varchar(45) DEFAULT NULL
, ADD `slide3_enseigne` varchar(45) DEFAULT NULL
, ADD `slide4_enseigne` varchar(45) DEFAULT NULL
, ADD `slide5_enseigne` varchar(45) DEFAULT NULL
, ADD `x1` int(10) DEFAULT 0
, ADD `y1` int(10) DEFAULT 0
, ADD `y2` int(10) DEFAULT 0
, ADD `y3` int(10) DEFAULT 0
, ADD `y4` int(10) DEFAULT 0
, ADD `y5` int(10) DEFAULT 0
, ADD `box_enseigne` varchar(45) DEFAULT NULL
, ADD `video_enseigne` varchar(255) DEFAULT NULL
, ADD `fb_enseigne` varchar(255) DEFAULT NULL
, ADD `tw_enseigne` varchar(255) DEFAULT NULL
, ADD `goog_enseigne` varchar(255) DEFAULT NULL ;

UPDATE `enseignes` SET sscategorie_enseigne =301, id_quartier=1, id_budget=4 WHERE id_enseigne=1 ;
UPDATE `enseignes` SET sscategorie_enseigne =68, id_quartier=0, id_budget=4 WHERE id_enseigne=2 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=4 WHERE id_enseigne=3 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=0, id_budget=4 WHERE id_enseigne=4 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=0, id_budget=4 WHERE id_enseigne=5 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=0, id_budget=4 WHERE id_enseigne=6 ;
UPDATE `enseignes` SET sscategorie_enseigne =183, id_quartier=0, id_budget=4 WHERE id_enseigne=7 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=4 WHERE id_enseigne=8 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=4 WHERE id_enseigne=9 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=0, id_budget=4 WHERE id_enseigne=10 ;
UPDATE `enseignes` SET sscategorie_enseigne =183, id_quartier=31, id_budget=1 WHERE id_enseigne=11 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=4 WHERE id_enseigne=12 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=4 WHERE id_enseigne=13 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=0, id_budget=4 WHERE id_enseigne=14 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=54, id_budget=4 WHERE id_enseigne=15 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=27, id_budget=1 WHERE id_enseigne=16 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=27, id_budget=1 WHERE id_enseigne=17 ;
UPDATE `enseignes` SET sscategorie_enseigne =301, id_quartier=17, id_budget=2 WHERE id_enseigne=18 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=17, id_budget=3 WHERE id_enseigne=19 ;
UPDATE `enseignes` SET sscategorie_enseigne =58, id_quartier=0, id_budget=2 WHERE id_enseigne=20 ;
UPDATE `enseignes` SET sscategorie_enseigne =48, id_quartier=0, id_budget=2 WHERE id_enseigne=21 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=0, id_budget=2 WHERE id_enseigne=22 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=0, id_budget=2 WHERE id_enseigne=23 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=3 WHERE id_enseigne=24 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=25 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=26 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=0, id_budget=2 WHERE id_enseigne=27 ;
UPDATE `enseignes` SET sscategorie_enseigne =58, id_quartier=0, id_budget=3 WHERE id_enseigne=28 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=0, id_budget=3 WHERE id_enseigne=29 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=30 ;
UPDATE `enseignes` SET sscategorie_enseigne =292, id_quartier=0, id_budget=2 WHERE id_enseigne=31 ;
UPDATE `enseignes` SET sscategorie_enseigne =620, id_quartier=0, id_budget=2 WHERE id_enseigne=32 ;
UPDATE `enseignes` SET sscategorie_enseigne =17, id_quartier=0, id_budget=2 WHERE id_enseigne=33 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=34 ;
UPDATE `enseignes` SET sscategorie_enseigne =78, id_quartier=0, id_budget=2 WHERE id_enseigne=35 ;
UPDATE `enseignes` SET sscategorie_enseigne =331, id_quartier=0, id_budget=2 WHERE id_enseigne=36 ;
UPDATE `enseignes` SET sscategorie_enseigne =237, id_quartier=0, id_budget=2 WHERE id_enseigne=37 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=41, id_budget=2 WHERE id_enseigne=38 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=46, id_budget=2 WHERE id_enseigne=39 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=1, id_budget=2 WHERE id_enseigne=40 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=41 ;
UPDATE `enseignes` SET sscategorie_enseigne =48, id_quartier=0, id_budget=2 WHERE id_enseigne=42 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=43 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=0, id_budget=2 WHERE id_enseigne=44 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=45 ;
UPDATE `enseignes` SET sscategorie_enseigne =221, id_quartier=0, id_budget=2 WHERE id_enseigne=46 ;
UPDATE `enseignes` SET sscategorie_enseigne =45, id_quartier=0, id_budget=2 WHERE id_enseigne=47 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=0, id_budget=2 WHERE id_enseigne=48 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=0, id_budget=2 WHERE id_enseigne=49 ;
UPDATE `enseignes` SET sscategorie_enseigne =653, id_quartier=0, id_budget=2 WHERE id_enseigne=50 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=0, id_budget=2 WHERE id_enseigne=51 ;
UPDATE `enseignes` SET sscategorie_enseigne =164, id_quartier=0, id_budget=2 WHERE id_enseigne=52 ;
UPDATE `enseignes` SET sscategorie_enseigne =150, id_quartier=0, id_budget=2 WHERE id_enseigne=53 ;
UPDATE `enseignes` SET sscategorie_enseigne =612, id_quartier=0, id_budget=2 WHERE id_enseigne=54 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=0, id_budget=2 WHERE id_enseigne=55 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=0, id_budget=2 WHERE id_enseigne=56 ;
UPDATE `enseignes` SET sscategorie_enseigne =653, id_quartier=0, id_budget=2 WHERE id_enseigne=57 ;
UPDATE `enseignes` SET sscategorie_enseigne =637, id_quartier=0, id_budget=2 WHERE id_enseigne=58 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=0, id_budget=2 WHERE id_enseigne=59 ;
UPDATE `enseignes` SET sscategorie_enseigne =216, id_quartier=0, id_budget=2 WHERE id_enseigne=60 ;
UPDATE `enseignes` SET sscategorie_enseigne =54, id_quartier=0, id_budget=2 WHERE id_enseigne=61 ;
UPDATE `enseignes` SET sscategorie_enseigne =229, id_quartier=0, id_budget=2 WHERE id_enseigne=62 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=49, id_budget=3 WHERE id_enseigne=63 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=61, id_budget=2 WHERE id_enseigne=64 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=24, id_budget=3 WHERE id_enseigne=65 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=64, id_budget=2 WHERE id_enseigne=66 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=32, id_budget=2 WHERE id_enseigne=67 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=13, id_budget=2 WHERE id_enseigne=68 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=15, id_budget=2 WHERE id_enseigne=69 ;
UPDATE `enseignes` SET sscategorie_enseigne =101, id_quartier=19, id_budget=2 WHERE id_enseigne=70 ;
UPDATE `enseignes` SET sscategorie_enseigne =32, id_quartier=7, id_budget=2 WHERE id_enseigne=71 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=69, id_budget=3 WHERE id_enseigne=72 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=54, id_budget=2 WHERE id_enseigne=73 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=42, id_budget=2 WHERE id_enseigne=74 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=25, id_budget=2 WHERE id_enseigne=75 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=78, id_budget=2 WHERE id_enseigne=76 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=48, id_budget=2 WHERE id_enseigne=77 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=56, id_budget=2 WHERE id_enseigne=78 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=59, id_budget=2 WHERE id_enseigne=79 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=79, id_budget=2 WHERE id_enseigne=80 ;
UPDATE `enseignes` SET sscategorie_enseigne =109, id_quartier=26, id_budget=2 WHERE id_enseigne=81 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=17, id_budget=2 WHERE id_enseigne=82 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=19, id_budget=3 WHERE id_enseigne=83 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=45, id_budget=2 WHERE id_enseigne=84 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=55, id_budget=2 WHERE id_enseigne=85 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=79, id_budget=2 WHERE id_enseigne=86 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=17, id_budget=2 WHERE id_enseigne=87 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=42, id_budget=2 WHERE id_enseigne=88 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=77, id_budget=2 WHERE id_enseigne=89 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=78, id_budget=2 WHERE id_enseigne=90 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=59, id_budget=2 WHERE id_enseigne=91 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=83, id_budget=2 WHERE id_enseigne=92 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=61, id_budget=3 WHERE id_enseigne=93 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=22, id_budget=3 WHERE id_enseigne=94 ;
UPDATE `enseignes` SET sscategorie_enseigne =288, id_quartier=79, id_budget=2 WHERE id_enseigne=95 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=51, id_budget=2 WHERE id_enseigne=96 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=18, id_budget=2 WHERE id_enseigne=97 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=84, id_budget=2 WHERE id_enseigne=98 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=13, id_budget=2 WHERE id_enseigne=99 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=60, id_budget=2 WHERE id_enseigne=100 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=71, id_budget=2 WHERE id_enseigne=101 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=68, id_budget=3 WHERE id_enseigne=102 ;
UPDATE `enseignes` SET sscategorie_enseigne =58, id_quartier=24, id_budget=2 WHERE id_enseigne=103 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=20, id_budget=2 WHERE id_enseigne=104 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=2, id_budget=2 WHERE id_enseigne=105 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=61, id_budget=2 WHERE id_enseigne=106 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=31, id_budget=2 WHERE id_enseigne=107 ;
UPDATE `enseignes` SET sscategorie_enseigne =13, id_quartier=35, id_budget=2 WHERE id_enseigne=108 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=41, id_budget=2 WHERE id_enseigne=109 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=45, id_budget=2 WHERE id_enseigne=110 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=17, id_budget=2 WHERE id_enseigne=111 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=78, id_budget=2 WHERE id_enseigne=112 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=43, id_budget=1 WHERE id_enseigne=113 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=38, id_budget=1 WHERE id_enseigne=114 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=82, id_budget=2 WHERE id_enseigne=115 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=13, id_budget=3 WHERE id_enseigne=116 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=41, id_budget=3 WHERE id_enseigne=117 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=82, id_budget=2 WHERE id_enseigne=118 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=3, id_budget=2 WHERE id_enseigne=119 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=83, id_budget=2 WHERE id_enseigne=120 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=71, id_budget=2 WHERE id_enseigne=121 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=57, id_budget=2 WHERE id_enseigne=122 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=45, id_budget=2 WHERE id_enseigne=123 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=60, id_budget=2 WHERE id_enseigne=124 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=67, id_budget=2 WHERE id_enseigne=125 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=67, id_budget=2 WHERE id_enseigne=126 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=8, id_budget=2 WHERE id_enseigne=127 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=60, id_budget=2 WHERE id_enseigne=128 ;
UPDATE `enseignes` SET sscategorie_enseigne =9, id_quartier=70, id_budget=2 WHERE id_enseigne=129 ;
UPDATE `enseignes` SET sscategorie_enseigne =40, id_quartier=15, id_budget=2 WHERE id_enseigne=130 ;
UPDATE `enseignes` SET sscategorie_enseigne =21, id_quartier=57, id_budget=2 WHERE id_enseigne=131 ;
UPDATE `enseignes` SET sscategorie_enseigne =43, id_quartier=16, id_budget=2 WHERE id_enseigne=132 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=41, id_budget=2 WHERE id_enseigne=133 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=4, id_budget=2 WHERE id_enseigne=134 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=5, id_budget=2 WHERE id_enseigne=135 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=42, id_budget=3 WHERE id_enseigne=136 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=3, id_budget=2 WHERE id_enseigne=137 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=2, id_budget=3 WHERE id_enseigne=138 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=19, id_budget=3 WHERE id_enseigne=139 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=34, id_budget=3 WHERE id_enseigne=140 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=60, id_budget=2 WHERE id_enseigne=141 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=4, id_budget=2 WHERE id_enseigne=142 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=16, id_budget=2 WHERE id_enseigne=143 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=9, id_budget=2 WHERE id_enseigne=144 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=22, id_budget=3 WHERE id_enseigne=145 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=76, id_budget=2 WHERE id_enseigne=146 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=58, id_budget=2 WHERE id_enseigne=147 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=76, id_budget=3 WHERE id_enseigne=148 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=61, id_budget=2 WHERE id_enseigne=149 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=61, id_budget=3 WHERE id_enseigne=150 ;
UPDATE `enseignes` SET sscategorie_enseigne =32, id_quartier=26, id_budget=3 WHERE id_enseigne=151 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=40, id_budget=2 WHERE id_enseigne=152 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=8, id_budget=2 WHERE id_enseigne=153 ;
UPDATE `enseignes` SET sscategorie_enseigne =40, id_quartier=83, id_budget=2 WHERE id_enseigne=154 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=27, id_budget=2 WHERE id_enseigne=155 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=34, id_budget=2 WHERE id_enseigne=156 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=2, id_budget=2 WHERE id_enseigne=157 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=21, id_budget=2 WHERE id_enseigne=158 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=81, id_budget=2 WHERE id_enseigne=159 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=76, id_budget=2 WHERE id_enseigne=160 ;
UPDATE `enseignes` SET sscategorie_enseigne =301, id_quartier=43, id_budget=2 WHERE id_enseigne=161 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=56, id_budget=3 WHERE id_enseigne=162 ;
UPDATE `enseignes` SET sscategorie_enseigne =18, id_quartier=60, id_budget=2 WHERE id_enseigne=163 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=67, id_budget=2 WHERE id_enseigne=164 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=67, id_budget=2 WHERE id_enseigne=165 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=30, id_budget=2 WHERE id_enseigne=166 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=3, id_budget=3 WHERE id_enseigne=167 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=58, id_budget=3 WHERE id_enseigne=168 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=67, id_budget=2 WHERE id_enseigne=169 ;
UPDATE `enseignes` SET sscategorie_enseigne =153, id_quartier=50, id_budget=1 WHERE id_enseigne=170 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=19, id_budget=2 WHERE id_enseigne=171 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=1, id_budget=2 WHERE id_enseigne=172 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=3, id_budget=3 WHERE id_enseigne=173 ;
UPDATE `enseignes` SET sscategorie_enseigne =78, id_quartier=62, id_budget=2 WHERE id_enseigne=174 ;
UPDATE `enseignes` SET sscategorie_enseigne =48, id_quartier=60, id_budget=1 WHERE id_enseigne=175 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=24, id_budget=3 WHERE id_enseigne=176 ;
UPDATE `enseignes` SET sscategorie_enseigne =78, id_quartier=24, id_budget=2 WHERE id_enseigne=177 ;
UPDATE `enseignes` SET sscategorie_enseigne =2, id_quartier=22, id_budget=2 WHERE id_enseigne=178 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=33, id_budget=2 WHERE id_enseigne=179 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=41, id_budget=3 WHERE id_enseigne=180 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=34, id_budget=2 WHERE id_enseigne=181 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=39, id_budget=2 WHERE id_enseigne=182 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=31, id_budget=2 WHERE id_enseigne=183 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=53, id_budget=2 WHERE id_enseigne=184 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=39, id_budget=2 WHERE id_enseigne=185 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=13, id_budget=2 WHERE id_enseigne=186 ;
UPDATE `enseignes` SET sscategorie_enseigne =19, id_quartier=3, id_budget=2 WHERE id_enseigne=187 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=61, id_budget=2 WHERE id_enseigne=188 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=50, id_budget=2 WHERE id_enseigne=189 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=20, id_budget=3 WHERE id_enseigne=190 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=41, id_budget=2 WHERE id_enseigne=191 ;
UPDATE `enseignes` SET sscategorie_enseigne =39, id_quartier=18, id_budget=2 WHERE id_enseigne=192 ;
UPDATE `enseignes` SET sscategorie_enseigne =657, id_quartier=28, id_budget=3 WHERE id_enseigne=193 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=20, id_budget=3 WHERE id_enseigne=194 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=16, id_budget=2 WHERE id_enseigne=195 ;
UPDATE `enseignes` SET sscategorie_enseigne =31, id_quartier=60, id_budget=2 WHERE id_enseigne=196 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=63, id_budget=3 WHERE id_enseigne=197 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=62, id_budget=2 WHERE id_enseigne=198 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=71, id_budget=3 WHERE id_enseigne=199 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=71, id_budget=3 WHERE id_enseigne=200 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=3, id_budget=3 WHERE id_enseigne=201 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=12, id_budget=3 WHERE id_enseigne=202 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=71, id_budget=4 WHERE id_enseigne=203 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=79, id_budget=2 WHERE id_enseigne=204 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=26, id_budget=3 WHERE id_enseigne=205 ;
UPDATE `enseignes` SET sscategorie_enseigne =347, id_quartier=58, id_budget=2 WHERE id_enseigne=206 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=67, id_budget=2 WHERE id_enseigne=207 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=67, id_budget=2 WHERE id_enseigne=208 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=35, id_budget=2 WHERE id_enseigne=209 ;
UPDATE `enseignes` SET sscategorie_enseigne =31, id_quartier=26, id_budget=3 WHERE id_enseigne=210 ;
UPDATE `enseignes` SET sscategorie_enseigne =34, id_quartier=18, id_budget=2 WHERE id_enseigne=211 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=19, id_budget=3 WHERE id_enseigne=212 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=22, id_budget=2 WHERE id_enseigne=213 ;
UPDATE `enseignes` SET sscategorie_enseigne =289, id_quartier=60, id_budget=2 WHERE id_enseigne=214 ;
UPDATE `enseignes` SET sscategorie_enseigne =31, id_quartier=54, id_budget=2 WHERE id_enseigne=215 ;
UPDATE `enseignes` SET sscategorie_enseigne =21, id_quartier=20, id_budget=2 WHERE id_enseigne=216 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=41, id_budget=3 WHERE id_enseigne=217 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=2, id_budget=2 WHERE id_enseigne=218 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=35, id_budget=2 WHERE id_enseigne=219 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=29, id_budget=3 WHERE id_enseigne=220 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=64, id_budget=2 WHERE id_enseigne=221 ;
UPDATE `enseignes` SET sscategorie_enseigne =341, id_quartier=34, id_budget=2 WHERE id_enseigne=222 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=81, id_budget=2 WHERE id_enseigne=223 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=48, id_budget=2 WHERE id_enseigne=224 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=67, id_budget=2 WHERE id_enseigne=225 ;
UPDATE `enseignes` SET sscategorie_enseigne =39, id_quartier=42, id_budget=2 WHERE id_enseigne=226 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=45, id_budget=2 WHERE id_enseigne=227 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=20, id_budget=2 WHERE id_enseigne=228 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=20, id_budget=3 WHERE id_enseigne=229 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=4, id_budget=3 WHERE id_enseigne=230 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=56, id_budget=2 WHERE id_enseigne=231 ;
UPDATE `enseignes` SET sscategorie_enseigne =3, id_quartier=58, id_budget=2 WHERE id_enseigne=232 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=30, id_budget=2 WHERE id_enseigne=233 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=3, id_budget=3 WHERE id_enseigne=234 ;
UPDATE `enseignes` SET sscategorie_enseigne =281, id_quartier=66, id_budget=3 WHERE id_enseigne=235 ;
UPDATE `enseignes` SET sscategorie_enseigne =300, id_quartier=33, id_budget=2 WHERE id_enseigne=236 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=38, id_budget=2 WHERE id_enseigne=237 ;
UPDATE `enseignes` SET sscategorie_enseigne =26, id_quartier=55, id_budget=2 WHERE id_enseigne=238 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=14, id_budget=2 WHERE id_enseigne=239 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=83, id_budget=2 WHERE id_enseigne=240 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=56, id_budget=2 WHERE id_enseigne=241 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=46, id_budget=2 WHERE id_enseigne=242 ;
UPDATE `enseignes` SET sscategorie_enseigne =17, id_quartier=2, id_budget=2 WHERE id_enseigne=243 ;
UPDATE `enseignes` SET sscategorie_enseigne =653, id_quartier=66, id_budget=2 WHERE id_enseigne=244 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=21, id_budget=3 WHERE id_enseigne=245 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=66, id_budget=2 WHERE id_enseigne=246 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=60, id_budget=2 WHERE id_enseigne=247 ;
UPDATE `enseignes` SET sscategorie_enseigne =110, id_quartier=66, id_budget=2 WHERE id_enseigne=248 ;
UPDATE `enseignes` SET sscategorie_enseigne =78, id_quartier=62, id_budget=2 WHERE id_enseigne=249 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=55, id_budget=2 WHERE id_enseigne=250 ;
UPDATE `enseignes` SET sscategorie_enseigne =39, id_quartier=76, id_budget=2 WHERE id_enseigne=251 ;
UPDATE `enseignes` SET sscategorie_enseigne =17, id_quartier=44, id_budget=2 WHERE id_enseigne=252 ;
UPDATE `enseignes` SET sscategorie_enseigne =635, id_quartier=66, id_budget=3 WHERE id_enseigne=253 ;
UPDATE `enseignes` SET sscategorie_enseigne =19, id_quartier=84, id_budget=2 WHERE id_enseigne=254 ;
UPDATE `enseignes` SET sscategorie_enseigne =40, id_quartier=56, id_budget=2 WHERE id_enseigne=255 ;
UPDATE `enseignes` SET sscategorie_enseigne =17, id_quartier=34, id_budget=2 WHERE id_enseigne=256 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=14, id_budget=2 WHERE id_enseigne=257 ;
UPDATE `enseignes` SET sscategorie_enseigne =11, id_quartier=66, id_budget=3 WHERE id_enseigne=258 ;

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

CREATE TABLE IF NOT EXISTS `arrondissement` (
  `id_arrondissement` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ville` int(10) unsigned NOT NULL,
  `arrondissement` varchar(45) NOT NULL,
  PRIMARY KEY (`id_arrondissement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

INSERT INTO `arrondissement` (`id_arrondissement`, `id_ville`, `arrondissement`) VALUES
(0, 0, 'Indéfini'),
(1, 1, 'Paris 1<sup>er</sup>'),
(2, 1, 'Paris 2<sup>ème</sup>'),
(3, 1, 'Paris 3<sup>ème</sup>'),
(4, 1, 'Paris 4<sup>ème</sup>'),
(5, 1, 'Paris 5<sup>ème</sup>'),
(6, 1, 'Paris 6<sup>ème</sup>'),
(7, 1, 'Paris 7<sup>ème</sup>'),
(8, 1, 'Paris 8<sup>ème</sup>'),
(9, 1, 'Paris 9<sup>ème</sup>'),
(10, 1, 'Paris 10<sup>ème</sup>'),
(11, 1, 'Paris 11<sup>ème</sup>'),
(12, 1, 'Paris 12<sup>ème</sup>'),
(13, 1, 'Paris 13<sup>ème</sup>'),
(14, 1, 'Paris 14<sup>ème</sup>'),
(15, 1, 'Paris 15<sup>ème</sup>'),
(16, 1, 'Paris 16<sup>ème</sup>'),
(17, 1, 'Paris 17<sup>ème</sup>'),
(18, 1, 'Paris 18<sup>ème</sup>'),
(19, 1, 'Paris 19<sup>ème</sup>'),
(20, 1, 'Paris 20<sup>ème</sup>');



-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE IF NOT EXISTS `quartier` (
  `id_quartier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_arrondissement` int(10) unsigned NOT NULL,
  `id_ville` int(10) unsigned NOT NULL,
  `quartier` varchar(45) NOT NULL,
  PRIMARY KEY (`id_quartier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

INSERT INTO `quartier` (`id_quartier`, `id_arrondissement`, `id_ville`, `quartier`) VALUES
(0, 0, 0, 'Indéfini'),
(1, 1, 1, 'Châtelet - les Halles'),
(2, 1, 1, 'Louvre - Rivoli'),
(3, 1, 1, 'Pyramides'),
(4, 2, 1, 'Bourse'),
(5, 2, 1, 'Montorgueil'),
(6, 2, 1, 'Sentier'),
(7, 3, 1, 'Rambuteau'),
(8, 3, 1, 'République'),
(9, 3, 1, 'Temple'),
(10, 4, 1, 'Cité'),
(11, 4, 1, 'Hôtel de Ville'),
(12, 4, 1, 'Île Saint-Louis'),
(13, 4, 1, 'Marais'),
(14, 5, 1, 'Jardin des plantes'),
(15, 5, 1, 'Monge / Mouffetard'),
(16, 5, 1, 'Quartier latin'),
(17, 6, 1, 'Luxembourg'),
(18, 6, 1, 'Odéon'),
(19, 6, 1, 'Saint-Germain'),
(20, 6, 1, 'Vavin'),
(21, 7, 1, 'Invalides'),
(22, 7, 1, 'Rue du Bac'),
(23, 7, 1, 'Solférino'),
(24, 7, 1, 'Tour Eiffel'),
(25, 7, 1, 'Vaneau'),
(26, 8, 1, 'Champs Elysées'),
(27, 8, 1, 'Concorde'),
(28, 8, 1, 'Etoile'),
(29, 8, 1, 'Madeleine'),
(30, 8, 1, 'Monceau'),
(31, 9, 1, 'Grands Boulevards'),
(32, 9, 1, 'La Fayette'),
(33, 9, 1, 'Montmartre'),
(34, 9, 1, 'Notre Dame de Lorette'),
(35, 9, 1, 'Opéra'),
(36, 10, 1, 'Canal St Martin'),
(37, 10, 1, 'Louis Blanc'),
(38, 10, 1, 'Magenta'),
(39, 10, 1, 'Saint-Louis'),
(40, 10, 1, 'Saint-Martin'),
(41, 11, 1, 'Bastille / Roquette'),
(42, 11, 1, 'Faidherbe-Chaligny'),
(43, 11, 1, 'Oberkampf'),
(44, 11, 1, 'Parmentier'),
(45, 11, 1, 'Voltaire'),
(46, 12, 1, 'Bercy'),
(47, 12, 1, 'Cour Saint-Emilion'),
(48, 12, 1, 'Daumesnil'),
(49, 12, 1, 'Gare de Lyon'),
(50, 12, 1, 'Nation'),
(51, 13, 1, 'Bibliothèque François Mitterand'),
(52, 13, 1, 'Butte aux Cailles'),
(53, 13, 1, 'Gobelins'),
(54, 13, 1, 'Place d''Italie'),
(55, 13, 1, 'Olympiades / quartier chinois'),
(56, 14, 1, 'Alesia'),
(57, 14, 1, 'Denfert Rochereau'),
(58, 14, 1, 'Montparnasse'),
(59, 15, 1, 'Commerce'),
(60, 15, 1, 'Javel'),
(61, 15, 1, 'Vaugirard'),
(62, 16, 1, 'Auteuil'),
(63, 16, 1, 'Chaillot'),
(64, 16, 1, 'Passy'),
(65, 16, 1, 'Trocadéro'),
(66, 16, 1, 'Victor Hugo'),
(67, 17, 1, 'Batignolles'),
(68, 17, 1, 'Brochant'),
(69, 17, 1, 'Charles de Gaulle - Etoile'),
(70, 17, 1, 'Courcelles'),
(71, 17, 1, 'Pereire'),
(72, 17, 1, 'Place de Clichy'),
(73, 17, 1, 'Ternes'),
(74, 17, 1, 'Buttes Chaumont'),
(75, 18, 1, 'Abbesses'),
(76, 18, 1, 'Blanche'),
(77, 18, 1, 'Goutte d''Or'),
(78, 18, 1, 'Lamarck-Caulaincourt'),
(79, 18, 1, 'Simplon / Jules Joffrin'),
(80, 19, 1, 'Belleville'),
(81, 19, 1, 'Buttes-Chaumont'),
(82, 19, 1, 'La Villette'),
(83, 20, 1, 'Avron'),
(84, 20, 1, 'Maraîchers'),
(85, 20, 1, 'Père Lachaise');



-- --------------------------------------------------------

--
-- Structure de la table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `id_budget` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `budget_enseigne` varchar(45) NOT NULL,
  PRIMARY KEY (`id_budget`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `budget` (`id_budget`, `budget_enseigne`) VALUES
(1, 'Bon marché, moins de 7€'),
(2, 'Raisonnable, de 8€ à 20€'),
(3, 'Cher, de 21€ à 40€'),
(4, 'Très cher, plus de 41€') ;

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE IF NOT EXISTS `objets` (
  `id_objet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slide_objet` varchar(45) DEFAULT NULL,
  `thumbnail_objet` varchar(45) DEFAULT NULL,
  `nom_objet` varchar(45) DEFAULT NULL,
  `descriptif_objet` longtext,
  `ou_objet` varchar(45) DEFAULT NULL,
  `sscategorie_objet` int(10) unsigned NOT NULL,
  `video_objet` varchar(255) DEFAULT NULL,
  `fb_objet` varchar(255) DEFAULT NULL,
  `tw_objet` varchar(255) DEFAULT NULL,  
  `goog_objet` varchar(255) DEFAULT NULL,
  `url_objet` varchar(255) DEFAULT NULL,
  `slide1_objet` varchar(45) DEFAULT NULL,
  `slide2_objet` varchar(45) DEFAULT NULL,
  `slide3_objet` varchar(45) DEFAULT NULL,
  `slide4_objet` varchar(45) DEFAULT NULL,
  `slide5_objet` varchar(45) DEFAULT NULL,
  `x1` int(10) DEFAULT 0,
  `y1` int(10) DEFAULT 0,
  `y2` int(10) DEFAULT 0,
  `y3` int(10) DEFAULT 0,
  `y4` int(10) DEFAULT 0,
  `y5` int(10) DEFAULT 0,
  `box_objet` varchar(45) DEFAULT NULL,
  `titredescriptif1_objet` longtext,
  `contenu1descriptif1_objet` longtext,
  `contenu2descriptif1_objet` longtext,
  `contenu3descriptif1_objet` longtext,
  `contenu4descriptif1_objet` longtext,
  `contenu5descriptif1_objet` longtext,
  `titredescriptif2_objet` longtext,
  `contenu1descriptif2_objet` longtext,
  `contenu2descriptif2_objet` longtext,
  `contenu3descriptif2_objet` longtext,
  `contenu4descriptif2_objet` longtext,
  `contenu5descriptif2_objet` longtext,
  `titredescriptif3_objet` longtext,
  `contenu1descriptif3_objet` longtext,
  `contenu2descriptif3_objet` longtext,
  `contenu3descriptif3_objet` longtext,
  `contenu4descriptif3_objet` longtext,
  `contenu5descriptif3_objet` longtext,
  PRIMARY KEY (`id_objet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE IF NOT EXISTS `suggestions` (
  `id_suggestion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_contributeur` int(10) unsigned NOT NULL,
  `date_suggestion` datetime NOT NULL,
  `type_suggestion` varchar(10) NOT NULL,
  `nom_suggestion` varchar(45) DEFAULT NULL,
  `id_categorie` int(10) NOT NULL,
  `id_sous_categorie` int(10) NOT NULL,
  `description` longtext DEFAULT NULL,
  `id_statut` int(10) NOT NULL,
  `cp_ou_ville` varchar(45) DEFAULT NULL,  
  PRIMARY KEY (`id_suggestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE IF NOT EXISTS `statuts` (
  `id_statut` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statut` varchar(10) NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `statuts` (`id_statut`, `statut`) VALUES
(1, 'En attente'),
(2, 'Validé'),
(3, 'Invalidé') ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_principale` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `posx` int(10) DEFAULT NULL,
  `posy` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE IF NOT EXISTS `sous_categories` (
  `id_sous_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categorie` int(10) unsigned NOT NULL,
  `sous_categorie` varchar(50) DEFAULT NULL,
  `posx` int(10) DEFAULT NULL,
  `posy` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_sous_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories2`
--

CREATE TABLE IF NOT EXISTS `sous_categories2` (
  `id_sous_categorie2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sous_categorie` int(10) unsigned NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL,
  `sous_categorie2` varchar(50) DEFAULT NULL,
  `posx` int(10) DEFAULT NULL,
  `posy` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_sous_categorie2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=665 ;


-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_avis_utiles`
--

CREATE TABLE IF NOT EXISTS `contributeurs_avis_utiles` (
  `id_avis_utile` int(10) unsigned NOT NULL,
  `id_contributeur_avis_utile` int(10) unsigned NOT NULL,
  `avis_utile` tinyint(1) NOT NULL,
  `date_avis_utile` datetime DEFAULT NULL,
  PRIMARY KEY (`id_avis_utile`,`id_contributeur_avis_utile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
   `date_aime` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_enseignes_has_aime_enseignes1` (`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_aime_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_enseignes`
--
ALTER TABLE `contributeurs_aiment_enseignes`
  ADD CONSTRAINT `fk_enseignes_has_aime_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

  -- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_pas_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_pas_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  `date_aime_pas` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_enseignes_has_aime_pas_enseignes1` (`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_aime_pas_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_pas_enseignes`
--
ALTER TABLE `contributeurs_aiment_pas_enseignes`
  ADD CONSTRAINT `fk_enseignes_has_aime_pas_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_pas_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_wish_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_wish_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  `date_wish` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_enseignes_has_wish_enseignes1` (`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_wish_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_wish_enseignes`
--
ALTER TABLE `contributeurs_wish_enseignes`
  ADD CONSTRAINT `fk_enseignes_has_wish_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_wish_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
 -- --------------------------------------------------------

--
-- Structure de la table `contributeurs_follow_enseignes`
--

CREATE TABLE IF NOT EXISTS `contributeurs_follow_enseignes` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `enseignes_id_enseigne` int(10) unsigned NOT NULL,
  `date_follow` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`enseignes_id_enseigne`),
  KEY `fk_contributeurs_has_follow_enseignes1` (`contributeurs_id_contributeur`),
  KEY `fk_enseignes_has_follow_contributeurs1` (`enseignes_id_enseigne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_follow_enseignes`
--
ALTER TABLE `contributeurs_follow_enseignes`
  ADD CONSTRAINT `fk_contributeurs_has_follow_enseignes1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enseignes_has_follow_enseignes1` FOREIGN KEY (`enseignes_id_enseigne`) REFERENCES `enseignes` (`id_enseigne`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_objets`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_objets` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `objets_id_objet` int(10) unsigned NOT NULL,
   `date_aime` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`objets_id_objet`),
  KEY `fk_objets_has_aime_objets1` (`objets_id_objet`),
  KEY `fk_contributeurs_has_aime_objet_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_objets`
--
ALTER TABLE `contributeurs_aiment_objets`
  ADD CONSTRAINT `fk_objets_has_aime_objets1` FOREIGN KEY (`objets_id_objet`) REFERENCES `objets` (`id_objet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_objet_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

  -- --------------------------------------------------------

--
-- Structure de la table `contributeurs_aiment_pas_objets`
--

CREATE TABLE IF NOT EXISTS `contributeurs_aiment_pas_objets` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `objets_id_objet` int(10) unsigned NOT NULL,
  `date_aime_pas` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`objets_id_objet`),
  KEY `fk_objets_has_aime_pas_objets1` (`objets_id_objet`),
  KEY `fk_contributeurs_has_aime_pas_objet_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_aiment_pas_objets`
--
ALTER TABLE `contributeurs_aiment_pas_objets`
  ADD CONSTRAINT `fk_objets_has_aime_pas_objets1` FOREIGN KEY (`objets_id_objet`) REFERENCES `objets` (`id_objet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_aime_pas_objet_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_wish_objets`
--

CREATE TABLE IF NOT EXISTS `contributeurs_wish_objets` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `objets_id_objet` int(10) unsigned NOT NULL,
  `date_wish` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`objets_id_objet`),
  KEY `fk_objets_has_wish_objets1` (`objets_id_objet`),
  KEY `fk_contributeurs_has_wish_objet_contributeurs1` (`contributeurs_id_contributeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_wish_objets`
--
ALTER TABLE `contributeurs_wish_objets`
  ADD CONSTRAINT `fk_objets_has_wish_objets1` FOREIGN KEY (`objets_id_objet`) REFERENCES `objets` (`id_objet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_wish_objet_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
 
-- --------------------------------------------------------

--
-- Structure de la table `contributeurs_follow_contributeurs`
--

CREATE TABLE IF NOT EXISTS `contributeurs_follow_contributeurs` (
  `contributeurs_id_contributeur` int(10) unsigned NOT NULL,
  `contributeurs_id_contributeurfollow` int(10) unsigned NOT NULL,
  `date_follow` datetime DEFAULT NULL,
  PRIMARY KEY (`contributeurs_id_contributeur`,`contributeurs_id_contributeurfollow`),
  KEY `fk_contributeurs_has_follow_contributeurs1` (`contributeurs_id_contributeur`),
  KEY `fk_contributeurs_has_follow_contributeurs2` (`contributeurs_id_contributeurfollow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour la table `contributeurs_follow_contributeurs`
--
ALTER TABLE `contributeurs_follow_contributeurs`
  ADD CONSTRAINT `fk_contributeurs_has_follow_contributeurs1` FOREIGN KEY (`contributeurs_id_contributeur`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contributeurs_has_follow_contributeurs2` FOREIGN KEY (`contributeurs_id_contributeurfollow`) REFERENCES `contributeurs` (`id_contributeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 
    
  
  
  -- --------------------------------------------------------

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie_principale`,  `couleur`, `posx`, `posy`) VALUES
(1, 'Cuisine', '#fabe41', 0, 0),
(2, 'Beauté et bien être', '#f480bc', -50, 0),
(3, 'Culture', '#46ba8f', -100, 0),
(4, 'Mode et design', '#8b6c4d', -150, 0),
(5, 'Santé', '#de5b30', -200, 0),
(6, 'Sorties, voyages et loisirs', '#3068a0', -250, 0),
(7, 'Sport', '#4ebde8', -300, 0),
(8, 'Services et inclassables', '#a1679a', -350, 0) ;


--
-- Contenu de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id_sous_categorie`, `id_categorie`, `sous_categorie`, `posx`, `posy`) VALUES
(1, '1', 'Restaurant cuisine française', 0, -50),
(2, '1', 'Restaurant cuisine Africaine', -50, -50),
(3, '1', 'Restaurant cuisine Asiatique', -100, -50),
(4, '1', 'Restaurant cuisine des îles', -150, -50),
(5, '1', 'Restaurant cuisine Latino-américaine', -200, -50),
(6, '1', 'Restaurant cuisine Nord-américaine', -250, -50),
(7, '1', 'Restaurant cuisine orientale', -300, -50),
(8, '1', 'Restaurant cuisine slave', -350, -50),
(9, '1', 'Restaurant cuisine Indienne', -400, -50),
(10, '1', 'Restaurant cuisine espagnole', -450, -50),
(11, '1', 'Restaurant cuisine italienne', 0, -100),
(12, '1', 'Restaurant cuisine World food', -50, -100),
(13, '1', 'Restaurant autres cuisines', -100, -100),
(14, '1', 'Glaciers et salons de thé', -150, -100),
(15, '1', 'Glaces', -200, -100),
(16, '1', 'Sandwicheries, cafétérias et restauration rapide', -250, -100),
(17, '1', 'Autres restaurations', -300, -100),
(18, '1', 'Alimentation générale', -350, -100),
(19, '1', 'Boucheries et charcuteries', -400, -100),
(20, '1', 'Boulangeries et pâtisseries', -450, -100),
(21, '1', 'Cavistes', 0, -150),
(22, '1', 'Chocolatiers et confiseurs', -50, -150),
(23, '1', 'Crèmeries et fromageries', -100, -150),
(24, '1', 'Diététique et alimentation bio', -150, -150),
(25, '1', 'Épiceries fines', -200, -150),
(26, '1', 'Poissonneries', -250, -150),
(27, '1', 'Primeurs', -300, -150),
(28, '1', 'Surgelés', -350, -150),
(29, '1', 'Torréfacteurs et maisons de thé', -400, -150),
(30, '1', 'Traiteurs', -450, -150),
(31, '1', 'Produits frais', 0, -200),
(32, '1', 'Plats', -50, -200),
(33, '1', 'Marques cuisines', -100, -200),
(34, '1', 'Cours de cuisine', -150, -200),
(35, '1', 'Autres alimentation', -100, -100),
(36, '2', 'Centres de bronzage et solariums', 0, -300),
(37, '2', 'Instituts de beauté et spas', -50, -300),
(38, '2', 'Hammams et saunas', -100, -300),
(39, '2', 'Magasins spécialisés', -150, -300),
(40, '2', 'Parfumeries', -200, -300),
(41, '2', 'Salons de coiffure', -250, -300),
(42, '2', 'Salons de massage', -300, -300),
(43, '2', 'Marques beauté et bien être', -350, -300),
(44, '2', 'Personnalités beauté et bien être', -400, -300),
(45, '2', 'Autres beauté et bien être', -450, -300),
(46, '3', 'Arts graphiques', 0, -400),
(47, '3', 'Beaux-arts', -50, -400),
(48, '3', 'Cinéma et vidéo', -100, -400),
(49, '3', 'Littérature', -150, -400),
(50, '3', 'Musique', -200, -400),
(51, '3', 'Photographie', -250, -400),
(52, '3', 'Théâtre, opéra et spectacle vivant', -300, -400),
(53, '3', 'Général culture', -350, -400),
(54, '3', 'Marques culture', -400, -400),
(55, '3', 'Personnalités culture', -450, -400),
(56, '3', 'Autres culture', 0, -450),
(57, '4', 'Ameublement', 0, -550),
(58, '4', 'Décoration', -50, -550),
(59, '4', 'Électroménager et matériel informatique', -100, -550),
(60, '4', 'Autres équipement et articles de maison', -150, -550),
(61, '4', 'Jardineries', -200, -550),
(62, '4', 'Bijouteries', -250, -550),
(63, '4', 'Chausseurs', -300, -550),
(64, '4', 'Magasins de prêt-à-porter', -350, -550),
(65, '4', 'Habits prêts à porter', -400, -550),
(66, '4', 'Magasin Haute-Couture', -450, -550),
(67, '4', 'Habits Haute-Couture', 0, -600),
(68, '4', 'Friperies', -50, -600),
(69, '4', 'Solderies', -100, -600),
(70, '4', 'Ganteries', -150, -600),
(71, '4', 'Chapelleries', -200, -600),
(72, '4', 'Maroquineries', -250, -600),
(73, '4', 'Colifichets et foulards', -300, -600),
(74, '4', 'Montres', -350, -600),
(75, '4', 'Parapluies', -400, -600),
(76, '4', 'Perruques', -450, -600),
(77, '4', 'Marques mode et design', 0, -650),
(78, '4', 'Personnalités mode et design', -50, -650),
(79, '4', 'Autres mode et design', -100, -650),
(80, '5', 'Médecins', 0, -750),
(81, '5', 'Magasins médicaux spécialisés', -50, -750),
(82, '5', 'Laboratoires médicaux', -100, -750),
(83, '5', 'Hôpitaux et maisons médicales', -150, -750),
(84, '5', 'Dentistes', -200, -750),
(85, '5', 'Pharmacies et parapharmacies', -250, -750),
(86, '5', 'Soins vétérinaires', -300, -750),
(87, '5', 'Marques santé', -350, -750),
(88, '5', 'Personnalités santé', -400, -750),
(89, '5', 'Autres santé', -450, -750),
(90, '6', 'Bars', 0, -850),
(91, '6', 'Cabarets', -50, -850),
(92, '6', 'Pubs', -100, -850),
(93, '6', 'Night-club clubs', -150, -850),
(94, '6', 'Billards', -200, -850),
(95, '6', 'Bowlings', -250, -850),
(96, '6', 'Déguisements, farces et attrapes', -300, -850),
(97, '6', 'Jeux', -350, -850),
(98, '6', 'Modélisme', -400, -850),
(99, '6', 'Parcs d''attraction', -450, -850),
(100, '6', 'Parcs et nature', 0, -900),
(101, '6', 'Voyages', -50, -900),
(102, '6', 'Animaux', -100, -900),
(103, '6', 'Marques', -150, -900),
(104, '6', 'Autres sorties, voyages et loisirs', -200, -900),
(105, '7', 'Football', 0, -1000),
(106, '7', 'Tennis', -50, -1000),
(107, '7', 'Rugby', -100, -1000),
(108, '7', 'F1', -150, -1000),
(109, '7', 'Auto-Moto', -200, -1000),
(110, '7', 'Basket', -250, -1000),
(111, '7', 'Handball', -300, -1000),
(112, '7', 'Golf', -350, -1000),
(113, '7', 'Cyclisme', -400, -1000),
(114, '7', 'Athlétisme', -450, -1000),
(115, '7', 'Natation', 0, -1050),
(116, '7', 'Voile', -50, -1050),
(117, '7', 'Hippisme', -100, -1050),
(118, '7', 'Volley Ball', -150, -1050),
(119, '7', 'Hockey', -200, -1050),
(120, '7', 'Surf', -250, -1050),
(121, '7', 'Judo', -300, -1050),
(122, '7', 'Escrime', -350, -1050),
(123, '7', 'Ski – Glace', -400, -1050),
(124, '7', 'Boxe', -450, -1050),
(125, '7', 'Gym', 0, -1100),
(126, '7', 'Aviron', -50, -1100),
(127, '7', 'NFL', -100, -1100),
(128, '7', 'Tennis de table', -150, -1100),
(129, '7', 'Équitation', -200, -1100),
(130, '7', 'Kanoe kayak', -250, -1100),
(131, '7', 'Haltérophilie', -300, -1100),
(132, '7', 'Triathlon', -350, -1100),
(133, '7', 'Lutte gréco romaine', -400, -1100),
(134, '7', 'Pentathlon moderne', -450, -1100),
(135, '7', 'Tir', 0, -1150),
(136, '7', 'Taekwondo', -50, -1150),
(137, '7', 'Badminton', -100, -1150),
(138, '7', 'Magasins généralistes sport', -150, -1150),
(139, '7', 'Marques sport', -200, -1150),
(140, '7', 'Magasins produits diététiques', -250, -1150),
(141, '7', 'Presse et médias', -300, -1150),
(142, '7', 'Personnalités sport', -350, -1150),
(143, '7', 'Autres sport', -400, -1150),
(144, '8', 'Achat d''or', 0, -1250),
(145, '8', 'Agences immobilières', -50, -1250),
(146, '8', 'Agences intérimaires', -100, -1250),
(147, '8', 'Assureurs', -150, -1250),
(148, '8', 'Banques', -200, -1250),
(149, '8', 'Bureaux de tabac', -250, -1250),
(150, '8', 'Cordonneries', -300, -1250),
(151, '8', 'Concessionnaires', -350, -1250),
(152, '8', 'Électriciens', -400, -1250),
(153, '8', 'Grande distribution', -450, -1250),
(154, '8', 'Laveries', 0, -1300),
(155, '8', 'Location de véhicules', -50, -1300),
(156, '8', 'Maisons de la presse', -100, -1300),
(157, '8', 'Ménage à domicile', -150, -1300),
(158, '8', 'Plombiers', -200, -1300),
(159, '8', 'Pressings et nettoyage à sec', -250, -1300),
(160, '8', 'Réparation TV-Hifi-informatique', -300, -1300),
(161, '8', 'Serruriers', -350, -1300),
(162, '8', 'Stations-services', -400, -1300),
(163, '8', 'Sex-shop', -450, -1300),
(164, '8', 'Clubs privés', 0, -1350);


--
-- Contenu de la table `sous_categories2`
--

INSERT INTO `sous_categories2` (`id_sous_categorie2`, `id_sous_categorie`, `id_categorie`, `sous_categorie2`, `posx`, `posy`) VALUES
(1, 1, 1, 'Bistrots, brasseries et bars à vin', 0, -1500),
(2, 1, 1, 'Crêperies', -50, -1500),
(3, 1, 1, 'Restaurant sud-ouest', -100, -1500),
(4, 1, 1, 'Restaurant provençal', -150, -1500),
(5, 1, 1, 'Restaurant méditérannéen', -200, -1500),
(6, 1, 1, 'Restaurant corse', -250, -1500),
(7, 1, 1, 'Restaurant des régions', -300, -1500),
(8, 1, 1, 'Restaurant du marché', -350, -1500),
(9, 1, 1, 'Restaurant fusion', -400, -1500),
(10, 1, 1, 'Restaurant traditionnel', -450, -1500),
(11, 1, 1, 'Restaurant gastronomique', 0, -1550),
(12, 1, 1, 'Restaurant méridional', -50, -1550),
(13, 1, 1, 'Autre restaurant français', -100, -1550),
(14, 2, 1, 'Restaurant africain', -150, -1550),
(15, 2, 1, 'Autres restaurant africain', -100, -1550),
(16, 3, 1, 'Restaurant chinois', -200, -1550),
(17, 3, 1, 'Restaurant japonais', -250, -1550),
(18, 3, 1, 'Restaurant thaïlandais', -300, -1550),
(19, 3, 1, 'Restaurant vietnamien', -350, -1550),
(20, 3, 1, 'Autres restaurant chinois', -100, -1550),
(21, 4, 1, 'Restaurant créole', -400, -1550),
(22, 4, 1, 'Restaurant tahitien', -450, -1550),
(23, 4, 1, 'Autres restaurant des îles', -100, -1550),
(24, 5, 1, 'Restaurant Brésilien', 0, -1600),
(25, 5, 1, 'Restaurant Cubain', -50, -1600),
(26, 5, 1, 'Restaurant Latino', -100, -1600),
(27, 5, 1, 'Restaurant Mexicain', -150, -1600),
(28, 5, 1, 'Autres restaurant latino-américain', -100, -1550),
(29, 6, 1, 'Restaurant nord-américain', -200, -1600),
(30, 6, 1, 'Autres Restaurant nord-américain', -100, -1550),
(31, 7, 1, 'Restaurant marocaine', -250, -1600),
(32, 7, 1, 'Restaurant libanaise', -300, -1600),
(33, 7, 1, 'Restaurant turque', -350, -1600),
(34, 7, 1, 'Restaurant grecque', -400, -1600),
(35, 7, 1, 'Autres restaurant orientales', -100, -1550),
(36, 8, 1, 'Restaurant russe', -450, -1600),
(37, 8, 1, 'Restaurant scandinave', 0, -1650),
(38, 8, 1, 'Autres restaurant slaves', -100, -1550),
(39, 9, 1, NULL, -400, -50),
(40, 10, 1, NULL, -450, -50),
(41, 11, 1, NULL, 0, -100),
(42, 12, 1, NULL, -50, -100),
(43, 13, 1, NULL, -100, -100),
(44, 14, 1, 'Bars à fruit', -300, -1650),
(45, 14, 1, 'Glaciers', -350, -1650),
(46, 14, 1, 'Salons de thé', -400, -1650),
(47, 15, 1, NULL, -200, -100),
(48, 16, 1, 'Restauration rapide', -50, -1800),
(49, 16, 1, 'Sandwichs, Bagels, hamburgers, pizzas, hot dogs', -50, -1700),
(50, 17, 1, 'Commerces autres restaurations', 0, -1700),
(51, 17, 1, 'Produits autres restaurations', -50, -1700),
(52, 18, 1, 'Alimentation générale', 0, -1700),
(53, 18, 1, 'Produits alimentation générale', -50, -1700),
(54, 19, 1, 'Boucherie halal', -100, -1700),
(55, 19, 1, 'Boucherie casher', -150, -1700),
(56, 19, 1, 'Boucherie traditionnelle', -200, -1700),
(57, 19, 1, 'Produits boucherie', -50, -1700),
(58, 20, 1, 'Boulangerie et pâtisserie', -100, -1800),
(59, 20, 1, 'Produits boulangerie et pâtisserie', -50, -1700),
(60, 21, 1, 'Caviste', 0, -1700),
(61, 21, 1, 'Vins et alcools', -50, -1700),
(62, 22, 1, 'Chocolatier et confiseur', 0, -1700),
(63, 22, 1, 'Chocolats, confiseries', -50, -1700),
(64, 23, 1, 'Crèmerie et fromagerie', 0, -1700),
(65, 23, 1, 'Produits crèmerie et fromagerie', -50, -1700),
(66, 24, 1, 'Commerce diététique et bio', 0, -1700),
(67, 24, 1, 'Produits diététique et bio', -50, -1700),
(68, 25, 1, 'Épicerie fine', -150, -1800),
(69, 25, 1, 'Produits épicerie fine', -50, -1700),
(70, 26, 1, 'Poissonnerie', 0, -1700),
(71, 26, 1, 'Poissons, fruits de mer', -50, -1700),
(72, 27, 1, 'Primeur', 0, -1700),
(73, 27, 1, 'Fruits et légumes', -50, -1700),
(74, 28, 1, 'Commerce de surgelés', 0, -1700),
(75, 28, 1, 'Produits Surgelés', -50, -1700),
(76, 29, 1, 'Torréfacteur et maisons de thé', 0, -1700),
(77, 29, 1, 'Cafés et thés', -50, -1700),
(78, 30, 1, 'Traiteur', -200, -1800),
(79, 30, 1, 'Produits traiteur', -50, -1700),
(80, 31, 1, NULL, 0, -200),
(81, 32, 1, 'Plats français', -300, -1700),
(82, 32, 1, 'Plats africains', -350, -1700),
(83, 32, 1, 'Plats asiatiques', -400, -1700),
(84, 32, 1, 'Plats des îles', -450, -1700),
(85, 32, 1, 'Plats Latino-américains', 0, -1750),
(86, 32, 1, 'Plats nord-américains', -50, -1750),
(87, 32, 1, 'Plats orientaux', -100, -1750),
(88, 32, 1, 'Plats slaves', -150, -1750),
(89, 32, 1, 'Plats indiens', -200, -1750),
(90, 32, 1, 'Plats cuisine espagnole', -250, -1750),
(91, 32, 1, 'Plats cuisine Italienne', -300, -1750),
(92, 32, 1, 'Plats cuisine World food', -350, -1750),
(93, 32, 1, 'Plats autres cuisines', -100, -1550),
(94, 33, 1, NULL, -100, -200),
(95, 34, 1, NULL, -150, -200),
(96, 35, 1, NULL, -100, -100),
(97, 36, 2, 'Centres de bronzage et solariums', 0, -1900),
(98, 36, 2, 'Produits de bronzage', -50, -1900),
(99, 37, 2, 'Instituts de beauté et spas', -50, -1950),
(100, 37, 2, 'Produits instituts de beauté et spas', -100, -1950),
(101, 38, 2, 'Hammams et saunas', -150, -1950),
(102, 38, 2, 'Produits hammams et saunas', -200, -1950),
(103, 39, 2, 'Magasins spécialisés cosmétiques', -100, -1900),
(104, 39, 2, 'Magasins spécialisés soin du cheveu', -150, -1900),
(105, 40, 2, 'Parfumeries', 0, -1900),
(106, 40, 2, 'Parfums', -50, -1900),
(107, 41, 2, 'Salons de coiffure enfants', -200, -1900),
(108, 41, 2, 'Salons de coiffure femmes', -250, -1900),
(109, 41, 2, 'Salons de coiffure hommes', -250, -1950),
(110, 41, 2, 'Salons de coiffure mixte', -300, -1950),
(111, 41, 2, 'Produits coiffure', -50, -1900),
(112, 42, 2, 'Salons de massage', 0, -1900),
(113, 42, 2, 'Produits de massage', -50, -1900),
(114, 43, 2, NULL, -350, -300),
(115, 44, 2, NULL, -400, -300),
(116, 45, 2, NULL, -450, -300),
(117, 46, 3, 'Cours et ateliers arts graphiques', 0, -2050),
(118, 46, 3, 'Événements et festivals arts graphiques', -50, -2050),
(119, 46, 3, 'Magasins spécialisés arts graphiques', -100, -2050),
(120, 46, 3, 'Papeteries et carteries ', -150, -2050),
(121, 46, 3, 'Produits arts graphiques', -200, -2050),
(122, 46, 3, 'Manifestations, événements, festivals, Arts graphiques', -250, -2050),
(123, 46, 3, 'Associations, écoles arts graphiques', -300, -2050),
(124, 46, 3, 'Autres arts graphiques', -350, -2050),
(125, 47, 3, 'Cours et écoles beaux-arts', 0, -2050),
(126, 47, 3, 'Galeries d''art', -400, -2050),
(127, 47, 3, 'Musées et expositions', -450, -2050),
(128, 47, 3, 'Peinture', 0, -2100),
(129, 47, 3, 'Sculpture', -50, -2100),
(130, 47, 3, 'Autres beaux-arts', -350, -2050),
(131, 47, 3, 'Manifestations, événements, festivals beaux-arts', -250, -2050),
(132, 47, 3, 'Associations, écoles beaux-arts', -300, -2050),
(133, 47, 3, 'Autres produits beaux-arts', -350, -2050),
(134, 48, 3, 'Cinémas', -100, -2100),
(135, 48, 3, 'Vidéoclubs', -150, -2100),
(136, 48, 3, 'Films', -200, -2100),
(137, 48, 3, 'Séries', -250, -2100),
(138, 48, 3, 'Clips', -300, -2100),
(139, 48, 3, 'Vidéos', -350, -2100),
(140, 48, 3, 'Manifestations, événements, festivals Cinéma et vidéo', -250, -2050),
(141, 48, 3, 'Associations, écoles cinéma et vidéo', -300, -2050),
(142, 48, 3, 'Autres cinéma et vidéo', -350, -2050),
(143, 49, 3, 'Bibliothèques', -400, -2100),
(144, 49, 3, 'Librairies et bouquinistes', -450, -2100),
(145, 49, 3, 'Livres', 0, -2150),
(146, 49, 3, 'Manifestations, événements, festivals littérature', -250, -2050),
(147, 49, 3, 'Associations, écoles littérature', -300, -2050),
(148, 49, 3, 'Autres littérature', -350, -2050),
(149, 50, 3, 'Cours et écoles de musique', 0, -2050),
(150, 50, 3, 'Disquaires', -50, -2150),
(151, 50, 3, 'Événements et festivals musique', -250, -2050),
(152, 50, 3, 'Librairies musicales', -100, -2150),
(153, 50, 3, 'Luthiers et magasins d''instruments musique', -150, -2150),
(154, 50, 3, 'Instruments musique', -200, -2150),
(155, 50, 3, 'Salles de concert', -250, -2150),
(156, 50, 3, 'Cd', -300, -2150),
(157, 50, 3, 'Chansons', -350, -2150),
(158, 50, 3, 'Manifestations, événements, festivals musique', -250, -2050),
(159, 50, 3, 'Associations, écoles musique', -300, -2050),
(160, 50, 3, 'Concerts', -250, -2150),
(161, 50, 3, 'Autres musique', -350, -2050),
(162, 51, 3, 'Cours et ateliers photographie', 0, -2050),
(163, 51, 3, 'Galeries et expositions photographie', -400, -2050),
(164, 51, 3, 'Studios photo et magasins spécialisés ', -400, -2150),
(165, 51, 3, 'Photographies', -450, -2150),
(166, 51, 3, 'Manifestations, événements, festivals photographie', -250, -2050),
(167, 51, 3, 'Associations, écoles de photographie', -300, -2050),
(168, 51, 3, 'Matériels photographie', -400, -2150),
(169, 51, 3, 'Autres photographie', -350, -2050),
(170, 52, 3, 'Cours et ateliers photographie', 0, -2050),
(171, 52, 3, 'Cirques', 0, -2200),
(172, 52, 3, 'Manifestations, événements, festivals', -250, -2050),
(173, 52, 3, 'Opéras', -50, -2200),
(174, 52, 3, 'Théâtres', -100, -2200),
(175, 52, 3, 'Pièces de théâtre', -100, -2200),
(176, 52, 3, 'Spectacles', -250, -2050),
(177, 52, 3, 'Associations, écoles théâtre, opéra et spectacles vivant', -300, -2050),
(178, 52, 3, 'Autres théâtre, opéra et spectacle vivant', -350, -2050),
(179, 53, 3, 'Centres culturels', -150, -2200),
(180, 53, 3, 'Grandes surfaces spécialisées culture', -200, -2200),
(181, 54, 3, NULL, -400, -400),
(182, 55, 3, NULL, -450, -400),
(183, 56, 3, NULL, 0, -450),
(184, 57, 4, 'Antiquaires', 0, -2300),
(185, 57, 4, 'Cuisinistes', -50, -2300),
(186, 57, 4, 'Grandes surfaces ameublement', -100, -2300),
(187, 57, 4, 'Magasins spécialisés ameublement', -150, -2300),
(188, 57, 4, 'Meubles', -200, -2300),
(189, 57, 4, 'Manifestations, événements, festivals ameublement', -250, -2300),
(190, 57, 4, 'Associations, écoles ameublement', -300, -2300),
(191, 57, 4, 'Autres ameublement', -350, -2300),
(192, 58, 4, 'Brocantes', -400, -2300),
(193, 58, 4, 'Encadrement', -450, -2300),
(194, 58, 4, 'Fleuristes', 0, -2350),
(195, 58, 4, 'Magasins luminaires', -50, -2350),
(196, 58, 4, 'Magasins linges et textiles de maison', -100, -2350),
(197, 58, 4, 'Magasins spécialisés décoration', -150, -2300),
(198, 58, 4, 'Fleurs', 0, -2350),
(199, 58, 4, 'Manifestations, événements, festivals décoration', -250, -2300),
(200, 58, 4, 'Associations, écoles', -300, -2300),
(201, 58, 4, 'Objets décoration', -150, -2350),
(202, 58, 4, 'Autres décoration', -350, -2300),
(203, 59, 4, 'Grandes surfaces électroménager et informatique', -100, -2300),
(204, 59, 4, 'Magasins électroménager et matériel informatique', -150, -2300),
(205, 59, 4, 'Gros électroménager', -200, -2350),
(206, 59, 4, 'Hi-fi, TV, vidéo', -250, -2350),
(207, 59, 4, 'Manifestations, événements, festivals électroménager et matériel informatique', -250, -2300),
(208, 59, 4, 'Associations, écoles électroménager et matériel informatique', -300, -2300),
(209, 59, 4, 'Autres électroménager et matériel informatique', -350, -2300),
(210, 60, 4, 'Articles de cuisine', -50, -2300),
(211, 60, 4, 'Autres magasins spécialisés équipement et articles de maison', -350, -2300),
(212, 60, 4, 'Articles de maison', -300, -2350),
(213, 60, 4, 'Autres équipements et articles de maison', -350, -2300),
(214, 61, 4, 'Fleurs', 0, -2350),
(215, 61, 4, 'Arbres', -350, -2350),
(216, 61, 4, 'Matériels de jardin', -400, -2350),
(217, 61, 4, 'Manifestations, événements, festivals jardineries', -250, -2300),
(218, 61, 4, 'Associations, écoles jardineries', -300, -2300),
(219, 61, 4, 'Autres jardineries', -350, -2300),
(220, 62, 4, 'Commerces bijoux Fantaisie', -450, -2350),
(221, 62, 4, 'Commerces bijoux Luxe', 0, -2400),
(222, 62, 4, 'Bijoux Fantaisie', -50, -2400),
(223, 62, 4, 'Bijoux Luxe', -100, -2400),
(224, 62, 4, 'Manifestations, événements, festivals bijouterie', -250, -2300),
(225, 62, 4, 'Associations, écoles bijouterie', -300, -2300),
(226, 63, 4, 'Magasins chaussures enfants', -150, -2400),
(227, 63, 4, 'Magasins chaussures femmes', -200, -2400),
(228, 63, 4, 'Magasins chaussures hommes', -250, -2400),
(229, 63, 4, 'Magasins chaussures mixte', -300, -2450),
(230, 63, 4, 'Magasins chaussures spécialisés', -150, -2300),
(231, 63, 4, 'Chaussures', -350, -2400),
(232, 63, 4, 'Manifestation, événement festivals chaussures', -250, -2300),
(233, 63, 4, 'Autres chausseurs', -350, -2300),
(234, 64, 4, 'Magasins de prêt-à-porter enfants', -150, -2400),
(235, 64, 4, 'Magasins de prêt-à-porter femmes', -200, -2400),
(236, 64, 4, 'Magasins de prêt-à-porter futures mamans', -400, -2400),
(237, 64, 4, 'Magasins de prêt-à-porter hommes', -350, -2450),
(238, 64, 4, 'Magasins de prêt-à-porter mixte', -300, -2400),
(239, 64, 4, 'Magasins de prêt-à-porter spécialisés', -150, -2300),
(240, 65, 4, 'Habits prêts à porter enfants', -150, -2400),
(241, 65, 4, 'Habits prêts à porter femmes', -200, -2400),
(242, 65, 4, 'Habits prêts à porter futures mamans', -400, -2400),
(243, 65, 4, 'Habits prêts à porter hommes', -250, -2400),
(244, 65, 4, 'Habits prêts à porter mixte', -300, -2450),
(245, 65, 4, 'Autres habits prêts à porter', -350, -2300),
(246, 66, 4, 'Magasin haute-Couture femmes', -200, -2400),
(247, 66, 4, 'Magasin haute-Couture hommes', -250, -2400),
(248, 66, 4, 'Magasin haute-Couture mariage', -450, -2400),
(249, 66, 4, 'Magasin haute-Couture mixte', -300, -2400),
(250, 66, 4, 'Mariages', -450, -2400),
(251, 67, 4, 'Habits haute-couture femmes', -200, -2400),
(252, 67, 4, 'Habits haute-couture hommes', -250, -2400),
(253, 67, 4, 'Habits haute-couture mariages', -450, -2400),
(254, 67, 4, 'Habits haute-couture mixte', -300, -2400),
(255, 67, 4, 'Habits haute-couture mariage', -450, -2400),
(256, 68, 4, 'Friperies', 0, -2450),
(257, 68, 4, 'Fripes', -50, -2450),
(258, 69, 4, 'Solderies', 0, -2450),
(259, 69, 4, 'Habits soldés', -50, -2450),
(260, 70, 4, 'Ganteries', 0, -2450),
(261, 70, 4, 'Gants', -100, -2450),
(262, 71, 4, 'Chapelleries', 0, -2450),
(263, 71, 4, 'Chapeaux', -100, -2450),
(264, 72, 4, 'Maroquineries', 0, -2450),
(265, 72, 4, 'Sac à mains, portefeuilles, maroquinerie', -100, -2450),
(266, 73, 4, 'Magasins colifichets et foulards', 0, -2450),
(267, 73, 4, 'Colifichets et foulards', -100, -2450),
(268, 74, 4, 'Magasins montres', 0, -2450),
(269, 74, 4, 'Montres', -100, -2450),
(270, 75, 4, 'Magasin parapluies', 0, -2450),
(271, 75, 4, 'Parapluies', -100, -2450),
(272, 76, 4, 'Magasins perruques', 0, -2450),
(273, 76, 4, 'Perruques', -100, -2450),
(274, 77, 4, NULL, 0, -650),
(275, 78, 4, NULL, -50, -650),
(276, 79, 4, NULL, -100, -650),
(277, 80, 5, 'Médecin généraliste', 0, -2550),
(278, 80, 5, 'Ophtalmologue', -50, -2550),
(279, 80, 5, 'Psychiatre', -100, -2550),
(280, 80, 5, 'Kinésithérapeute', 0, -2550),
(281, 81, 5, 'Opticiens', -50, -2550),
(282, 81, 5, 'Vendeurs prothèses auditives', -100, -2550),
(283, 82, 5, 'Laboratoires médicaux', 0, -2550),
(284, 82, 5, 'Produits laboratoires médicaux', -50, -2550),
(285, 82, 5, 'Autres laboratoires médicaux', -100, -2550),
(286, 83, 5, 'Hôpitaux et maisons médicales', 0, -2550),
(287, 83, 5, 'Produits hôpitaux et maisons médicales', -50, -2550),
(288, 83, 5, 'Autres hôpitaux et maisons médicales', -100, -2550),
(289, 84, 5, 'Dentistes', 0, -2550),
(290, 84, 5, 'Produits dentaires', -50, -2550),
(291, 84, 5, 'Autres produits dentaires', -100, -2550),
(292, 85, 5, 'Pharmacies et parapharmacies', -300, -2550),
(293, 85, 5, 'Médicaments', -50, -2550),
(294, 85, 5, 'Autres pharmacies et parapharmacies', -100, -2550),
(295, 86, 5, 'Vétérinaires', 0, -2550),
(296, 86, 5, 'Produits soins vétérinaires', -50, -2550),
(297, 86, 5, 'Autres soins vétérinaires', -100, -2550),
(298, 87, 5, NULL, -350, -750),
(299, 88, 5, NULL, -400, -750),
(300, 89, 5, NULL, -450, -750),
(301, 90, 6, 'Bars à cocktails', 0, -2650),
(302, 90, 6, 'Bars à thèmes', -50, -2650),
(303, 90, 6, 'Bars à vins', -100, -2650),
(304, 90, 6, 'Bars de jazz', -150, -2650),
(305, 90, 6, 'Bars karaoké', -200, -2650),
(306, 90, 6, 'Bars lounge', -250, -2650),
(307, 90, 6, 'Cocktails', -300, -2650),
(308, 90, 6, 'Magasins spécialisés bars', -350, -2650),
(309, 90, 6, 'Marques bars', -400, -2650),
(310, 90, 6, 'Produits bars', -450, -2650),
(311, 90, 6, 'Autres bars', 0, -2700),
(312, 90, 6, 'Personnalités bars', -50, -2700),
(313, 91, 6, 'Salles cabarets', -100, -2700),
(314, 91, 6, 'Spectacles, événements cabarets', -150, -2700),
(315, 91, 6, 'Personnalités cabarets', -50, -2700),
(316, 91, 6, 'Autres cabarets', 0, -2700),
(317, 92, 6, NULL, -100, -850),
(318, 93, 6, 'Night-club clubs généraliste', -250, -2700),
(319, 93, 6, 'Night-club clubs hip Hop, Rap, R''n''B', -300, -2700),
(320, 93, 6, 'Night-club clubs house', -350, -2700),
(321, 93, 6, 'Night-club clubs techno Electro', -400, -2700),
(322, 93, 6, 'Night-club clubs musiques latines', -450, -2700),
(323, 93, 6, 'Personnalités night-club clubs', -50, -2700),
(324, 93, 6, 'Autres night-club clubs', 0, -2700),
(325, 94, 6, NULL, -200, -850),
(326, 95, 6, NULL, -250, -850),
(327, 96, 6, NULL, -300, -850),
(328, 97, 6, 'Magasins de jouets', -150, -2750),
(329, 97, 6, 'Magasins de jeux enfants et adultes', -200, -2750),
(330, 97, 6, 'Salles de jeux', -250, -2750),
(331, 98, 6, 'Commerces jeux', -50, -2850),
(332, 98, 6, 'Jeux', -450, -2650),
(333, 99, 6, NULL, -450, -850),
(334, 100, 6, NULL, 0, -900),
(335, 101, 6, 'Agences de voyage', -450, -2750),
(336, 101, 6, 'Continents', 0, -2800),
(337, 101, 6, 'Pays', -50, -2800),
(338, 101, 6, 'Régions', -100, -2800),
(339, 101, 6, 'Villes', -150, -2800),
(340, 101, 6, 'Quartiers', -200, -2800),
(341, 101, 6, 'Hôtels', -250, -2800),
(342, 101, 6, 'Maisons d''hôtes', -300, -2800),
(343, 101, 6, 'Compagnies de transport', -350, -2800),
(344, 101, 6, 'Autres voyages', 0, -2700),
(345, 102, 6, NULL, -100, -900),
(346, 103, 6, NULL, -150, -900),
(347, 104, 6, NULL, -200, -900),
(348, 105, 7, 'Magasins spécialisés football', 0, -2950),
(349, 105, 7, 'Matériels football', -50, -2950),
(350, 105, 7, 'Équipes football', -100, -2950),
(351, 105, 7, 'Personnalités football', -150, -2950),
(352, 105, 7, 'Événements football', -200, -2950),
(353, 105, 7, 'Associations sportives football', -250, -2950),
(354, 105, 7, 'Stades, salles football', -300, -2950),
(355, 105, 7, 'Autres football', -350, -2950),
(356, 106, 7, 'Magasins spécialisés tennis', 0, -2950),
(357, 106, 7, 'Matériels tennis', -50, -2950),
(358, 106, 7, 'Équipes tennis', -100, -2950),
(359, 106, 7, 'Personnalités tennis', -150, -2950),
(360, 106, 7, 'Événements tennis', -200, -2950),
(361, 106, 7, 'Associations sportives tennis', -250, -2950),
(362, 106, 7, 'Stades, salles tennis', -300, -2950),
(363, 106, 7, 'Autres tennis', -350, -2950),
(364, 107, 7, 'Magasins spécialisés rugby', 0, -2950),
(365, 107, 7, 'Matériels rugby', -50, -2950),
(366, 107, 7, 'Équipes rugby', -100, -2950),
(367, 107, 7, 'Personnalités rugby', -150, -2950),
(368, 107, 7, 'Événements rugby', -200, -2950),
(369, 107, 7, 'Associations sportives rugby', -250, -2950),
(370, 107, 7, 'Stades, salles rugby', -300, -2950),
(371, 107, 7, 'Autres rugby', -350, -2950),
(372, 108, 7, 'Magasins spécialisés F1', 0, -2950),
(373, 108, 7, 'Matériels F1', -50, -2950),
(374, 108, 7, 'Équipes F1', -100, -2950),
(375, 108, 7, 'Personnalités F1', -150, -2950),
(376, 108, 7, 'Événements F1', -200, -2950),
(377, 108, 7, 'Associations sportives F1', -250, -2950),
(378, 108, 7, 'Circuits, aires d''entraînements F1', -400, -2950),
(379, 108, 7, 'Autres F1', -350, -2950),
(380, 109, 7, 'Magasins spécialisés auto-moto', 0, -2950),
(381, 109, 7, 'Matériels auto-moto', -50, -2950),
(382, 109, 7, 'Équipes auto-moto', -100, -2950),
(383, 109, 7, 'Personnalités auto-moto', -150, -2950),
(384, 109, 7, 'Événements auto-moto', -200, -2950),
(385, 109, 7, 'Associations sportives auto-moto', -250, -2950),
(386, 109, 7, 'Circuits, aires d''entraînements auto-moto', -400, -2950),
(387, 109, 7, 'Autres auto-moto', -350, -2950),
(388, 110, 7, 'Magasins spécialisés basket', 0, -2950),
(389, 110, 7, 'Matériels basket', -50, -2950),
(390, 110, 7, 'Équipes basket', -100, -2950),
(391, 110, 7, 'Personnalités basket', -150, -2950),
(392, 110, 7, 'Événements basket', -200, -2950),
(393, 110, 7, 'Associations sportives basket', -250, -2950),
(394, 110, 7, 'Stades, salles basket', -300, -2950),
(395, 110, 7, 'Autres basket', -350, -2950),
(396, 111, 7, 'Magasins spécialisés handball', 0, -2950),
(397, 111, 7, 'Matériels handball', -50, -2950),
(398, 111, 7, 'Équipes handball', -100, -2950),
(399, 111, 7, 'Personnalités handball', -150, -2950),
(400, 111, 7, 'Événements handball', -200, -2950),
(401, 111, 7, 'Associations sportives handball', -250, -2950),
(402, 111, 7, 'Stades, salles handball', -300, -2950),
(403, 111, 7, 'Autres handball', -350, -2950),
(404, 112, 7, 'Magasins spécialisés golf', 0, -2950),
(405, 112, 7, 'Matériels golf', -50, -2950),
(406, 112, 7, 'Équipes golf', -100, -2950),
(407, 112, 7, 'Personnalités golf', -150, -2950),
(408, 112, 7, 'Événements golf', -200, -2950),
(409, 112, 7, 'Associations sportives golf', -250, -2950),
(410, 112, 7, 'Parcours, indoor golf', -450, -2950),
(411, 112, 7, 'Autres golf', -350, -2950),
(412, 113, 7, 'Magasins spécialisés cyclisme', 0, -2950),
(413, 113, 7, 'Matériels cyclisme', -50, -2950),
(414, 113, 7, 'Équipes cyclisme', -100, -2950),
(415, 113, 7, 'Personnalités cyclisme', -150, -2950),
(416, 113, 7, 'Événements cyclisme', -200, -2950),
(417, 113, 7, 'Associations sportives cyclisme', -250, -2950),
(418, 113, 7, 'Stades, salles cyclisme', -300, -2950),
(419, 113, 7, 'Autres cyclisme', -350, -2950),
(420, 114, 7, 'Magasins spécialisés athlétisme', 0, -2950),
(421, 114, 7, 'Matériels athlétisme', -50, -2950),
(422, 114, 7, 'Équipes athlétisme', -100, -2950),
(423, 114, 7, 'Personnalités athlétisme', -150, -2950),
(424, 114, 7, 'Événements athlétisme', -200, -2950),
(425, 114, 7, 'Associations sportives athlétisme', -250, -2950),
(426, 114, 7, 'Stades, salles athlétisme', -300, -2950),
(427, 114, 7, 'Autres athlétisme', -350, -2950),
(428, 115, 7, 'Magasins spécialisés natation', 0, -2950),
(429, 115, 7, 'Matériels natation', -50, -2950),
(430, 115, 7, 'Équipes natation', -100, -2950),
(431, 115, 7, 'Personnalités natation ', -150, -2950),
(432, 115, 7, 'Événements natation', -200, -2950),
(433, 115, 7, 'Associations sportives natation', -250, -2950),
(434, 115, 7, 'Piscines, aires d''entraînements natation', 0, -3000),
(435, 115, 7, 'Autres natation', -350, -2950),
(436, 116, 7, 'Magasins spécialisés voile', 0, -2950),
(437, 116, 7, 'Matériels voile', -50, -2950),
(438, 116, 7, 'Équipes voile', -100, -2950),
(439, 116, 7, 'Personnalités voile', -150, -2950),
(440, 116, 7, 'Événements voile', -200, -2950),
(441, 116, 7, 'Associations sportives voile', -250, -2950),
(442, 116, 7, 'Bassins, aires d''entraînements voile', 0, -3000),
(443, 116, 7, 'Autres voile', -350, -2950),
(444, 117, 7, 'Magasins spécialisés hippisme', 0, -2950),
(445, 117, 7, 'Matériels hippisme', -50, -2950),
(446, 117, 7, 'Équipes hippisme', -100, -2950),
(447, 117, 7, 'Personnalités hippisme', -150, -2950),
(448, 117, 7, 'Événements hippisme', -200, -2950),
(449, 117, 7, 'Associations sportives hippisme', -250, -2950),
(450, 117, 7, 'Hippodrome, aires d''entraînements hippisme', -50, -3000),
(451, 117, 7, 'Autres hippisme', -350, -2950),
(452, 118, 7, 'Magasins spécialisés volley bal', 0, -2950),
(453, 118, 7, 'Matériels volley ball', -50, -2950),
(454, 118, 7, 'Équipes volley ball', -100, -2950),
(455, 118, 7, 'Personnalités volley ball', -150, -2950),
(456, 118, 7, 'Événements volley ball', -200, -2950),
(457, 118, 7, 'Associations sportives volley ball', -250, -2950),
(458, 118, 7, 'Stades, salles volley ball', -300, -2950),
(459, 118, 7, 'Autres volley ball', -350, -2950),
(460, 119, 7, 'Magasins spécialisés hockey', 0, -2950),
(461, 119, 7, 'Matériels hockey', -50, -2950),
(462, 119, 7, 'Équipes hockey', -100, -2950),
(463, 119, 7, 'Personnalités hockey', -150, -2950),
(464, 119, 7, 'Événements hockey', -200, -2950),
(465, 119, 7, 'Associations sportives hockey', -250, -2950),
(466, 119, 7, 'Stades, salles, patinoires hockey', -300, -2950),
(467, 119, 7, 'Autres hockey', -350, -2950),
(468, 120, 7, 'Magasins spécialisés surf', 0, -2950),
(469, 120, 7, 'Matériels surf', -50, -2950),
(470, 120, 7, 'Équipes surf', -100, -2950),
(471, 120, 7, 'Personnalités surf', -150, -2950),
(472, 120, 7, 'Événements surf', -200, -2950),
(473, 120, 7, 'Associations sportives surf', -250, -2950),
(474, 120, 7, 'Plages, aires d''entraînements surf', -100, -3000),
(475, 120, 7, 'Autres surf', -350, -2950),
(476, 121, 7, 'Magasins spécialisés judo', 0, -2950),
(477, 121, 7, 'Matériels judo', -50, -2950),
(478, 121, 7, 'Équipes judo', -100, -2950),
(479, 121, 7, 'Personnalités judo', -150, -2950),
(480, 121, 7, 'Événements judo', -200, -2950),
(481, 121, 7, 'Associations sportives judo', -250, -2950),
(482, 121, 7, 'Stades, salles judo', -300, -2950),
(483, 121, 7, 'Autres judo', -350, -2950),
(484, 122, 7, 'Magasins spécialisés escrime', 0, -2950),
(485, 122, 7, 'Matériels escrime', -50, -2950),
(486, 122, 7, 'Équipes escrime', -100, -2950),
(487, 122, 7, 'Personnalités escrime', -150, -2950),
(488, 122, 7, 'Événements escrime', -200, -2950),
(489, 122, 7, 'Associations sportives escrime', -250, -2950),
(490, 122, 7, 'Stades, salles escrime', -300, -2950),
(491, 122, 7, 'Autres escrime', -350, -2950),
(492, 123, 7, 'Magasins spécialisés ski – glace', 0, -2950),
(493, 123, 7, 'Matériels ski – glace', -50, -2950),
(494, 123, 7, 'Équipes ski – glace', -100, -2950),
(495, 123, 7, 'Personnalités ski – glace', -150, -2950),
(496, 123, 7, 'Événements ski – glace', -200, -2950),
(497, 123, 7, 'Associations sportives ski – glace', -250, -2950),
(498, 123, 7, 'Stations, pistes ski – glace', -150, -3000),
(499, 123, 7, 'Autres ski – glace', -350, -2950),
(500, 124, 7, 'Magasins spécialisés boxe', 0, -2950),
(501, 124, 7, 'Matériels boxe', -50, -2950),
(502, 124, 7, 'Équipes boxe', -100, -2950),
(503, 124, 7, 'Personnalités boxe', -150, -2950),
(504, 124, 7, 'Événements boxe', -200, -2950),
(505, 124, 7, 'Associations sportives boxe', -250, -2950),
(506, 124, 7, 'Stades, salles boxe', -300, -2950),
(507, 124, 7, 'Autres boxe', -350, -2950),
(508, 125, 7, 'Magasins spécialisés gym', 0, -2950),
(509, 125, 7, 'Matériels gym', -50, -2950),
(510, 125, 7, 'Équipes gym', -100, -2950),
(511, 125, 7, 'Personnalités gym', -150, -2950),
(512, 125, 7, 'Événements gym', -200, -2950),
(513, 125, 7, 'Associations sportives gym', -250, -2950),
(514, 125, 7, 'Stades, salles gym', -300, -2950),
(515, 125, 7, 'Autres gym', -350, -2950),
(516, 126, 7, 'Magasins spécialisés aviron', 0, -2950),
(517, 126, 7, 'Matériels aviron', -50, -2950),
(518, 126, 7, 'Équipes aviron', -100, -2950),
(519, 126, 7, 'Personnalités aviron', -150, -2950),
(520, 126, 7, 'Événements aviron', -200, -2950),
(521, 126, 7, 'Associations sportives aviron', -250, -2950),
(522, 126, 7, 'Bassins, aires d''entraînements aviron', 0, -3000),
(523, 126, 7, 'Autres aviron', -350, -2950),
(524, 127, 7, 'Magasins spécialisés NFL', 0, -2950),
(525, 127, 7, 'Matériels NFL', -50, -2950),
(526, 127, 7, 'Équipes NFL', -100, -2950),
(527, 127, 7, 'Personnalités NFL', -150, -2950),
(528, 127, 7, 'Événements NFL', -200, -2950),
(529, 127, 7, 'Associations sportives NFL', -250, -2950),
(530, 127, 7, 'Stades, salles NFL', -300, -2950),
(531, 127, 7, 'Autres NFL', -350, -2950),
(532, 128, 7, 'Magasins spécialisés tennis de table', 0, -2950),
(533, 128, 7, 'Matériels tennis de table', -50, -2950),
(534, 128, 7, 'Équipes tennis de table', -100, -2950),
(535, 128, 7, 'Personnalités tennis de table', -150, -2950),
(536, 128, 7, 'Événements tennis de table', -200, -2950),
(537, 128, 7, 'Associations sportives tennis de table', -250, -2950),
(538, 128, 7, 'Stades, salles tennis de table', -300, -2950),
(539, 128, 7, 'Autres tennis de table', -350, -2950),
(540, 129, 7, 'Magasins spécialisés équitation', 0, -2950),
(541, 129, 7, 'Matériels équitation', -50, -2950),
(542, 129, 7, 'Équipes équitation', -100, -2950),
(543, 129, 7, 'Personnalités équitation', -150, -2950),
(544, 129, 7, 'Événements équitation', -200, -2950),
(545, 129, 7, 'Associations sportives équitation', -250, -2950),
(546, 129, 7, 'Hippodrome, aires d''entraînements', -50, -3050),
(547, 129, 7, 'Autres équitation', -350, -2950),
(548, 130, 7, 'Magasins spécialisés kanoe kayak', 0, -2950),
(549, 130, 7, 'Matériels kanoe kayak', -50, -2950),
(550, 130, 7, 'Équipes kanoe kayak', -100, -2950),
(551, 130, 7, 'Personnalités kanoe kayak', -150, -2950),
(552, 130, 7, 'Événements kanoe kayak', -200, -2950),
(553, 130, 7, 'Associations sportives kanoe kayak', -250, -2950),
(554, 130, 7, 'Bassins, aires d''entraînements kanoe kayak', 0, -3000),
(555, 130, 7, 'Autres kanoe kayak', -350, -2950),
(556, 131, 7, 'Magasins spécialisés haltérophilie', 0, -2950),
(557, 131, 7, 'Matériels haltérophilie', -50, -2950),
(558, 131, 7, 'Équipes haltérophilie', -100, -2950),
(559, 131, 7, 'Personnalités haltérophilie', -150, -2950),
(560, 131, 7, 'Événements haltérophilie', -200, -2950),
(561, 131, 7, 'Associations sportives haltérophilie', -250, -2950),
(562, 131, 7, 'Stades, salles haltérophilie', -300, -2950),
(563, 131, 7, 'Autres haltérophilie', -350, -2950),
(564, 132, 7, 'Magasins spécialisés triathlon', 0, -2950),
(565, 132, 7, 'Matériels triathlon', -50, -2950),
(566, 132, 7, 'Équipes triathlon', -100, -2950),
(567, 132, 7, 'Personnalités triathlon', -150, -2950),
(568, 132, 7, 'Événements triathlon', -200, -2950),
(569, 132, 7, 'Associations sportives triathlon', -250, -2950),
(570, 132, 7, 'Stades, salles triathlon', -300, -2950),
(571, 132, 7, 'Autres triathlon', -350, -2950),
(572, 133, 7, 'Magasins spécialisés lutte gréco romaine', 0, -2950),
(573, 133, 7, 'Matériels lutte gréco romaine', -50, -2950),
(574, 133, 7, 'Équipes lutte gréco romaine', -100, -2950),
(575, 133, 7, 'Personnalités lutte gréco romaine', -150, -2950),
(576, 133, 7, 'Événements lutte gréco romaine', -200, -2950),
(577, 133, 7, 'Associations sportives lutte gréco romaine', -250, -2950),
(578, 133, 7, 'Stades, salles', -300, -2950),
(579, 133, 7, 'Autres lutte gréco romaine', -350, -2950),
(580, 134, 7, 'Magasins spécialisés pentathlon moderne', 0, -2950),
(581, 134, 7, 'Matériels pentathlon moderne', -50, -2950),
(582, 134, 7, 'Équipes pentathlon moderne', -100, -2950),
(583, 134, 7, 'Personnalités pentathlon moderne', -150, -2950),
(584, 134, 7, 'Événements pentathlon moderne', -200, -2950),
(585, 134, 7, 'Associations sportives pentathlon moderne', -250, -2950),
(586, 134, 7, 'Stades, salles pentathlon moderne', -300, -2950),
(587, 134, 7, 'Autres pentathlon moderne', -350, -2950),
(588, 135, 7, 'Magasins spécialisés tir', 0, -2950),
(589, 135, 7, 'Matériels tir', -50, -2950),
(590, 135, 7, 'Équipes tir', -100, -2950),
(591, 135, 7, 'Personnalités tir', -150, -2950),
(592, 135, 7, 'Événements tir', -200, -2950),
(593, 135, 7, 'Associations sportives tir', -250, -2950),
(594, 135, 7, 'Stades, salles tir', -300, -2950),
(595, 135, 7, 'Autres tir', -350, -2950),
(596, 136, 7, 'Magasins spécialisés taekwondo', 0, -2950),
(597, 136, 7, 'Matériels taekwondo', -50, -2950),
(598, 136, 7, 'Équipes taekwondo', -100, -2950),
(599, 136, 7, 'Personnalités taekwondo', -150, -2950),
(600, 136, 7, 'Événements taekwondo', -200, -2950),
(601, 136, 7, 'Associations sportives taekwondo', -250, -2950),
(602, 136, 7, 'Stades, salles taekwondo', -300, -2950),
(603, 136, 7, 'Autres taekwondo', -350, -2950),
(604, 137, 7, 'Magasins spécialisés badminton', 0, -2950),
(605, 137, 7, 'Matériels badminton', -50, -2950),
(606, 137, 7, 'Équipes badminton', -100, -2950),
(607, 137, 7, 'Personnalités badminton', -150, -2950),
(608, 137, 7, 'Événements badminton', -200, -2950),
(609, 137, 7, 'Associations sportives badminton', -250, -2950),
(610, 137, 7, 'Stades, salles badminton', -300, -2950),
(611, 137, 7, 'Autres badminton', -350, -2950),
(612, 138, 7, NULL, -150, -1150),
(613, 139, 7, NULL, -200, -1150),
(614, 140, 7, NULL, -250, -1150),
(615, 141, 7, 'Journaux', -350, -3000),
(616, 141, 7, 'Chaines télévisions', -400, -3000),
(617, 141, 7, 'Radios', -450, -3000),
(618, 141, 7, 'Magazines', 0, -3050),
(619, 142, 7, NULL, -350, -1150),
(620, 143, 7, NULL, -400, -1150),
(621, 144, 8, 'Commerces achat d''or', 0, -3150),
(622, 144, 8, 'Marques achat d''or', -50, -3150),
(623, 145, 8, 'Agences immobilières', 0, -3150),
(624, 145, 8, 'Marques agences immobilières', -50, -3150),
(625, 146, 8, 'Agences intérimaires', 0, -3150),
(626, 146, 8, 'Marques agences intérimaires', -50, -3150),
(627, 147, 8, 'Cabinet d''assurances', 0, -3150),
(628, 147, 8, 'Marques assureurs', -50, -3150),
(629, 148, 8, 'banques', 0, -3150),
(630, 148, 8, 'Marques banques', -50, -3150),
(631, 149, 8, 'Bureaux de tabac', 0, -3150),
(632, 149, 8, 'Marques tabac', -50, -3150),
(633, 150, 8, 'Cordonneries', 0, -3150),
(634, 150, 8, 'Marques cordonneries', -50, -3150),
(635, 151, 8, 'Concessionnaires', 0, -3200),
(636, 151, 8, 'Marques voitures', -50, -3150),
(637, 152, 8, 'Électriciens', -450, -3150),
(638, 152, 8, 'Marques électricité', -50, -3150),
(639, 153, 8, 'Hypermarchés', -100, -3150),
(640, 153, 8, 'Supermarchés', -150, -3150),
(641, 153, 8, 'Supérettes', -200, -3150),
(642, 153, 8, 'Discount', -250, -3150),
(643, 154, 8, 'Laveries', 0, -3150),
(644, 154, 8, 'Marques laveries', -50, -3150),
(645, 155, 8, 'Loueurs de véhicules', 0, -3150),
(646, 155, 8, 'Marques location de véhicules', -50, -3150),
(647, 156, 8, 'Maisons de la presse', 0, -3150),
(648, 156, 8, 'Marques maisons de la presse', -50, -3150),
(649, 157, 8, 'Entreprises ménage à domicile', -300, -3150),
(650, 157, 8, 'Marques ménage à domicile', -50, -3150),
(651, 158, 8, 'Plombiers', -300, -3150),
(652, 158, 8, 'Marques plomberie', -50, -3150),
(653, 159, 8, 'Pressings et nettoyage à sec', -400, -3150),
(654, 159, 8, 'Marques pressings et nettoyage à sec', -50, -3150),
(655, 160, 8, 'Réparation Micro-informatique', 0, -3150),
(656, 160, 8, 'Marques réparation TV-Hifi-informatique', -50, -3150),
(657, 161, 8, 'Serruriers', -350, -3150),
(658, 161, 8, 'Marques serrures', -50, -3150),
(659, 162, 8, 'Stations-services', 0, -3150),
(660, 162, 8, 'Marques stations-services', -50, -3150),
(661, 163, 8, 'Sex-shop', 0, -3150),
(662, 163, 8, 'Marques sex-shop', -50, -3150),
(663, 164, 8, 'Clubs privés', 0, -3150),
(664, 164, 8, 'Marques clubs privés', -50, -3150);


