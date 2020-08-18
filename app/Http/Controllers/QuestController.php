<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\QuestResource;
use App\Models\Quest;
use App\Repository\QuestRepositoryInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class QuestController extends Controller
{
    private const PAGE_LIMIT = 10;

    private $questRepository;
    private $authGuard;

    public function __construct(QuestRepositoryInterface $questRepository, Guard $authGuard)
    {
        $this->questRepository = $questRepository;
        $this->authGuard = $authGuard;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Responsable|QuestResource
     */
    public function index()
    {
        $quests = $this->questRepository->paginate(self::PAGE_LIMIT);

        return QuestResource::collection($quests);
    }

    /**
     * Save new Quest
     *
     * @return Responsable|QuestResource
     */
    public function store(Request $request): Responsable
    {
        try {
            $validatedData = $request->validate([
                'title' => ['required', 'max:255'],
                'description' => ['required'],
                'check_points' => ['required'],
                'check_points.*.place_id' => ['required'],
                'check_points.*.achievement_id' => ['required'],
                'check_points.*.step' => ['required', 'integer'],
            ]);
        } catch (ValidationException $exception) {
            throw new BadRequestHttpException($exception->getMessage(), $exception, Response::HTTP_BAD_REQUEST);
        }

        $validatedData['creator_id'] = $this->authGuard->user()->id;

        $quest = $this->questRepository->create($validatedData);

        return new QuestResource($quest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Responsable|QuestResource
     */
    public function show($id): QuestResource
    {
        $quest = Quest::query()->findOrFail($id);

        return new QuestResource($quest);
    }
}
