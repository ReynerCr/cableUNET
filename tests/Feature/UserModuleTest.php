<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserModuleTest extends TestCase
{
    // The tests needs to be executed with a clean DB, preferably a test DB.
    use WithFaker;
    //use RefreshDatabase;
    use DatabaseTransactions;

    /** @test */
    function it_shows_the_users_list()
    {
        User::factory(User::class)->create([
            'name' => 'Joel',
        ]);

        User::factory(User::class)->create([
            'name' => 'Ellie',
        ]);

        $this->get(route('users'))
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('Joe')
            ->assertSee('Ellie');
    }
    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get(route('users'))
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }
    /** @test */
    function it_shows_the_users_details_page()
    {
        $user = User::factory(User::class)->create([
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'email' => 'reynercontreras@gmail.com',
        ]);

        $this->get(route('users.show', $user->id))
            ->assertStatus(200)
            ->assertSee('Reyner Contreras');
    }
    /** @test */
    function it_shows_a_default_message_if_the_user_id_doesnt_exists()
    {
        $this->get(route('users.show', 1))
            ->assertStatus(404)
            ->assertSee('Página no encontrada.');
    }
    /** @test */
    function it_loads_the_new_user_page()
    {
        $this->get(route('users.new'))
            ->assertStatus(200)
            ->assertSee('Crear nuevo usuario');
    }
    /** @test */
    function it_edits_a_user_with_id_page()
    {
        $user = User::factory(User::class)->create([
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'id_card' => '26934400',
        ]);

        $this->get(route('users.edit', $user->id))
            ->assertStatus(200)
            ->assertSee('Editar usuario con id')
            ->assertSee('Reyner.')
            ->assertSee('Contreras.')
            ->assertSee('V26934400');
    }
    /** @test */
    function it_doesnt_edits_a_user_with_text_page()
    {
        $this->get(route('users.edit', 'rey'))
            ->assertStatus(404)
            ->assertSee('Página no encontrada.');
    }
    /** @test */
    function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get(route('users.show', 404))
            ->assertStatus(404)
            ->assertSee('Página no encontrada.');
    }
    /** @test */
    function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();
        $this->post(route('users.create'), [
            'name' => 'Royner',
            'surname' => 'Contreras',
            'id_card' => '21222122',
            'email' => 'roy@outlook.com',
            'password' => 'contrasena',
            'phone_number' => '12465478',
            'address' => 'la papaya estaba buena...',
        ])->assertRedirect(route('users'));

        $this->assertCredentials([
            'name' => 'Royner',
            'surname' => 'Contreras',
            'id_card' => '21222122',
            'email' => 'roy@outlook.com',
            'password' => 'contrasena',
            'phone_number' => '12465478',
            'address' => 'la papaya estaba buena...',
        ]);
    }
    /** @test */
    function the_name_is_required()
    {
        $this->from(route('users.new'))
            ->post(route('users.create'), [
                'name' => '',
                'surname' => 'Contreras',
                'id_card' => '21222122',
                'email' => 'roy@outlook.com',
                'password' => 'contrasena',
                'phone_number' => '12465478',
                'address' => 'la papaya estaba buena...',
            ])
            ->assertRedirect(route('users.new'))
            ->assertSessionHasErrors([
                'name' => 'El campo nombre es obligatorio',
            ]);

        $this->assertEquals(0, User::count());
    }
    /** @test */
    function the_email_must_be_unique()
    {
        User::factory(User::class)->create([
            'email' => 'reynercontreras0@gmail.com',
        ]);

        $this->from(route('users.new'))
            ->post(route('users.create'), [
                'name' => 'reyner',
                'surname' => 'Contreras',
                'id_card' => '50pepes',
                'email' => 'reynercontreras0@gmail.com',
                'password' => 'contrasena',
                'phone_number' => '12465478',
                'address' => 'la papaya estaba buena...',
            ])
            ->assertRedirect(route('users.new'))
            ->assertSessionHasErrors([
                'email',
            ]);
        $this->assertEquals(1, User::count());
    }
}
