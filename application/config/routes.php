<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Front End Route
$route['default_controller']   = 'web';
$route['404_override']         = 'admin/error';
$route['translate_uri_dashes'] = false;



//Web Route

$route['product']             = 'web/product';
$route['single/(:num)']       = 'web/single/$1';
$route['contact']             = 'web/contact';
$route['cart']                = 'web/cart';
$route['save/cart']           = 'web/save_cart';
$route['update/cart']         = 'web/update_cart';
$route['remove/cart']         = 'web/remove_cart';
$route['user_form']           = 'web/user_form';
$route['get/category/(:num)'] = 'web/category_post/$1';

$route['search']              = 'web/search';
$route['customer/register']   = 'web/customer_register';
$route['customer/login']      = 'web/customer_login';
$route['customer/logout']     = 'web/logout';
$route['customer/logincheck'] = 'web/customer_logincheck';
$route['customer/save']       = 'web/customer_save';
$route['register/success']    = 'web/register_success';

$route['customer/shipping/login']    = 'web/customer_shipping_login';
$route['customer/shipping/register'] = 'web/customer_shipping_register';

$route['customer/shipping']              = 'web/customer_shipping';
$route['customer/save/shipping/address'] = 'web/save_shipping_address';
$route['checkout']                       = 'web/checkout';
$route['payment']                        = 'web/payment';
$route['save/order']                     = 'web/save_order';
$route['check_email']                    = 'web/check_email';

//Admin Panel Route
$route['dashboard']            = 'admin/index';
$route['manage/order']         = 'manageorder/manage_order';
$route['order/details/(:num)'] = 'manageorder/order_details/$1';

//Category  Route List
$route['add/category']                = 'category/add_category';
$route['manage/category']             = 'category/manage_category';
$route['save/category']               = 'category/save_category';
$route['delete/category/(:num)']      = 'category/delete_category/$1';
$route['edit/category/(:num)']        = 'category/edit_category/$1';
$route['update/category/(:num)']      = 'category/update_category/$1';
$route['published/category/(:num)']   = 'category/published_category/$1';
$route['unpublished/category/(:num)'] = 'category/unpublished_category/$1';

//Sub Category  Route List
$route['add/sub_category']                = 'sub_category/add_sub_category';
$route['manage/sub_category']             = 'sub_category/manage_sub_category';
$route['save/sub_category']               = 'sub_category/save_sub_category';
$route['delete/sub_category/(:num)']      = 'sub_category/delete_sub_category/$1';
$route['edit/sub_category/(:num)']        = 'sub_category/edit_sub_category/$1';
$route['update/sub_category/(:num)']      = 'sub_category/update_sub_category/$1';
$route['published/sub_category/(:num)']   = 'sub_category/published_sub_category/$1';
$route['unpublished/sub_category/(:num)'] = 'sub_category/unpublished_sub_category/$1';


//Sub Sub Category  Route List
$route['add/sub_sub_category']                = 'sub_sub_category/add_sub_sub_category';
$route['manage/sub_sub_category']             = 'sub_sub_category/manage_sub_sub_category';
$route['save/sub_sub_category']               = 'sub_sub_category/save_sub_sub_category';
$route['delete/sub_sub_category/(:num)']      = 'sub_sub_category/delete_sub_sub_category/$1';
$route['edit/sub_sub_category/(:num)']        = 'sub_sub_category/edit_sub_sub_category/$1';
$route['update/sub_sub_category/(:num)']      = 'sub_sub_category/update_sub_sub_category/$1';
$route['published/sub_sub_category/(:num)']   = 'sub_sub_category/published_sub_sub_category/$1';
$route['unpublished/sub_sub_category/(:num)'] = 'sub_sub_category/unpublished_sub_sub_category/$1';

//Brand  Route List
$route['add/brand']                = 'brand/add_brand';
$route['manage/brand']             = 'brand/manage_brand';
$route['save/brand']               = 'brand/save_brand';
$route['delete/brand/(:num)']      = 'brand/delete_brand/$1';
$route['edit/brand/(:num)']        = 'brand/edit_brand/$1';
$route['update/brand/(:num)']      = 'brand/update_brand/$1';
$route['published/brand/(:num)']   = 'brand/published_brand/$1';
$route['unpublished/brand/(:num)'] = 'brand/unpublished_brand/$1';

//Post Route List
$route['add/product']                = 'product/add_product';
$route['manage/product']             = 'product/manage_product';
$route['save/product']               = 'product/save_product';
$route['delete/product/(:num)']      = 'product/delete_product/$1';
$route['edit/product/(:num)']        = 'product/edit_product/$1';
$route['update/product/(:num)']      = 'product/update_product/$1';
$route['published/product/(:num)']   = 'product/published_product/$1';
$route['unpublished/product/(:num)'] = 'product/unpublished_product/$1';

//Admin login
$route['admin']             = 'adminlogin';
$route['admin_login_check'] = 'adminlogin/admin_login_check';
$route['logout']            = 'admin/logout';

//Slider  Route List
$route['add/slider']                = 'slider/add_slider';
$route['manage/slider']             = 'slider/manage_slider';
$route['save/slider']               = 'slider/save_slider';
$route['delete/slider/(:num)']      = 'slider/delete_slider/$1';
$route['edit/slider/(:num)']        = 'slider/edit_slider/$1';
$route['update/slider/(:num)']      = 'slider/update_slider/$1';
$route['published/slider/(:num)']   = 'slider/published_slider/$1';
$route['unpublished/slider/(:num)'] = 'slider/unpublished_slider/$1';

//Bank details Route list
$route['manage/bank_details']			= 'Bankdetails/account_info';

//Theme Option  Route List
$route['theme/option'] = 'themeoption';
$route['save/option']  = 'themeoption/save_option';
//API - 28-02-2025
$route['login'] = 'Api/Authentication/login';
$route['reGenToken'] = 'api/Token/reGenToken';
