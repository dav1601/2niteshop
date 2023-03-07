<?php

use App\Models\Category;
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
    public function update_sort_child($category)
    {
        if ($category->children) {
            $index = 0;
            foreach ($category->children as $key => $value) {
                Category::where('id',  $value->id)->update(['position' => $index]);
                $index++;
                $this->update_sort_child($value);
            }
        }
    }
    public function up()
    {
        Schema::table('category', function (Blueprint $table) {
            $table->unsignedBigInteger('position')->after('icon')->nullable();
        });
        $categories = Category::tree(false);
        $index = 0;
        foreach ($categories as $category) {
            if ($category->parent_id == 0) {
                Category::where('id',  $category->id)->update(['position' => $index]);
            }
            $index++;
            $this->update_sort_child($category);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category', function (Blueprint $table) {
            //
        });
    }
};
