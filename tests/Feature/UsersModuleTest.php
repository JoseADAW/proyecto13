<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    function it_loads_the_users_list_page()
    {
        factory(User::class)->create([
                'name' => 'Joel'
            ]
        );
        factory(User::class)->create([
                'name' => 'Ellie'
            ]
        );

        $this->get('usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('Joel')
            ->assertSee('Ellie');
    }

    /** @test  */
    function it_shows_a_default_page_if_the_users_list_is_empty()
    {
        $this->get('usuarios?empty')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('No hay usuarios registrados');
    }

    /**
     * @test
     */
    function it_loads_the_users_detail_page()
    {
        $this->get('usuarios/5')
            ->assertStatus(200)
            ->assertSee('Mostrando los detalles del usuario #5');
    }

    /**
     * @test
     */
    function it_loads_the_new_users_page()
    {
        $this->get('usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Creando nuevo usuario');
    }
}
