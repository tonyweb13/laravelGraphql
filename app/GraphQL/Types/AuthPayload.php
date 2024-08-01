<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AuthPayload extends GraphQLType
{
    protected $attributes = [
        'name' => 'AuthPayload',
    ];

    public function fields(): array
    {
        return [
            'token' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'user' => [
                'type' => GraphQL::type('User'),
            ],
        ];
    }
}
