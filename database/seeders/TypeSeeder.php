<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['WebDesign', 'WebDevelopment', 'AppDevelopment'];
        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->title = $type;
            $new_type->slug = Str::slug($type);
            $new_type->save();
        }
    }
}
