<?php

namespace Somecoding\WordpressApiWrapper\Service\Main;

use Somecoding\WordpressApiWrapper\Exception\NotYetImplemented;
use Somecoding\WordpressApiWrapper\Model\User;
use Somecoding\WordpressApiWrapper\Service\ApiService;

/**
 * Class UserService
 * @package Somecoding\WordpressApiWrapper\Service\Wordpress
 */
class UserService
{
	/**
	 * @var string
	 */
	const USERS_URL_STRING = 'wp/v2/users/';

	/**
	 * @var ApiService
	 */
	protected $apiService;

	/**
	 * PostService constructor.
	 * @param ApiService $apiService
	 */
	public function __construct(ApiService $apiService)
	{
		$this->apiService = $apiService;
	}

	public function getUserByName(string $name): ?User
	{
		throw new NotYetImplemented();
	}

	public function getUserById(int $userId): ?User
	{
		throw new NotYetImplemented();
	}

	public function getUserBySearchString(string $needle): ?User
	{
		throw new NotYetImplemented();
	}

	public function getUserByEmail(string $email): ?User
	{
		throw new NotYetImplemented();
	}

	public function getAllAvailableUsers(): array
	{
		throw new NotYetImplemented();
	}
}