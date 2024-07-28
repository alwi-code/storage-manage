<?php

namespace App\Services;

interface BarangListService
{
    public function getBarang($request);

    public function getBarangById($id);

    public function removeBarang($id);

    public function tambahBarang($request);

    public function updateBarang($request, $id);

    public function deleteBarang($id);
}