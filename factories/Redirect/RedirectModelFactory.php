<?php

namespace Database\Factories\Anomaly\RedirectsModule\Redirect;

use Anomaly\RedirectsModule\Redirect\RedirectModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedirectModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RedirectModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
