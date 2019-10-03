<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollectionResource;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return UserCollectionResource
     */
    public function getPaginatedList(Request $request)
    {
        $paginatedUsers = $this->userService->getPaginatedList(
            new ListCriteria(
                $request->get('page'),
                $request->get('pageSize')
            ),
            new SearchCriteria(
                $request->get('search'),
                ['name']
            )
        );

        return new UserCollectionResource($paginatedUsers);
    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {

    }

    /**
     * @param int $id
     * @return UserResource
     */
    public function get(int $id)
    {
        return new UserResource($this->userService->getById($id));
    }

    /**
     * @param int $id
     * @return UserResource
     */
    public function delete(int $id)
    {
        return new UserResource($this->userService->deleteById($id));
    }

    public function update()
    {
        //
    }
}
