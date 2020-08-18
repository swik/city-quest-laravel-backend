<?php
declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Quest;
use App\Repository\QuestRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class QuestRepository extends BaseRepository implements QuestRepositoryInterface
{
    /**
     * @param Quest $model
     */
    public function __construct(Quest $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $attributes
     *
     * @return Model|Quest
     */
    public function create(array $attributes): Model
    {
        /** @var Quest $newModel */
        $newModel = $this->model->newInstance($attributes);

        $newModel->push();

        if (isset($attributes['check_points'])) {
            $newModel->check_points()->createMany($attributes['check_points']);
        }

        $newModel->refresh();

        return $newModel;
    }
}
