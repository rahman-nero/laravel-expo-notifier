<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::table(config('expo-notifications.database.notifications_table_name', 'expo_notifications'), function (Blueprint $table) {
            $table->foreignId('expo_token_id')
                ->nullable()
                ->after('id')
                ->constrained();

            $table->after('value', function (Blueprint $table) {
                $table->dateTime('sent_at')
                    ->comment('Отправлено')
                    ->nullable();

                $table->dateTime('read_at')
                    ->comment('Прочитано')
                    ->nullable();
            });

            $table->softDeletes()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table(config('expo-notifications.database.notifications_table_name', 'expo_notifications'), function (Blueprint $table) {
            $table->dropColumn(['read_at', 'deleted_at']);
        });
    }
};
