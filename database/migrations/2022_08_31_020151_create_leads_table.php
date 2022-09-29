<?php
use App\Models\Channel;
use App\Models\Course;
use App\Models\Situation;
use App\Models\User;
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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Course::class)->references('id')->on('courses');
            $table->foreignIdFor(User::class)->nullable()->references('id')->on('users')->nullOnDelete();
            $table->string('phone');
            $table->string('email');
            $table->foreignIdFor(Situation::class)->default(1)->references('id')->on('situations');
            $table->foreignIdFor(Channel::class)->references('id')->on('channels');
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('leads');
    }
};
