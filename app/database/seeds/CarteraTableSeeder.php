<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarteraTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1000) as $index)
		{
			$cartera = new Cartera();
            $cartera->documento     = $faker->randomElement(['PAGAR', 'COBRAR']);
            $cartera->prefijo       = $faker->randomElement(['FACTURA', 'COTIZACIÓN']);
            $cartera->fisico        = $faker->unique()->bothify('######');
            $cartera->pedido        = $faker->bothify('######');
            $cartera->valor         = $faker->randomFloat(2, 1000, 99999999999999.99);
            $cartera->notas         = $faker->realText(rand(10,1000));
            $cartera->tercero_id    = rand(1,100);
            $cartera->user_id       = rand(1,10);
            $cartera->vencimiento   = $faker->dateTimeThisDecade('2025-12-31 23:59');
            $cartera->created_at    = $faker->dateTimeThisDecade();
            $cartera->save();

            $abono = new Abono();
            $abono->cartera_id  = $cartera->id;
            $abono->user_id     = 1;
            $abono->forma_pago  = 'EFECTIVO';
            $abono->monto       = $faker->randomFloat(2, 1000, $cartera->valor);
            $abono->notas       = $faker->realText(rand(10,1000));
            $abono->comprobante = $faker->unique()->bothify('######');
            $abono->save();
        }
	}

}