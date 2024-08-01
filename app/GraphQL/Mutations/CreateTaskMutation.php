<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateTaskMutation extends Mutation
{
protected $attributes = [
        'name' => 'createTask',
    ];

    public function type(): Type
    {
        return GraphQL::type('Task');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
            ],
            'is_completed' => [
                'name' => 'is_completed',
                'type' => Type::boolean(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Task::create($args);
    }
}
