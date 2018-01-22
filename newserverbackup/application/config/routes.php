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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

## Login / Registration
$route['SignUp'] 		 							= 'Login/register';
$route['FindUserName'] 								= 'Login/FindUserName';
$route['Do_Registration'] 							= 'Login/Do_Registration';
$route['SignUp-Step-2']	 							= 'Login/register_step_2';
$route['Skip_Step2']	 							= 'Login/Skip_Step2';
$route['IntrestTag']	 							= 'Login/IntrestTag';
$route['Login'] 		 							= 'Login';
$route['DoLoginProcess']  							= 'Login/DoLoginProcess';
$route['Verify-Email']  							= 'Login/verify_email';
$route['SendVerify_email']  						= 'Login/SendVerify_email';
$route['VerifyEmailNow/(:any)/(:any)/(:any)']  		= 'Login/VerifyEmailNow/$1/$2/$3';
$route['Logout'] 		 							= 'Login/logout';
$route['logout'] 		 							= 'Login/logout';
$route['Forget-Password']  							= 'Login/forget';
$route['GetPassword']  								= 'Login/GetPassword';


##Home
$route['Home']										= 'Home';
$route['home']										= 'Home';
$route['Home/(:any)']								= 'Home/index/$1'; 
$route['home/(:any)']								= 'Home/index/$1';
$route['New-Item'] 		 							= 'Home/NewProduct';
$route['User-Item'] 		 						= 'Home/UsedProduct';
$route['All'] 		 								= 'Home/AllProduct';
$route['Browsing-History']							= 'Home/BrowsingHistory'; 
$route['Feedback']									= 'Home/Feedback';
$route['Customer-Bought']							= 'Home/CustomerBought';
$route['Customer-Bought/(:any)']					= 'Home/CustomerBought/$1';

## Search Ajax
$route['ajax_location']								= 'Home/ajax_location';

##Product
$route['Submit-Product']							= 'Product/Post';
$route['ProductFullView/(:any)/(:any)/(:any)']		= 'Product/ProductFullView/$1/$2/$3';
$route['ProductFullView/(:any)/(:any)/(:any)/(:any)']= 'Product/ProductFullView/$1/$2/$3/$4';
$route['Edit/(:any)/(:any)/(:any)/(:any)']			= 'Product/Edit_Product/$1/$2/$3/$4';
$route['Edit/(:any)/(:any)/(:any)']					= 'Product/Edit_Product/$1/$2/$3';

$route['Like']										= 'Product/Like';
$route['Comment']									= 'Product/Comment';
$route['RemoveProdut']								= 'Product/RemoveProdut';

##Wish-List Or Dream Box
$route['My-DreamBox']								= 'Product/MyWishList';
$route['Add-To-Wish-List']							= 'Product/Add_To_Wish_List';
$route['Remove-From-Wish-List']						= 'Product/RemoveFromWishList';
$route['Add-To-Cart-From-Wish-List']				= 'Product/AddToCartFromWishList';

##Cart
$route['Add-To-Cart']								= 'Product/Add_Product';
$route['Cart'] 		 								= 'Cart';
$route['EmptyCart'] 		 						= 'Cart/EmptyCart';
$route['RemoveItem'] 		 						= 'Cart/RemoveItem';
$route['UpdateQuantity'] 		 					= 'Cart/UpdateQuantity';
$route['Move-To-Wish-List'] 		 				= 'Cart/MoveToWishList';

## Checkout
$route['Checkout'] 			 						= 'Cart/Checkout';
$route['AddShippingAddress'] 			 			= 'Cart/AddShippingAddress';
$route['OrderSummary'] 			 					= 'Order/OrderSummary';
$route['MakeTransactionRequest'] 					= 'Order/MakeTransactionRequest';
$route['OrderPlaced'] 			 					= 'Order/OrderPlaced';
$route['My-Order'] 				 					= 'Order/PlacedOrder';
$route['TrackOrder/(:any)'] 			 			= 'Order/TrackOrder/$1';
$route['CancelOrder']                                                  ='Order/CancelOrder';
$route['CancelOrderPage']                                                  ='Order/CancelOrderPage';

$route['My-Sold-Item'] 			 					= 'Order/SoldItem';
$route['Sold-Item-Info/(:any)/(:any)/(:any)'] 		= 'Order/SoldItemInfo/$1/$2/$3';
$route['Sold-Item-Info/(:any)/(:any)/(:any)/(:any)']= 'Order/SoldItemInfo/$1/$2/$3/$4';
$route['Update-TrackId']							= 'Order/UpdateTrackId';

## Profile
$route['My-Profile'] 		 						= 'User';
$route['Update/ProfileImage'] 		 				= 'User/ProfileImage';
$route['Update/ProfileCover'] 		 				= 'User/ProfileCover';
$route['User/(:any)']								= 'User/UserProfile/$1';
$route['User/(:any)/(:any)']						= 'User/UserProfile/$1/$2';
$route['My-Vefinder']								= 'User/My_Vefinder';
$route['My-Requested-Items']						= 'User/My_RequestedItems';
$route['Requested-Items']							= 'User/RequestedItems_ByOther';
$route['My-Gifts']									= 'User/My_Gifts';
$route['Comment-Profile']							= 'User/ProfileComment';

## Bid
$route['PlaceBid'] 		 							= 'Bid/PlaceBid';
$route['CaptchaAjax'] 		 						= 'Bid/CaptchaAjax';
$route['MyBids'] 			 						= 'Bid/MyBids';

## Follow and UnFollow		
$route['Follow'] 			 						= 'Follow';
$route['UnfollowUser'] 			 					= 'Follow/UnfollowUser';
$route['FollowUnfollowUser'] 	 					= 'Follow/FollowUnfollowUser';


## Like And Unlike
$route['ProfileLike'] 			 					= 'ProfileLike';

## Start Tag
$route['StarTag/(:any)']							= 'Tag/StarTag/$1';

##
$route['Department']							= 'Department/index';

##
$route['CreateEvents']                                                  ='Event/createEvent';
$route['Events']                                                  ='Event/eventList';
$route['IndividualEvents']                                                  ='Event/IndividualEventDetails';
$route['InviteUsers']                                                  ='Event/inviteForEvent';
$route['SendInvitation']                                                  ='Event/sendInvite';
$route['EventLike']										= 'Event/EventLike';
$route['EventComment']									= 'Event/Comment';