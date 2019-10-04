<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleCollectionResource;
use App\Http\Resources\RoleResource;
use App\Services\RoleServiceInterface;
use App\Types\ListCriteria;
use App\Types\SearchCriteria;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @var RoleServiceInterface
     */
    private $roleService;

    /**
     * RoleController constructor.
     * @param RoleServiceInterface $roleService
     */
    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RoleCollectionResource
     */
    public function getPaginatedList(Request $request)
    {
        $paginatedRoles = $this->roleService->getPaginatedList(
            new ListCriteria(
                $request->get('page'),
                $request->get('pageSize')
            ),
            new SearchCriteria(
                $request->get('search'),
                ['name']
            )
        );

        return new RoleCollectionResource($paginatedRoles);
    }

    /**
     * @return RoleCollectionResource
     */
    public function getAll()
    {
        return new RoleCollectionResource($this->roleService->getAll());
    }

    /**
     * @param Request $request
     * @return RoleResource
     */
    public function create(Request $request)
    {
        return new RoleResource($this->roleService->create($request->all()));
    }

    /**
     * @param int $id
     * @return RoleResource
     */
    public function get(int $id)
    {
        return new RoleResource($this->roleService->getById($id));
    }

    /**
     * @param int $id
     * @return RoleResource
     */
    public function delete(int $id)
    {
        return new RoleResource($this->roleService->deleteById($id));
    }

    public function update()
    {
        //
    }
}
