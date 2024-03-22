<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;

class OrderTrackingPageTest extends TestCase
{
    /** @test */
    public function order_tracking_page_shows_orders_for_logged_in_user()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/order/track/{customer_id}'); // Replace with the actual route

        $response->assertStatus(200);
        $response->assertSee('Your Orders');
        $response->assertSee((string) $order->OrderID);
        $response->assertSee($order->Status);
    }

    /** @test */
    public function order_tracking_page_shows_message_when_no_orders_exist()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/order/track/{customer_id}'); // Replace with the actual route

        $response->assertStatus(200);
        $response->assertSee('You haven\'t placed any orders yet.');
    }
}
