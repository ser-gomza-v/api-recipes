<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 08.06.17
 * Time: 13:14
 */

use Contoller\Recipes;

class TestRecipes extends PHPUnit_Framework_TestCase
{
    protected $validRecipe = [
        "recipe" => [
            'name' => 'name',
            'desc' => 'login',
        ]
    ];

    protected $id = 1;

    public function testRecipeCreate()
    {
        foreach ($this->validRecipe as $type => $properties) {
            $recipes = new Recipes();

            $getResult = $recipes->index('', 0, $properties, 'POST');
            $standartResult = [
                "success" => 'Created',
                "code"    => 201,
            ];

            $this->assertJsonStringEqualsJsonString(json_encode($standartResult), (string)$getResult, 'recipes successfully create');
        }
    }

    public function testRecipeUpdate()
    {
        foreach ($this->validRecipe as $type => $properties) {
            $recipes = new Recipes();

            $getResult = $recipes->index('update', $this->id, $properties, 'PUT');
            $standartResult = [
                "success" => "Updated",
                "code"    => 202,
            ];

            $this->assertJsonStringEqualsJsonString(json_encode($standartResult), (string)$getResult, 'recipes successfully update');
        }
    }

    public function testRecipeSingle()
    {
        foreach ($this->validRecipe as $type => $properties) {
            $recipes = new Recipes();

            $getResult = $recipes->index('single', $this->id, $properties, 'GET');

            $this->assertJson((string)$getResult, 'recipes successfully single');
        }
    }

    public function testRecipeAll()
    {
        foreach ($this->validRecipe as $type => $properties) {
            $recipes = new Recipes();

            $getResult = $recipes->index('all', 0, $properties, 'GET');

            $this->assertJson((string)$getResult, 'recipes successfully all');
        }
    }

    public function testRecipeDelete()
    {
        foreach ($this->validRecipe as $type => $properties) {
            $recipes = new Recipes();

            $getResult = $recipes->index('delete', $this->id, $properties, 'DELETE');
            $standartResult = [
                "success" => "Deleted",
                "code"    => 200,
            ];

            $this->assertJsonStringEqualsJsonString(json_encode($standartResult), (string)$getResult, 'recipes successfully deleted');
        }
    }

}
