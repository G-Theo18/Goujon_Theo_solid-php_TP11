<?php

require_once 'RepositoryInterface.php';
require_once 'User.php';
require_once 'DatabaseInterface.php';

class UserRepository implements RepositoryInterface
{
    private DatabaseInterface $client;

    public function __construct(DatabaseInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Retourne tous les utilisateurs sous forme d'objets User
     *
     * @return array<User>
     */
    public function getUsers(): array
    {
        $rawUsers = $this->client->fetchAll();
        $users = [];

        foreach ($rawUsers as $data) {
            $users[] = new User(
                $data['full_name'],
                $data['email']
            );
        }

        return $users;
    }

    /**
     * Retourne un utilisateur par son email
     *
     * @throws Exception si aucun utilisateur ne correspond
     */
    public function getUser(string $userEmail): User
    {
        foreach ($this->getUsers() as $user) {
            if ($user->getEmail() === $userEmail) {
                return $user;
            }
        }

        throw new Exception("Utilisateur non-trouvé : $userEmail");
    }
}
