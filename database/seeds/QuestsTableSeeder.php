<?php
declare(strict_types=1);

use App\Models\CheckPoint;
use App\Models\Quest;
use Illuminate\Database\Seeder;

class QuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Quest::class, 20)
            ->create()
            ->each(
                function (Quest $quest) {
                    $quest->check_points()
                        ->saveMany(
                            factory(CheckPoint::class, 5)->make(['quest_id' => $quest])
                        );
                }
            );
    }
}
