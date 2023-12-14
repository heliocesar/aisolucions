<?php

namespace Tests\Unit;

use App\Models\Documents;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class DocumentsTest extends TestCase
{
    use WithFaker;

    public function test_simple_validation_contents_max_value()
    {
        
        $documents = new Documents([
            "category_id" => 1,
            "title" => "sdsadsadsadsa",
            "contents" => 'dsdsds',
        ]);

        $this->assertTrue(strlen($documents->contents) <= 300);


    }



    // public function test_simple_validation_category_remessa_parcial()
    // {
        
    //     $documents = new Documents([
    //         "category" => 'Remessa Parcial',
    //         "title" => "sdsadsadsadsa",
    //         "contents" => 'dsdsds',
    //     ]);

    //     $this->assertTrue(strlen($documents->contents) <= 300);


    // }

}
