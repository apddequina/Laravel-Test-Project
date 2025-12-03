<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // List all department database connections
    protected $connections = [
        'technical_db',
        'billing_db',
        'product_db',
        'general_db',
        'feedback_db',
    ];

    public function up()
    {
        foreach ($this->connections as $connection) {
            Schema::connection($connection)->create('tickets', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->string('subject');
                $table->string('ticket_type');
                $table->longText('description');

                // New fields
                $table->string('status')->default('pending');
                $table->longText('feedback')->nullable();

                $table->timestamps();
            });
        }
    }

    public function down()
    {
        foreach ($this->connections as $connection) {
            Schema::connection($connection)->dropIfExists('tickets');
        }
    }
};
