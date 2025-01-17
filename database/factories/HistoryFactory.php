<?php

namespace Database\Factories;

use App\Models\History;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = History::class;
    public function definition(): array
    {
        return [
            'type' => collect(['Вход в аккаунт', 'Смена пароля', 'Очистка настроек', 'Разрыв связи'])->random(),
            'device' => collect(['Windows', 'macOS', 'Linux'])->random(),
            'location' => fake()->city(),
            'addition' => fake()->text(50),
        ];
    }
}
