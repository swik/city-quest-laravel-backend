<?php
declare(strict_types=1);

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Achievement::class, 5)->create();
    }
}
