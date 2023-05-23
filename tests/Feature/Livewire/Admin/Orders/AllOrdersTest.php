<?php

namespace Tests\Feature\Livewire\Admin\Orders;

use App\Http\Livewire\Admin\Orders\AllOrders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AllOrdersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(AllOrders::class);

        $component->assertStatus(200);
    }
}
