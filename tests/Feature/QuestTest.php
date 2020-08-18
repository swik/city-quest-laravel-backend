<?php

namespace Tests\Feature;

use App\Models\Achievement;
use App\Models\Place;
use App\Models\Quest;
use App\Models\User;
use Tests\TestCase;

class QuestTest extends TestCase
{
    public function testGetList()
    {
        $user = factory(User::class)->create();
        factory(Quest::class, 10)->create();

        $response = $this->actingAs($user)
            ->get('/api/quests');

        $response->assertStatus(200);
    }

    /**
     * @dataProvider dataCreateQuest
     */
    public function testCreateQuest(array $data, int $expectedCode)
    {
        $user = factory(User::class)->create();
        factory(Place::class)->create();
        factory(Achievement::class)->create();

        $response = $this->actingAs($user)
            ->post('/api/quests', $data);

        $response->assertStatus($expectedCode);
    }

    public function dataCreateQuest()
    {
        return [
            'success' => [
                'data' => [
                    'title' => 'Test Quest',
                    'description' => 'Test Description',
                    'check_points' => [
                        [
                            'place_id' => 1,
                            'step' => 1,
                            'achievement_id' => 1,
                        ]
                    ]
                ],
                'expectedCode' => 201,
            ],
            'validation error' => [
                'data' => [
                    'title' => 'Test Quest',
                    'description' => 'Test Description',
                    'check_points' => [
                        [
                            'place_id' => 1,
                            'step' => 1,
                        ]
                    ]
                ],
                'expectedCode' => 400,
            ],
        ];
    }
}
