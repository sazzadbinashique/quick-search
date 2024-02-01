<?php

namespace Tests\Unit;

use Tests\TestCase;
use Sazzadbinashique\QuickSearch\Models\YourModel; // Adjust namespace and model name
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchableTraitTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_method()
    {
        // Arrange
        YourModel::create(['name' => 'John Doe', 'age' => 25]);
        YourModel::create(['name' => 'Jane Doe', 'age' => 30]);

        // Act
        $result = YourModel::search('John', ['name' => 'like', 'age' => 'equals'])->get();

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals('John Doe', $result->first()->name);
    }

    // Add more test methods as needed
}
