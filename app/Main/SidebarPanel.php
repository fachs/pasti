<?php

namespace App\Main;


class SidebarPanel
{
    public static function keuangan()
    {
        return [
            'title' => 'Keuangan',
            'items' => [
                [
                    'keuangan_laporan' => [
                        'title' => 'Laporan',
                        'route_name' => 'keuangan/laporan'
                    ],
                    'keuangan_sptbh' => [
                        'title' => 'SPTB Himpunan',
                        'route_name' => 'keuangan/sptbh'
                    ],
                    'keuangan_rab' => [
                        'title' => 'RAB Bidang',
                        'route_name' => 'keuangan/rab'
                    ],
                ],
            ]
        ];
    }

    public static function persuratan()
    {
        return [
            'title' => 'Persuratan',
            'items' => [
                [
                    'persuratan_nomor' => [
                        'title' => 'Permintaan Nomor Surat',
                        'route_name' => 'persuratan/nomor'
                    ],
                    'persuratan_ttd' => [
                        'title' => 'Permintaan Tanda Tangan',
                        'route_name' => 'persuratan/ttd'
                    ],
                ],
            ]
        ];
    }

    public static function Publikasi()
    {
        return [
            'title' => 'Publikasi',
            'items' => [
                [
                    'publikasi_pengajuan' => [
                        'title' => 'Pengajuan Publikasi',
                        'route_name' => 'publikasi/pengajuan'
                    ],
                ],
                [
                    'publikasi_desain' => [
                        'title' => 'Desain',
                        'route_name' => 'publikasi/desain'
                    ],
                ],
            ]
        ];
    }


    public static function dashboards()
    {
        return [
            'title' => 'Dashboards',
            'items' => [
                [
                    'dashboards_beranda' => [
                        'title' => 'Beranda',
                        'route_name' => 'index'
                    ],
                ],
            ]
        ];
    }

    public static function tentang()
    {
        return [
            'title' => 'Tentang',
            'items' => [
                [
                    'tentang_beranda' => [
                        'title' => 'Tentang',
                        'route_name' => 'tentang'
                    ],
                ],
            ]
        ];
    }

    public static function all(){
        return [self::dashboards(),self::keuangan(), self::persuratan(), self::publikasi()];
    }
}
