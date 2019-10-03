<?php

namespace App\Services;

use App\Repositories\RoleRepositoryInterface;
use App\Types\ListCriteria;
use App\Types\SearchCriteria;

class RoleService implements RoleServiceInterface
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * RoleService constructor.
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param ListCriteria $listCriteria
     * @param SearchCriteria $searchCriteria
     * @return Role[]
     */
    public function getPaginatedList(ListCriteria $listCriteria, SearchCriteria $searchCriteria)
    {
        return $this->roleRepository->paginated($listCriteria, $searchCriteria);
    }

    /**
     * @return Role[]
     */
    public function getAll()
    {
        return $this->roleRepository->all();
    }

    /**
     * @param int $id
     * @return Role
     */
    public function getById(int $id)
    {
        return $this->roleRepository->get($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteById(int $id)
    {
        return $this->roleRepository->delete($id);
    }
}
