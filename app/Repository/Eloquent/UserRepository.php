<?php
declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\QuestRepositoryInterface;

class UserRepository extends BaseRepository implements QuestRepositoryInterface
{
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): User
    {
        return $this->model->query()->where('email', $email)->firstOrFail();
    }
}
