<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

    $attributes = [

            'title' => $this->faker->sentence,
            'description'  => $this->faker->paragraph
        ];

        // envio da requisição
        $this->post('/projects',$attributes)->assertRedirect('/projects'); 

        // Verifica no banco se os atributos foram criado na tabela projets
        $this->assertDatabaseHas('projects',$attributes);

        // recupera
        $this->get('/projects')->assertSee($attributes['title']);

    }

}