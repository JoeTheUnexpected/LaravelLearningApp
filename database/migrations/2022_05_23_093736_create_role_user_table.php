<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->primary(['role_id', 'user_id']);
        });

        $adminRole = Role::factory()->create(['name' => 'admin']);

        $admin = User::where('email', env('MAIL_ADMIN', 'admin@example.com'))->first();
        if (!$admin) {
            $admin = User::factory()->create([
                'name' => 'admin',
                'email' => env('MAIL_ADMIN', 'admin@example.com'),
                'password' => Hash::make('123456789'),
            ]);
        }

        $admin->roles()->attach($adminRole);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
};
