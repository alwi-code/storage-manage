<?php

namespace App\Services;

interface BarangListService
{
    public function postBarang($id, $barang);

    public function getBarang();

    public function getBarangById($id);

    public function removeBarang($id);

    public function tambahBarang($request);

    public function updateBarang($request, $id);

    public function deleteBarang($id);
}