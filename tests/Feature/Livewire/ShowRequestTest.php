<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowRequestTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowRequest::class);

        $component->assertStatus(200);
    }
}
