<?php

namespace Tests\Feature;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiswaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_index_displays_siswa_list()
    {
        $siswa = Siswa::factory()->count(3)->create();

        $response = $this->get(route('siswa.index'));

        $response->assertStatus(200);
        $response->assertViewIs('siswa.index');
        $response->assertViewHas('siswas', function ($siswas) use ($siswa) {
            return $siswas->contains($siswa->first());
        });
    }

    public function test_create_displays_form()
    {
        $response = $this->get(route('siswa.create'));

        $response->assertStatus(200);
        $response->assertViewIs('siswa.create');
    }

    public function test_store_saves_new_siswa()
    {
        $data = [
            'nama' => 'John Doe',
            'jenis_kelamin' => 'Laki-laki',
            'kelas' => '10A',
        ];

        $response = $this->post(route('siswa.store'), $data);

        $response->assertRedirect(route('siswa.index'));
        $this->assertDatabaseHas('siswas', $data);
    }

    public function test_show_displays_siswa_details()
    {
        $siswa = Siswa::factory()->create();

        $response = $this->get(route('siswa.show', $siswa));

        $response->assertStatus(200);
        $response->assertViewIs('siswa.show');
        $response->assertViewHas('siswa', $siswa);
    }

    public function test_update_modifies_siswa_data()
    {
        $siswa = Siswa::factory()->create();
        $updateData = [
            'nama' => 'Jane Doe',
            'jenis_kelamin' => 'Perempuan',
            'kelas' => '11B',
        ];

        $response = $this->put(route('siswa.update', $siswa), $updateData);

        $response->assertRedirect(route('siswa.index'));
        $this->assertDatabaseHas('siswas', $updateData);
    }

    public function test_destroy_deletes_siswa_data()
    {
        $siswa = Siswa::factory()->create();

        $response = $this->delete(route('siswa.destroy', $siswa));

        $response->assertRedirect(route('siswa.index'));
        $this->assertDatabaseMissing('siswas', ['id' => $siswa->id]);
    }
}
