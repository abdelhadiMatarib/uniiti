

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




ALTER TABLE `contributeurs` ADD `date_inscription` datetime DEFAULT NULL
, ADD `slide1_contributeur` varchar(45) DEFAULT NULL
, ADD `slide2_contributeur` varchar(45) DEFAULT NULL
, ADD `slide3_contributeur` varchar(45) DEFAULT NULL
, ADD `slide4_contributeur` varchar(45) DEFAULT NULL
, ADD `slide5_contributeur` varchar(45) DEFAULT NULL
, ADD `profession_contributeur` varchar(45) DEFAULT NULL
, ADD `descriptif_contributeur` longtext DEFAULT NULL
, ADD `categorieage_contributeur` varchar(45) DEFAULT NULL ;

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
, ADD `thumnail_enseigne` varchar(45) DEFAULT NULL
, ADD `video_enseigne` varchar(255) DEFAULT NULL
, ADD `fb_enseigne` varchar(255) DEFAULT NULL
, ADD `tw_enseigne` varchar(255) DEFAULT NULL
, ADD `goog_enseigne` varchar(255) DEFAULT NULL ;

UPDATE `enseignes` SET sscategorie_enseigne =301, id_quartier=1, id_budget=4 WHERE id_enseigne=1 ;
UPDATE `enseignes` SET sscategorie_enseigne =68, id_quartier=NULL, id_budget=4 WHERE id_enseigne=2 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=4 WHERE id_enseigne=3 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=NULL, id_budget=4 WHERE id_enseigne=4 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=NULL, id_budget=4 WHERE id_enseigne=5 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=NULL, id_budget=4 WHERE id_enseigne=6 ;
UPDATE `enseignes` SET sscategorie_enseigne =183, id_quartier=NULL, id_budget=4 WHERE id_enseigne=7 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=4 WHERE id_enseigne=8 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=4 WHERE id_enseigne=9 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=NULL, id_budget=4 WHERE id_enseigne=10 ;
UPDATE `enseignes` SET sscategorie_enseigne =183, id_quartier=31, id_budget=1 WHERE id_enseigne=11 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=4 WHERE id_enseigne=12 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=4 WHERE id_enseigne=13 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=NULL, id_budget=4 WHERE id_enseigne=14 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=54, id_budget=4 WHERE id_enseigne=15 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=27, id_budget=1 WHERE id_enseigne=16 ;
UPDATE `enseignes` SET sscategorie_enseigne =4, id_quartier=27, id_budget=1 WHERE id_enseigne=17 ;
UPDATE `enseignes` SET sscategorie_enseigne =301, id_quartier=17, id_budget=2 WHERE id_enseigne=18 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=17, id_budget=3 WHERE id_enseigne=19 ;
UPDATE `enseignes` SET sscategorie_enseigne =58, id_quartier=NULL, id_budget=2 WHERE id_enseigne=20 ;
UPDATE `enseignes` SET sscategorie_enseigne =48, id_quartier=NULL, id_budget=2 WHERE id_enseigne=21 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=NULL, id_budget=2 WHERE id_enseigne=22 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=NULL, id_budget=2 WHERE id_enseigne=23 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=3 WHERE id_enseigne=24 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=25 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=26 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=NULL, id_budget=2 WHERE id_enseigne=27 ;
UPDATE `enseignes` SET sscategorie_enseigne =58, id_quartier=NULL, id_budget=3 WHERE id_enseigne=28 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=NULL, id_budget=3 WHERE id_enseigne=29 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=30 ;
UPDATE `enseignes` SET sscategorie_enseigne =292, id_quartier=NULL, id_budget=2 WHERE id_enseigne=31 ;
UPDATE `enseignes` SET sscategorie_enseigne =620, id_quartier=NULL, id_budget=2 WHERE id_enseigne=32 ;
UPDATE `enseignes` SET sscategorie_enseigne =17, id_quartier=NULL, id_budget=2 WHERE id_enseigne=33 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=34 ;
UPDATE `enseignes` SET sscategorie_enseigne =78, id_quartier=NULL, id_budget=2 WHERE id_enseigne=35 ;
UPDATE `enseignes` SET sscategorie_enseigne =331, id_quartier=NULL, id_budget=2 WHERE id_enseigne=36 ;
UPDATE `enseignes` SET sscategorie_enseigne =237, id_quartier=NULL, id_budget=2 WHERE id_enseigne=37 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=41, id_budget=2 WHERE id_enseigne=38 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=46, id_budget=2 WHERE id_enseigne=39 ;
UPDATE `enseignes` SET sscategorie_enseigne =99, id_quartier=1, id_budget=2 WHERE id_enseigne=40 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=41 ;
UPDATE `enseignes` SET sscategorie_enseigne =48, id_quartier=NULL, id_budget=2 WHERE id_enseigne=42 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=43 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=NULL, id_budget=2 WHERE id_enseigne=44 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=45 ;
UPDATE `enseignes` SET sscategorie_enseigne =221, id_quartier=NULL, id_budget=2 WHERE id_enseigne=46 ;
UPDATE `enseignes` SET sscategorie_enseigne =45, id_quartier=NULL, id_budget=2 WHERE id_enseigne=47 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=NULL, id_budget=2 WHERE id_enseigne=48 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=NULL, id_budget=2 WHERE id_enseigne=49 ;
UPDATE `enseignes` SET sscategorie_enseigne =653, id_quartier=NULL, id_budget=2 WHERE id_enseigne=50 ;
UPDATE `enseignes` SET sscategorie_enseigne =41, id_quartier=NULL, id_budget=2 WHERE id_enseigne=51 ;
UPDATE `enseignes` SET sscategorie_enseigne =164, id_quartier=NULL, id_budget=2 WHERE id_enseigne=52 ;
UPDATE `enseignes` SET sscategorie_enseigne =150, id_quartier=NULL, id_budget=2 WHERE id_enseigne=53 ;
UPDATE `enseignes` SET sscategorie_enseigne =612, id_quartier=NULL, id_budget=2 WHERE id_enseigne=54 ;
UPDATE `enseignes` SET sscategorie_enseigne =16, id_quartier=NULL, id_budget=2 WHERE id_enseigne=55 ;
UPDATE `enseignes` SET sscategorie_enseigne =10, id_quartier=NULL, id_budget=2 WHERE id_enseigne=56 ;
UPDATE `enseignes` SET sscategorie_enseigne =653, id_quartier=NULL, id_budget=2 WHERE id_enseigne=57 ;
UPDATE `enseignes` SET sscategorie_enseigne =637, id_quartier=NULL, id_budget=2 WHERE id_enseigne=58 ;
UPDATE `enseignes` SET sscategorie_enseigne =1, id_quartier=NULL, id_budget=2 WHERE id_enseigne=59 ;
UPDATE `enseignes` SET sscategorie_enseigne =216, id_quartier=NULL, id_budget=2 WHERE id_enseigne=60 ;
UPDATE `enseignes` SET sscategorie_enseigne =54, id_quartier=NULL, id_budget=2 WHERE id_enseigne=61 ;
UPDATE `enseignes` SET sscategorie_enseigne =229, id_quartier=NULL, id_budget=2 WHERE id_enseigne=62 ;
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
UPDATE `enseignes` SET sscategorie_enseigne =289, id_quartier=66, id_budget=3 WHERE id_enseigne=235 ;
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
  `arrondissement` varchar(45) NOT NULL,
  PRIMARY KEY (`id_arrondissement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

INSERT INTO `arrondissement` (`id_arrondissement`, `arrondissement`) VALUES
(1, 'Paris 1<sup>er</sup>'),
(2, 'Paris 2<sup>ème</sup>'),
(3, 'Paris 3<sup>ème</sup>'),
(4, 'Paris 4<sup>ème</sup>'),
(5, 'Paris 5<sup>ème</sup>'),
(6, 'Paris 6<sup>ème</sup>'),
(7, 'Paris 7<sup>ème</sup>'),
(8, 'Paris 8<sup>ème</sup>'),
(9, 'Paris 9<sup>ème</sup>'),
(10, 'Paris 10<sup>ème</sup>'),
(11, 'Paris 11<sup>ème</sup>'),
(12, 'Paris 12<sup>ème</sup>'),
(13, 'Paris 13<sup>ème</sup>'),
(14, 'Paris 14<sup>ème</sup>'),
(15, 'Paris 15<sup>ème</sup>'),
(16, 'Paris 16<sup>ème</sup>'),
(17, 'Paris 17<sup>ème</sup>'),
(18, 'Paris 18<sup>ème</sup>'),
(19, 'Paris 19<sup>ème</sup>'),
(20, 'Paris 20<sup>ème</sup>') ;


-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE IF NOT EXISTS `quartier` (
  `id_quartier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_arrondissement` int(10) unsigned NOT NULL,
  `quartier` varchar(45) NOT NULL,
  PRIMARY KEY (`id_quartier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

INSERT INTO `quartier` (`id_quartier`, `id_arrondissement`, `quartier`) VALUES
(1, 1, 'Châtelet - les Halles'), 
(2, 1, 'Louvre - Rivoli'), 
(3, 1, 'Pyramides'), 
(4, 2, 'Bourse'), 
(5, 2, 'Montorgueil'), 
(6, 2, 'Sentier'), 
(7, 3, 'Rambuteau'), 
(8, 3, 'République'), 
(9, 3, 'Temple'), 
(10, 4, 'Cité'), 
(11, 4, 'Hôtel de Ville'), 
(12, 4, 'Île Saint-Louis'), 
(13, 4, 'Marais'), 
(14, 5, 'Jardin des plantes'), 
(15, 5, 'Monge / Mouffetard'), 
(16, 5, 'Quartier latin'), 
(17, 6, 'Luxembourg'), 
(18, 6, 'Odéon'), 
(19, 6, 'Saint-Germain'), 
(20, 6, 'Vavin'), 
(21, 7, 'Invalides'), 
(22, 7, 'Rue du Bac'), 
(23, 7, 'Solférino'), 
(24, 7, 'Tour Eiffel'), 
(25, 7, 'Vaneau'), 
(26, 8, 'Champs Elysées'), 
(27, 8, 'Concorde'), 
(28, 8, 'Etoile'), 
(29, 8, 'Madeleine'), 
(30, 8, 'Monceau'), 
(31, 9, 'Grands Boulevards'), 
(32, 9, 'La Fayette'), 
(33, 9, 'Montmartre'), 
(34, 9, 'Notre Dame de Lorette'), 
(35, 9, 'Opéra'), 
(36, 10, 'Canal St Martin'), 
(37, 10, 'Louis Blanc'), 
(38, 10, 'Magenta'), 
(39, 10, 'Saint-Louis'), 
(40, 10, 'Saint-Martin'), 
(41, 11, 'Bastille / Roquette'), 
(42, 11, 'Faidherbe-Chaligny'), 
(43, 11, 'Oberkampf'), 
(44, 11, 'Parmentier'), 
(45, 11, 'Voltaire'), 
(46, 12, 'Bercy'), 
(47, 12, 'Cour Saint-Emilion'), 
(48, 12, 'Daumesnil'), 
(49, 12, 'Gare de Lyon'), 
(50, 12, 'Nation'), 
(51, 13, 'Bibliothèque François Mitterand'), 
(52, 13, 'Butte aux Cailles'), 
(53, 13, 'Gobelins'), 
(54, 13, 'Place d''Italie'), 
(55, 13, 'Olympiades / quartier chinois'), 
(56, 14, 'Alesia'), 
(57, 14, 'Denfert Rochereau'), 
(58, 14, 'Montparnasse'), 
(59, 15, 'Commerce'), 
(60, 15, 'Javel'), 
(61, 15, 'Vaugirard'), 
(62, 16, 'Auteuil'), 
(63, 16, 'Chaillot'), 
(64, 16, 'Passy'), 
(65, 16, 'Trocadéro'), 
(66, 16, 'Victor Hugo'), 
(67, 17, 'Batignolles'), 
(68, 17, 'Brochant'), 
(69, 17, 'Charles de Gaulle - Etoile'), 
(70, 17, 'Courcelles'), 
(71, 17, 'Pereire'), 
(72, 17, 'Place de Clichy'), 
(73, 17, 'Ternes'), 
(74, 17, 'Buttes Chaumont'), 
(75, 18, 'Abbesses'), 
(76, 18, 'Blanche'), 
(77, 18, 'Goutte d''Or'), 
(78, 18, 'Lamarck-Caulaincourt'), 
(79, 18, 'Simplon / Jules Joffrin'), 
(80, 19, 'Belleville'), 
(81, 19, 'Buttes-Chaumont'), 
(82, 19, 'La Villette'), 
(83, 20, 'Avron'), 
(84, 20, 'Maraîchers'), 
(85, 20, 'Père Lachaise') ;


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
(4, '1', 'Restaurant cuisine des iles', -150, -50),
(5, '1', 'Restaurant Cuisine Latino-américaine', -200, -50),
(6, '1', 'Restaurant Cuisine Nord-américaine', -250, -50),
(7, '1', 'Restaurant cuisine orientale', -300, -50),
(8, '1', 'Cuisine slave', -350, -50),
(9, '1', 'Cuisine Indienne', -400, -50),
(10, '1', 'Cuisine espagnole', -450, -50),
(11, '1', 'Cuisine Italienne', 0, -100),
(12, '1', 'Cuisine World food', -50, -100),
(13, '1', 'Autres cuisines', -100, -100),
(14, '1', 'Glaciers et salons de thé', -150, -100),
(15, '1', 'Glaces', -200, -100),
(16, '1', 'Sandwicheries, cafétérias et restauration rapide', -250, -100),
(17, '1', 'Autres restauration', -300, -100),
(18, '1', 'Alimentation générale', -350, -100),
(19, '1', 'Boucheries et charcuteries', -400, -100),
(20, '1', 'Boulangeries et pâtisseries', -450, -100),
(21, '1', 'Cavistes', 0, -150),
(22, '1', 'Chocolatiers et confiseurs', -50, -150),
(23, '1', 'Crèmeries et fromageries', -100, -150),
(24, '1', 'Diététique et alimentation bio', -150, -150),
(25, '1', 'Epiceries fines', -200, -150),
(26, '1', 'Poissonneries', -250, -150),
(27, '1', 'Primeurs', -300, -150),
(28, '1', 'Surgelés', -350, -150),
(29, '1', 'Torréfacteurs et maisons de thé', -400, -150),
(30, '1', 'Traiteurs', -450, -150),
(31, '1', 'Produits frais', 0, -200),
(32, '1', 'Plats', -50, -200),
(33, '1', 'Marques', -100, -200),
(34, '1', 'Cours de cuisine', -150, -200),
(35, '1', 'Autres alimentation', -100, -100),
(36, '2', 'Centres de bronzage et solariums', 0, -300),
(37, '2', 'Instituts de beauté et spas', -50, -300),
(38, '2', 'Hammams et saunas', -100, -300),
(39, '2', 'Magasins spécialisés', -150, -300),
(40, '2', 'Parfumeries', -200, -300),
(41, '2', 'Salons de coiffure', -250, -300),
(42, '2', 'Salons de massage', -300, -300),
(43, '2', 'Marques', -350, -300),
(44, '2', 'Personnalités', -400, -300),
(45, '2', 'Autres beaute et bien etre', -450, -300),
(46, '3', 'Arts graphiques', 0, -400),
(47, '3', 'Beaux-arts', -50, -400),
(48, '3', 'Cinéma et vidéo', -100, -400),
(49, '3', 'Littératures', -150, -400),
(50, '3', 'Musique', -200, -400),
(51, '3', 'Photographie', -250, -400),
(52, '3', 'Théâtre, opéra et spectacle vivant', -300, -400),
(53, '3', 'Général', -350, -400),
(54, '3', 'Marques', -400, -400),
(55, '3', 'Personnalités', -450, -400),
(56, '3', 'Autres culture', 0, -450),
(57, '4', 'Ameublement', 0, -550),
(58, '4', 'Décoration', -50, -550),
(59, '4', 'Electroménager et matériel informatique', -100, -550),
(60, '4', 'Autres équipement et articles de maison', -150, -550),
(61, '4', 'Jardineries', -200, -550),
(62, '4', 'Bijouteries', -250, -550),
(63, '4', 'Chausseurs', -300, -550),
(64, '4', 'Magasins de prêt-à-porter', -350, -550),
(65, '4', 'Habits prets à porter', -400, -550),
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
(77, '4', 'Marques', 0, -650),
(78, '4', 'Personnalités', -50, -650),
(79, '4', 'Autres', -100, -650),
(80, '5', 'Centres de thalasso', 0, -750),
(81, '5', 'Equipement médical', -50, -750),
(82, '5', 'Laboratoire médical', -100, -750),
(83, '5', 'Maisons médicales', -150, -750),
(84, '5', 'Opticiens et acoustique', -200, -750),
(85, '5', 'Pharmacies et parapharmacies', -250, -750),
(86, '5', 'Soins vétérinaires', -300, -750),
(87, '5', 'Marques', -350, -750),
(88, '5', 'Personnalités', -400, -750),
(89, '5', 'Autres', -450, -750),
(90, '6', 'Bars', 0, -850),
(91, '6', 'Cabarets', -50, -850),
(92, '6', 'Pubs', -100, -850),
(93, '6', 'Night clubs', -150, -850),
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
(105, '7', 'Footlball', 0, -1000),
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
(117, '7', 'Hyppisme', -100, -1050),
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
(129, '7', 'Equitation', -200, -1100),
(130, '7', 'Kanoe kayak', -250, -1100),
(131, '7', 'Haltérophilie', -300, -1100),
(132, '7', 'Triathlon', -350, -1100),
(133, '7', 'Lutte gréco romaine', -400, -1100),
(134, '7', 'Pentathlon moderne', -450, -1100),
(135, '7', 'Tir', 0, -1150),
(136, '7', 'Taekwondo', -50, -1150),
(137, '7', 'Badmington', -100, -1150),
(138, '7', 'Magasins généralistes', -150, -1150),
(139, '7', 'Marques', -200, -1150),
(140, '7', 'Magasins produits diététiques', -250, -1150),
(141, '7', 'Presse et médias', -300, -1150),
(142, '7', 'Personnalités', -350, -1150),
(143, '7', 'Autres', -400, -1150),
(144, '8', 'Achat d''or', 0, -1250),
(145, '8', 'Agences immobilières', -50, -1250),
(146, '8', 'Agences intérimaires', -100, -1250),
(147, '8', 'Assureurs', -150, -1250),
(148, '8', 'Banques', -200, -1250),
(149, '8', 'Bureaux de tabac', -250, -1250),
(150, '8', 'Cordonneries', -300, -1250),
(151, '8', 'Concessionnaires', -350, -1250),
(152, '8', 'Electriciens', -400, -1250),
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
(163, '8', 'Sexshop', -450, -1300),
(164, '8', 'Clubs privés', 0, -1350) ;


--
-- Contenu de la table `sous_categories2`
--

INSERT INTO `sous_categories2` (`id_sous_categorie2`, `id_sous_categorie`, `id_categorie`, `sous_categorie2`, `posx`, `posy`) VALUES
(1, 1, 1, 'Bistrots, brasseries et bars à vin', 0, -1500),
(2, 1, 1, 'Crêperies', -50, -1500),
(3, 1, 1, 'Cuisine du sud-ouest', -100, -1500),
(4, 1, 1, 'Cuisine provencale', -150, -1500),
(5, 1, 1, 'Cuisine méditérannéenne', -200, -1500),
(6, 1, 1, 'Cuisine corse', -250, -1500),
(7, 1, 1, 'Cuisine des régions', -300, -1500),
(8, 1, 1, 'Cuisine du marché', -350, -1500),
(9, 1, 1, 'Cuisine fusion', -400, -1500),
(10, 1, 1, 'Cuisine traditionnelle', -450, -1500),
(11, 1, 1, 'Gastronomique', 0, -1550),
(12, 1, 1, 'Méridionale', -50, -1550),
(13, 1, 1, 'Autres', -100, -1550),
(14, 2, 1, 'Africaine', -150, -1550),
(15, 2, 1, 'Autres', -100, -1550),
(16, 3, 1, 'Chinois', -200, -1550),
(17, 3, 1, 'Japonais', -250, -1550),
(18, 3, 1, 'Tahilandais', -300, -1550),
(19, 3, 1, 'Vietnamien', -350, -1550),
(20, 3, 1, 'Autres', -100, -1550),
(21, 4, 1, 'Créole', -400, -1550),
(22, 4, 1, 'Tahitienne', -450, -1550),
(23, 4, 1, 'Autres', -100, -1550),
(24, 5, 1, 'Brésillien', 0, -1600),
(25, 5, 1, 'Cubain', -50, -1600),
(26, 5, 1, 'Latino', -100, -1600),
(27, 5, 1, 'Mexicain', -150, -1600),
(28, 5, 1, 'Autres', -100, -1550),
(29, 6, 1, 'Nord-américaine', -200, -1600),
(30, 6, 1, 'Autres', -100, -1550),
(31, 7, 1, 'Marocain', -250, -1600),
(32, 7, 1, 'Libanais', -300, -1600),
(33, 7, 1, 'Turc', -350, -1600),
(34, 7, 1, 'Grec', -400, -1600),
(35, 7, 1, 'Autres', -100, -1550),
(36, 8, 1, 'Russe', -450, -1600),
(37, 8, 1, 'Scandinave', 0, -1650),
(38, 8, 1, 'Autres', -100, -1550),
(39, 9, 1, NULL, -50, -1650),
(40, 10, 1, NULL, -100, -1650),
(41, 11, 1, NULL, -150, -1650),
(42, 12, 1, NULL, -200, -1650),
(43, 13, 1, NULL, -250, -1650),
(44, 14, 1, 'Bars à fruit', -300, -1650),
(45, 14, 1, 'Glaciers', -350, -1650),
(46, 14, 1, 'Salons de thé', -400, -1650),
(47, 15, 1, NULL, -450, -1650),
(48, 16, 1, 'Commerces', 0, -1700),
(49, 16, 1, 'Produits', -50, -1700),
(50, 17, 1, 'Commerces', 0, -1700),
(51, 17, 1, 'Produits', -50, -1700),
(52, 18, 1, 'Commerces', 0, -1700),
(53, 18, 1, 'Produits', -50, -1700),
(54, 19, 1, 'Boucherie halal', -100, -1700),
(55, 19, 1, 'Boucherie casher', -150, -1700),
(56, 19, 1, 'Boucherie traditionnelle', -200, -1700),
(57, 19, 1, 'Produits', -50, -1700),
(58, 20, 1, 'Commerces', 0, -1700),
(59, 20, 1, 'Produits', -50, -1700),
(60, 21, 1, 'Commerces', 0, -1700),
(61, 21, 1, 'Produits', -50, -1700),
(62, 22, 1, 'Commerces', 0, -1700),
(63, 22, 1, 'Produits', -50, -1700),
(64, 23, 1, 'Commerces', 0, -1700),
(65, 23, 1, 'Produits', -50, -1700),
(66, 24, 1, 'Commerces', 0, -1700),
(67, 24, 1, 'Produits', -50, -1700),
(68, 25, 1, 'Commerces', 0, -1700),
(69, 25, 1, 'Produits', -50, -1700),
(70, 26, 1, 'Commerces', 0, -1700),
(71, 26, 1, 'Produits', -50, -1700),
(72, 27, 1, 'Commerces', 0, -1700),
(73, 27, 1, 'Produits', -50, -1700),
(74, 28, 1, 'Commerces', 0, -1700),
(75, 28, 1, 'Produits', -50, -1700),
(76, 29, 1, 'Commerces', 0, -1700),
(77, 29, 1, 'Produits', -50, -1700),
(78, 30, 1, 'Commerces', 0, -1700),
(79, 30, 1, 'Produits', -50, -1700),
(80, 31, 1, NULL, -250, -1700),
(81, 32, 1, 'Restaurant cuisine  française', -300, -1700),
(82, 32, 1, 'Restaurant cuisine Africaine', -350, -1700),
(83, 32, 1, 'Restaurant cuisine Asiatique', -400, -1700),
(84, 32, 1, 'Restaurant cuisine des iles', -450, -1700),
(85, 32, 1, 'Restaurnant Cuisine Latino-américaine', 0, -1750),
(86, 32, 1, 'Restaurant Cuisine Nord-américaine', -50, -1750),
(87, 32, 1, 'Restaurant cuisine orientale', -100, -1750),
(88, 32, 1, 'Cuisine slave', -150, -1750),
(89, 32, 1, 'Cuisine Indienne', -200, -1750),
(90, 32, 1, 'Cuisine espagnole', -250, -1750),
(91, 32, 1, 'Cuisine Italienne', -300, -1750),
(92, 32, 1, 'Cuisine World food', -350, -1750),
(93, 32, 1, 'Autres cuisines', -100, -1550),
(94, 33, 1, NULL, -400, -1750),
(95, 34, 1, NULL, -450, -1750),
(96, 35, 1, NULL, 0, -1800),
(97, 36, 2, 'Commerces', 0, -1900),
(98, 36, 2, 'Produits', -50, -1900),
(99, 37, 2, 'Commerces', 0, -1900),
(100, 37, 2, 'Produits', -50, -1900),
(101, 38, 2, 'Commerces', 0, -1900),
(102, 38, 2, 'Produits', -50, -1900),
(103, 39, 2, 'Cosmétiques', -100, -1900),
(104, 39, 2, 'Soin du cheveu', -150, -1900),
(105, 40, 2, 'Commerces', 0, -1900),
(106, 40, 2, 'Produits', -50, -1900),
(107, 41, 2, 'Enfants', -200, -1900),
(108, 41, 2, 'Femmes', -250, -1900),
(109, 41, 2, 'Hommes', -300, -1900),
(110, 41, 2, 'Mixte', -350, -1900),
(111, 41, 2, 'Produits', -50, -1900),
(112, 42, 2, 'Commerces', 0, -1900),
(113, 42, 2, 'Produits', -50, -1900),
(114, 43, 2, NULL, -400, -1900),
(115, 44, 2, NULL, -450, -1900),
(116, 45, 2, NULL, 0, -1950),
(117, 46, 3, 'Cours et ateliers', 0, -2050),
(118, 46, 3, 'Evénements et festivals', -50, -2050),
(119, 46, 3, 'Magasins spécialisés', -100, -2050),
(120, 46, 3, 'Papeteries et carteries', -150, -2050),
(121, 46, 3, 'Produits', -200, -2050),
(122, 46, 3, 'Manifestations, évenements, festivals', -250, -2050),
(123, 46, 3, 'Associations, écoles', -300, -2050),
(124, 46, 3, 'Autres', -350, -2050),
(125, 47, 3, 'Cours et écoles d''art', 0, -2050),
(126, 47, 3, 'Galeries d''art', -400, -2050),
(127, 47, 3, 'Musées et expositions', -450, -2050),
(128, 47, 3, 'Peinture', 0, -2100),
(129, 47, 3, 'Sculture', -50, -2100),
(130, 47, 3, 'Autres beaux-arts', -350, -2050),
(131, 47, 3, 'Manifestations, évenements, festivals', -250, -2050),
(132, 47, 3, 'Associations, écoles', -300, -2050),
(133, 47, 3, 'Autres produiits', -350, -2050),
(134, 48, 3, 'Cinémas', -100, -2100),
(135, 48, 3, 'Vidéoclubs', -150, -2100),
(136, 48, 3, 'Films', -200, -2100),
(137, 48, 3, 'Séries', -250, -2100),
(138, 48, 3, 'Clips', -300, -2100),
(139, 48, 3, 'Vidéo', -350, -2100),
(140, 48, 3, 'Manifestations, évenements, festivals', -250, -2050),
(141, 48, 3, 'Associations, écoles', -300, -2050),
(142, 48, 3, 'Autres', -350, -2050),
(143, 49, 3, 'Bibliothèques', -400, -2100),
(144, 49, 3, 'Librairies et bouquinistes', -450, -2100),
(145, 49, 3, 'Livres', 0, -2150),
(146, 49, 3, 'Manifestations, évenements, festivals', -250, -2050),
(147, 49, 3, 'Associations, écoles', -300, -2050),
(148, 49, 3, 'Autres', -350, -2050),
(149, 50, 3, 'Cours et écoles de musique', 0, -2050),
(150, 50, 3, 'Disquaires', -50, -2150),
(151, 50, 3, 'Evénements et festivals', -250, -2050),
(152, 50, 3, 'Librairies musicales', -100, -2150),
(153, 50, 3, 'Luthiers et magasins d''instruments', -150, -2150),
(154, 50, 3, 'Instruments', -200, -2150),
(155, 50, 3, 'Salles de concert', -250, -2150),
(156, 50, 3, 'Cd', -300, -2150),
(157, 50, 3, 'Chanson', -350, -2150),
(158, 50, 3, 'Manifestations, évenements, festivals', -250, -2050),
(159, 50, 3, 'Associations, écoles', -300, -2050),
(160, 50, 3, 'Concert', -250, -2150),
(161, 50, 3, 'Autres', -350, -2050),
(162, 51, 3, 'Cours et ateliers', 0, -2050),
(163, 51, 3, 'Galeries et expositions', -400, -2050),
(164, 51, 3, 'Studios photo et magasins spécialisés', -400, -2150),
(165, 51, 3, 'Photographies', -450, -2150),
(166, 51, 3, 'Manifestations, évenements, festivals', -250, -2050),
(167, 51, 3, 'Associations, écoles', -300, -2050),
(168, 51, 3, 'Matériels photographie', -400, -2150),
(169, 51, 3, 'Autres', -350, -2050),
(170, 52, 3, 'Cours et ateliers', 0, -2050),
(171, 52, 3, 'Cirques', 0, -2200),
(172, 52, 3, 'Manifestations, évenements, festivals', -250, -2050),
(173, 52, 3, 'Opéras', -50, -2200),
(174, 52, 3, 'Théâtres', -100, -2200),
(175, 52, 3, 'Pièces de théatre', -100, -2200),
(176, 52, 3, 'Spectacles', -250, -2050),
(177, 52, 3, 'Associations, écoles', -300, -2050),
(178, 52, 3, 'Autres', -350, -2050),
(179, 53, 3, 'Centres culturels', -150, -2200),
(180, 53, 3, 'Grandes surfaces spécialisées', -200, -2200),
(181, 54, 3, NULL, -250, -2200),
(182, 55, 3, NULL, -300, -2200),
(183, 56, 3, NULL, -350, -2200),
(184, 57, 4, 'Antiquaires', 0, -2300),
(185, 57, 4, 'Cuisinistes', -50, -2300),
(186, 57, 4, 'Grandes surfaces spéclalisées', -100, -2300),
(187, 57, 4, 'Magasins spécialisés', -150, -2300),
(188, 57, 4, 'Meubles', -200, -2300),
(189, 57, 4, 'Manifestations, évenements, festivals', -250, -2300),
(190, 57, 4, 'Associations, écoles', -300, -2300),
(191, 57, 4, 'Autres', -350, -2300),
(192, 58, 4, 'Brocantes', -400, -2300),
(193, 58, 4, 'Encadrement', -450, -2300),
(194, 58, 4, 'Fleuristes', 0, -2350),
(195, 58, 4, 'Luminaires', -50, -2350),
(196, 58, 4, 'Linges et textiles de maison', -100, -2350),
(197, 58, 4, 'Magasins spécialisés', -150, -2300),
(198, 58, 4, 'Fleurs', 0, -2350),
(199, 58, 4, 'Manifestations, évenements, festivals', -250, -2300),
(200, 58, 4, 'Associations, écoles', -300, -2300),
(201, 58, 4, 'Objets décoration', -150, -2350),
(202, 58, 4, 'Autre', -350, -2300),
(203, 59, 4, 'Grandes surfaces', -100, -2300),
(204, 59, 4, 'Magasins spécialisés', -150, -2300),
(205, 59, 4, 'Gros éléctroménager', -200, -2350),
(206, 59, 4, 'Hifi, TV, vidéo', -250, -2350),
(207, 59, 4, 'Manifestations, évenements, festivals', -250, -2300),
(208, 59, 4, 'Associations, écoles', -300, -2300),
(209, 59, 4, 'Autres', -350, -2300),
(210, 60, 4, 'Articles de cuisine', -50, -2300),
(211, 60, 4, 'Autres magasins spécialisés', -350, -2300),
(212, 60, 4, 'Articles de maison', -300, -2350),
(213, 60, 4, 'Autres', -350, -2300),
(214, 61, 4, 'Fleurs', 0, -2350),
(215, 61, 4, 'Arbres', -350, -2350),
(216, 61, 4, 'Matériels de jardin', -400, -2350),
(217, 61, 4, 'Manifestations, évenements, festivals', -250, -2300),
(218, 61, 4, 'Associations, écoles', -300, -2300),
(219, 61, 4, 'Autres', -350, -2300),
(220, 62, 4, 'Commerces bijoux Fantaisie', -450, -2350),
(221, 62, 4, 'Commerces bijoux Luxe', 0, -2400),
(222, 62, 4, 'Bijoux Fantaisie', -50, -2400),
(223, 62, 4, 'Bijoux Luxe', -100, -2400),
(224, 62, 4, 'Manifestations, évenements, festivals', -250, -2300),
(225, 62, 4, 'Associations, écoles', -300, -2300),
(226, 63, 4, 'Enfants', -150, -2400),
(227, 63, 4, 'Femmes', -200, -2400),
(228, 63, 4, 'Hommes', -250, -2400),
(229, 63, 4, 'Mixte', -300, -2400),
(230, 63, 4, 'Spécialisés', -150, -2300),
(231, 63, 4, 'Chaussures', -350, -2400),
(232, 63, 4, 'Manifestation, évenement festivals', -250, -2300),
(233, 63, 4, 'Autres', -350, -2300),
(234, 64, 4, 'Enfants', -150, -2400),
(235, 64, 4, 'Femmes', -200, -2400),
(236, 64, 4, 'Futures mamans', -400, -2400),
(237, 64, 4, 'Hommes', -250, -2400),
(238, 64, 4, 'Mixte', -300, -2400),
(239, 64, 4, 'Spécialisés', -150, -2300),
(240, 65, 4, 'Enfants', -150, -2400),
(241, 65, 4, 'Femmes', -200, -2400),
(242, 65, 4, 'Futures mamans', -400, -2400),
(243, 65, 4, 'Hommes', -250, -2400),
(244, 65, 4, 'Mixte', -300, -2400),
(245, 65, 4, 'Autres', -350, -2300),
(246, 66, 4, 'Femmes', -200, -2400),
(247, 66, 4, 'Hommes', -250, -2400),
(248, 66, 4, 'Mariage', -450, -2400),
(249, 66, 4, 'Mixte', -300, -2400),
(250, 66, 4, 'Mariage', -450, -2400),
(251, 67, 4, 'Femmes', -200, -2400),
(252, 67, 4, 'Hommes', -250, -2400),
(253, 67, 4, 'Mariage', -450, -2400),
(254, 67, 4, 'Mixte', -300, -2400),
(255, 67, 4, 'Mariage', -450, -2400),
(256, 68, 4, 'Commerces', 0, -2450),
(257, 68, 4, 'Habits', -50, -2450),
(258, 69, 4, 'Commerces', 0, -2450),
(259, 69, 4, 'Habits', -50, -2450),
(260, 70, 4, 'Commerces', 0, -2450),
(261, 70, 4, 'Produits', -100, -2450),
(262, 71, 4, 'Commerces', 0, -2450),
(263, 71, 4, 'Produits', -100, -2450),
(264, 72, 4, 'Commerces', 0, -2450),
(265, 72, 4, 'Produits', -100, -2450),
(266, 73, 4, 'Commerces', 0, -2450),
(267, 73, 4, 'Produits', -100, -2450),
(268, 74, 4, 'Commerces', 0, -2450),
(269, 74, 4, 'Produits', -100, -2450),
(270, 75, 4, 'Commerces', 0, -2450),
(271, 75, 4, 'Produits', -100, -2450),
(272, 76, 4, 'Commerces', 0, -2450),
(273, 76, 4, 'Produits', -100, -2450),
(274, 77, 4, NULL, -150, -2450),
(275, 78, 4, NULL, -200, -2450),
(276, 79, 4, NULL, -250, -2450),
(277, 80, 5, 'Commerces', 0, -2550),
(278, 80, 5, 'Produits', -50, -2550),
(279, 80, 5, 'Autres', -100, -2550),
(280, 81, 5, 'Commerces', 0, -2550),
(281, 81, 5, 'Produits', -50, -2550),
(282, 81, 5, 'Autres', -100, -2550),
(283, 82, 5, 'Commerces', 0, -2550),
(284, 82, 5, 'Produits', -50, -2550),
(285, 82, 5, 'Autres', -100, -2550),
(286, 83, 5, 'Commerces', 0, -2550),
(287, 83, 5, 'Produits', -50, -2550),
(288, 83, 5, 'Autres', -100, -2550),
(289, 84, 5, 'Commerces', 0, -2550),
(290, 84, 5, 'Produits', -50, -2550),
(291, 84, 5, 'Autres', -100, -2550),
(292, 85, 5, 'Commerces', 0, -2550),
(293, 85, 5, 'Produits', -50, -2550),
(294, 85, 5, 'Autres', -100, -2550),
(295, 86, 5, 'Commerces', 0, -2550),
(296, 86, 5, 'Produits', -50, -2550),
(297, 86, 5, 'Autres', -100, -2550),
(298, 87, 5, NULL, -150, -2550),
(299, 88, 5, NULL, -200, -2550),
(300, 89, 5, NULL, -250, -2550),
(301, 90, 6, 'Bars à cocktails', 0, -2650),
(302, 90, 6, 'Bars à thèmes', -50, -2650),
(303, 90, 6, 'Bars à vins', -100, -2650),
(304, 90, 6, 'Bars de jazz', -150, -2650),
(305, 90, 6, 'Bars karaoké', -200, -2650),
(306, 90, 6, 'Bars lounge', -250, -2650),
(307, 90, 6, 'Cocktail', -300, -2650),
(308, 90, 6, 'Magasins spécialisés', -350, -2650),
(309, 90, 6, 'Marques', -400, -2650),
(310, 90, 6, 'Produits', -450, -2650),
(311, 90, 6, 'Autres', 0, -2700),
(312, 90, 6, 'Personnalités', -50, -2700),
(313, 91, 6, 'Salles', -100, -2700),
(314, 91, 6, 'Spectacles, évenements', -150, -2700),
(315, 91, 6, 'Personnalités', -50, -2700),
(316, 91, 6, 'Autres', 0, -2700),
(317, 92, 6, NULL, -200, -2700),
(318, 93, 6, 'Généraliste', -250, -2700),
(319, 93, 6, 'Hip Hop, Rap, R''n''B', -300, -2700),
(320, 93, 6, 'House', -350, -2700),
(321, 93, 6, 'Techno Electro', -400, -2700),
(322, 93, 6, 'Musiques latines', -450, -2700),
(323, 93, 6, 'Personnalités', -50, -2700),
(324, 93, 6, 'Autres', 0, -2700),
(325, 94, 6, NULL, 0, -2750),
(326, 95, 6, NULL, -50, -2750),
(327, 96, 6, NULL, -100, -2750),
(328, 97, 6, 'Magasins de jouets', -150, -2750),
(329, 97, 6, 'Magasins de jeux enfants et adultes', -200, -2750),
(330, 97, 6, 'Salles de jeu', -250, -2750),
(331, 98, 6, 'Commerces', -300, -2750),
(332, 98, 6, 'Produits', -450, -2650),
(333, 99, 6, NULL, -350, -2750),
(334, 100, 6, NULL, -400, -2750),
(335, 101, 6, 'Agences de voyage', -450, -2750),
(336, 101, 6, 'Continents', 0, -2800),
(337, 101, 6, 'Pays', -50, -2800),
(338, 101, 6, 'Régions', -100, -2800),
(339, 101, 6, 'Villes', -150, -2800),
(340, 101, 6, 'Quartier', -200, -2800),
(341, 101, 6, 'Hotels', -250, -2800),
(342, 101, 6, 'Maisons d''hotes', -300, -2800),
(343, 101, 6, 'Compagnies de transport', -350, -2800),
(344, 101, 6, 'Autres', 0, -2700),
(345, 102, 6, NULL, -400, -2800),
(346, 103, 6, NULL, -450, -2800),
(347, 104, 6, NULL, 0, -2850),
(348, 105, 7, 'Magasins spécialisés', 0, -2950),
(349, 105, 7, 'Matériels', -50, -2950),
(350, 105, 7, 'Equipes', -100, -2950),
(351, 105, 7, 'Personnalités', -150, -2950),
(352, 105, 7, 'Evenements', -200, -2950),
(353, 105, 7, 'Associations sportives', -250, -2950),
(354, 105, 7, 'Stades, salles', -300, -2950),
(355, 105, 7, 'Autres', -350, -2950),
(356, 106, 7, 'Magasins spécialisés', 0, -2950),
(357, 106, 7, 'Matériels', -50, -2950),
(358, 106, 7, 'Equipes', -100, -2950),
(359, 106, 7, 'Personnalités', -150, -2950),
(360, 106, 7, 'Evenements', -200, -2950),
(361, 106, 7, 'Associations sportives', -250, -2950),
(362, 106, 7, 'Stades, salles', -300, -2950),
(363, 106, 7, 'Autres', -350, -2950),
(364, 107, 7, 'Magasins spécialisés', 0, -2950),
(365, 107, 7, 'Matériels', -50, -2950),
(366, 107, 7, 'Equipes', -100, -2950),
(367, 107, 7, 'Personnalités', -150, -2950),
(368, 107, 7, 'Evenements', -200, -2950),
(369, 107, 7, 'Associations sportives', -250, -2950),
(370, 107, 7, 'Stades, salles', -300, -2950),
(371, 107, 7, 'Autres', -350, -2950),
(372, 108, 7, 'Magasins spécialisés', 0, -2950),
(373, 108, 7, 'Matériels', -50, -2950),
(374, 108, 7, 'Equipes', -100, -2950),
(375, 108, 7, 'Personnalités', -150, -2950),
(376, 108, 7, 'Evenements', -200, -2950),
(377, 108, 7, 'Associations sportives', -250, -2950),
(378, 108, 7, 'Circuits, aires d''entrainements', -400, -2950),
(379, 108, 7, 'Autres', -350, -2950),
(380, 109, 7, 'Magasins spécialisés', 0, -2950),
(381, 109, 7, 'Matériels', -50, -2950),
(382, 109, 7, 'Equipes', -100, -2950),
(383, 109, 7, 'Personnalités', -150, -2950),
(384, 109, 7, 'Evenements', -200, -2950),
(385, 109, 7, 'Associations sportives', -250, -2950),
(386, 109, 7, 'Circuits, aires d''entrainements', -400, -2950),
(387, 109, 7, 'Autres', -350, -2950),
(388, 110, 7, 'Magasins spécialisés', 0, -2950),
(389, 110, 7, 'Matériels', -50, -2950),
(390, 110, 7, 'Equipes', -100, -2950),
(391, 110, 7, 'Personnalités', -150, -2950),
(392, 110, 7, 'Evenements', -200, -2950),
(393, 110, 7, 'Associations sportives', -250, -2950),
(394, 110, 7, 'Stades, salles', -300, -2950),
(395, 110, 7, 'Autres', -350, -2950),
(396, 111, 7, 'Magasins spécialisés', 0, -2950),
(397, 111, 7, 'Matériels', -50, -2950),
(398, 111, 7, 'Equipes', -100, -2950),
(399, 111, 7, 'Personnalités', -150, -2950),
(400, 111, 7, 'Evenements', -200, -2950),
(401, 111, 7, 'Associations sportives', -250, -2950),
(402, 111, 7, 'Stades, salles', -300, -2950),
(403, 111, 7, 'Autres', -350, -2950),
(404, 112, 7, 'Magasins spécialisés', 0, -2950),
(405, 112, 7, 'Matériels', -50, -2950),
(406, 112, 7, 'Equipes', -100, -2950),
(407, 112, 7, 'Personnalités', -150, -2950),
(408, 112, 7, 'Evenements', -200, -2950),
(409, 112, 7, 'Associations sportives', -250, -2950),
(410, 112, 7, 'Parcours, indoor', -450, -2950),
(411, 112, 7, 'Autres', -350, -2950),
(412, 113, 7, 'Magasins spécialisés', 0, -2950),
(413, 113, 7, 'Matériels', -50, -2950),
(414, 113, 7, 'Equipes', -100, -2950),
(415, 113, 7, 'Personnalités', -150, -2950),
(416, 113, 7, 'Evenements', -200, -2950),
(417, 113, 7, 'Associations sportives', -250, -2950),
(418, 113, 7, 'Stades, salles', -300, -2950),
(419, 113, 7, 'Autres', -350, -2950),
(420, 114, 7, 'Magasins spécialisés', 0, -2950),
(421, 114, 7, 'Matériels', -50, -2950),
(422, 114, 7, 'Equipes', -100, -2950),
(423, 114, 7, 'Personnalités', -150, -2950),
(424, 114, 7, 'Evenements', -200, -2950),
(425, 114, 7, 'Associations sportives', -250, -2950),
(426, 114, 7, 'Stades, salles', -300, -2950),
(427, 114, 7, 'Autres', -350, -2950),
(428, 115, 7, 'Magasins spécialisés', 0, -2950),
(429, 115, 7, 'Matériels', -50, -2950),
(430, 115, 7, 'Equipes', -100, -2950),
(431, 115, 7, 'Personnalités', -150, -2950),
(432, 115, 7, 'Evenements', -200, -2950),
(433, 115, 7, 'Associations sportives', -250, -2950),
(434, 115, 7, 'Piscines, aires d''entrainements', 0, -3000),
(435, 115, 7, 'Autres', -350, -2950),
(436, 116, 7, 'Magasins spécialisés', 0, -2950),
(437, 116, 7, 'Matériels', -50, -2950),
(438, 116, 7, 'Equipes', -100, -2950),
(439, 116, 7, 'Personnalités', -150, -2950),
(440, 116, 7, 'Evenements', -200, -2950),
(441, 116, 7, 'Associations sportives', -250, -2950),
(442, 116, 7, 'Bassins, aires d''entrainements', 0, -3000),
(443, 116, 7, 'Autres', -350, -2950),
(444, 117, 7, 'Magasins spécialisés', 0, -2950),
(445, 117, 7, 'Matériels', -50, -2950),
(446, 117, 7, 'Equipes', -100, -2950),
(447, 117, 7, 'Personnalités', -150, -2950),
(448, 117, 7, 'Evenements', -200, -2950),
(449, 117, 7, 'Associations sportives', -250, -2950),
(450, 117, 7, 'Hyppodrome, aires d''entrainements', -50, -3000),
(451, 117, 7, 'Autres', -350, -2950),
(452, 118, 7, 'Magasins spécialisés', 0, -2950),
(453, 118, 7, 'Matériels', -50, -2950),
(454, 118, 7, 'Equipes', -100, -2950),
(455, 118, 7, 'Personnalités', -150, -2950),
(456, 118, 7, 'Evenements', -200, -2950),
(457, 118, 7, 'Associations sportives', -250, -2950),
(458, 118, 7, 'Stades, salles', -300, -2950),
(459, 118, 7, 'Autres', -350, -2950),
(460, 119, 7, 'Magasins spécialisés', 0, -2950),
(461, 119, 7, 'Matériels', -50, -2950),
(462, 119, 7, 'Equipes', -100, -2950),
(463, 119, 7, 'Personnalités', -150, -2950),
(464, 119, 7, 'Evenements', -200, -2950),
(465, 119, 7, 'Associations sportives', -250, -2950),
(466, 119, 7, 'Stades, salles', -300, -2950),
(467, 119, 7, 'Autres', -350, -2950),
(468, 120, 7, 'Magasins spécialisés', 0, -2950),
(469, 120, 7, 'Matériels', -50, -2950),
(470, 120, 7, 'Equipes', -100, -2950),
(471, 120, 7, 'Personnalités', -150, -2950),
(472, 120, 7, 'Evenements', -200, -2950),
(473, 120, 7, 'Associations sportives', -250, -2950),
(474, 120, 7, 'Plages, aires d''entrainements', -100, -3000),
(475, 120, 7, 'Autres', -350, -2950),
(476, 121, 7, 'Magasins spécialisés', 0, -2950),
(477, 121, 7, 'Matériels', -50, -2950),
(478, 121, 7, 'Equipes', -100, -2950),
(479, 121, 7, 'Personnalités', -150, -2950),
(480, 121, 7, 'Evenements', -200, -2950),
(481, 121, 7, 'Associations sportives', -250, -2950),
(482, 121, 7, 'Stades, salles', -300, -2950),
(483, 121, 7, 'Autres', -350, -2950),
(484, 122, 7, 'Magasins spécialisés', 0, -2950),
(485, 122, 7, 'Matériels', -50, -2950),
(486, 122, 7, 'Equipes', -100, -2950),
(487, 122, 7, 'Personnalités', -150, -2950),
(488, 122, 7, 'Evenements', -200, -2950),
(489, 122, 7, 'Associations sportives', -250, -2950),
(490, 122, 7, 'Stades, salles', -300, -2950),
(491, 122, 7, 'Autres', -350, -2950),
(492, 123, 7, 'Magasins spécialisés', 0, -2950),
(493, 123, 7, 'Matériels', -50, -2950),
(494, 123, 7, 'Equipes', -100, -2950),
(495, 123, 7, 'Personnalités', -150, -2950),
(496, 123, 7, 'Evenements', -200, -2950),
(497, 123, 7, 'Associations sportives', -250, -2950),
(498, 123, 7, 'Stations, pistes', -150, -3000),
(499, 123, 7, 'Autres', -350, -2950),
(500, 124, 7, 'Magasins spécialisés', 0, -2950),
(501, 124, 7, 'Matériels', -50, -2950),
(502, 124, 7, 'Equipes', -100, -2950),
(503, 124, 7, 'Personnalités', -150, -2950),
(504, 124, 7, 'Evenements', -200, -2950),
(505, 124, 7, 'Associations sportives', -250, -2950),
(506, 124, 7, 'Stades, salles', -300, -2950),
(507, 124, 7, 'Autres', -350, -2950),
(508, 125, 7, 'Magasins spécialisés', 0, -2950),
(509, 125, 7, 'Matériels', -50, -2950),
(510, 125, 7, 'Equipes', -100, -2950),
(511, 125, 7, 'Personnalités', -150, -2950),
(512, 125, 7, 'Evenements', -200, -2950),
(513, 125, 7, 'Associations sportives', -250, -2950),
(514, 125, 7, 'Stades, salles', -300, -2950),
(515, 125, 7, 'Autres', -350, -2950),
(516, 126, 7, 'Magasins spécialisés', 0, -2950),
(517, 126, 7, 'Matériels', -50, -2950),
(518, 126, 7, 'Equipes', -100, -2950),
(519, 126, 7, 'Personnalités', -150, -2950),
(520, 126, 7, 'Evenements', -200, -2950),
(521, 126, 7, 'Associations sportives', -250, -2950),
(522, 126, 7, 'Bassins, aires d''entrainements', 0, -3000),
(523, 126, 7, 'Autres', -350, -2950),
(524, 127, 7, 'Magasins spécialisés', 0, -2950),
(525, 127, 7, 'Matériels', -50, -2950),
(526, 127, 7, 'Equipes', -100, -2950),
(527, 127, 7, 'Personnalités', -150, -2950),
(528, 127, 7, 'Evenements', -200, -2950),
(529, 127, 7, 'Associations sportives', -250, -2950),
(530, 127, 7, 'Stades, salles', -300, -2950),
(531, 127, 7, 'Autres', -350, -2950),
(532, 128, 7, 'Magasins spécialisés', 0, -2950),
(533, 128, 7, 'Matériels', -50, -2950),
(534, 128, 7, 'Equipes', -100, -2950),
(535, 128, 7, 'Personnalités', -150, -2950),
(536, 128, 7, 'Evenements', -200, -2950),
(537, 128, 7, 'Associations sportives', -250, -2950),
(538, 128, 7, 'Stades, salles', -300, -2950),
(539, 128, 7, 'Autres', -350, -2950),
(540, 129, 7, 'Magasins spécialisés', 0, -2950),
(541, 129, 7, 'Matériels', -50, -2950),
(542, 129, 7, 'Equipes', -100, -2950),
(543, 129, 7, 'Personnalités', -150, -2950),
(544, 129, 7, 'Evenements', -200, -2950),
(545, 129, 7, 'Associations sportives', -250, -2950),
(546, 129, 7, 'Hyppodrome, aires d''entrainements', -50, -3050),
(547, 129, 7, 'Autres', -350, -2950),
(548, 130, 7, 'Magasins spécialisés', 0, -2950),
(549, 130, 7, 'Matériels', -50, -2950),
(550, 130, 7, 'Equipes', -100, -2950),
(551, 130, 7, 'Personnalités', -150, -2950),
(552, 130, 7, 'Evenements', -200, -2950),
(553, 130, 7, 'Associations sportives', -250, -2950),
(554, 130, 7, 'Bassins, aires d''entrainements', 0, -3000),
(555, 130, 7, 'Autres', -350, -2950),
(556, 131, 7, 'Magasins spécialisés', 0, -2950),
(557, 131, 7, 'Matériels', -50, -2950),
(558, 131, 7, 'Equipes', -100, -2950),
(559, 131, 7, 'Personnalités', -150, -2950),
(560, 131, 7, 'Evenements', -200, -2950),
(561, 131, 7, 'Associations sportives', -250, -2950),
(562, 131, 7, 'Stades, salles', -300, -2950),
(563, 131, 7, 'Autres', -350, -2950),
(564, 132, 7, 'Magasins spécialisés', 0, -2950),
(565, 132, 7, 'Matériels', -50, -2950),
(566, 132, 7, 'Equipes', -100, -2950),
(567, 132, 7, 'Personnalités', -150, -2950),
(568, 132, 7, 'Evenements', -200, -2950),
(569, 132, 7, 'Associations sportives', -250, -2950),
(570, 132, 7, 'Stades, salles', -300, -2950),
(571, 132, 7, 'Autres', -350, -2950),
(572, 133, 7, 'Magasins spécialisés', 0, -2950),
(573, 133, 7, 'Matériels', -50, -2950),
(574, 133, 7, 'Equipes', -100, -2950),
(575, 133, 7, 'Personnalités', -150, -2950),
(576, 133, 7, 'Evenements', -200, -2950),
(577, 133, 7, 'Associations sportives', -250, -2950),
(578, 133, 7, 'Stades, salles', -300, -2950),
(579, 133, 7, 'Autres', -350, -2950),
(580, 134, 7, 'Magasins spécialisés', 0, -2950),
(581, 134, 7, 'Matériels', -50, -2950),
(582, 134, 7, 'Equipes', -100, -2950),
(583, 134, 7, 'Personnalités', -150, -2950),
(584, 134, 7, 'Evenements', -200, -2950),
(585, 134, 7, 'Associations sportives', -250, -2950),
(586, 134, 7, 'Stades, salles', -300, -2950),
(587, 134, 7, 'Autres', -350, -2950),
(588, 135, 7, 'Magasins spécialisés', 0, -2950),
(589, 135, 7, 'Matériels', -50, -2950),
(590, 135, 7, 'Equipes', -100, -2950),
(591, 135, 7, 'Personnalités', -150, -2950),
(592, 135, 7, 'Evenements', -200, -2950),
(593, 135, 7, 'Associations sportives', -250, -2950),
(594, 135, 7, 'Stades, salles', -300, -2950),
(595, 135, 7, 'Autres', -350, -2950),
(596, 136, 7, 'Magasins spécialisés', 0, -2950),
(597, 136, 7, 'Matériels', -50, -2950),
(598, 136, 7, 'Equipes', -100, -2950),
(599, 136, 7, 'Personnalités', -150, -2950),
(600, 136, 7, 'Evenements', -200, -2950),
(601, 136, 7, 'Associations sportives', -250, -2950),
(602, 136, 7, 'Stades, salles', -300, -2950),
(603, 136, 7, 'Autres', -350, -2950),
(604, 137, 7, 'Magasins spécialisés', 0, -2950),
(605, 137, 7, 'Matériels', -50, -2950),
(606, 137, 7, 'Equipes', -100, -2950),
(607, 137, 7, 'Personnalités', -150, -2950),
(608, 137, 7, 'Evenements', -200, -2950),
(609, 137, 7, 'Associations sportives', -250, -2950),
(610, 137, 7, 'Stades, salles', -300, -2950),
(611, 137, 7, 'Autres', -350, -2950),
(612, 138, 7, NULL, -200, -3000),
(613, 139, 7, NULL, -250, -3000),
(614, 140, 7, NULL, -300, -3000),
(615, 141, 7, 'Journaux', -350, -3000),
(616, 141, 7, 'Chaines télévisions', -400, -3000),
(617, 141, 7, 'Radios', -450, -3000),
(618, 141, 7, 'Magazines', 0, -3050),
(619, 142, 7, NULL, -50, -3050),
(620, 143, 7, NULL, -100, -3050),
(621, 144, 8, 'Commerces', 0, -3150),
(622, 144, 8, 'Marques', -50, -3150),
(623, 145, 8, 'Commerces', 0, -3150),
(624, 145, 8, 'Marques', -50, -3150),
(625, 146, 8, 'Commerces', 0, -3150),
(626, 146, 8, 'Marques', -50, -3150),
(627, 147, 8, 'Commerces', 0, -3150),
(628, 147, 8, 'Marques', -50, -3150),
(629, 148, 8, 'Commerces', 0, -3150),
(630, 148, 8, 'Marques', -50, -3150),
(631, 149, 8, 'Commerces', 0, -3150),
(632, 149, 8, 'Marques', -50, -3150),
(633, 150, 8, 'Commerces', 0, -3150),
(634, 150, 8, 'Marques', -50, -3150),
(635, 151, 8, 'Commerces', 0, -3150),
(636, 151, 8, 'Marques', -50, -3150),
(637, 152, 8, 'Commerces', 0, -3150),
(638, 152, 8, 'Marques', -50, -3150),
(639, 153, 8, 'Hypermarchés', -100, -3150),
(640, 153, 8, 'Supermarchés', -150, -3150),
(641, 153, 8, 'Supérettes', -200, -3150),
(642, 153, 8, 'Discount', -250, -3150),
(643, 154, 8, 'Commerces', 0, -3150),
(644, 154, 8, 'Marques', -50, -3150),
(645, 155, 8, 'Commerces', 0, -3150),
(646, 155, 8, 'Marques', -50, -3150),
(647, 156, 8, 'Commerces', 0, -3150),
(648, 156, 8, 'Marques', -50, -3150),
(649, 157, 8, 'Entreprises', -300, -3150),
(650, 157, 8, 'Marques', -50, -3150),
(651, 158, 8, 'Entreprises', -300, -3150),
(652, 158, 8, 'Marques', -50, -3150),
(653, 159, 8, 'Commerces', 0, -3150),
(654, 159, 8, 'Marques', -50, -3150),
(655, 160, 8, 'Commerces', 0, -3150),
(656, 160, 8, 'Marques', -50, -3150),
(657, 161, 8, 'Commerces', 0, -3150),
(658, 161, 8, 'Marques', -50, -3150),
(659, 162, 8, 'Commerces', 0, -3150),
(660, 162, 8, 'Marques', -50, -3150),
(661, 163, 8, 'Commerces', 0, -3150),
(662, 163, 8, 'Marques', -50, -3150),
(663, 164, 8, 'Commerces', 0, -3150),
(664, 164, 8, 'Marques', -50, -3150) ;
