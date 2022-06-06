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
            'id_unidad'         => 3,
            'nro_preventivo'    => 3,
            'fecha_comprobante' => $this->faker->dateTimeThisMonth(),
            'sello'             => 1111,
            'nro_hojas'         => $this->faker->numerify(),
            'nro_tomo'          => $this->faker->numerify(),
            'beneficiario'      => $this->faker->text(),
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
