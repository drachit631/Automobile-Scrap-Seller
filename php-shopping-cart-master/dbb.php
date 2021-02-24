<?php
create table if not exist 'products'(
'id' int(11) NOT NULL AUTO_INCREMENT,
'product_code' varchar(60) NOT NULL,
'product_name' varchar(60) NOT NULL,
'product_desc' tinytext NOT NULL,
'product_img_name' varchar(60) NOT NULL,
'price' decimal(10,2) NOT NULL,
PRIMARY KEY('id'),
UNIQUE KEY 'product_code'('product_code')
)AUTO_INCREMENT=1;