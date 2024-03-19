<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop the existing foreign key constraint, if it exists
        Schema::table('customers', function (Blueprint $table) {
            // We need to check for the existence of the foreign key
            $foreignKeys = $this->listTableForeignKeys('customers');
            if (in_array('customers_user_id_foreign', $foreignKeys)) {
                $table->dropForeign(['user_id']);
            }
        });

        // Ensure user_id is nullable
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });

        // Update user_id to NULL where no matching user exists
        DB::table('customers')->whereNotIn('user_id', DB::table('users')->pluck('id'))->update(['user_id' => null]);

        // Re-add the foreign key constraint
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            // Restore the user_id column to its previous state, if desired
            // $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });
    }

    /**
     * Get a list of all foreign keys for a table
     * 
     * @param string $table
     * @return array
     */
    protected function listTableForeignKeys($table)
    {
        $conn = Schema::getConnection()->getDoctrineSchemaManager();
        $foreignKeys = [];
        $doctrineTable = $conn->listTableDetails($table);

        if ($doctrineTable->hasForeignKeys()) {
            foreach ($doctrineTable->getForeignKeys() as $foreignKey) {
                $foreignKeys[] = $foreignKey->getName();
            }
        }

        return $foreignKeys;
    }
};
