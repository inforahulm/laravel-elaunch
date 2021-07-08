<?php 
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all();

    public function create();

    public function get($id);

    public function store(array $data);

    public function delete($id);

    public function update($id,array $data);
}