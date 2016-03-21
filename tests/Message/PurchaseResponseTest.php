<?php

namespace Omnipay\TwoCheckout\Message;

use Omnipay\Tests\TestCase;

class PurchaseResponseTest extends TestCase
{
    public function testConstruct()
    {
        $request = $this->getMockRequest();
        $request->shouldReceive('getTestMode')->andReturn(false);

        $response = new Purchaseresponse($request, array('sid' => '12345', 'total' => '10.00'));

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertNull($response->getTransactionReference());
        $this->assertNull($response->getMessage());
        $this->assertSame('https://www.2checkout.com/checkout/purchase?sid=12345&total=10.00', $response->getRedirectUrl());
        $this->assertSame('GET', $response->getRedirectMethod());
        $this->assertEquals(array(), $response->getRedirectData());
    }
}
