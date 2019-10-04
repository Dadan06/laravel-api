<?php

namespace App\Repositories;

use App\Models\Role;
use App\Types\ListCriteria;
use App\Types\SearchCriteria;
use App\Utils\GenericUtils;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * @param ListCriteria $listCriteria
     * @param SearchCriteria $searchCriteria
     * @return Role[]
     */
    public function paginated(ListCriteria $listCriteria, SearchCriteria $searchCriteria)
    {
       return GenericUtils::genericPaginatedList(Role::class, $listCriteria, $searchCriteria);
    }

    /**
     * @return Role[]
     */
    public function all()
    {
        return Role::all();
    }

    /**
     * @param int $id
     * @return Role
     */
    public function get(int $id): Role
    {
        return Role::find($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return Role::destroy($id);
    }

    /**
     * @param array $role
     * @return Role
     */
    public function create(array $role)
    {
        return Role::create($role);
    }
}
