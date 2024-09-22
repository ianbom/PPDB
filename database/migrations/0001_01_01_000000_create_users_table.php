<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jalur')->nullable()->constrained('jalur', 'id_jalur')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto')->nullable();
            $table->string('nisn')->default('');
            $table->enum('agama', ['islam', 'kristen', 'katholik', 'hindu', 'budha', 'konghucu'])->nullable();
            $table->string('alamat')->default('');
            $table->date('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->boolean('gender')->default(false);  // (0: Perempuan, 1: Laki-laki)
            $table->string('hp')->nullable();
            $table->string('sekolah')->default('');
            $table->enum('status', ['verifikasi_data', 'lolos_administrasi', 'diterima', 'ditolak'])->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('hp_ayah')->nullable();
            $table->string('hp_ibu')->nullable();
            $table->enum('pendidikan_ayah', ['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 'd4/s1', 's2', 's3'])->nullable();
            $table->enum('pendidikan_ibu', ['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 'd4/s1', 's2', 's3'])->nullable();
            $table->decimal('pendapatan_ayah', 15, 2)->nullable();
            $table->decimal('pendapatan_ibu', 15, 2)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
