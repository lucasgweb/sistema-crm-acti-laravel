<?php

use App\Models\Course;
use App\Models\Modality;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Type;
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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->integer('status')->default(1);
            $table->foreignIdFor(Teacher::class)->references('id')->on('teachers');
            $table->foreignIdFor(Semester::class)->references('id')->on('semesters');
            $table->foreignIdFor(Course::class)->references('id')->on('courses');
            $table->foreignIdFor(Type::class)->references('id')->on('types');
            $table->foreignIdFor(Modality::class)->references('id')->on('modalities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
