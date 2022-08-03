<?php

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
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        //modules
        $table->id();
        $table->unsignedBigInteger('module_group_id');
        $table->string('name', 45);
        $table->string('route', 45);
        $table->string('order', 45);
        $table->integer('is_shown');

        $table->foreign('module_group_id')->references(id)->on('module_groups');

        //module_groups
        $table->id();
        $table->string('name',45);

        //projects
        $table->id();
        $table->unsignedBigInteger('crm_id');
        $table->text('description');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('crm_id')->references('id')->on('crms');

        //crms
        $table->id();
        $table->string('crm_id',45);
        $table->string('name',100);
        $table->date('start_date');
        $table->date('end_date');
        $table->string('pic',45);
        $table->string('client',45);
        $table->integer('status');
        $table->integer('priority');

        //repositories
        $table->id();
        $table->unsignedBigInteger('project_id');
        $table->string('repo_id',15);
        $table->string('name',45);
        $table->integer('is_private');
        $table->integer('has_issue');
        $table->text('description');
        
        $table->foreign('project_id')->references('id')->on('projects');

        //issues
        $table->id();
        $table->unsignedBigInteger('repository_id');
        $table->string('issue_id',15);
        $table->string('number',5);
        $table->string('title',100);
        $table->integer('state');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('repository_id')->references('id')->on('repositories');

        // balance_mutation
        $table->id();
        $table->date('date');
        $table->string('name',100);
        $table->integer('type');
        $table->integer('amount');

        //admins
        $table->id();
        $table->unsignedBigInteger('role_id');
        $table->string('name',45);
        $table->string('email',45);
        $table->string('password',45);
        $table->string('last_login',45);
        $table->string('remember_token',45);
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('role_id')->references('id')->on('roles');

        //roles
        $table->id();
        $table->string('name',45);

        //authorizations
        $table->id();
        $table->unsignedBigInteger('role_id');
        $table->unsignedBigInteger('module_id');
        $table->unsignedBigInteger('authorization_type_id');

        $table->foreign('role_id')->references('id')->on('roles');
        $table->foreign('module_id')->references('id')->on('modules');
        $table->foreign('authorization_type_id')->references('id')->on('authorization_types');

        //authorizations_types
        $table->id();
        $table->string('name',45);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
