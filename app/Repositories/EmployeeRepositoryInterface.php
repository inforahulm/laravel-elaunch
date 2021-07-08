<?php
namespace App\Repositories;
interface EmployeeRepositoryInterface
{
    public function all();

    public function get($id);

    public function read($id);

    public function store(array $data);

    public function delete($id);

    public function update($id,array $data);
}