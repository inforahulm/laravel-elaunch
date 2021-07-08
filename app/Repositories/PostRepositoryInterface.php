<?php
namespace App\Repositories;

interface PostRepositoryInterface
{
    public function all();

    public function create();

    public function store(array $data);

    public function delete($id);


}
