<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeDocuments;

class TypeDocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $new=new TypeDocuments();
        $new->name="Cédula de ciudadanía";
        $new->short_name="C.C";
        $new->save();
        $new=new TypeDocuments();
        $new->name="Cédula de extranjería";
        $new->short_name="C.E";
        $new->save();
    }
}
