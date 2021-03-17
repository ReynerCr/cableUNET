<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

// THIS DOESN'T WORK NOW
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

        $this->get(route('users.index'))
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('Joe')
            ->assertSee('Ellie');
    }
    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get(route('users.index'))
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

        $this->get(route('users.show', $user))
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

        $this->get(route('users.edit', $user))
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar usuario')
            ->assertViewHas('user', function ($viewUser) use ($user) {
                return $viewUser->id == $user->id;
            });
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
        $this->post(route('users.create'), [
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'id_card' => '269',
            'email' => 'reynercontreras0@gmail.com',
            'password' => 'contrasena',
            'phone_number' => '12346547891',
            'address' => 'la papaya estaba buena...',
        ])->assertRedirect(route('users.index'));

        $this->assertEquals(1, User::count());
    }
    /** @test */
    function the_name_is_required()
    {
        $this->from(route('users.new'))
            ->post(route('users.create'), [
                'name' => '',
                'surname' => 'Contreras',
                'id_card' => '123',
                'email' => 'reynercontreras0@gmail.com',
                'password' => 'contrasena',
                'phone_number' => '12346547891',
                'address' => 'la papaya estaba buena...',
            ])
            ->assertRedirect(route('users.new'))
            ->assertSessionHasErrors([
                'name'
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
                'id_card' => '123',
                'email' => 'reynercontreras0@gmail.com',
                'password' => 'contrasena',
                'phone_number' => '12346547891',
                'address' => 'la papaya estaba buena...',
            ])
            ->assertRedirect(route('users.new'))
            ->assertSessionHasErrors([
                'email',
            ]);
        $this->assertEquals(1, User::count());
    }
    /** @test */
    function it_updates_a_user()
    {
        $user = User::factory(User::class)->create();
        $this->put(route('users.update', $user), [
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'id_card' => '123',
            'email' => 'reynercontreras0@gmail.com',
            'password' => 'contrasena',
            'phone_number' => '12346547891',
            'address' => 'la papaya estaba buena...',
        ])->assertRedirect(route('users.update', $user));

        $this->assertCredentials([
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'id_card' => '123',
            'email' => 'reynercontreras0@gmail.com',
            'password' => 'contrasena',
            'phone_number' => '12346547891',
            'address' => 'la papaya estaba buena...',
        ]);
    }
    /** @test */
    function the_name_is_required_when_updating_a_user()
    {
        $user = User::factory(User::class)->create();
        $this->from(route('users.edit', $user))
            ->put(route('users.update', $user), [
                'name' => '',
                'surname' => 'Contreras',
                'id_card' => '123',
                'email' => 'reynercontreras0@gmail.com',
                'password' => 'contrasena',
                'phone_number' => '1234654789',
                'address' => 'la papaya estaba buena...',
            ])->assertRedirect(route('users.edit', $user))
            ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('users', ['email' => 'reynercontreras0@gmail.com']);
    }
    /** @test */
    function the_email_must_be_unique_when_updating()
    {
        $user = User::factory(User::class)->create([
            'email' => 'reynercontreras@gmail.com',
        ]);

        User::factory(User::class)->create([
            'email' => 'reynercontreras0@gmail.com',
        ]);

        $this->from(route('users.edit', $user))
            ->put(route('users.update', $user), [
                'name' => 'Reyner',
                'surname' => 'Contreras',
                'id_card' => '123',
                'email' => 'reynercontreras0@gmail.com',
                'password' => 'contrasena',
                'phone_number' => '12346547891',
                'address' => 'la papaya estaba buena...',
            ])->assertRedirect(route('users.edit', $user))
            ->assertSessionHasErrors(['email']);
    }
    /** @test */
    function the_password_is_optional_when_updating_a_user()
    {
        $oldPassword = 'oldpassword';
        $user = User::factory(User::class)->create([
            'password' =>  bcrypt($oldPassword),
        ]);
        $this->from(route('users.edit', $user))
            ->put(route('users.update', $user), [
                'name' => 'Reyner',
                'surname' => 'Contreras',
                'id_card' => '123',
                'email' => 'reynercontreras0@gmail.com',
                'password' => '',
                'phone_number' => '12346547891',
                'address' => 'la papaya estaba buena...',
            ])->assertRedirect(route('users.update', $user));

        $this->assertCredentials([
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'id_card' => '123',
            'email' => 'reynercontreras0@gmail.com',
            'password' => $oldPassword,
            'phone_number' => '12346547891',
            'address' => 'la papaya estaba buena...',
        ]);
    }
    /** @test */
    function the_email_and_id_card_can_stay_the_same_when_updating_a_user()
    {
        $user = User::factory(User::class)->create([
            'id_card' => '123',
            'email' => 'reynercontreras0@gmail.com',
        ]);

        $this->from(route('users.edit', $user))
            ->put(route('users.update', $user), [
                'name' => 'Reyner',
                'surname' => 'Contreras',
                'id_card' => '123',
                'email' => 'reynercontreras0@gmail.com',
                'password' => '123456',
                'phone_number' => '12346547891',
                'address' => 'la papaya estaba buena...',
            ])->assertRedirect(route('users.update', $user));

        $this->assertCredentials([
            'name' => 'Reyner',
            'surname' => 'Contreras',
            'id_card' => '123',
            'email' => 'reynercontreras0@gmail.com',
            'password' => '123456',
            'phone_number' => '12346547891',
            'address' => 'la papaya estaba buena...',
        ]);
    }

    /** @test */
    function it_deletes_a_user()
    {
        $user = User::factory(User::class)->create();

        $this->delete(route('users.destroy', $user))
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
