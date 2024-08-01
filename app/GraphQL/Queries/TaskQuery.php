<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TaskQuery extends Query
{
    protected $attributes = [
        'name' => 'tasks',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Task'));
    }

    public function resolve($root, $args)
    {
        return Task::all();
    }
}
