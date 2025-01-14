<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $pengajar_id
 * @property string $activity
 * @property int|null $hafalan_id
 * @property int|null $iqra_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hafalan|null $hafalan
 * @property-read \App\Models\Iqra|null $iqra
 * @property-read \App\Models\User $pengajar
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereHafalanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereIqraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog wherePengajarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereUpdatedAt($value)
 */
	class ActivityLog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $juz_id
 * @property int $surat_id
 * @property int $pengajar_id
 * @property int $mulai_ayat
 * @property int|null $akhir_ayat
 * @property string $nilai
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityLog> $activityLogs
 * @property-read int|null $activity_logs_count
 * @property-read \App\Models\Juz $juz
 * @property-read \App\Models\User $pengajar
 * @property-read \App\Models\Siswa $siswa
 * @property-read \App\Models\Surat $surat
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereAkhirAyat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereJuzId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereMulaiAyat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan wherePengajarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereSuratId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hafalan whereUpdatedAt($value)
 */
	class Hafalan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $siswa_id
 * @property int $pengajar_id
 * @property int $jilid
 * @property int $halaman
 * @property string $nilai
 * @property string|null $catatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityLog> $activityLogs
 * @property-read int|null $activity_logs_count
 * @property-read \App\Models\User $pengajar
 * @property-read \App\Models\Siswa $siswa
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra query()
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereHalaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereJilid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra wherePengajarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Iqra whereUpdatedAt($value)
 */
	class Iqra extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $juz
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hafalan> $hafalans
 * @property-read int|null $hafalans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Surat> $surats
 * @property-read int|null $surats_count
 * @method static \Illuminate\Database\Eloquent\Builder|Juz newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Juz newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Juz query()
 * @method static \Illuminate\Database\Eloquent\Builder|Juz whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juz whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juz whereJuz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juz whereUpdatedAt($value)
 */
	class Juz extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $kelas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hafalan> $hafalans
 * @property-read int|null $hafalans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Iqra> $iqras
 * @property-read int|null $iqras_count
 * @property-read \App\Models\User|null $orangTua
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUpdatedAt($value)
 */
	class Siswa extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $juz_id
 * @property string $nama_surat
 * @property int $mulai_ayat
 * @property int $akhir_ayat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hafalan> $hafalans
 * @property-read int|null $hafalans_count
 * @property-read \App\Models\Juz $juz
 * @method static \Illuminate\Database\Eloquent\Builder|Surat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Surat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Surat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereAkhirAyat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereJuzId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereMulaiAyat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereNamaSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereUpdatedAt($value)
 */
	class Surat extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $phone_number
 * @property string|null $role
 * @property string $email
 * @property string|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $siswa_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityLog> $activityLogs
 * @property-read int|null $activity_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hafalan> $hafalans
 * @property-read int|null $hafalans_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Siswa|null $siswa
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

