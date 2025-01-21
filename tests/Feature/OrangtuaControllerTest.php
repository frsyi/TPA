<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrangtuaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $pengurus;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['role' => 'pengurus']);
        $this->actingAs($user);
    }

    public function test_index_displays_orangtua_list()
    {
        User::factory()->count(5)->create(['role' => User::ROLE_ORANGTUA]);

        $response = $this->get(route('orangtua.index'));

        $response->assertStatus(200);
        $response->assertViewIs('orangtua.index');
    }

    public function test_create_orangtua_view()
    {
        Siswa::factory()->create();

        $response = $this->get(route('orangtua.create'));

        $response->assertStatus(200);
        $response->assertViewIs('orangtua.create');
    }

    public function test_store_orangtua()
    {
        $siswa = Siswa::factory()->create();

        $response = $this->post(route('orangtua.store'), [
            'name' => 'Orangtua Baru',
            'phone_number' => '081234567890',
            'username' => 'orangtua_baru',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'siswa_id' => $siswa->id,
        ]);

        $response->assertRedirect(route('orangtua.index'));
        $this->assertDatabaseHas('users', ['username' => 'orangtua_baru']);
    }

    public function test_show_orangtua_detail()
    {
        $siswa = Siswa::factory()->create();
        $orangtua = User::factory()->create([
            'role' => User::ROLE_ORANGTUA,
            'siswa_id' => $siswa->id,
        ]);

        $response = $this->get(route('orangtua.show', $orangtua->id));

        $response->assertStatus(200);
        $response->assertViewIs('orangtua.show');
        $response->assertViewHas('orangtua', function ($viewOrangtua) use ($orangtua) {
            return $viewOrangtua->id === $orangtua->id;
        });
    }

    public function test_edit_orangtua()
    {
        $orangtua = User::factory()->create(['role' => User::ROLE_ORANGTUA]);

        $response = $this->get(route('orangtua.edit', $orangtua->id));

        $response->assertStatus(200);
        $response->assertViewIs('orangtua.edit');
    }

    public function test_update_orangtua()
    {
        $orangtua = User::factory()->create(['role' => User::ROLE_ORANGTUA]);
        $siswa = Siswa::factory()->create();

        $response = $this->put(route('orangtua.update', $orangtua->id), [
            'name' => 'Updated Name',
            'phone_number' => '081234567890',
            'username' => $orangtua->username,
            'siswa_id' => $siswa->id,
        ]);

        $response->assertRedirect(route('orangtua.index'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
    }

    public function test_delete_orangtua()
    {
        $orangtua = User::factory()->create(['role' => User::ROLE_ORANGTUA]);

        $response = $this->delete(route('orangtua.destroy', $orangtua->id));

        $response->assertRedirect(route('orangtua.index'));
        $this->assertDatabaseMissing('users', ['id' => $orangtua->id]);
    }
}
