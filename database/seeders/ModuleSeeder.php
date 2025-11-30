<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Str;
class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::create([
            'name' => 'Admin Dummy',
            'email' => 'admin@dummy.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $revit = Module::create([
            'user_id' => $user->id,
            'title' => 'Mastering Revit Architecture 2025',
            'slug' => Str::slug('Mastering Revit Architecture 2025'),
            'description' => 'Tutorial lengkap BIM dari nol sampai mahir.',
            'thumbnail' => 'https://placehold.co/600x400/2563eb/FFF?text=REVIT+BIM',
            'status' => 'published',
        ]);

        $revit->subModules()->createMany([
            [
                'title' => 'Pertemuan 1: Instalasi & Interface',
                'slug' => Str::slug('Pertemuan 1: Instalasi & Interface'),
                'urutan' => 1,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'content' => '<p>Mengenal tampilan awal Revit dan cara setting project units.</p>',
            ],
            [
                'title' => 'Pertemuan 2: Grid & Level',
                'slug' => Str::slug('Pertemuan 2: Grid & Level'),
                'urutan' => 2,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'content' => '<p>Membuat garis bantu as bangunan (Grid) dan ketinggian lantai (Level).</p>',
            ],
            [
                'title' => 'Pertemuan 3: Dinding Dasar',
                'slug' => Str::slug('Pertemuan 3: Dinding Dasar'),
                'urutan' => 3,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'content' => '<p>Cara menggunakan Basic Wall dan mengatur ketebalan dinding.</p>',
            ],
        ]);

        // ==========================================
        // DATA 2: KELAS VUE JS (Lengkap)
        // ==========================================
        $vue = Module::create([
            'user_id' => $user->id,
            'title' => 'Belajar VueJS 3 Modern',
            'slug' => Str::slug('Belajar VueJS 3 Modern'),
            'description' => 'Membangun website interaktif dengan Composition API.',
            'thumbnail' => 'https://placehold.co/600x400/42b883/FFF?text=VUE+JS',
            'status' => 'published',
        ]);

        $vue->subModules()->createMany([
            [
                'title' => 'Intro: Setup Project',
                'slug' => Str::slug('Intro: Setup Project'),
                'urutan' => 1,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'content' => '<p>Instalasi Node.js dan membuat project Vue pertama dengan Vite.</p>',
            ],
            [
                'title' => 'Konsep Reactivity',
                'slug' => Str::slug('Konsep Reactivity'),
                'urutan' => 2,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'content' => '<p>Perbedaan ref dan reactive dalam Vue 3.</p>',
            ],
        ]);

        // ==========================================
        // DATA 3: KELAS DRAFT (Belum Publish)
        // ==========================================
        Module::create([
            'user_id' => $user->id,
            'title' => 'Draft: Teknik Sipil Dasar',
            'slug' => Str::slug('Draft: Teknik Sipil Dasar'),
            'description' => 'Materi ini belum siap ditampilkan.',
            'thumbnail' => 'https://placehold.co/600x400/gray/white?text=DRAFT',
            'status' => 'draft',
        ]);
    }
}
