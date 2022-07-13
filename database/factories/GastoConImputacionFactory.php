<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GastoConImputacionFactory extends Factory
{
    public function definition()
    {
        return [
            'nro_comprobante'   => $this->faker->numerify(),
            'id_gestion'        => 1,
            'id_unidad'         => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
            'nro_preventivo'    => $this->faker->numerify(),
            'fecha_comprobante' => $this->faker->dateTimeThisMonth(),
            'sello'             => $this->faker->numerify(),
            'nro_hojas'         => $this->faker->numerify(),
            'nro_tomo'          => $this->faker->numerify(),
            'beneficiario'      => $this->faker->text(10),
            'detalle'           => $this->faker->paragraph(),
            'nro_cheque'        => $this->faker->numerify(),
            'fecha_cheque'      => $this->faker->dateTimeThisMonth(),
            'total_autorizado'  => $this->faker->numerify(),
            'emite_factura'     => $this->faker->randomElement(['SI','NO']),
            'iue'               => $this->faker->numerify(),
            'it'                => $this->faker->numerify(),
            'total_retencion'   => $this->faker->numerify(),
            'total_multas'      => $this->faker->numerify(),
            'total_garantia'    => $this->faker->numerify(),
            'liquido_pagable'   => $this->faker->numerify(),
            'enviado_caja'      => $this->faker->randomElement(['SI','NO']),
            'cheque_listo'      => $this->faker->randomElement(['SI','NO']),
            'pagado'            => $this->faker->randomElement(['SI','NO']),
            'enviado_archivo'      => $this->faker->randomElement(['SI','NO']),
            'ult_usuario'      =>   'asmin',
        ];
    }
}
