<?php

namespace Tests\Feature;

use App\Models\Iqra;
use App\Models\User;
use App\Models\Siswa;
use App\Models\ActivityLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IqraControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_can_be_accessed_by_admin()
    {
        $user = User::factory()->create(['role' => User::ROLE_PENGURUS]);
        $this->actingAs($user);

        $response = $this->get(route('iqra.index'));

        $response->assertStatus(200);
    }

    public function test_create_iqra()
    {
        $user = User::factory()->create();
        $siswa = Siswa::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('iqra.store'), [
            'siswa_id' => $siswa->id,
            'jilid' => 1,
            'halaman' => 10,
            'nilai' => 'A',
            'catatan' => 'Bagus',
        ]);

        $response->assertRedirect(route('iqra.index'));
        $this->assertDatabaseHas('iqras', ['siswa_id' => $siswa->id, 'nilai' => 'A']);
        $this->assertDatabaseHas('activity_logs', ['activity' => 'Menambah data iqra']);
    }

    public function test_edit_iqra()
    {
        $user = User::factory()->create();
        $iqra = Iqra::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('iqra.edit', $iqra->id));

        $response->assertStatus(200);
        $response->assertViewIs('iqra.edit');
    }

    public function test_update_iqra()
    {
        $user = User::factory()->create();
        $iqra = Iqra::factory()->create();
        $this->actingAs($user);

        $response = $this->put(route('iqra.update', $iqra->id), [
            'siswa_id' => $iqra->siswa_id,
            'jilid' => 2,
            'halaman' => 15,
            'nilai' => 'B',
            'catatan' => 'Perlu perbaikan',
        ]);

        $response->assertRedirect(route('iqra.index'));
        $this->assertDatabaseHas('iqras', ['id' => $iqra->id, 'nilai' => 'B']);
        $this->assertDatabaseHas('activity_logs', ['activity' => 'Mengubah data iqra']);
    }

    public function test_delete_iqra()
    {
        $user = User::factory()->create();
        $iqra = Iqra::factory()->create();
        $this->actingAs($user);

        $response = $this->delete(route('iqra.destroy', $iqra->id));

        $response->assertRedirect(route('iqra.index'));
        $this->assertDatabaseMissing('iqras', ['id' => $iqra->id]);
    }
}
