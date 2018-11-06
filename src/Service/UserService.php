<?php
/**
 * Created by PhpStorm.
 * User: motyl
 * Date: 06.11.2018
 * Time: 23:39
 */

namespace App\Service;


use App\Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        return $this->userRepository->findAll();
    }

}