<?php
//------------------- dbconnection -------------------------
define ('LOCALRHOST','localhost' );// localhost connection
define ('LOCALUSER','root' );
define ('LOCALPASSWORD','' );
define ('LOCALDATABASE','promotool' );

define ('SERVERHOST','' );// server connection
define ('SERVERUSER','' );
define ('SERVERPASSWORD','' );
define ('SERVERDATABASE','' );

//------------------------table prefix --------------------------------
// it will change with prefix of tables
define('DB_PREFIX', 'tbl');
//--------------------------admin email id-----------------------------------
// it will change with adminemail id
define('ADMIN_EMAIL', 'admin@promo.com');
//------------------tables name-------------------------------------------------
define ( 'CUST_COUNTRY_TABLE', DB_PREFIX .'Country' );
define ( 'CUST_TEMP_TABLE', 'tempCustomer' );
define ( 'SECCUST_TEMP_TABLE', 'tempSecondaryCustomer' );
define ( 'SECCUST_MASTER_TABLE', DB_PREFIX . 'SecondaryCustomer' );
define ( 'SECCUST_G1_TABLE', DB_PREFIX . 'SecGroup1' );
define ( 'SECCUST_G2_TABLE', DB_PREFIX . 'SecGroup2' );
define ( 'SECCUST_Hierarchy_TABLE', DB_PREFIX . 'SecCustomerHierarchy' );
define ( 'CUST_MASTER_TABLE', DB_PREFIX . 'Customer' );
define ( 'CUST_Hierarchy_TABLE', DB_PREFIX . 'CustomerHierarchy' );
define ( 'CUST_G1_TABLE', DB_PREFIX . 'CusGroup1' );
define ( 'CUST_G2_TABLE', DB_PREFIX . 'CusGroup2' );
define ( 'CUST_G3_TABLE', DB_PREFIX . 'CusGroup3' );
define ( 'CUST_G4_TABLE', DB_PREFIX . 'CusGroup4' );
define ( 'CUST_G5_TABLE', DB_PREFIX . 'CusGroup5' );
define ( 'CUST_G6_TABLE', DB_PREFIX . 'CusGroup6' );
define ( 'CUST_G7_TABLE', DB_PREFIX . 'CusGroup7' );
define ( 'PRD_TEMP_TABLE', 'tempProduct' );
define ( 'PRD_MASTER_TABLE', DB_PREFIX . 'Product' );
define ( 'PRD_Hierarchy_TABLE', DB_PREFIX . 'ProductHierarchy' );
define ( 'PRD_G1_TABLE', DB_PREFIX . 'PrdGroup1' );
define ( 'PRD_G2_TABLE', DB_PREFIX . 'PrdGroup2' );
define ( 'PRD_G3_TABLE', DB_PREFIX . 'PrdGroup3' );
define ( 'PRD_G4_TABLE', DB_PREFIX . 'PrdGroup4' );
define ( 'PRD_G5_TABLE', DB_PREFIX . 'PrdGroup5' );
define ( 'PRD_G6_TABLE', DB_PREFIX . 'PrdGroup6' );
define ( 'PRD_G7_TABLE', DB_PREFIX . 'PrdGroup7' );
define ( 'PRD_G8_TABLE', DB_PREFIX . 'PrdGroup8' );
define ( 'PRD_G9_TABLE', DB_PREFIX . 'PrdGroup9' );
define ( 'PRD_G10_TABLE', DB_PREFIX . 'PrdGroup10' );
define ( 'PRD_G11_TABLE', DB_PREFIX . 'PrdGroup11' );
define ( 'PRD_G12_TABLE', DB_PREFIX . 'PrdGroup12' );
define ( 'PRD_G13_TABLE', DB_PREFIX . 'PrdGroup13' );
define ( 'PRD_G14_TABLE', DB_PREFIX . 'PrdGroup14' );
define ( 'PRD_G15_TABLE', DB_PREFIX . 'PrdGroup15' );
define ( 'PRD_G16_TABLE', DB_PREFIX . 'PrdGroup16' );
define ( 'PRD_G17_TABLE', DB_PREFIX . 'PrdGroup17' );
define ( 'PRD_G18_TABLE', DB_PREFIX . 'PrdGroup18' );
define ( 'PRD_G19_TABLE', DB_PREFIX . 'PrdGroup19' );
define ( 'PRD_G20_TABLE', DB_PREFIX . 'PrdGroup20' );
define ( 'PRD_G21_TABLE', DB_PREFIX . 'PrdGroup21' );
define ( 'PRITRANS_TABLE', DB_PREFIX . 'PriTrans' );






?>