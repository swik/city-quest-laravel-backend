<?php
declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{
    public function create(array $attributes): Model;

    public function find(int $id): ?Model;

    public function all(): Collection;

    public function paginate(int $pageLimit): AbstractPaginator;
}
