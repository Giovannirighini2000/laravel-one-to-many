<?php

namespace Database\Seeders;
use App\Models\Types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Programming', 'Backend', 'FrontEnd', 'Full stack', 'Design','Ai'];

        foreach ($types as $type) {
            $new_typ = new Types();
            $new_typ->name = $type;
            $new_typ->slug = Str::slug($type);

            $new_typ->save();
        }
    }
}
