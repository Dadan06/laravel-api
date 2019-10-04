<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Types\ListCriteria;
use App\Types\SearchCriteria;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ListCriteria $listCriteria
     * @param SearchCriteria $searchCriteria
     * @return User[]
     */
    public function getPaginatedList(ListCriteria $listCriteria, SearchCriteria $searchCriteria)
    {
        return $this->userRepository->paginated($listCriteria, $searchCriteria);
    }

    /**
     * @param int $id
     * @return User
     */
    public function getById(int $id)
    {
        return $this->userRepository->get($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteById(int $id)
    {
        return $this->userRepository->delete($id);
    }

    /**
     * @param array $user
     * @return User
     */
    public function create(array $user)
    {
        return $this->userRepository->create($user);
    }
}
