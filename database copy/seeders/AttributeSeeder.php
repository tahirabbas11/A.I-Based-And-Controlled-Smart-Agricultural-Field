<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{
    Attribute,
    AttributeValue
};

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute = Attribute::create([
            'name' => 'Sample Test Attrbuite'
        ]);
        $attrValues = [
            new AttributeValue(['name'=>'Test Attrbuite Value'])
        ];
        $attribute->attrValues()->saveMany($attrValues);
    }
}
