<?php

use App\Models\Slides;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $slides_active = Slides::where('status', 1)->orderBy('id', 'DESC')->get();
            $slides_nactive = Slides::where('status', 2)->get();
            $index = 0;
            foreach ($slides_active as  $value) {
                Slides::where('id', $value->id)->update(['index' => $index]);
                $index++;
            }
            foreach ($slides_nactive as  $value_2) {
                Slides::where('id', $value_2->id)->update(['index' => NULL]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            //
        });
    }
};
