<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Siswa;
use App\Models\Juz;
use App\Models\Surat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityLogControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $pengajar;
    protected $siswa;
    protected $juz;
    protected $surat;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pengajar = User::factory()->create(['role' => User::ROLE_PENGAJAR]);
        $this->siswa = Siswa::factory()->create();
        $this->juz = Juz::factory()->create();
        $this->surat = Surat::factory()->create(['juz_id' => $this->juz->id]);
    }

    public function test_index_displays_logs_correctly()
    {
        $this->actingAs($this->pengajar);

        ActivityLog::factory()->count(5)->create([
            'pengajar_id' => $this->pengajar->id,
            'created_at' => now(),
        ]);

        $response = $this->get(route('activity-logs.index'));

        $response->assertStatus(200);
        $response->assertViewIs('activity_logs.index');
        $response->assertViewHas('logs');
        $response->assertSee($this->pengajar->name);
    }

    public function test_index_with_search_filter()
    {
        $this->pengajar->update(['name' => 'John Doe']);

        ActivityLog::factory()->create(['pengajar_id' => $this->pengajar->id]);

        $this->actingAs($this->pengajar);

        $response = $this->get(route('activity-logs.index', ['search' => 'John']));

        $response->assertStatus(200);
        $response->assertSee('John Doe');
    }

    public function test_index_filters_logs_by_month()
    {
        ActivityLog::factory()->create([
            'pengajar_id' => $this->pengajar->id,
            'created_at' => now()->subMonth(),
        ]);

        $this->actingAs($this->pengajar);

        $response = $this->get(route('activity-logs.index', ['date' => now()->subMonth()->format('Y-m')]));

        $response->assertStatus(200);
        $response->assertViewHas('logs');
    }

    public function test_show_displays_specific_pengajar_logs()
    {
        $log = ActivityLog::factory()->create(['pengajar_id' => $this->pengajar->id]);

        $this->actingAs($this->pengajar);

        $response = $this->get(route('activity-logs.show', $this->pengajar->id));

        $response->assertStatus(200);
        $response->assertViewIs('activity_logs.show');
        $response->assertSee($this->pengajar->name);
        $response->assertSee($log->activity);
    }

    public function test_show_returns_404_for_nonexistent_user()
    {
        $this->actingAs($this->pengajar);

        $response = $this->get(route('activity-logs.show', 999));

        $response->assertStatus(404);
    }
}
