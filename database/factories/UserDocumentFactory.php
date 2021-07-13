<?php

namespace Database\Factories;

use App\Models\UserDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserDocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDocument::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'document_id' => 2,
            'note' => $this->faker->text(),
            'document_url' => 'newabc.pdf',
            'document_date' => '2009-10-20',

        ];
    }

}
