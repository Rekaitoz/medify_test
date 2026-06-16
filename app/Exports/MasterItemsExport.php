<?php

namespace App\Exports;

use App\Models\MasterItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MasterItemsExport implements FromCollection, WithHeadings, WithMapping
{
    protected int $rowNumber = 0;

    public function collection()
    {
        return MasterItem::with('kategoriItems')->orderBy('id')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kategori',
            'Nama Items',
            'Nama Supplier',
            'Harga',
            'Laba',
            'Hargajual',
        ];
    }

    public function map($item): array
    {
        $this->rowNumber++;

        $hargaJual = round($item->harga_beli + ($item->harga_beli * $item->laba / 100));
        $namaKategori = $item->kategoriItems->pluck('nama')->implode(', ');

        return [
            $this->rowNumber,
            $namaKategori,
            $item->nama,
            $item->supplier,
            $item->harga_beli,
            $item->laba,
            $hargaJual,
        ];
    }
}
