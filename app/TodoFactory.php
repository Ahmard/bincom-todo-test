<?php


namespace App;


use PDO;

class TodoFactory
{
    private PDO $pdoInstance;

    public static function init(): TodoFactory
    {
        return new TodoFactory();
    }

    public function __construct()
    {
        $this->pdoInstance = Database::getPdoInstance();
    }

    public function create(array $todoData): bool
    {
        $prepared = $this->pdoInstance
            ->prepare("INSERT INTO todos(name, created_at, completed_at) VALUES (:name, :created_at, :completed_at)");
        $prepared->bindValue(':name', $todoData['name']);
        $prepared->bindValue(':created_at', time());
        $prepared->bindValue(':completed_at', time());
        return $prepared->execute();
    }

    public function update(int $todoId, array $todoData): bool
    {
        $prepared = $this->pdoInstance
            ->prepare("UPDATE todos SET name = :name, name = :name WHERE id = :id");
        $prepared->bindValue(':name', $todoData['name']);
        $prepared->bindValue(':id', $todoId);
        return $prepared->execute();
    }

    public function getAll(int $completed = 0): array
    {
        $query = $this->pdoInstance->query("SELECT * FROM todos WHERE status = {$completed} ORDER BY id DESC ;");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $todoId): bool
    {
        $prepared = $this->pdoInstance->prepare("DELETE FROM todos WHERE id = :id");
        $prepared->bindValue(':id', $todoId);
        return $prepared->execute();
    }

    public function markAsComplete(int $todoId): bool
    {
        $prepared = $this->pdoInstance
            ->prepare("UPDATE todos SET status = :status WHERE id = :id");
        $prepared->bindValue(':status', 1);
        $prepared->bindValue(':id', $todoId);
        return $prepared->execute();
    }
}