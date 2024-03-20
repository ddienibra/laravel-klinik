<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $table->id();
            // //doctor_id (foreign_key) -> doctors
            // $table->foreignId('doctor_id')->constrained('doctors');
            // //day
            // $table->string('day');
            // //time
            // $table->string('time');
            // //status
            // $table->string('status')->default('active');
            // //note
            // $table->string('note')->nullable();
            // $table->timestamps();

            'doctor_id' => \App\Models\Doctor::factory(),
            'day' => $this->faker->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']),
            'time' => $this->faker->word(),
            'status' => $this->faker->word(),
            'note' => $this->faker->word(),

        ];
    }
}
