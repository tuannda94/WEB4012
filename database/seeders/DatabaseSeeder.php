<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use App\Models\Position;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Trong model User có trait HasFactory,
        // có UserFactory đã định nghĩa dữ liệu mẫu
        // Model::factory(số dữ liệu mẫu)->create();
        // Nếu đã chạy seeder cho Room và User thì có thể comment vào để không chạy lần 2
        // Room::factory(10)->create();
        // User::factory(10)->create();
        Position::factory(10)->create();
    }
}
