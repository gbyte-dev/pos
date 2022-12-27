<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['login'] = 'Login/index';
$route['translate_uri_dashes'] = FALSE;

//Product
$route['addProd'] = 'ProductController/addProduct';
$route['editProduct'] = 'ProductController/editProduct';
$route['deleteProduct'] = 'ProductController/deleteProduct';
$route['addProduct'] = 'ProductController/form';
$route['products'] = 'ProductController/readProduct';
$route['editPro'] = 'ProductController/editProduct_id';
$route['manage_website'] = 'ProductController/manage_website';
$route['settings_view'] = 'ProductController/settings_view';
$route['addBulk'] = 'ProductController/addBulk';

//Customer
$route['customers'] = 'CustomerController/customers_view';
$route['addCustomer'] = 'CustomerController/addCustomer';
$route['editCustomer'] = 'CustomerController/editCustomer';
$route['deleteCustomer'] = 'CustomerController/deleteCustomer';
$route['addBulkCustomer'] = 'CustomerController/addBulkCustomer';


//Categories
$route['categories'] = 'CategoryController/category_view';
$route['addCategory'] = 'CategoryController/addCategory';
$route['editCategory'] = 'CategoryController/editCategory';
$route['deleteCategory'] = 'CategoryController/deleteCategory';



//Subcategories
$route['subcategories'] = 'CategoryController/subcategory_view';
$route['addSubCategory'] = 'CategoryController/addSubCategory';
$route['editSubCategory'] = 'CategoryController/editSubCategory';
$route['deleteSubCategory'] = 'CategoryController/deleteSubCategory';



//Brand
$route['brand'] = 'BrandController/brand_view';
$route['addBrand'] = 'BrandController/addBrand';
$route['editBrand'] = 'BrandController/editBrand';
$route['deleteBrand'] = 'BrandController/deleteBrand';



//Supplier
$route['supplier'] = 'SupplierController/supplier_view';
$route['addSupplier'] = 'SupplierController/addSupplier_view';
$route['editSupplier'] = 'SupplierController/editSupplier_view';
$route['addSupp'] = 'SupplierController/addSupplier';
$route['editSupp'] = 'SupplierController/editSupplier';
$route['deleteSupplier'] = 'SupplierController/deleteSupplier';
$route['addBulkSupplier'] = 'SupplierController/addBulkSupplier';

//Warehouse
$route['warehouse'] = 'WarehouseController/warehouse_view';
$route['addWarehouse'] = 'WarehouseController/addWarehouse_view';
$route['editWarehouse'] = 'WarehouseController/editWarehouse_view';
$route['addWare'] = 'WarehouseController/addWarehouse';
$route['editWare'] = 'WarehouseController/editWarehouse';
$route['deleteWarehouse'] = 'WarehouseController/deleteWarehouse';
$route['addBulkWarehouse'] = 'WarehouseController/addBulkWarehouse';


$route['readProduct1'] = 'ProductController/readProduct1';

$route['readSupplierProduct'] = 'ProductController/readSupplierProduct';


//Payment
$route['payments'] = 'PaymentController/payment_view';
$route['addPayment'] = 'PaymentController/addPayment';
$route['editPayment'] = 'PaymentController/editPayment';
$route['deletePayment'] = 'PaymentController/deletePayment';
$route['addBulkPayment'] = 'PaymentController/addBulkPayment';

//POS
$route['pos'] = 'POSController/pos_view'; 
$route['ajax_name'] = 'POSController/ajax_name';
$route['ajax_subcategory'] = 'POSController/ajax_subcategory';
$route['ajax_add_customer'] = 'POSController/ajax_add_customer';
$route['ajax_suggest'] = 'POSController/ajax_suggest';
$route['add_cart'] = 'POSController/add_cart';
$route['ajax_add_cart'] = 'POSController/ajax_add_cart';
$route['ajax_read_cart'] = 'POSController/ajax_read_cart';
$route['ajax_update_cart'] = 'POSController/ajax_update_cart';
$route['ajax_suggest_category'] = 'CategoryController/ajax_suggest_category';
$route['ajax_suggest_subcategory'] = 'CategoryController/ajax_suggest_subcategory';
$route['ajax_add_extra_discount'] = 'POSController/ajax_add_extra_discount';
$route['ajax_destroy'] = 'POSController/ajax_destroy';
$route['ajax_submit_order'] = 'POSController/ajax_submit_order';
$route['ajax_final_cart'] = 'POSController/ajax_final_cart';
$route['ajax_coupon_discount'] = 'POSController/ajax_coupon_discount';
 


//Biller
$route['biller'] = 'BillerController/biller_view';
$route['addBiller'] = 'BillerController/addBiller_view';
$route['editBiller'] = 'BillerController/editBiller_view';
$route['addBill'] = 'BillerController/addBiller';
$route['editBill'] = 'BillerController/editBiller';
$route['deleteBiller'] = 'BillerController/deleteBiller';
$route['changePassword'] = 'BillerController/changePassword';
$route['addBulkBiller'] = 'BillerController/addBulkBiller';

//Sales
$route['sales'] = 'SalesController/sales_view';
$route['orderSummary'] = 'SalesController/orderSummary';
$route['filter'] = 'SalesController/filter';

//Stock Limit Products
$route['stocks'] = 'StocksController/stocks_view';
$route['editStockProduct'] = 'StocksController/editStockProduct';
$route['deleteStockProduct'] = 'StocksController/deleteStockProduct';
$route['editStockPro'] = 'StocksController/editStockProduct_id';

//Coupon
$route['coupons'] = 'CouponController/coupon_view';
$route['addCoupon'] = 'CouponController/addCoupon_view';
$route['editCoupon'] = 'CouponController/editCoupon_view';
$route['addCoup'] = 'CouponController/addCoupon';
$route['editCoup'] = 'CouponController/editCoupon';
$route['deleteCoupon'] = 'CouponController/deleteCoupon';
$route['addBulkCoupon'] = 'CouponController/addBulkCoupon';
$route['checkCoupon'] = 'CouponController/checkCoupon';


//Expense

$route['expense']='ExpenseController/expense_view';
$route['expense_category']='ExpenseController/expense_category_view';
$route['addExpCategory']='ExpenseController/addExpCategory';
$route['editExpCategory']='ExpenseController/editExpCategory';
$route['deleteExpCategory']='ExpenseController/deleteExpCategory';
$route['addExpense'] = 'ExpenseController/addExpense';
$route['editExpense'] = 'ExpenseController/editExpense';
$route['deleteExpense'] = 'ExpenseController/deleteExpense';

//Account
$route['account']='AccountController/account_view';
$route['addAccount']='AccountController/addAccount';
$route['editAccount']='AccountController/editAccount';
$route['deleteAccount']='AccountController/deleteAccount';

$route['money_transfer']='AccountController/money_transfer_view';
$route['transfer_product']='AccountController/transfer_product_view';

$route['demo']='AccountController/demo';
$route['demoajax']='AccountController/demo1';
$route['showdata']='AccountController/demo2';
$route['transfer']='AccountController/demo3';
$route['insert_new']='AccountController/demo5';
$route['tranferProduct']='AccountController/show_tranfer';

$route['addMoneyTransfer']='AccountController/addMoneyTransfer';
$route['editMoneyTransfer']='AccountController/editMoneyTransfer';
$route['deleteMoneyTransfer']='AccountController/deleteMoneyTransfer';