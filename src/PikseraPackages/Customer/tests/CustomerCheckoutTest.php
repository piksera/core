<?php

namespace PikseraPackages\Customer\tests;

use PikseraPackages\Checkout\CheckoutManager;
use PikseraPackages\Core\tests\TestCase;
use PikseraPackages\Customer\Models\Address;
use PikseraPackages\Customer\Models\Customer;

/**
 * Run test
 * @author Bobi Microweber
 * @command php phpunit.phar --filter CheckoutTest
 */
class CustomerCheckoutTest extends TestCase
{
    public static $content_id = 1;

    private function _addProductToCart($title)
    {
        app()->database_manager->extended_save_set_permission(true);

        $productPrice = rand(100, 4444);

        $params = array(
            'title' => $title,
            'content_type' => 'product',
            'subtype' => 'product',
            'custom_fields_advanced' => array(
                array('type' => 'dropdown', 'name' => 'Color', 'value' => array('Purple', 'Blue')),
                array('type' => 'price', 'name' => 'Price', 'value' => $productPrice),

            ),
            'is_active' => 1,);


        $saved_id = save_content($params);
        $prices_data = app()->shop_manager->get_product_prices($saved_id, false);
        $this->assertEquals($prices_data['Price'], $productPrice);


        $get = get_content_by_id($saved_id);

        $this->assertEquals($saved_id, ($get['id']));
        self::$content_id = $saved_id;

        $add_to_cart = array(
            'content_id' => self::$content_id,
            'price' => $productPrice,
        );
        $cart_add = update_cart($add_to_cart);

        $this->assertEquals(isset($cart_add['success']), true);
        $this->assertEquals(isset($cart_add['product']), true);
        $this->assertEquals($cart_add['product']['price'], $productPrice);
    }

    public function testCheckout()
    {

        \Config::set('mail.transport', 'array');

        $this->_addProductToCart('Product 1');
        $this->_addProductToCart('Product 2');
        $this->_addProductToCart('Product 3');
        $this->_addProductToCart('Product 4');

        $data['option_value'] = 'y';
        $data['option_key'] = 'order_email_enabled';
        $data['option_group'] = 'orders';
        $save = save_option($data);

        $checkoutDetails = array();
        $checkoutDetails['email'] = 'client_' . uniqid() . '@piksera.com';
        $checkoutDetails['first_name'] = 'Client First Name';
        $checkoutDetails['last_name'] = 'Microweber Last Name';
        $checkoutDetails['phone'] = '08812345' . rand(100, 999);
        $checkoutDetails['address'] = 'Business Park, Mladost 4';
        $checkoutDetails['address2'] = 'Business Park, Mladost 6';
        $checkoutDetails['city'] = 'Sofia';
        $checkoutDetails['state'] = 'Sofia City';
        $checkoutDetails['country'] = 'Bulgaria';
        $checkoutDetails['zip'] = '1000';


        $checkout = new CheckoutManager();
        $checkoutStatus = $checkout->checkout($checkoutDetails);

        $this->assertArrayHasKey('success', $checkoutStatus);
        $this->assertArrayHasKey('id', $checkoutStatus);

        // Find customer
        $customer = Customer::where('email', $checkoutDetails['email'])->first();

        $this->assertEquals($customer->email, $checkoutDetails['email']);
        $this->assertEquals($customer->first_name, $checkoutDetails['first_name']);
        $this->assertEquals($customer->last_name, $checkoutDetails['last_name']);
        $this->assertEquals($customer->phone, $checkoutDetails['phone']);

        // Find customer
        $address = Address::where('customer_id', $customer->id)->first();

        $this->assertEquals($address->phone, $checkoutDetails['phone']);
        $this->assertEquals($address->address_street_1, $checkoutDetails['address']);
        $this->assertEquals($address->address_street_2, $checkoutDetails['address2']);
        $this->assertEquals($address->city, $checkoutDetails['city']);
        $this->assertEquals($address->zip, $checkoutDetails['zip']);
        $this->assertEquals($address->state, $checkoutDetails['state']);


    }

    public function testCheckoutCustomerWithXss()
    {

        $this->_addProductToCart('Product 1');
        $this->_addProductToCart('Product 2');
        $this->_addProductToCart('Product 3');
        $this->_addProductToCart('Product 4');
        $xss = '<style>@keyframes x{}</style><xss style="animation-name:x" onanimationend="alert(document.cookie)"></xss>';
        $checkoutDetails = array();
        $checkoutDetails['email'] = 'client_' . uniqid() . '@piksera.com';
        $checkoutDetails['first_name'] = 'Client First Name<script>alert(1)</script>' . $xss;
        $checkoutDetails['last_name'] = 'Microweber Last Name' . $xss;
        $checkoutDetails['phone'] = '08812345' . rand(100, 999) . $xss;
        $checkoutDetails['address'] = 'Business Park, Mladost 4' . $xss;
        $checkoutDetails['address2'] = 'Business Park, Mladost 6' . $xss;
        $checkoutDetails['city'] = 'Sofia' . $xss;
        $checkoutDetails['state'] = 'Sofia City' . $xss;
        $checkoutDetails['country'] = 'Bulgaria' . $xss;
        $checkoutDetails['zip'] = '1000' . $xss;


        $checkout = new CheckoutManager();
        $checkoutStatus = $checkout->checkout($checkoutDetails);

        $this->assertArrayHasKey('success', $checkoutStatus);
        $this->assertArrayHasKey('id', $checkoutStatus);


        // Find customer
        $customer = Customer::where('email', $checkoutDetails['email'])->first();

        $this->assertEquals($customer->email, $checkoutDetails['email']);
        $this->assertNotEquals($customer->first_name, $checkoutDetails['first_name']);
        $this->assertNotEquals($customer->last_name, $checkoutDetails['last_name']);
        $this->assertNotEquals($customer->phone, $checkoutDetails['phone']);

        // Find customer
        $address = Address::where('customer_id', $customer->id)->first();

        $this->assertNotEquals($address->phone, $checkoutDetails['phone']);
        $this->assertNotEquals($address->address_street_1, $checkoutDetails['address']);
        $this->assertNotEquals($address->address_street_2, $checkoutDetails['address2']);
        $this->assertNotEquals($address->city, $checkoutDetails['city']);
        $this->assertNotEquals($address->zip, $checkoutDetails['zip']);
        $this->assertNotEquals($address->state, $checkoutDetails['state']);


    }
}
