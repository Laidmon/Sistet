<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {        
        $array = array('A Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Baleares','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','Cuenca','Girona','Granada','Guadalajara','Gipuzkoa','Huelva','Huesca','Jaén','La Rioja','Las Palmas','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Segovia','Sevilla','Soria','Tarragona','Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza','Ceuta','Melilla');

        foreach ($array as $value) {
            DB::table('provinces')->insert([
                'title' => $value,
            ]);
         }
    }
}
