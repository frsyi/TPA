<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PengajarControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['role' => 'pengurus']);
        $this->actingAs($user);
    }

    public function test_index_displays_pengajar_list()
    {
        User::factory()->count(3)->create(['role' => User::ROLE_PENGAJAR]);

        $response = $this->get(route('pengajar.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pengajar.index');
        $response->assertViewHas('pengajars');
    }

    public function test_create_pengajar_view()
    {
        $response = $this->get(route('pengajar.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pengajar.create');
    }

    public function test_store_pengajar()
    {
        $data = [
            'name' => 'John Doe',
            'phone_number' => '08123456789',
            'username' => 'johndoe',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post(route('pengajar.store'), $data);

        $response->assertRedirect(route('pengajar.index'));
        $this->assertDatabaseHas('users', ['username' => 'johndoe']);
    }

    public function test_show_pengajar_detail()
    {
        $pengajar = User::factory()->create(['role' => User::ROLE_PENGAJAR]);

        $response = $this->get(route('pengajar.show', $pengajar->id));

        $response->assertStatus(200);
        $response->assertViewIs('pengajar.show');
        $response->assertViewHas('pengajar', $pengajar);
    }

    public function test_edit_pengajar()
    {
        $pengajar = User::factory()->create(['role' => User::ROLE_PENGAJAR]);

        $response = $this->get(route('pengajar.edit', $pengajar->id));

        $response->assertStatus(200);
        $response->assertViewIs('pengajar.edit');
        $response->assertViewHas('pengajar', $pengajar);
    }

    public function test_update_pengajar()
    {
        $pengajar = User::factory()->create(['role' => User::ROLE_PENGAJAR]);

        $data = [
            'name' => 'Updated Name',
            'phone_number' => '08987654321',
            'username' => $pengajar->username,
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ];

        $response = $this->put(route('pengajar.update', $pengajar->id), $data);

        $response->assertRedirect(route('pengajar.index'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
    }

    public function test_delete_pengajar()
    {
        $pengajar = User::factory()->create(['role' => User::ROLE_PENGAJAR]);

        $response = $this->delete(route('pengajar.destroy', $pengajar->id));

        $response->assertRedirect(route('pengajar.index'));
        $this->assertDatabaseMissing('users', ['id' => $pengajar->id]);
    }
}
