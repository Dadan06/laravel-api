<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleCollectionResource;
use App\Http\Resources\RoleResource;
use App\Models\Response;
use App\Services\RoleServiceInterface;
use App\Types\ListCriteria;
use App\Types\SearchCriteria;
use App\Utils\ResponseUtil;
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

    public function create()
    {
        //
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
