<?php

namespace App\Repositories;

use App\Models\Kelas;

class KelasRepository
{
    protected $model;

    public function __construct(Kelas $kelas)
    {
        $this->model = $kelas;
    }

    public function getData($search, $limit = 10)
    {
        $search = strtolower($search);
        $query = $this->model
            ->where(function ($query) use ($search) {
                $query->where("nama", "like", "%" . $search . "%");
            })
            ->paginate($limit);

        return $query;
    }

    public function store($data)
    {
        return $this->model->create([
            "nama" => $data["nama"],
        ]);
    }

    public function update($data, $id)
    {
        // return $this->model->where('id', $id)->update([
        //     "nama" => $data["nama"],
        // ]);
    }

    public function destroy($kelas)
    {
        return $this->model->where('nama', $kelas)->delete();
    }

}