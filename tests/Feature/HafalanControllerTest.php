<?php

namespace Tests\Feature;

use App\Models\Hafalan;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Juz;
use App\Models\Surat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HafalanControllerTest extends TestCase
{
    use RefreshDatabase;

    private $pengajar;
    private $siswa;
    private $juz;
    private $surat;

    public function setUp(): void
    {
        parent::setUp();
        $this->pengajar = User::factory()->create(['role' => User::ROLE_PENGAJAR]);
        $this->siswa = Siswa::factory()->create();
        $this->juz = Juz::factory()->create();
        $this->surat = Surat::factory()->create(['juz_id' => $this->juz->id]);
    }

    public function test_index_page_can_be_accessed_by_pengajar()
    {
        $this->actingAs($this->pengajar)
            ->get(route('hafalan.index'))
            ->assertStatus(200)
            ->assertViewIs('hafalan.index');
    }

    public function test_create_page_displays_correct_data()
    {
        $this->actingAs($this->pengajar)
            ->get(route('hafalan.create'))
            ->assertStatus(200)
            ->assertViewHas(['siswas', 'juzs', 'surats']);
    }

    public function test_store_hafalan_with_valid_data()
    {
        $this->actingAs($this->pengajar);

        $response = $this->post(route('hafalan.store'), [
            'siswa_id' => $this->siswa->id,
            'juz_id' => $this->juz->id,
            'surat_id' => $this->surat->id,
            'mulai_ayat' => 1,
            'akhir_ayat' => 5,
            'nilai' => 'Belum mampu',
            'catatan' => 'Perlu diperbaiki',
        ]);

        $response->assertRedirect(route('hafalan.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('hafalans', ['siswa_id' => $this->siswa->id]);
    }

    public function test_show_hafalan_details()
    {
        $hafalan = Hafalan::factory()->create(['siswa_id' => $this->siswa->id]);

        $this->actingAs($this->pengajar)
            ->get(route('hafalan.show', $hafalan->id))
            ->assertStatus(200)
            ->assertViewIs('hafalan.show')
            ->assertViewHas('hafalan', $hafalan);
    }

    public function test_update_hafalan()
    {
        $hafalan = Hafalan::factory()->create();

        $response = $this->actingAs($this->pengajar)->put(route('hafalan.update', $hafalan->id), [
            'siswa_id' => $hafalan->siswa_id,
            'juz_id' => $hafalan->juz_id,
            'surat_id' => $hafalan->surat_id,
            'mulai_ayat' => 2,
            'akhir_ayat' => 10,
            'nilai' => 'Mampu',
            'catatan' => 'Tingkatkan lagi',
        ]);

        $response->assertRedirect(route('hafalan.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('hafalans', ['nilai' => 'Mampu']);
    }

    public function test_delete_hafalan()
    {
        $hafalan = Hafalan::factory()->create();

        $response = $this->actingAs($this->pengajar)
            ->delete(route('hafalan.destroy', $hafalan->id));

        $response->assertRedirect(route('hafalan.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('hafalans', ['id' => $hafalan->id]);
    }

    public function test_get_surats_by_juz()
    {
        $this->actingAs($this->pengajar);
        $response = $this->get(route('hafalan.getSuratsByJuz', $this->juz->id));
        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_get_ayats_by_surat()
    {
        $this->actingAs($this->pengajar);
        $response = $this->get(route('hafalan.getAyatsBySurat', $this->surat->id));
        $response->assertStatus(200)
            ->assertJsonFragment([1]);
    }
}
