<?php

namespace App\Repositories;

use App\Models\WaliKelas;

class WaliKelasRepository
{
    protected $model;

    public function __construct(WaliKelas $waliKelas)
    {
        $this->model = $waliKelas;
    }

    public function find($id)
    {
        return $this->model->with(["guru", "kelas"])->find($id);
    }

    public function getData($search, $limit = 10)
    {
        $search = strtolower($search);
        $query = $this->model
            ->where(function ($query) use ($search) {
                $query->where("tahun_ajaran", "like", "%" . $search . "%")
                    ->orWhere("kelas", "like", "%" . $search . "%");
            })
            ->orWhereHas("guru", function ($query) use ($search) {
                $query->where("nama", "like", "%" . $search . "%");
            })
            ->paginate($limit);

        return $query;
    }

    public function store($data)
    {
        return $this->model->create([
            "kelas" => $data["kelas"],
            "tahun_ajaran" => $data["tahun_ajaran"],
            "wali_nip" => $data["wali_nip"],
        ]);
    }

    public function update($data, $id)
    {
        return $this->model->where('id', $id)->update([
            "kelas" => $data["kelas"],
            "tahun_ajaran" => $data["tahun_ajaran"],
            "wali_nip" => $data["wali_nip"],
        ]);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}