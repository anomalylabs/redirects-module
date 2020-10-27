<?php

namespace Database\Factories\Anomaly\RedirectsModule\Domain;

use Anomaly\RedirectsModule\Domain\DomainModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DomainModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DomainModel::class;

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
