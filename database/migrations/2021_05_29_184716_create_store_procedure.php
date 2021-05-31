<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $script_all="
            DROP PROCEDURE IF EXISTS all_type_documents;
            CREATE PROCEDURE all_type_documents()
            BEGIN
                select * from type_documents WHERE deleted_at IS NULL;
            END;
        ";
        DB::unprepared($script_all);

        $script_find_one="
            DROP PROCEDURE IF EXISTS search_type_document;
            CREATE PROCEDURE search_type_document(IN id_search INT)
            BEGIN
                select * from type_documents WHERE id=id_search AND deleted_at IS NULL;
            END;
        ";
        DB::unprepared($script_find_one);

        $script_insert="
            DROP PROCEDURE IF EXISTS insert_type_document;
            CREATE PROCEDURE insert_type_document(
                IN name varchar(45),
                IN short_name varchar(45)
            )
            BEGIN
                INSERT INTO type_documents
                (
                    name,
                    short_name,
                    created_at,
                    updated_at
                )
                VALUES(
                    name,
                    short_name,
                    CURDATE(),
                    CURDATE()
                );
            END;
        ";

        DB::unprepared($script_insert);

        $script_update="
            DROP PROCEDURE IF EXISTS update_type_document;
            CREATE PROCEDURE update_type_document(
                IN id_update INT,
                IN name varchar(45),
                IN short_name varchar(45)
            )
            BEGIN
                UPDATE type_documents
                SET
                    name = name,
                    short_name = short_name
                WHERE id = id_update;
            END;
        ";
        DB::unprepared($script_update);

        $script_delete="
            DROP PROCEDURE IF EXISTS delete_type_document;
            CREATE PROCEDURE delete_type_document(
                IN id_delete INT
            )
            BEGIN
                UPDATE type_documents
                SET
                    deleted_at = CURDATE()
                WHERE id = id_delete;
            END;
        ";
        DB::unprepared($script_delete);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $script="DROP PROCEDURE IF EXISTS all_type_documents;
                DROP PROCEDURE IF EXISTS search_type_document;
                DROP PROCEDURE IF EXISTS insert_type_document;
                DROP PROCEDURE IF EXISTS update_type_document;
                DROP PROCEDURE IF EXISTS delete_type_document;";
        DB::unprepared($script);
    }
}
