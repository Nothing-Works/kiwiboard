<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectsTest extends TestCase
{
    public function test_a_user_can_create_a_project()
    {
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }
}