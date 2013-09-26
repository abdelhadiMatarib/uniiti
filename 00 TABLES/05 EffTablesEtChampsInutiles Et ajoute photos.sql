

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- ATTENTION, ON EFFACE DES TABLES OU DES CHAMPS QUI POURRAIENT ETRE UTILISEES EN PRODUCTION

DROP TABLE IF EXISTS `professionnels` ;

ALTER TABLE `contributeurs` DROP `date_naissance` ;

UPDATE `enseignes` SET box_enseigne ='80box.jpg', slide1_enseigne ='80couv1.jpg', slide2_enseigne ='80couv2.jpg', slide3_enseigne ='80couv3.jpg', slide4_enseigne ='80couv4.jpg', slide5_enseigne =NULL, x1 =300, y1 =185, y2 =164, y3 =624, y4 =595, y5=0 WHERE id_enseigne =80 ;
UPDATE `enseignes` SET box_enseigne ='82box.jpg', slide1_enseigne ='82couv1.jpg', slide2_enseigne ='82couv2.jpg', slide3_enseigne ='82couv3.jpg', slide4_enseigne ='82couv4.jpg', slide5_enseigne ='82couv5.jpg', x1 =340, y1 =52, y2 =402, y3 =354, y4 =378, y5=428 WHERE id_enseigne =82 ;
UPDATE `enseignes` SET box_enseigne ='97box.jpg', slide1_enseigne ='97couv1.jpg', slide2_enseigne ='97couv2.jpg', slide3_enseigne ='97couv3.jpg', slide4_enseigne ='97couv4.jpg', slide5_enseigne ='97couv5.jpg', x1 =412, y1 =320, y2 =460, y3 =253, y4 =60, y5=357 WHERE id_enseigne =97 ;
UPDATE `enseignes` SET box_enseigne ='102box.jpg', slide1_enseigne ='102couv1.jpg', slide2_enseigne ='102couv2.jpg', slide3_enseigne ='102couv3.jpg', slide4_enseigne ='102couv4.jpg', slide5_enseigne ='102couv5.jpg', x1 =362, y1 =396, y2 =365, y3 =399, y4 =277, y5=394 WHERE id_enseigne =102 ;
UPDATE `enseignes` SET box_enseigne ='photo 1.jpg', slide1_enseigne ='104couv1.jpg', slide2_enseigne ='104couv2.jpg', slide3_enseigne ='104couv3.jpg', slide4_enseigne ='104couv4.jpg', slide5_enseigne =NULL, x1 =0, y1 =179, y2 =365, y3 =367, y4 =431, y5=0 WHERE id_enseigne =104 ;
UPDATE `enseignes` SET box_enseigne ='109box.jpg', slide1_enseigne ='109couv1.jpg', slide2_enseigne ='109couv2.jpg', slide3_enseigne ='109couv3.jpg', slide4_enseigne =NULL, slide5_enseigne =NULL, x1 =214, y1 =433, y2 =600, y3 =505, y4 =0, y5=0 WHERE id_enseigne =109 ;
UPDATE `enseignes` SET box_enseigne ='118box.jpg', slide1_enseigne ='118couv1.jpg', slide2_enseigne ='118couv2.jpg', slide3_enseigne ='118couv3.jpg', slide4_enseigne =NULL, slide5_enseigne =NULL, x1 =198, y1 =74, y2 =325, y3 =182, y4 =0, y5=0 WHERE id_enseigne =118 ;
UPDATE `enseignes` SET box_enseigne ='122box.jpg', slide1_enseigne ='122couv1.jpg', slide2_enseigne ='122couv2.jpg', slide3_enseigne ='122couv3.jpg', slide4_enseigne =NULL, slide5_enseigne =NULL, x1 =274, y1 =190, y2 =274, y3 =148, y4 =0, y5=0 WHERE id_enseigne =122 ;
UPDATE `enseignes` SET box_enseigne ='123box.jpg', slide1_enseigne ='123couv1.jpg', slide2_enseigne ='123couv2.jpg', slide3_enseigne ='123couv3.jpg', slide4_enseigne ='123couv4.jpg', slide5_enseigne =NULL, x1 =302, y1 =0, y2 =301, y3 =462, y4 =500, y5=0 WHERE id_enseigne =123 ;
UPDATE `enseignes` SET box_enseigne ='140box.jpg', slide1_enseigne ='140couv1.jpg', slide2_enseigne ='140couv2.jpg', slide3_enseigne ='140couv3.jpg', slide4_enseigne ='140couv4.jpg', slide5_enseigne ='140couv5.jpg', x1 =207, y1 =423, y2 =502, y3 =455, y4 =383, y5=507 WHERE id_enseigne =140 ;
UPDATE `enseignes` SET box_enseigne ='148box.jpg', slide1_enseigne ='148couv1.jpg', slide2_enseigne ='148couv2.jpg', slide3_enseigne ='148couv3.jpg', slide4_enseigne ='148couv4.jpg', slide5_enseigne ='148couv5.jpg', x1 =638, y1 =576, y2 =624, y3 =388, y4 =664, y5=478 WHERE id_enseigne =148 ;
UPDATE `enseignes` SET box_enseigne ='149box.jpg', slide1_enseigne ='149couv1.jpg', slide2_enseigne ='149couv2.jpg', slide3_enseigne ='149couv3.jpg', slide4_enseigne =NULL, slide5_enseigne =NULL, x1 =429, y1 =211, y2 =470, y3 =425, y4 =0, y5=0 WHERE id_enseigne =149 ;
UPDATE `enseignes` SET box_enseigne ='167box.jpg', slide1_enseigne ='167couv1.jpg', slide2_enseigne ='167couv2.jpg', slide3_enseigne ='167couv3.jpg', slide4_enseigne ='167couv4.jpg', slide5_enseigne ='167couv5.jpg', x1 =105, y1 =444, y2 =486, y3 =664, y4 =351, y5=375 WHERE id_enseigne =167 ;
UPDATE `enseignes` SET box_enseigne ='206box.jpg', slide1_enseigne ='206couv1.jpg', slide2_enseigne ='206couv2.jpg', slide3_enseigne =NULL, slide4_enseigne =NULL, slide5_enseigne =NULL, x1 =467, y1 =47, y2 =388, y3 =0, y4 =0, y5=0 WHERE id_enseigne =206 ;
UPDATE `enseignes` SET box_enseigne ='232box.jpg', slide1_enseigne ='232couv1.jpg', slide2_enseigne ='232couv2.jpg', slide3_enseigne ='232couv3.jpg', slide4_enseigne ='232couv4.jpg', slide5_enseigne ='232couv5.jpg', x1 =340, y1 =407, y2 =362, y3 =283, y4 =386, y5=407 WHERE id_enseigne =232 ;
UPDATE `enseignes` SET box_enseigne ='246box.jpg', slide1_enseigne ='246couv1.jpg', slide2_enseigne ='246couv2.jpg', slide3_enseigne ='246couv3.jpg', slide4_enseigne ='246couv4.jpg', slide5_enseigne ='246couv5.jpg', x1 =648, y1 =219, y2 =0, y3 =314, y4 =277, y5=291 WHERE id_enseigne =246 ;
UPDATE `enseignes` SET box_enseigne ='248box.jpg', slide1_enseigne ='248couv1.jpg', slide2_enseigne ='248couv2.jpg', slide3_enseigne ='248couv3.jpg', slide4_enseigne =NULL, slide5_enseigne =NULL, x1 =281, y1 =55, y2 =312, y3 =399, y4 =0, y5=0 WHERE id_enseigne =248 ;


-- FIN ATTENTION


