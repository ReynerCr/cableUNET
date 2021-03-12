<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    function it_welcomes_users_with_nickname()
    {
        $this->get('saludo/reyner/reynercr')
            ->assertStatus(200)
            ->assertSee('Bienvenido Reyner, tu apodo es Reynercr.');
    }
    /** @test */
    function it_welcomes_users_withouth_nickname()
    {
        $this->get('saludo/reyner')
            ->assertStatus(200)
            ->assertSee('Bienvenido Reyner.');
    }
}
